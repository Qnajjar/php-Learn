<?php

include("config.php");
  session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,@$_POST['Username']);
      $mypassword = mysqli_real_escape_string($db,@$_POST['Password']) ; 
    
      $sql = "SELECT id FROM login WHERE User_name='$myusername' and  Password='$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count > 0) {
        //session_register("Username");
         $_SESSION['login_user'] = $myusername;
         
         header("location: Admin.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1></h1><!--<span>Pen <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>-->
</div>
<!--<div class="rerun"><a href="">Rerun Pen</a></div>-->
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form action="" method="POST">
      <div class="input-container">
        <input type="text" name="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" name="submit"><span>Login</span></button>
      </div>
     <!--<div class="footer"><a href="#">Forgot your password?</a></div>-->
    </form>
  </div>

  </body>
</html>






