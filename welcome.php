<?php
   include('login.php');
?>
<html> 
   <head>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <title> Welcome </title>
   </head>
   <body>
      <h1>Welcome! <?php echo $login_session; ?></h1> 
      <a href="logout.php"> LOGOUT </a>
<div class="row">
   <?php
   $sql = "SELECT * FROM ul1";
   $result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         $id=$row['id'];
         echo '  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">'. $row["id"].'</h5>
        <h5 class="card-title">'. $row["un"].'</h5>
        <a href="delete.php?deleteid='.$id.'">DELETE</a>
        </div>
      </div>
    </div>';
        }
} else {
    echo "0 results";
}
?>
</div>
<a href="add.php"> ADD AN ACCOUNT </a>
      <script src="app.js"></script>
   </body>
</html>