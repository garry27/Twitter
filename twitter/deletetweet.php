<?php

			session_start();
			$user = $_SESSION['userid'];
			$tweetid = $_GET['tweetid'];
			
			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			mysqli_query($con,"delete from tweet where user_id = '$user' and tweet_id ='$tweetid'");
			mysqli_query($con,"delete from tag where user_id = '$user' and tweet_id ='$tweetid'");
			mysqli_query($con,"update user set tweet_count = tweet_count - 1 where user_id = '$user'");
			
mysqli_close($con);


  	 header( 'Location: profile.php');


?>