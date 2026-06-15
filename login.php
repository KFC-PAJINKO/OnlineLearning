<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LoginPage</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <img src="background.png" alt="logo" class="logo">
        <section class="login">
            <h1 data-i18n="loginpage">Login page</h1>
            <div class="logincon">                
                <form action="connect.php" method="post">
                    <label data-i18n="loginusername" for="username" >Username:</label>
                    <input type="text" name="username" id="username" size="40">
                    <label data-i18n="loginusername" for="password">Password:</label>
                    <input type="text" name="password" id="password">
                    <input data-i18n="loginsubmit" type="submit" name="submit" value="submit" id="submit">
                    <a data-i18n="createacc" href="register.php">Create new account</a>                    
                </form>
            </div>
        </section>
    </body>
</html>