<!DOCTYPE html>
<html>
    <head>
        <title>Addinfopage</title>
        <link rel="stylesheet" href="add.css">
    </head>
    <body>
        <section class="top">
            <a data-i18n="navhome" href="admin.php">Home</a>
            <a data-i18n="navlogout" href="login.php">LogOut</a>
            <form action="admin.php" method="get" enctype="multipart/form-data">
                <input data-i18n="navsearch" type="text" name="sbar" placeholder="Search...">
            </form>
            <div class="pagetag">
                <h1 data-i18n="navadmin" >Admin</h1>
            </div>            
        </section>
        <section class="addsec">
            <div class="cinfo">
                <form action="connect.php" method="post" enctype="multipart/form-data">                
                    <h1 data-i18n="addc" >Add Course</h1>
                    <p data-i18n="upimg" >Upload image:</p>
                    <input type="file" name="pic" id="pic">
                    <p data-i18n="cname" >CourseName:</p>
                    <input type="text" maxlength="25" length="20" name="descriptext" id="descriptext">
                    <p data-i18n="cintro" >CourseIntroduction:</p>
                    <textarea cols="50" rows="20" name="description" id="description"></textarea>
                    <p data-i18n="submittext" >submit when finished!</p>
                    <input data-i18n="submitbot" type="submit" name="submitup" id="submitup">
                </form>
            </div>
        </section>
    </body>
</html>