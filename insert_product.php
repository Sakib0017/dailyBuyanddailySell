<!DOCTYPE html>
<?php
    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo"<script>window.open('login.php','_self')</script>";
    }else{$admin_session = $_SESSION['admin_email'];
        
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
      <a class="nav-link  active"  href="account.php"><img src="img/key%20(1).png"   style="height:17px;width:17px;">  Login</a>
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
                    <div class="card" style="padding:10px;margin-top:30px">
        <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Dashboard / Insert Product
                </li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" >
                <div class="panel-heading" style="background:#ffffff;text-align:center">
                    <h3 class="panel-title" style="text-align:center">
                        <i class="fa fa-money fa-fw"></i>Insert Product
                    </h3>
                </div>
                
                <div class="panel-body" >
                    
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" >
                        <center>
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3" >Product Title</label>
                            <div class="col-md-6" >
                                <input name="product_title" type="text" class="form-control" style="border:1px solid #000;" required>
                            </div>
                        </div>
						
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3" >City Category</label>
                            <div class="col-md-6" >
                                <select name="c_cat" class="form-control" style="border:1px solid #000;">
                                    <option>Select a category city</option>
                                    <?php
                                        $get_p_cats = "select * from city_categories";
                                        $run_p_cats = mysqli_query($con,$get_p_cats);
                                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                            $p_cat_id =$row_p_cats['p_cat_id'];
                                            $p_cat_title =$row_p_cats['p_cat_title'];
                                            echo"
                                                <option value='$p_cat_id'>$p_cat_title</option>
                                            ";     
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3" >Category</label>
                            <div class="col-md-6" >
                                <select name="cat" class="form-control" style="border:1px solid #000;">
                                    <option>Select a category</option>
                                    <?php
                                        $get_cat = "select * from categories";
                                        $run_cat = mysqli_query($con,$get_cat);
                                        while($row_cat=mysqli_fetch_array($run_cat)){
                                            $cat_id =$row_cat['cat_id'];
                                            $cat_title =$row_cat['cat_title'];
                                            echo"
                                                <option value='$cat_id'>$cat_title</option>
                                            ";     
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
						
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3">Admin Name</label>
                            <div class="col-md-6" >
                                <input name="admin_name" type="text" class="form-control" style="border:1px solid #000;" required>
                            </div>
                        </div>
                        
                        <div class="form-group" style="padding-top:10px;border:1px solid #0000;">
                            <label class="col-md-3">Product price</label>
                            <div class="col-md-6" >
                                <input name="product_price" type="text" class="form-control" style="border:1px solid #000;" required>
                            </div>
                        </div>
                        
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3">Product Desc</label>
                            <div class="col-md-6" >
                                <textarea name="product_desc" id="" cols="19" rows="6" class="form-control" style="border:1px solid #000;"></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3">Product keywords</label>
                            <div class="col-md-6" >
                                <input name="product_keywords" type="text" class="form-control" style="border:1px solid #000;" required>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3">Product image 1</label>
                            <div class="col-md-6" >
                                <input name="product_img1" type="file" class="form-control" style="border:1px solid #000;" required>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3">Product image 2</label>
                            <div class="col-md-6" >
                                <input name="product_img2" type="file" class="form-control" style="border:1px solid #000;" required>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-3">Product image 3</label>
                            <div class="col-md-6" >
                                <input name="product_img3" type="file" class="form-control" style="border:1px solid #000;" required>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:10px;">
                            
                            <div class="col-md-6" >
                                <input name="submit" type="submit"  value="Insert Product" class="btn btn-primary form-control" required>
                            </div>
                        </div>
                        </center>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
                        <!-- row no: 2 finish -->

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

    
<?php 

if(isset($_POST['submit'])){
    
    $product_title = $_POST['product_title'];
    $c_cat = $_POST['c_cat'];
    $cat = $_POST['cat'];
    
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $admin_name = $_POST['admin_name'];
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"img/$product_img1");
    move_uploaded_file($temp_name2,"img/$product_img2");
    move_uploaded_file($temp_name3,"img/$product_img3");
    
    $insert_product = "insert into products (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_keywords,product_desc,admin_name) values ('$c_cat','$cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_keywords','$product_desc','$admin_name')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('account.php?view_products','_self')</script>";
        
    }
    
}

?>

<?php } ?>