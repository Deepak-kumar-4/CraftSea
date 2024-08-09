<?php
    if(isset($_POST['sign_in']))
    {
        $pass = $_POST["pass"];
        $email = $_POST["user"];
        $userid;

        //connect to database
        $con=mysqli_connect("localhost","root","","Craftsea");
        
        //Query
        $result=mysqli_query($con,"select * from customer where email='$email' and password='$pass'")
        or die("Failed to login".mysql_error());
        while($row = mysqli_fetch_assoc($result))
        {
            $userid=$row['customer_id'];
            $_SESSION['username']=$row['name'];
        }
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0)
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