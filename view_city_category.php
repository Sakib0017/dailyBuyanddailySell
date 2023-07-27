<!DOCTYPE html>
<?php 
    
    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo"<script>window.open('login.php','_self')</script>";
    }else{
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        
        
        $get_p_categories = "select * from city_categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        

?>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
  <meta name="theme-color" content="#fafafa">
</head>

<body >
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
   
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="shop.php">All ads</a>
    </li>
	
  </ul>
    </div>
    
    <ul class="navbar-nav">
    <li class="nav-item" style="text-decoration:none">
      <a class="nav-link"  href="#"><img src="img/chat%20(1).png"   style="height:17px;width:17px;">  Chat</a>
    </li>
    </ul>
    <ul class="navbar-nav">
	<li class="nav-item" style="text-decoration:none">
      <a class="nav-link active"  href="account.php"><img src="img/key%20(1).png"   style="height:17px;width:17px;">  Login</a>
    </li>
  </ul>
    
</nav>
    <div class="container-fluid" style="background:#343a40;height:120px;">
    <center>
        <h6 style="padding-top:25px;"><a style="background:#ffffff;padding:5px;text-decoration:none;border-radius:50px;border:1px solid #ffffff;"><img src="img/location.png"   style="height:15px;width:15px;"> All of Bangladesh</a></h6>
        </center>
    
    <form class="form text-center" style="align-items:center;justify-content:center;display:flex;padding-top:10px;padding-bottom:20px;"  action="search.php" >
                      <input class="form-control mr-sm-2" style="border-radius:50px;width:750px" type="search" name="search" placeholder="What are you looking for?" aria-label="Search">
                      <button class="btn btn-secondary" name="submit" type="submit" style="height:40px;width:80px;">Search</button>
                    </form>
</div>

   
    <section>
        <div class="container text-center" style="font-color:#292321">
            <div class="row" >
                <div class="col-md-3 " >
				<div class="card text-center" style="margin-top:30px;">
				<div class="card-body">
                  <ul class="navbar-nav">
					<img src="img/<?php echo $admin_image;  ?>" alt="" style="border-radius:50px" height="50" width="50">
                      <p><?php echo $admin_name;  ?></p>
                      <p><?php echo $admin_email;  ?></p>
				  </ul>
				  </div>
				</div>
				  
				<div class="card text-center" style="margin-top:30px;">
				<div class="card-body">
                  <ul class="navbar-nav">
					<li >
                      <a class="nav-link" href="account.php" >Dashboard</a>
                    </li>
                      
                      <li >
                      <a class="nav-link" href="insert_product.php" >Insert Product</a>
                    </li>
                      
                      <li >
                      <a class="nav-link" href="view_product.php" >View Product</a>
                    </li>
                      
                      <li >
                      <a class="nav-link" href="insert_city_category.php" >Insert City</a>
                    </li>
                      
                      <li >
                      <a class="nav-link" href="view_city_category.php" >View City</a>
                    </li>
                      
                      <li >
                      <a class="nav-link" href="logout.php" >logout</a>
                    </li>
				  </ul>
				  </div>
				</div>
                </div>	
                
                <div class="col-md-9">
                    <div class="card" style="padding:10px;margin-top:30px;">
                        <!--  table-responsive Finish  -->
                        
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View City Categories
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> City Category ID </th>
                                <th> City Category Title </th>
                                <th> City Category Desc </th>
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
                            
                                $i=0;
          
                                $get_p_cats = "select * from city_categories";
          
                                $run_p_cats = mysqli_query($con,$get_p_cats);
          
                                while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                    
                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    
                                    $p_cat_title = $row_p_cats['p_cat_title'];
                                    
                                    $p_cat_desc = $row_p_cats['p_cat_desc'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $p_cat_title; ?> </td>
                                <td width="300"> <?php echo $p_cat_desc; ?> </td>
                                
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                        
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 2 finish -->

<!-- row no: 3 finish -->
                    </div>
                </div>
                
                
                
			</div>
		</div>
    </section>
	
  
  
    
	
  
  
    
  
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>

    
<?php } ?>