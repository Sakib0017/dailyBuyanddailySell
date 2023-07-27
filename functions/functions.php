<?php
    $db = mysqli_connect("localhost","root","","project123");
    function getRealIpUser(){
        switch(true){
                case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
                case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
                case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
                
                default : return $_SERVER['REMOTE_ADDR'];
                
        }
    }

    
    function getPro(){
        global $db;
        $get_products = "select * from products order by 1 DESC LIMIT rand() 0,11";
        $run_products = mysqli_query($db,$get_products);
        while($row_products = mysqli_fetch_array($run_products)){
            $pro_id = $row_products ['product_id'];
			
            $pro_title = $row_products ['product_title'];
			
            $pro_price = $row_products ['product_price'];
            $pro_img1 = $row_products ['product_img1'];
            
            echo "
			
									<div class='col-md-4'>
										<div class='card text-center' style='height:400px;margin:10px;background:azure'>
										  <img class='card-img-top' src='img/$pro_img1' style='height:250px;' alt='Card image'>
										  <div class='card-body'>
											<a href='viewproduct.php?pro_id=$pro_id'>
                                                <h6>$pro_title</h6>
                                            </a>
                                            <p class='product-price'>$pro_price</p>
											<a href='viewproduct.php?pro_id=$pro_id' class='btn btn-secondary'>View Details</a>
										  </div>
										</div>
									</div>
            ";
        }
    }
    function getPCats(){
        global $db;
        $get_p_cats = "select * from city_categories";
                        $run_p_cats = mysqli_query($db,$get_p_cats);
                        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                            $p_cat_id = $row_p_cats ['p_cat_id'];
                            $p_cat_title = $row_p_cats ['p_cat_title'];
                            
                            echo"
								
                                <li >
                                    <a class='nav-link' href='shop.php?p_cat=$p_cat_id' style='color:#343a40'>$p_cat_title</a>
                                </li>
                            ";
                        }
    }
    function getCats(){
        global $db;
        $get_cats = "select * from categories";
                        $run_cats = mysqli_query($db,$get_cats);
                        while($row_cats = mysqli_fetch_array($run_cats)){
                            $cat_id = $row_cats ['cat_id'];
                            $cat_title = $row_cats ['cat_title'];
                            
                            echo"
								
                                <li >
                                    <a class='nav-link' href='shop.php?cat=$cat_id' style='color:#343a40'>$cat_title</a>
                                </li>
                            ";
                        }
    }

    

    

    function getpcatpro(){
        global $db;
        if(isset($_GET['p_cat'])){
            $p_cat_id =$_GET['p_cat'];
            $get_p_cat ="select * from city_categories where p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($db,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];
            $p_cat_desc =$row_p_cat['p_cat_desc'];
            $get_products ="select * from products  where p_cat_id='$p_cat_id' ";
            $run_products = mysqli_query($db,$get_products);
            $count = mysqli_num_rows($run_products);
            if($count==0){
                echo"
                
                            <div class='col-12'>
                                <div class='product-topbar d-flex align-items-center justify-content-between'>
                                    
                                    <div class='total-products'>
                                        <h5> No Product found in this product category</h5>
                                    </div>
                                </div>
                            </div>
                    
                ";
            }
            else{
                echo"
                
                
                            <div class='col-12'>
                                <div class='product-topbar d-flex align-items-center justify-content-between '>
                                    
                                    <div class='total-products ' >
                                        <h5> $p_cat_title</h5>
                                    </div>
                                </div>
                            </div>
                    
                ";
            }
            
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
											<a href='viewproduct.php?pro_id=$pro_id' style='text-decoration:none;color:#343a40'>
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
        }
    }
    function getcatpro(){
        global $db;
        if(isset($_GET['cat'])){
            $cat_id =$_GET['cat'];
            $get_cat ="select * from categories where cat_id='$cat_id'";
            $run_cat = mysqli_query($db,$get_cat);
            $row_cat = mysqli_fetch_array($run_cat);
            $cat_title = $row_cat['cat_title'];
            $cat_desc =$row_cat['cat_desc'];
            $get_products ="select * from products where cat_id='$cat_id'";
            $run_products = mysqli_query($db,$get_products);
            $count = mysqli_num_rows($run_products);
            if($count==0){
                echo"
                
                            <div class='col-12'>
                                <div class='product-topbar d-flex align-items-center justify-content-between'>
                                    
                                    <div class='total-products'>
                                        <h5> No Product found in this product category</h5>
                                    </div>
                                </div>
                            </div>
                    
                ";
            }
            else{
                echo"
                
                
                            <div class='col-12'>
                                <div class='product-topbar d-flex align-items-center justify-content-between'>
                                    
                                    <div class='total-products'>
                                        <h5> $cat_title</h5>
                                    </div>
                                </div>
                            </div>
                    
                ";
            }
            
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
											<a href='viewproduct.php?pro_id=$pro_id' style='text-decoration:none;color:#343a40'>
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
        }  
    }

    

    
?>

