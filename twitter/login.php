

<?php

$userid = $_POST["userid"];

$password = $_POST["password"];





$con=mysqli_connect("localhost","root","","twitter");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$result = mysqli_query($con,"select user_id, password from user where user_id = '$userid'");

while($row = mysqli_fetch_array($result))
  {
  	$user =  $row['user_id'] ; $pass = $row['password'];
 	 echo "<br>";
  }
if($pass != $password )
{
	echo "Incorrect User ID or Password";
}
else

{
	session_start();
	$_SESSION['userid'] = $user;
  	 header( 'Location: home.php');
}

mysqli_close($con);


?> 