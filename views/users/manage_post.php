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
                        <a href="user_dashboard.php">
                            <i style="color: white"  class="nc-icon nc-circle-10"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="post.php">
                            <i style="color: white"  class="nav-icon fas fa-mail-bulk"></i>
                            <p>Post</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="manage_post.php">
                            <i class="fas fa-tasks"></i>
                            <p>Manage Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="money_send.php">
                            <i  style="color: white" class="nc-icon nc-check-2"></i>
                            <p>Money Send</p>
                        </a>
                    </li>
                    <li>
                        <a href="money_send_details.php">
                            <i  style="color: white" class="nc-icon nc-money-coins"></i>
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
                        <a class="navbar-brand">Manage Post</a>
                    </div>
                    <?php
                        if(isset($_SESSION['TostUpdate'])){
                        echo $_SESSION['TostUpdate'];
                        unset($_SESSION['TostUpdate']);
                        }
                    ?>
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
                            $reg = new Registration();
                            $dbmanipulate = new DataManipulation();
                            $data = $reg->userEmail($_SESSION['email']);
                            $user_id = $data->id;
                            $listOfValues = $dbmanipulate->viewPostByUserId($user_id);
                            if ($listOfValues){
                                foreach ($listOfValues as $listOfValues){
                            ?>

                                <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                    <div class="timeline-arrow"></div>
                                    <h2 class="h5 mb-0"><?php echo $listOfValues->date?></h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i><?php echo $listOfValues->time?></span>
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
                                        <a data-id ="<?php echo $listOfValues->id; ?>" class="btn btn-primary btn-sm editPost"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt"></i> Edit</a>
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
           <form action="../dataprocess/process.php" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div style="min-height: 250px" class="modal-body">
                                <textarea name="updatePostDataSection" class="updatePostDataSection" style="resize: none; width: 100%;height: 240px"></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="user_no_from" class="user_no_from">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn-save-changes" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
        $("#toast-container").fadeOut(3000);

        $(".editPost").click(function () {
            var value = $(this).attr('data-id');
            var postDataCollect = " ";
            $.ajax({
                type: "POST",
                url: "../dataprocess/process.php",
                data: {
                    value: value,
                    postDataCollect :postDataCollect
                },
                success: function(data)
                {

                    var data = JSON.parse(data)
                    $(".updatePostDataSection").val(data.post)
                    $(".user_no_from").val(data.id)

                }
            });
        })
    </script>
    <?php
}


