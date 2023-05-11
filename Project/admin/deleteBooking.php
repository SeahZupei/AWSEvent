<?php
$connection = mysqli_connect("evadb.cpfvj1jupn9o.us-east-1.rds.amazonaws.com","admin","12345678");
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
