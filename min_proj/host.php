<?php
$user=$_POST['f1'];
$pass=$_POST['f2'];
echo"your user name is $user <br> your password is $pass";
$servername="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($servername,$username,$password,$database);
if(!$con)
{
    die("error detected".mysqli_error($con));
}
else
{
    echo"<script>alert('Database Connected')</script>";
}
?>