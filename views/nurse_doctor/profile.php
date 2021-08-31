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
if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];
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
                    <li>
                        <a href="add_member.php">
                            <i class="nc-icon nc-simple-add"></i>
                            <p>Add Member</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a class="navbar-brand">Leave Member List</a>
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
                if (isset($_SESSION["updatetMsg"])){
                    echo $_SESSION["updatetMsg"];
                    unset($_SESSION["updatetMsg"]);
                }
                ?>
                <br>
                <?php
                $data =$dataManipulation->view_nurse_doctorDetails($id);


                ?>
                <div class="row">
                    <div class="col-md-12 wow slideInRight" data-wow-duration= "2s">
                        <div class="card card-plain">


                            <div style="border-radius: 15px; border: 2px solid;    margin-top: -20px; border-color: #a71d2a; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                                <form class="form-horizontal" action="../dataprocess/process.php" method="post">

                                    <div style="padding: 10px" class="form-group row">
                                        <div class="col-6">
                                            <label  ><strong  >Company Name:</strong></label>
                                            <div >
                                                <input disabled type="text" class="form-control"  value="Old Age Home Service">
                                            </div>
                                        </div> <div class="col-6">
                                            <label  ><strong  >Name:</strong></label>
                                            <div >
                                                <input type="text" required class="form-control" placeholder="Fullname" name="fullname" value="<?php echo $data->fullname?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  ><strong  >Address:</strong></label>
                                            <div >
                                                <input  type="text" required class="form-control" placeholder="Your Address" name="address" value="<?php echo $data->address?>">
                                                <input  type="hidden" class="form-control"  name="id" value="<?php echo $data->id?>">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label  ><strong  >email:</strong></label>
                                            <div >
                                                <input type="email" required class="form-control" placeholder="email" name="email" value="<?php echo $data->email?>">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label ><strong >City:</strong></label>
                                            <div >
                                                <input type="text" required class="form-control" placeholder="City" name="city" value="<?php echo $data->city?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label ><strong >Password:</strong></label>
                                            <div >
                                                <input type="password" required class="form-control" placeholder="Password" name="pass" value="<?php echo $data->pass?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label ><strong >Phone:</strong></label>
                                            <div >
                                                <input type="text" required class="form-control" placeholder="Phone Number" name="pnumber" value="<?php echo $data->pnumber?>">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" name="change_nurse_doctor_profile" >Change Profile</button>
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
        $('.fancy').fancybox({
            toolbar  : false,
            smallBtn : true,



            iframe : {
                css:{
                    height:'90%',
                    width: '80%'

                }
            }
        })
    </script>
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>

