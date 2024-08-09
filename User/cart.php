<?php
session_start();
if(!isset($_SESSION['userid']))
{?>
    <script>
        alert("Login To Add Item Into Cart");
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
    $delet=mysqli_query($con,"delete from cart where product_id='$id'");
    $result=mysqli_query($con,"select * from cart where customer_id='$customerID'")
    or die("Failed to login".mysql_error());
    $_SESSION['cart']=mysqli_num_rows($result);
    
}

if(isset($_GET['quantity1']))
{
    $getid;
    $getquantity;
    for($j=1;$j<=$_GET['count'];$j++)
    {
            $getid=$_GET['product_id'.$j];
            $getquantity=$_GET['quantity'.$j];
            if($_GET['quantity'.$j]==0)
                $delet=mysqli_query($con,"delete from cart where product_id='$getid'");
            else
                $delet=mysqli_query($con,"update cart set quantity='$getquantity' where product_id='$getid'");
    }
    $result=mysqli_query($con,"select * from cart where customer_id='$customerID'")
    or die("Failed to login".mysql_error());
    $_SESSION['cart']=mysqli_num_rows($result);
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Craftsea - Cart</title>
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
                                    <a href="index.php">
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
                        <li class="breadcrumb-item active">Cart</li>
                  </ul>
            </div>
      </div>
      <!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
<div class="container-fluid">
<div class="row">
      <div class="col-lg-8">
            <div class="cart-page-inner">
                  <div class="table-responsive">
                        <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                          <th>Product</th>
                                          <th>Price</th>
                                          <th>Quantity</th>
                                          <th>Total</th>
                                          <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                <?php
                                //connect to database
                                $con=mysqli_connect("localhost","root","","Craftsea");

                                //Query
                                $result=mysqli_query($con,"select * from cart where customer_id='$customerID'")
                                or die("Failed to login".mysql_error());
                                $i=0;
                                $url=NULL;
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $i++;
                                    $url.="product_id".$i."=".$row['product_id']."&";
                                    ?>
                                    <tr>
                                          <td>
                                                <div class="img">
                                                      <a href="product-detail.php?product_id=<?php echo $row['product_id'];?>"><img src="<?php echo $row['image'];?>"
                                                      alt="Image"></a>
                                                      <p><?php echo $row['name'];?></p>
                                                </div>
                                          </td>
                                          <td>₹<?php echo $row['price'];?></td>
                                          <td>
                                                <div class="qty">
                                                      <button class="btn-minus" onclick="sub(<?php echo $row['price'];?>,<?php echo $i; ?>)"><i
                                                                  class="fa fa-minus"></i></button>
                                                      <input type="text" value="<?php echo $row['quantity'];?>" id="quantity<?php echo $i; ?>">
                                                      <button class="btn-plus" onclick="add(<?php echo $row['price'];?>,<?php echo $i; ?>)"><i
                                                                  class="fa fa-plus"></i></button>
                                                </div>
                                          </td>
                                          <td>₹<span id="result<?php echo $i; ?>"><?php echo $row['quantity']*$row['price'];?></span></td>
                                          <td><a href="cart.php?id=<?php echo $row['product_id'];?>"><button><i class="fa fa-trash"></i></button></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                        </table>
                  </div>
            </div>
      </div>
      <div class="col-lg-4">
            <div class="cart-page-inner">
                  <div class="row">
                        <div class="col-md-12">
                              <div class="coupon">
                                    <input type="text" placeholder="Coupon Code" id="coupon_code">
                                    <button>Apply</button>
                              </div>
                        </div>
                        <div class="col-md-12">
                              <div class="cart-summary">
                                <!-- <form action="cart.php" method="get"> -->
                                <div class="cart-content">
                                          <h1>Cart Summary</h1>
                                          <p>Sub Total<span id="sub_total">₹99</span></p>
                                          <p>Shipping Cost<span id="shipping_cost">
                                          <?php if($i==0)
                                                    echo "₹0";
                                                else
                                                    echo "₹49";
                                          ?></span></p>
                                          <h2>Grand Total<span id="grand_total"></span></h2>
                                    </div>
                                    <div class="cart-btn">
                                          <button onclick="return update()">Update Cart</button>
                                          <button onclick="checkout()">Checkout</button>
                                    </div>
                                <!-- </form> -->
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>
</div>
<!-- Cart End -->

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
            var sub_total=0;
            for(var i=1;i<=<?php echo $i;?>;i++)
                {
                    sub_total+=parseInt(document.getElementById("result"+i).innerHTML);
                }
                document.getElementById("sub_total").innerHTML="₹"+sub_total;
                // sub_total+=49;
                if(document.getElementById("sub_total").innerHTML!="₹0")
                    document.getElementById("grand_total").innerHTML="₹"+(sub_total+49);
            function add(price,idname)
            {
                var sub_total=0;
                var values=parseInt(document.getElementById("quantity"+idname).value)+1;
                document.getElementById("result"+idname).innerHTML=values*price;
                for(var i=1;i<=<?php echo $i;?>;i++)
                {
                    sub_total+=parseInt(document.getElementById("result"+i).innerHTML);
                }
                // document.getElementById("sub_total").innerHTML="₹"+sub_total;
                // sub_total+=49;
                // document.getElementById("grand_total").innerHTML="₹"+sub_total;
                // if(document.getElementById("sub_total").innerHTML!="₹0")
                //     document.getElementById("shipping_cost").innerHTML="₹49";
            }
            function sub(price,idname)
            {
                var sub_total=0;
                if(parseInt(document.getElementById("quantity"+idname).value)!=0)
                {
                    var values=parseInt(document.getElementById("quantity"+idname).value)-1;
                    document.getElementById("result"+idname).innerHTML=values*price;
                    for(var i=1;i<=<?php echo $i;?>;i++)
                    {
                        sub_total+=parseInt(document.getElementById("result"+i).innerHTML);
                    }
                    // document.getElementById("sub_total").innerHTML="₹"+sub_total;
                    // document.getElementById("grand_total").innerHTML="₹"+sub_total;
                }   
                // if(document.getElementById("sub_total").innerHTML=="₹0")
                //     document.getElementById("shipping_cost").innerHTML="₹0";
            }
            function update()
            {
                if(document.getElementById("sub_total").innerHTML!="₹0")
                {
                    document.getElementById("shipping_cost").innerHTML="₹49";
                    // alert(sub_total+49);
                    document.getElementById("grand_total").innerHTML="₹"+(sub_total+49);
                }
                else
                    document.getElementById("shipping_cost").innerHTML="₹0";
                    // document.getElementById("sub_total").innerHTML="₹"+sub_total;
                    // document.getElementById("grand_total").innerHTML="₹"+sub_total;
                    // alert("rg");
                let url=null;
                for(var i=1;i<=<?php echo $i;?>;i++)
                {
                    if(i==1)
                        url="quantity"+i+"="+document.getElementById("quantity"+i).value+"&";
                    else
                        url+="quantity"+i+"="+document.getElementById("quantity"+i).value+"&";
                }
                window.location="cart.php?"+url+"<?php echo $url;?>count="+<?php echo $i;?>;
                // alert(url+"<?php echo $url;?>count="+<?php echo $i;?>);
                return 1;
            }
            function checkout()
            {
                  if(document.getElementById('sub_total').innerHTML!="₹0")
                        window.location="checkout.php?SubTotal="+document.getElementById('sub_total').innerHTML+"&Shipping_Cost="+document.getElementById('shipping_cost').innerHTML+"&Grand_Total="+document.getElementById('grand_total').innerHTML;
                  else
                        alert("Add Products To Checkout");
            }
            function search()
            {
                window.location="product.php?search="+document.getElementById("search").value;
            }
      </script>
</body>

</html>