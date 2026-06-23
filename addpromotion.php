<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('connect.php');
    $s = "select cid, pic, des from info";
    $opt = [];

    if($result = $conn->query($s))
        {
            while($row = $result->fetch_assoc())
                {
                    $opt[] = $row;
                }
        }   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Addinfopage</title>
        <link rel="stylesheet" href="addpromotion.css">
    </head>
    <body>
       <section class="navbar">
            <section class="topup">
                <a data-i18n="admin.navcontactus" href="contactus.php">Contact us</a>
                <a data-i18n="admin.navlogout" href="login.php">LogOut</a>
            </section>
            <section class="top">
                <a data-i18n="admin.navhome" href="admin.php">Home</a>
                <a data-i18n="admin.navlogout" href="login.php">LogOut</a>
                <form action="admin.php" method="get" enctype="multipart/form-data">
                    <input data-i18n-placeholder="admin.navsearch" type="text" name="sbar" placeholder="Search...">
                </form>
                <div class="pagetag">
                    <p data-i18n="admin.navadmin" >Admin</p>
                    <div class="changelang">
                        <script src="langicon.js"></script>
                        <img src="eng.png" id="langimg">
                        <select id="language-switcher">
                            <option value="eng">Eng</option>
                            <option value="thai">Thai</option>
                        </select>  
                    </div>
                </div>            
            </section>
        </section>

        <section class="addsec">
            <div class="cinfo">
                <form action="connect.php" method="post" enctype="multipart/form-data">                
                    <h1 data-i18n="" >Add Promotion</h1>
                    <p data-i18n="" >Upload image:</p>
                    <input type="file" name="pic" id="pic">
                    <p data-i18n="" >PromotionName:</p>
                    <input type="text" maxlength="55" length="20" name="proname" id="proname">
                    <p data-i18n="" >PromotionDescription:</p>
                    <textarea cols="45" rows="15" name="prodes" id="prodes"></textarea>
                    <p>Promotion:</p>
                    <input type="text" maxlength="25" length="20" name="pro" id="pro">
                    <p>Choose Course:</p>
                    <select>
                        <option></option>
                    </select>
                    <p data-i18n="" >submit when finished!</p>
                    <input data-i18n-value="add.submitbot" type="submit" name="submitpro" id="submitpro">
                </form>
            </div>
        </section>
        <script src="translate.js"></script>
    </body>
</html>