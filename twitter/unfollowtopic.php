

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
			  
			  mysqli_query($con,"DELETE FROM user_topic WHERE user_id='$userid' and topic_id = '$followid' ");


			  header( 'Location: topic.php');

			
 	
			  

   			?> 