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
    
    if(isset($_POST['pay'])){
        $query="UPDATE participant SET Status='Paied'";
        
        if ($conn->query($query) === TRUE) {
            echo"<script LANGUAGE='JavaScript'>window.alert('Payment Successful');window.location.href='checkBooking.php';</script>";
          } 
        else {
            echo '<script>alert("Payment fail...")</script>';
          }
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="payment.css" rel="stylesheet" type="text/css" />
        <title>Payment</title>
    </head>
    <body>
         <form action="" method="POST">
             <div class="container">
                 <div class="content">
                  <label for="username"><b>Full Name : </b></label>
                  <input type="text" placeholder=" Card Holder Name " name="username" id="username" required>
                 </div>
                 
                 <div class="content">
                  <label for="card"><b>Card Number : </b></label>
                    <div class="cardNum">
                        <input type="text" placeholder=" # # # # " name="cardNum" id="card" required>
                        <input type="text" placeholder=" # # # # " name="cardNum" id="card" required>
                        <input type="text" placeholder=" # # # # " name="cardNum" id="card" required>
                        <input type="text" placeholder=" # # # # " name="cardNum" id="card" required>
                    </div>
                 </div>
                 
             <div class="content2">
                <div class="content">
                      <label for="date"><b>Expiry Date : </b></label>
                      <div class="date">
                        <input type="text" placeholder=" MM " name="date" id="date" required>
                        <input type="text" placeholder=" YYYY " name="date" id="date" required>
                      </div>
                </div>
                <div class="content">
                      <label for="CVV"><b>CVV : </b></label>
                      <input type="text" placeholder=" Code " name="CVV" id="CVV" required>
                </div>
             </div>
                 <img src="../userimage/card.png" alt="card" style="width: 300px; height: 150px; margin-left: 3vw;" >
                 <button class="button" name="pay">Pay Now</button>
                 
                 
                 
                 
             </div>
          </form>
    </body>
</html>
