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
        $connection = mysqli_connect("evadb.cpfvj1jupn9o.us-east-1.rds.amazonaws.com", "admin", "");
        $db = mysqli_select_db($connection, 'assignment');
        
        $id = $_POST['id'];
        
        $query = "SELECT * FROM event WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
           while($row = mysqli_fetch_array($query_run)) 
           {
               ?>
        <div class="container">
            <div class="jumbotron">
                <h2>Edit Event</h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label for ="">Event Name</label>
                        <input type="text" name="EventName" class="form-control" value="<?php echo $row['EventName'] ?>" placeholder="Enter Event Name" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Event Description</label>
                        <input type="text" name="EventDesc" class="form-control" value="<?php echo $row['EventDesc'] ?>" placeholder="Enter Event Description" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Date</label>
                        <input type="text" name="Date" class="form-control" value="<?php echo $row['Date'] ?>" placeholder="Enter Date" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Time</label>
                        <input type="text" name="Time" class="form-control" value="<?php echo $row['Time'] ?>" placeholder="Enter Time" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Location</label>
                        <input type="text" name="Location" class="form-control" value="<?php echo $row['Location'] ?>" placeholder="Enter Location" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Price</label>
                        <input type="text" name="Price" class="form-control" value="<?php echo $row['Price'] ?>" placeholder="Enter Price" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Seats Available</label>
                        <input type="text" name="SeatsAvailable" class="form-control" value="<?php echo $row['SeatsAvailable'] ?>" placeholder="Enter Seats Available" required>
                    </div>
                    
                    <button type="submit" name="update" class="btn btn-primary">UPDATE EVENT</button>
                    <a href="addEvent.php" class="btn btn-danger">CANCEL</a>
                  </form>
                
                <?php
                if(isset($_POST['update']))
                {
                    $EventName = $_POST['EventName'];
                    $EventDesc = $_POST['EventDesc'];
                    $Date = $_POST['Date'];
                    $Time = $_POST['Time'];
                    $Location = $_POST['Location'];
                    $Price = $_POST['Price'];
                    $SeatsAvailable = $_POST['SeatsAvailable'];
                    
                    $query = "UPDATE event SET EventName='$EventName', EventDesc='$EventDesc', Date='$Date', Time='$Time', Location = '$Location' , Price='$Price', SeatsAvailable='$SeatsAvailable' WHERE id='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    
                    if($query_run)
                    {
                        echo'<script>alert("Event Updated");<script>';  
                        header("location: addEvent.php");
                    }
                    else
                    {
                        echo'<script>alert("Event Not Updated");<script>';
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
