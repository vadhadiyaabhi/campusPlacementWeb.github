<?php
    session_start();
    if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] != true)
    {
      header('location: login.php');
      exit;
    }
    $username = $_SESSION['username'];
    $con=mysqli_connect('localhost','root');
    mysqli_select_db($con,'eplacement');
    $q1="select clg from resume where username='$username'";
    $result1=mysqli_query($con,$q1);
    $row1=mysqli_fetch_array($result1);
    $clg=$row1['clg'];
    // echo $clg;
    // $clg=;
    $q="select * from jobinfo";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
    // echo $num;

    $i = 0;
    $err = false;
    $success = false;
    $fail = false;

    if($_SERVER['REQUEST_METHOD'] == "POST"){

      $tech = $_POST['tech'];
      $language = $_POST['language'];
      $com_name = $_POST['com_name'];
      $jobid = $_POST['jobid'];


      $err = false;

      $username = $_SESSION['username'];
      // echo $username;
      // echo $tech;
      // echo $language;
      include '_db_Connect.php';
      $q1 = "SELECT * FROM resume WHERE (tech1 = '$tech' OR tech2 = '$tech') AND (language1 = '$language' OR language2 = '$language') AND (username IN ('$username'))";
      $result1 = mysqli_query($con,$q1);
      $num1 = mysqli_num_rows($result1);
      $row1=mysqli_fetch_array($result1);
      // echo $num;

      // mysqli_close($con);

      if($num1 == 1)
      {
          // $username = $_SESSION['username'];
          $q2 = "SELECT * FROM status WHERE (username = '$username' AND applied = 'true' AND jobid = '$jobid' AND com_name = '$com_name')";
          $result2 = mysqli_query($con,$q2);
          $num2 = mysqli_num_rows($result2);
          if($num2 >= 1){
              $err = true;
          }
          else{
              $q3 = "INSERT INTO status (username, applied, com_name, jobid) values ('$username', 'true', '$com_name', '$jobid');";
              $result3 = mysqli_query($con, $q3);
              // header('location: Success.html');
              $success = true;
          }
      }
      else{
          // header('location: fail.html');
          $fail = true;
      }

    }

    mysqli_close($con);
    

  //  for($i=1;$i<=$num;$i++){ 
  //     $row=mysqli_fetch_array($result);
  //  }
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
  <link href="logo.jpg" rel="shortcut icon">
  <style>
    @media screen and (max-width: 767px){
      .row{
        justify-content: center;
      }
    }
  </style>
  <title>Job Details</title>
  

</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand ms-2" href="#">
        <span
          style=" font-family:'Redressed', cursive; text-shadow: rgb(176, 199, 250) 3px 3px; border-radius: 3px;"><i><b>
              E-placement</b></i></span>

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="job_details.php">JobInfo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
        </ul>
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        <div class="d-flex">
          <!-- <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
            data-bs-target="#loginModal">LogIn</button>
          <button type="button" class="btn btn-outline-primary btn-sm mx-2" data-bs-toggle="modal"
            data-bs-target="#signupModal">SignUp</button> -->
          <a href="notification.html">
            <button type="button" class="btn btn-outline-dark mx-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill"
                viewBox="0 0 16 16">
                <path
                  d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z">
                </path>
              </svg>
            </button>
          </a>


          <a class="" href="MyProfile.php">
            <button type="button" class="btn btn-outline-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                <path fill-rule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z">
                </path>
              </svg>
            </button>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <p>
    Here are the list of companies which will visit our college for placements, and you can apply into them according to skills mentioned there, and for more details click on more details to show when will they come and some important dates about mock interview rounds and last date to apply and etc.
    <br>
    <b> Best Of luck to All Of You...!!</b>
  </p>
  <hr>
  <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
  <div class="mx-4" style="display: inline-block; font-size:larger; font-weight:600;">
    Oncampus Placement Information
  </div>
  <hr>

  <?php if($err){ ?>

    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <?php echo "You have already aaplied in this compnay Try another..";
          $err = null;
      ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php } ?>
  <?php if($success){ ?>

    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <?php echo "Congrats!! You have applied succesfully...
                  Be ready for Round-1-test. <br>
                  Best Of Lock for further Process...";
          $success = false;
      ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php } ?>
  <?php if($fail){ ?>

    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <?php echo "Opps!!! You are not eligible to apply for this job...";
          $fail = false;
      ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php } ?>
  <!-- justify-content-center -->
  <!-- <?php echo "Abhishek Vadhadiya"; ?>
  <?php echo $i; ?> -->
  <div class="container" >
    <div class="row my-2">
      <?php for($i=1;$i<=$num;$i++)
          {  $row=mysqli_fetch_array($result); 
      ?>
      
        <?php if($row['clg'] == $clg){ ?>
          <div class="col-md-4 col-lg-3 col-10 my-2">
            <div class="card" style="background-color: rgb(241, 249, 253)">
              <div class="card-body">
                <h5 class="card-title text-success">
                  <?php echo $row['com_name']; ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                  <?php echo $row['work_Place'] . "--" . $row['jobid']; ?>
                </h6>
                <p class="card-text">
                  <?php $language=$row['tech1']; ?>
                  <?php $tech=$row['tech2']; ?>
                  <?php $com_name=$row['com_name']; ?>
                  <?php $jobid=$row['jobid']; ?>
                  <?php $clg=$row['clg']; ?>
                  <!-- <?php $username1=$row['username']; ?> -->
                  Technology required: <br>
                  Tech 1:
                  <?php echo $language; ?> <br>
                  Tech 2:
                  <?php echo $tech; ?> <br>
                  Vacancies:
                  <?php echo $row['vacancies']; ?> <br>
                  Salary:
                  <?php echo $row['salary']; ?> <br>
                </p>
                <form action="job_details.php" method="POST" class="">
                <!-- <form action="apply.php" method="POST" class=""> -->
                  <input type="hidden" value="<?php echo $language; ?>" name="language">
                  <input type="hidden" value="<?php echo $tech; ?>" name="tech">
                  <input type="hidden" value="<?php echo $com_name; ?>" name="com_name">
                  <input type="hidden" value="<?php echo $jobid; ?>" name="jobid">
                  <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                </form>
                <a href="more_com_det.php?com_name=<?php echo $com_name;?>&jobid=<?php echo $jobid; ?>" class="card-link">More Details</a>
              </div>
            </div>
          </div>
        <?php } ?>

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