<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
  <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content ="width=device-width", initial-scale="1.0">
            <link href="mainpage.css" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
            <title>Mainpage</title>
        </head>
        <body>

            <!-- header -->
            <div class="header">

                <div class="nameLogo">
                    <div class="clubName">
                        <p>Penang TARC Buddhist Society</p>
                    </div>

                    <div class="logo">
                        <img class="imglogo" src="image/logo.png" alt="logo">
                    </div>

                </div>
                <div class="nav">

                    <div class="module">
                        <a href="index.php">Log Out</a>
                    </div>
                    
                     <div class="module">
                        <a href="user/checkBooking.php">My Ticket</a>
                    </div>


                    <form action="user/searchEvent.php" method= "GET">
                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $GET['search'];} ?>" class="form-control" placeholder="Search Data" >
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>

                   

                </div>

            </div>


        <sectione class="events">
            <br>
            <div class="title">
                <h1 align="center">Welcome To Join Our Buddhist Event!!</h1>
            </div>
             <?php
        $connection = mysqli_connect("evadb.cpfvj1jupn9o.us-east-1.rds.amazonaws.com","admin","12345678" );
        $db = mysqli_select_db($connection, 'ExaByte');
        
        $query = "SELECT * FROM event";
        $query_run = mysqli_query($connection, $query);
        ?>
            
        <?php
        if($query_run)
        {
            while($row = mysqli_fetch_array($query_run))
            {
                ?>   
            <div class="row">

                <fieldset>
                    <legend><?php echo $row ['EventName']?> </legend>
                    <div class="col">
                     <div class="image">
                            <img style="width: 15vw; height: 20vw" class="poster" src="userimage/poster.jpg" width="350px" >
                     </div>  
                        
                       
                    
                   <div>
                        <table>
                            <table border="1">
                                
                                    <tr>
                                        <th>Tittle : <?php echo $row ['EventName']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Venue : <?php echo $row ['Location']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Date : <?php echo $row ['Date']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Time : <?php echo $row ['Time']?> </th>
                                    </tr>  
                                    <tr>
                                        <th>Price : <?php echo $row ['Price']?> </th>
                                    </tr> 
                                    <tr>
                                        <th>Description : <?php echo $row ['EventDesc']?> </th>
                                    </tr> 

                            </table>

                       </table>
                       <div class="details">
                             <a href="user/JoinEve.php"><button class="button""><span>Join</span></button></a> 
                        </div>
                   </div>
                    </div> 
                </fieldset>
            </div>
            
             <?php
             
            }
        }
        else{
           echo "No Record Found";
        }
        ?>
            
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