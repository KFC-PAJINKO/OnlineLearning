<?php
    require("connect.php");
    $cid = $_GET['id'];
    $stmt = $conn->prepare("select vid from topic where cid = ?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            header("Content-Type: video/mp4");
            header("Content-Length: " . strlen($row['vid'])); 
            echo $row['vid'];
            exit();
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>vidro page</title>
    </head>
    <body style="display: flex; flex-direction: column; align-items: center;">
        <div class="content" style="margin-top:10%">
            <video width="500" height="350" controls>
                <source src="video.php?id=<?= $cid ?>" type="video/mp4">
            </video>
        </div>
    </body>
</html>