<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content ="width=device-width", initial-scale="1.0">
    <link href="viewBooking.css" rel="stylesheet" type="text/css"/>
    <link href="../header&footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>View and Manage Booking</title>
</head>
<body>
    <!-- header -->
    <div class="header">
            
        <div class="nameLogo">
            <div class="clubName">
                <p>Penang TARC Buddhist Society</p>
            </div>
        
        <div class="logo">
             <a href="../adminMain.php" ><img class="imglogo" src="../image/logo.png" alt="logo"></a>
        </div>
            
         </div>
    </div>
    <hr>

    <b><h2>View and Manage Booking</h2></b>
            <hr>
     <?php
        $connection = mysqli_connect("localhost","root","" );
        $db = mysqli_select_db($connection, 'assignment');
        
        $query = "SELECT * FROM participant";
        $query_run = mysqli_query($connection, $query);
        ?>
            
            <br>
            <table class ="table table-bordered" style = "background-color: white;">
                <thead class="table-dark">
                    <tr>
                        <th>Student ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Event</th>
                        <th>Seat</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
          
        <?php
        if($query_run)
        {
            while($row = mysqli_fetch_array($query_run))
            {
                ?>
<tbody>
    <tr>
        
        <th><?php echo $row ['StudentID']?> </th>
        <th><?php echo $row ['Name']?> </th>
        <th><?php echo $row ['Email']?> </th>
        <th><?php echo $row ['PhoneNumber']?> </th>
        <th><?php echo $row ['Event']?></th>
        <th><?php echo $row ['Seat']?></th>
      
        <form action="editBooking.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <th><input type="submit" name="Edit" class="btn btn-success" value="EDIT"></th>
        </form>
        <form action="deleteBooking.php" method="post">
            
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <th><input type="submit" name="delete" class="btn btn-danger" value="DELETE"></th>
            
        </form>
        
    </tr>
</tbody>
            <?php
               
            }
        }
        else{
           echo "No Record Found";
        }
        ?>
    
            </table> 
    
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
    

</html>
