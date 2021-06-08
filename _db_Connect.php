<?php 
$con=mysqli_connect('localhost','root');
 if(!$con){
    die("Error!; mysqli_connect_error()");
 }
 else
 {
    //  echo "connection done";
 }
 $a=mysqli_select_db($con,'Eplacement');
?>