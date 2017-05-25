<?php
include('connect.php');
session_start();
if(isset($_POST['submitlogin']))
{

$username=$_POST['username'];
$password=$_POST['password'];

$query="select username,password from student where username='$username' and password='$password'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)
{
	echo "valid login";
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	header("Location:stud_attendance.php");
}
else
{
	echo "invalid login";
}



}




?>




<html>

<head>
	<title>login page</title>
</head>
<body>



<!--student login-->
<div class="div1" style="float:left;margin-top: 100px;">
<form action=" " method="post">

<table style="margin-left: 100px;">
	<th>
	<h2>
	STUDENT LOGIN
	</h2>
	</th>
<tr>
	<td>Username</td>
	<td><input type="text" name="username"></td>
</tr>
<tr>
	<td>password</td>
	<td><input type="password" name="password" ></td>
</tr>
<tr>
	
	<td><input type="submit" name="submitlogin" value="submitlogin"></td>
</tr>
<tr><td><p>Dont have an account?<a href="signup.php">Sign up</a></p></td></tr>
<tr><td><p style="color:red;">Faculty Login<a href="facultylogin.php">click here</a></p></td></tr>

</table>

</form>

</div>



<!-- sign up page-->


