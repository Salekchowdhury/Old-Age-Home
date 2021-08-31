<?php
if (!isset($_SESSION)){
    session_start();
    //$userEmail=$_SESSION['email'];
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
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="login-box">
                <div class="login-logo">

                </div>

                <div class="card" style="border-radius: 30px;margin-bottom: 240px;">
                    <?php
                    if(isset($_SESSION['SendMessage'])) {
                        echo($_SESSION['SendMessage']);
                        unset($_SESSION['SendMessage']);
                    }
                    ?>
                    <div class="card-body login-card-body" style="border-radius: 30px;border: 2px solid;">
                        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                        <form action="dataprocess/email.php" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" name="forgotPassword" class="btn btn-primary btn-block">Request new password</button>
                                </div>

                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-6 btn-group">
                                    <a class="btn btn-secondary  btn-group" href="login.php" >Login</a>
                                    <a class="btn btn-success  btn-group" href="register.php" >New Register</a>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>

</div>

<script src="../contents/js/jquery-3.2.1.min.js"></script>
<script src="../contents/plugins/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../contents/js/jquery.magnific-popup.min.js"></script>
<script src="../contents/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>
<script src="../contents/js/main_custom.js"></script>
</body>
</html>