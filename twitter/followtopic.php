

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
			  
			  mysqli_query($con,"insert into user_topic values('$userid','$followid') ");
			 

			  header( 'Location: topic.php');

			
 	
			  

   			?> 