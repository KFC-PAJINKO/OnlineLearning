<?php
    require("connect.php");
    $did = $_GET['id'];
    $d = "select * from info where cid = $did";
    $c = "select * from topic where cid = $did";
    $t = [];
    $result = $conn->query($d)
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Editinfo</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="edit.css">
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
            <?php while($row = $result->fetch_array()): ?>
                <div class="left">
                    <?php echo '<p data-i18n="curpic" >Current Picture: </p>'; ?>
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['pic']) . '" alt="Guitar Image">'; ?>
                </div>
                <div class="right">
                    <div class="rleft">
                        <h1 data-i18n="editc" >Edit Course</h1>                    
                        <form action="connect.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                            <p data-i18n="upimg" >Upload image:</p>
                            <input type="file" name="pic" id="pic">
                            <p data-i18n="cname" >CourseName:</p>
                            <input type="text" maxlength="25" length="20" name="descriptext" id="descriptext" value="<?php echo $row['des']; ?>">
                            <p data-i18n="cintro" >CourseIntroduction:</p>
                            <textarea cols="50" rows="10" name="description" id="description"><?php echo $row['description']; ?></textarea>
                            <p data-i18n="subtext" >submit when finish!</p>
                            <input type="submit" name="submitedit" id="submitedit">
                        </form>   
                    </div>
                    <div class="rright">
                        <h1 data-i18n="addt" >Add Topic</h1>
                        <form action="connect.php" method="post" enctype="multipart/form-data">
                            <div class="inputleft">
                                <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                                <p data-i18n="tname" >TopicName:</p> 
                                <input type="text" name="topicname">
                                <p data-i18n="tdes" >TopicDescription:</p>
                                <input type="text" name="topicdescription">
                                <p data-i18n="url" >URL:</p>
                                <input type="text" name="url">
                            </div>
                            <div class="inputright">
                                <p data-i18n="upvid" >UploadVideo:</p>
                                <input type="file" name="upvideo">                
                                <input data-i18n="subedit" type="submit" name="submittopic" value="submit">
                            </div>
                        </form>                
                        <div class="topicitemborder">
                            <?php
                                if($topic = $conn->query($c))
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
                                                <div class="tbutton">
                                                    <form>
                                                        <input type="submit" name="edittopic" value="edit">
                                                        <input type="submit" name="deletetopic" value="delete">
                                                    </form>
                                                </div>
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
            <?php endwhile; ?> 
        </section>
    </body>
</html>