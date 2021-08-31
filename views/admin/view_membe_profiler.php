<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email'])){
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
                        <a class="navbar-brand">Member Profile</a>
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
                    <div class="col-md-9 wow slideInRight" data-wow-duration= "2s" data-wow-delay = "0.5s">
                        <div class="card card-plain">
                            <?php
                            if(isset($_GET['view_member_profile'])){
                                $id = $_GET['view_member_profile'];
                                $data = $dataManipulation->showMemberProfile($id);
                                if($data->prescription){
                                    $prescription=$data->prescription;
                                }else{
                                    $prescription="";
                                }
                                $date=$data->joindate;
                                $dateArray = explode("-",$date);

                                $dateRevers= array_reverse($dateArray);
                                $dateString = implode("-", $dateRevers);
                            }
                            ?>

                            <div style="border-radius: 15px; border: 2px solid;    margin-top: -20px; border-color: #a71d2a; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                                <form class="form-horizontal" action="../dataprocess/process.php" enctype="multipart/form-data" method="post">
                                    <h4 style="color: #218838">
                                        <marquee>CAN CHANGE THE STATUS OF THE MEMBER</marquee>
                                    </h4>
                                      <?php
                                      if (isset($_SESSION["UpdateMsg"])){
                                          echo $_SESSION["UpdateMsg"];
                                          unset($_SESSION["UpdateMsg"]);
                                      }
                                      if (isset($_SESSION["insertMsg"])){
                                          echo $_SESSION["insertMsg"];
                                          unset($_SESSION["insertMsg"]);
                                      }
                                      ?>
                                    <br>
                                    <div style="padding: 10px" class="form-group row">

                                        <div class="col-6">
                                            <label  <strong  >Name:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="name" value="<?php echo $data->fullname?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Address:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="address" value="<?php echo $data->address?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label ><strong  >Member Id:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="member_id" value="<?php echo $data->member_id?>">
                                                <input type="hidden" class="form-control" name="member_id" value="<?php echo $data->member_id?>">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <label  ><strong  >Gender:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="address" value="<?php echo $data->gender?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label  ><strong  >Age:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="age" value="<?php echo $data->age?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label  ><strong  >Health:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="address" value="<?php echo $data->health?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label  ><strong >Room No:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="room" value="<?php echo $data->room?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label  ><strong  >Seat No:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="seat" value="<?php echo $data->seat?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label  ><strong >Gurdian Name:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="gurdian" value="<?php echo $data->gurdianname?>">

                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <label  ><strong >Gurdian Number:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="gurdian_number" value="<?php echo "0". $data->gurdianpnumber?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label  ><strong >Gurdian Email:</strong></label>
                                            <div >
                                                <input disabled class="form-control" name="gurdian_number" value="<?php echo $data->gurdianemail?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label  ><strong >Date of Joining</strong></label>
                                            <div >
                                                <input disabled type="text" class="form-control datepicker" value="<?php echo $dateString?>" >

                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <br>
                                            <?php
                                            if($data->permit_image){
                                                ?>
                                                <img class="wow bounceIn" data-wow-duration= "2s" data-wow-delay = "0.5s" src="<?php echo $data->permit_image?>" style="width: 140px ; height: 140px; border-radius: 50%;margin-left: 40px">
                                                <?php
                                            }else{
                                                ?>
                                                <div class="col-1">
                                                    <i class="fas fa-camera fa-3x"></i>
                                                    <input required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <textarea disabled class="col-9 m-3" cols="3" name="prescription" rows="8"><?php echo $prescription?></textarea>
                                    </div>

                                    <div class=" row">
                                        <div class="offset-sm-2 col-sm-10 ">
                                            <?php
                                            if($data->health=='Critical'){
                                                ?>
                                                <a href="../dataprocess/process.php?normal_condition=<?php echo $data->member_id?>" class="btn bg-success fancy" data-type="iframe" >Normal</a>

                                                <?php
                                            }else{
                                                ?>
                                                <a href="../dataprocess/process.php?Critical_condition=<?php echo $data->member_id?>" class="btn bg-danger fancy" data-type="iframe" >Critical</a>

                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if($data->permit_image==""){
                                                ?>
                                                <button type="submit" class="btn btn-secondary form-group" name="leave_member" >Leave</button>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                   <div style="height: 400px; border: 3px solid; padding-top: 15px;  border-radius: 20px; border-color: #28a745; box-shadow: 5px 10px 5px 1px #0c2646;color: rgba(83,220,255,0)" class="col-3 " >
                       <img class="wow bounceIn" data-wow-duration= "2s" data-wow-delay = "0.5s" src="<?php echo $data->image?>" style="width: 200px ; height: 200px; border-radius: 50%;margin-left: 40px">
                      <h5 style="color: black; padding-top: 5px; font-weight: 600"><?php echo $data->fullname?></h5>
                       <hr>
                       <?php
                       if($data->health=='Critical'){
                          ?>
                           <h6 style="color: red; padding-top: 5px; font-weight: 600"><?php echo $data->health." Health Condition"?></h6>
                           <?php
                       }else{
                           ?>
                           <h6 style="color: green; padding-top: 5px; font-weight: 600"><?php echo $data->health." Health Condition"?></h6>
                           <?php
                       }
                       if($data->permit_image){
                           ?>
                           <hr>
                           <h6 style="color: black; padding-top: 5px; font-weight: 600">Status:  <strong style="color: red">Leave</strong> </h6>
                           <?php
                       }else{
                           ?>
                           <hr>
                           <h6 style="color: black; padding-top: 5px; font-weight: 600">Status:  <strong style="color: green">Stay</strong> </h6>
                           <?php
                       }
                       ?>


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

