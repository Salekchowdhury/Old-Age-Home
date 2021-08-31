<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php if (isset($_SESSION['email'])) {

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
                    <li>
                        <a href="profile.php">
                            <i  style="color: white" class="nc-icon nc-single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="manage_account.php">
                            <i   style="color: white" style="color: white" class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>Manage Account</p>
                        </a>
                    </li>
                     <li>
                        <a href="manage_post.php">
                            <i  style="color: white" class="nav-icon fas fa-mail-bulk"></i>
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
                    <li class="active">
                        <a href="add_admin.php">
                            <i class="fas fa-user-cog"></i>
                            <p>Add Admin</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav style="position: fixed" class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand">All Admin</a>
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

                  if (isset($_SESSION["insertMsg"])){
                      echo $_SESSION["insertMsg"];
                      unset($_SESSION["insertMsg"]);
                  }
                  if (isset($_SESSION["isExistMsg"])){
                      echo $_SESSION["isExistMsg"];
                      unset($_SESSION["isExistMsg"]);
                  }
                ?>
                <br>
                <div class="row ">
                    <div class="col-md-11 wow slideInDown">
                        <div class="card card-plain">


                            <div style="border-radius: 15px; border: 2px solid;    margin-top: -20px; border-color: #003eff; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                                <form class="form-horizontal" action="../dataprocess/process.php" method="post" enctype="multipart/form-data">


                                    <div style="padding: 10px" class="form-group row">
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 90px">Name:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="name" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 100px">Address:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="address" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 90px">Gender:</strong></label>
                                            <div class="col-sm-10">
                                                <select required name="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                            <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 120px">Type:</strong></label>
                                            <div class="col-sm-10">
                                                <select required name="type" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Moderator">Moderator</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 110px">Phone:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="phone" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 120px">Email:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="email" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label pading_right"><strong style="padding-right: 90px">Password:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="password" value="">
                                            </div>
                                        </div>

                                        <div style="padding: 30px;" class="col-1">
                                            <i class="fas fa-camera fa-3x"></i>
                                            <input type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                                        </div>


                                    </div>


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" name="add_admin" >Add Admin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
                <section class="content wow slideInLeft" >
                    <div class="row">

                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                              <?php
                                $lists = $dataManipulation->show_admin_data();
                                $id= 1;
                              ?>

                                    <h3>All Admin</h3>
                                    <?php

                                    if (isset($_SESSION["deleteMsg"])){
                                        echo $_SESSION["deleteMsg"];
                                        unset($_SESSION["deleteMsg"]);
                                    }
                                    if (isset($_SESSION["notDeleteMsg"])){
                                        echo $_SESSION["notDeleteMsg"];
                                        unset($_SESSION["notDeleteMsg"]);
                                    }
                                    ?>
                                    <br>
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr style="color:white;background-color:#344e86;">
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Type</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                         if($lists){
                                             foreach ($lists as $list){
                                                 ?>
                                                 <tr>
                                                     <td><?php echo $id?></td>
                                                     <td><?php echo $list->name?></td>
                                                     <td><?php echo $list->gender?></td>
                                                     <td><?php echo $list->type?></td>
                                                     <td><?php echo $list->phone?></td>
                                                     <td><?php echo $list->email?></td>
                                                     <td><img src="<?php echo $list->image?>" width="80px" height="70px"></td>
                                                     <td>

                                                         <a href="../../views/dataprocess/process.php?delete_admin_id=<?php echo $list->id?>" title="View" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a>

                                                     </td>
                                                 </tr>
                                                 <?php
                                             }
                                             $id++;
                                         }
                                         ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
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
