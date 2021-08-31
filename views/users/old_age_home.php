<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
 Use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email'])){
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
            <div class="sidebar-wrapper" style="background-color: rgba(4,83,25,0.78)">
                <ul class="nav">
                    <li >
                        <a  href="user_dashboard.php">
                            <i style="color: white" class="nc-icon nc-circle-10"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="post.php">
                            <i style="color: white" class="nav-icon fas fa-mail-bulk"></i>
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
                    <li class="active">
                        <a href="old_age_home.php">
                            <i class="fas fa-home"></i>
                            <p>Other Old Age Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="contact_us.php">
                            <i  style="color: white"  class="far fa-id-badge fa-3x"></i>
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
                        <a class="navbar-brand">Other Old Age Home</a>
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
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <?php
                                if (isset($_SESSION["ApproveMsg"])){
                                    echo $_SESSION["ApproveMsg"];
                                    unset($_SESSION["ApproveMsg"]);
                                }
                                ?>

                                <h3>ALL OLD AGE HOME</h3>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead style="background-color: rgba(4,83,25,0.78)">
                                    <tr>

                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Company Name
                                        </th>
                                        <th>
                                            Phone Number
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th style="text-align: center">
                                            Email
                                        </th>

                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $data = $dataManipulation->show_all_old_age_home();

                                    $s =1;
                                    if ($data){

                                        foreach ($data as $list){

                                            ?>
                                            <tr>

                                                <td>
                                                    <img src="<?php echo $list->image?>" height="140" width="140" style="border: 2px solid darkred; border-radius: 50%">
                                                </td>
                                                <td>
                                                    <?php echo $list->name?>
                                                </td>
                                                <td>
                                                    <?php echo $list->phone?>
                                                </td>
                                                <td>
                                                    <?php echo $list->address?>
                                                </td>
                                                <td>
                                                    <?php echo $list->email?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="mail_to_old_age_home.php?mail_id=<?php echo $list->email ?>" class="btn bg-success fancy" data-type="iframe" ><i class="fas fa-envelope"></i> Email</a>
                                                </td>

                                            </tr>
                                            <?php

                                        }
                                    }
                                    ?>


                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

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
    <?php
}


