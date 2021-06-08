<?php

    session_start();
    if(!isset($_SESSION['Rec_LOGIN']) || $_SESSION['Rec_LOGIN'] != true )
    {
        header('location: login.php');
        exit;
    }
    $username = $_GET['username'];

    include '_db_Connect.php';
    $q= "SELECT * FROM resume WHERE username = '$username';";
    $result = mysqli_query($con, $q);
    $row = mysqli_fetch_array($result);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="shortcut icon" href="logo.jpg">
  <link rel="stylesheet" href="form.css">
  <title>E-placement Home Page</title>
</head>

<body>

    <br>
    <hr>
    <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
    <div class="mx-4" style="display: inline-block; font-size:larger; font-weight:600;">
        Candidate's Resume
    </div>
    <hr>
    <div class="d1 border my-3">
        <form class="row g-3 mx-2" action="AppForm.php" method="POST">
            <h5 style="color: blue;"><i>Personal Details</i></h5>
            <div class="col-md-6">
                <label for="" class="form-label"><b>First Name</b></label>
                <input type="text" class="form-control" id="inputCity" name="fname" placeholder="<?php echo $row['fname'];?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><b>Last Name</b></label>
                <input type="text" class="form-control" id="inputCity" name="lname" placeholder="<?php echo $row['lname'];?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label" maxlength="10" minlength="10"><b>Mobile No.</b></label>
                <input type="number" class="form-control" id="inputCity" name="mobile" placeholder="<?php echo $row['mobile'];?>" minlength="10" disabled>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><b>Alternet Mobile No.</b></label>
                <input type="number" class="form-control" id="inputCity" name="altmobile" minlength="10" placeholder="<?php echo $row['altmobile'];?>" disabled>
            </div>
            <div class="col-md-5 col-12">
                <label for="" class="form-label"><b>Gender </b></label>
                <?php if($row['gender'] == 'male'){ ?>
                <input type="radio" class="form-check-input" name="gender" value="male" disabled checked> <label
                    for="male">Male</label>
                &nbsp; &nbsp;
                <input type="radio" class="form-check-input" name="gender" value="Female" disabled> <label
                    for="female">Female</label>
                <?php } ?>
                <?php if($row['gender'] == 'Female'){ ?>
                <input type="radio" class="form-check-input" name="gender" value="male" disabled> <label for="male">Male</label>
                &nbsp; &nbsp;
                <input type="radio" class="form-check-input" name="gender" value="Female" disabled checked> <label
                    for="female">Female</label>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><b>Birth Date </b></label>
                <input type="text" id="birthday" name="birthday" placeholder="<?php echo $row['birthdate'];?>" disabled>
            </div>
            <hr>
            <h5 style="color: blue;"><i>Educational Details</i></h5>
            <div class="col-12">
                <label for="" class="form-label"><b>College Name</b></label><br>
                <input name="clg" id="" class="form-control" placeholder="<?php echo $row['clg'];?>" disabled>
            </div>
            <div class="col-12">
                <label for="" class="form-label"><b>University</b></label><br>
                <input name="uni" id="" class="form-control" placeholder="<?php echo $row['uni'];?>" disabled>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label"><b>State</b></label>
                <input id="inputState" class="form-control" name="state" placeholder="<?php echo $row['state'];?>" disabled>
            </div>
            <div class="col-md-6 col-12">
                <label for="" class="form-label"><b>Enrollment No.</b></label>
                <input type="" class="form-control" id="inputCity" name="enroll" placeholder="<?php echo $row['enroll'];?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="" class="form-label"><b>Branch</b></label>
                <input class="form-control" id="inputZip" name="branch" placeholder="<?php echo $row['branch'];?>" disabled> 
            </div>
            <div class="col-4">
                <label for="" class="form-label"><b>Current Sem</b></label>
                <input type="number" class="form-control" name="sem" placeholder="<?php echo $row['sem'];?>" disabled>
            </div>
            <div class="col-4">
                <label for="" class="form-label"><b>CPI</b></label>
                <input type="text" class="form-control" name="cpi" placeholder="<?php echo $row['cpi'];?>" disabled>
            </div>
            <div class="col-4">
                <label for="" class="form-label"><b>Total Block/s Or KT</b></label>
                <input type="number" class="form-control" name="block" placeholder="<?php echo $row['block'];?>" disabled>
            </div>

            <hr>
            <h5 style="color: blue;"><i>Technical Skills</i></h5>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Programming Language:</b></label>
                <input class="form-control" id="inputZip" name="language1" placeholder="<?php echo $row['language1'];?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="lanlevel1" placeholder="<?php echo $row['lanlevel1'];?>" disabled>
            </div>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Other language</b></label>
                <input class="form-control" id="inputZip" name="language2" placeholder="<?php echo $row['language2'];?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="lanlevel2" placeholder="<?php echo $row['lanlevel2'];?>" disabled>
            </div>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Technology which you know:</b></label>
                <input class="form-control" id="inputZip" name="tech1" placeholder="<?php echo $row['tech1'];?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="techlevel1" placeholder="<?php echo $row['techlevel1'];?>" disabled>
            </div>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Other Technology:</b></label>
                <input class="form-control" id="inputZip" name="tech2" placeholder="<?php echo $row['tech2'];?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="techlevel2" placeholder="<?php echo $row['techlevel2'];?>" disabled>
            </div>

            <div class="col-12">
                <label for="" class="form-label"><b>Other Skills:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Data Structure"
                        name="ds" <?php if(isset($row['ds'])){echo "checked";} ?> disabled>
                    <label class="" for="inlineCheckbox1">Data Structure</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Algorithm" name="algo" 
                    <?php if(isset($row['algo'])){echo "checked";} ?> disabled>
                    <label class="" for="inlineCheckbox2">Algorithm</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Design Skills"
                        name="design" <?php if(isset($row['design'])){echo "checked";} ?> disabled>
                    <label class="" for="inlineCheckbox3">Design Skills</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Logical Thinking"
                        name="logic" <?php if(isset($row['logic'])){echo "checked";} ?> disabled>
                    <label class="" for="inlineCheckbox3">Logical Thinking</label>
                </div>
            </div>

            <div class="col-12">
                <label for="" class="form-label"><b>Add something extra whatever you want:</b></label><br>
                <textarea name="description" id="add" cols="80" rows="2" class="form-control" placeholder="<?php echo $row['description'];?>" disabled></textarea>
            </div>

            <!-- <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="">
                    <label class="form-check-label" for="">
                        Check me out
                    </label>
                </div>
            </div> -->
        </form>

        <!-- <?php if($err){ ?>
        <div class="alert alert-danger alert-dismissible fade show text-center my-2 mx-2" role="alert">
            <?php echo $err;
                      $err = false;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?> -->
    </div>

<!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
    crossorigin="anonymous"></script> -->

</body>

</html>