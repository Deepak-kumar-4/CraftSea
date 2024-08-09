<?php
session_start();
//connection to database
$con=mysqli_connect("localhost","root","","Craftsea");

$address="";
$mobile="";
$name="";
$password="";
$email="";
$dob="";
if(isset($_GET['confirmpass']))
{
    $customerID=$_SESSION['userid'];
    $password=$_GET['confirmpass'];
    $result=mysqli_query($con,"UPDATE customer SET password='$password' WHERE  customer_id='$customerID'")
    or die("Failed to login".mysql_error());
    ?>
        <script>
            alert("Updated Successfuly");
            window.location="my-account.php"
        </script>
    <?php
}
else if(isset($_SESSION['userid']) && isset($_GET['name']))
    {
        $customerID=$_SESSION['userid'];
        $address=$_GET['address'];
        $mobile=$_GET['mobile'];
        $name=$_GET['name'];
        $email=$_GET['email'];
        $dob=$_GET['dob'];
        $result=mysqli_query($con,"UPDATE customer SET name='$name',address='$address',phone_no='$mobile',email='$email',dob='$dob' WHERE  customer_id='$customerID'")
        or die("Failed to login".mysql_error());
        ?>
            <script>
                alert("Updated Successfuly");
                window.location="my-account.php"
            </script>
        <?php
    } 
else if(isset($_SESSION['userid']))
    {
        $customerID=$_SESSION['userid'];
        $result=mysqli_query($con,"select * from customer where customer_id='$customerID'")
    or die("Failed to login".mysql_error());
    while($row = mysqli_fetch_assoc($result))
        {
            $address=$row['address'];
            $mobile=$row['phone_no'];
            $name=$row['name'];
            $password=$row['password'];
            $email=$row['email'];
            $dob=$row['dob'];
        }
    }
