<?php
include('connect.php');
if(isset($_POST['submit']))
{


$oldusername=$_POST['oldusername'];
$newusername=$_POST['newusername'];
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];


$query="select * from faculty where username='$oldusername' and password='$oldpassword'";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)>0)
{

	$query1="UPDATE faculty
SET username = '$newusername', password= '$newpassword'
where username='$oldusername' and password='$oldpassword'";
	$result1=mysqli_query($con,$query1);
	if($result1)
	{
		?>
			<p style="color:red;"><?php echo "succefully changed the username and password";?></p>

		<?php
	}
	else
	{
		echo "insert query error".mysqli_error($con);
	}

}
else
{
	?>
			<p style="color:red;"><?php echo "invalid user";?></p>

		<?php
}










}














?>


<div class="div1" style="float:left;margin-top: 100px;">
<form  method="POST">
<table style="margin-left: 100px;">
	<th>
	<h2>
	CHANGE DETAILS
	</h2>
	</th>
<tr>
	<td>old_username</td>
	<td><input type="text" name="oldusername" required=""></td>
</tr>
<tr>
	<td>new_username</td>
	<td><input type="text" name="newusername" required></td>
</tr>
<tr>
	<td>old_password</td>
	<td><input type="password" name="oldpassword" required></td>
</tr>


<tr>
	<td>new_password</td>
	<td><input type="password" name="newpassword" required></td>
</tr>
<tr>
	
	<td><input type="submit" name="submit" value="submit" ></td>
</tr>
</table>
</form>
</div>
</form>
<div class="div1" style="margin-left:400px;color:blue;">

 <form action"" method="POST">
 
<p>
 <input style="color:blue;" type="submit" name="back" value="back">

 </form>
 </div>
  <?php
if(isset($_POST['back']))
{

header("Location:facultylogin.php");

}

?>