<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
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

    if(isset($_POST['login'])){
        

        $Username=trim($_POST['username']);
        $Password=trim($_POST['password']);
        $UserType=trim($_POST['userType']);



        

        if(strcmp($UserType, "admin")==0){  
            $query=("SELECT Username,Password FROM admin WHERE Username='$Username' and Password='$Password'");
            $result = $conn->query($query);
            if($result->num_rows>0){

                echo"<script LANGUAGE='JavaScript'>window.alert('Login Successful');window.location.href='adminMain.php';</script>";
            }
            else{
                 echo"<script LANGUAGE='JavaScript'>window.alert('Login Unsuccessful');window.location.href='adminMain.php';</script>";
            }
        }   
        else{
            $query=("SELECT Username,Password FROM user WHERE Username='$Username' and Password='$Password'");
             $result = $conn->query($query);
            if($result->num_rows>0){
                $cookie="username";
                //set the cookie
                setcookie("$cookie","$Username",time()+86400*2,'/');
                echo"<script LANGUAGE='JavaScript'>window.alert('Login Successful');window.location.href='Mainpage.php';</script>";
                
            }
            else{
                echo '<script>alert("Login Unsuccessful")</script>';
            }
        }
       
         $conn->close();
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Log-In</title>
        <link href="loginMain.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        
        <div class ="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <form class="border shadow p-3 rounded" style="width: 450px" method="POST">
                                    <h1 class="text-center p-3">TARC BUDDHIST SOCIETY</h1>
                      <div class="mb-3">
                        <label for="username" class="form-label">Username</label> 
                        <input type="text" 
                               class="form-control" 
                               name="username"
                               id="username" >
                      </div>
                      <div class="mb-3">
                        <label for="password" 
                               class="form-label">Password</label>
                        <input type="text" 
                               name="password"
                               class="form-control" 
                               id="password" >
                      </div>
                       <div class="mb-0">
                        <label  class="form-label">Select User Type: </label>
                              <select class="form-select mb-3" aria-label="Default select example" name="userType">
                                      
                                <option selected value="user">User</option>
                                <option value="admin">Admin</option>
                              </select>
                       <p>Don't Have An Account? <a href="Register.php">Register</a></p>

                       <input type="submit" name="login" value="login" class="btn btn-success"/>
                           

                        </div>
            </form>
    </body>
</html>

