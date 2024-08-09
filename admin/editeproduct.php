<?php
$con=mysqli_connect("localhost","root","","Craftsea");
$product_id=$_GET['product_id'];
if(isset($_GET['productname']))
{
    $productname=$_GET['productname'];
    $category=$_GET['category'];
    $brand=$_GET['brand'];
    $description=$_GET['description'];
    $price=$_GET['price'];
    $buildtype=$_GET['buildtype'];
        if($_GET['image1']!=NULL)
        {
            $image1="img/".$_GET['image1'];
            $result=mysqli_query($con,"UPDATE product SET image1='$image1' WHERE product_id='$product_id'");
        }
        if($_GET['image2']!=NULL)
        {
            $image2="img/".$_GET['image2'];
            $result=mysqli_query($con,"UPDATE product SET image2='$image2' WHERE product_id='$product_id'");
        }
        if($_GET['image3']!=NULL)
        {
            $image3="img/".$_GET['image3'];
            $result=mysqli_query($con,"UPDATE product SET image3='$image3' WHERE product_id='$product_id'");
        }
    $specification=$_GET['specification'];
    $result=mysqli_query($con,"UPDATE product SET name='$productname',description='$description',specification='$specification',brand='$brand',price='$price',category='$category',build_type='$buildtype' WHERE product_id='$product_id'");
    $_GET['productname']=NULL;
    echo "<script>alert('Product Is Edited Successfuly'); window.location='productdetails.php';</script>";
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Craftsea ADMIN - Add Products</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">

      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

      <!-- Libraries Stylesheet -->
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

      <!-- Customized Bootstrap Stylesheet -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">
</head>

<body>
      <div class="container-fluid position-relative bg-white d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner"
                  class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                  <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                  </div>
            </div>
            <!-- Spinner End -->


            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                  <nav class="navbar bg-light navbar-light">
                        <a href="index.php" class="navbar-brand mx-4 mb-3">
                              <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
                        </a>
                        <div class="d-flex align-items-center ms-4 mb-4">
                              <div class="position-relative">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div
                                          class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                                    </div>
                              </div>
                              <div class="ms-3">
                                    <h6 class="mb-0">Craftsman</h6>
                                    <span>Admin</span>
                              </div>
                        </div>
                        <div class="navbar-nav w-100">
                              <a href="index.php" class="nav-item nav-link"><i
                                          class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                              <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                                class="fa fa-chart-bar me-2"></i>Reports</a>
                                    <div class="dropdown-menu bg-transparent border-0">
                                          <a href="sales-report.php" class="dropdown-item"><i class="fa fa-chart-line me-2"></i>Sales Reports</a>
                                    </div>
                              </div>
                              <a href="regusers.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Regd
                                    Users</a>
                              <a href="subscribers.php" class="nav-item nav-link"><i
                                          class="fa fa-keyboard me-2"></i>Subscribers</a>
                              <div class="nav-item dropdown">
                                    <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown"><i
                                                class="fa fa-laptop me-2"></i>Products</a>
                                    <div class="dropdown-menu bg-transparent border-0">
                                          <a href="productdetails.php" class="dropdown-item">Product Details</a>
                                          <a href="addproducts.php" class="dropdown-item">Add Products</a>
                                    </div>
                              </div>
                              
                              <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                                class="far fa-file-alt me-2"></i>Orders</a>
                                    <div class="dropdown-menu bg-transparent border-0">
                                          <a href="order.php" class="dropdown-item">Order Status</a>
                                    </div>
                              </div>
                              <a href="shipaddress.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Address</a>
                        </div>
                  </nav>
            </div>
            <!-- Sidebar End -->
            
            
            <!-- Content Start -->
            <div class="content">
                  <!-- Navbar Start -->
                  <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                              <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                        </a>
                        <a href="#" class="sidebar-toggler flex-shrink-0">
                              <i class="fa fa-bars"></i>
                        </a>
                        <!-- <form class="d-none d-md-flex ms-4">
                              <input class="form-control border-0" type="search" placeholder="Search">
                        </form> -->
                        <div class="navbar-nav align-items-center ms-auto">
                              <!-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                          <i class="fa fa-envelope me-lg-2"></i>
                                          <span class="d-none d-lg-inline-flex">Message</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                          <a href="#" class="dropdown-item">
                                                <div class="d-flex align-items-center">
                                                      <img class="rounded-circle" src="img/user.jpg" alt=""
                                                            style="width: 40px; height: 40px;">
                                                      <div class="ms-2">
                                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                                            <small>15 minutes ago</small>
                                                      </div>
                                                </div>
                                          </a>
                                          <hr class="dropdown-divider">
                                          <a href="#" class="dropdown-item">
                                                <div class="d-flex align-items-center">
                                                      <img class="rounded-circle" src="img/user.jpg" alt=""
                                                            style="width: 40px; height: 40px;">
                                                      <div class="ms-2">
                                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                                            <small>15 minutes ago</small>
                                                      </div>
                                                </div>
                                          </a>
                                          <hr class="dropdown-divider">
                                          <a href="#" class="dropdown-item">
                                                <div class="d-flex align-items-center">
                                                      <img class="rounded-circle" src="img/user.jpg" alt=""
                                                            style="width: 40px; height: 40px;">
                                                      <div class="ms-2">
                                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                                            <small>15 minutes ago</small>
                                                      </div>
                                                </div>
                                          </a>
                                          <hr class="dropdown-divider">
                                          <a href="#" class="dropdown-item text-center">See all message</a>
                                    </div>
                              </div> -->
                              <!-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                          <i class="fa fa-bell me-lg-2"></i>
                                          <span class="d-none d-lg-inline-flex">Notification</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                          <a href="#" class="dropdown-item">
                                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                                <small>15 minutes ago</small>
                                          </a>
                                          <hr class="dropdown-divider">
                                          <a href="#" class="dropdown-item">
                                                <h6 class="fw-normal mb-0">New user added</h6>
                                                <small>15 minutes ago</small>
                                          </a>
                                          <hr class="dropdown-divider">
                                          <a href="#" class="dropdown-item">
                                                <h6 class="fw-normal mb-0">Password changed</h6>
                                                <small>15 minutes ago</small>
                                          </a>
                                          <hr class="dropdown-divider">
                                          <a href="#" class="dropdown-item text-center">See all notifications</a>
                                    </div>
                              </div> -->
                              <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                          <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                                style="width: 40px; height: 40px;">
                                          <span class="d-none d-lg-inline-flex">Craftsman</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                          <!-- <a href="profile.html" class="dropdown-item">My Profile</a> -->
                                          <a href="loginadmin.html" class="dropdown-item">Log Out</a>
                                    </div>
                              </div>
                        </div>
                  </nav>
                  <!-- Navbar End -->

            <!-- Add Product Start -->
            <div class="container-fluid pt-4 px-4">
                  <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                              <h2 style="color:#FF6F61  ;">
                                    Adding Products
                              </h2>
                              <div class="breadcrumb-wrap">
                                    <div class="container-fluid">
                                          <ul class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                      <a href="dashboard.html">Dashboard</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="dashboard.html">Products</a></li>
                                                <li class="breadcrumb-item active">Add Products</li>
                                          </ul>
                                    </div>
                              </div>
                              <div class="bg-light rounded h-100 p-4">
                                    <h4 class="mb-4">Add Products</h4>
                                    <?php
                                        
                                        $result=mysqli_query($con,"SELECT * FROM product WHERE product_id='$product_id'");
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                    ?>
                                    <form method="get" action="editeproduct.php?product_id=1">
                                            <div class="row mb-3">
                                                <label for="product_id" class="col-sm-2 col-form-label">Product ID</label>
                                                <div class="col-sm-10">
                                                      <input type="text" readonly value="<?php echo $row['product_id'];?>" class="form-control" name="product_id" id="product_id">
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <label for="productname" class="col-sm-2 col-form-label">Product Name</label>
                                                <div class="col-sm-10">
                                                      <input type="text" value="<?php echo $row['name'];?>" class="form-control" name="productname" id="productname">
                                                </div>
                                          </div>
                                          
                                          <div class="row mb-3">
                                                <label for="category" class="col-sm-2 col-form-label">Product Category</label>
                                                <div class="col-sm-10">
                                                      <select class="form-select form-select-sm mb-3" style="height: 40px;" aria-label=".form-select-sm example" id="category" name="category">
                                                            <option >Select Category</option>
                                                            <option value="Top_Rated_Crafts">Top Rated Crafts</option>
                                                            <option value="Kiddo_Crafty">Kiddo Crafty</option>
                                                            <option value="Woolen_Wonders">Woolen Wonders</option>
                                                            <option value="Macrame_Madness">Macrame Madness</option>
                                                            <option value="Handmade_Hifi">Handmade Hifi</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <script>
                                            document.querySelector("#category").value="<?php echo $row['category'];?>";
                                          </script>
                                          <div class="row mb-3">
                                                <label for="brand" class="col-sm-2 col-form-label">Product Brand</label>
                                                <div class="col-sm-10">
                                                      <select class="form-select form-select-sm mb-3" style="height: 40px;" aria-label=".form-select-sm example" id="brand" name="brand">
                                                            <option >Select Brand</option>
                                                            <option value="Oxidised_Rings">Oxidised Rings</option>
                                                            <option value="Necklaces">Necklaces</option>
                                                            <option value="Earrings">Earrings</option>
                                                            <option value="Bangles">Bangles</option>
                                                            <option value="Wall_Hangings">Wall Hangings</option>
                                                            <option value="Bell_Hangings">Bell Hangings</option>
                                                            <option value="Wall_Hooks">Wall Hooks</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <script>
                                            document.querySelector("#brand").value="<?php echo $row['brand'];?>";
                                          </script>
                                          <div class="row mb-3">
                                                <label for="description" class="col-sm-2 col-form-label">Product Description</label>
                                                <div class="col-sm-10">
                                                      <!-- <input type="text" class="form-control" id="description" name="description"> -->
                                                      <textarea name="description" id="description" class="form-control" cols="30" rows="5"><?php echo $row['description'];?></textarea>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <label for="specification" class="col-sm-2 col-form-label">Product Specification</label>
                                                <div class="col-sm-10">
                                                      <!-- <input type="text" class="form-control" id="description" name="description"> -->
                                                      <textarea name="specification" id="specification" class="form-control" cols="30" rows="5"><?php echo $row['specification'];?></textarea>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10">
                                                      <input type="number" value="<?php echo $row['price'];?>" class="form-control" id="price" name="price">
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <label for="buildtype" class="col-sm-2 col-form-label">Build Type</label>
                                                <div class="col-sm-10">
                                                      <input type="text" value="<?php echo $row['build_type'];?>" class="form-control" id="buildtype" name="buildtype">
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <label for="formFile1" class="col-sm-2 col-form-label">Product Image 1</label>
                                                <div class="col-sm-10">
                                                      <input class="form-control" value="<?php echo $row['image1'];?>" name="image1" type="file" accept="image/png, image/jpg, image/jpeg" id="formFile1">
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <label for="formFile2" class="col-sm-2 col-form-label">Product Image 2</label>
                                                <div class="col-sm-10">
                                                      <input class="form-control" value="<?php echo $row['image2'];?>" name="image2" type="file" accept="image/png, image/jpg, image/jpeg" id="formFile2">
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <label for="formFile3" class="col-sm-2 col-form-label">Product Image 3</label>
                                                <div class="col-sm-10">
                                                      <input class="form-control" value="<?php echo $row['image3'];?>" name="image3" type="file" accept="image/png, image/jpg, image/jpeg" id="image3">
                                                </div>
                                          </div>
                                          <br>
                                          <center>
                                                <button type="submit" class="btn btn-primary">Save Edit</button>
                                          </center>
                                    </form>
                                    <?php
                                        }
                                    ?>
                              </div>
                        </div>
            
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
      </div>

      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="lib/chart/chart.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/tempusdominus/js/moment.min.js"></script>
      <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
      <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

      <!-- Template Javascript -->
      <script src="js/main.js"></script>
</body>
</html>