<?php
    require("connect.php");
    $cid = $_GET['id'];
    $q = "select * from info where cid = $cid";
    $c = "select * from topic where cid = $cid";
    $t = [];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MoreInfo</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="readmore.css">
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
        <script src="langicon.js"></script>
        <section class="info">            
            <?php
                if($result = $conn->query($q))
                {
                    if($result->num_rows > 0)
                    {
                        $minfo = $result->fetch_assoc();
                        ?>                        
                        <div class='desinfo'>
                            <div class="desinfocon">
                                <div class="desinfoname">
                                    <?php echo "<h1>".$minfo['des']."</h1>";?>
                                </div>
                                <div class="desinfodes">
                                    <?php echo "<p>".$minfo['description']."</p>"; ?>
                                </div>          
                                <div class="regisbut">
                                    <a href="readmore.php?id=<?php echo $pop['cid']; ?>">
                                        <input data-i18n-value="admin.register" type="button" name="regisc" value="Register" id="regisbut">
                                    </a>
                                </div>                      
                            </div>
                        </div>
                        <div class='generalinfo'>                            
                            <div class='cpic'>   
                                <h1 data-i18n="readmore.cimg" >Course Image:</h1>     
                                <div class="cpicborder">                                                 
                                <?php echo "<img src='data:image/jpeg;base64," . base64_encode($minfo['pic']) . "' alt='Guitar Image'>"; ?>
                                </div>
                            </div> 
                            <div class='coursecontent'>
                                <div class="courseinfo">
                                    <p data-i18n="readmore.ctopic" >CourseTopic</p>
                                </div>
                                <div class="coursetopic">
                                <?php if($topic = $conn->query($c))
                                        {
                                            if($topic->num_rows > 0)
                                                {
                                                    while($topicarray = $topic->fetch_assoc())
                                                    {
                                                        $t[] = $topicarray;
                                                    }
                                                    foreach($t as $ta):
                                                    ?>  
                                                    <div class="topicitem">
                                                        <label>TID: </label>
                                                        <?= $ta['tid'] ?>   
                                                        <label>Topic: </label>
                                                        <?= $ta['topicname'] ?> 
                                                        <label>TopicDescription: </label>   
                                                        <?= $ta['description'] ?>
                                                        <label>Status: </label>
                                                        <?= $ta['status'] ?>
                                                        <?php 
                                                        if(isset($ta['url']) && !empty($ta['url']))
                                                            {
                                                                echo "<div class='linkurl'>";
                                                                echo "<a data-i18n='readmore.urllink' href=". $ta['url'] . ">Click here</a>";
                                                                echo "</div>";
                                                            }
                                                        if(isset($ta['vid']) && !empty($ta['vid']))
                                                            {
                                                                echo "<div class='linkvid'>";
                                                                echo "<a data-i18n='readmore.videolink' href='video.php?id=". $ta['cid']. "'>See Video</a>";
                                                                echo "</div>";
                                                            }
                                                        ?>
                                                    </div>      
                                                    <?php
                                                    endforeach;
                                                }
                                            else
                                                {
                                                    echo "no topic yet";
                                                }
                                        }
                                    ?>                                            
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else
                    {
                        echo "no information stored";
                    }
                
                }
                else
                {
                    echo "Database query error.";
                }
                ?>
        </section>
        <script src="translate.js"></script>
    </body>
</html>