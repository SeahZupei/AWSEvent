<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

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


  if(isset($_POST['insert'])){      
                   $StudentID=trim($_POST["StudentID"]);
                   $Name=trim($_POST["Name"]);
                   $Email=trim($_POST["Email"]);
                   $PhoneNumber=trim($_POST["PhoneNumber"]);   
                   $Event=trim($_POST["Event"]);   
                   $Seat=trim($_POST["Seat" ]);

                   

            if(preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $StudentID)){
                            $query  ="INSERT INTO participant (StudentID,Name,Email,PhoneNumber,Event,Seat,Status) VALUES(?,?,?,?,?,?,'Pending');";
                            $stmt = $conn -> prepare($query);
                            $stmt -> bind_param('ssssss', $StudentID, $Name, $Email, $PhoneNumber, $Event, $Seat);
                            $stmt ->execute();

                         if($stmt -> affected_rows > 0){
                           echo"<script LANGUAGE='JavaScript'>window.alert('Join Successful');window.location.href='../Mainpage.php';</script>";
                         }else{
                           echo '<script>alert("Join Successful")</script>';
                         }
                         $stmt->close();
                         
                    }     
                    else{
                    echo '<script>alert("<strong>Student ID</strong> is of invalid format. Format : 99XXX9999.")</script>';
                }
                        
                         $conn->close();
 
                }

     ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Join Event</title>
        <link href="joinEve.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        
        <form action="" method="POST">
              <div class="join">
                        
                              
                          <label for="StudentID"><b>Student ID : </b></label>
                          <input type="text" placeholder=" StudentID " name="StudentID" id="StudentID" required>

                          <label for="Name"><b>Name :</b></label>
                          <input type="text" placeholder=" Name " name="Name" id="Name" required>

                          <label for="Email"><b>Email : </b></label>
                          <input type="text" placeholder=" Email " name="Email" id="Email" required>


                          <label for="PhoneNumber"><b>Phone Number : </b></label>
                          <input type="text" placeholder="PhoneNumber" name="PhoneNumber" id="PhoneNumber" required>  


  
                             <label for="Event"> Event : </label>     
                               <select id="Event" name="Event" class="event">    
                                   <option value="none">Select Event:</option>    
                                   <option value="Di Zi Gui">Di Zi Gui</option>
                                   <option value="Vegetarian Food Fair">Vegetarian Food Fair</option>
                                   <option value="Vesak Day">Vesak Day</option>
                                   <option value="Important of Filial Piety">Important of Filial Piety</option>
                               </select>    

                          
                            <label for="Seat"><b>Seat : </b></label>
                            <input type="text" placeholder="Seat" name="Seat" id="Seat" required>  

                      
                      <input type="submit" class="button" name="insert" value="Submit"/>

              </div>  
          </form> 
       
    </body>
    
</html>
        
