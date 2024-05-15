<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    require_once "database.php";

    $kviz_id = rand(1, 2) === 1 ? 1 : 8;
    $_SESSION['kviz_id'] = $kviz_id;

    $sql = "SELECT pitanja.text, opcije.opcija_text
            FROM pitanja
            LEFT JOIN opcije ON pitanja.id = opcije.pitanje_id
            WHERE pitanja.kviz_id = '$kviz_id'";
    $res = mysqli_query($konekcija, $sql);
    
    if ($res) {
        $pitanja = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $pitanja[$row['text']][] = $row['opcija_text'];
        }
    } else {
        echo "Nema dostupnih pitanja za ovaj kviz.";
        exit();
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
    <div class="auth-links">
        <a href="dashboard.php">Povratak na glavni meni</a>
        <br>
        <a href="logout.php">Izloguj se</a>
    </div>
    <div class="header">
        <form action="kviz_rad_process.php" method="POST">
            <?php foreach ($pitanja as $pitanje => $opcije): ?>
                <div class = "radio">
                    <li><?php echo htmlspecialchars($pitanje); ?></li>
                    <?php foreach ($opcije as $opcija): ?>
                    <label>
                        <input type="radio" name="<?php echo htmlspecialchars($pitanje); ?>" value="<?php echo htmlspecialchars($opcija); ?>">
                        <?php echo htmlspecialchars($opcija); ?>
                    </label><br>
                    <?php endforeach; ?>
                    <br><br><hr><br><br>
                </div>
            <?php endforeach; ?>
            <div class="input-group">
                <button type="submit">Potvrdi</button>
            </div>
        </form>
    </div>
</body>
</html>