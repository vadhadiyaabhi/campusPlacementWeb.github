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
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    // mysqli_close($con);
    $row = mysqli_fetch_array($result);
    
    
    if($_SERVER["REQUEST_METHOD"] == 'POST')
    {
    //   $sql = "SELECT * FROM resume WHERE username='$username'";
    //   $result = mysqli_query($con, $sql);
    //   $num = mysqli_num_rows($result);
    //   mysqli_close($con);
    //   $row = mysqli_fetch_array($result);
    //   $fname = $row['fname'];
    //   $lname = $row['lname'];
    //   $gender = $row['gender'];
    //   $mobile = $row['mobile'];
    //   $altmobile = $row['altmobile'];
    //   $birthdate = $row['birthdate'];


      if(isset($_POST['clg']))
      {
        $clg = $_POST['clg'];
        // echo "abhi";
        // echo $fname;
        // echo $username;
        $q="Update RESUME set clg='$clg' where username='$username';";
        $result = mysqli_query($con, $q);
      }
      if(isset($_POST['uni']))
      {
        $uni = $_POST['uni'];
        $q="Update RESUME set uni='$uni' where username='$username';";
        $result = mysqli_query($con, $q);
      }
      if(isset($_POST['state']))
      {
        $state = $_POST['state'];
        $q="Update RESUME set state='$state' where username='$username';";
        $result = mysqli_query($con, $q);
      }
      if(isset($_POST['enroll']))
      {
        $enroll = $_POST['enroll'];
        $q="Update RESUME set enroll='$enroll' where username='$username';";
        $result = mysqli_query($con, $q);
      }
      if(isset($_POST['sem']))
      {
        $sem = $_POST['sem'];
        $q="Update RESUME set sem='$sem' where username='$username';";
        $result = mysqli_query($con, $q);
      }
      if(isset($_POST['branch']))
      {
        $branch = $_POST['branch'];
        $q="Update RESUME set branch='$branch' where username='$username';";
        $result = mysqli_query($con, $q);
      }
      if(isset($_POST['cpi']))
      {
        $cpi = $_POST['cpi'];
        $q="Update RESUME set cpi='$cpi' where username='$username';";
        $result = mysqli_query($con, $q);
      }
      if(isset($_POST['block']))
      {
        $block = $_POST['block'];
        $q="Update RESUME set block='$block' where username='$username';";
        $result = mysqli_query($con, $q);
      }

      

    //   if($result){
        header("location: edu_details.php");
    //   }
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
    <h4 style="display: inline; font-size: larger;">Educational Details</h4>
    <a href="edu_details.php" class="mx-2"><b>cancle</b></a>
  </div>
    <form action="ededit.php" method="POST" class="form-floating">
        <div class="row mx-2">
            <b>College</b>
        </div>
        <div class="row mx-2">
            <div class="col-12">
            <div class="my-1" style="width: 90%;">
                <select name="clg" id="" class="form-select" placeholder="<?php echo $row['clg']; ?>">
                    <option value="GEC-Gn">GEC-Gn</option>
                    <option value="GEC-Modasa">GEC-Modasa</option>                    
                    <option value="GEC-bhuj">GEC-bhuj</option>
                    <option value="GEC-morbi">GEC-morbi</option>
                    <option value="BVM">BVM</option>
                    <option value="LDRP">LDRP</option>
                    <option value="LD-Ahmedabad">LD-Ahmedabad</option>
                    <option value="VGEC-Chandkheda">VGEC-Chandkheda</option>
                </select>
            </div>
            </div>
        </div>
        <div class="row mx-2 mt-3">
            <b>University</b>
        </div>
        <div class="row mx-2">
            <div class=" col-12">
            <div class="my-1" style="width: 90%;">
                <select name="uni" id="" class="form-select" placeholder="<?php echo $row['uni']; ?>">
                    <option value="GTU">GTU</option>
                    <option value="Gujrat University">Gujrat University</option>
                    <option value="KSV">KSV</option>
                    <option value="MSU">MSU</option>
                    <option value="BVM">BVM</option>
                </select>
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
                    <select id="inputState" class="form-select" name="state" placeholder="<?php echo $row['state']; ?>">
                        <option value="Gujrat">Gujrat</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="col-sm-5 col-12">
            <div class="row  mt-3">
                <b>Enrollment</b>
            </div>
            <div class="row">
                <div class="my-1" style="width:95%;">
                <input type="text" class="form-control" name="enroll" placeholder="<?php echo $row['enroll']; ?>" >
                </div>
            </div>
            </div>
            <div class="col-sm-2 col-12">
            <div class="row  mt-3">
                <b>Branch</b>
            </div>
            <div class="row">
                <div class="my-1" style="width:95%;">
                    <select class="form-select" id="inputZip" name="branch" placeholder="<?php echo $row['branch']; ?>">
                        <option selected>CE</option>
                        <option>IT</option>
                    </select>
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
                <input type="text" class="form-control" name="sem" placeholder="<?php echo $row['sem']; ?>" >
                </div>
            </div>
            </div>
            <div class="col-sm-3 col-12">
            <div class="row  mt-3">
                <b>cpi</b>
            </div>
            <div class="row">
                <div class="my-1" style="width:95%;">
                <input type="text" class="form-control" name="cpi" placeholder="<?php echo $row['cpi']; ?>" >
                </div>
            </div>
            </div>
            <div class="col-sm-4 col-12">
            <div class="row  mt-3">
                <b>Total block/s or KT</b>
            </div>
            <div class="row">
                <div class="my-1" style="width:95%;">
                <input type="text" class="form-control" name="block" placeholder="<?php echo $row['block']; ?>" >
                </div>
            </div>
            </div>
            <button type="submit" style="width:87.5%;" class="btn btn-primary my-2 mx-2">Save</button>
        </div>
    </form>

  <!-- <div class="mx-3 mt-5">
    Please fill up entire details, otherwise details will not be updated
  </div> -->




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