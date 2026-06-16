<!DOCTYPE html>
<html>
    <head>
        <title>Addinfopage</title>
        <link rel="stylesheet" href="add.css">
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
        <section class="addsec">
            <div class="cinfo">
                <form action="connect.php" method="post" enctype="multipart/form-data">                
                    <h1 data-i18n="add.addc" >Add Course</h1>
                    <p data-i18n="add.upimg" >Upload image:</p>
                    <input type="file" name="pic" id="pic">
                    <p data-i18n="add.cname" >CourseName:</p>
                    <input type="text" maxlength="25" length="20" name="descriptext" id="descriptext">
                    <p data-i18n="add.cintro" >CourseIntroduction:</p>
                    <textarea cols="45" rows="15" name="description" id="description"></textarea>
                    <p data-i18n="add.submittext" >submit when finished!</p>
                    <input data-i18n-value="add.submitbot" type="submit" name="submitup" id="submitup">
                </form>
            </div>
        </section>
        <script src="translate.js"></script>
    </body>
</html>