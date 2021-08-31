<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation =new DataManipulation();
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
                        <li class="active">
                            <a href="user_request.php">
                                <i   class="nav-icon fas fa-recycle"></i>
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
                        <a class="navbar-brand"> Request List</a>
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
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                 <?php
                                 if (isset($_SESSION["updatetMsg"])){
                                     echo $_SESSION["updatetMsg"];
                                     unset($_SESSION["updatetMsg"]);
                                 }
                                 ?>

                                    <h3>Nurse/Doctor Table</h3>
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead style="background-color: #3b1d82;color: white">
                                        <th>
                                            SL
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Phone
                                        </th>

                                        <th>
                                            Gmail
                                        </th>

                                        <th>
                                            Address
                                        </th>
                                        <th>
                                            City
                                        </th>

                                        <th class="text-center">
                                            Action
                                        </th>
                                        </thead>
                                        <?php
                                        $data =$dataManipulation->showNotApprovAcountNurseDoctor();
                                        $s=1;
                                        foreach ($data as $list){
                                            ?>
                                            <tbody>

                                            <tr>
                                                <td>
                                                    <?php echo $s?>
                                                </td>
                                                <td>
                                                    <?php echo $list->fullname?>
                                                </td>

                                                <td>
                                                    <?php echo $list->pnumber?>
                                                </td>

                                                <td>
                                                    <?php echo $list->email?>
                                                </td>
                                                <td>
                                                    <?php echo $list->address?>
                                                </td>

                                                <td>
                                                    <?php echo $list->city?>
                                                </td>

                                                <td class="text-center">
                                                    <a class="btn bg-success fancy" data-type="iframe" title="Confirm" href="../dataprocess/process.php?approve_nurse_doctor=<?php echo $list->id?>"><i class="far fa-check-circle"></i></a>

                                                </td>
                                            </tr>
                                            </tbody>
                                            <?php
                                            $s++;
                                        }
                                        ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["ApproveMsg"])){
                                        echo $_SESSION["ApproveMsg"];
                                        unset($_SESSION["ApproveMsg"]);
                                    }
                                    ?>

                                    <h3>Users Table</h3>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead style="background-color: #3b1d82; color: white">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        $data =$dataManipulation->showNotApprovAcountUser();
                                        $s=1;
                                        foreach ($data as $list){
                                            ?>
                                            <tbody>

                                            <tr>
                                                <td>
                                                    <?php echo $s?>
                                                </td>
                                                <td>
                                                    <?php echo $list->fullname?>
                                                </td>

                                                <td>
                                                    <?php echo $list->email?>
                                                </td>


                                                <td class="text-center">
                                                    <a class="btn bg-success fancy" data-type="iframe" title="Confirm" href="../dataprocess/process.php?approve_user=<?php echo $list->id?>"><i class="far fa-check-circle"></i></a>

                                                </td>
                                            </tr>
                                            </tbody>
                                            <?php
                                            $s++;
                                        }
                                        ?>

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
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>

