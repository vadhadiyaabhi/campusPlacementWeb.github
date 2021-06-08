<?php
 
 $login = false;
 $showError = false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_db_Connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $type = $_POST["type"];

    if($type == "applicant"){
        $q = "select * from login where username='$username' AND password='$password'";
        $result = mysqli_query($con,$q);
        $num=mysqli_num_rows($result);
        // echo $num;
        // echo "abhcd";
        if($num)
        {
            echo "success";
            $login = true;
            session_start();
            $_SESSION['LOGIN'] = true;
            $_SESSION['username'] = $username;
            header("location: index.html");
        }
        else
        {
            $showError = "Invalid Credentials";
        }
    }
    else if($type == "recruiter"){
        $q = "select * from loginasrec where username='$username' AND password='$password'";
        $result = mysqli_query($con,$q);
        $num=mysqli_num_rows($result);
        // echo $num;
        // echo "abhcd";
        if($num)
        {
            echo "success";
            $login = true;
            session_start();
            $_SESSION['Rec_LOGIN'] = true;
            $_SESSION['username1'] = $username;
            header("location: index1.php");
        }
        else
        {
            $showError = "Invalid Credentials";
        }
    }
    


 }

?>

<!-- Poiret One -->




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>LogIn to E-placemnet</title>
  <link href="logo.jpg" rel="shortcut icon">
  <link rel="stylesheet" href="login.css">
</head>

<body>

<h5 class="text-center"
        style="font-family: 'Redressed', cursive; color: rgb(158, 224, 247); text-shadow: rgb(0, 132, 255) 2px 2px;">
        Welcome to E-placement!! Hope you'll find your best whatever you want...
    </h5>

  <br>
  <hr>
  <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
  <div class="mx-4" style="display: inline-block; font-size:larger; font-weight:600;">
    User LogIn
  </div>
  <hr>
  <div class="d1 border px-3 py-3 rounded-3" style="background-color: white;">
    <form action="login.php" method="POST">
      <h6 class="text-center">LogIn to E-placement</h6>
      <input type="radio" class="form-check-input" name="type" value="applicant" checked> <label
        for="applicant">Applicant</label>
      &nbsp; &nbsp;
      <input type="radio" class="form-check-input" name="type" value="recruiter"> <label for="female">Recruiter</label>
      <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username"
          required>
      </div>
      <div class="mb-2">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-sm">LOGIN</button>
      </div>
    </form>
    <div class="my-1">
      <a href="" style="text-decoration: none;">
        <svg class="svg-inline--fa fa-shield-alt fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="shield-alt"
          role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" width="16" height="16">
          <path fill="currentColor"
            d="M496 128c0 221.282-135.934 344.645-221.539 380.308a48 48 0 0 1-36.923 0C130.495 463.713 16 326.487 16 128a48 48 0 0 1 29.539-44.308l192-80a48 48 0 0 1 36.923 0l192 80A48 48 0 0 1 496 128zM256 446.313l.066.034c93.735-46.689 172.497-156.308 175.817-307.729L256 65.333v380.98z">
          </path>
        </svg>
        <span style="font-weight:600;"> Forget Password???</span>
      </a>
    </div>
    <div class="my-1">
      <a href="signup.php" style="text-decoration: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-person-plus-fill" viewBox="0 0 16 16">
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
          <path fill-rule="evenodd"
            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z">
          </path>
        </svg>
        <span style="font-weight: 600;"> New User? SignUp here</span>
      </a>
    </div>
    <div class="my-2">
      <?php if($showError){ ?>

      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <?php echo " Opps!!! " . $showError . " May be Password or username is wrong, Please try Again...";
                                $showError = false;?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php } ?>
    </div>
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