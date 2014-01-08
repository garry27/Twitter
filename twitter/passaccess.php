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

			<h1>Your Password</h1>

			<p>
			<?php



			$con=mysqli_connect("localhost","root","","twitter");

			// Check connection
			if (mysqli_connect_errno($con))
 			 {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }


			
			$userans = $_POST['answer'];
			$userid = $_POST['userid'];
			//echo $userans;
			$result = mysqli_query($con,"select password, sec_ans from user where user_id = '$userid'");
			while($row = mysqli_fetch_array($result))
			  {
  				$password =  $row['password'];
				$ans = $row['sec_ans'];
 	
 			 }

			if ( $userans == $ans )
			{
				echo $password;
			}
			else
			{
				echo "Wrong answer";
			}

			?>
			
<br> </br>
                        

 

		       
</div>


</div>

</body>

</html>


<?php



?>