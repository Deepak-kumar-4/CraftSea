<?php
    if(isset($_POST['sign_in']))
    {
        $pass = $_POST["pass"];
        $email = $_POST["user"];
        $userid;

        //connect to database
        $con=mysqli_connect("localhost","root","","Craftsea");

        //Query
        $stmt = mysqli_prepare($con, "select * from customer where email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $passwordMatch = false;
        while($row = mysqli_fetch_assoc($result))
        {
            if(password_verify($pass, $row['password']))
            {
                $userid=$row['customer_id'];
                $_SESSION['username']=$row['name'];
                $passwordMatch = true;
            }
        }
        if($passwordMatch)
        {
        session_start();
        $_SESSION['userid']=$userid;
        $result=mysqli_query($con,"select * from cart where customer_id='$userid'")
        or die("Failed to login".mysql_error());
        $_SESSION['cart']=mysqli_num_rows($result);
        $result=mysqli_query($con,"select * from wishlist where customer_id='$userid'")
        or die("Failed to login".mysql_error());
        $_SESSION['wishlist']=mysqli_num_rows($result);
        // redirect_to("index.php");
        ?>
        <script language="javascript">
            window.alert("Login success");
            // document.cookie="userid=<?=$userid;?>";
            window.location="index.php?";
        </script>
        <?php
        }else
        {
        ?>
        <script language="javascript">
            window.alert("Invalid Username/Password");
            window.location="login.html?";
        </script>
        <?php
        };
    }
?>