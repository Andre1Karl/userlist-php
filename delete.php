<?php
  include ('welcome.php');
  if(isset($_GET['deleteid'])){
  	$id=$_GET['deleteid'];
  	$sql="DELETE FROM `ul1` WHERE `ul1`.`id`= ".$id.";";
  	$result=mysqli_query($db,$sql);
  	if($result){
  		//echo "DELETED SUCCESSFULLY";
      header('location:welcome.php');
  	}
  	else{
  		die(mysqli_error($db));
  	}

  }
?>