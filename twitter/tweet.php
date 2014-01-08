


<?php
session_start();
$userid = $_SESSION['userid'];
$tweet_txt = $_POST["tweet_txt"];
$tweet_txt = $tweet_txt." ";



$con=mysqli_connect("localhost","root","","twitter");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"select tweet_id from tweet where user_id = '$userid' ");
$tweet = 0 ;
while($row = mysqli_fetch_array($result))
  {
  
	if($tweet < $row['tweet_id'])
		$tweet =  $row['tweet_id'] ; 
 	
  }

$tweet_id =$tweet + 1;

mysqli_query($con,"UPDATE user SET tweet_count = tweet_count+1 WHERE user_id='$userid' ");

mysqli_query($con,"INSERT INTO tweet VALUES ('$tweet_id','$userid','$tweet_txt' ,'self')");


for($i=0; $i<strlen($tweet_txt); $i++)
{
         if( $tweet_txt[$i] == "#" )
		 {
			$i = $i + 1 ; $tag = "";
			for($j = $i; $i<strlen($tweet_txt); $j++)
			{
				
				if( $tweet_txt[$j] == " " )
					break;
				
					$tag = $tag.$tweet_txt[$j];
					
				
					
			} echo $tag;
			
			
			mysqli_query($con,"INSERT INTO tag VALUES ('$tweet_id','$userid','$tag')");
		 
		 }
}


mysqli_close($con);

 	header( 'Location: home.php');
?> 


