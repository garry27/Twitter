

			<?php
			session_start();
			$userid = $_SESSION['userid'];
			$followid = $_GET['followid'];
			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  
			  mysqli_query($con,"DELETE FROM following WHERE user_id='$userid' and following_id = '$followid' ");
			 // mysqli_query($con,"DELETE FROM follower WHERE user_id ='$followid' and follower_id = '$userid' ");
			  mysqli_query($con,"update user set following_count= following_count - 1 where user_id = '$userid'");
			  mysqli_query($con,"update user set follower_count= follower_count - 1 where user_id = '$followid'");

			  header( 'Location: following.php');

			
 	
			  

   			?> 