<?php

    session_start();
    if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] != true)
    {
        header("location: login.php");
        exit;
    }
    $username = $_SESSION['username'];  
    include '_db_Connect.php';
    
    
    if($_SERVER["REQUEST_METHOD"] == 'POST')
    {
      // $sql = "SELECT * FROM resume WHERE username='$username'";
      // $result = mysqli_query($con, $sql);
      // $num = mysqli_num_rows($result);
      // // mysqli_close($con);
      // $row = mysqli_fetch_array($result);
      // $fname = $row['fname'];
      // $lname = $row['lname'];
      // $gender = $row['gender'];
      // $mobile = $row['mobile'];
      // $altmobile = $row['altmobile'];
      // $birthdate = $row['birthdate'];


      if(isset($_POST['fname']))
      {
        $fname = $_POST['fname'];
        // echo "abhi";
        // echo $fname;
        // echo $username;
      }
      if(isset($_POST['lname']))
      {
        $lname = $_POST['lname'];
      }
      if(isset($_POST['gender']))
      {
        $gender = $_POST['gender'];
      }
      if(isset($_POST['mobile']))
      {
        $mobile = $_POST['mobile'];
      }
      if(isset($_POST['altmobile']))
      {
        $altmobile = $_POST['altmobile'];
      }
      if(isset($_POST['birthday']))
      {
        $birthdate = $_POST['birthday'];
      }
      // $con = mysqli_connect('localhost','root');
      // mysqli_select_db($con, 'Eplacement');
      $q="Update RESUME set fname='$fname', lname='$lname', gender='$gender', mobile='$mobile', altmobile='$altmobile', birthdate='$birthdate'  where username='$username';";
      $result = mysqli_query($con, $q);

      if($result){
        header("location: personal_details.php");
      }
    }
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

  <title>Hello, world!</title>
</head>

<body>
  <div class="mx-3 my-3">
    <h4 style="display: inline; font-size: larger;">Personal Details</h4>
    <a href="personal_details.php" class="mx-2"><b>cancle</b></a>
  </div>
  <form action="pdedit.php" method="POST" class="form-floating">
    <div class="mx-3">
      <div class="row">
        <div class="col-sm-5 col-12">
          <div class="form-floating my-1" style="width:90%;">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="fname">
            <label for="floatingInput">First Name</label>
          </div>
        </div>
        <div class="col-sm-5 col-12">
          <div class="form-floating my-1" style="width:90%;">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="lname">
            <label for="floatingInput">Last Name</label>
            <br>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- <div class="col-5">
          Mobile Number
        </div>
        <div class="col-5">
          Alternet Mobile Number
        </div> -->
      </div>
      <div class="row">
        <div class="col-sm-5 col-12">
          <div class="form-floating my-1" style="width:90%;">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="mobile">
            <label for="floatingInput">Mobile Number</label>
          </div>
        </div>
        <div class="col-sm-5 col-12">
          <div class="form-floating my-1" style="width:90%;">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="altmobile">
            <label for="floatingInput">Alternet Mobile Number</label>
            <br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 col-12">
          <label for="" class="form-label"><b>Gender </b></label>
          <input type="radio" class="form-check-input" name="gender" value="male"> <label for="male">Male</label>
          &nbsp; &nbsp;
          <input type="radio" class="form-check-input" name="gender" value="Female"> <label for="Female">Female</label>
        </div>
        <div class="col-md-6">
          <label for="" class="form-label"><b>Birth Date </b></label>
          <input type="date" id="birthday" name="birthday" required>
        </div>
      </div>
      <button type="submit" style="width:80%;" class="btn btn-primary my-2">Save</button>
    </div>
  </form>

  <div class="mx-3 mt-5">
    <p>Please fill up entire details, otherwise details will not be updated</p>
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