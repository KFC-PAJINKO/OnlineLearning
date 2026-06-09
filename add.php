<!DOCTYPE html>
<html>
    <head>
        <title>Addinfopage</title>
        <link rel="stylesheet" href="add.css">
    </head>
    <body>
        <section class="addsec">
            <div class="cinfo">
                <form action="connect.php" method="post" enctype="multipart/form-data">                
                    <h1>Add Course</h1>
                    <p>Upload image:</p>
                    <input type="file" name="pic" id="pic">
                    <p>CourseName:</p>
                    <input type="text" maxlength="25" length="20" name="descriptext" id="descriptext">
                    <p>CourseIntroduction:</p>
                    <textarea cols="50" rows="20" name="description" id="description"></textarea>
                    <p>submit when finished!</p>
                    <input type="submit" name="submitup" id="submitup">
                </form>
            </div>
            <div class="ctopic">
                <h1>Add Course Topic</h1>
                <form action="connect.php" method="post">
                    <input type="hidden" name="cid" value="<?php echo $inf['cid']; ?>">
                    <p>TopicName:</p>
                    <input type="text" name="topicname">
                    <p>TopicDescription</p>
                    <input type="text" name="topicdescription">
                    <input type="submit" name="submittopic" value="submit">
                </form>
                <div class="topicshow">
                    
                </div>
            </div>
        </section>
    </body>
</html>