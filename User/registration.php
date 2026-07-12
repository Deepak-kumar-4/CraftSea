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
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    try{
        $stmt = mysqli_prepare($con, "insert into customer (password,name,address,phone_no,email,dob) values(?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "sssiss", $passwordHash, $name, $address, $Mmbile, $email, $dob);
        mysqli_stmt_execute($stmt);
    }catch(Exception $e)
    {
        echo htmlspecialchars($e->getMessage());
    }
    


?>
    <script language="javascript">
        alert("Succesful Registered");
        // document.cookie="email=<?=$email;?>";
        window.location="login.php?";
    </script>