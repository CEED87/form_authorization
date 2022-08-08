<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<!-- Форма авторизации -->

    <form id="authoriz" action="profile.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Enter your login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <button type="submit">Log in</button>
        <p>
        Don't have an account? - <a href="/formRegister.php">register</a>!
        </p>
        <!-- <?php
            // if ($_SESSION['message']) {
            //     echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            // } 
            //     unset($_SESSION['message']);
        ?> -->
    </form>

    <script src="/scripts/script.js"></script>

</body>
</html>