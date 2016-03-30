	<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select F_name from login where User_name = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['F_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: http://localhost/new/Default.php");
   }
?>