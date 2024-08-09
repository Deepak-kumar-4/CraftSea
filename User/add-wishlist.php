<?php
    session_start();
    if(isset($_SESSION['userid']))
    {
        $con=mysqli_connect("localhost","root","","Craftsea");
        $id=$_GET['product_id'];
        $name=NULL;
        $price=NULL;
        $image=NULL;
        $customerID=$_SESSION['userid'];
        $result=mysqli_query($con,"select * from product where product_id='$id'")
        or die("Failed to login".mysql_error());
        while($row = mysqli_fetch_assoc($result))
        {
            $name=$row['name'];
            $price=$row['price'];
            $image=$row['image1'];
        }
        $result=mysqli_query($con,"insert into wishlist (product_id,image,name,price,customer_id) values('$id','$image','$name','$price','$customerID')")
        or die("Failed to login".mysql_error());
        $result=mysqli_query($con,"select * from wishlist where customer_id='$customerID'")
        or die("Failed to login".mysql_error());
        $_SESSION['wishlist']=mysqli_num_rows($result);
?>
        <script>
            window.location="product.php?";
        </script>
<?php 
    }
    else
    {
        ?><script>
            alert("Login To Add Item Into Cart");
            window.location="login.php";
        </script><?php
    }
?>