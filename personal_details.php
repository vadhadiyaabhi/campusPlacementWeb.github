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
    <h4 style="display: inline; font-size: larger;">Personal Details</h4>
    <a href="pdedit.php" class="mx-2"><b>Edit</b></a>
  </div>
  <div class="row mx-4">
    <b>Your Full Name</b>
  </div>
  <div class="row mx-2">
    <div class="col-12 col-sm-5">
      <div class="form-floating my-1" style="width: 90%;">
        <input type="" class="form-control" id="floatingInput" placeholder="name@example.com" disabled>
        <label for="floatingInput">
          <?php echo $row['fname'] ?>
        </label>
      </div>
    </div>
    <div class="col-sm-5 col-12">
      <div class="form-floating my-1" style="width: 90%;">
        <input type="" class="form-control" id="floatingInput" placeholder="name@example.com" disabled>
        <label for="floatingInput">
          <?php echo $row['lname'] ?>
        </label>
      </div>
    </div>
  </div>
  <div class="row mx-2">
    <div class="col-sm-5 col-12">
      <div class="row mx-2  mt-3">
        <b>Mobile Number</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['mobile']; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="col-sm-5 col-12">
      <div class="row mx-2  mt-3">
        <b>Alternate Mobile Number</b>
      </div>
      <div class="row">
        <div class="my-1" style="width:95%;">
          <input type="text" class="form-control" name="mobile" placeholder="<?php echo $row['altmobile']; ?>" disabled>
        </div>
      </div>
    </div>
  </div>
  <div class="row mx-3 mt-3">
    <div class="col-md-5 col-12">
      <label for="" class="form-label"><b>Gender </b></label>
      <?php if($row['gender'] == 'male'){ ?>
      <input type="radio" class="form-check-input" name="gender" value="male" disabled checked> <label
        for="male">Male</label>
      &nbsp; &nbsp;
      <input type="radio" class="form-check-input" name="gender" value="Female" disabled> <label
        for="female">Female</label>
      <?php } ?>
      <?php if($row['gender'] == 'Female'){ ?>
      <input type="radio" class="form-check-input" name="gender" value="male" disabled> <label for="male">Male</label>
      &nbsp; &nbsp;
      <input type="radio" class="form-check-input" name="gender" value="Female" disabled checked> <label
        for="female">Female</label>
      <?php } ?>
    </div>
    <div class="col-sm-5 col-12 mx-2">
      <label for="" class="form-label"><b>Birth Date</b>(yyyy-mm-dd)</label>
      <input type="" id="birthday" name="birthday" required disabled placeholder="<?php echo $row['birthdate']; ?>">
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