<!DOCTYPE html>
<html>
    <head>
        <title>RegisterPage</title>
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <img src="background.png" alt="logo" class="logo">
        <section class="register">
            <h1>Register page</h1>
            <div class="registercon">                
                <form action="connect.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="usernameregis" id="username" size="40">
                    <label for="password">Password:</label>
                    <input type="text" name="passwordregis" id="password">
                    <label for="confirmpassword">ConfirmPassword</label>
                    <input type="text" name="confirmpassword" id="confirmpassword">
                    <input type="submit" name="submitregis" value="submit" id="submit">    
                    <a href="login.php">Already have an account?</a>          
                </form>
            </div>
        </section>
    </body>
</html>