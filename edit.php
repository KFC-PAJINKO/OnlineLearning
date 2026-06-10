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
            <a href="admin.php">Home</a>
            <a href="login.php">LogOut</a>
            <form action="admin.php" method="get" enctype="multipart/form-data">
                <input type="text" name="sbar" placeholder="Search...">
            </form>
            <div class="pagetag">
                <h1>Admin</h1>
            </div>            
        </section>
        <section class="addsec"> 
            <?php while($row = $result->fetch_array()): ?>
                <div class="left">
                    <?php echo '<p>Current Picture: </p>'; ?>
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['pic']) . '" alt="Guitar Image">'; ?>
                </div>
                <div class="right">
                    <div class="rleft">
                        <h1>Edit Course</h1>                    
                        <form action="connect.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                            <p>Upload image:</p>
                            <input type="file" name="pic" id="pic">
                            <p>CourseName:</p>
                            <input type="text" maxlength="25" length="20" name="descriptext" id="descriptext" value="<?php echo $row['des']; ?>">
                            <p>CourseIntroduction:</p>
                            <textarea cols="50" rows="10" name="description" id="description"><?php echo $row['description']; ?></textarea>
                            <p>submit when finish!</p>
                            <input type="submit" name="submitedit" id="submitedit">
                        </form>   
                    </div>
                    <div class="rright">
                        <h1>Add Topic</h1>
                        <form action="connect.php" method="post">
                            <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                            <p>TopicName:</p> 
                            <input type="text" name="topicname">
                            <p>TopicDescription:</p>
                            <input type="text" name="topicdescription">
                            <p>URL:</p>
                            <input type="text" name="url">
                            <input type="submit" name="submittopic" value="submit">
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