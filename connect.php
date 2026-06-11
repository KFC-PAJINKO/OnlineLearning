<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "user";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['submit']))
        {
            $username = $conn -> real_escape_string($_POST['username']);
            $password = $conn -> real_escape_string($_POST['password']);

            $q = "select username, password from user where username = '$username' and password = '$password'";
            $result = $conn -> query($q);
            if($result && $result->num_rows > 0)
            {
                $_SESSION['username'] = $username;
                if($username == "admin")
                {
                    header('location:admin.php');
                    exit();
                }
                else
                    {
                        header('location:user.php');
                        exit();
                    }
            }
            else
            {
                echo "Login Failed";
            }
        }

    if(isset($_POST['submitregis']))
        {
            $username = $conn -> real_escape_string($_POST['usernameregis']);
            $password = $conn -> real_escape_string($_POST['passwordregis']);
            $confirmpassword = $conn -> real_escape_string($_POST['confirmpassword']);

            if($password != $confirmpassword)
            {
                echo "Password does not match";
            }
            else
            {
                $q = "insert into user (username, password) values ('$username', '$password')";
                if($conn -> query($q) === TRUE)
                {
                    echo "New record created successfully";
                    header('location:login.php');
                    exit();
                }
                else
                {
                    echo "Error: " . $q . "<br>" . $conn->error;
                }
            }
        }
    if(isset($_POST['submitup']))
        {
            $tmppic = $_FILES['pic']['tmp_name'];
            $pic = file_get_contents($tmppic);
            $des = $_POST['descriptext'];
            $desc = $_POST['description'];
            $null = null;
            $stmt = $conn->prepare("insert into info (pic, des, description) values (?,?,?)");            
            $stmt -> bind_param("bss",$null,$des,$desc);
            $stmt -> send_long_data(0, $pic);
            $stmt -> execute();
            header("location:admin.php");
            exit();
        }
    
    if(isset($_POST['submitedit']))
        {
            $id = $_POST['cid'];
            $name = $_POST['descriptext'];
            $description = $_POST['description'];
            if(isset($_POST['pic']))
                {
                    $tmpimg = $_FILES['pic']['tmp_name'];
                    $img = file_get_contents($tmpimg);
                    $e = $conn->prepare("update info set pic = ?, des = ?, description = ? where cid = $id");
                    $null = null;
                    $e -> bind_param("bss",$null,$name,$description);
                    $e -> send_long_data(0,$img);
                }
            else
                {
                    $e = $conn->prepare("update info set des = ?, description = ? where cid = $id");
                    $e -> bind_param("ss",$name,$description);
                }
            
            
            $e -> execute();
            header("location:admin.php");
            exit();
        }

    if(isset($_POST['delete']))
        {
            $delid = $_POST['cid'];
            $d = "delete from info where cid = '$delid'";
            if($conn -> query($d) === TRUE)
                {
                    header('location:admin.php');
                    exit();
                }
            else
                {
                    echo "Error: " . $d . "<br>" . $conn->error;
                }
        }
    
    if(isset($_POST['submittopic']))
        {
            $tname = $_POST['topicname'];
            $tdes = $_POST['topicdescription'];
            $status = "unstarted";
            $cid = $_POST['cid'];
            
            if(isset($_POST['url']) && !empty($_POST['url']))
                {
                    $url = $_POST['url'];
                    $vid = null;
                    $topic = "insert into topic (topicname, description, status, cid, url, vid) values ('$tname', '$tdes', '$status', '$cid', '$url', '$vid');";
                    if($conn -> query($topic) == true)
                        {
                            header("Location: edit.php?id=" . $cid);
                            exit();
                        }
                    else
                        {
                            echo "Error: " . $d . "<br>" . $conn->error;
                        }
                }
            if(isset($_FILES['upvideo']) && !empty($_FILES['upvideo']))
                {
                    $tmpvideo= $_FILES['upvideo']['tmp_name'];
                    $vid = file_get_contents($tmpvideo);
                    $topic = $conn->prepare("insert into topic (topicname, description, status, cid, vid) values (?, ?, ?, ?, ?);");
                    $null = null;
                    $topic -> bind_param("sssib",$tname, $tdes, $status, $cid, $null);
                    $topic -> send_long_data(4, $vid);
                    $topic -> execute();
                    header("Location: edit.php?id=" . $cid);
                    exit();                     
                }
        }
?>