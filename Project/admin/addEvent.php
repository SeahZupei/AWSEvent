<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content ="width=device-width", initial-scale="1.0">
    <link href="addEvent.css" rel="stylesheet" type="text/css"/>
    <link href="../header&footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Add and Edit Event</title>
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

    <b><h2>Add and Edit Event</h2></b>
            <hr>
    <div class="row">
        <a href="addNewData.php"class= "btn btn-success" style="margin-left: 80%">ADD EVENT</a>
    </div>
     <?php
        $connection = mysqli_connect("localhost","root","" );
        $db = mysqli_select_db($connection, 'assignment');
        
        $query = "SELECT * FROM event";
        $query_run = mysqli_query($connection, $query);
        ?>
            
            <br>
            <table class ="table table-bordered" style = "background-color: white;">
                <thead class="table-dark">
                    <tr>
                        <th>Event Name</th>
                        <th>Event Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Seats Available</th>
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
        <th><?php echo $row ['EventName']?> </th>
        <th><?php echo $row ['EventDesc']?> </th>
        <th><?php echo $row ['Date']?> </th>
        <th><?php echo $row ['Time']?></th>
        <th><?php echo $row ['Location']?></th>
        <th><?php echo $row ['Price']?></th>
        <th><?php echo $row ['SeatsAvailable']?></th>
      
        <form action="editEvent.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <th><input type="submit" name="edit" class="btn btn-success" value="EDIT"></th>
        </form>
        <form action="deleteEvent.php" method="post">
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
    
    </body>
    

</html>