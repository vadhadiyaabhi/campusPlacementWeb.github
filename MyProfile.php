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
  <link href="logo.jpg" rel="shortcut icon">
  <!-- <link rel="stylesheet" href="MyProfile.css"> -->
</head>

<body style="background-color: rgb(240, 240, 243);">

<!-- flipkart background color: rgb(240, 240, 243); -->


  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand ms-2" href="#">
        <span
          style=" font-family:'Redressed', cursive; text-shadow: rgb(176, 199, 250) 3px 3px; border-radius: 3px;"><i><b> E-placement</b></i></span>

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
            <a class="nav-link" href="job_details.php">JobInfo</a>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z">
                                </path>
                            </svg>
                        </button>
            </a>      

          <button type="button" class="btn btn-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
              <path fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z">
              </path>
            </svg>



          </button>
        </div>
      </div>
    </div>
  </nav>

  <?php
      $row = mysqli_fetch_array($result);
  ?>
  <!-- <?php echo $row['fname'] . " " . $row['lname']; ?> -->

  <div class="container border my-2" >
    <div class="row">
      <div class="col-md-4 col-lg-3 col-12 border">
        <div class="row border" style="background-color: white;">
          <div class="col-lg-2 col-2 col-md-2 col-sm-2 my-2">
            <img height="40px" width="40px"
              src="https://tse1.mm.bing.net/th?id=OIP.s-kN_razst5S7d0slKsZqwHaHw&pid=Api&P=0&w=300&h=300">
          </div>
          <div class="col-lg-9 col-9 col-md-9 my-2 ms-2">
            <span class="" style="font-size: smaller;">
              Hello!!
            </span><br>
            <b>
              <?php echo $row['fname'] . " " . $row['lname']; ?>
            </b>
          </div>
        </div>
        <div class="row my-2 border" style="background-color: white;">
          <nav class=" navbar navbar-light">
            <div class="container-fluid">
              <ul class="nav navbar-nav">
                <li class="nav-item">
                  <a href="personal_details.php" target="frame" class="nav-link">Personal Details</a>
                </li>
                <li class="nav-item">
                  <a href="edu_details.php" target="frame" class="nav-link">Educational Details</a>
                </li>
                <hr>
                <li class="nav-item">
                  <a href="tech_skills.php" target="frame" class="nav-link">Technical Skills</a>
                </li>
                <li class="nav-item">
                  <a href="personal_details.php" target="frame" class="nav-link">Projects</a>
                </li>
                <li class="nav-item">
                  <a href="personal_details.php" target="frame" class="nav-link">Certificatons</a>
                </li>
                <hr>
                <li class="nav-item">
                  <a href="status.php" target="frame" class="nav-link">My Status</a>
                </li>
                <li class="nav-item">
                  <a href="resume.php" target="" class="nav-link">My Resume</a>
                </li>
                <hr>
                <li class="nav-item">
                  <a href="personal_details.php" target="frame" class="nav-link">Change Password</a>
                </li>
                <li class="nav-item">
                  <a href="logout.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-lock2" viewBox="0 0 16 16">
                      <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224z"></path>
                      <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>
                    </svg>
                    <span class="mx-2">Logout</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>

        
        </div>
      </div>
      <div class="col bg-light">
        <iframe src="personal_details.php" frameborder="0" height="100%" width="100%" name="frame" class="bg-light"></iframe>
      </div>
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