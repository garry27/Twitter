<html>

<head>

	<title>Twitter</title>	

	<link rel="stylesheet" href="style.css" type="text/css" />

</head>



<body>

	<div id="header">

		<img src="image\mobimg.jpg" align="right"  height=280 width=280> </img>

		
		<br>
		<h1>&nbsp; &nbsp;Twitter</h1>
			  <h2>&nbsp; &nbsp; &nbsp; &nbsp; Tweet your heart out!<br> </h2>

		<ul>


<br> <br> <br> <br> <br> <br> <br><li><a href="home.php">Home</a></li>

			<li><a href="profile.php">Profile</a></li>

			<li><a href="follower.php">Followers</a></li>

			<li><a href="following.php">Following</a></li>

			<li><a href="topic.php">Topics</a></li>
			
			<li><a href="tag.php">Tags</a></li>

			<li><a href="logout.php">Logout</a></li>
			
			


		</ul>	



	</div>

	<div id="content">

		<div id="sidebar">

			<h1>
			<?php



			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
 			 {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			

			$user = $_GET['followid'];
			$result = mysqli_query($con,"select name from user where user_id = '$user'");
			while($row = mysqli_fetch_array($result))
			  {
  				$name =  $row['name'] ;
 	
 			 }

			echo $name;

			?>

			</h1>

			<p> 
				<?php
					
					$user = $_GET['followid'];
					$result = mysqli_query($con,"select follower_count,following_count,tweet_count from user where user_id = '$user'");
					while($row = mysqli_fetch_array($result))
					  {
 					 	echo  "Tweets " . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "  . $row['tweet_count']  ;
						echo '<br>';
						echo  "Following " . "&nbsp;&nbsp;&nbsp; "  . $row['following_count']  ;
						echo '<br>';
						echo  "Followers " . "&nbsp;&nbsp; "  . $row['follower_count']  ;
 	
					  }





				  ?>

				
			</p>

			<h1> Follow them </h1>

			<ul><a href="home.php">

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
			  
			  mysqli_query($con,"INSERT INTO following VALUES ('$userid','$followid') ");
			  //mysqli_query($con,"INSERT INTO follower VALUES ('$followid','$userid') ");
			  mysqli_query($con,"update user set following_count= following_count + 1 where user_id = '$userid'");
			  mysqli_query($con,"update user set follower_count= follower_count + 1 where user_id = '$followid'");

			$result = mysqli_query($con,"select user_id, name from user where user_id != '$userid' and user_id not in(select following_id from following where user_id = '$userid') ");

			while($row = mysqli_fetch_array($result))
			  {
				
				echo "<a href='followprofile.php?followid=$row[user_id]'>";
			  	echo $row['name']; echo "<br>  <br>";
				echo "</a>";
 	
			  }

   			?>  </a>

			</ul>

			</div>

		<div id="main">

			<h1>About... </h1>
			
			<?php
			$userid = $_GET['followid'];
			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"select img_url from user where  user_id = '$userid' ");

			while($row = mysqli_fetch_array($result))
			  {
						$url = $row['img_url'];				  					
 	
			  }
			  
			  echo " <img src = '". $url . "' align='right'  height=170 width=170> </img>";

   			?>  
			

			<?php
			$userid = $_GET['followid'];
			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"select * from user where user_id = '$userid' ");

			while($row = mysqli_fetch_array($result))
			  {
			  	echo "Name :"." ". $row['name']; 
				echo "<br> <br>";
			  	echo "User Name :"." ". $row['user_id']; 
				echo "<br> <br>";
			  	echo "Location :"." ". $row['location']; 
				echo "<br> <br>";
			  	echo "Description :"." ". $row['description']; 
				echo "<br> <br>";
 	
			  }

   			?> 

		        <h1>User's Tweets</h1> 
                       		 <p>  

                         
			<?php
			$userid = $_GET['followid'];
			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"select tweet_text,tweet_id from tweet where user_id = '$userid' order by tweet_id desc ");

			while($row = mysqli_fetch_array($result))
			  {
			  	 echo "#".$row['tweet_id']." ". $row['tweet_text']; echo "<br> <br>";
 	
			  }

   			?> 




			</p>  

			
   
<br> </br>
<b><center>Copyright. All rights reserved by UrbanMusic.Inc </center><br></b>                             
                

</div>
</body>

</html>