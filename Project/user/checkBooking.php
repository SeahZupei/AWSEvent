<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<html>
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content ="width=device-width", initial-scale="1.0">
            <link href="checkBooking.css" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <title>Booking</title>
    </head>
    <body>
             <!-- header -->
            <div class="header">

                <div class="nameLogo">
                    <div class="clubName">
                        <p>Penang TARC Buddhist Society</p>
                    </div>

                    <div class="logo">
                        <a href="../Mainpage.php"><img class="imglogo" src="../image/logo.png" alt="logo"></a>
                    </div>

                </div>
                <div class="nav">

                    <div class="module">
                        <a href="index.php">Log Out</a>
                    </div>
                    
                     <div class="module">
                        <a href="user/checkBooking.php">My Ticket</a>
                    </div>

                    <div class="module">
                        <form action="searchEvent.php" method= "GET">
                            <div class="search">
                                <div class="searchInput">
                                     <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $GET['search'];} ?>" class="form-control" placeholder="Search Data" >
                                </div>
                                <div>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                   

                </div>

            </div>
                    
            <table class ="table table-dark table-striped">
                <thead>
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
                            
                            $query="SELECT StudentID,Name,Email,PhoneNumber,Event,Seat,Status FROM participant WHERE StudentID='$StudentID'";

                            if($result=$conn->query($query)){
                                while($row = $result->fetch_object()){
                                    
                                ?>   
                               
                                     <tbody>
                                        <tr>
                                        <td><?php echo $row->StudentID ?></td>
                                        <td><?php echo $row->Name ?></td>
                                        <td><?php echo $row->Email ?></td>
                                        <td><?php echo $row->PhoneNumber ?></td>
                                        <td><?php echo $row->Event ?></td>
                                        <td><?php echo $row->Seat ?></td>
                                        <td><?php 
                                            if(strcmp($row->Status,"Paied") == 0){
                                                $paied=$row->Status;
                                                echo "<a href='ticket.php'>$paied</a>";
                                                    
                                            }
                                            else if(strcmp($row->Status,"Pending") == 0){
                                                $pending=$row->Status;
                                                echo "<a href='Payment.php'>$pending</a>";
                                            }
                                            
                                            else{
                                              echo"Wrong";
                                            }
                                                
                                            ?>
                                        </td>
                                        </tr>
                                        </tbody>
                                 
                                    <?php
                                }
                            $result->free();
                             $conn->close();
                            }   
                            
                     
                          

                 ?>
                
            </table>
                
                
                
                
          <footer class="footer1">
                <div class="text">
                    <h1 style="text-decoration: underline;">About US</h1>
                    <p class="desc">
                        Penang TARC Buddhist Society build on 2022 Year.
                        The founder of the society is Mr Khoo Zheng Xiang. 
                        The start of the company only had 20 members but 
                        nowadays already had more than 50 members. In the 
                        society will teach a lot of truth of life and share 
                        the interesting event or story to all member. Besides,
                        we also will held some talk with the free entrance to
                        let the interested parties to join the talk learn more
                        knowledge.
                    </p>
                </div>

                <div class="icon">
                    <ul style="display: flex;flex-direction: column;">

                        <div style="display: flex;flex-direction: row;align-items: center;">
                        <i class="fa-brands fa-square-facebook"></i>
                        <p style="margin-left:10px"><a class="facebook" href="https://www.facebook.com/Buddhis.Tarc"><b>TARUC PG Buddhist Society</a></p>
                        </div>

                        <div style="display: flex;flex-direction: row;align-items: center;">
                        <i class="fa-brands fa-square-instagram"></i>
                        <p style="margin-left:10px"><b>tarucpg_buddhistsociety</p>
                        </div>

                        <div style="display: flex;flex-direction: row;align-items: center;">
                        <i class="fa-solid fa-envelope"></i>
                        <p style="margin-left:10px"><a class="gmail" href="mailto:taruc_buddhis@gmail.com"><b>Email</p>
                        </div>

                    </ul>

                </div>    
                 <div class="function">
                    <a class="functionDetails" href="">Home Page</a>

                </div>

            </footer>
    </body>
</html>
