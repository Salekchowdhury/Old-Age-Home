<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['id'])){
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
                    <li>
                        <a href="profile.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a class="navbar-brand">Member List</a>
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
                        <div class="card card-plain">
                            <?php
                            if (isset($_SESSION["dataInsert"])){
                                echo $_SESSION["dataInsert"];
                                unset($_SESSION["dataInsert"]);
                            }
                            ?>
                            <div class="card-header">
                                <h4 class="card-title">Member List</h4>
                            </div>

                            <div class="card-body">
                                <div class="scroll-content" style="height: 300px;">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: #5ea79c">
                                        <th>
                                            SL
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Age
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                          <th>
                                            Check Date
                                        </th>


                                        <th>
                                            Gurdian Number
                                        </th>
                                        <th>
                                            Gurdian Name
                                        </th>
                                        <th>
                                            Health Condition
                                        </th>
                                        <th class="text-right">
                                            Action
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $dataManipulation = new DataManipulation();
                                        $data = $dataManipulation->viewMemberDetails();

                                        $count = 1;
                                        if ($data){
                                            foreach ($data as $list){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $count?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->fullname?>
                                                    </td>
                                                      <td>
                                                          <?php echo $list->age?>
                                                    </td>

                                                    <td>
                                                        <?php echo $list->address?>
                                                    </td>

                                                      <td>
                                                        <?php echo $list->date?>
                                                    </td>


                                                    <td>
                                                        <?php echo $list->gurdianpnumber?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->gurdianname?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->health?>
                                                    </td>
                                                    <td class="justify-content-end d-flex btn-group">
                                                        <a class="btn btn-primary" href="view_membe_profiler.php?view_member_profile=<?php echo $list->member_id?>" title="View Profile"><i class="fa fa-eye"></i></a>

                                                    </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
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

