<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CourseRegister</title>
        <link rel="stylesheet" href="regiscourse.css">
    </head>
    <body>
       <section class="top">
            <a data-i18n="admin.navhome" href="admin.php">Home</a>
            <a data-i18n="admin.navlogout" href="login.php">LogOut</a>
            <form action="admin.php" method="get" enctype="multipart/form-data">
                <input data-i18n-placeholder="admin.navsearch" type="text" name="sbar" placeholder="Search...">
            </form>
            <div class="pagetag">
                <h1 data-i18n="admin.navadmin" >Admin</h1>
                <div class="changelang">
                    <select id="language-switcher">
                        <option value="eng">Eng</option>
                        <option value="thai">Thai</option>
                    </select>  
                </div>
            </div>            
        </section>
        <section class="fillform">
            <form action="connect.php" method="post">
                <label>FirstName: </label>
                <input type="text" name="fname">
                <label>LastName: </label>
                <input type="text" name="lname">
                <br>
                <label>PhoneNumber:</label>
                <input type="text" name="phonenum">
                <label>StudyType:</label>
                <select name="studytype">
                    <option value="online">Online</option>
                    <option value="onsite">Onsite</option>
                </select>
                <br>
                <div class="submitbut">
                    <input type="submit" name="recoursesubmit" value="submit">
                </div>
            </form>
        </section>
    </body>
</html>