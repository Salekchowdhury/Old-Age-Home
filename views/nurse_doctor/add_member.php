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
            <div class="sidebar-wrapper" style="background-color: #5ea79c">
                <ul class="nav">
                    <li class="active">
                        <a href="add_member.php">
                            <i class="nc-icon nc-simple-add"></i>
                            <p>Add Member</p>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="view_member_list.php">
                            <i class="nc-icon nc-tile-56"></i>
                            <p>View Member List</p>
                        </a>
                    </li>

                    <li>
                        <a href="serious_condition_member.php">
                            <i class="nc-icon nc-ambulance"></i>
                            <p>Serious Condition</p>
                        </a>
                    </li>
                    <li>
                        <a href="left_member.php">
                            <i class="nc-icon nc-badge"></i>
                            <p>Leave Member</p>
                        </a>
                    </li>
                    <li>
                        <a href="contact_us.php">
                            <i class="nc-icon nc-badge"></i>
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
                        <a class="navbar-brand">Add New Member</a>
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
                if (isset($_SESSION["addMemberExist"])){
                    echo $_SESSION["addMemberExist"];
                    unset($_SESSION["addMemberExist"]);
                }
                if (isset($_SESSION["addMemberExist"])){
                    echo $_SESSION["addMemberExist"];
                    unset($_SESSION["addMemberExist"]);
                }
                if (isset($_SESSION["noMemberMsg"])){
                    echo $_SESSION["noMemberMsg"];
                    unset($_SESSION["noMemberMsg"]);
                }
                ?>
                <br>
                <div class="row">
                    <div class="col-md-9 wow slideInRight" data-wow-duration= "2s">
                        <div class="card card-plain">


                            <div style="border-radius: 15px; border: 2px solid;    margin-top: -20px; border-color: #a71d2a; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                                <form class="form-horizontal" action="../dataprocess/process.php" method="post" enctype="multipart/form-data">

                                    <div style="padding: 10px" class="form-group row">
                                        <div class="col-6">
                                            <label  ><strong  >Name:</strong></label>
                                            <div >
                                                <input type="text" required class="form-control" name="fullname" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Address:</strong></label>
                                            <div >
                                                <input  type="text" required class="form-control" name="address" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Gender:</strong></label>
                                            <div >
                                                <select required name="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Age:</strong></label>
                                            <div >
                                                <input type="number" required class="form-control" name="age" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Health:</strong></label>
                                            <div >
                                                <select required name="health" class="form-control">
                                                    <option value="">Select Condition Type...</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Critical">Critical</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label ><strong >Room No:</strong></label>
                                            <div >
                                                <input type="number" required class="form-control" name="room" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label ><strong  >Seat No:</strong></label>
                                            <div >
                                                <input  type="number" required class="form-control" name="seat" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong>Gurdian Name(if have):</strong></label>
                                            <div >
                                                <input required type="text" class="form-control" name="gurdianname" value="">

                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label  ><strong>Gurdian Number(if have):</strong></label>
                                            <div >
                                                <input  class="form-control" name="gurdianpnumber" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong>Gurdian Email:</strong></label>
                                            <div >
                                                <input required type="email" class="form-control" name="gurdianemail" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong >Date of Joining</strong></label>
                                            <div >
                                                <input required type="date" class="form-control datepicker" name="joindate" placeholder="Joining Date" >

                                            </div>
                                        </div>


                                        <div style="padding: 30px;" class="col-1">
                                            <i class="fas fa-camera fa-3x"></i>
                                            <input required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                                        </div>


                                    </div>


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" name="add_member_by_nurse_doctor" >Add Member</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                    <?php
                    $totalMmber = $dataManipulation->countTotalMember();
                    $total = $totalMmber->total;

                    $totalCriticalCondition = $dataManipulation->totalCriticalCondition();
                    $totalCritical = $totalCriticalCondition->totalCritical;

                    $totalNormalCondition = $dataManipulation->totalNormalCondition();
                    $totalNormal = $totalNormalCondition->totalNormal;


                    ?>
                    <div style="height: 400px; border: 3px solid; padding-top: 15px;  border-radius: 20px; background-color: black; border-color: #28a745; box-shadow: 5px 10px 5px 1px #0c2646;color: rgba(83,220,255,0)" class="col-3 wow slideInLeft" >
                        <h5 style="color: white; padding-top: 5px; font-weight: 600">Total Member:-  <b style="color: rgba(255,255,255,0.84); font-size: 20px"> <?php echo $total?></b></h5>
                        <hr>
                        <h5 style="color:white;font-weight: 600">Normal:-  <b style="color: #13ef2e; font-size: 20px"><?php echo $totalNormal?> </b></h5>
                        <hr>
                        <h5 style="color: white;font-weight: 600">Critical:- <b style="color: rgba(241,46,28,0.94); font-size: 20px"> <?php echo $totalCritical?></b> </h5>
                        <hr>
                        <img src="../../contents/images/logo.PNG" width="150" height="150" style="border-radius: 50%; margin-left: 56px">
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

