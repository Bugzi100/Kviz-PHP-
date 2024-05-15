<?php
    session_start();
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
    <?php
        if (isset($_POST["login"])) {
            $korisnicko = $_POST["username"];
            $lozinka = $_POST["password"];

            require_once "database.php";
            $input = "SELECT * FROM korisnici WHERE username = '$korisnicko'";
            $res = mysqli_query($konekcija, $input);
            $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($lozinka, $user["password"])) {
                    $_SESSION["user"] = "yes";
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION["username"] = $korisnicko;
                    setcookie('user_id', $_SESSION['user_id'], time() + 3600, '/', '', false, true);
                    setcookie('username', $_SESSION['username'], time() + 3600, '/', '', false, true);
                    header("Location: dashboard.php");
                    die();
                } else {
                    echo "<div class=\"error-message\">Pogresna lozinka!</div>";
                }
            } else {
                echo "<div class=\"error-message\">Pogresno korisnicko ime!</div>";
            }
        }
    ?>
    <form action="login.php" method="POST">
        <div class="input-group">
            <input type="text" name="username" placeholder="Korisnicko ime:">
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Lozinka:">
        </div>
        
        <div class="input-group">
            <input type="submit" value="Prijavi se" name="login">
        </div>
    </form>
    <div class="auth-links">
        <a href="registration.php">Registruj se</a>
    </div>
</body>
</html>