<?php

    session_start();
    if(!isset($_SESSION['Rec_LOGIN']) || $_SESSION['Rec_LOGIN'] != true)
    {
        header('location: login.php');
        exit;
    }
    include '_db_Connect.php';
    $com_name = $_GET['com_name']; 
    $jobid = $_GET['jobid']; 
    // echo $com_name;
    // echo $jobid;
    $q = "SELECT * FROM jobinfo WHERE (com_name = '$com_name' AND jobid = '$jobid')";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $row=mysqli_fetch_array($result);
    }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Company-Job Details</title>
    <link rel="stylesheet" href="com_det.css">
    <link href="logo.jpg" rel="shortcut icon">
</head>
<body>
    
    <br>
    <hr>
    <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
    <div class="mx-4" style="display: inline-block; font-size:larger; font-weight:600;">
        Company Details which you have entered in add job form
    </div>
    <hr>

    <div class="d1 border">
        <div class="row my-2">
            <div class="col-12 col-md-6">
               <b> Company Name:</b> <?php echo $row['com_name']; ?>
            </div>
            <div class="col-12 col-md-6">
               <b> Work Place:</b> <?php echo $row['work_Place']; ?>
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-12">
               <b>Collage </b> In which this Job notification is reliesed: <i> <?php echo $row['clg']; ?></i> &nbsp; And &nbsp; <b> jobid </b>is <?php echo $row['jobid']; ?>
            </div>
        </div>
        <hr>
        <div class="row my-1">
            <div class="col-12 col-md-3">
               <b> Vacancies: </b> <?php echo $row['vacancies']; ?>
            </div>
            <div class="col-12 col-md-5">
               <b> Work Place:</b> <?php echo $row['work_Place']; ?>
            </div>
            <div class="col-12 col-md-4">
               <b> Bond Year:</b> <?php echo $row['bond_year']; ?>
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-12 col-md-6">
               <b> Salary: </b> <?php echo $row['salary'] . "per month"; ?>
            </div>
            <div class="col-12 col-md-6">
               <b> Working hours:</b> <?php echo $row['working_Hours']; ?>
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-12">
                
                <b>-><?php echo $row['interview_rounds']; ?> rounds </b> of interview will be there
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-12 col-md-6">
               <b> 1<sup>st</sup> Round test on </b> <?php echo $row['mock_test_date'];?>
            </div>
            <div class="col-12 col-md-6">
               <b>Last day to apply:</b> <?php echo $row['last_date_apply']; ?>
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-12">
               <b> Technology</b> required to apply in this job is <b><?php echo $row['tech1'] . " and " . $row['tech2']; ?></b>
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-12 border border-dark">
               <?php echo $row['desc']; ?>
            </div>
        </div>
        
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
</html>