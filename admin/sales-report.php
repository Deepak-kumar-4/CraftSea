<?php
//connect to database
$con=mysqli_connect("localhost","root","","Craftsea");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
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
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <div class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i
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
                              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
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
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
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
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Craftsman</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <!-- <a href="profile.html" class="dropdown-item">My Profile</a> -->
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <?php
                        $total_sales=0;
                        $todays_sales=0;
                        $total_revenu=0;
                        $todays_revenu=0;
                        $result=mysqli_query($con,"SELECT * FROM orders");
                        while($row = mysqli_fetch_assoc($result))
                            {
                                $total_revenu+=$row['price']*$row['quantity']+49;
                                $total_sales+=($row['price']*25/100)*$row['quantity'];
                                ?><script>//alert("<?php echo date('d-m-y',strtotime(date('y-m-d').'+10 days'));?>");</script><?php
                                if(strtotime(date('y-m-d').'+1 days')==strtotime($row['order_date']))
                                {
                                    $todays_revenu+=$row['price']*$row['quantity']+49;
                                    $todays_sales+=($row['price']*25/100)*$row['quantity'];
                                }
                            }
                    ?>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today's <br> Profit</p>
                                <h6 class="mb-0">₹<?php echo $todays_sales;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total<br> Profit</p>
                                <h6 class="mb-0">₹<?php echo $total_sales;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today's Revenue</p>
                                <h6 class="mb-0">₹<?php echo $todays_revenu;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">₹<?php echo $total_revenu;?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">PanIndia Sales</h6>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Profit & Revenue</h6>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Sales</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
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
                                                        $getdata=mysqli_query($con,"SELECT * FROM orders order by order_date desc limit 5");
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
                                                </tbody>
                                          </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <!-- <a href="">Show All</a> -->
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox" checked>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><del>Short task goes here...</del></span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
    <script>
        (function ($) {
            "use strict";

            // Spinner
            var spinner = function () {
                setTimeout(function () {
                    if ($('#spinner').length > 0) {
                        $('#spinner').removeClass('show');
                    }
                }, 1);
            };
            spinner();
            
            
            // Back to top button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 300) {
                    $('.back-to-top').fadeIn('slow');
                } else {
                    $('.back-to-top').fadeOut('slow');
                }
            });
            $('.back-to-top').click(function () {
                $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
                return false;
            });


            // Sidebar Toggler
            $('.sidebar-toggler').click(function () {
                $('.sidebar, .content').toggleClass("open");
                return false;
            });


            // Progress Bar
            $('.pg-bar').waypoint(function () {
                $('.progress .progress-bar').each(function () {
                    $(this).css("width", $(this).attr("aria-valuenow") + '%');
                });
            }, {offset: '80%'});


            // Calender
            $('#calender').datetimepicker({
                inline: true,
                format: 'L'
            });


            // Testimonials carousel
            $(".testimonial-carousel").owlCarousel({
                autoplay: true,
                smartSpeed: 1000,
                items: 1,
                dots: true,
                loop: true,
                nav : false
            });

            <?php
                $kjan=0; $kfeb=0; $kmar=0; $kapr=0; $kmay=0; $kjun=0; $kjul=0; $kaug=0; $ksep=0; $koct=0; $knov=0; $kdec=0;
                $tjan=0; $tfeb=0; $tmar=0; $tapr=0; $tmay=0; $tjun=0; $tjul=0; $taug=0; $tsep=0; $toct=0; $tnov=0; $tdec=0;
                $mjan=0; $mfeb=0; $mmar=0; $mapr=0; $mmay=0; $mjun=0; $mjul=0; $maug=0; $msep=0; $moct=0; $mnov=0; $mdec=0;
                $result=mysqli_query($con,"SELECT * FROM orders");
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if(date('m',strtotime($row['order_date']))==1){
                            if($row['state']=="Karnataka")
                                $kjan+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tjan+=1;
                            else
                                $mjan+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==2){
                            if($row['state']=="Karnataka")
                                $kfeb+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tfeb+=1;
                            else
                                $mfeb+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==3){
                            if($row['state']=="Karnataka")
                                $kmar+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tmar+=1;
                            else
                                $mmar+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==4){
                            if($row['state']=="Karnataka")
                                $kapr+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tapr+=1;
                            else
                                $mapr+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==5){
                            if($row['state']=="Karnataka")
                                $kmay+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tmay+=1;
                            else
                                $mmay+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==6){
                            if($row['state']=="Karnataka")
                                $kjun+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tjun+=1;
                            else
                                $mjun+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==7){
                            if($row['state']=="Karnataka")
                                $kjul+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tjul+=1;
                            else
                                $mjul+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==8){
                            if($row['state']=="Karnataka")
                                $kaug+=1;
                            else if($row['state']=="Tamil Nadu")
                                $taug+=1;
                            else
                                $maug+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==9){
                            if($row['state']=="Karnataka")
                                $ksep+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tsep+=1;
                            else
                                $msep+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==10){
                            if($row['state']=="Karnataka")
                                $koct+=1;
                            else if($row['state']=="Tamil Nadu")
                                $toct+=1;
                            else
                                $moct+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==11){
                            if($row['state']=="Karnataka")
                                $knov+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tnov+=1;
                            else
                                $mnov+=1;
                        }
                        else if(date('m',strtotime($row['order_date']))==12){
                            if($row['state']=="Karnataka")
                                $kdec+=1;
                            else if($row['state']=="Tamil Nadu")
                                $tdec+=1;
                            else
                                $mdec+=1;
                        }
                    }
            ?>
            // PanIndia Sales Chart
            var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
            var myChart1 = new Chart(ctx1, {
                type: "bar",
                data: {
                    labels: [ "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG"],
                    datasets: [{
                            label: "Karnataka",
                            // data: [15, 30, 55, 65, 60, 80, 95],
                            data: [<?php echo $kjan.",".$kfeb.",".$kapr.",".$kmay.",".$kjun.",".$kjul.",".$kaug.",".$ksep.",".$koct.",".$knov.",".$kdec;?>],
                            backgroundColor: "rgba(255, 111, 97, .7)"
                        },
                        {
                            label: "Tamil Nadu",
                            // data: [8, 35, 40, 60, 70, 55, 75],
                            data: [<?php echo $tjan.",".$tfeb.",".$tapr.",".$tmay.",".$tjun.",".$tjul.",".$taug.",".$tsep.",".$toct.",".$tnov.",".$tdec;?>],
                            backgroundColor: "rgba(255, 111, 97, .5)"
                        },
                        {
                            label: "Maharashtra",
                            // data: [12, 25, 45, 55, 65, 70, 60],
                            data: [<?php echo $mjan.",".$mfeb.",".$mapr.",".$mmay.",".$mjun.",".$mjul.",".$maug.",".$msep.",".$moct.",".$mnov.",".$mdec;?>],
                            backgroundColor: "rgba(255, 111, 97, .3)"
                        }
                    ]
                    },
                options: {
                    responsive: true
                }
            });

            <?php
                $sjan=0; $sfeb=0; $smar=0; $sapr=0; $smay=0; $sjun=0; $sjul=0; $saug=0; $ssep=0; $soct=0; $snov=0; $sdec=0;
                $rjan=0; $rfeb=0; $rmar=0; $rapr=0; $rmay=0; $rjun=0; $rjul=0; $raug=0; $rsep=0; $roct=0; $rnov=0; $rdec=0;
                $result=mysqli_query($con,"SELECT * FROM orders");
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if(date('m',strtotime($row['order_date']))==1){
                            $sjan+=$row['price']*$row['quantity'];
                            $rjan+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==2){
                            $sfeb+=$row['price']*$row['quantity'];
                            $rfeb+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==3){
                            $smar+=$row['price']*$row['quantity'];
                            $rmar+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==4){
                            $sapr+=$row['price']*$row['quantity'];
                            $rapr+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==5){
                            $smay+=$row['price']*$row['quantity'];
                            $rmay+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==6){
                            $sjun+=$row['price']*$row['quantity'];
                            $rjun+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==7){
                            $sjul+=$row['price']*$row['quantity'];
                            $rjul+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==8){
                            $saug+=$row['price']*$row['quantity'];
                            $raug+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==9){
                            $ssep+=$row['price']*$row['quantity'];
                            $rsep+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==10){
                            $soct+=$row['price']*$row['quantity'];
                            $roct+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==11){
                            $snov+=$row['price']*$row['quantity'];
                            $rnov+=($row['price']*25/100)*$row['quantity'];
                        }
                        else if(date('m',strtotime($row['order_date']))==12){
                            $sdec+=$row['price']*$row['quantity'];
                            $rdec+=($row['price']*25/100)*$row['quantity'];
                        }
                            
                    }
            ?>
            // Salse & Revenue Chart
            var ctx2 = $("#salse-revenue").get(0).getContext("2d");
            var myChart2 = new Chart(ctx2, {
                type: "line",
                data: {
                    labels: [ "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG"],
                    datasets: [{
                            label: "Profit",
                            // data: [15, 30, 55, 45, 70, 65, 85],
                            data: [<?php echo $sjan.",".$sfeb.",".$sapr.",".$smay.",".$sjun.",".$sjul.",".$saug.",".$ssep.",".$soct.",".$snov.",".$sdec;?>],
                            backgroundColor: "rgba(255, 111, 97, .5)",
                            fill: true
                        },
                        {
                            label: "Revenue",
                            // data: [99, 135, 170, 130, 190, 180, 270],
                            data: [<?php echo $rjan.",".$rfeb.",".$rapr.",".$rmay.",".$rjun.",".$rjul.",".$raug.",".$rsep.",".$roct.",".$rnov.",".$rdec;?>],
                            backgroundColor: "rgba(255, 111, 97, .3)",
                            fill: true
                        }
                    ]
                    },
                options: {
                    responsive: true
                }
            });
            


            // Single Line Chart
            var ctx3 = $("#line-chart").get(0).getContext("2d");
            var myChart3 = new Chart(ctx3, {
                type: "line",
                data: {
                    labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
                    datasets: [{
                        label: "Salse",
                        fill: false,
                        backgroundColor: "rgba(255, 111, 97, .3)",
                        data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
                    }]
                },
                options: {
                    responsive: true
                }
            });


            // Single Bar Chart
            var ctx4 = $("#bar-chart").get(0).getContext("2d");
            var myChart4 = new Chart(ctx4, {
                type: "bar",
                data: {
                    labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                    datasets: [{
                        backgroundColor: [
                            "rgba(255, 111, 97, .7)",
                            "rgba(255, 111, 97, .6)",
                            "rgba(255, 111, 97, .5)",
                            "rgba(255, 111, 97, .4)",
                            "rgba(255, 111, 97, .3)"
                        ],
                        data: [55, 49, 44, 24, 15]
                    }]
                },
                options: {
                    responsive: true
                }
            });


            // Pie Chart
            var ctx5 = $("#pie-chart").get(0).getContext("2d");
            var myChart5 = new Chart(ctx5, {
                type: "pie",
                data: {
                    labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                    datasets: [{
                        backgroundColor: [
                            "rgba(255, 111, 97, .7)",
                            "rgba(255, 111, 97, .6)",
                            "rgba(255, 111, 97, .5)",
                            "rgba(255, 111, 97, .4)",
                            "rgba(255, 111, 97, .3)"
                        ],
                        data: [55, 49, 44, 24, 15]
                    }]
                },
                options: {
                    responsive: true
                }
            });


            // Doughnut Chart
            var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
            var myChart6 = new Chart(ctx6, {
                type: "doughnut",
                data: {
                    labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                    datasets: [{
                        backgroundColor: [
                            "rgba(255, 111, 97, .7)",
                            "rgba(255, 111, 97, .6)",
                            "rgba(255, 111, 97, .5)",
                            "rgba(255, 111, 97, .4)",
                            "rgba(255, 111, 97, .3)"
                        ],
                        data: [55, 49, 44, 24, 15]
                    }]
                },
                options: {
                    responsive: true
                }
            });

            
        })(jQuery);
    </script>
</body>
</html>