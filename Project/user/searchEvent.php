<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content ="width=device-width", initial-scale="1.0">
            <link href="../mainpage.css" rel="stylesheet" type="text/css"/>
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


                        <form action="searchEvent.php">
                          <input type="text" placeholder="Search.." name="search">
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
             
                  $con = mysqli_connect("localhost", "root", "", "assignment");
                  
                  if(isset($_GET['search']))
                  {
                      $filtervalues = $_GET['search'];
                      $query = "SELECT *FROM event WHERE CONCAT (EventName, Location, Date, Time,  Price , EventDesc) LIKE '%$filtervalues%' ";
                      $query_run = mysqli_query($con, $query);
                      
                      if(mysqli_num_rows($query_run) > 0)
                      {
                          foreach($query_run as $items)
                          {
                              ?>
                              <div class="row">

                <fieldset>
                    <legend><?= $items['EventName']?></legend>
                    <div class="col">
                     <div class="image">
                            <img style="width: 15vw; height: 20vw" class="poster" src="../userimage/poster.jpg" width="350px" >
                     </div>  

                   <div>
                        <table>
                            <table border="1">
                                
                                    <tr>
                                        <th>Tittle : <?= $items['EventName']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Venue : <?= $items['Location']?> </th>
                                    </tr>
                                    <tr>
                                        <th>Date :  <?= $items['Date']?></th>
                                    </tr>
                                    <tr>
                                        <th>Time : <?= $items['Time']?> </th>
                                    </tr>  
                                    <tr>
                                        <th>Price : <?= $items['Price']?> </th>
                                    </tr> 
                                    <tr>
                                        <th>Description : <?= $items['EventDesc']?> </th>
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
                      else 
                      {
                         ?>
            
                             <?php   
                                echo "No Record Found";
            
                        
                          
                      }
                  
                 }
             
             ?>
            
            <footer>
                    <div class="text">
                        <h1 style="text-decoration: underline;">About US</h1>
                        <p class="desc">
                            Penang TARC Buddhist Society was founded in 1936.
                            The founder of the society is Mr Khoo Zheng Xiang. 
                            At the begining, there was only 20 members and gradually 
                            more and more people join the society. In the 
                            society, we will talk about what is life and create interesting event 
                            for all our member. Besides, we will often hold talks to
                            allow the interested parties to join and consequently learn new
                            knowledges that can't be found in books.
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
                        <a class="functionDetails" href="Mainpage.php">Home Page</a>
                    </div>
            </footer>
        </body>
    </html>