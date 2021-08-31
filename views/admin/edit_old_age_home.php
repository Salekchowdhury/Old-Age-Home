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
    //var_dump($adminData);

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
                        <li class="">
                            <a href="dashboard.php">
                                <i style="color: white" class="nc-icon nc-bank"></i>
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

                    <li class="">
                        <a href="add_member.php">
                            <i   style="color: white" class="fas fa-user-friends"></i>
                            <p>Add Member</p>
                        </a>
                    </li>

                    <li class="active">
                        <a href="donated_details.php">
                            <i  style="color: white" class="nc-icon nc-money-coins"></i>
                            <p>Donated Details</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="old_age_home.php">
                            <i   class="fas fa-home"></i>
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
                        <a class="navbar-brand">Add Old Age Home</a>
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
              <?php
              if(isset($_GET['edit_oag_id'])){
                  $data = $dataManipulation->show_old_age_home($_GET['edit_oag_id']);
              }

              ?>
                <br>
                <div class="row ">
                    <div class="col-md-11 wow slideInRight">
                        <div class="card card-plain">


                            <div style="border-radius: 15px; border: 3px dashed;    margin-top: -20px; border-color: #003eff; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                                <form class="form-horizontal" action="../dataprocess/process.php" method="post" enctype="multipart/form-data">


                                    <div style="padding: 10px" class="form-group row">
                                        <div class="col-6">
                                            <label  ><strong  >Company Name:</strong></label>
                                            <div >
                                                <input  class="form-control" name="name" value="<?php echo $data->name?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Address:</strong></label>
                                            <div >
                                                <input  class="form-control" name="address" value="<?php echo $data->address?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Phone:</strong></label>
                                            <div >
                                                <input  class="form-control" name="phone" value="<?php echo $data->phone?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Author Email:</strong></label>
                                            <div >
                                                <input  class="form-control" name="email" value="<?php echo $data->email?>">
                                                <input type="hidden" class="form-control" name="destinationFile" value="<?php echo $data->image?>">
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $data->id?>">
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div >
                                                <br>
                                                <img class="wow bounceIn" data-wow-duration= "2s" data-wow-delay = "0.5s" src="<?php echo $data->image?>" style="width: 140px ; height: 140px; border-radius: 50%;margin-left: 40px">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div style="padding: 20px;" class="col-1">
                                                <i class="fas fa-camera fa-3x"></i>
                                                <input type="file" name="photo" accept="image/x-png,image/gif,image/jpeg" >

                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success" name="update_old_age_home" >Update</button>
                                                </div>
                                            </div>
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
    <script>
        new WOW().init();
    </script>
    <?php
}
else{
    Utility::redirect("../login.php");
}
?>
