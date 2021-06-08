<?php  

    session_start();
    if(!isset($_SESSION['Rec_LOGIN']) || $_SESSION['Rec_LOGIN'] != true)
    {
      header('location: login.php');
      exit;
    }
    $username = $_SESSION['username1'];

    include '_db_Connect.php';
  
    $q="select com_name from recdetails where username = '$username'";
    $result=mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $com_name = $row['com_name'];



  
    
    $q1 = "SELECT distinct jobid FROM jobinfo where username= '$username';" ;
    $result1 = mysqli_query($con,$q1);
    // echo $result;
    $num1=mysqli_num_rows($result1);

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="shortcut icon" href="logo.jpg">
  <!-- <link rel="stylesheet" href="form.css" > -->
  <title>Student Info</title>
  <style>
    @media screen and (min-width: 787px) {
      .d1 {
        width: 60%;
        margin: auto;
      }

      .table,
      .b {
        width: 70%;
        margin: auto;
      }
    }

    @media screen and (max-width: 786px) {
      .d1 {
        width: 80%;
        margin: auto;
      }

      .table {
        width: 80%;
        margin: auto;
      }
    }



    @media screen and (max-width: 360px) {
      .d1 {
        width: 100%;
      }

      .table {
        width: 100%;
        /* margin: auto; */
      }
    }
  </style>
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
            <a class="nav-link" aria-current="page" href="index1.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Rec_jobinfo.php">JobInfo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_job.php">Add New Job</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="stud_apply.php">Student Info</a>
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

          <a href="Rec_Profile.php">
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

  <hr>
  <h4>List of Students whoever have applied in for job in your company</h4>
  <hr>

  <?php  for($i = 0; $i<$num1; $i++){
        $row1 = mysqli_fetch_array($result1);
  ?>
  <?php

        $q = "SELECT r.fname,r.lname,r.username,s.com_name,s.jobid FROM resume as r,status as s where r.username=s.username;" ;
        $result = mysqli_query($con,$q);
        $num=mysqli_num_rows($result);
        $k = 0;
  ?>

    <table class="table table-striped .table-responsive">
      <b class="b" style=" margin:3rem;">* <?php echo $row1['jobid']; ?></b>
      <thead>
        <tr>
          <th scope="col" class="table-primary">#</th>
          <th scope="col" class="table-primary">Fname</th>
          <th scope="col" class="table-primary">Lanme</th>
          <th scope="col" class="table-primary">Email</th>
          <th scope="col" class="table-primary">Resume Link</th>
        </tr>
      </thead>
      <tbody>
        <?php  for($j = 0; $j<$num; $j++){
          $row = mysqli_fetch_array($result);
          if($row['jobid'] == $row1['jobid'] && $com_name == $row['com_name']){
            $k++;
        ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <?php $username = $row['username']; ?>
            <!-- <td><?php echo $row['com_name']; ?></td>
            <td><?php echo $row['jobid']; ?></td> -->
            <td><a href="resume_link.php?username=<?php echo $username;?>"> Resume</a></td>
          </tr>
        <?php }} 
          if($k == 0) echo "No student has applied in this job...";
        ?>
      </tbody>
    </table>
    <hr>
  <?php } ?>

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