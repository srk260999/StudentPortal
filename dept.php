<?php
 
 
 

 session_start();
 $clg = $_SESSION['clg'];
 $dept = $_SESSION['dept'];
 $con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
 $query = "SELECT * FROM issues,users where  users.id = issues.userid  and users.clg = '$clg' and users.dept = '$dept' and issues.status = 'unresolved' order by datei desc ";
 $res = mysqli_query($con,$query)  or die("failed ".mysqli_error($con));
if(mysqli_num_rows($res) >= 0)
 
 {

?>


<head>
	<title>
		Home
	</title>
	<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/css/style.css" rel="stylesheet">
		<script src="assets/js/main.js"></script>
      <script>
      function openForm() {
      	var containerElement = document.getElementById("content");
        document.getElementById("popupForm").style.display="block";
         containerElement.setAttribute('class', 'blur');
      }
      
      function closeForm() {
      	var containerElement = document.getElementById("content");
        document.getElementById("popupForm").style.display="none";
        containerElement.setAttribute('class', null);
      }
    </script>
     <style>
       {
      box-sizing: border-box;
      }
      .blur   {
    filter: blur(5px);
    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
}
     
      /* Fix the button on the left side of the page */
     
      /* Style and fix the button on the page */
   
      /* Position the Popup form */
      .login-popup {
      position: relative;
      
      width : 500px;
       background-color: #fff;
      }
      /* Hide the Popup form */
      .form-popup {
      display: none;
      position: fixed;
      left: 45%;
      top:5%;
      transform: translate(-45%,5%);
      border: 2px solid #666;
      z-index: 9;
      width : 500px;
       background-color: #fff;
      }
      /* Styles for the form container */
      .form-container {
      max-width: 500px;
    
     
      }
      /* Full-width for input fields */
      
    </style>
</head>
<body style="font-family: 'Open Sans'">
<header id="header" class="fixed-top d-flex align-items-center">
	<div style= "background-color:  #5366f4">
    <div class="container" >

      
		<div style ="margin-top : 10px;">
		<nav class="nav-menu d-none d-lg-block" style = "float: left;">
		<a href = "index.html"> <h2 style ="color : white;">Student grevience Portal</h2> </a>
		</nav>
      <nav class="nav-menu d-none d-lg-block" style = "float: right;">
        <ul>
          
        
          <li><a href="profile.php">Profile</a></li>
        
          <li><a href="logout.php">logout</a></li>

        </ul>
      </nav><!-- .nav-menu -->
  </div>
    </div>
	</div>
  </header>


<br>
<br>
<br>
<center>
   <h2> Welcome <?php echo $_SESSION['name']; ?> </h2> </center>

<div class="row" id = "content">
	<div class = "col-lg-2">
	</div>
	<div class = "col-lg-10"	>
		<div class="card mb-3" >

<b style ="font-size : 25px;"> <?php echo $_SESSION['dept'] ;?> Department greviences </b>
		<?php
		if(mysqli_num_rows($res) == 0)
		{
			echo "<h2>No greviences Found </h2><br>";
		}
		else {
		  while($array = mysqli_fetch_array($res)) { ?>
		<div class="card mb-3" style="max-width: 1020px; background-color:  #f5f5f5; margin-top:20px; padding: 2%; border:  black 0.5px; border-radius: 15px">
  			<div class="row no-gutters">
    			<div class="col-md-2" style="padding-top: 40px; padding-left: 50px">
      				<img src="img/complaint.svg" class="card-img" alt="..." height="70px" width="70px">
			    </div>
			<div class="col-md-10">
				<div class="card-body">
					<h5 class="card-title" style="font-size: 25px; color: blue"><?php echo $array['title'] ?></h5>
					<p class="card-text"><small class="text-muted">Posted by: <?php echo $array['name']; ?><br> Date : <?php echo $array['datei']; ?><br>
					                       ISSUEID : <?php echo $array['gid'] ;?></small></p>

					    <p class="card-text" style="font-size: 20px"><?php echo $array['details'] ?></p>
					    <div class="row">
					    <div class="col-lg-2">
					    <a  class="btn " href="resolve.php?issueid=<?php echo $array['gid'] ;?>">
					    <img src="img/up-arrow.svg" class="card-img" alt="..." height="20px" width="20px">&nbsp;&nbsp;Mark as solved
						</a>

						</div>
						<div class="col-lg-2">
					    <button type="button" class="btn">
					    <img src="img/down-arrow.svg" class="card-img" alt="..." height="20px" width="20px">&nbsp;&nbsp;Report
						</button>
						</div>
						</div>
					    
				</div>
			</div>
			</div>
		</div>
 <?php } } }?>
		
