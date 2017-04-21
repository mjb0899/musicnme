<?php
session_start();
if($_SESSION['dev']!=1){
    header("location:/../pageNotFound.html");
}else{
}
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<head>
  <meta charset="utf-8">
    <title>Login</title>
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

</head>
    <div id="login">
        <H1 style="color: #ff3333;margin: auto">Music$Me</H1>
      <form name='form-login' action="ad_validate.php" method="post">
        <span class="fontawesome-user"></span>
          <input type="text" id="user" placeholder="Username" name="username" required>
       
        <span class="fontawesome-lock"></span>
          <input type="password" id="pass" placeholder="Password" name="password" required>
        
        <input type="submit" value="Login">

      </form>
    </div>

</body>
</html>
