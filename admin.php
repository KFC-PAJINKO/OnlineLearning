<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('connect.php');
    $info = [];

 
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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <bodY>
        <!-- <img src="wallpaper.jpg" alt="wallpaper" class="wallpaper"> -->
        <section class="top">
            <a data-i18n="admin.navhome" href="admin.php">Home</a>
            <a data-i18n="admin.navlogout" href="login.php">LogOut</a>
            <form action="admin.php" method="get" enctype="multipart/form-data">
                <input data-i18n-placeholder="admin.navsearch" type="text" name="sbar" placeholder="Search...">
            </form>
            <div class="pagetag">
                <h1 data-i18n="admin.navadmin" >Admin</h1>
            </div>            
        </section>
        <div class="filter">            
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
                    <br>
                    <label data-i18n="admin.langswitch">Language:</label>
                    <select id="language-switcher">
                        <option value="eng">Eng</option>
                        <option value="thai">Thai</option>
                    </select>                    
                </div>
            </form>
        </div>
        <section class="content">
            <?php foreach ($info as $inf): ?>
                <div class="subcon">                
                    <div class="itemimg">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($inf['pic']) . '" alt="Guitar Image">'; ?>                       
                    </div>
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
            <?php endforeach; ?>            
        </section>
        <div class="addbutton">
            <a href="add.php">
                <input type="button" name="addbut" value="+">
            </a>            
        </div>
        <script src="translate.js"></script>
    </bodY>
</html>