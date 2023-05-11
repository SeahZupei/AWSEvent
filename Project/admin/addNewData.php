<!DOCTYPE html>

<?php
      $DB_HOST = "localhost";
      $DB_USER = "root";
      $DB_PASS = "";
      $DB_NAME = "assignment";

      // Create connection
      $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
      
      // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

if(isset($_POST['insert']))
{
    $EventName = trim($_POST["EventName"]);
    $EventDesc = trim($_POST["EventDesc"]);
    $Date = trim($_POST["Date"]);
    $Time = trim($_POST["Time"]);
    $Location = trim($_POST["Location"]);
    $Price = trim($_POST["Price"]);
    $SeatsAvailable = trim($_POST["SeatsAvailable"]);
    

    $query = "INSERT INTO event (EventName,EventDesc,Date,Time,Location,Price,SeatsAvailable) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn -> prepare($query);
    $stmt -> bind_param('sssssss', $EventName, $EventDesc, $Date,$Time, $Location, $Price, $SeatsAvailable);
    $stmt->execute();
    if($stmt -> affected_rows > 0){
        echo"<script LANGUAGE='JavaScript'>window.alert('Add Successfully');window.location.href='addEvent.php';</script>";

    }else{
        echo '<script>alert("Add Unsuccessful")</script>';

    }
    
        $stmt->close(); 
        $conn->close();
}
?>

<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <div class ="container">
            <div class="jumbotron">
                <h2>ADD EVENT</h2>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for ="">Event Name</label>
                        <input type="text" name="EventName" class="form-control" placeholder="Enter Event Name" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Event Description</label>
                        <input type="text" name="EventDesc" class="form-control" placeholder="Enter Event Description" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Date</label>
                        <input type="text" name="Date" class="form-control" placeholder="Enter Date" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Time</label>
                        <input type="text" name="Time" class="form-control" placeholder="Enter Time" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Location</label>
                        <input type="text" name="Location" class="form-control" placeholder="Enter Location" required>
                    </div>
                     <div class="form-group">
                        <label for ="">Price</label>
                        <input type="text" name="Price" class="form-control" placeholder="Enter Price" required>
                    </div>
                    <div class="form-group">
                        <label for ="">Seats Available</label>
                        <input type="text" name="SeatsAvailable" class="form-control" placeholder="Enter Seats Available" required>
                    </div>
                    <button type="submit" name="insert" class="btn btn-primary">SAVE EVENT</button>
                    <a href="addEvent.php" class="btn btn-danger">CANCEL</a>
                  </form>
              </div>
        </div>      
    </body>
</html>


