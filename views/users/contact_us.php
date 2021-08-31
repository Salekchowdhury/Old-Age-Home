<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
require_once "../../include/head.php";
?>

<?php

if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $reg = new Registration();
    $data = $reg->userEmail($email);
    ?>

    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a class="simple-text logo-mini">
                    <div class="logo-image-small">
                    </div>
                </a>
                <a style="color: #ce0000;" class="simple-text logo-normal">
                    Old Age Home
                </a>
            </div>

            <div class="sidebar-wrapper " style="background-color: rgba(4,83,25,0.78)">
                <ul class="nav">
                    <li>
                        <a href="user_dashboard.php">
                            <i  style="color: white" class="nc-icon nc-circle-10"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="post.php">
                            <i  style="color: white" class="nav-icon fas fa-mail-bulk"></i>
                            <p>Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="manage_post.php">
                            <i  style="color: white" class="fas fa-tasks"></i>
                            <p>Manage Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="money_send.php">
                            <i  style="color: white" class="nc-icon nc-check-2"></i>
                            <p>Money Send</p>
                        </a>
                    </li>
                    <li>
                        <a href="money_send_details.php">
                            <i  style="color: white" class="nc-icon nc-money-coins"></i>
                            <p>Money Send Details</p>
                        </a>
                    </li>
                    <li>
                        <a href="chat.php">
                            <i  style="color: white" class="fas fa-envelope-square"></i>
                            <p>Message</p>
                        </a>
                    </li>
                    <li >
                        <a href="old_age_home.php">
                            <i  style="color: white" class="fas fa-home"></i>
                            <p>Other Old Age Home</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="contact_us.php">
                            <i class="far fa-id-badge fa-3x"></i>
                            <p>Contact Us</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand">Contact Us</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href='../dataprocess/process.php?logout="buttonHit"'>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div   class="content wow bounceInUp" data-wow-duration= "2s">
                <?php
                if (isset($_SESSION["SendMessage"])){
                    echo $_SESSION["SendMessage"];
                    unset($_SESSION["SendMessage"]);
                }
                ?>
                <br>
                <br>
                <div class="row">

                    <div class="col-5">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                        <span style="color: #344e86; font-size: 25px"> Address:</span>
                        <p style="padding-left: 30px"> 1,4 mi 1672 SABDER ALI ROAD AGRABAD C/A AGRABAD</p>
                        <br>
                        <i class="fas fa-phone fa-2x"></i><span style="color: #344e86; font-size: 25px"> Phone:</span>
                        <p style="padding-left: 30px">+8801843100466</p>
                        <br>
                        <i class="far fa-envelope fa-2x"></i><span style="color: #344e86; font-size: 25px"> Mail:</span>
                        <p style="padding-left: 30px">oldagehomeservice@gmail.com</p>

                    </div>
                    <div class="col-7">
                        <div style="border-radius: 15px; border: 2px solid;    margin-top: -20px; border-color: #a71d2a; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                            <form class="form-horizontal" action="../dataprocess/email.php" method="post">
                                <input class="user_id" name="user_id" type="hidden" value="<?php echo $user_id?>" >

                                <div style="padding: 10px" class="form-group row">
                                    <div class="col-6">
                                        <label   ><strong  >Name:</strong></label>
                                        <div >
                                            <input  required class="form-control" name="name" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  ><strong  >Your Email:</strong></label>
                                        <div >
                                            <input  required class="form-control" name="email" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  ><strong  >Subect:</strong></label>
                                        <div >
                                            <input required class="form-control" name="subject" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  ><strong  >Message:</strong></label>
                                        <div >
                                            <textarea required class="form-control " rows="10" name="mesaage" value=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="send_message_form_user" >Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


            <footer class="footer footer-black p-0 footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
              <span class="copyright">
                Copyright &copy; All rights reserved
                <script>
                  document.write(new Date().getFullYear())
                </script>

              </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php
    require_once "../../include/foot.php";

    ?>
    <script>
        new WOW().init();
    </script>
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>

