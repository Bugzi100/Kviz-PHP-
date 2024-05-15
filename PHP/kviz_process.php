<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    require_once "database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $naziv_kviza = $_POST['kviz_naslov'];
        

        $insert_naziv = "INSERT INTO kvizovi (naslov) VALUES (?)";
        $stmt_kviz = mysqli_stmt_init($konekcija);

        if (mysqli_stmt_prepare($stmt_kviz, $insert_naziv)) {
            mysqli_stmt_bind_param($stmt_kviz, "s", $naziv_kviza);
            mysqli_stmt_execute($stmt_kviz);

            $kviz_id = mysqli_insert_id($konekcija);

            for ($i = 1; $i <= 10; $i++) {
                $pitanje_text = $_POST["pitanje_text_$i"];
        
                $opcija_a = $_POST["opcija_a_$i"];
                $opcija_b = $_POST["opcija_b_$i"];
                $opcija_c = $_POST["opcija_c_$i"];
                $opcija_d = $_POST["opcija_d_$i"];
        
                $tacan_odgovor = $_POST["tacan_odgovor_$i"];

                $insert_pitanje = "INSERT INTO pitanja (kviz_id, text) VALUES (?, ?)";
                $stmt_pitanje = mysqli_stmt_init($konekcija);

                if (mysqli_stmt_prepare($stmt_pitanje, $insert_pitanje)) {
                    mysqli_stmt_bind_param($stmt_pitanje, "is", $kviz_id, $pitanje_text);
                    mysqli_stmt_execute($stmt_pitanje);

                    $pitanje_id = mysqli_insert_id($konekcija);

                    $insert_opcija = "INSERT INTO opcije (pitanje_id, opcija_text, tacno) VALUES (?, ?, ?)";
                    $stmt_opcija = mysqli_stmt_init($konekcija);

                    if (mysqli_stmt_prepare($stmt_opcija, $insert_opcija)) {
                        $opcije = [$opcija_a, $opcija_b, $opcija_c, $opcija_d];
                        $tacan_odgovor_index = $tacan_odgovor - 1;

                        foreach ($opcije as $index => $opcija) {
                            $tacno = ($index === $tacan_odgovor_index) ? 1 : 0;

                            mysqli_stmt_bind_param($stmt_opcija, "iss", $pitanje_id, $opcija, $tacno);
                            mysqli_stmt_execute($stmt_opcija);
                        }
                    } else {
                        echo "<div class=\"error-message\">Error: " . $insert_opcija . "<br>" . mysqli_error($konekcija) . "</div>";
                    }

                    mysqli_stmt_close($stmt_opcija);
                
                } else {
                    echo "<div class=\"error-message\">Error: " . $insert_pitanje . "<br>" . mysqli_error($konekcija) . "</div>";
                }
            }

            mysqli_stmt_close($stmt_pitanje);
            
            echo "<div class='success-message'>Kviz uspesno unet!</div>";
            echo "<div class='auth-links'><a href=\"dashboard.php\">Povratak na glavni meni</a></div>";

        } else {
            echo "<div class=\"error-message\">Error: " . $insert_naziv . "<br>" . mysqli_error($konekcija) . "</div>";
        }

        mysqli_stmt_close($stmt_kviz);

    } else {
        header("Location: kviz.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    
</body>
</html>