<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php
    if (isset($_SESSION['email']))
    {
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
                <div class="sidebar-wrapper" style="background-color: rgba(4,83,25,0.78)">
                    <ul class="nav">
                        <li>
                            <a href="user_dashboard.php" >
                                <i  style="color: white" class="nc-icon nc-circle-10"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="post.php">
                                <i  style="color: white" class="nav-icon fas fa-mail-bulk"></i>
                                <p>Post</p>
                            </a>
                        </li>
                        <li>
                            <a href="manage_post.php">
                                <i  style="color: white" class="fas fa-tasks"></i>
                                <p>Manage Post</p>
                            </a>
                        </li>
                        <li >
                            <a href="money_send.php">
                                <i  style="color: white" class="nc-icon nc-check-2"></i>
                                <p>Money Send</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="money_send_details.php">
                                <i class="nc-icon nc-money-coins"></i>
                                <p>Money Send Details</p>
                            </a>
                        </li>
                        <li>
                            <a href="chat.php">
                                <i  style="color: white" class="fas fa-envelope-square"></i>
                                <p>Message</p>
                            </a>
                        </li>
                        <li>
                            <a href="old_age_home.php">
                                <i  style="color: white" class="fas fa-home"></i>
                                <p>Other Old Age Home</p>
                            </a>
                        </li>
                        <li>
                            <a href="contact_us.php">
                                <i  style="color: white" class="far fa-id-badge fa-3x"></i>
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
                            <a class="navbar-brand"></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item btn-rotate dropdown">

                                    <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nc-icon nc-bell-55"></i>
                                        <span class="badge badge-danger"></span>
                                        <p>
                                            <span class="d-lg-none d-md-block">Some Actions</span>
                                        </p>
                                    </a>

                                </li>
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

                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["updateMsg"])){
                                        echo $_SESSION["updateMsg"];
                                        unset($_SESSION["updateMsg"]);
                                    }
                                    if (isset($_SESSION["deleteMsg"])){
                                        echo $_SESSION["deleteMsg"];
                                        unset($_SESSION["deleteMsg"]);
                                    }

                                    ?>
                                    <br>
                                    <h4 class="card-title">Transaction Details</h4>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead style="background-color: rgba(4,83,25,0.78)">
                                        <tr>
                                            <th>
                                                Serial No
                                            </th>
                                            <th>
                                                Reference Id
                                            </th>

                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Phone Number
                                            </th>
                                            <th>
                                                Transaction Number
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $dataManipulation = new DataManipulation();
                                        $reg = new \App\Registration\Registration();
                                        $data = $dataManipulation->userEmail($_SESSION['email']);
                                        $datas = $reg->userEmail($_SESSION['email']);
                                        $s =1;
                                        if ($data){

                                            foreach ($data as $list){

                                                $date=$list->date;
                                                $dateArray = explode("-",$date);

                                                $dateRevers= array_reverse($dateArray);
                                                $dateString = implode("-", $dateRevers);
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $s?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->reference?>
                                                    </td>

                                                    <td>
                                                        <?php echo $datas->fullname?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->pnumber?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->transaction?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dateString?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->amount?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="../dataprocess/process.php?delete_money_details=<?php echo $list->id ?>" class="btn bg-danger fancy" data-type="iframe" ><i class="fa fa-trash"></i></a>
                                                        <a href="edit_money_send.php?eidit_id=<?php echo $list->id ?>" class="btn bg-primary fancy" data-type="iframe"><i class="fa fa-edit"></i></a>
                                                    </td>

                                                </tr>
                                                <?php
                                                $s++;
                                            }
                                        }
                                        ?>


                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>


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

