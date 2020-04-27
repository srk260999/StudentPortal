<!DOCTYPE html>
<html>

<?php
 session_start();
 $con = mysqli_connect("localhost","root","","student")or die(mysqli_error($con));
 $query = "SELECT * FROM issues,users where  users.id = issues.userid order by datei desc ";
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
        
          <li><a href="logout.php">Logout</a></li>

        </ul>
      </nav><!-- .nav-menu -->
  </div>
    </div>
	</div>
  </header>
<br>
<br>
<br>

    <div class="login-popup" >
      <div class="form-popup" id="popupForm" style = "margin-top: 100px; ">
		<div style ="float : right">
		<a class="btn cancel" onclick="closeForm()">
		<img src = "img/close.png" height = 20px; width = 20px>
		
  		</a>
		</div>
      	<div style = "padding-left: 10%; padding-right : 10%; padding-top : 50px;padding-bottom: 10%;">
        <form action="grevience_submit.php" class="form-container" method = "POST">
        	<center><h2>Add new Grivience</h2></center>
          				<div class="form-group">
                           <label for="title">&nbsp;Title</label>
                           <input type="text" class="form-control" name="title" required style="border-radius: 10px;">
                         </div>
						 <div class ="form-group">
						 <label> Choose category</label>
						 <br>
						 <select name ="category">
						 <option value = "Educational">Educational</option>
						 <option value = "Food Related">Food Related</option>
						 <option value = "Accomdation">Accomdation</option>
						 <option value = "fees">fees</option>
						 
						 
						 
						 </select>
						 </div>
						 
						 <div class = "form-group">
						 <textarea rows = "5" cols = "40" placeholder="Details about the issue" name = "details" required style="border-radius : 10px;" ></textarea>
						 </div>
                      
                     
          
          <button type="submit" class="btn">Log in</button>
          
        </form>
    </div>
      </div>
    </div>

<div class="row" id = "content">
	<div class = "col-lg-2">
	</div>
	<div class = "col-lg-10"	>
		<div class="card mb-3" style="max-width: 1020px; background-color:  #f5f5f5; margin-top:20px; padding: 2%; border:  black 0.5px; border-radius: 15px">
  			<div class="row no-gutters">
    			<div class="col-md-2" style="padding-top: 40px; padding-bottom:40px;padding-left: 50px">
      				<button onclick = "openForm()" ><img src="img/plus.svg" id= "ss" class="card-img" alt="..." height="70px" width="70px"> </button>
			    </div>
			<div class="col-md-10" style = "margin-top : 30px; ">
			
				<div class="card-body">
					<h1> Add New Grivience</h1>
				</div>
			
			</div>
			</div>
		</div>
		<br>
		
		<b style ="font-size : 25px;"> Recent Griviences </b>
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
 <?php } } ?>
		
	
	<div>
	  <br>
	  <br>
	 <?php
	   if (isset($_SESSION))
	   {
	     echo $_SESSION['email'];
	   }
	   if (!isset($_SESSION))
	   {
		  echo "not logged in";	   }
	 
	 ?>
	</div>

</body>
</html>