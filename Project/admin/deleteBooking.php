<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'assignment');

if(isset($_POST['delete']))
{
    
    $id=$_POST['id'];
    
    $query = "DELETE FROM participant WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
      echo'<script>alert("Event Deleted");<script>';    
      header("location: viewBooking.php");
    }
    else
    {
        echo'<script>alert("Event Not Deleted");<script>';
    }
}
?>
