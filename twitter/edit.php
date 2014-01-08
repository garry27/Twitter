	


<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
/*if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {*/
  if ($_FILES["file"]["error"] > 0)
    {
		//echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
	
	//$data = file_get_contents($_FILES['photo']['tmp_name']);
	
	
	
	











session_start();
$userid = $_SESSION['userid'];
$name = $_POST["name"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
$location = $_POST["location"];
$description = $_POST["description"];
$que = $_POST["question"];
$ans = $_POST["answer"];

move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $userid);
$url = "upload/" .  $userid;

if (!empty($password) && $password != $repassword)
  {
  echo "Error :New password does not match";
  }



$con=mysqli_connect("localhost","root","","twitter");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
    if ($_FILES["file"]["error"] > 0)
    {
		//mysqli_query($con,"Update user set img_url = '$url' where user_id = '$userid'");
    }
	else
	if (($_FILES["file"]["type"] != "image/gif") && ($_FILES["file"]["type"] != "image/jpeg") && ($_FILES["file"]["type"] != "image/jpg") && ($_FILES["file"]["type"] != "image/png"))
	{
		echo "Selected file not an image.Go back";
	}else
	if($_FILES["file"]["size"] > 5000000)
	{
		echo "Selected image too large.Go back";
	}else
	{
		mysqli_query($con,"Update user set img_url = '$url' where user_id = '$userid'");
	}

  
if (!empty($password) && $password != $repassword)
{
	mysqli_query($con,"Update user set password = '$password' where user_id = '$userid'");
}
	
if (!empty($name))
{
	mysqli_query($con,"Update user set name = '$name' where user_id = '$userid'");
}

if (!empty($location))
{
	mysqli_query($con,"Update user set location = '$location' where user_id = '$userid'");
}
	
if (!empty($description))
{
	mysqli_query($con,"Update user set description = '$description' where user_id = '$userid'");
}
	
if (!empty($que))
{
	
	
	if (!empty($ans))
	{
		mysqli_query($con,"Update user set sec_ans = '$ans' where user_id = '$userid'");
		mysqli_query($con,"Update user set sec_question = '$que' where user_id = '$userid'");
	}
	

}
	



mysqli_close($con);


  	header( 'Location: profile.php');
	
	?> 
	 
 


