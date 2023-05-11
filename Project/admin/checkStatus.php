<!DOCTYPE html>

<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content ="width=device-width", initial-scale="1.0">
    <link href="viewBooking.css" rel="stylesheet" type="text/css"/>
    <link href="../header&footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Booking Status</title>
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

    <b><h2>Status of the Booking</h2></b>
            <hr>
    
            <br>
            <table class ="table table-bordered" ">
                <thead class="table-dark">
                    <tr>
                        <th>Student ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Event</th>
                        <th>Total Seat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                 <?php
                          $DB_HOST = "evadb.cpfvj1jupn9o.us-east-1.rds.amazonaws.com";
                          $DB_USER = "admin";
                          $DB_PASS = "12345678";
                          $DB_NAME = "ExaByte";

                          // Create connection
                             $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

                          // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }

                            $query="SELECT StudentID,Name,Email,PhoneNumber,Event,Seat,Status FROM participant";

                            if($result=$conn->query($query)){
                                while($row = $result->fetch_object()){
                                 printf('
                                     <tbody>
                                        <tr>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>

                                        </tr>
                                        </tbody>',
                                         $row->StudentID,
                                         $row->Name,
                                         $row->Email,
                                         $row->PhoneNumber,
                                         $row->Event,
                                         $row->Seat,
                                         $row->Status);

                            }



                             $result->free();
                             $conn->close();
                            }


                 ?>
            </table>
    
    
                          
    </body>
    

</html>
