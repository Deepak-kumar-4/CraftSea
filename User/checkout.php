<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Craftsea - Checkout</title>
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
                        <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                  </ul>
            </div>
      </div>
      <!-- Breadcrumb End -->

      <!-- Checkout Start -->
      <form action="order.php" method="get">
      <div class="checkout">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-lg-8">
                              <div class="checkout-inner">
                                    <div class="billing-address">
                                          <h2>Billing Address</h2>
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <label>Name</label>
                                                      <input class="form-control" type="text" placeholder="Name" name="name" id="name">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                      <label>Last Name</label>
                                                      <input class="form-control" type="text" placeholder="Last Name">
                                                </div> -->
                                                <div class="col-md-6">
                                                      <label>Mobile No</label>
                                                      <input class="form-control" type="number" placeholder="Mobile No" name="Mobile" id="Mobile">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>E-mail</label>
                                                      <input class="form-control" type="text" placeholder="E-mail" name="mail" id="mail">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Address Line 1</label>
                                                      <input class="form-control" type="text" placeholder="Address" name="Address" id="Address">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                      <label>Address Line 2</label>
                                                      <input class="form-control" type="text" placeholder="Address">
                                                </div> -->
                                                <div class="col-md-6">
                                                      <label>Country</label>
                                                      <select class="custom-select" name="Country" id="Country">
                                                            <option selected>India</option>
                                                            <option>United States</option>
                                                            <option>United Kingdom</option>
                                                            <option>China</option>
                                                            <option>Sri Lanka</option>
                                                            <option>Australia</option>
                                                            <option>New Zealand</option>
                                                            <option>South Africa</option>
                                                      </select>
                                                </div>
                                                <div class="col-md-6">
                                                      <label>City</label>
                                                      <input class="form-control" type="text" placeholder="City" name="City" id="City">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>State</label>
                                                      <input class="form-control" type="text" placeholder="State" name="State" id="State">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>ZIP Code</label>
                                                      <input class="form-control" type="number" placeholder="ZIP Code" name="zipCode" id="zipCode">
                                                </div>
                                                <!-- <div style="text-align:center;margin: auto;">
                                                      <button class="btn">Save Address</Address></button>
                                                </div> -->
                                                <br>
                                                <br>
                                                <!-- <div class="col-md-12">
                                                      <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                  id="shipto">
                                                            <label class="custom-control-label" for="shipto">Ship to
                                                                  different address</label>
                                                      </div>
                                                </div> -->
                                          </div>
                                    </div>

                                    <!-- <div class="shipping-address">
                                          <h2>Shipping Address</h2>
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <label>Name</label>
                                                      <input class="form-control" type="text" placeholder="First Name">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Last Name"</label>
                                                      <input class="form-control" type="text" placeholder="Last Name">
                                                </div> -->
                                                <!-- <div class="col-md-6">
                                                      <label>E-mail</label>
                                                      <input class="form-control" type="text" placeholder="E-mail">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Mobile No</label>
                                                      <input class="form-control" type="text" placeholder="Mobile No">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Address Line 1</label>
                                                      <input class="form-control" type="text" placeholder="Address">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Address Line 2</label>
                                                      <input class="form-control" type="text" placeholder="Address">
                                                </div> -->
                                                <!-- <div class="col-md-6">
                                                      <label>Country</label>
                                                      <select class="custom-select">
                                                            <option selected>India</option>
                                                            <option>United States</option>
                                                            <option>United Kingdom</option>
                                                            <option>China</option>
                                                            <option>Sri Lanka</option>
                                                            <option>Australia</option>
                                                            <option>New Zealand</option>
                                                            <option>South Africa</option>
                                                      </select>
                                                </div> -->
                                                <!-- <div class="col-md-6">
                                                      <label>City</label>
                                                      <input class="form-control" type="text" placeholder="City">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>State</label>
                                                      <input class="form-control" type="text" placeholder="State">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>ZIP Code</label>
                                                      <input class="form-control" type="text" placeholder="ZIP Code">
                                                </div>
                                          </div> -->
                                          <!-- <div style="text-align:center;margin: auto;">
                                                <button class="btn">Save Address</Address></button>
                                          </div> 
                                    </div> -->
                                    
                              </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="checkout-inner">
                                    <div class="checkout-summary">
                                          <h1>Cart Total</h1>
                                          <!-- <p>Product Name<span>$99</span></p> -->
                                          <p class="sub-total">Sub Total<span><?php echo $_GET['SubTotal'];?></span></p>
                                          <p class="ship-cost">Shipping Cost<span><?php echo $_GET['Shipping_Cost'];?></span></p>
                                          <h2>Grand Total<span><?php echo $_GET['Grand_Total'];?></span></h2>
                                    </div>

                                    <div class="checkout-payment">
                                          <div class="payment-methods">
                                                <h1>Payment Methods</h1>
                                                <div class="payment-method">
                                                      <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                  id="payment-1" name="payment">
                                                            <label class="custom-control-label"
                                                                  for="payment-1">UPI</label>
                                                      </div>
                                                      <div class="payment-content" id="payment-1-show">
                                                            <p>
                                                            Enter your UPI ID here
                                                            <div class="form">
                                                                  <input type="email" id="upi" class="form-control" placeholder="Your UPI ID here">
                                                                  <!-- <div  class="checkout-payment" style="margin: 30px 0 0 0; display: flex; justify-content: center;">
                                                                    <div class="checkout-btn">
                                                                        <button >Submit</Address></button>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                            <br>
                                                            <div><center>(or)</center></div>
                                                            <br>
                                                            <br>
                                                            Scan this QR code to Pay
                                                            <br>
                                                            <br>
                                                            <div>
                                                            <img src="img/qrcode.jpg" alt="QR" width="100%">
                                                            </div>
                                                            </p>
                                                      </div>
                                                </div>
                                                <div class="payment-method">
                                                      <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                  id="payment-2" name="payment">
                                                            <label class="custom-control-label"
                                                                  for="payment-2">Debit/Credit Card</label>
                                                      </div>
                                                      <div class="payment-content" id="payment-2-show">
                                                            <p>
                                                            <div class="row">
                                                                  <div class="col-md-12">
                                                                        <input class="form-control" id="cardno" type="number" placeholder="Enter Card Number">
                                                                  </div>
                                                                  <br>
                                                                  <div class="col-md-6">
                                                                        <input class="form-control" id="cvv" type="number" placeholder="CVV">
                                                                  </div>
                                                                  <div class="col-md-6" style="padding: 0 15px 0 0;">
                                                                        <input class="form-control" id="date" type="date" placeholder="Valid thru">
                                                                  </div>
                                                                  <!-- <div  class="checkout-payment" style="margin: 30px 0 0 0; display: flex; justify-content: center;">
                                                                    <div class="checkout-btn">
                                                                        <button onclick="check()">Submit</Address></button>
                                                                    </div>
                                                                </div> -->
                                                                  </div>
                                                              
                                                            </p>
                                                            </div>
                                                </div>
                                                <div class="payment-method">
                                                      <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                  id="payment-4" name="payment">
                                                            <label class="custom-control-label" for="payment-4">Cash On Delivery</label>
                                                      </div>
                                                      <div class="payment-content" id="payment-4-show">
                                                            <p>
                                                            Pay when Product reaches your hand. Make sure that you check the quality and the fittings of the product.
                                                            </p>
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="checkout-btn">
                                                <button onclick="return check()">Place Order</button>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      </form>
      <br>
      <!-- Checkout End -->

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
        function check()
        {
            
            if(document.getElementById("payment-2").checked == true)
            {
                  var cardno=document.getElementById("cardno").value;
                  var cvv=document.getElementById("cvv").value;
                  var date=document.getElementById("date").value;
                  if(cardno.length==0){
                        alert("Enter card number");
                        return false;
                  }
                  else if(cardno.length!=16){
                        alert("Enter correct card number");
                        return false;
                  }
                  else if(cvv.length==0){
                        alert("Enter CVV Number");
                        return false;
                  }
                  else if(cvv.length!=3){
                        alert("Enter Correct CVV Number");
                        return false;
                  }
                  else if(date==""){
                        alert("Enter The Expire date");
                        return false;
                  }
                  else
                        return valid();
            }
            else if(document.getElementById("payment-1").checked == true)
            {
                  var date=document.getElementById("upi").value;
                  if(date==""){
                        alert("Enter your UPI");
                        return false;
                  }
                  else
                        return valid();
            }
            else if(document.getElementById("payment-4").checked == false)
            {
                  alert("Choose your payment option");
                  return false;
            }
            else
            {
                  return valid();
            }
            
            // else
                // Date da=new Date();
                // alert(da.now);
        }
        function valid()
        {
            var name=document.getElementById("name").value;
            var mobile=document.getElementById('Mobile').value;
            var mail=document.getElementById('mail').value;
            var address=document.getElementById('Address').value;
            var country=document.getElementById('Country').value;
            var city=document.getElementById('City').value;
            var state=document.getElementById('State').value;
            var zipCode=document.getElementById('zipCode').value;
            if(name==""){
                  alert("Enter your Name");
                  return false;
            }
            else if(mobile.length==0||mobile.length>10){
                  alert("Enter Valid Number");
                  return false;
            }
            else if(mail==""){
                  alert("Enter Your Email");
                  return false;
            }
            else if(address==""){
                  alert("Enter Your Address");
                  return false;
            }
            else if(country==""){
                  alert("Enter The Counrty Name");
                  return false;
            }
            else if(city==""){
                  alert("Enter The City Name");
                  return false;
            }
            else if(state==""){
                  alert("Enter The State Name");
                  return false;
            }
            else if(zipCode==""){
                  alert("Enter The Zipcode");
                  return false;
            }
            else
                  return true;
        }
      </script>
</body>
</html>