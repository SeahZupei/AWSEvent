<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<?php 

      $DB_HOST = "evadb.cpfvj1jupn9o.us-east-1.rds.amazonaws.com";
      $DB_USER = "admin";
      $DB_PASS = "12345678";
      $DB_NAME = "assignment";

      // Create connection
      $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
      
      // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
      if(isset($_POST['insert'])){ 
          $Name= trim($_POST["Name"]);
          $Email= trim($_POST["Email"]);
          $PhoneNumber= trim($_POST["PhoneNumber"]);
          $Event= trim($_POST["Event"]);
          $Seat= trim($_POST["Seat"]);
          
          
          
      }
    






?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editing Booking</title>
        <link href="edit.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        
        <form action="" method="POST">
              <div class="join">
                              
                          <h1 style="text-shadow: 2px 2px 10px white;">Editing.....</h1>
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

                      
                      <input type="submit" class="button" name="insert" value="Update"/>

              </div>  
          </form> 


    </body>
    
</html>
        

