<?php
    session_start();
    if(isset($_SESSION['userid']))
    {
        $con=mysqli_connect("localhost","root","","Craftsea");
        $id=$_GET['product_id'];
        if(isset($_GET['quantity']))
        {
            $quantity=$_GET['quantity'];
        }
        else
        {
            $quantity=1;
        }
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
        $stmt=mysqli_prepare($con,"insert into cart (product_id,image,name,price,quantity,customer_id) values(?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt,"issiii",$id,$image,$name,$price,$quantity,$customerID);
        mysqli_stmt_execute($stmt);
        $stmt=mysqli_prepare($con,"select * from cart where customer_id=?");
        mysqli_stmt_bind_param($stmt,"i",$customerID);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $_SESSION['cart']=mysqli_num_rows($result);
        if(!isset($_GET['location']))
        {
?>
            <script>
                window.location="product-detail.php?product_id="+<?php echo json_encode($id);?>;
            </script>
<?php
        }
        else
        {
?>
            <script>
                window.location="product.php?";
            </script>
<?php 
        }
    }
    else
    {
        ?><script>
            alert("Login To Add Item Into Cart");
            window.location="login.php";
        </script><?php
    }
?>