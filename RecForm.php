<?php
 
  
  session_start();
  if(!isset($_SESSION['Rec_LOGIN']) || $_SESSION['Rec_LOGIN'] != true)
  {
      header("location: login.php");
      exit;
  }
  $err = false;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $username = $_SESSION['username1'];
    $com_name = $_POST['com_name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $regno = $_POST['regno'];
    // echo $username;
    include '_db_Connect.php';
    $q = "INSERT INTO recdetails (username,com_name,city,state,regno) VALUES ('$username', '$com_name', '$city', '$state', '$regno')";
    $result = mysqli_query($con, $q);
    if($result){
      header('location: index1.html');
    }
    else{
      $err = true;
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

  <title>Company Details - Form</title>
  <link rel="stylesheet" href="RecForm.css">
  <link rel="shortcut icon" href="logo.jpg">
</head>

<body>

  <h5 class="text-center"
    style="font-family: 'Redressed', cursive; color: rgb(158, 224, 247); text-shadow: rgb(0, 132, 255) 2px 2px;">
    Welcome to E-placement!! Hope you'll find your best whatever you want...
  </h5>
  <br>
  <hr>
  <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
  <h5 class="mx-4" style="display: inline;">
    Create Account to E-placement
  </h5>
  <hr>

  <div class="my-2">
    <h4 class="text-center" style="font-family: 'Redressed', cursive; font-weight: bold; color: blue;">
      Enter Your Company Details
    </h4>
  </div>

  <div class="d1 border my-3 py-2 px-4 pb-3 rounded-3">
    <form class="row g-3 mx-2" action="RecForm.php" method="POST">
      
      <div class="col-12">
        <label for="" class="form-label"><b>Company Name</b></label>
        <input type="text" class="form-control" id="" name="com_name" required>
      </div>
      <div class="col-md-6 col-12">
        <label for="" class="form-label"><b>City</b></label>
        <select name="city" id="" class="form-select" required>
          <option value="Gandhinagar">Gandhinagar</option>
          <option value="Modasa">Modasa</option>
          <option value="Bhuj">Bhuj</option>
          <option value="Morbi">Morbi</option>
          <option value="Vidhyanagar">Vidhyanagar</option>
          <option value="Baroda">Baroda</option>
          <option value="Ahmedabad">Ahmedabad</option>
          <option value="Chandkheda">Chandkheda</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Banglore">Bangalore</option>
          <option value="Haidrabad">Haidrabad</option>
          <option value="Pune">Pune</option>
          <option value="Delhi">Delhi</option>
        </select>
      </div>
      <div class="col-md-6 col-12">
        <label for="" class="form-label"><b>State</b></label>
        <select name="state" id="" class="form-select" required>
          <option value="Gujarat">Gujarat</option>
          <option value="Maharastra">Maharastra</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Delhi">Delhi</option>
        </select>
      </div>
      <div class="col-12">
        <label for="" class="form-label"><b>Registration Number (Please enter correct detail otherwise you'll be
            blocked)</b></label>
        <input type="text" class="form-control" id="" name="regno" required>
      </div>
      <div class="col-12 col-md-6">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        <button type="reset" class="btn btn-primary btn-sm">Reset</button>
      </div>
    </form>
    <?php if($err){ ?>
        <div class="alert alert-danger alert-dismissible fade show text-center my-2 mx-2" role="alert">
            <?php echo "Opps!!! Something went wrong please try again...";
                      $err = false;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
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