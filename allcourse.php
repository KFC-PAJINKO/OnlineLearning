<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('connect.php');
    $promo = [];
    $info = [];

    $pro = "select * from promotion";
    $s = "select cid, pic, des from info";


    if($proresult = $conn->query($pro))
        {
            while($prorow = $proresult->fetch_assoc())
                {
                    $promo[] = $prorow;
                }
        }
    if($result = $conn->query($s))
            {
                while($row = $result->fetch_assoc())
                    {
                        $info[] = $row;
                    }
            }   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="allcourse.css">
        </head>
    <bodY>
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
        <script src="langicon.js"></script>
        <section class="content">
            <div class="promotion">
                <input type="button" value=">" id="next">
                <input type="button" value="<" id="back">
                <a href="addpromotion.php">
                    <input type="submit" value="+" id="add">
                </a>
                <input type="submit" value="-" id="del">
                <a href="edit.php">
                    <input type="submit" value="e" id="edit">
                </a>
                <div class="slider-viewport">
                    <div class="promo-slider-wrapper">
                        <?php foreach ($promo as $prom): ?>
                            <div class="procard">
                                <div class="procardimg">                              
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($prom['pic']) . '" alt="promotion Image">'; ?>
                                </div>  
                                <div class="prodes">
                                    <h1><?php echo $prom['pname'] ?></h1>
                                    <p><?php echo $prom['pdes'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>                
                <script src="proslide.js"></script>
            </div>
            <div class="allcourse">
                <div class="titletext">
                    <p>All Course</p>
                </div>
                <div class="coursecontent">
                    <?php foreach ($info as $inf): ?>
                        <div class="subcon">                
                            <div class="itemimg">
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($inf['pic']) . '" alt="Guitar Image">'; ?>                       
                            </div>
                            <div class="description">
                                <h3>Subject:</h3>
                                <p><?php echo $inf['des'] ?></p>
                            </div>
                            <div class="button">
                                <a href="edit.php?id=<?php echo $inf['cid']; ?>">
                                    <input type="button" name="edit" value="Edit">
                                </a>
                                <a href="readmore.php?id=<?php echo $inf['cid']; ?>">
                                    <input type="button" name="minfo" value="read more">
                                </a>
                                <form action="connect.php" method="post">
                                    <input type="hidden" name="cid" value="<?php echo $inf['cid']; ?>">
                                    <input type="submit" name="delete" value="delete">
                                </form>
                            </div>                                               
                        </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        </section>
        <div class="addbutton">
            <a href="add.php">
                <input type="button" name="addbut" value="+">
            </a>            
        </div>
        <script src="translate.js"></script>
    </body>
</html>