if(isset($_GET['orderid']))
{
      $id=$_GET['orderid'];
      $reason=$_GET['reason'];
      $cancle=mysqli_query($con,"UPDATE orders SET status='Order Cancelled', reason='$reason' WHERE order_id='$id'");
      echo "<script>alert('Your order has been cancled');window.location='my-account.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Craftsea - My Account</title>
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
                        <li class="breadcrumb-item active">My Account</li>
                  </ul>
            </div>
      </div>
      <!-- Breadcrumb End -->

      <!-- My Account Start -->
      <div class="my-account">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-md-3">
                              <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="dashboard-nav" data-toggle="pill"
                                          href="#dashboard-tab" role="tab"><i
                                                class="fa fa-tachometer-alt"></i>Dashboard</a>
                                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab"
                                          role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                                    <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab"
                                          role="tab"><i class="fa fa-credit-card"></i>Payment Method</a>
                                    <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab"
                                          role="tab"><i class="fa fa-map-marker-alt"></i>Address</a>
                                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab"
                                          role="tab"><i class="fa fa-user"></i>Account Details</a>
                                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                              </div>
                        </div>
                        <div class="col-md-9">
                              <div class="tab-content">
                                    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel"
                                          aria-labelledby="dashboard-nav">
                                          <h4>Dashboard</h4>
                                          <p>
                                                <h2><b>Welcome to Craftsea!</b></h2>
                                                <br>
                                          Craftsea is your go-to destination for all things crafting. We are passionate about providing you with high-quality
                                          craft supplies, tools, and inspiration to unleash your creativity. Whether you're an experienced crafter or just
                                          starting your crafting journey, we're here to support and inspire you every step of the way.
                                          <br>
                                          <br>
                                          At Craftsea, we understand that crafting is more than just a hobby—it's a way to express your unique style, unleash your
                                          imagination, and create something truly special. We believe that everyone has the ability to be creative, and we're here
                                          to help you explore your artistic side.
                                          <br>
                                          <br>
                                          <b>Our Store:</b>
                                          Located in the heart of Bangalore, Craftsea is a haven for crafters of all ages and skill levels. Step into our
                                          store and immerse yourself in a world of colors, textures, and endless possibilities. We carefully curate a wide range
                                          of craft supplies, from paper crafts to sewing and needlecraft, painting and drawing, jewelry making, and so much more.
                                          You'll find everything you need to bring your creative ideas to life.
                                          <br>
                                          <br>
                                          <b>Quality and Variety:</b>
                                          We pride ourselves on offering only the highest quality products from reputable brands in the crafting industry. Our
                                          extensive selection of materials, tools, and accessories ensures that you'll find just what you're looking for, no
                                          matter the project. From beautiful fabrics and beads to paints, brushes, and specialty papers, we have it all.
                                          <br>
                                          <br>
                                          <b>Community and Inspiration:</b>
                                          At Craftsea, we believe in the power of community and the joy of sharing creative experiences. We regularly host
                                          workshops, classes, and events where crafters can come together to learn, inspire one another, and celebrate their love
                                          for crafting. Join our crafting community, connect with like-minded individuals, and let your creativity flourish.
                                          <br>
                                          <br>
                                          <b>Shop Online:</b>
                                          We understand that convenience is important, so we've made it easy for you to shop online. Visit our website to browse
                                          our extensive catalog, conveniently order your favorite supplies, and have them delivered right to your doorstep. We
                                          strive to provide a seamless online shopping experience, ensuring that you can get your hands on the crafting materials
                                          you need whenever inspiration strikes.
                                          <br>
                                          <br>
                                          At Craftsea, we're dedicated to providing exceptional customer service, fostering creativity, and fueling your passion
                                          for crafting. Join us on this crafting journey and let us be your trusted partner in all your creative endeavors.
                                          <br>
                                          <br>
                                          Start exploring, get inspired, and create something amazing with Craftsea!
                                          </p>
                                    </div>
                                    <div class="tab-pane fade" id="orders-tab" role="tabpanel"
                                          aria-labelledby="orders-nav">
                                          <div class="table-responsive">
                                                <table class="table table-bordered">
                                                      <thead class="thead-dark">
                                                            <tr>
                                                                  <th>No</th>
                                                                  <th>Product</th>
                                                                  <th>Date</th>
                                                                  <th>Price</th>
                                                                  <th>Status</th>
                                                                  <th>Action</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                      <?php
                                                      if(isset($_SESSION['userid']))
                                                      {
                                                            $j=0;
                                                            $result=mysqli_query($con,"SELECT * FROM orders WHERE customer_id='$customerID' and reason='' ")
                                                            or die("Failed to login".mysql_error());
                                                            while($row = mysqli_fetch_assoc($result))
                                                            {
                                                                  $j++;
                                                      ?>
                                                            <tr>
                                                                  <td><?php echo $j?></td>
                                                                  <td><?php echo $row['product_name']?></td>
                                                                  <td><?php echo $row['order_date']?></td>
                                                                  <td><?php echo $row['price']?></td>
                                                                  <td><?php echo $row['status']?></td>
                                                                  <td><button class="btn" data-toggle="modal" data-target="#exampleModal<?php echo $j?>">Cancel</button></td>
                                                            </tr>
                                                            <div class="modal fade" id="exampleModal<?php echo $j?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                    <h4 class="modal-title" id="exampleModalLabel" style="font-family: 'Source Code Pro', monospace;"><strong>Cancel Order</strong></h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                              <div class="col-md-12">
                                                                              <label for="modal">Select the Reason</label>
                                                                              <select class="form-control" id="opreson<?php echo $j?>">
                                                                              <option selected></option>
                                                                              <option value="I have changed my mind">I have changed my mind</option>
                                                                              <option value="I have purchased the product">I have purchased the product</option>
                                                                              <option value="High Shipping costs">High Shipping costs</option>
                                                                              <option value="Ordered the wrong product">Ordered the wrong product</option>
                                                                              <option value="High service charges">High service charges</option>
                                                                              <option value="Long delivery time">Long delivery time</option>
                                                                              </select>
                                                                              <div>
                                                                              <label for="modal">Any Other Reasons</label>
                                                                              <textarea class="form-control" name="rson" id="rson<?php echo $j?>" cols="30" rows="4" placeholder="Specify the reasons"></textarea>
                                                                              </div>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary" onclick="cancel(<?php echo $row['order_id'];?>,<?php echo $j;?>)">Submit</button>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>

                                                      <?php
                                                            }
                                                      }
                                                      ?>
                                                            <!-- <tr>
                                                                  <td>2</td>
                                                                  <td>Product Name</td>
                                                                  <td>01 Jan 2020</td>
                                                                  <td>$99</td>
                                                                  <td>Approved</td>
                                                                  <td><button class="btn">View</button></td>
                                                            </tr>
                                                            <tr>
                                                                  <td>3</td>
                                                                  <td>Product Name</td>
                                                                  <td>01 Jan 2020</td>
                                                                  <td>$99</td>
                                                                  <td>Approved</td>
                                                                  <td><button class="btn">View</button></td>
                                                            </tr> -->
                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="payment-tab" role="tabpanel"
                                          aria-labelledby="payment-nav">
                                          <p>
                                          <h2><b>Payment Methods:</b></h2>
                                          <br>
                                          At Craftsea, we offer convenient and secure payment options to make your shopping experience smooth and hassle-free.
                                          Choose the method that works best for you:
                                          <br>
                                          <br>
                                          <b>UPI (Unified Payments Interface):</b> 
                                          <br>
                                          Craftsea is equipped to accept payments through UPI, a fast and secure method widely used in India. You can make
                                          payment directly from your UPI-enabled mobile app or UPI payment service provider. During checkout, enter your UPI
                                          ID, and follow the instructions provided to complete the payment seamlessly.
                                          <br>  
                                          <br>                                        
                                          <b>Credit/Debit Cards:</b>
                                          <br>
                                          We accept all major credit and debit cards, including Visa, Mastercard, Rupay, and Discover. Simply enter
                                          your card details during checkout, and your payment will be processed securely.
                                          <br>
                                          <br>
                                          <b>Cash on Delivery (COD):</b>
                                          <br>
                                          We offer Cash on Delivery as a payment option for customers who prefer to pay in cash at the time of delivery. Simply
                                          select the Cash on Delivery option during checkout, and our delivery personnel will collect the payment when delivering
                                          your order. Please ensure to have the exact amount ready for a smooth transaction.
                                          <br>
                                          <br>
                                          Please note that all payments made on our website are encrypted and secured to protect your personal and financial
                                          information. We do not store any payment details on our servers, ensuring your privacy and peace of mind.
                                          <br>
                                          <br>
                                          If you have any questions or require assistance with the payment process, our customer support team is always available
                                          to help. Please reach out to us through our contact page, and we'll be happy to assist you.


                                          </p>
                                    </div>
                                    <div class="tab-pane fade" id="address-tab" role="tabpanel"
                                          aria-labelledby="address-nav">
                                          <h4>Address</h4>
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <h5>Payment Address</h5>
                                                      <p><?php echo $address;?></p>
                                                      <p>Mobile: <?php echo $mobile;?></p>
                                                      <!-- <button class="btn">Edit Address</button> -->
                                                      <a class="btn" id="account-nav" data-toggle="pill" href="#account-tab">Edit Address</a>
                                                </div>
                                                <div class="col-md-6">
                                                      <h5>Shipping Address</h5>
                                                      <p><?php echo $address;?></p>
                                                      <p>Mobile: <?php echo $mobile;?></p>
                                                      <a class="btn" id="account-nav" data-toggle="pill" href="#account-tab">Edit Address</a>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-tab" role="tabpanel"
                                          aria-labelledby="account-nav">
                                          <h4>Account Details</h4>
                                          <form class="row" name="updateform">
                                                <div class="col-md-6">
                                                      <label>Name</label>
                                                      <input class="form-control" type="text" value="<?php echo $name;?>" placeholder="First Name" name="name">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Date Of Birth</label>
                                                      <input class="form-control" type="date" value="<?php echo $dob;?>" placeholder="Date Of Birth" name="dob">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Mobile</label>
                                                      <input class="form-control" type="text" value="<?php echo $mobile;?>" placeholder="Mobile" name="mobile">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Email</label>
                                                      <input class="form-control" type="text" value="<?php echo $email;?>" placeholder="Email" name="email">
                                                </div>
                                                <div class="col-md-12">
                                                      <label>Address</label>
                                                      <input class="form-control" type="text" value="<?php echo $address;?>" placeholder="Address" name="address">
                                                </div>
                                                <div class="col-md-12">
                                                      <button onclick="return update()" class="btn">Update Account</button>
                                                      <br><br>
                                                </div>
                                          </form>
                                          <h4>Password change</h4>
                                          <form class="row" name="passform">
                                                <div class="col-md-12">
                                                      <label>Current Password</label>
                                                      <input id="pass" class="form-control" type="password" readonly value="<?php if(isset($_SESSION['userid'])) echo $password; else echo "";?>"
                                                            placeholder="Current Password">
                                                </div>
                                                <div class="col-md-6">
                                                      <input class="form-control" type="text" id="newpass"
                                                            placeholder="New Password">
                                                </div>
                                                <div class="col-md-6">
                                                      <input class="form-control" type="text"
                                                            placeholder="Confirm Password" name="confirmpass">
                                                </div>
                                                <div class="col-md-12">
                                                      <button onclick="return change()" class="btn">Save Changes</button>
                                                </div>
                                          </form>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <!-- My Account End -->

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
            function update()
            {
                var name=document.updateform.name.value;
                var dob=document.updateform.dob.value;
                var email=document.updateform.email.value;
                var mobile=document.updateform.mobile.value;
                var address=document.updateform.address.value;
                if(name=="")
                {
                        alert("Enter Name");
                        return false;
                }
                else if(dob=="")
                {
                        alert("Enter Birth Day");
                        return false;
                }
                else if(mobile.length!=10||mobile=="")
                {
                        alert("Enter valid Mobile Number");
                        return false;
                }
                else if(email=="")
                {
                        alert("Enter Email");
                        return false;
                }
                else if(!email.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/))
                {
                    alert("Enter Valid Email");
                    return false;
                }
                else if(address=="")
                {
                        alert("Enter address");
                        return false;
                }
                else
                    return true;
            }
            function change()
            {
                document.getElementById('pass').type="text";
                var pass=document.getElementById('pass').value;
                var newpass=document.getElementById('newpass').value;
                var confirmpass=document.passform.confirmpass.value;
                if(newpass=="")
                {
                    alert("Enter the password value");
                    return false;
                }
                else if(pass == newpass)
                {
                    alert("New Password is same as old password");
                    return false;
                }
                else if(newpass != confirmpass)
                {
                    alert("Password not matching");
                    return false;
                }
                else
                    return true;
            }
            function cancel(orderid,j)
            {
                  var optreason=document.getElementById('opreson'+j).value;
                  var reason=document.getElementById('rson'+j).value;
                  if(optreason==""&&reason=="")
                        alert("Enter your reasone for cancelling")
                  else if(optreason!="")
                        window.location="my-account.php?orderid="+orderid+"&reason="+optreason;
                  else
                        window.location="my-account.php?orderid="+orderid+"&reason="+reason;
                  // var dt=new Date();
                  // alert(formatDate(dt,'mm/dd/yy'));
                  // window.location='my-account.php';
            }
        </script>
</body>
</html>