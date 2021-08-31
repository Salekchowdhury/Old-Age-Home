<?php
    include_once "../../vendor/autoload.php";
    use App\DataManipulation\DataManipulation;
    use App\Utility\Utility;
    $dataManipulation = new DataManipulation();
    if (!isset($_SESSION)){
    session_start();
    }
    require_once "../../include/head.php";
?>
<?php
    if (isset($_SESSION["email"]))
    {
      $email = $_SESSION["email"];
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

                        <li class="active">
                            <a href="profile.php">
                                <i   class="nc-icon nc-single-02"></i>
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

                        <li class="">
                            <a href="donated_details.php">
                                <i   style="color: white" class="nc-icon nc-money-coins"></i>
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
                            <a class="navbar-brand">Profile</a>
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

                        <div class="col-md-12">
                            <div class="card card-user">
                                <?php
                                $data = $dataManipulation->show_admin_personal_data($email);
                                ?>
                                <div class="card-header">
                                    <h5 class="card-title">Edit Profile</h5>
                                </div>
                                <div class="card-body">
                                    <div  class="form-group row">
                                        <div class="col-5" style="border-right: 3px dashed; border-color: #00c012;">

                                               <div class="text-center">
                                                   <img class="profile-user-img img-fluid img-circle" src="<?php echo $data->image ?>" alt="User profile picture" style=" height: 200px; width: 200px  ;border: 1px solid rgba(15,80,36,0.41); border-color: #a71d2a;border-radius: 50% ">

                                                   <br>


                                               </div>
                                            <h5><?php echo $data->name?></h5>
                                            <hr>
                                            <h5><?php echo $data->email?></h5>
                                            <hr>
                                            <h5><?php echo "0". $data->phone?></h5>
                                            <hr>
                                        </div>
                                        <div class="col-7">
                                            <?php

                                            if (isset($_SESSION["updateMsg"])){
                                                echo $_SESSION["updateMsg"];
                                                unset($_SESSION["updateMsg"]);
                                            }
                                            ?>
                                            <br>
                                        <form class="form-horizontal" action="../dataprocess/process.php" method="post">

                                                    <div class="col-7">
                                                        <label  ><strong >Company Name:</strong></label>
                                                        <div >
                                                            <input disabled class="form-control" name="name" value="Old Age Home Service ">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label ><strong >Name:</strong></label>
                                                        <div>
                                                            <input  class="form-control" name="name" value="<?php echo $data->name?>">
                                                            <input type="hidden"  name="id" value="<?php echo $data->id?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label  ><strong  >Address:</strong></label>
                                                        <div >
                                                            <input  class="form-control" name="address" value="<?php echo $data->address?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label  ><strong  >Gender:</strong></label>
                                                        <div >
                                                            <input  class="form-control" name="gender" value="<?php echo $data->gender?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label  ><strong  >Phone:</strong></label>
                                                        <div >
                                                            <input  class="form-control" name="phone" value="<?php echo "0". $data->phone?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label  ><strong  >Email:</strong></label>
                                                        <div >
                                                            <input  class="form-control" name="email" value="<?php echo $data->email?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <label  ><strong >Password:</strong></label>
                                                        <div >
                                                            <input type="password" class="form-control" name="password" value="<?php echo $data->pass?>">
                                                        </div>
                                                    </div>
                                            <div class="col-7">
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary" name="Change_profile" >Change Profile</button>
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
    else{
        Utility::redirect("../login.php");
    }
?>
