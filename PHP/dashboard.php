<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    require_once "database.php";

    $username = $_SESSION["username"];
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT kvizovi.naslov, rezultati.skor
                        FROM rezultati
                        JOIN kvizovi ON rezultati.kviz_id = kvizovi.id
                        WHERE rezultati.korisnik_id = ?";
        
    $stmt = mysqli_prepare($konekcija, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $kviz_naslov, $skor);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kviz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    <div class="header">
        <header>
            <h2>Glavni meni:</h2>
        </header>
    </div>
    
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="kviz_rad.php">Zapocni kviz</a></li>
                <li><a href="kviz.php">Kreiraj kviz</a></li>
                <li><a href="logout.php">Izloguj se</a></li>
            </ul>
        </nav>
    </div>
    <div class="unos-pozadina">
        <h3>Istorija rezultata:</h3>
        <table>
            <tr>
                <th>Naziv kviza:</th>
                <th>Skor:</th>
            </tr>
            <?php
                while (mysqli_stmt_fetch($stmt)) {
                    echo "<tr>
                            <td>$kviz_naslov</td>
                            <td>$skor</td>
                        </tr>";
                }
            ?>
         </table>
    </div>

    <div class="footer">
        Dobrodosao, <?php echo $_SESSION["username"]; ?>
    </div>

    <?php mysqli_stmt_close($stmt) ?>
</body>
</html>