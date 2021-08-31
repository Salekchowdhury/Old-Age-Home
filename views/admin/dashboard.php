<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php if (isset($_SESSION['email'])) {

    $adminData=$dataManipulation->show_admin_personal_data($_SESSION['email']);

    $type=$adminData->type;

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
            <div class="sidebar-wrapper" style="background-color: #3b1d82">
                <ul class="nav">
                    <?php
                    if($type=='admin'){
                      ?>
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="nc-icon nc-bank"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <li>
                        <a href="profile.php">
                            <i  style="color: white" class="nc-icon nc-single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>

                    <?php
                    if($type=='admin'){
                        ?>
                        <li>
                            <a href="manage_account.php">
                                <i  style="color: white" class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>Manage Account</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($type=='admin'){
                        ?>
                        <li>
                            <a href="manage_post.php">
                                <i  style="color: white" class="nav-icon fas fa-mail-bulk"></i>
                                <p>Manage Post</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($type=='admin'){
                        ?>
                        <li>
                            <a href="user_request.php">
                                <i  style="color: white" class="nav-icon fas fa-recycle"></i>
                                <p>Users Request</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>


                    <?php
                    if($type=='admin'){
                        ?>
                        <li>
                            <a href="trash.php">
                                <i  style="color: white" class="nav-icon fas fa-trash"></i>
                                <p>Trash</p>
                            </a>
                        </li>

                        <?php
                    }
                    ?>

                    <li>
                        <a href="add_member.php">
                            <i  style="color: white" class="fas fa-user-friends"></i>
                            <p>Add Member</p>
                        </a>
                    </li>

                    <li>
                        <a href="donated_details.php">
                            <i  style="color: white" class="nc-icon nc-money-coins"></i>
                            <p>Donated Details</p>
                        </a>
                    </li>
                    <li>
                        <a href="old_age_home.php">
                            <i  style="color: white" class="fas fa-home"></i>
                            <p>Old Age Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="Chat.php">
                            <i  style="color: white" class="fas fa-envelope-square"></i>
                            <p>Message</p>
                        </a>
                    </li>


                    <?php
                    if($type=='admin'){
                        ?>
                        <li>
                            <a href="add_admin.php">
                                <i  style="color: white" class="fas fa-user-cog"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

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
                        <a class="navbar-brand">Dashboard</a>
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
            <div class="content">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fas fa-male fa-1x"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php
                                        //$Member = $dataManipulation->viewMemberDetails();
                                        //$count_member = 0;
                                        ?>
                                        <div class="numbers">
                                            <p class="card-category">Profile</p>
                                            <p class="card-title">

                                            <p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="profile.php"><i class="fa fa-eye"></i>My Profile</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInLeft" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-single-02 text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php

                                        $status = $dataManipulation->nurseDoctorActive();
                                        $nurse =$status->total;
                                        $status = $dataManipulation->userActive();
                                        $user =$status->total;

                                        $count = 0;
                                        ?>
                                        <div class="numbers">
                                            <p class="card-category">Manage Account</p>
                                            <span style="font-size: 20px;color: #11a726">Nurse: <?php echo $nurse?></span>
                                            <span style="padding-left: 10px;font-size: 20px;color: #2515a7">user: <?php echo $user?></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="manage_account.php"> <i class="fa fa-eye"></i> Manage Account</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fas fa-mail-bulk"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php

                                        $status = $dataManipulation->countTotalPost();
                                        $TotalPost =$status->total;


                                        $count = 0;
                                        ?>

                                        <div class="numbers">
                                            <p class="card-category">Manage Post</p>
                                            <span style="font-size: 20px;color: #11a726">Post: <?php echo $TotalPost?></span>


                                            <p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="manage_post.php"><i class="fa fa-eye"></i>Manage Post</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fab fa-creative-commons-by"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php
                                        $status = $dataManipulation->nurseDoctorRequest();
                                        $nurse =$status->total;
                                        $status = $dataManipulation->userRequest();
                                        $user =$status->total;
                                        ?>
                                        <div class="numbers">
                                            <p class="card-category">User Request</p>
                                            <span style="font-size: 20px;color: #11a726">Nurse: <?php echo $nurse?></span>
                                            <span style="padding-left: 10px;font-size: 20px;color: #2515a7">user: <?php echo $user?></span>

                                            <p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="user_request.php"><i class="fa fa-eye"></i>User Request</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php
                                        $status = $dataManipulation->trashnurseDoctor();
                                        $nurse =$status->total;
                                        $status = $dataManipulation->trashUser();
                                        $user =$status->total;
                                        ?>
                                        <div class="numbers">
                                            <p class="card-category">Trash</p>
                                            <span style="font-size: 20px;color: #11a726">Nurse: <?php echo $nurse?></span>
                                            <span style="padding-left: 10px;font-size: 20px;color: #2515a7">user: <?php echo $user?></span>

                                            <p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="trash.php"><i class="fa fa-eye"></i>Trash</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php
                                        $data = $dataManipulation->totalMember();
                                        $member =$data->total;

                                        ?>
                                        <div class="numbers">
                                            <p class="card-category">Add Member</p>
                                            <span style="font-size: 20px;color: #11a726">Member: <?php echo $member?></span>

                                            <p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="add_member.php"><i class="fa fa-eye"></i>Add Member</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInUp" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-money-coins text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php
                                        $money = $dataManipulation->donatedDetails();
                                        $money_count = 0;
                                        ?>
                                        <div class="numbers">
                                            <p class="card-category">Donated Details</p>
                                            <p class="card-title"><?php
                                                if ($money){
                                                    foreach ($money as $list){
                                                        $money_count = $money_count + $list->amount;
                                                    }
                                                    echo $money_count." BDT";
                                                }
                                                else{
                                                    echo "0 BDT";
                                                }
                                                ?>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="donated_details.php"> <i class="fa fa-eye"></i>Donated Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fas fa-home"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">

                                        <?php
                                        $data = $dataManipulation->totalOldAgeHome();
                                        $member =$data->total;
                                        ?>

                                        <div class="numbers">
                                            <p class="card-category">Old Age Home</p>
                                            <span style="font-size: 20px;color: #11a726">Old Age Home: <?php echo $member?></span>

                                            <p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="old_age_home.php"><i class="fa fa-eye"></i>Old Age Home</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="2s">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="fas fa-user-cog"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <?php
                                        $data = $dataManipulation->totalAdmin();
                                        $member =$data->total;
                                        ?>
                                        <div class="numbers">
                                            <p class="card-category">Add Admin</p>
                                            <span style="font-size: 20px;color: #11a726">Admin: <?php echo $member?></span>

                                            <p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <a href="add_admin.php"><i class="fa fa-eye"></i>Add Admin</a>

                                </div>
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
    <script>
        new WOW().init();
    </script>
    <?php
}
else{
    Utility::redirect("../login.php");
}
?>
