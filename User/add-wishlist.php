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
        $stmt=mysqli_prepare($con,"select * from product where product_id=?");
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result))
        {
            $name=$row['name'];
            $price=$row['price'];
            $image=$row['image1'];
        }
        $stmt=mysqli_prepare($con,"insert into wishlist (product_id,image,name,price,customer_id) values(?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt,"issii",$id,$image,$name,$price,$customerID);
        mysqli_stmt_execute($stmt);
        $stmt=mysqli_prepare($con,"select * from wishlist where customer_id=?");
        mysqli_stmt_bind_param($stmt,"i",$customerID);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
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