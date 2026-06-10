<?php
    require("connect.php");
    $did = $_GET['id'];
    $d = "select * from info where cid = $did";
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
                    </div>             
                </div>   
            <?php endwhile; ?>       
        </section>
    </body>
</html>