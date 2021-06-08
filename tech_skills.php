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
    $row = mysqli_fetch_array($result);
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
</head>

<body class="border">
  <div class="mx-3 my-3">
    <h4 style="display: inline; font-size: larger;">Technical Skills</h4>
    <a href="techedit.php" class="mx-2"><b>Edit</b></a>
  </div>
    <div class="mx-4">
        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Programming Language:</b></label>
                <input class="form-control" id="inputZip" name="language1" placeholder="<?php echo $row['language1']; ?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="lanlevel1" placeholder="<?php echo $row['lanlevel1']; ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Other language</b></label>
                <input class="form-control" id="inputZip" name="language2" placeholder="<?php echo $row['language2']; ?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="lanlevel2" placeholder="<?php echo $row['lanlevel2']; ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Technology which you know:</b></label>
                <input class="form-control" id="inputZip" name="tech1" placeholder="<?php echo $row['tech1']; ?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="techlevel1" placeholder="<?php echo $row['techlevel1']; ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <label for="" class="form-label"><b>Other Technology:</b></label>
                <input class="form-control" id="inputZip" name="tech2" placeholder="<?php echo $row['tech2']; ?>" disabled>
            </div>
            <div class="col-md-4 col-12">
                <label for="" class="form-label"><b>Level</b></label>
                <input class="form-control" id="" name="techlevel2" placeholder="<?php echo $row['techlevel2']; ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
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
        </div>
        <div class="row mt-3">

        <div class="col-12">
                <label for="" class="form-label"><b>Add something extra whatever you want:</b></label><br>
                <textarea name="description" id="add" cols="80" rows="2" class="form-control" placeholder="<?php echo $row['description'];?>" disabled></textarea>
            </div>
        </div>
    </div>
  



  <div class="mx-3 mt-5"> after updating your details refresh the page or login again then it'll be updated...
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