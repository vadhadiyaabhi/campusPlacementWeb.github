<?php
    session_start();
    if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] != true)
    {
        header("location: login.php");
        exit;
    }
    $err = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $con=mysqli_connect('localhost','root');
        $a = mysqli_select_db($con, 'Eplacement');

        $username = $_SESSION['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $altmobile = $_POST['altmobile'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $clg = $_POST['clg'];
        $uni = $_POST['uni'];
        $state = $_POST['state'];
        $enroll = $_POST['enroll'];
        $branch = $_POST['branch'];
        $sem = $_POST['sem'];
        $cpi = $_POST['cpi'];
        $block = $_POST['block'];
        $language1 = $_POST['language1'];
        $language2 = $_POST['language2'];
        $lanlevel1 = $_POST['lanlevel1'];
        $lanlevel2 = $_POST['lanlevel2'];
        $tech1 = $_POST['tech1'];
        $tech2 = $_POST['tech2'];
        $techlevel1 = $_POST['techlevel1'];
        $techlevel2 = $_POST['techlevel2'];
        $description = $_POST['description'];


        
        // if(isset($_POST['ds']))
        // {
        //     $ds = $_POST['ds'];
        //     $q="INSERT INTO RESUME (ds) values ('$ds');";
        //     $result = mysqli_query($con, $q);
        // }
        // if(isset($_POST['algo']))
        // {
        //     $algo = $_POST['algo'];
        //     $q="INSERT INTO RESUME (algo) values ('$algo');";
        //     $result = mysqli_query($con, $q);
        // }
        // if(isset($_POST['design']))
        // {
        //     $design = $_POST['design'];
        //     $q="INSERT INTO RESUME (design) values ('$design');";
        //     $result = mysqli_query($con, $q);
        // }
        // if(isset($_POST['logic']))
        // {
        //     $logic = $_POST['logic'];
        //     $q="INSERT INTO RESUME (logic) values ('$logic');";
        //     $result = mysqli_query($con, $q);
        // }

        $q="INSERT INTO resume (username, fname, lname, mobile, altmobile, gender, birthdate, clg, uni, state, branch, enroll, sem, cpi, block, language1, language2, lanlevel1, lanlevel2, tech1, tech2, techlevel1, techlevel2, description) values ('$username', '$fname', '$lname', '$mobile', '$altmobile', '$gender', '$birthday', '$clg', '$uni', '$state', '$branch', '$enroll', '$sem', '$cpi', '$block', '$language1', '$language2', '$lanlevel1', '$lanlevel2', '$tech1', '$tech2', '$techlevel1', '$techlevel2', '$description');";
        $result = mysqli_query($con, $q);

        if(isset($_POST['ds']))
        {
            $ds = $_POST['ds'];
            $q="Update RESUME set ds='$ds' where username='$username';";
            $result1 = mysqli_query($con, $q);
        }
        if(isset($_POST['algo']))
        {
            $algo = $_POST['algo'];
            $q="Update RESUME set algo='$algo' where username='$username';";
            $result2 = mysqli_query($con, $q);
        }
        if(isset($_POST['design']))
        {
            $design = $_POST['design'];
            $q="Update RESUME set design='$design' where username='$username';";
            $result3 = mysqli_query($con, $q);
        }
        if(isset($_POST['logic']))
        {
            $logic = $_POST['logic'];
            $q="Update RESUME set logic='$logic' where username='$username';";
            $result4 = mysqli_query($con, $q);
        }

        if($result){
            header("location: MyProfile.php");
        }
        else{
            $err = "Opps!! Insertion failed, Please try again";
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

    <title>Resume Building page</title>
    <link rel="stylesheet" href="form.css">
    <link href="logo.jpg" rel="shortcut icon">

</head>

<body>
    <div>
        <h4 class="text-center" style="font-family: 'Redressed', cursive; font-weight: bold; color: blue;">Build your resume to get
            best according to your skills...</h4>
    </div>
    <br>
    <hr>
    <img src="logo.jpg" alt="" height="55" width="100" class="mx-2">
    <h5 class="mx-4" style="display: inline;">
        Resume Building
    </h5>
    <hr>

    <div class="d1 border my-3">
        <form class="row g-3 mx-2" action="AppForm.php" method="POST">
            <h5 style="color: blue;"><i>Personal Details</i></h5>
            <div class="col-md-6">
                <label for="" class="form-label"><b>First Name</b></label>
                <input type="text" class="form-control" id="inputCity" name="fname" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><b>Last Name</b></label>
                <input type="text" class="form-control" id="inputCity" name="lname" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label" maxlength="10" minlength="10"><b>Mobile No.</b></label>
                <input type="number" class="form-control" id="inputCity" name="mobile"  minlength="10" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><b>Alternet Mobile No.</b></label>
                <input type="number" class="form-control" id="inputCity" name="altmobile" minlength="10" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><b>Gender </b></label>
                <input type="radio" class="form-check-input" name="gender" value="male"> <label for="male">Male</label>
                &nbsp; &nbsp;
                <input type="radio" class="form-check-input" name="gender" value="Female"> <label
                    for="female">Female</label>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label"><b>Birth Date </b></label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <hr>
            <h5 style="color: blue;"><i>Educational Details</i></h5>
            <div class="col-12">
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
            <div class="col-12">
                <label for="" class="form-label"><b>University</b></label><br>
                <select name="uni" id="" class="form-select" required>
                    <option value="GTU">GTU</option>
                    <option value="Gujrat University">Gujrat University</option>
                    <option value="KSV">KSV</option>
                    <option value="MSU">MSU</option>
                    <option value="BVM">BVM</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label"><b>State</b></label>
                <select id="inputState" class="form-select" name="state" required>
                    <option value="Gujrat">Gujrat</option>
                </select>
            </div>
            <div class="col-md-6 col-12">
                <label for="" class="form-label"><b>Enrollment No.</b></label>
                <input type="" class="form-control" id="inputCity" name="enroll" required>
            </div>
            <div class="col-md-2">
                <label for="" class="form-label"><b>Branch</b></label>
                <select class="form-select" id="inputZip" name="branch" required>
                    <option selected>CE</option>
                    <option>IT</option>
                </select>
            </div>
            <div class="col-4">
                <label for="" class="form-label"><b>Current Sem</b></label>
                <input type="number" class="form-control" name="sem" required>
            </div>
            <div class="col-4">
                <label for="" class="form-label"><b>CPI</b></label>
                <input type="text" class="form-control" name="cpi" required>
            </div>
            <div class="col-4">
                <label for="" class="form-label"><b>Total Block/s</b></label>
                <input type="number" class="form-control" name="block" required>
            </div>

            <hr>
            <h5 style="color: blue;"><i>Technical Skills</i></h5>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Programming Language:</b></label>
                <select class="form-select" id="inputZip" name="language1" required>
                    <option selected>C language</option>
                    <option>C++</option>
                    <option>Pyhton</option>
                    <option>JAVA</option>
                    <option>R</option>
                    <option>C#</option>
                    <option>.net</option>
                    <option>perl</option>
                </select>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <select class="form-select" id="" name="lanlevel1">
                    <option selected>Basic</option>
                    <option>Intermediate</option>
                    <option>Advanced</option>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Other language</b></label>
                <select class="form-select" id="inputZip" name="language2" required>
                    <option selected>C language</option>
                    <option>C++</option>
                    <option>Pyhton</option>
                    <option>JAVA</option>
                    <option>R</option>
                    <option>C#</option>
                    <option>.net</option>
                    <option>perl</option>
                </select>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <select class="form-select" id="" name="lanlevel2">
                    <option selected>Basic</option>
                    <option>Intermediate</option>
                    <option>Advanced</option>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Technology which you know:</b></label>
                <select class="form-select" id="inputZip" name="tech1" required>
                    <option selected>PHP-MySQL</option>
                    <option>Spring</option>
                    <option>Flutter</option>
                    <option>Django</option>
                    <option>ML</option>
                    <option>AI</option>
                    <option>Node JS</option>
                </select>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <select class="form-select" id="" name="techlevel1">
                    <option selected>Basic</option>
                    <option>Intermediate</option>
                    <option>Advanced</option>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Other Technology:</b></label>
                <select class="form-select" id="inputZip" name="tech2">
                    <option selected>PHP-MySQL</option>
                    <option>Spring</option>
                    <option>Flutter</option>
                    <option>Django</option>
                    <option>ML</option>
                    <option>AI</option>
                    <option>Node JS</option>
                </select>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <select class="form-select" id="" name="techlevel2">
                    <option selected>Basic</option>
                    <option>Intermediate</option>
                    <option>Advanced</option>
                </select>
            </div>

            <div class="col-12">
                <label for="" class="form-label"><b>Other Skills:</b></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Data Structure"
                        name="ds">
                    <label class="form-check-label" for="inlineCheckbox1">Data Structure</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Algorithm" name="algo">
                    <label class="form-check-label" for="inlineCheckbox2">Algorithm</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Design Skills"
                        name="design">
                    <label class="form-check-label" for="inlineCheckbox3">Design Skills</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Logical Thinking"
                        name="logic">
                    <label class="form-check-label" for="inlineCheckbox3">Logical Thinking</label>
                </div>
            </div>

            <div class="col-12">
                <label for="" class="form-label"><b>Add something extra whatever you want:</b></label><br>
                <textarea name="description" id="add" cols="80" rows="2" class="form-control" required></textarea>
            </div>

            <!-- <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="">
                    <label class="form-check-label" for="">
                        Check me out
                    </label>
                </div>
            </div> -->

            <div class="col-12 col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-12 col-md-6">
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>

        <?php if($err){ ?>
        <div class="alert alert-danger alert-dismissible fade show text-center my-2 mx-2" role="alert">
            <?php echo $err;
                      $err = false;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <p>You can also update your resume later from your profile page.!</p>
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