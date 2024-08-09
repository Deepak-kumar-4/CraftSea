<?php
    session_start();

    //connect to database
    $con=mysqli_connect("localhost","root","","Craftsea");

    //Query
    $id=$_GET['product_id'];
    $result=mysqli_query($con,"select * from product where product_id='$id'")
    or die("Failed to login".mysql_error());
    // $rows = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Craftsea - Product Detail</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="eCommerce HTML Template Free Download" name="keywords">
      <meta content="eCommerce HTML Template Free Download" name="description">

      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
            rel="stylesheet">

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
                                    <button onclick="search()"><i class="fa fa-search"></i></button>
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
                        <li class="breadcrumb-item"><a href="product.php">Products</a></li>
                        <li class="breadcrumb-item active">Product Detail</li>
                  </ul>
            </div>
      </div>
      <!-- Breadcrumb End -->

      <!-- Product Detail Start -->
      <div class="product-detail">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-lg-8">
                            <?php
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                    // echo "<script>alert('hellows');</script>";
                                  
                            ?>
                              <div class="product-detail-top">
                                    <div class="row align-items-center">
                                          <div class="col-md-5">
                                                <div class="product-slider-single normal-slider">
                                                      <img src="<?php echo $row['image1']; ?>" alt="Product Image">
                                                      <?php
                                                            if($row['image2']!="img/"){
                                                      ?>
                                                      <img src="<?php echo $row['image2']; ?>" alt="Product Image">
                                                      <?php
                                                            }
                                                            if($row['image3']!="img/"){
                                                      ?>
                                                      <img src="<?php echo $row['image3']; ?>" alt="Product Image">
                                                      <?php
                                                            }
                                                      ?>
                                                      <!-- <img src="img/recent4.jpg" alt="Product Image">
                                                      <img src="img/recent5.jpg" alt="Product Image">
                                                      <img src="img/Featured1.jpg" alt="Product Image"> -->
                                                </div>
                                                <div class="product-slider-single-nav normal-slider">
                                                      <div class="slider-nav-img"><img src="<?php echo $row['image1']; ?>"
                                                                  alt="Product Image"></div>
                                                      <?php
                                                            if($row['image2']!="img/"){
                                                      ?>
                                                      <div class="slider-nav-img"><img src="<?php echo $row['image2']; ?>"
                                                                  alt="Product Image"></div>
                                                      <?php
                                                            }
                                                            if($row['image3']!="img/"){
                                                      ?>
                                                      <div class="slider-nav-img"><img src="<?php echo $row['image3']; ?>"
                                                                  alt="Product Image"></div>
                                                      <?php
                                                            }
                                                      ?>
                                                      <!-- <div class="slider-nav-img"><img src="img/recent4.jpg"
                                                                  alt="Product Image"></div>
                                                      <div class="slider-nav-img"><img src="img/recent5.jpg"
                                                                  alt="Product Image"></div>
                                                      <div class="slider-nav-img"><img src="img/Featured1.jpg"
                                                                  alt="Product Image"></div> -->
                                                </div>
                                          </div>
                                          <div class="col-md-7">
                                                <div class="product-content">
                                                      <div class="title">
                                                            <h2> <?php echo $row['name']; ?></h2>
                                                      </div>
                                                      <div class="ratting">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                      </div>
                                                      <div class="price">
                                                            <h4>Price:</h4>
                                                            <p>₹<?php echo $row['price']; ?><span>₹<?php echo ((int)$row['price']+300); ?></span></p>
                                                      </div>
                                                      <div class="quantity">
                                                            <h4>Quantity:</h4>
                                                            <div class="qty">
                                                                  <button class="btn-minus"><i
                                                                              class="fa fa-minus"></i></button>
                                                                  <input type="text" id="Quantity" value="1">
                                                                  <button class="btn-plus"><i
                                                                              class="fa fa-plus"></i></button>
                                                            </div>
                                                      </div>
                                                      <div class="p-color">
                                                            <h4>Color:</h4>
                                                            <div class="btn-group btn-group-sm">
                                                                  <button type="button" class="btn">Purple</button>
                                                                  <button type="button" class="btn">Red</button>
                                                                  <button type="button" class="btn">Blue</button>
                                                            </div>
                                                      </div>
                                                      <div class="action">
                                                            <!-- <a class="btn" href="addcart.php?product_id=<//?php echo $row['product_id']; ?>"><i
                                                                        class="fa fa-shopping-cart"></i>Add to Cart</a> -->
                                                            <button class="btn" onclick="addcart(<?php echo $row['product_id']; ?>)"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                                            <button class="btn"><i class="fa fa-shopping-bag"></i> Buy Now</button>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="row product-detail-bottom">
                                    <div class="col-lg-12">
                                          <ul class="nav nav-pills nav-justified">
                                                <li class="nav-item">
                                                      <a class="nav-link active" data-toggle="pill"
                                                            href="#description">Description</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link" data-toggle="pill"
                                                            href="#specification">Specification</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link" data-toggle="pill" href="#reviews">Reviews
                                                            (1)</a>
                                                </li>
                                          </ul>

                                          <div class="tab-content">
                                                <div id="description" class="container tab-pane active">
                                                      <h4>Product Description</h4>
                                                      <br>
                                                      <ul>
                                                        <li><?php echo str_replace("\n","</li><li>",$row['description']); ?></li>
                                                      <!-- <li>The oxidisation process creates a light and shadow effect in this jewellery.</li> -->
                                                      <!-- <li>The unique and antique look gives it an old charm and traditional appeal.</li>
                                                      <li>Complements both Indian and Western outfits.</li> -->
                                                      </ul>
                                                </div>
                                                <div id="specification" class="container tab-pane fade">
                                                      <h4>Pack Content & Dimensions</h4>
                                                      <br>
                                                      <ul>
                                                            <li><?php echo str_replace("\n","</li><li>",$row['specification']); ?></li>
                                                            <!-- <li>Material: Oxidised Silver</li>
                                                            <li>Finish: Antique</li>
                                                            <li>Closure: Adjustable</li> -->
                                                      </ul>
                                                </div>
                                                <div id="reviews" class="container tab-pane fade">
                                                      <div class="reviews-submitted">
                                                            <div class="reviewer"> Trisha <span>22 March
                                                                        2021</span></div>
                                                            <div class="ratting">
                                                                  <i class="fa fa-star"></i>
                                                                  <i class="fa fa-star"></i>
                                                                  <i class="fa fa-star"></i>
                                                                  <i class="fa fa-star"></i>
                                                                  <i class="fa fa-star"></i>
                                                            </div>
                                                            <p>
                                                            I really appreciate the adjustable length of the necklace. It allows me to wear it at different lengths depending on my
                                                            outfit or preference, and the clasp is easy to use but holds securely.
                                                            </p>
                                                      </div>
                                                      <div class="reviews-submit">
                                                            <h4>Give your Review:</h4>
                                                            <div class="ratting">
                                                                  <i class="far fa-star"></i>
                                                                  <i class="far fa-star"></i>
                                                                  <i class="far fa-star"></i>
                                                                  <i class="far fa-star"></i>
                                                                  <i class="far fa-star"></i>
                                                            </div>
                                                            <div class="row form">
                                                                  <div class="col-sm-6">
                                                                        <input type="text" placeholder="Name">
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                        <input type="email" placeholder="Email">
                                                                  </div>
                                                                  <div class="col-sm-12">
                                                                        <textarea placeholder="Review"></textarea>
                                                                  </div>
                                                                  <div class="col-sm-12">
                                                                        <button>Submit</button>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <?php
                                }
                                ?>
                              <div class="product">
                                    <div class="section-header">
                                          <h1>Related Products</h1>
                                    </div>

                                    <div class="row align-items-center product-slider product-slider-3">
                                          <div class="col-lg-3">
                                          <div class="product-item">
                                                <div class="product-title">
                                                      <a href="#">Floral Traces - Oxidised Ring</a>
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
                                                            <img src="img/Featured5.jpg" alt="Product Image" width="100%" height="325px">
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
                                          </div>
                                          <div class="col-lg-3">
                                          <div class="product-item">
                                                <div class="product-title">
                                                      <a href="product-detail.php?product_id=5">Ahilya - Necklace Set</a>
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
                                                            <img src="img/Featured4.jpg" alt="Product Image" width="100%" height="325px">
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
                                          </div>
                                          <div class="col-lg-3">
                                          <div class="product-item">
                                                <div class="product-title">
                                                      <a href="product-detail.php?product_id=6">Silver Oxidised Earrings</a>
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
                                                            <img src="img/Featured3.jpg" alt="Product Image" width="100%" height="325px">
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
                                          <div class="col-lg-3">
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
                                                            <img src="img/recent1.jpg" alt="Product Image" width="100%" height="325px">
                                                      </a>
                                                      <div class="product-action">
                                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                            <a href="#"><i class="fa fa-heart"></i></a>
                                                      </div>
                                                </div>
                                                <div class="product-price">
                                                      <h3><span>₹</span> 2199</h3>
                                                      <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                                </div>
                                          </div>
                                          </div>
                                          <div class="col-lg-3">
                                          <div class="product-item">
                                                <div class="product-title">
                                                      <a href="product-detail.php?product_id=7">Enamel Earrings</a>
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
                                                            <img src="img/recent4.jpg" alt="Product Image" width="100%" height="325px">
                                                      </a>
                                                      <div class="product-action">
                                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                            <a href="#"><i class="fa fa-heart"></i></a>
                                                      </div>
                                                </div>
                                                <div class="product-price">
                                                      <h3><span>₹</span> 749</h3>
                                                      <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                                </div>
                                          </div>
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <!-- Side Bar Start -->
                        <div class="col-lg-4 sidebar">
                              <div class="sidebar-widget category">
                                    <h2 class="title">Category</h2>
                                    <nav class="navbar bg-light">
                                          <ul class="navbar-nav">
                                                <li class="nav-item">
                                                      <a class="nav-link" href="#"><i class="fa fa-female"></i>Top Rated Crafts</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link" href="#"><i class="fa fa-child"></i>Kiddo Crafty</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Woolen Wonders</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Marcrame Madness</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Handmade Hifi</a>
                                                </li>
                                          </ul>
                                    </nav>
                              </div>
                        
                              <div class="sidebar-widget widget-slider">
                                    <div class="sidebar-slider normal-slider">
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
                                          <li><a href="#">Oxidised Rings</a><span>(4)</span></li>
                                          <li><a href="#">Necklaces</a><span>(3)</span></li>
                                          <li><a href="#">Earrings</a><span>(6)</span></li>
                                          <li><a href="#">Bangles</a><span>(2)</span></li>
                                          <li><a href="#">Wall Hangings</a><span>(3)</span></li>
                                          <li><a href="#">Bell Hangings</a><span>(1)</span></li>
                                          <li><a href="#">Wall Hooks</a><span>(1)</span></li>
                                    </ul>
                              </div>
                        
                              <div class="sidebar-widget tag">
                                    <h2 class="title">Craftsea</h2>
                                    <a href="#">Handmade</a>
                                    <a href="#">Bangles</a>
                                    <a href="#">Necklaces</a>
                                    <a href="#">Earrings</a>
                                    <a href="#">Wall Hangings</a>
                                    <a href="#">Bell Hangings</a>
                                    <a href="#">Wall Hooks</a>
                                    <a href="#">Oxidised Rings</a>
                                    <a href="#">Craft Daily</a>
                                    <a href="#">DIY</a>
                                    <a href="#">Craftography</a>
                                    <a href="#">Creative Ideas</a>
                              </div>
                        </div>
                        <!-- Side Bar End -->
                  </div>
            </div>
      </div>
      <!-- Product Detail End -->

      <!-- Brand Start -->
      <div class="brand">
            <div class="container-fluid">
                  <div class="brand-slider">
                        <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                  </div>
            </div>
      </div>
      <!-- Brand End -->

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
        function addcart(productid)
        {
            window.location="addcart.php?product_id="+productid+"&quantity="+document.getElementById('Quantity').value;
        }
        function search()
            {
                window.location="product.php?search="+document.getElementById("search").value;
            }
      </script>
</body>
</html>