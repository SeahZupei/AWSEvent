<!DOCTYPE html>
  <!--
  Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
  Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
  --> 
 <?php
        
    function checkStudentID(){
        $error=false;
        
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
        global $StudentID,$UserType;

            $query=("SELECT StudentID FROM $UserType WHERE StudentID='$StudentID'");
            $result = $conn->query($query);
            if($result->num_rows>0){
                $error=true;
            }
            else{
                $error=false;
            }
            

    $conn -> close();
    return $error;
}
  
  ?>
 
  <?php

      
      
      $DB_HOST = "localhost";
      $DB_USER = "root";
      $DB_PASS = "";
      $DB_NAME = "assignment";

      // Create connection
      $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
      
      // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
       
  if(isset($_POST['insert'])){        
                $UserType=trim($_POST['usertype']);
                $Username=trim($_POST['username']);
                $Password=trim($_POST['password']);
                $StudentID=trim($_POST['StudentID']);
                $Email=trim($_POST['email']);
                $PhoneNumber=trim($_POST['phoneNum']);
                $Gender=trim($_POST['gender']);
                
                if(preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $StudentID)){
                        if(strcmp($UserType, "admin") == 0){
                        $query  ="INSERT INTO admin (UserType,Username,Password,StudentID,Email,PhoneNumber,Gender) VALUES(?,?,?,?,?,?,?);";
                        $stmt = $conn -> prepare($query);
                        $stmt -> bind_param('sssssss', $UserType, $Username, $Password,$StudentID, $Email, $PhoneNumber, $Gender);
                        }
                        else{
                        $query  ="INSERT INTO user (UserType,Username,Password,StudentID,Email,PhoneNumber,Gender) VALUES(?,?,?,?,?,?,?)";
                        $stmt = $conn -> prepare($query);
                        $stmt -> bind_param('sssssss', $UserType, $Username, $Password,$StudentID, $Email, $PhoneNumber, $Gender);
                        }

                        $error = checkStudentID();  

                        if(empty($error)){
                           $result = $stmt ->execute();
                           if($stmt -> affected_rows > 0){
                             echo"<script LANGUAGE='JavaScript'>window.alert('Register Successfully');window.location.href='index.php';</script>";

                           }else{
                             echo '<script>alert("Register Fail")</script>';

                           }
                        }
                        else{
                            echo '<script>alert("The Student ID has been register....  Please try again!")</script>';
                        }
                        
                            $stmt->close();
                            $conn->close();
                }
                else{
                    echo '<script>alert("Student ID is of invalid format. Format : 99XXX9999.")</script>';
                }
          }
          

  ?>
  <html>
      <head>
          <meta charset="UTF-8">
          <link href="register.css" rel="stylesheet" type="text/css"/>
          <title>Register</title>
      </head>
      <body>

          <h1 class="tittle">Register</h1>
          <fieldset>   
          <form action="" method="POST">
              <div class="container">

                      <h1>Create Account</h1>
                      <hr>
                          <label  class="form-label">Select User Type: </label>
                              <select aria-label="Default select example" name="usertype">
                             <option selected value="user">User</option>
                             <option value="admin">Admin</option>
                              </select><br><br>
                              
                              
                          <label for="username"><b>Username : </b></label>
                          <input type="text" placeholder=" USERNAME " name="username" id="username" required>

                          <label for="password"><b>Password :</b></label>
                          <input type="password" placeholder=" PASSWORD " name="password" id="password" required>
                          
                          <label for="StudentID"><b>Student ID :</b></label>
                          <input type="text" placeholder=" STUDENT ID " name="StudentID" id="StudentID" required>

                          <label for="email"><b>Email : </b></label>
                          <input type="text" placeholder=" EMAIL " name="email" id="email" required>


                          <label for="phoneNum"><b>Phone Number : </b></label>
                          <input type="text" placeholder=" PHONE NUMBER " name="phoneNum" id="phoneNum" required>  


                            <div class="row">    
                             <div class="area">    
                               <label for="gender"> Gender : </label>    
                             </div> 

                             <div class="choose gender">    
                               <select id="gender" name="gender">    
                                   <option value="none">Select gender:</option>    
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>

                               </select>    
                             </div>    
                            </div> 


                      <hr>
                      <p>After create an account you're one of our Buddhist Society.</p>
                      <p>Already a member  <a href="index.php">Log-In</a></p>       
                      <input type="submit" class="button" name="insert" value="Register"/>

              </div>  
          </form>
          </fieldset>
      </body>
  </html>v