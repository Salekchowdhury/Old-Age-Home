<?php
if (!isset($_SESSION)){
    session_start();
    $userEmail=$_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Old Age Home Service</title>
    <link rel="stylesheet" href="../contents/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../contents/css/custom_style.css">
    <link rel="stylesheet" href="../contents/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../contents/css/custom.css">

    <link href="../contents/css/fontawesome-free-5.11.1-web/css/all.min.css" rel="stylesheet" />
</head>
<body>
<div class="main ">
    <section class="signup mb-0">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <?php
                    if (isset($_SESSION["notMatchMemberID"])){
                        echo $_SESSION["notMatchMemberID"];
                        unset($_SESSION["notMatchMemberID"]);
                    }
                    ?>
                    <form action="dataprocess/registration_process.php" method="post" class="register-form" id="register-form">
                        <h4 style="color: #00cd5a">please Check Your Email</h4>
                        <h6 style="color: rgba(13,76,54,0.8)">We Have Sent a Code to This ID <strong style="color: #003eff"> (<?php echo $userEmail?>)</strong> </h6>

                        <input type="number" class="form-control" placeholder="Enter Confirmation Code" name="code" class="text_box">
                        <input type="hidden" class="form-control"  name="email" value="<?php echo $userEmail?>">
                        <br>
                        <button type="submit" class="button btn btn-primary" name="confirm">Confirm</button>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-6 btn-group">
                                <a class="btn btn-secondary  btn-group" href="login.php" >Login</a>
                                <a class="btn btn-success  btn-group" href="register.php" >New Register</a>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="../contents/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="../contents/js/jquery-3.2.1.min.js"></script>
<script src="../contents/plugins/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../contents/js/jquery.magnific-popup.min.js"></script>
<script src="../contents/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>
<script src="../contents/js/main_custom.js"></script>
</body>
</html>