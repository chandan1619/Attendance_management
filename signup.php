<?php
include('connect.php');
if(isset($_POST['submit']))
{
	session_start();

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$branch=$_POST['branch'];
$semester=$_POST['semester'];
$roll =$_POST['roll'];
$username=$_POST['username'];
$password=$_POST['password'];
$repass=$_POST['password1'];
$result="select username and password from student where username='$username' or password='$password'";

$result1=mysqli_query($con,$result);
if(mysqli_num_rows($result1)>0)
{
	echo "username already taken";
}
else
{



if($password==$repass)
{
	$query="insert into student(name,last,branch,semester,roll,username,password,repassword) values('$name','$lastname','$branch','$semester','$roll','$username','$password','$repass')";
	if(mysqli_query($con,$query))
	{
		echo "data is inserted";
		header("Location:login.php");

	}
	else
	{
		echo "insert query error".mysqli_error($con);
	}
}
else
{
	echo "retype your password";
}
}
}

?>


































<form action="" method="post">

<div style="margin-left: 100px;">

<table style="margin: 100px;">
	<th>
	<h2>
	STUDENT SIGN UP
	</h2>
	</th>
<tr>
	<td>first name</td>
	<td><input type="text" name="name" required></td>
</tr>
<tr>
	<td>last name</td>
	<td><input type="text" name="lastname" ></td>
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
	<td>roll num</td>
	<td><input type="text" name="roll" ></td>
</tr>
<tr>
	<td>Username</td>
	<td><input type="text" name="username" ></td>
</tr>
<tr>
	<td>password</td>
	<td><input type="password" name="password" ></td>
</tr>
<tr>
	<td>reenter password</td>
	<td><input type="password" name="password1" ></td>
</tr>


<tr>
	
	<td><input type="submit" name="submit" value="submit"></td>
</tr>

</table>
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

header("Location:login.php");

}

?>
