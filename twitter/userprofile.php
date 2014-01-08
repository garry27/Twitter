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



			

			

			$user = $_GET['followid'];
			
for($i=0; $i<strlen($user); $i++)
{
         if( $user[$i] == "'" )
		 {
			header( 'Location: profile.php');
		 
		 }
}	


			$pdo = new PDO('mysql:host=localhost; dbname=twitter;', "root", "");
			
			
			


			
			  
			$stmt = $pdo->prepare('select name from user where user_id =:userid ');

			
			$stmt->execute(array(':userid' => $user));
			
			//$result = mysqli_query($con,"select name from user where user_id = '$user'");
			foreach($stmt as $row)
			  {
  				$name =  $row['name'] ;
 	
 			 }

			echo $name;

			?>

			</h1>

			<p> 
				<?php
					
					$user = $_GET['followid'];
	
for($i=0; $i<strlen($user); $i++)
{
         if( $user[$i] == "'" )
		 {
			header( 'Location: profile.php');
		 
		 }
}	
		$pdo = new PDO('mysql:host=localhost; dbname=twitter;', "root", "");
			
			
			


			
			  
			$stmt = $pdo->prepare('select follower_count,following_count,tweet_count from user where user_id = :userid ');

			
			$stmt->execute(array(':userid' => $user));

					
					//$result = mysqli_query($con,"select follower_count,following_count,tweet_count from user where user_id = '$user'");
					foreach($stmt as $row )
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
			if( $userid == '')
			{
				header('Location: login.htm');
			}

			$con=mysqli_connect("localhost","root","","twitter");
			
			//$pdo = new PDO('mysql:host=localhost; dbname=twitter;', "root", "");
			
			
			


			
			  
			//$stmt = $pdo->prepare('select user_id, name from user where user_id != :userid and user_id not in(select following_id from following where user_id = :userid ');

			
			//$stmt->execute(array(':userid' => $userid));
			  


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
			
for($i=0; $i<strlen($userid); $i++)
{
         if( $userid[$i] == "'" )
		 {
			header( 'Location: profile.php');
		 
		 }
}		
			
			$pdo = new PDO('mysql:host=localhost; dbname=twitter;', "root", "");
			
			
			


			
			  
			$stmt = $pdo->prepare('select img_url from user where  user_id = :name ');

			$stmt->execute(array(':name' => $userid));

			//$result = mysqli_query($con,"select img_url from user where  user_id = '$userid' ");

			foreach($stmt as $row)
			  {
						$url = $row['img_url'];				  					
 	
			  }
			  
			  echo " <img src = '". $url . "' align='right'  height=170 width=170> </img>";

   			?>  

			<?php
			$userid = $_GET['followid'];
			//$con=mysqli_connect("localhost","root","","twitter");
			
for($i=0; $i<strlen($userid); $i++)
{
         if( $userid[$i] == "'" )
		 {
			header( 'Location: profile.php');
		 
		 }
}		

			$pdo = new PDO('mysql:host=localhost; dbname=twitter;', "root", "");
			
			
			


			
			  
			$stmt = $pdo->prepare('select * from user where user_id = :name ');

			$stmt->execute(array(':name' => $userid));
			

			//$result = mysqli_query($con,"select * from user where user_id = '$userid' ");

			foreach($stmt as $row)
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
			
		//$userid = mysql_real_escape_string($user);
		
	
			
for($i=0; $i<strlen($userid); $i++)
{
         if( $userid[$i] == "'" )
		 {
			header( 'Location: profile.php');
		 
		 }
}		
			
			
			
			
			$pdo = new PDO('mysql:host=localhost; dbname=twitter;', "root", "");
			
			
			


			
			  
			$stmt = $pdo->prepare('select tweet_text,tweet_id from tweet where user_id = :name order by tweet_id desc ');

			$stmt->execute(array(':name' => $userid));

			//$result = mysqli_query($con,"select tweet_text,tweet_id from tweet where user_id = '$userid' order by tweet_id desc ");

			foreach($stmt as $row)
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