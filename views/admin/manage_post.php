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
    ?>
    <?php
    if(isset($_SESSION['TostUpdate'])){
        echo $_SESSION['TostUpdate'];
        unset($_SESSION['TostUpdate']);
    }
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
                    <li >
                        <a href="dashboard.php">
                            <i  style="color: white" class="nc-icon nc-bank"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li >
                        <a href="profile.php">
                            <i  style="color: white" class="nc-icon nc-single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li >
                        <a href="manage_account.php">
                            <i  style="color: white" class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>Manage Account</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="manage_post.php">
                            <i  class="nav-icon fas fa-mail-bulk"></i>
                            <p>Manage Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="user_request.php">
                            <i  style="color: white" class="nav-icon fas fa-recycle"></i>
                            <p>Users Request</p>
                        </a>
                    </li>
                    <li>
                        <a href="trash.php">
                            <i  style="color: white" class="nav-icon fas fa-trash"></i>
                            <p>Trash</p>
                        </a>
                    </li>

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
                    <li>
                        <a href="add_admin.php">
                            <i  style="color: white" class="fas fa-user-cog"></i>
                            <p>Add Admin</p>
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
                        <a class="navbar-brand">Manage Post List</a>
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
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <ul class="timeline">
                                <?php

                                $dbmanipulate = new DataManipulation();
                                $listOfValues = $dbmanipulate->viewAllPostForAdmin();
                                if ($listOfValues){
                                    foreach ($listOfValues as $listOfValues){
                                        ?>
                                        <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                            <div class="timeline-arrow"></div>
                                            <h2 class="h5 mb-0"><?php echo $listOfValues->name?></h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i><?php echo $listOfValues->time?></span>
                                            <p class="text-small mt-2 font-weight-light"><?php echo $listOfValues->post?>.</p>
                                            <img width="680px" height="350px" src="<?php echo $listOfValues->image ?>">

                                            <?php

                                            if ($listOfValues->commentNo == NULL ){
                                                $comment = $dbmanipulate->viewPostComment($listOfValues->id);
                                                foreach ($comment as $comments){
                                                    if($listOfValues->id == $comments->commentNo ) {
                                                        ?>
                                                        <div style="margin-top: 10px;">
                                                            <span style="display:block;text-align: center;">=========Comments========</span>
                                                            <p style="font-size: 20px"><b><?php echo $comments->name; ?></b></p>
                                                            <p class="text-small mt-2 font-weight-light"><?php echo $comments->post; ?></p>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                            <div class="timeline-footer">
                                                <a href="../dataprocess/process.php?managePostDelete=<?php echo $listOfValues->id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                            </div>
                                        </li>

                                        <?php
                                    }
                                }
                                ?>

                            </ul>

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
        $("#toast-container").fadeOut(3000)
    </script>
    <?php
}


