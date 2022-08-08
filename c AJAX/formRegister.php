<?php
     session_start();
     if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->


    <form id="register" action="/register" method="POST">
        <label>Login</label>
        <input type="text" name="login" placeholder="Enter your login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <label>Confirm password</label>
        <input type="password" name="password_confirm" placeholder="Confirm the password">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email address">
        <label>Name</label>
        <input type="text" name="full_name" placeholder="Enter your full name">
        <button type="submit">Registration</button>
        <p>
        Do you already have an account? - <a href="/index.php">log in</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

    
    <script src="/scripts/script.js"></script>
</body>
</html>