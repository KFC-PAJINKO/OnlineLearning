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
        <section class="top">
            <a data-i18n="navhome" href="admin.php">Home</a>
            <a data-i18n="navlogout" href="login.php">LogOut</a>
            <form action="admin.php" method="get" enctype="multipart/form-data">
                <input data-i18n-placeholder="navsearch" type="text" name="sbar" placeholder="Search...">
            </form>
            <div class="pagetag">
                <h1 data-i18n="moreinfo" >Moreinfo</h1>
            </div>            
        </section>
        <section class="info">            
            <?php
                if($result = $conn->query($q))
                {
                    if($result->num_rows > 0)
                    {
                        $minfo = $result->fetch_assoc();
                        ?>                        
                        <div class='desinfo'>
                            <h1 data-i18n="courseintro" >Course Introduction: </h1>
                            <?php echo "<p>".$minfo['description']."</p>"; ?>
                        </div>
                        <div class='generalinfo'>                            
                            <div class='cpic'>   
                                <h1 data-i18n="cimg" >Course Image:</h1>     
                                <div class="cpicborder">                                                 
                                <?php echo "<img src='data:image/jpeg;base64," . base64_encode($minfo['pic']) . "' alt='Guitar Image'>"; ?>
                                </div>
                            </div> 
                            <div class='coursecontent'>
                                <div class="courseinfo">
                                    <?php echo "<p data-i18n='cid' >CourseID: " . $minfo['cid'] . "</p>"; ?>
                                    <?php echo "<p data-i18n='cname' >CourseName: " . $minfo['des'] . "</p>"; ?>
                                    <p data-i18n="ctopic" >CourseTopic:</p>
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
                                                                echo "<a href=". $ta['url'] . ">Click here</a>";
                                                                echo "</div>";
                                                            }
                                                        if(isset($ta['vid']) && !empty($ta['vid']))
                                                            {
                                                                echo "<div class='linkvid'>";
                                                                echo "<a href='video.php?id=". $ta['cid']. "'>See Video</a>";
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
    </body>
</html>