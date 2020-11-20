<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webfejlesztés beadandó</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!--Information section-->
    <div class="information-box">
        <p>Név: Loós Tamás</p>
        <br>
        <p>Neptun kód: TJ7DFK</p>
        <br>
        <p>Az általam megcélzott érdemjegy: 4</p>
        <br>
        <p>A forrást felraktam <a href="https://github.com/Yhennon/webfejlesztes-beadando/">githubra</a></p>
    </div>

    <!--Login section -->
    <form class="login-box" action="login.php" method="post">
        <h2>Login</h2>
        <input type="text" name="username-area" placeholder="Username">
        <input type="password" name="password-area" placeholder="Password">

        <input type="submit" name="submit-button" value="Login">
    </form>
</body>

</html>