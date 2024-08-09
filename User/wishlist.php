<?php
session_start();
if(!isset($_SESSION['userid']))
{?>
    <script>
        alert("Login To See Your Wishlist");
        window.location="login.php";
    </script>
<?php
}

//connect to database
$con=mysqli_connect("localhost","root","","Craftsea");
$customerID=$_SESSION['userid'];
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $delet=mysqli_query($con,"delete from wishlist where product_id='$id'");
    $result=mysqli_query($con,"select * from wishlist where customer_id='$customerID'")
    or die("Failed to login".mysql_error());
    $_SESSION['wishlist']=mysqli_num_rows($result);
}
if(isset($_POST['wish_add']))
{
    $id=$_GET['id'];
    $quantity=1;
    $name=NULL;
    $price=NULL;
    $image=NULL;
    $result=mysqli_query($con,"select * from product where product_id='$id'")
    or die("Failed to login".mysql_error());
    while($row = mysqli_fetch_assoc($result))
    {
        $name=$row['name'];
        $price=$row['price'];
        $image=$row['image1'];
    }
    $result=mysqli_query($con,"insert into cart (product_id,image,name,price,quantity,customer_id) values('$id','$image','$name','$price','$quantity','$customerID')")
    or die("Failed to login".mysql_error());
    $result=mysqli_query($con,"select * from cart where customer_id='$customerID'")
    or die("Failed to login".mysql_error());
    $_SESSION['cart']=mysqli_num_rows($result);
}
$result=mysqli_query($con,"select * from wishlist where customer_id='$customerID'")
or die("Failed to login".mysql_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Craftsea - Wishlist</title>
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
                                          <span>(<?php echo $_SESSION['wishlist'];?>)</span>
                                    </a>
                                    <a href="cart.php" class="btn cart">
                                          <i class="fa fa-shopping-cart"></i>
                                          <span>(<?php echo $_SESSION['cart'];?>)</span>
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
                        <li class="breadcrumb-item active">Wishlist</li>
                  </ul>
            </div>
      </div>
      <!-- Breadcrumb End -->

      <!-- Wishlist Start -->
      <div class="wishlist-page">
            <div class="container-fluid">
                  <div class="wishlist-page-inner">
                        <div class="row">
                              <div class="col-md-12">
                                    <div class="table-responsive">
                                    <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            ?>
                                        <form action="wishlist.php?id=<?php echo $row['product_id'];?>" method="post">
                                          <table class="table table-bordered">
                                                <!-- <thead class="thead-dark">
                                                      <tr>
                                                            <th>Product</th>
                                                            <th>Price</th>
                                                            <th>Add to Cart</th>
                                                            <th>Remove</th>
                                                      </tr>
                                                </thead> -->
                                                <tbody class="align-middle">
                                                      <tr>
                                                            <td>
                                                                  <div class="img">
                                                                        <a href="#"><img src="<?php echo $row['image'];?>"
                                                                                    alt="Image"></a>
                                                                        <p><?php echo $row['name'];?></p>
                                                                  </div>
                                                            </td>
                                                            <td>$<?php echo $row['price'];?></td>
                                                            <td><button name="wish_add" class="btn-cart">Add to Cart</button></td>
                                                            <td><a href="wishlist.php?id=<?php echo $row['product_id'];?>"><button><i class="fa fa-trash"></i></button></a></td>
                                                      </tr>
                                                </tbody>
                                          </table>
                                        </form>
                                        <?php
                                            }
                                        ?>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <!-- Wishlist End -->

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
        </script>
</body>

</html>