<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CourseRegister</title>
        <link rel="stylesheet" href="regiscourse.css">
    </head>
    <body>
        <section class="top">
            <a href="user.php">Home</a>
            <a href="login.php">LogOut</a>
            <form action="user.php" method="get" enctype="multipart/form-data">
                <input type="text" name="sbar" placeholder="Search...">
            </form>
            <div class="pagetag">
                <h1>User</h1>
            </div>            
        </section>
        <section class="fillform">
            <form action="connect.php" method="post">
                <p>FirstName: </p>
                <input type="text" name="fname">
                <p>LastName: </p>
                <input type="text" name="lname">
                <input type="submit" name="recoursesubmit" value="submit">
            </form>
        </section>
    </body>
</html>