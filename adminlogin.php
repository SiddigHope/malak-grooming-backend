<?php
include 'assets/conn/dbconnect.php';

session_start();
if (isset($_SESSION['managerSession']) != "") {
header("Location: manager/managerdashboard.php");
}
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

            $res = mysqli_query($con, "SELECT * FROM admin WHERE username= '$username'");

            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
// echo $row['password'];
            if($row != null){
                if ($row['password'] == $password) {
                    $_SESSION['managerSession'] = $row['id'];
                    ?>
                    <script type="text/javascript">
                        alert('تم تسجيل الدخول بنجاح');
                    </script>
                    <?php
                    header("Location: manager/managerdashboard.php");
                }else {
                    ?>
                    <script type="text/javascript">
                        alert("اعد المحاولة من جديد من فضلك ..!");
                    </script>
                    <?php
                }
            }else {
                ?>
                <script type="text/javascript">
                    alert("اعد المحاولة من جديد من فضلك ..!");
                </script>
                <?php
            }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" 
        type="image/png" 
        href="manager/assets/malak.png"/>
        <title>Malak Grooming</title>
        <!-- Bootstrap -->
        <link href="manager/assets/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- <link href="assets/css/style.css" rel="stylesheet"/> -->
        <?php include "assets/css/style.php"; ?>
    </head>
    <body  style="background-color: #fff;">
        <div class="container">
            <!-- start -->
            <div class="login-container">
                    <div id="output"></div>
                    <div style="background-color:#333" class="avatar">
                        <h1 style="margin-top:20px;margin-top: 32px;font-family: initial;color: yellow;" > Malak </h1>
                    </div>
                    <div class="form-box">
                        <form class="form" role="form" method="POST" accept-charset="UTF-8">
                            <input name="username" type="text" placeholder="اسم المستخدم" required>
                            <input name="password" type="password" placeholder="كلمة المرور" required>

                            <button class="btn btn-black btn-block login" style="background-color:yellow" type="submit" name="login">تسجيل دخول</button>
                        </form>
                    </div>
                </div>
            <!-- end -->
        </div>

        <script src="assets/js/jquery.js"></script>

        <!-- js start -->
        
        <!-- js end -->
    </body>
</html>