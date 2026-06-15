<!DOCTYPE html>
<html>
    <head>
        <title>RegisterPage</title>
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <img src="background.png" alt="logo" class="logo">
        <section class="register">
            <h1 data-i18n="registerpage">Register page</h1>
            <div class="registercon">                
                <form action="connect.php" method="post">
                    <label data-i18n="regisusername" for="username">Username:</label>
                    <input type="text" name="usernameregis" id="username" size="40">
                    <label data-i18n="regispassword"  for="password">Password:</label>
                    <input type="text" name="passwordregis" id="password">
                    <label data-i18n="confirmpass"  for="confirmpassword">ConfirmPassword</label>
                    <input type="text" name="confirmpassword" id="confirmpassword">
                    <input data-i18n="regissubmit" type="submit" name="submitregis" value="submit" id="submit">    
                    <a data-i18n="regissubmit" href="login.php">Already have an account?</a>          
                </form>
            </div>
        </section>
    </body>
</html>