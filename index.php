<?php
  
    include("includes/db.php");
    include("functions/functions.php");
?>

<?php
    if(isset($_GET['pro_id'])){
            $product_id =$_GET['pro_id'];
            $get_product ="select * from products where product_id='$product_id'";
            $run_product = mysqli_query($con,$get_product);
            $row_product = mysqli_fetch_array($run_product);
            $p_cat_id = $row_product['p_cat_id'];
            $pro_title = $row_product['product_title'];
            $pro_price = $row_product['product_price'];
            $pro_desc =$row_product['product_desc'];
            $pro_img1 = $row_product['product_img1'];
            $pro_img2 = $row_product['product_img2'];
            $pro_img3 = $row_product['product_img3'];
            $admin_name= $row_product['admin_name'];
            
            $get_p_cat ="select * from city_categories where p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($con,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title']; 
        
            $get_p_cat ="select * from admins where admin_name='$admin_name'";
            $run_p_cat = mysqli_query($con,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $admin_email = $row_p_cat['admin_email']; 
            $admin_contact = $row_p_cat['admin_contact']; 
        
        
            
        }
?>

<!doctype html>
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
  <link rel="stylesheet" href="css/style.css">
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
      <a class="nav-link active" href="index.php">Home</a>
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
      <a class="nav-link"  href="account.php"><img src="img/key%20(1).png"   style="height:17px;width:17px;">  Login</a>
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
    
    
    <div class="container-fluid" style="color:#292321;padding-top:50px;">
        
        <h5>Browse items by category</h5>
        <div class="row" >
			
			<?php
                        $get_products = "select * from categories LIMIT 0,12";
                        $run_products = mysqli_query($db,$get_products);
                        while($row_products = mysqli_fetch_array($run_products)){
                            $cat_id = $row_products ['cat_id'];
                            $cat_title = $row_products ['cat_title'];
							$cat_desc = $row_products ['cat_desc'];
							$cat_img = $row_products ['cat_img'];
                            echo "
								<div class='col-md-3' >
				
								<div class='card' style='border:none;margin-bottom:30px;text-style:none;background:#f0f0f0;'>
									  <div class='card-body'>
										  <ul class='navbar-nav'>
											<li class='nav-item active'>
											<div class='col-md-12'>
											<div class='row'>
                                            
                                            <div class='col-md-3'>
											<a href='shop.php?cat=$cat_id'><img src='img/$cat_img'  alt='' style='height:50px;width:50px;'></a>
                                            </div>
                                            <div class='col-md-9'>
                                            <h6><a href='shop.php?cat=$cat_id' style='color:#292321;text-decoration:none;font-weight:bold'>$cat_title</a></h6>
											<p><a href='shop.php?cat=$cat_id' style='color:#292321;text-decoration:none;'>$cat_desc</a></p>
											 </div>
                                             
                                             </div>
                                             </div>
											</li>
										  </ul>
									  </div>
									</div>
								</div>
                               
                                ";
                        }
                        ?>
        </div>	
  </div>
    <div class="container-fluid" style="color:#292321;padding-top:50px;">
        
        <h5>Browse items by City Category</h5>
        <div class="row" >
			
			<?php
                        $get_products = "select * from city_categories LIMIT 0,12";
                        $run_products = mysqli_query($db,$get_products);
                        while($row_products = mysqli_fetch_array($run_products)){
                            $p_cat_id = $row_products ['p_cat_id'];
                            $p_cat_title = $row_products ['p_cat_title'];
							$p_cat_desc = $row_products ['p_cat_desc'];
							$p_cat_img = $row_products ['p_cat_img'];
                            echo "
								<div class='col-md-3' >
				
								<div class='card' style='border:none;margin-bottom:30px;text-style:none;background:#f0f0f0;'>
									  <div class='card-body'>
										  <ul class='navbar-nav'>
											<li class='nav-item active'>
											<div class='col-md-12'>
											<div class='row'>
                                            
                                            <div class='col-md-3'>
											<a href='shop.php?p_cat=$p_cat_id'><img src='img/$p_cat_img'  alt='' style='height:50px;width:50px;'></a>
                                            </div>
                                            <div class='col-md-9'>
                                            <h6><a href='shop.php?p_cat=$p_cat_id' style='color:#292321;text-decoration:none;font-weight:bold'>$p_cat_title</a></h6>
											<p><a href='shop.php?p_cat=$p_cat_id' style='color:#292321;text-decoration:none;'>$p_cat_desc</a></p>
											 </div>
                                             
                                             </div>
                                             </div>
											</li>
										  </ul>
									  </div>
									</div>
								</div>
                               
                                ";
                        }
                        ?>
        </div>	
  </div>
    
    
    
 <div class="container-fluid bg-white border rounded p-4 shadow-sm" style="
    min-height:250px;
    background-size:cover;">
     <div class="col-md-12">
        <div class="row">
            <div  class="col-md-6" style="padding:100px;">
                
                    <div class="row">
                <div class="col-md-4 text-center">
                        <img src="img/salary.png"   style="height:125px;width:125px;">
                    </div>
                    <div class="col-md-8" style="align:left;">
                        <h3 style="font-weight:bold;">Start making money!</h3>
                        <p>Do you have something to sell? Post your ads & earn money!</p>
                        <button class="btn" name="submit" type="submit" style="border-radius:50px;background:yellow;padding-left:50px;padding-right:50px;"><p style="font-weight:bold;align:center">Post your ad for free >></p></button>
                    </div>
                        </div>
                    
            </div>
            <div  class="col-md-6" style="padding:100px;">
                
                    <div class="row">
                <div class="col-md-4 text-center">
                        <img src="img/businessman.png"   style="height:125px;width:125px;">
                    </div>
                    <div class="col-md-8" style="align:left;">
                        <h3 style="color:blue;font-family:comic sans MS">Yourjobs</h3>
                        <p>Looking to hire or get hired in Bangladesh!</p>
                        <button class="btn" name="submit" type="submit" style="border-radius:50px;background:blue;padding-left:50px;padding-right:50px;"><p style="font-weight:bold;color:white;align:center;">Explore more >></p></button>
                    </div>
                        </div>
                    
            </div>
         </div>
     </div>
</div>
    <p style="padding-top:25px;font-weight:bold;font-family:comic sans MS">Quick links</p>
<div class="container-fluid" style="">
     <div class="col-md-12">
         
        <div class="row">
            
            <div class="col-md-3" style="">
                <div class='card' style='border:none;text-style:none;background:#f0f0f0'>
			<div class='card-body'>
                <p style="font-weight:bold;">71,082 ads in Electronics</p>
                    <p>Desktop Computer | Laptops | TVs | Cameras, Camcorders & Accessories | Audio & Sound Systems</p>
                    
            </div>
                </div>
                </div>
            <div  class="col-md-3" style="">
                <div class='card' style='border:none;text-style:none;background:#f0f0f0'>
			<div class='card-body'>
                <p style="font-weight:bold;">15,839 ads in Properties</p>
                    <p>Apartments for sale | Land | Apartment Rentals | Comercial Property Rentals | Room Rentals</p>
                    
               </div>     
            </div>        
            </div>
            <div  class="col-md-3" style="">
                <div class='card' style='border:none;text-style:none;background:#f0f0f0'>
			<div class='card-body'>
                <p style="font-weight:bold;">1,834 ads in Jobs</p>
                    <p>Sales Executive | Marketing Executive | Delivery Rider | Customer Services Jobs | Supervicers</p>
              </div>      
            </div>        
            </div>
            <div  class="col-md-3" style="">
                <div class='card' style='border:none;text-style:none;background:#f0f0f0'>
			<div class='card-body'>
                <p style="font-weight:bold;">31,126 ads in Vehicles</p>
                    <p>Cars | Motorbikes | Bycicles | Trucks | Auto Parts & Accessories | Cars | Motorbikes | Bycicles | Trucks </p>
                    </div>
                  </div>  
            </div>
         </div>
     </div>
</div>
<div class="container-fluid" style="border-top:3px solid #343a40;margin-top:25px;">
     <div class="col-md-12">
         
        <div class="row">
            
            <div class="col-md-3" style="padding-top:5px">
                <p style="font-weight:bold">More from dailySell</p>
                
                <p >
      <a href="#" style="text-decoration:none">Sell Fast</a>
    </p>
                <p style="text-decoration:none">
      <a href="#" style="text-decoration:none">Membership</a>
    </p>
                <p style="text-decoration:none">
      <a href="#" style="text-decoration:none">Banner Ads</a>
                    </p>
            </div>
            
            <div  class="col-md-3" style="padding-top:5px">
                      <p style="font-weight:bold">Help & Support</p>
                
                <p >
      <a href="#" style="text-decoration:none">FAQ</a>
    </p>
                <p >
      <a href="#" style="text-decoration:none">Stay Safe</a>
    </p>
                <p >
      <a href="#" style="text-decoration:none">Contact Us</a>
                    </p>
            </div>
            <div  class="col-md-3" style="padding-top:5px">
                 <p style="font-weight:bold">Follow dailySell</p>
                
                <p >
      <a href="#" style="text-decoration:none">Blog</a>
    </p>
                <p >
      <a href="#" style="text-decoration:none">Facebook</a>
    </p>
                <p >
      <a href="#" style="text-decoration:none">Twitter</a>
                    </p>
            </div>
            
            <div  class="col-md-3" style="padding-top:5px">
                 <p style="font-weight:bold">About dailySell</p>
                
                <p >
      <a href="#" style="text-decoration:none">About Us</a>
    </p>
                <p >
      <a href="#" style="text-decoration:none">Careers</a>
    </p>
                <p >
      <a href="#" style="text-decoration:none">Terms and Conditions</a>
                    </p>
            </div>
         </div>
     </div>
</div>
 <footer>
            <div class="last-footer text-center" style="height:40px;padding-top:5px;font-family:comic sans MS">
                <span style="color:#343a40">
                    
                    <h6 style="font-size:15px">2023 SKB || All Rights Reserved.</h6>
                </span>
            </div>
        </footer>
    
  
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
