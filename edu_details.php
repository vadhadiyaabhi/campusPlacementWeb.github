<?php

    session_start();
    if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] != true)
    {
        header("location: login.php");
        exit;
    }
    $username = $_SESSION['username'];  
    include '_db_Connect.php';
    $sql = "SELECT * FROM resume WHERE username='$username'";
    // $con = mysqli_connect('localhost','root');
    // $a = mysqli_select_db($con,'eplacement');
    // echo $a;
    // $q = select * from resume where username=$_SESSION['username'] ;
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    mysqli_close($con);
    $row = mysqli_fetch_array($result);
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>My Profile</title>
</head>

<body class="border">
  <div class="mx-3 my-3">
    <h4 style="display: inline; font-size: larger;">Educational Details</h4>
    <a href="ededit.php" class="mx-2"><b>Edit</b></a>
  </div>
  <div class="row mx-2">
    <b>College</b>
  </div>
  <div class="row mx-2">
    <div class="col-12">
      <div class="my-1" style="width: 90%;">
      <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['clg']; ?>" disabled>
      </div>
    </div>
  </div>
  <div class="row mx-2 mt-3">
    <b>University</b>
  </div>
  <div class="row mx-2">
    <div class=" col-12">
      <div class="my-1" style="width: 90%;">
        <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['uni']; ?>" disabled>
      </div>
    </div>
  </div>
  <div class="row mx-2">
    <div class="col-sm-4 col-12">
      <div class="row  mt-3">
        <b>State</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['state']; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="col-sm-5 col-12">
      <div class="row  mt-3">
        <b>Enrollment</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['enroll']; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="col-sm-2 col-12">
      <div class="row  mt-3">
        <b>Branch</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['branch']; ?>" disabled>
        </div>
      </div>
    </div>
  </div>
  <div class="row mx-2">
    <div class="col-sm-4 col-12">
      <div class="row  mt-3">
        <b>Current Sem</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['sem']; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-12">
      <div class="row  mt-3">
        <b>cpi</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['cpi']; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-12">
      <div class="row  mt-3">
        <b>Total block/s or KT</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['block']; ?>" disabled>
        </div>
      </div>
    </div>
  </div>
  



  <div class="mx-3 mt-5"> after updating your details refresh the page or login again then it'll be updated...
  </div>






  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
    crossorigin="anonymous"></script>

</body>

</html>