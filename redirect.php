<?php
$env = parse_ini_file('.env');
$db_server=$env["SERVER"];
$db_user=$env["USERNAME"];
$db_pass=$env["PASSWORD"];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];
$acl=$role=='admin'?3:($role=='teacher'?2:1);
$conn=mysqli_connect($db_server,$db_user,$db_pass);
if(!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}
$sql="SELECT username,password,access_level FROM acgrsee.user_login
    WHERE username LIKE '$username' AND access_level LIKE '$acl';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password,$row['password']))
    {
        header("Location: landing/$role/$role.html");
        die();
    }
    else
    {
        echo "Incorrect Details";
    }
}
else
{
    echo "Incorrect Details";
}
?>