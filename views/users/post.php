<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
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
                <div class="sidebar-wrapper"style="background-color: rgba(4,83,25,0.78)">
                    <ul class="nav">
                        <li>
                            <a href="user_dashboard.php" >
                                <i  style="color: white" class="nc-icon nc-circle-10"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="post.php">
                                <i class="nav-icon fas fa-mail-bulk"></i>
                                <p>Post</p>
                            </a>
                        </li>
                        <li>
                            <a href="manage_post.php">
                                <i  style="color: white" class="fas fa-tasks"></i>
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
                <div class="content">
                    <?php
                    $reg = new Registration();
                    $data = $reg->userEmail($_SESSION['email']);
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="content-header">
                                <form id="FormData" action="../process/data-process.php" method="post" enctype="multipart/form-data">
                                    <input class="user_id" type="hidden" value="<?php echo $data->id ?>" >
                                    <input id="name" class="name" type="hidden" value="<?php echo $data->fullname?>" >

                                    <div>
                                        <div class="form-group col-sm-8" style="margin-left: 158px;">
                                            <!--<label class="form-control-label">Post:-</label>-->
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose File</label>
                                            </div>
                                            <textarea style="resize: none" class="form-control post" name="post" rows="8" cols="20" placeholder="Write Your Post"></textarea>
                                            <div class="form-group " style="margin-top: -32px;">
                                                <input type="button" class="form-control col-sm-12 btn btn-outline-success post-submit"  name="post" value="Post" style="margin-top: 37px;">

                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="ml-5 main-part  row">
                                    <div style="margin-left: 195px" class=" col-md-6 dataShow">

                                    </div>
                                </div>
                            </section>
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
            showData()
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            function tConvert (time) {
                // Check correct time format and split into components
                time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

                if (time.length > 1) { // If time format correct
                    time = time.slice (1);  // Remove full string match value
                    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
                    time[0] = +time[0] % 12 || 12; // Adjust hours
                }
                return time.join (''); // return adjusted time or original string
            }
            function showData() {
                var getData = " ";
                $.ajax({
                    type: "GET",
                    url: "../dataprocess/process.php",
                    data: {
                        getData: getData
                    },
                    success: function(data)
                    {
                        var data = JSON.parse(data);
                        var html = " ";
                        var htmlString = " ";
                        for (var i = 0;  i<data.length;  i++){
                            if (data[i].commentNo == null) {
                                html +="<div class=\"\">\n" +
                                    "<div class=\"card card-widget\">\n" +
                                    "<div class=\"card-header\">\n" +
                                    "<div class=\"user-block\">\n" +
                                    "<span style='font-size: 20px' class=\"username\"><a href=\"#\">" + data[i].name + "</a></span>\n" +
                                    "<p class=\"description\">" +data[i].date + " Time " +  tConvert(data[i].time) +"</p>\n" +
                                    "</div>\n" +
                                    "<div class=\"card-tools\">\n"
                                html +="</div>\n" +
                                    "</div>\n" +
                                    "<div class=\"card-body\">\n" +
                                    "<p>" + data[i].post + "</p>" +
                                    "<img class=\"img-fluid pad\" src='"+ data[i].image +"'>" +
                                    "<span class=\"float-right text-muted\">Comments</span></div>"

                                for (var j = 0; j < data.length; j++) {
                                    if (data[i].id == data[j].commentNo) {
                                        html += "<div style='background: #bababa' class=\"card-footer card-comments\">\n" +
                                            "<div class=\"card-comment\">\n" +
                                            "<div class=\"comment-text\">\n" +
                                            "<span style='font-size: 20px' class=\"username\">\n" + data[j].name + "</span>" +
                                            "<span class=\"text-muted float-right\">" + tConvert(data[j].time) + "</span>\n" +
                                            "<p>" + data[j].post + "</p>"+
                                            "</div>\n" +
                                            "</div>\n" +
                                            "</div>\n"
                                    }
                                }
                                html += "<div class=\"row card-footer\">\n" +
                                    "<a href='' data-id ='"+ data[i].id +"' class=\"telegrambtn text-primary ml-2 img-fluid img-circle img-sm\"><i class=\"fab fa-telegram fa-2x\" ></i></a>\n" +
                                    "<div class=\"ml-2 col-md-11 img-push\">\n" +
                                    "<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Press enter to post comment\">\n" +
                                    "</div>\n" +
                                    "</div>\n" +
                                    "</div>\n" +
                                    "</div>"
                            }
                            $(".dataShow").html(html);
                            $(".telegrambtn").click(function (e) {
                                e.preventDefault();
                                var commentValue = $(this).parent().find('input').val();
                                var commentNo = $(this).attr("data-id");
                                var user_name = $("#name").val();
                                var user_id = $("#user_id").val();
                                if (commentValue.length>0){
                                    $.ajax({
                                        type: "POST",
                                        url: "../dataprocess/process.php",
                                        data: {
                                            commentValue: commentValue,
                                            commentNo: commentNo,
                                            user_name: user_name,
                                            user_id: user_id,
                                        },
                                        success: function(data)
                                        {
                                            showData()
                                        }
                                    });
                                    $(this).parent().find('input').val(" ")

                                }
                            });
                        }
                    }
                });
            }
            $(".post-submit").click(function () {
                var name= $(".name").val()
                var user_id= $(".user_id").val()
                var post= $(".post").val()
                var form_data = new FormData($('#FormData')[0]);
                form_data.append("name",name);
                form_data.append("user_id",user_id);
                var imageFilename = $("#customFile").val().length;
                if(post.length>0 && imageFilename>0){
                    $.ajax({
                        type: "POST",
                        url: "../dataprocess/process.php",
                        data: form_data,
                        processData:false,
                        contentType:false,
                        cache:false,
                        success: function(data)
                        {
                            document.getElementById("FormData").reset();
                            $(".custom-file-label").text('Choose File');
                            showData()
                        }
                    });
                }
            });
        </script>
        <?php
    }
    else {
        Utility::redirect("../login.php");
    }
?>
