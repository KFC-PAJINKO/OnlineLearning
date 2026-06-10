<!DOCTYPE html>
<html>
    <head>
        <title>Addinfopage</title>
        <link rel="stylesheet" href="add.css">
    </head>
    <body>
        <section class="top">
            <a href="admin.php">Home</a>
            <a href="login.php">LogOut</a>
            <form action="admin.php" method="get" enctype="multipart/form-data">
                <input type="text" name="sbar" placeholder="Search...">
            </form>
            <div class="pagetag">
                <h1>Admin</h1>
            </div>            
        </section>
        <section class="addsec">
            <div class="cinfo">
                <form action="connect.php" method="post" enctype="multipart/form-data">                
                    <h1>Add Course</h1>
                    <p>Upload image:</p>
                    <input type="file" name="pic" id="pic">
                    <p>CourseName:</p>
                    <input type="text" maxlength="25" length="20" name="descriptext" id="descriptext">
                    <p>CourseIntroduction:</p>
                    <textarea cols="50" rows="20" name="description" id="description"></textarea>
                    <p>submit when finished!</p>
                    <input type="submit" name="submitup" id="submitup">
                </form>
            </div>
        </section>
    </body>
</html>