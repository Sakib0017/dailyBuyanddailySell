<?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>

<html>
    <head>
        <meta charset="utf.8">
        <meta name= "description" content= "welcome to my website">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	      <meta name=viewport content="width=device-width, initial-scale=1">
        <meta property="og:url" content="url to this page goes here">
    		<meta property="og:type" content="website">
    		<meta property="og:title" content="this website title">
    		<meta property="og:descrition" content="this website description">
    		<meta property="og:image" content="dist/Pic/logo-dark.png">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.css">
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
	    <link rel="stylesheet" href="css/normalize.css">
	    <link rel="stylesheet" href="css/main.css">
	    <link rel="stylesheet" href="css/core-style.css">
	    <link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/style3.css">
        <link rel="stylesheet" href="css/style.css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">  
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
	  <meta name="theme-color" content="#fafafa">
    </head>
    <body>
        <!--------------------------- Header ---------------------------------->
        <center>
          <div class="container">
            <div class="col-md-6" >
               
            <div class="containerimg">
			<div class="signin">
			<form method="post" action="">
			<h2 style="color:white">Log In</h2>
			<input type="text" name="a_email" placeholder="Username" required>
			<br><br>
			<input type="password" name="a_pass" placeholder="Password" required>
			<br><br>
			<button name="login" value="Login" class="btn btn-primary" style="background:#000;">
                <i class="fa fa-sign_in"></i> Login
            </button><br><br>
			
			<a href="index.php">&nbsp;Home</a>Don't have account?<a href="home.php">&nbsp;Sign Up</a>
			</form>
		    </div>
			</div>
              </div>
               <hr>
              <div class="col-md-6">
                 
            <div class="containerimg" >
			<div class="signup" style="width:350px">
			<form  method="post" enctype="multipart/form-data" >
			<h2 style="color:white">Register</h2>
			<input type="text" name="a_name" placeholder="Name" required>
			<br><br>
            
			<input type="text" name="a_email" placeholder="Email" required>
			<br><br>
			<input type="password" name="a_pass" placeholder="Password" required>
			<br><br>
            <input type="file" name="a_image" placeholder="Image" required>
			<br><br>
            <input type="text" name="a_country" placeholder="Country" required>
			<br><br>
            <input type="text" name="a_about" placeholder="about" required>
			<br><br>
            <input type="text" name="a_contact" placeholder="Contact" required>
			<br><br>
            <input type="text" name="a_job" placeholder="job" required>
			<br><br>
            
			<button type="submit" name="register" class="btn btn-primary" style="background:#000;">
                                <i class="fa fa-user-md"></i>Register</button><br><br>
			<a href="index.php">&nbsp;Home</a>Already have account?<a href="home.php">&nbsp;Log In</a>
			</form>
		    </div>
		    </div>
			</div>
                </div>
			</center>
			
        <!--------------------------- Section ---------------------------------->
  
			<script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/classy-nav.min.js"></script>
  <script src="js/active.js"></script>
  <script src="js/popper.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
        
    </body>
  </html>

<?php
    if(isset($_POST['login'])){
        $admin_email = mysqli_real_escape_string($con,$_POST['a_email']) ;
        $admin_pass = mysqli_real_escape_string($con,$_POST['a_pass']) ;
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        $run_admin = mysqli_query($con,$get_admin); 
        $count = mysqli_num_rows($run_admin);
        if($count==1){
            $_SESSION['admin_email']=$admin_email;
            echo "<script>alert('You are log in')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            
            echo "<script>alert('Your email or password is wrong')</script>";
            
        }
    }
?>

<?php
    if(isset($_POST['register'])){
        $a_name = $_POST['a_name'];
        $a_email = $_POST['a_email'];
        $a_pass = $_POST['a_pass'];
        $a_country = $_POST['a_country'];
        $a_about = $_POST['a_about'];
        $a_contact = $_POST['a_contact'];
        $a_job = $_POST['a_job'];
        $a_image = $_FILES['a_image']['name'];
        $a_image_tmp = $_FILES['a_image']['tmp_name'];
        move_uploaded_file($a_image_tmp,"user_panel/images/$c_image");
        $insert_admin = "insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_country,admin_about,admin_contact,admin_job) values ('$a_name','$a_email','$a_pass','$a_image','$a_country','$a_about','$a_contact','$a_job')";
        $run_admin = mysqli_query($con,$insert_admin);
        $check_admin = mysqli_num_rows($run_admin);
        if($check_admin>0){
            $_SESSION['admin_email']=$a_email;
            echo "<script>alert('You have been registered sucessfully')</script>";
            echo "<script>window.open('home.php','_self' )</script>";
        }
        else{
            $_SESSION['admin_email']=$a_email;
            echo "<script>alert('You have been registered sucessfully')</script>";
            echo "<script>window.open('home.php','_self' )</script>";
        }
    }
?>
