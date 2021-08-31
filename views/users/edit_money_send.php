<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;

use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php
    if (isset($_SESSION['email']))
    {
        $userEmail = $_SESSION['email'];
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
                        <li class="active">
                            <a href="money_send.php">
                                <i  class="nc-icon nc-check-2"></i>
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
                        <li>
                            <a href="old_age_home.php">
                                <i  style="color: white" class="fas fa-home"></i>
                                <p>Other Old Age Home</p>
                            </a>
                        </li>
                        <li>
                            <a href="contact_us.php">
                                <i  style="color: white" class="far fa-id-badge fa-3x"></i>
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
                            <a class="navbar-brand"></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item btn-rotate dropdown">

                                    <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nc-icon nc-bell-55"></i>
                                        <span class="badge badge-danger"></span>
                                        <p>
                                            <span class="d-lg-none d-md-block">Some Actions</span>
                                        </p>
                                    </a>

                                </li>
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
                <div class="content">
                    <?php
                    if(isset($_GET['eidit_id'])){
                        $id = $_GET['eidit_id'];
                        $dataManipulation = new DataManipulation();
                        $data = $dataManipulation->edit_send_money($_GET['eidit_id']);
                        $date=$data->date;
                        $dateArray = explode("-",$date);

                        $dateRevers= array_reverse($dateArray);
                        $dateString = implode("-", $dateRevers);
                    }

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-user">
                                <div class="card-header">
                                    <h5 class="card-title">Send Money Details</h5>
                                </div>
                                <div class="card-body">
                                    <form action="../dataprocess/process.php" autocomplete="off" method="post">
                                        <div class="row">

                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label>Add Amount</label>
                                                    <input type="number" required name="amount" class="form-control" value="<?php echo $data->amount?>">
                                                    <input type="hidden" required name="id" class="form-control" value="<?php echo $id?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label>Phone Number<b>(bkash)</b></label>
                                                    <input type="number" required class="form-control" name="pnumber" value="<?php echo $data->pnumber?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="alert alert-success alert-dismissible fade show text-black-50">Transaction ID (Send Money through Bkash to the following number, and give the transaction ID.)</label>
                                                    <h2 class="mb-0">Bkash Agent Number <strong>(+880 1843100466)</strong></h2>

                                                    <label>Transaction ID </label>
                                                    <input type="text" class="form-control" required name="transaction" value="<?php echo $data->transaction?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text"  required class="form-control datepicker" name="date" value="<?php echo $dateString?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="update mr-auto ml-3">
                                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
        <?php
    }
    else {
        Utility::redirect("../login.php");
    }
?>
