<?php
session_start();
// date_default_timezone_get('Asia/Kolkata');
$con=mysqli_connect("localhost","root","","Craftsea");
$custumer_id=$_SESSION['userid'];
$order_date=date('y-m-d');
$name=$_GET['name'];
$email=$_GET['mail'];
$mobile=$_GET['Mobile'];
$address=$_GET['Address'];
$country=$_GET['Country'];
$state=$_GET['State'];
$city=$_GET['City']; 
$zipcode=$_GET['zipCode'];
$result=mysqli_query($con,"select * from cart where customer_id='$custumer_id'");

while($row = mysqli_fetch_assoc($result))
{
    $image=$row['image'];
    $product_name=$row['name'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $insert=mysqli_query($con,"insert into orders (customer_id,image,product_name,price,quantity,order_date,address,name,email,mobile,country,state,city,zipcode) values('$custumer_id','$image','$product_name','$price','$quantity','$order_date','$address','$name','$email','$mobile','$country','$state','$city','$zipcode')")
    or die("Failed to login".mysql_error());
}
$delete=mysqli_query($con,"delete from cart where customer_id='$custumer_id'")
or die("Failed to login".mysql_error());
$result=mysqli_query($con,"select * from cart where customer_id='$custumer_id'");
$_SESSION['cart']=mysqli_num_rows($result);
?>
<script>
    alert("Your Order Is placed Successfuly")
    window.location="index.php";
</script>