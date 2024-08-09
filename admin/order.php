<?php
$con=mysqli_connect("localhost","root","","Craftsea");
if(isset($_GET['orderid']))
{
      $id=$_GET['orderid'];
      $status=$_GET['status'];
      $update=mysqli_query($con,"UPDATE orders SET status='$status' WHERE order_id='$id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>Craftsea ADMIN - Order Status</title>
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
                                          <a href="sales-report.php" class="dropdown-item"><i class="fa fa-chart-line me-2"></i>&nbsp;Sales Reports</a>
                                    </div>
                              </div>
                              <a href="regusers.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Regd
                                    Users</a>
                              <a href="subscribers.php" class="nav-item nav-link"><i
                                          class="fa fa-keyboard me-2"></i>Subscribers</a>
                              <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                                class="fa fa-laptop me-2"></i>Products</a>
                                    <div class="dropdown-menu bg-transparent border-0">
                                          <a href="productdetails.php" class="dropdown-item">&nbsp;Product Details</a>
                                          <a href="addproducts.php" class="dropdown-item">&nbsp;Add Products</a>
                                    </div>
                              </div>
                              <div class="nav-item dropdown">
                                    <a href="order.php" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown"><i
                                                class="far fa-file-alt me-2"></i>Orders</a>
                                    <div class="dropdown-menu bg-transparent border-0">
                                          <a href="order.php" class="dropdown-item">&nbsp;Order Status</a>
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
                        <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
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
                                          <a href="loginadmin.php" class="dropdown-item">Log Out</a>
                                    </div>
                              </div>
                        </div>
                  </nav>
                  <!-- Navbar End -->


                  <!-- Table Start -->
                  <div class="container-fluid pt-4 px-4">
                        <h2 style="color:#FF6F61  ;">
                              <center>Craftsea - Order Statistics</center>
                        </h2>
                        <br>
                        <div class="row g-4">
                              <div class="col-sm-12 col-xl-12">
                                    <div class="bg-light rounded h-100 p-4">
                                          <h4 class="mb-4">
                                                <center>Order Details</center>
                                          </h4>
                                          <table class="table table-bordered">
                                                <thead>
                                                      <tr>
                                                            <th scope="col">S.NO</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Action</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $getdata=mysqli_query($con,"SELECT * FROM orders order by order_date desc");
                                                        $j=0;
                                                        while($row = mysqli_fetch_assoc($getdata))
                                                        {
                                                            $j++;
                                                    ?>
                                                      <tr>
                                                            <th scope="row"><?php echo $j;?></th>
                                                            <td><img src="../<?php echo $row['image'];?>" style="width: 80px;"></td>
                                                            <td><?php echo $row['product_name'];?></td>
                                                            <td><?php echo $row['order_date'];?></td>
                                                            <td><?php echo $row['price'];?></td>
                                                            <!-- <td>Order will be delivered by ...</td> -->
                                                            <td><?php echo $row['address']." ".$row['state']." ".$row['city']." ".$row['zipcode'];?></td>
                                                            <?php if($row['status']!="Order Cancelled")
                                                            {
                                                            ?>
                                                            <td>
                                                                  <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" id="order_status<?php echo $j;?>">
                                                                        <!-- <option selected>Order Status</option> -->
                                                                        <option value="Order Confirmed">Order Confirmed</option>
                                                                        <option value="Order Cancelled">Order Cancelled</option>
                                                                        <option value="Order Picked Up">Order Picked Up</option>
                                                                        <option value="Out for Delivery">Out for Delivery</option>
                                                                        <option value="Order Delivered">Order Delivered</option>
                                                                  </select>
                                                                  <script>
                                                                        document.querySelector("#order_status<?php echo $j;?>").value="<?php echo $row['status'];?>";
                                                                  </script>
                                                            </td>
                                                            <td align="center"><button class="btn btn-primary" onclick="update(<?php echo $row['order_id'];?>,<?php echo $j;?>)">Update</button></td>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                                  echo "<td><del>Order Cancelled</del></td><td></td>";
                                                            }
                                                            ?>
                                                      </tr>
                                                      <?php
                                                        }
                                                      ?>
                                                      <!-- <tr>
                                                            <th scope="row">2</th>
                                                            <td>Floral Traces-Oxidised Ring</td>
                                                            <td>2002-01-07</td>
                                                            <td>599</td>
                                                            <td>
                                                                  <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                                                        <option selected>Order Status</option>
                                                                        <option value="1">Order Confirmed</option>
                                                                        <option value="2">Order Cancelled</option>
                                                                        <option value="3">Order Picked Up</option>
                                                                        <option value="4">Out for Delivery</option>
                                                                        <option value="5">Order Delivered</option>
                                                                  </select>
                                                            </td>
                                                            <td></td>
                                                            <td>Bangalore</td>
                                                      </tr>
                                                      <tr>
                                                            <th scope="row">3</th>
                                                            <td>Floral Traces-Oxidised Ring</td>
                                                            <td>2002-01-07</td>
                                                            <td>599</td>
                                                            <td>
                                                                  <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                                                        <option selected>Order Status</option>
                                                                        <option value="1">Order Confirmed</option>
                                                                        <option value="2">Order Cancelled</option>
                                                                        <option value="3">Order Picked Up</option>
                                                                        <option value="4">Out for Delivery</option>
                                                                        <option value="5">Order Delivered</option>
                                                                  </select>
                                                            </td>
                                                            <td></td>
                                                            <td>Chennai</td>
                                                      </tr> -->
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- Table End -->
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
      <script>
            function update(id,no)
            {
                  status="order_status"+no;
                  window.location="order.php?orderid="+id+"&status="+document.querySelector("#"+status).value;
            }
            
      </script>
</body>
</html>