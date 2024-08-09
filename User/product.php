<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Craftsea - Products</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
              
        <!-- Nav Bar Start -->
      <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="product.php" class="nav-item nav-link">Products</a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="custom.php" class="nav-item nav-link">Custom</a>
                            <a href="my-account.php" class="nav-item nav-link">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More </a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.php" class="dropdown-item">Wishlist</a>
                                    <a href="login.php" class="dropdown-item">Login</a>
                                    <a href="registration.html" class="dropdown-item">Register</a>
                                    <a href="contact.php" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="login.php" class="dropdown-item">Login</a>
                                    <a href="registration.html" class="dropdown-item">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
      <div class="bottom-bar">
            <div class="container-fluid">
                  <div class="row align-items-center">
                        <div class="col-md-3">
                              <div class="logo">
                                    <a href="index.html">
                                          <h1>Craftsea</h1>
                                          <!-- <img src="img/Craftseadp.jpg" alt="Logo"> -->
                                    </a>
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="search">
                                    <input id="search" type="text" placeholder="Search">
                                    <button onclick="search()" id="search_btn"><i class="fa fa-search"></i></button>
                              </div>
                        </div>
                        <div class="col-md-3">
                              <div class="user">
                                    <a href="wishlist.php" class="btn wishlist">
                                          <i class="fa fa-heart"></i>
                                          <span>(<?php if(isset($_SESSION['wishlist'])){echo $_SESSION['wishlist'];}else{echo "0";}?>)</span>
                                    </a>
                                    <a href="cart.php" class="btn cart">
                                          <i class="fa fa-shopping-cart"></i>
                                          <span>(<?php if(isset($_SESSION['cart'])){echo $_SESSION['cart'];}else{echo "0";}?>)</span>
                                    </a>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
        <!-- Bottom Bar End -->  
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
<div class="product-view">
<div class="container-fluid">
      <div class="row">
            <div class="col-lg-8">
            <div class="row">
                  <div class="col-md-12">
                        <div class="product-view-top">
                        <div class="row">
                              <div class="col-md-4">
                                    <div class="product-search">
                                    <input id="ssearch" type="text" placeholder="Search">
                                    <button onclick="ssearch()"><i class="fa fa-search"></i></button>
                                    </div>
                              </div>
                              <div class="col-md-4">
                                    <div class="product-short">
                                    <div class="dropdown">
                                          <div class="dropdown-toggle" id="sort" data-toggle="dropdown">Product sort by</div>
                                          <div class="dropdown-menu dropdown-menu-right">
                                                <a href="product.php?sort=Newest" class="dropdown-item">Newest</a>
                                                <a href="product.php?sort=lowest to highest" class="dropdown-item">price: lowest to highest</a>
                                                <a href="product.php?sort=highest to lowest" class="dropdown-item">price: highest to lowest</a>
                                          </div>
                                    </div>
                                    </div>
                              </div>
                              <div class="col-md-4">
                                    <div class="product-price-range">
                                    <div class="dropdown">
                                          <div id="range" class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                          <a href="product.php?low=0&high=300" class="dropdown-item">₹0 to ₹300</a>
                                          <a href="product.php?low=301&high=600" class="dropdown-item">₹301 to ₹600</a>
                                          <a href="product.php?low=601&high=1000" class="dropdown-item">₹601 to ₹1000</a>
                                          <a href="product.php?low=1001&high=9999999" class="dropdown-item">₹1001 <<a>
                                    </div>
                                    </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  </div>
                        <?php

                        //connect to database
                        $con=mysqli_connect("localhost","root","","Craftsea");

                        //Query
                        if(isset($_GET['category']))
                        {
                              $category=$_GET['category'];
                              $result=mysqli_query($con,"select * from product where category='$category'")
                              or die("Failed to login".mysql_error());
                        }
                        else if(isset($_GET['brand']))
                        {
                              $brand=$_GET['brand'];
                              $result=mysqli_query($con,"select * from product where brand='$brand'")
                              or die("Failed to login".mysql_error());
                        }
                        else if(isset($_GET['build_type']))
                        {
                              $build_type=$_GET['build_type'];
                              $result=mysqli_query($con,"select * from product where build_type='$build_type'")
                              or die("Failed to login".mysql_error());
                        }
                        else if(isset($_GET['search']))
                        {
                              $search=$_GET['search'];
                              $low=10;
                              $high=20;
                              ?>
                                    <script>document.getElementById("search").value="<?php echo $search;?>";</script>
                              <?php
                              $result=mysqli_query($con,"select * from product where name like '%$search%' or description like '%$search%' or brand like '%$search%' or category like '%$search%' or build_type like '%$search%'")
                              or die("Failed to login".mysql_error());
                        }
                        else if(isset($_GET['sort']))
                        {
                              $sort=$_GET['sort'];
                              ?>
                                    <script>document.getElementById("sort").innerHTML="<?php echo $sort;?>";</script>
                              <?php
                              if($_GET['sort']=="Newest")
                              {
                                    $result=mysqli_query($con,"select * from product order by product_id desc")
                                    or die("Failed to login".mysql_error());
                              }
                              else if($_GET['sort']=="lowest to highest")
                              {
                                    $result=mysqli_query($con,"select * from product order by price")
                                    or die("Failed to login".mysql_error());
                              }
                              else
                              {
                                    $result=mysqli_query($con,"select * from product order by price desc")
                                    or die("Failed to login".mysql_error());
                              }
                        }
                        else if(isset($_GET['low']))
                        {
                              $low=$_GET['low'];
                              $high=$_GET['high'];
                              $result=mysqli_query($con,"select * from product where price between '$low' and '$high'")
                              or die("Failed to login".mysql_error());
                              if($high==9999999)
                              {
                                    ?>
                                          <script>document.getElementById("range").innerHTML=" ₹"+<?php echo $low;?>+" <";</script>
                                    <?php
                              }
                              else
                              {
                              ?>
                                    <script>document.getElementById("range").innerHTML=" ₹"+<?php echo $low;?>+" to  ₹"+<?php echo $high;?>;</script>
                              <?php
                              }
                        }
                        else
                        {
                              $result=mysqli_query($con,"select * from product")
                              or die("Failed to login".mysql_error());
                        }
                        
                        // $num_rows=mysqli_num_rows($result);
                        // for($i=0;$i<2;$i++)
                        $j=0;
                              while($row = mysqli_fetch_assoc($result))
                              {
                        ?>    
                              <a href="product-detail.php?">
                                    <div class="col-md-4">
                                          <div class="product-item">
                                                <div class="product-title">
                                                      <a href="product-detail.php?product_id=<?php echo $row['product_id']; ?>"><?php echo $row['name']; ?></a>
                                                      <div class="ratting">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                      </div>
                                                </div>
                                                <div class="product-image">
                                                      <a href="product-detail.html">
                                                            <img src="<?php echo $row['image1']; ?>" alt="Product Image" width="100%" height="325px">
                                                      </a>
                                                      <div class="product-action">
                                                            <a href="addcart.php?product_id=<?php echo $row['product_id'];?>&location=1"><i class="fa fa-cart-plus"></i></a>
                                                            <a href="add-wishlist.php?product_id=<?php echo $row['product_id'];?>"><i class="fa fa-heart"></i></a>
                                                            <!-- <a href="#"><i class="fa fa-search"></i></a> -->
                                                      </div>
                                                </div>
                                                <div class="product-price">
                                                      <h3><span>₹</span> <?php echo $row['price']; ?></h3>
                                                      <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                                </div>
                                          </div>
                                    </div>
                              </a>
                        <?php
                        
                        // if($j==2)
                        // break;
                        // $j++;
                        }
                        ?>
                            
                        </div>
                        
                        <!-- Pagination Start -->
                        <!-- <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                        <!-- Pagination Start -->
                    </div>           

                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="product.php?category=Top_Rated_Crafts"><i class="fa fa-female"></i>Top Rated Crafts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="product.php?category=Kiddo_Crafty"><i class="fa fa-child"></i>Kiddo Crafty</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="product.php?category=Woolen_Wonders"><i class="fa fa-tshirt"></i>Woolen Wonders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="product.php?category=Marcrame_Madness"><i class="fa fa-mobile-alt"></i>Marcrame Madness</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="product.php?category=Handmade_Hifi"><i class="fa fa-microchip"></i>Handmade Hifi</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?product_id=24">Boho Escapes - Colourful Ring</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/prod3.jpg" alt="Product Image" width="100%" height="415px">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>₹</span> 599</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?product_id=8">Hand Painted Necklace Set</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/prod4.jpg" alt="Product Image" width="100%" height="415px">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>₹</span> 1299</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?product_id=4">Black Buddha - Wall Mask</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/prod1.jpg" alt="Product Image" width="100%" height="415px">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>₹</span> 899</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                              <div class="product-item">
                                    <div class="product-title">
                                          <a href="product-detail.php?product_id=20">Tassel Hanging (6" Inches)</a>
                                          <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                          </div>
                                    </div>
                                    <div class="product-image">
                                          <a href="product-detail.html">
                                                <img src="img/prod6.jpg" alt="Product Image" width="100%" height="415px">
                                          </a>
                                          <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                          </div>
                                    </div>
                                    <div class="product-price">
                                          <h3><span>₹</span> 399</h3>
                                          <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                              </div>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="product.php?brand=Oxidised_Rings">Oxidised Rings</a><span>(4)</span></li>
                                <li><a href="product.php?brand=Necklaces">Necklaces</a><span>(3)</span></li>
                                <li><a href="product.php?brand=Earrings">Earrings</a><span>(6)</span></li>
                                <li><a href="product.php?brand=Bangles">Bangles</a><span>(2)</span></li>
                                <li><a href="product.php?brand=Wall_Hangings">Wall Hangings</a><span>(3)</span></li>
                                <li><a href="product.php?brand=Bell_Hangings">Bell Hangings</a><span>(1)</span></li>
                                <li><a href="product.php?brand=Wall_Hooks">Wall Hooks</a><span>(1)</span></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Craftsea</h2>
                            <a href="product.php?build_type=Handmade">Handmade</a>
                            <a href="product.php?build_type=Bangles">Bangles</a>
                            <a href="product.php?build_type=Necklaces">Necklaces</a>
                            <a href="product.php?build_type=Earrings">Earrings</a>
                            <a href="product.php?build_type=Wall_Hangings">Wall Hangings</a>
                            <a href="product.php?build_type=Bell_Hangings">Bell Hangings</a>
                            <a href="product.php?build_type=Wall_Hooks">Wall Hooks</a>
                            <a href="product.php?build_type=Oxidised_Rings">Oxidised Rings</a>
                            <a href="product.php?build_type=Craft_Daily">Craft Daily</a>
                            <a href="product.php?build_type=DIY">DIY</a>
                            <a href="product.php?build_type=Craftography">Craftography</a>
                            <a href="product.php?build_type=Creative_Ideas">Creative Ideas</a>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->          
        <!-- Footer Start -->
      <div class="footer">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-lg-3 col-md-6">
                              <div class="footer-widget">
                                    <h2>Get in Touch</h2>
                                    <div class="contact-info">
                                          <p><i class="fa fa-map-marker"></i>412 D Store, Jayanagar, Bangalore</p>
                                          <p><i class="fa fa-envelope"></i>Craftsea1981@gmail.com</p>
                                          <p><i class="fa fa-phone"></i>+91 123-456-7890</p>
                                    </div>
                              </div>
                        </div>
      
                        <div class="col-lg-3 col-md-6">
                              <div class="footer-widget">
                                    <h2>Follow Us</h2>
                                    <div class="contact-info">
                                          <div class="social">
                                                <a href="https://www.facebook.com/CraftseaUK/"><i class="fab fa-facebook-f"></i></a>
                                                <a href="https://www.instagram.com/_Craftsea_/"><i class="fab fa-instagram"></i></a>
                                                <a href="https://www.youtube.com/@Craftsea"><i class="fab fa-youtube"></i></a>
                                          </div>
                                    </div>
                              </div>
                        </div>
      
                        <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="terms.html">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="paymentpol.html">Payment Policy</a></li>
                                <li><a href="shippingpol.html">Shipping Policy</a></li>
                                <li><a href="returnpol.html">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                  </div>
      
                  <div class="row payment align-items-center">
                        <div class="col-md-6">
                              <div class="payment-method">
                                    <h2>We Accept:</h2>
                                    <img src="img/payment-method.png" alt="Payment Method" />
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="payment-security">
                                    <h2>Secured By:</h2>
                                    <img src="img/godaddy.svg" alt="Payment Security" />
                                    <img src="img/norton.svg" alt="Payment Security" />
                                    <img src="img/ssl.svg" alt="Payment Security" />
                              </div>
                        </div>
                  </div>
            </div>
      </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>
            function search()
            {
                window.location="product.php?search="+document.getElementById("search").value;
            }
            function ssearch()
            {
                  window.location="product.php?search="+document.getElementById("ssearch").value;
            }
        </script>
    </body>
</html>
