<?php

    session_start();
    if(!isset($_SESSION['Rec_LOGIN']) || $_SESSION['Rec_LOGIN'] != true )
    {
        header('location: login.php');
        exit;
    }

    $err = false;
    $username = $_SESSION['username1'];
    include '_db_Connect.php';
    $q = "select com_name from recdetails where username = '$username'";
    $result1=mysqli_query($con,$q);
    $row=mysqli_fetch_array($result1);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include '_db_Connect.php';
        
        $com_name = $_POST['com_name'];
        $jobid = $_POST['jobid'];
        $vacancies = $_POST['vacancies'];
        $salary = $_POST['salary'];
        $tech1 = $_POST['tech1'];
        $tech2 = $_POST['tech2'];
        $working_Hours = $_POST['working_Hours'];
        $work_Place = $_POST['work_Place'];
        $bond_year = $_POST['bond_year'];
        $interview_rounds = $_POST['interview_rounds'];
        $mock_test_date = $_POST['mock_test_date'];
        $last_date_apply = $_POST['last_date_apply'];
        $clg = $_POST['clg'];

        $q = "INSERT INTO jobinfo (clg, jobid, username, com_name, vacancies, salary, tech1, tech2, working_Hours, work_Place, bond_year, interview_rounds, mock_test_date, last_date_apply) VALUES ('$clg', '$jobid', '$username', '$com_name', $vacancies, '$salary', '$tech1', '$tech2', '$working_Hours', '$work_Place', '$bond_year', $interview_rounds, '$mock_test_date', '$last_date_apply')";
        $result = mysqli_query($con, $q);
        if($result){
            header('location: temp1.html');
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

    <title>Add Job To E-placement</title>
    <link rel="stylesheet" href="add_job.css">
    <link rel="shortcut icon" href="logo.jpg">
</head>

<body>

    <div class="">
        <h4 class="text-center" style="font-family: 'Redressed', cursive; font-weight: bold; color: blue;">Add your job
            details and get
            best according to your need...</h4>
    </div>
    <br>
    <hr>
    <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
    <h5 class="mx-4" style="display: inline;">
        Add New Job
    </h5>
    <hr>
    <div class="d1 border rounded-3 py-3 px-2">
        <form class="row g-3 mx-2" action="add_job.php" method="POST">
            <div class="col-12 col-md-8">
                <label for="" class="form-label"><b>College Name</b></label><br>
                <select name="clg" id="" class="form-select" required>
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
            <div class="col-12 col-md-4">
                <label for="" class="form-label"><b>JobId</b></label><br>
                <input type="text" class="form-control" id="" name="jobid" required>
            </div>
            <input type="hidden" value="<?php echo $row['com_name']; ?>" name="com_name">
            <div class="col-md-3 col-12">
                <label for="" class="form-label"><b>Job Vacancies</b></label>
                <input type="number" class="form-control" id="" name="vacancies" required>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Interview rounds</b></label>
                <input type="number" class="form-control" id="" name="interview_rounds" required>
            </div>
            <div class="col-md-5 col-12">
                <label for="" class="form-label"><b>Salary</b></label>
                <input type="text" class="form-control" id="" name="salary" required>
            </div>
            <div class="col-md-6 col-12">
                <label for="" class="form-label"><b>Technology1 required</b></label>
                <input type="text" class="form-control" id="" name="tech1" required>
            </div>
            <div class="col-md-6 col-12">
                <label for="" class="form-label"><b>Technology2 required</b></label>
                <input type="text" class="form-control" id="" name="tech2" required>
            </div>
            <div class="col-md-5 col-12">
                <label for="" class="form-label"><b>Work place</b></label>
                <input type="text" class="form-control" id="" name="work_Place" required>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Working Hours</b></label>
                <input type="text" class="form-control" id="" name="working_Hours" required>
            </div>
            <div class="col-md-3 col-12">
                <label for="" class="form-label"><b>Bond years</b></label>
                <input type="text$" class="form-control" id="" name="bond_year" required>
            </div>
            <div class="col-md-6 col-12">
                <label for="" class="form-label"><b>Mock test date</b></label>
                <input type="date" class="form-control" id="" name="mock_test_date" required>
            </div>
            <div class="col-md-6 col-12">
                <label for="" class="form-label"><b>last date to apply</b></label>
                <input type="date" class="form-control" id="" name="last_date_apply" required>
            </div>
            <div class="col-md6 col-12">
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