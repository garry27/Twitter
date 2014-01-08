


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
	

  




















$userid = $_POST["userid"];
$name = $_POST["name"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
$location = $_POST["location"];
$description = $_POST["description"];
$que = $_POST["question"];
$ans = $_POST["answer"];



if(!isset($userid) || empty($userid))
{

	echo "UserID not filled. Go back";

}else
if(!isset($name) || empty($name))
{

	echo "Name not filled. Go back";

}else
if ($_FILES["file"]["error"] > 0)
{
	echo "Select an image.Go back";
}else
if (($_FILES["file"]["type"] != "image/gif") && ($_FILES["file"]["type"] != "image/jpeg") && ($_FILES["file"]["type"] != "image/jpg") && ($_FILES["file"]["type"] != "image/png"))
{
	echo "Selected file not an image.Go back";
}else
if($_FILES["file"]["size"] > 5000000)
{
	echo "Selected image too large.Go back";
}else
if(!isset($password) || empty($password))
{

	echo "Password not filled. Go back";

}else
if(!isset($description) || empty($description))
{

	echo "Description not filled. Go back";

}else
if(!isset($que) || empty($que))
{

	echo "Security question not filled. Go back";

}else
if(!isset($ans) || empty($ans))
{

	echo "Answer not filled. Go back";

}else
if ($password != $repassword)
  {
  echo "Error : password does not match.Go back.";
  }
else
{

move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $user_id);
$url = "upload/" . $user_id;

$con=mysqli_connect("localhost","root","","twitter");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$result = mysqli_query($con,"select user_id from user where user_id = '$userid'");

while($row = mysqli_fetch_array($result))
  {
	
  	$user =  $row['user_id'] ;
	
  }
if(!empty($user))
	{
 	 echo "Userid already been taken.Go back and choose another.  <br>";
	}else
	{

		mysqli_query($con,"INSERT INTO user VALUES ('$userid','$password' ,'$name','$location','$description',0,0,0,'$que','$ans','$url')");

	


  	 header( 'Location: login.htm');
	 }
	 
	 	mysqli_close($con);

}


?> 