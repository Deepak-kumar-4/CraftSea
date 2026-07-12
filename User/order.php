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
$stmt=mysqli_prepare($con,"select * from cart where customer_id=?");
mysqli_stmt_bind_param($stmt,"i",$custumer_id);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);

while($row = mysqli_fetch_assoc($result))
{
    $image=$row['image'];
    $product_name=$row['name'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $insertStmt=mysqli_prepare($con,"insert into orders (customer_id,image,product_name,price,quantity,order_date,address,name,email,mobile,country,state,city,zipcode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($insertStmt,"issiissssisssi",$custumer_id,$image,$product_name,$price,$quantity,$order_date,$address,$name,$email,$mobile,$country,$state,$city,$zipcode);
    mysqli_stmt_execute($insertStmt);
}
$deleteStmt=mysqli_prepare($con,"delete from cart where customer_id=?");
mysqli_stmt_bind_param($deleteStmt,"i",$custumer_id);
mysqli_stmt_execute($deleteStmt);
$stmt=mysqli_prepare($con,"select * from cart where customer_id=?");
mysqli_stmt_bind_param($stmt,"i",$custumer_id);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$_SESSION['cart']=mysqli_num_rows($result);
?>
<script>
    alert("Your Order Is placed Successfuly")
    window.location="index.php";
</script>