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
        <title>User page</title>
        <link rel="stylesheet" href="user.css">
    </head>
    <bodY>
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
        <div class="filter">            
            <form action="user.php" method="get">
                <div class="fbut">
                    <label>Filter</label>
                    <input type="submit" name="asc" value="asc">
                    <input type="submit" name="desc" value="desc">
                </div>
                <br>
                <div class="fop">
                    <label>type of filter:</label>
                    <select name="fil">
                        <option value="des">Name</option>
                        <option value="cid">ID</option>
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
                        <h3>Subject:</h3>
                        <p><?php echo $inf['des'] ?></p>
                    </div>
                    <div class="button">
                        <a href="readmore.php?id=<?php echo $inf['cid']; ?>">
                            <input type="button" name="minfo" value="read more">
                        </a>
                        <a href="regiscourse.php?id=<?php echo $inf['cid']; ?>">
                            <input type="button" name="regisc" value="register">
                        </a>
                    </div>                                               
                </div>
            <?php endforeach; ?>            
        </section>
        <div class="addbutton">
            <a href="add.html">
                <input type="button" name="addbut" value="+">
            </a>
        </div>
    </bodY>
</html>