
<style type="text/css">
td
{
    padding:0 15px 0 15px;
    color: red;
}
</style>


<?php
include('connect.php');
session_start();

$username=$_SESSION['username'];


$query="select * from student where username='$username'";
$result=mysqli_query($con,$query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$row=mysqli_fetch_array($result);
$branch=$row['branch'];
$semester=$row['semester'];
$name=$row['name'];


  $query1="select subject,roll,date from attendance where branch='$branch' and semester='$semester' order by date,subject";
  //echo $branch;
//echo $semester;
  $result1=mysqli_query($con,$query1);
  if (!$result1) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  }
?>
  <table style="align-self: center;margin-left: 50px;border:2px;">
    <caption>
     <h1> Attendance date wise:</h1>
     </caption>
      <tr>
      <td>Date</td>
      <td>Subject</td>
      <td colspan="10">ROLL NUMBER</td>
      
      
  </tr>
  <?php

    while($row1=mysqli_fetch_array($result1))
    {

    


      ?>

      <tr>
      <td>
        <?php echo $row1['date'];?>

      </td>
      <td>
        <?php echo $row1['subject'];?>
      </td>

      
      <?php
      $roll=explode(",",$row1['roll']);
      for($i=0;$i<count($roll);$i++)
      {
        ?>
        <td><?php echo $roll[$i]."   ";?></td>
        <?php
      }
      

  }
    ?>
    </table>
 

 <div class="div1" style="margin-left:400px;color:blue;">

 <form action"" method="POST">
 
<p>
 <input style="color:blue;" type="submit" name="submit" value="logout">
<p>Welcome <?php echo $name ;?></p>
 </form>
 </div>
 <?php
if(isset($_POST['submit']))
{
session_unset();
session_destroy();
header("Location:login.php");

}

?>

