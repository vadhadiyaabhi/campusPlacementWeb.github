<?php
 
$showAlert = false;
$showError = false;
$err = false;
$typeErr = false;
$typeOfUser = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   include '_db_Connect.php';
   $username = $_POST["username"];
   $password = $_POST["password"];
   $cpassword = $_POST["cpassword"];
   $typeOfUser = $_POST["typeOfUser"];
   $exists = false;
   $result = false;
   
   if($password == $cpassword && $exists == false)
   {
       if($typeOfUser == "applicant")
       {
            $q="INSERT INTO login (username,password,cpassword) values ('$username','$password','$cpassword');";
            $result = mysqli_query($con, $q);

            if($result)
            {
                $showAlert = true;   
                echo "abhi"; 
                $login = true;
                session_start();
                $_SESSION['LOGIN'] = true;
                $_SESSION['username'] = $username;
                header("location: AppForm.php");
            }
            else{
                $err = "Opps!! SignUp failed, Something went wrong, Please try again by chnaging username";
            }
       }
       else if($typeOfUser == "recruiter")
       {
            $q="INSERT INTO loginasrec (username,password,cpassword) values ('$username','$password','$cpassword');";
            $result = mysqli_query($con, $q);

            if($result)
            {
                $showAlert = true;   
                echo "abhi"; 
                $login = true;
                session_start();
                $_SESSION['Rec_LOGIN'] = true;
                $_SESSION['username1'] = $username;
                header("location: RecForm.php");
            }
            else{
                $err = "Opps!! SignUp failed, Something went wrong, Please try again by chnaging username";
            }
       }
       else{
            $typeErr = "Please check radio button, Do you want to create an account as Recruiter or Apllicant";
       }

       
   }
   else
   {
       $showError = "Opps!! Password do not match; Please try again..";
       // echo "<br> Opps!! " . $showError;
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
    <link rel="stylesheet" href="signup.css">
    <title>SignUp to E-placement</title>
    <link href="logo.jpg" rel="shortcut icon">
    </link>
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
    <div class="d1">
        <form action="signup.php" method="POST" class="mx-2">
            <br>
            <!-- <h4 class="my-2 text-center">Create New Account</h4> -->
            <div class="form-check mx-2">
                <input class="form-check-input" type="radio" name="typeOfUser" id="flexRadioDefault1" value="recruiter">
                <label class="form-check-label" for="flexRadioDefault1">
                    Create account as a Recruiter
                </label>
            </div>
            <div class="form-check mx-2">
                <input class="form-check-input" type="radio" name="typeOfUser" id="flexRadioDefault2" checked
                    value="applicant">
                <label class="form-check-label" for="flexRadioDefault2">
                    Create account as a Applicant
                </label>
            </div>

            <div class="mb-3 my-1">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="username" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" minlength="8" name="password"
                    required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>

        </form>
        <?php if($showError == true){ ?>

        <div class="alert alert-danger alert-dismissible fade show text-center my-2 mx-2" role="alert">
            <?php echo $showError ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


        <?php } ?>

        <?php if($err){ ?>
        <div class="alert alert-danger alert-dismissible fade show text-center my-2 mx-2" role="alert">
            <?php echo $err;
                      $err = false;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>


        <?php if($typeErr){ ?>
        <div class="alert alert-danger alert-dismissible fade show text-center my-2 mx-2" role="alert">
            <?php echo $typeErr;
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