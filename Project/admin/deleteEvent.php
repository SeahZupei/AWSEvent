
<?php
$connection = mysqli_connect("evadb.cpfvj1jupn9o.us-east-1.rds.amazonaws.com","admin","");
$db = mysqli_select_db($connection, 'ExaByte');

if(isset($_POST['delete']))
{
    $id = $_POST['id'];
        
    $query = "DELETE FROM event WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
      echo'<script>alert("Event Deleted");<script>';    
      header("location: addEvent.php");
    }
    else
    {
        echo'<script>alert("Event Not Deleted");<script>';
    }
}
?>