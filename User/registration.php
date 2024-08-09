<?php
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $Mmbile = $_POST["Mmbile"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    //connect to database
    $con=mysqli_connect("localhost","root","","Craftsea");

    //Query
    try{
        $result=mysqli_query($con,"insert into customer (password,name,address,phone_no,email,dob) values('$password','$name','$address','$Mmbile','$email','$dob')");
    }catch(Exception $e)
    {
        echo $e;
    }
    


?>
    <script language="javascript">
        alert("Succesful Registered");
        // document.cookie="email=<?=$email;?>";
        window.location="login.php?";
    </script>