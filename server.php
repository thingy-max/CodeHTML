<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 require_once('connection.php');

[mail function]
SMTP = smtp.wayski.com
smtp_port = 25
auth_username = info@wayski.com
auth_password = wayskipassword



// Create connection
if(isset($_POST['submit'])){
  $to="info@wayski.com";
  //$from='sangampradeep1997@gmail.com';
  $firstname=mysqli_real_escape_string($conn,$_POST['fname']);
  $web=mysqli_real_escape_string($conn,$_POST['fwebsite']);
  $email=mysqli_real_escape_string($conn,$_POST['femail']);
  $mobile=$_POST['fphone'];
  //$aadhar=$_POST['aadhar'];
  $comment=$_POST['fmessage'];
  //$comment=mysqli_real_escape_string($conn,$_POST['comment']);
 
 
$sql = "INSERT INTO  contact(fname,website,email,mobile,comments) VALUES ('$firstname','$web','$email','$mobile','$comment')";
if(mail($to,$firstname,$mobile,$email,$comment)){
 echo "email sent successfully";
}
$result=( mysqli_query($conn,$sql)) or trigger_error(mysqli_error($conn));
/*if( mysqli_query($conn,$sql)){
    echo "<script>alert('Thanks for contacting us')</script>";
}
else{
    trigger_error(mysqli_error($conn));
}
*/

}
?>