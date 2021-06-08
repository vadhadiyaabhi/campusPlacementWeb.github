<?php

$err="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $tech = $_POST['tech'];
    $language = $_POST['language'];
    $com_name = $_POST['com_name'];
    $jobid = $_POST['jobid'];
    
    // echo $tech;
    
}

session_start();
if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] != true)
    {
        header("location: login.php");
        exit;
    }
    $err = false;

$username = $_SESSION['username'];
// echo $username;
// echo $tech;
// echo $language;
include '_db_Connect.php';
$q = "SELECT * FROM resume WHERE (tech1 = '$tech' OR tech2 = '$tech') AND (language1 = '$language' OR language2 = '$language') AND (username IN ('$username'))";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
$row1=mysqli_fetch_array($result);
// echo $num;

// mysqli_close($con);

if($num == 1)
{
    // $username = $_SESSION['username'];
    $q1 = "SELECT * FROM status WHERE (username = '$username' AND applied = 'true' AND jobid = '$jobid' AND com_name = '$com_name')";
    $result1 = mysqli_query($con,$q1);
    $num = mysqli_num_rows($result1);
    if($num >= 1){
        $err = true;
    }
    else{
        $q = "INSERT INTO status (username, applied, com_name, jobid) values ('$username', 'true', '$com_name', '$jobid');";
        $result = mysqli_query($con, $q);
        header('location: Success.html');
    }
}
else{
    header('location: fail.html');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($err){ ?>
        You have already aaplied in this compnay"; <br>
        Try another; <br>
        Better Luck Next Time ! <a href="job_details.php">Go to Job Details</a>
    <?php } ?>
</body>
</html>