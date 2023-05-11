<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        
        <?php
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, 'assignment');
        
        $id = $_POST['id'];
        
        $query = "SELECT * FROM participant WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
           while($row = mysqli_fetch_array($query_run)) 
           {
               ?>
        <div class="container">
            <div class="jumbotron">
                <h2>Edit Booking</h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label for ="">Student ID</label>
                        <input type="text" name="StudentID" class="form-control" value="<?php echo $row['StudentID'] ?>" placeholder="Enter Student ID" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Student Name</label>
                        <input type="text" name="Name" class="form-control" value="<?php echo $row['Name'] ?>" placeholder="Enter Student Name" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Email</label>
                        <input type="text" name="Email" class="form-control" value="<?php echo $row['Email'] ?>" placeholder="Enter New Email" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Phone Number</label>
                        <input type="text" name="PhoneNumber" class="form-control" value="<?php echo $row['PhoneNumber'] ?>" placeholder="Enter New Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Event</label>
                        <input type="text" name="Event" class="form-control" value="<?php echo $row['Event'] ?>" placeholder="Enter New Event" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Seat</label>
                        <input type="text" name="Seat" class="form-control" value="<?php echo $row['Seat'] ?>" placeholder="Enter Seat" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">UPDATE BOOKING</button>
                    <a href="viewBooking.php" class="btn btn-danger">CANCEL</a>
                  </form>
                
                <?php
                if(isset($_POST['update']))
                {
                    $StudentID = $_POST['StudentID'];
                    $Name = $_POST['Name'];
                    $Email = $_POST['Email'];
                    $PhoneNumber = $_POST['PhoneNumber'];
                    $Event = $_POST['Event'];
                    $Seat = $_POST['Seat'];
                    
                    $query = "UPDATE participant SET StudentID='$StudentID', Name='$Name', Email='$Email', PhoneNumber='$PhoneNumber', Event='$Event', Seat='$Seat' WHERE id='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    
                    if($query_run)
                    {
                        echo'<script>alert("Booking Updated");<script>';  
                        header("location: viewBooking.php");
                    }
                    else
                    {
                        echo'<script>alert("Booking Not Updated");<script>';
                    }
                    
                }
                ?>
                
            </div>
            
        </div>
        
               <?php
           }
        }
        else
        {
            echo'<script>alert("No Record Found");<script>';
        }
        
        ?>
        
    </body>
</html>
