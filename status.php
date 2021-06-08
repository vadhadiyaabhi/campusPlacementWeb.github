<?php
    session_start();
    if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] != true)
    {
      header('location: login.php');
      exit;
    }
    $username = $_SESSION['username'];
    
    include '_db_Connect.php';

    $q = "SELECT * FROM resume WHERE username = '$username'";
    $result = mysqli_query($con,$q);
    $resume = mysqli_fetch_array($result);
    $fname = $resume['fname'];
    $lname = $resume['lname'];
    

    $q = "SELECT * FROM status WHERE (username = '$username' AND applied = 'true' )";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    
    
    
   
    // echo $num;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Your activity Status</title>
  </head>
  <body>
    <br>
    <?php if($num>0){ ?>
      <?php for($i=0; $i<$num; $i++) {
        $row=mysqli_fetch_array($result);

        $jobid = $row['jobid'];
        $com_name = $row['com_name'];
        $q1 = "SELECT * FROM jobinfo WHERE (com_name = '$com_name' AND jobid = '$jobid' )";
         $result1 = mysqli_query($con,$q1);
         $row1=mysqli_fetch_array($result1);
      ?>
      
        <ul>
        <li><p>Hello!! <?php echo $fname . " "." " . $lname; ?> You have applied successfully in <?php echo $row['com_name'] . "--" . $row['jobid']; ?> ...  <br> 
                for more details about this job <a href="more_com_det.php?com_name=<?php echo $com_name;?>&jobid=<?php echo $jobid; ?>" >More Details</a> </p></li>
        <li><p>Be ready for your interview test on <?php echo $row1['mock_test_date']; ?> </p></li>
        
        
        <?php if($row['selected'] != NULL){ ?>
          <li>
            <p>Congrets!! You have passed the cutoff and you are selected for the interview be ready with your proper resume</p>
          </li>
        <?php } ?>
        </ul>
        <hr>
      <?php } ?>
    <?php }
      else{ 
    ?>
    <p>Your status is NULL, You have not applied in any company</p>
    <?php } ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>