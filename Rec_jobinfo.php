<?php
    session_start();
    if(!isset($_SESSION['Rec_LOGIN']) || $_SESSION['Rec_LOGIN'] != true)
    {
      header('location: login.php');
      exit;
    }
    // $username = $_SESSION['username'];
    $username1 = $_SESSION['username1'];
    $con=mysqli_connect('localhost','root');
    mysqli_select_db($con,'eplacement');
    $q="select * from jobinfo where username = '$username1'";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
    // echo $num;
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
            <a class="nav-link" aria-current="page" href="index1.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="Rec_jobinfo.php">JobInfo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_job.php">Add New Job</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="stud_apply.php">Student Info</a>
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

  <p>
    Here are the list of jobs which you have uploaded for different college campus placements,
    <br>
    <b> Best Of luck to All Of You...!!</b>
  </p>
  <hr>
  <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
  <div class="mx-4" style="display: inline-block; font-size:larger; font-weight:600;">
    Job Info you have reliesed for different clgs
  </div>
  <hr>
  <!-- justify-content-center -->
  <div class="container">
    <div class="row my-2">
      <?php for($i=1;$i<=$num;$i++)
          {  $row=mysqli_fetch_array($result); 
      ?>
      <div class="col-md-4 col-lg-3 col-10 my-2">
        <div class="card" style="background-color: rgb(241, 253, 241)">
          <div class="card-body">
            <h5 class="card-title text-primary">
              <?php echo $row['com_name']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
              <?php echo $row['work_Place']; ?>
            </h6>
            <p class="card-text">
              <?php $language=$row['tech1']; ?>
              <?php $com_name=$row['com_name']; ?>
              <?php $clg=$row['clg']; ?>
              <?php $tech=$row['tech2']; ?>
              <?php $clg=$row['clg']; ?>
              <?php $jobid=$row['jobid']; ?>
              Collage:
              <b><?php echo $clg . " - " . $jobid; ?> </b><br>
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
            <!-- <form action="apply.php" method="POST" class="">
                  <input type="hidden" value="<?php echo $language; ?>" name="language">
                  <input type="hidden" value="<?php echo $tech; ?>" name="tech">
                  <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                </form> -->
                <a href="more_det.php?com_name=<?php echo $com_name;?>&jobid=<?php echo $jobid; ?>" class="card-link">More Details</a>
          </div>
        </div>
      </div>

      <?php } ?>
    </div>
  </div>



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