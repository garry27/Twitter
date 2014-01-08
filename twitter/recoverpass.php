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


<br> <br> <br> <br> <br> <br> <br><li><a href="login.htm">Login</a></li>

		</ul>	



	</div>

	<div id="content">

		<div id="sidebar">

			<h1>What's Twitter?</h1>

			<p> 
				<marquee  direction="up"><a href= 'http://en.wikipedia.org/wiki/Twitter' target = "_blank" >  <img src="image\mobimg.jpg" align = "center"  height=200 width=200> </img></a>	
				</marquee> 
			</p>

			<h1></h1>

			<ul>



			</ul>

			</div>

		<div id="main">

			<h1>Answer your security question</h1>

			<p>
			<?php



			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
 			 {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }


			
			$user = $_POST['userid'];
			$result = mysqli_query($con,"select sec_question from user where user_id = '$user'");
			while($row = mysqli_fetch_array($result))
			  {
  				$question =  $row['sec_question'] ;
 	
 			 }
			 if(!isset($question) || empty($question))
			{

				echo "Userid not valid";
				header('Location: recover.php');

			}else
			{

					echo $question."?";
			}

			?>
			<form name="signup" method="post" action="passaccess.php" >
			<p><strong>Confirm User ID:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" size="16" name="userid" value=""/></p>
			<p><strong>Your answer:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><textarea name="answer" cols="50" rows="4"></textarea> </strong></p>
			
			<p><input type="submit" value="Get Password"></p>

			
			</p>
		     
  



			</form>
 <br> </br>
<b><center>Copyright. All rights reserved by UrbanMusic.Inc </center><br></b>                             

 

		       
</div>


</div>

</body>

</html>


<?php



?>