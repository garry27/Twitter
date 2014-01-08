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


			session_start();
			$user = $_SESSION['userid'];
			if( $user == '')
			{
				header('Location: login.htm');
			}
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
					
					$user = $_SESSION['userid'];
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
			$userid = $_SESSION['userid'];
			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

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

			<h1>Your current followers</h1>

			<?php
			$userid = $_SESSION['userid'];
			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"select f.user_id, u.name from user u,following f where u.user_id = f.user_id and f.following_id = '$userid' ");

			while($row = mysqli_fetch_array($result))
			  {
				echo "<a href='userprofile.php?followid=$row[user_id]'>"; 
			  	echo $row['name']; 
				echo "</a>"; echo ' ';
				echo "<br>  <br>";
 	
			  }

   			?>
                        <p>                                                                                                             </p>  

			
   

<br> </br>
<b><center>Copyright. All rights reserved by UrbanMusic.Inc </center><br></b>                             
                

</div>
</body>

</html>