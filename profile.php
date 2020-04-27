
<?php
 session_start();
 $con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
 
 ?>
<html>




 <head>
        <title>Profile</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="index.css" type="text/css">
		<link href="assets/css/style.css" rel="stylesheet">
		<script src="assets/js/main.js"></script>
		</head>
		<body>
		 <header id="header" class="fixed-top d-flex align-items-center">
	<div style= "background-color:  #5366f4">
    <div class="container" >

      
		<div style ="margin-top : 10px;">
		<nav class="nav-menu d-none d-lg-block" style = "float: left;">
		<a href = "index.html"> <h2 style ="color : white;">Student grevience Portal</h2> </a>
		</nav>
      <nav class="nav-menu d-none d-lg-block" style = "float: right;">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
        
       
          <li><a href="logout.php">logout</a></li>

        </ul>
      </nav><!-- .nav-menu -->
  </div>
    </div>
	</div>
  </header>
         
		 
		
		

		<center>
		<h1>Your profile</h1>
		
					<div class="card">
			<img src ="img/account.svg" height = "200px" width = "200px">
			  <h1><?php echo $_SESSION['name']; ?></h1>
			  <br>
			  
			<b>Name</b>    :    <?php echo $_SESSION['name']; ?> <br>
		    <b>College </b>:    <?php echo $_SESSION['clg']; ?> <br>
			<b>Dept </b>   :    <?php echo $_SESSION['dept']; ?> Engineering<br>
			<b>Email </b>  :      <?php echo $_SESSION['email']; ?>
			
			<br>
			<br>
			  <p><button>Contact</button></p>
			</div>
			</center>
			
			
				
		<?php 
		if($_SESSION['design'] == 'student')
		{ $uid = $_SESSION['id'];
			  $con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
			 $query = "SELECT * FROM issues,users where  users.id = issues.userid and userid = '$uid' order by datei desc ";
			 $res = mysqli_query($con,$query)  or die("failed ".mysqli_error($con));
			 
		 ?>
		 
		
		
	
		
		
		<div style = "margin-left : 300px; margin-top: 50px">
		 <h1 style="margin-left : 250px;"> YOUR GREVIENCES  </h1>
		
		<?php
		  while($array = mysqli_fetch_array($res)) { ?>
		<div class="card mb-3" style="max-width: 1020px; background-color:  #f5f5f5; margin-top:20px; padding: 2%; border:  black 0.5px; border-radius: 15px">
  			<div class="row no-gutters">
    			<div class="col-md-2" style="padding-top: 40px; padding-left: 50px">
      				<img src="img/complaint.svg" class="card-img" alt="..." height="70px" width="70px">
			    </div>
			<div class="col-md-10">
				<div class="card-body">
					<h5 class="card-title" style="font-size: 25px; color: blue"><?php echo $array['title'] ?></h5>
					<p class="card-text"><small class="text-muted">Posted by: <?php echo $array['name']; ?><br> Date : <?php echo $array['datei']; ?></small></p>

					    <p class="card-text" style="font-size: 20px"><?php echo $array['details'] ?></p>
					    <div class="row">
					    <div class="col-lg-2">
					    <button type="button" class="btn ">
					    <img src="img/up-arrow.svg" class="card-img" alt="..." height="20px" width="20px">&nbsp;&nbsp;Upvote
						</button>

						</div>
						<div class="col-lg-2">
					    <button type="button" class="btn">
					    <img src="img/down-arrow.svg" class="card-img" alt="..." height="20px" width="20px">&nbsp;&nbsp;Downvote
						</button>
						</div>
						</div>
					    
				</div>
			</div>
			</div>
		</div>
		
		
		<?php  }}  ?>

 </div>
		
		 
		
	