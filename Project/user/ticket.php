<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="ticket.css" rel="stylesheet" type="text/css"/>

        <title>Ticket</title>
    </head>
    <body>
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
        
        
        if(isset($_COOKIE["username"])){
            $cookie_name=$_COOKIE["username"];
            $sql=("Select StudentID from user where Username='$cookie_name'");
            $result=$conn->query($sql);
            if($result->num_rows>0){
            while($row = $result->fetch_object()){
            $StudentID=$row->StudentID;  
                }
            }
        }   
        
        
        $sql="SELECT id FROM participant WHERE StudentID='$StudentID'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                        $id= $row["id"];
                }

        }
        
        $query = "SELECT * FROM participant";
        $query_run = mysqli_query($conn, $query);
        $query2 = "SELECT Date,Time,Location,Price FROM event";
        $query_run2 = mysqli_query($conn, $query2);

        if($query_run && $query_run2)
        {
            while(($row = mysqli_fetch_array($query_run)) && ($row2 = mysqli_fetch_array($query_run2)))
            {
        ?>
           
            <div class="row">

                <fieldset>
                  
                            <table border="1">
                                
                                    <tr>
                                        <th>Student ID : <?php echo $row ['StudentID']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Event : <?php echo $row ['Event']?> </th>
                                        <th>Location : <?php echo $row2 ['Location']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Date : <?php echo $row2 ['Date']?> </th>
                                        <th>Total Seat : <?php echo $row ['Seat']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Time : <?php echo $row2 ['Time']?> </th>
                                        <th>Price : <?php echo $row2 ['Price']?> </th>
                                    </tr>
                                   

                            </table>
                       
                    </div> 
                </fieldset>
                <div class="back">
                        <a href="checkBooking.php"><button class="button""><span>Back</span></button></a> 
                </div>
            </div>
            
             <?php
             
            }
        }

        ?>
        
        
    </body>
</html>
