<?php
   include("config.php");
   session_start(); 
   $error ='';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);      
      $sql = "SELECT id FROM ul1 WHERE un = '$myusername' and pw = md5('$mypassword')";
      $result = mysqli_query($db,$sql);
      $count=0;
      if($result){
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $count = mysqli_num_rows($result);
      }		
      if($count == 1) {
        // session_register("myusername");
         $_SESSION['login_user'] = $myusername;      
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
      <form action = "" method = "post">
            <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
            <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
            <input type = "submit" value = " Submit "/><br />
      </form>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
  </body>
   <script src="app.js"></script>
</html>