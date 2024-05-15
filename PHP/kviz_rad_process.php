<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    require_once "database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        if (isset($_SESSION['kviz_id'])) {
            $kviz_id = $_SESSION['kviz_id'];
        } else {
            header("Location: kviz_rad.php");
        }

        $rezultati = 0;
        foreach ($_POST as $pitanje_id => $odgovor) {
            $tacan_odgovor_sql = "SELECT tacno FROM opcije WHERE pitanje_id = ? AND opcija_text = ?";
            $stmt = mysqli_stmt_init($konekcija);

            if (mysqli_stmt_prepare($stmt, $tacan_odgovor_sql)) {
                mysqli_stmt_bind_param($stmt, "is", $pitanje_id, $odgovor);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $tacan_odgovor);

                if (mysqli_stmt_fetch($stmt)) {
                    if ($tacan_odgovor == 1) {
                        $rezultati++;
                    }
                } else {
                    die("Doslo je do greske prilikom dobavljanja odgovora.");
                }
                mysqli_stmt_close($stmt);
            } else {
                die ("Doslo je do greske! Pokusajte ponovo.");
            }
        }

        $insert_rezultati = "INSERT INTO rezultati (korisnik_id, kviz_id, skor) VALUES (?, ?, ?)";
        $stmt2 = mysqli_stmt_init($konekcija);

        if (mysqli_stmt_prepare($stmt2, $insert_rezultati)) {
            $rezultati = (int)$rezultati;
            mysqli_stmt_bind_param($stmt2, "iii", $user_id, $kviz_id, $rezultati);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_close($stmt2);
        } else {
            die("Doslo je do greske! Pokusajte ponovo.");
        }
    } else {
        header("Location: kviz_rad.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kviz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <?php echo "Vas rezultat je: " . $rezultati . "/10"; ?>
    </div>
    <div class="auth-links">    
        <a href="dashboard.php">Povratak na glavni meni</a>
    </div>
</body>
</html>