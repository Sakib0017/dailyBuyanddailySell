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

<body>
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
      <a class="nav-link active" href="shop.php">All ads</a>
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

   
    <section>
        
        <div class="container" style="color:#343a40;font-family:comic sans MS">
            <div class="row" >
                <div class="col-md-3 " >
				<div class="card" style="margin-top:30px;">
				<div class="card-body">
                  <ul class="navbar-nav">
					<?php getPCats(); ?>
				  </ul>
				  </div>
				</div>
				  
				<div class="card" style="color:#343a40;font-family:comic sans MS;margin-top:25px;">
				<div class="card-body">
                  <ul class="navbar-nav">
					<?php getCats();?>
				  </ul>
				  </div>
				</div>
                </div>
                      

				<div class="col-md-9">
					<div class="shop_grid_product_area" style="margin-top:30px;font-family:comic sans MS">         
						<div class="row">
						
						<?php
                                if(!isset($_GET['p_cat'])){
                                 if(!isset($_GET['cat'])){
                                     $per_page=15;
                                     if(isset($_GET['page'])){
                                         $page = $_GET['page'];
                                     }
                                     else{
                                             $page=1;
                                  
                              }
                                 $start_from = ($page-1) * $per_page;
                                 $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                                 $run_products = mysqli_query($con,$get_products);
                                 while($row_products = mysqli_fetch_array($run_products)){
                                    $pro_id = $row_products ['product_id'];
                                    
                                    $pro_title = $row_products ['product_title'];
                                    $pro_keywords = $row_products ['product_keywords'];
                                    $pro_desc = $row_products ['product_desc'];
                                    $pro_price = $row_products ['product_price'];
                                    $pro_img1 = $row_products ['product_img1'];
            
                                    echo "
									
									
									<div class='col-md-12'>
                                    
										<div class='card' style='height:250px;margin:10px;'>
                                        <div class='row'>
                                        <div class='col-md-5'>
										  <a href='viewproduct.php?pro_id=$pro_id'><img class='card-img-top' src='img/$pro_img1' style='height:250px;' alt='Card image'></a>
                                          </div>
                                          <div class='col-md-7'>
										  <div class='card-body'>
											<a href='viewproduct.php?pro_id=$pro_id' style='text-decoration:none;color:#343a40;align:left;'>
                                                <h6>$pro_title</h6>
                                            </a>
                                            <a href='viewproduct.php?pro_id=$pro_id' style='text-decoration:none;color:#343a40'>
                                                <h6>$pro_keywords</h6>
                                            </a>
                                            <a href='viewproduct.php?pro_id=$pro_id' style='text-decoration:none;color:#343a40'>
                                                <h6>$pro_desc</h6>
                                            </a>
                                            <a href='viewproduct.php?pro_id=$pro_id' style='text-decoration:none;color:#343a40'>
                                            <p class='product-price'>$pro_price</p>
											</a>
										  </div>
                                          </div>
										</div>
                                        </div>
									</div>
                                    ";
                                
                                 
                            }
                            
                             
                    ?>
							
						</div>
					</div>
					<nav aria-label="navigation ">
                        <ul class="pagination mt-50 mb-70 text-center"> 
						<?php 
                             $query = "select * from products";
                             $result = mysqli_query($con,$query);
                             $total_records= mysqli_num_rows($result);
                             $total_pages = ceil($total_records/ $per_page);
                                echo "
                                    <li class='page-item'>
                                        <a href='shop.php?page=1' class='page-link'>".'First'."</a>
                                    </li>
                                ";
                                for($i=1; $i<=$total_pages; $i++){
                                    echo "
                                    <li class='page-item'>
                                        <a href='shop.php?page=".$i."' class='page-link'>".$i."</a>
                                    </li>
                                ";
                                };
                                echo "
                                    <li class='page-item'>
                                        <a href='shop.php?page=$total_pages' class='page-link'>".'Last'."</a>
                                    </li>
                                ";
                             
                            }
                        }
                        ?>
                                    
                        </ul>
                    </nav>
					<?php
                        
                        getpcatpro();
                        getcatpro();
                        
                        
                    ?>
				</div>
				
			</div>
		</div>
    </section>
	
  
  
    
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
