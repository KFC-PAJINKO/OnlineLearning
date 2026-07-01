<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('connect.php');
    $info = [];
    $promo = [];
    $popular = [];

 
    if (isset($_GET['sbar']) && !empty(trim($_GET['sbar']))) 
        {            
            $search = $conn->real_escape_string($_GET['sbar']);
            $s = "select cid, pic, des from info where des like '%$search%'";
        } 
    else 
        {
            $s = "select cid, pic, des from info";
        }
    if(isset($_GET['asc']))
    {
        if(isset($_GET['fil']))
            {
                $s .= " order by  " . $_GET['fil'] . " asc";
            }
        else
            {
                $s .= " order by des asc";
            }
    }
    if(isset($_GET['desc']))
        {
            if(isset($_GET['fil']))
                {
                    $s .= " order by  " . $_GET['fil'] . " desc";
                }
            else
                {
                    $s .= " order by des desc";
                }
        }
    if($result = $conn->query($s))
        {
            while($row = $result->fetch_assoc())
                {
                    $info[] = $row;
                }
        }   

    $pro = "select * from promotion";

    if($proresult = $conn->query($pro))
        {
            while($prorow = $proresult->fetch_assoc())
                {
                    $promo[] = $prorow;
                }
        }

    $pop = "select cid, pic, des, description from info limit 4";

    if($popresult = $conn->query($pop))
        {
            while($poprow = $popresult->fetch_assoc())
                {
                    $popular[] = $poprow;
                }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="admin.css">
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
        <!-- <div class="filter">            
            <form action="admin.php" method="get">
                <div class="fbut">
                    <label data-i18n="admin.filter" >Filter</label>
                    <input data-i18n="admin.filtasc" type="submit" name="asc" value="asc">
                    <input data-i18n="admin.filtdesc" type="submit" name="desc" value="desc">
                </div>
                <br>
                <div class="fop">
                    <label data-i18n="admin.tfilter" >type of filter:</label>
                    <select name="fil">
                        <option data-i18n="admin.filtname" value="des">Name</option>
                        <option data-i18n="admin.filid" value="cid">ID</option>
                    </select>
                </div>
            </form>
        </div> -->
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
            <h1 id="popp" data-i18n="admin.popcourse">Popular Course🔥🔥🔥:</h1>
            <div class="pcline">
                <div class="popcourse">
                    <?php foreach ($popular as $pop): ?>
                        <div class="popc">
                            <div class="popcinfo">
                                <div class="picborder">
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($pop['pic']) . '" alt="promotion Image">'; ?>
                                </div>                            
                                <div class="popdes">
                                    <p><?php echo $pop['des'] ?></p>
                                    <p><?php echo $pop['description'] ?></p>
                                </div>
                            </div>
                            <div class="botcard">
                                <div class="poprate">
                                    <img src="star.png">
                                    <label>4.5</label>
                                </div>
                                <div class="regisbut">
                                    <a href="readmore.php?id=<?php echo $pop['cid']; ?>">
                                        <input data-i18n-value="admin.register" type="button" name="regisc" value="Register" id="regis">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="pclinehr">
                    <hr>
                </div>
            </div>
            <div class="consubcon">
                <div class="contentwrap">
                    <h1>Other Course</h1>
                    <div class="contentscroll">
                        <?php foreach ($info as $inf): ?>
                            <div class="subcon">                
                                <div class="itemimg">
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($inf['pic']) . '" alt="Guitar Image">'; ?>                       
                                </div>
                                <div class="desbutton">
                                    <div class="description">
                                        <h3 data-i18n="admin.consub" >Subject:</h3>
                                        <p><?php echo $inf['des'] ?></p>
                                    </div>
                                    <div class="button">
                                        <a href="edit.php?id=<?php echo $inf['cid']; ?>">
                                            <input data-i18n-value="admin.edititem" type="button" name="edit" value="edit">
                                        </a>
                                        <a href="readmore.php?id=<?php echo $inf['cid']; ?>">
                                            <input data-i18n-value="admin.readmoreitem" type="button" name="minfo" value="read more">
                                        </a>
                                        <form action="connect.php" method="post">
                                            <input type="hidden" name="cid" value="<?php echo $inf['cid']; ?>">
                                            <input data-i18n-value="admin.deleteitem" type="submit" name="delete" value="delete">
                                        </form>
                                    </div> 
                                </div>                                           
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div> 
                <div class="contentwrap">
                    <h1>You may interest</h1>
                    <div class="contentscroll">
                        <?php foreach ($info as $inf): ?>
                            <div class="subcon">                
                                <div class="itemimg">
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($inf['pic']) . '" alt="Guitar Image">'; ?>                       
                                </div>
                                <div class="desbutton">
                                    <div class="description">
                                        <h3 data-i18n="admin.consub" >Subject:</h3>
                                        <p><?php echo $inf['des'] ?></p>
                                    </div>
                                    <div class="button">
                                        <a href="edit.php?id=<?php echo $inf['cid']; ?>">
                                            <input data-i18n-value="admin.edititem" type="button" name="edit" value="edit">
                                        </a>
                                        <a href="readmore.php?id=<?php echo $inf['cid']; ?>">
                                            <input data-i18n-value="admin.readmoreitem" type="button" name="minfo" value="read more">
                                        </a>
                                        <form action="connect.php" method="post">
                                            <input type="hidden" name="cid" value="<?php echo $inf['cid']; ?>">
                                            <input data-i18n-value="admin.deleteitem" type="submit" name="delete" value="delete">
                                        </form>
                                    </div> 
                                </div>                                           
                            </div>
                        <?php endforeach; ?>
                    </div>                                      
                </div>       
            </div>
            <div class="explorbut">
                <a href="allcourse.php">
                    <input data-i18n-value="admin.allcourse" type="button" value="AllCourse" id="allcbut">
                </a>
                <a href="allcourse.php">
                    <input data-i18n-value="admin.allcourse" type="button" value="AllCourse" id="allcbut">
                </a> 
                <a href="allcourse.php">
                    <input data-i18n-value="admin.allcourse" type="button" value="AllCourse" id="allcbut">
                </a>                             
            </div>
        </section>
        <section class="bottom">
            <p>end here</p>
        </section>
        <div class="addbutton">
            <a href="add.php">
                <input type="button" name="addbut" value="+">
            </a>            
        </div>
        <script src="translate.js"></script>
    </bodY>
</html>