<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    require_once "database.php";
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
    <div class="auth-links">
        <a href="dashboard.php">Povratak na glavni meni</a>
        <br>
        <a href="logout.php">Izloguj se</a>
    </div>
    <div class="header">
        <form action="kviz_process.php" method="POST">
            <div class="input-group">
                <label for="kviz_naslov">Naziv kviza:</label><br>
                <input type="text" name="kviz_naslov" required>
                <br><hr><br>
            </div>
            <?php 
                for ($i = 1; $i <= 10; $i++) {
                    echo "
                    <div class=\"input-group\">
                        <label for=\"pitanje_text_$i\">Pitanje $i:</label><br>
                        <input type=\"text\" name=\"pitanje_text_$i\" required>
                    </div>
                    <div class=\"input-group\">
                        <label for=\"option_a_$i\">1.</label>
                        <input type=\"text\" name=\"opcija_a_$i\" required>
                    </div>
                    <div class=\"input-group\">
                        <label for=\"option_b_$i\">2.</label>
                        <input type=\"text\" name=\"opcija_b_$i\" required>
                    </div>
                    <div class=\"input-group\">
                        <label for=\"option_c_$i\">3.</label>
                        <input type=\"text\" name=\"opcija_c_$i\" required>
                    </div>
                    <div class=\"input-group\">
                        <label for=\"option_d_$i\">4.</label>
                        <input type=\"text\" name=\"opcija_d_$i\" required>
                    </div>
                    <div class=\"input-group\">
                        <label for=\"tacan_odgovor_$i\">Redni broj tacnog odgovora za $i. pitanje:</label><br>
                        <select name=\"tacan_odgovor_$i\" required>
                            <option value=\"1\">1</option>
                            <option value=\"2\">2</option>
                            <option value=\"3\">3</option>
                            <option value=\"4\">4</option>
                        </select>
                        <br><br><hr><br><br>
                    </div>
                    ";
                }
            ?>
            <div class="input-group">
                <button type="submit">Napravi kviz</button>
            </div>
        </form>
    </div>
</body>
</html>