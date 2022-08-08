<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div>
        <h2 style="margin: 10px 0;">Hello <?= $_SESSION['user']['full_name'] ?></h2>
        <a href="/pages/signOutProfile.php" class="logout">Exit</a>
    </div>
</body>
</html>