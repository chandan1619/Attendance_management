<?php
include('connect.php');
session_start();
if(isset($_POST['submit']))
{

$username=$_POST['username'];
$password=$_POST['password'];
$semester=$_POST['semester'];
$branch=$_POST['branch'];	
$query="select username,password from faculty where username='$username' and password='$password'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)
{
	echo "valid login";
	$_SESSION['semester']=$semester;
	$_SESSION['branch']=$branch;
	$_SESSION['username']=$username;
	
	header("Location:faculty.php");
	
}
else
{
	echo "invalid login";
}



}

?>
<div class="div1" style="float:left;margin-top: 100px;">
<form  method="POST">
<table style="margin-left: 100px;">
	<th>
	<h2>
	FACULTY LOGIN
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
	<td>Branch name</td>
	<td>
	<select name="branch">
  <option value="computer science">computer science</option>
  <option value="electronics and communications">electronics and communications</option>
  <option value="mechanical engineering">mechanical engineering</option>
  <option value="civil">civil</option>
  <option value="electrical">electrical</option>
  <option value="biotech">biotech</option>
  <option value="chemical">chemical</option>



</select>
</td>
</tr>

<tr>
<td>select semester</td>
<td>
<select name="semester">
    <option value="">select semester</option>
    <?php
    $query="select * from semester";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
      ?>
      <option value="<?php echo $row['id'] ;?> "><?php echo $row['semester'];?></option>
      <?php
    }
    ?>

  </select>
  </td>
  </tr>
  <tr>
	
	<td><input type="submit" name="submit" value="submit" ></td>
</tr>
<tr><td><p>Want to change username and password?<a href="change.php">click here</a></p></td></tr>

</table>
</form>
</div>

</body>

</html>


<div class="div1" style="margin-left:400px;color:blue;">

 <form action"" method="POST">
 
<p>
 <input style="color:blue;" type="submit" name="submit1" value="backtostudent">

 </form>
 </div>
 <?php
if(isset($_POST['submit1']))
{
session_unset();
session_destroy();
header("Location:login.php");

}

?>
