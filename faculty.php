<?php
include('connect.php');
session_start();
$semid= $_SESSION['semester'];

$branch=$_SESSION['branch'];
 $username=$_SESSION['username'];
 
$query="select * from subject where semid=$semid and branch='$branch'";

$result=mysqli_query($con,$query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
} 
$a=array();
 
if(mysqli_num_rows($result)>0)
{

  while($row=mysqli_fetch_array($result))
  {
    array_push($a,$row['subject']);
     
   }
}





?>






<?php
include('connect.php');
if(isset($_POST['submitregister']))
{
$subject=$_POST['subject'];
 $check = implode(',', $_POST['chk']);

//$check=implode(" ",$_POST['chk']);
//$check = mysql_real_escape_string(implode(',', $_POST['chk']));


$query="insert into attendance(username,branch,semester,subject,date,roll)values('$username','$branch','$semid','$subject',now(),'$check')";
$result=mysqli_query($con,$query)or die("insert query error".mysqli_error());

    
if($result){
  $msg= "attendance submitted";
}
else
{
  $msg ="try again";
}

}
?>































<html>
<body>
 <h1 style="color:red;font:bold;"><?php if(isset($_POST['submitregister'])) echo $msg ?></h1>

<form action="" method="POST">
<table style="margin-left: 100px;padding-top:100px ">
  <th>
 
  <h2>
  GIVE ATTENDANCE
  </h2>
  </th>

<tr>
<td>select subject</td>
<td>
    <select name="subject">

        <option selected="selected">select subject</option>

        <?php

   

        foreach($a as $subject){

        ?>

        <option value="<?php echo strtolower($subject); ?>"><?php echo $subject; ?></option>

        <?php

        }

        ?>

    </select>
  </td>
  </tr>
  <tr>
    <td>
     date of attendance
    </td>
    <td>
    
<p id="venue"></p> 

<script>
var d = new Date();
document.getElementById("venue").innerHTML = d.toDateString();
</script>



    </td>
  </tr>
<tr>
  <td>
          Roll_num:
          </td>
          <td>
            <input   type="checkbox" name="chk[]"   value="1">1
            <input  type="checkbox" name="chk[]"  value="2">2
            <input   type="checkbox" name="chk[]"  value="3">3
            <input type="checkbox" name="chk[]"   value="4">4
            <input type="checkbox" name="chk[]"   value="5">5

            <input type="checkbox" name="chk[]"   value="6">6

            <input type="checkbox" name="chk[]"   value="7">7

            <input type="checkbox" name="chk[]"    value="8">8

            <input type="checkbox" name="chk[]"    value="9">9

            <input type="checkbox" name="chk[]"   value="10">10

            <input type="checkbox" name="chk[]"  value="11">11

            <input type="checkbox" name="chk[]"   value="12">12

            <input type="checkbox" name="chk[]"   value="13">13

            <input type="checkbox" name="chk[]"  " value="14">14

            <input type="checkbox" name="chk[]"   value="15">15

            <input type="checkbox" name="chk[]"   value="16">16

            <input type="checkbox" name="chk[]"    value="17">17

            <input type="checkbox" name="chk[]"    value="18">18
            <input type="checkbox" name="chk[]"    value="19">19
            <input type="checkbox" name="chk[]"  value="20">20
            <input type="checkbox" name="chk[]"  value="21">21
            <input type="checkbox" name="chk[]"  value="22">22
            <input type="checkbox" name="chk[]"  value="23">23
            <input type="checkbox" name="chk[]"  value="24">24
            <input type="checkbox" name="chk[]"  value="25">25
            <input type="checkbox" name="chk[]"  value="26">26
            <input type="checkbox" name="chk[]"  value="27">27

          </td> 
          </tr>  
  <tr>
  
  <td><input type="submit" name="submitregister" value="submitregister" ></td>
  </tr>

</table>
</form>
<div class="div1" style="margin-left:400px;color:blue;">

 <form action"" method="POST">
 
<p>
 <input style="color:blue;" type="submit" name="submit1" value="logout">

 </form>
 </div>
 <?php
if(isset($_POST['submit1']))
{
session_unset();
session_destroy();
header("Location:facultylogin.php");

}
?>


</body>
</html>


