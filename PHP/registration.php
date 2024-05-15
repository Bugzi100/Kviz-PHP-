<?php
    session_start();
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
            <h2>Registracija</h2>
        </header>
    </div>
    <?php
        if (isset($_POST["register"])) {
            $korisnicko = $_POST["username"];
            $lozinka = $_POST["password"];

            $lozinka_hash = password_hash($lozinka, PASSWORD_DEFAULT);

            $errors = array();

            require_once "database.php";
            $username_query = "SELECT id FROM korisnici WHERE username = '$korisnicko'";
            $res = mysqli_query($konekcija, $username_query);
            $rows = mysqli_num_rows($res);
            if ($rows > 0) {
                array_push($errors, "Korisnicko ime vec postoji! Unesite drugo.");
            }

            if (empty($korisnicko) OR empty($lozinka)) {
                array_push($errors, "Niste uneli korisnicko ime ili lozinku!");
            }

            if (!filter_var($korisnicko, FILTER_SANITIZE_STRING)) {
                array_push($errors, "Korisnicko ime nije validno!");
            }

            if ($res -> num_rows > 0) {
                array_push($errors, "Korisnicko ime je zauzeto! Odaberite drugo.") ;
            }

            if (strlen($lozinka) < 8) {
                array_push($errors, "Lozinka mora imati minimalno 8 karaktera!");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class=\"error-message\">$error</div>";
                }
            } else {
                $insert = "INSERT INTO korisnici (username, password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($konekcija);
                $prepareStmt = mysqli_stmt_prepare($stmt, $insert);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ss", $korisnicko, $lozinka_hash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class=''>Uspesno ste se registrovali!</div>";
                    mysqli_stmt_close($stmt);
                } else {
                    die ("Doslo je do greske! Pokusajte ponovo.");
                }
            }
        }
    ?>
    <form action="registration.php" method="POST">
        <div class="input-group">
            <input type="text" name="username" placeholder="Korisnicko ime:">
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Lozinka:">
        </div>
        
        <div class="input-group">
            <input type="submit" value="Registruj se" name="register">
        </div>
    </form>
    <div class="auth-links">
        <div><a href="login.php">Prijavi se na postojeci nalog</a></div>
    </div>
</body>
</html>