<?php
//including the database connection file
include("config.php");

if(isset($_POST['Submit'])) { 
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $un = mysqli_real_escape_string($db, $_POST['un']);
  $pw = mysqli_real_escape_string($db, $_POST['pw']);
    
  // checking empty fields
  if(empty($id) || empty($un) || empty($pw)) {
        
    if(empty($id)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }
    
    if(empty($un)) {
      echo "<font color='red'>Age field is empty.</font><br/>";
    }
    
    if(empty($pw)) {
      echo "<font color='red'>Email field is empty.</font><br/>";
    }
    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
  } else { 
    $result = mysqli_query($db, "INSERT INTO `ul1` (`id`, `un`, `pw`) VALUES('$id','$un',MD5('$pw'))");
    echo "<font color='green'>Data added successfully.";
    echo "<br/><a href='index.php'>View Result</a>";
  }
}
?>
<html>
<head>
  <title>Add Data</title>
</head>

<body>
  <a href="welcome.php">Home</a>
  <br/><br/>

  <form action="add.php" method="post" name="form1">
    <table width="25%" border="0">
      <tr> 
        <td>ID</td>
        <td><input type="text" name="id"></td>
      </tr>
      <tr> 
        <td>USERNAME</td>
        <td><input type="text" name="un"></td>
      </tr>
      <tr> 
        <td>PASSWORD</td>
        <td><input type="text" name="pw"></td>
      </tr>
      <tr> 
        <td></td>
        <td><input type="submit" name="Submit" value="Add"></td>
      </tr>
    </table>
  </form>
</body>
</html>
