<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">  
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Assignment</title>
         <link href="adminMain.css" rel="stylesheet" type="text/css"/>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
         <link href="header&footer.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
        
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
           
            
        </div>
         <!<!-- header end -->
         <div class="card-group">
  <div class="card">
    <img src="image/add.png" class="card-img-top" alt="Add&edit">
    <div class="card-body">
        <h5 class="card-title"><a style="text-decoration: none;color: rgba(0, 157, 144, 1);" href="admin/addEvent.php">Add & Edit Event</a></h5>
    </div>
  </div>
  <div class="card">
    <img src="image/book.png" class="card-img-top" alt="Booking">
    <div class="card-body">
      <h5 class="card-title"><a style="text-decoration: none;color: rgba(0, 157, 144, 1);" href="admin/viewBooking.php">View Booking</a></h5>
    </div>
  </div>
  <div class="card">
    <img src="image/status.png" class="card-img-top" alt="PaymentStatus">
    <div class="card-body">
        <h5 class="card-title"><a style="text-decoration: none;color: rgba(0, 157, 144, 1);" href="admin/checkStatus.php">Check Status<a/></h5>
    </div>
  </div>
</div>
         
         
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
     <!-- footer -->
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
           <!---footer--->
</html>
