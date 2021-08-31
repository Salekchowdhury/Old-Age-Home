<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
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
    ?>
    <style>
        body{
            margin-top:20px;
            background:#eee;
        }
        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        .box.box-primary {
            border-top-color: #3c8dbc;
        }
        .box.box-info {
            border-top-color: #00c0ef;
        }
        .box.box-danger {
            border-top-color: #dd4b39;
        }
        .box.box-warning {
            border-top-color: #f39c12;
        }
        .box.box-success {
            border-top-color: #00a65a;
        }
        .box.box-default {
            border-top-color: #d2d6de;
        }
        .box.collapsed-box .box-body, .box.collapsed-box .box-footer {
            display: none;
        }
        .box .nav-stacked>li {
            border-bottom: 1px solid #f4f4f4;
            margin: 0;
        }
        .box .nav-stacked>li:last-of-type {
            border-bottom: none;
        }
        .box.height-control .box-body {
            max-height: 300px;
            overflow: auto;
        }
        .box .border-right {
            border-right: 1px solid #f4f4f4;
        }
        .box .border-left {
            border-left: 1px solid #f4f4f4;
        }
        .box.box-solid {
            border-top: 0;
        }
        .box.box-solid>.box-header .btn.btn-default {
            background: transparent;
        }
        .box.box-solid>.box-header .btn:hover, .box.box-solid>.box-header a:hover {
            background: rgba(0, 0, 0, 0.1);
        }
        .box.box-solid.box-default {
            border: 1px solid #d2d6de;
        }
        .box.box-solid.box-default>.box-header {
            color: #444;
            background: #d2d6de;
            background-color: #d2d6de;
        }
        .box.box-solid.box-default>.box-header a, .box.box-solid.box-default>.box-header .btn {
            color: #444;
        }
        .box.box-solid.box-primary {
            border: 1px solid #3c8dbc;
        }
        .box.box-solid.box-primary>.box-header {
            color: #fff;
            background: #3c8dbc;
            background-color: #3c8dbc;
        }
        .box.box-solid.box-primary>.box-header a, .box.box-solid.box-primary>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-info {
            border: 1px solid #00c0ef;
        }
        .box.box-solid.box-info>.box-header {
            color: #fff;
            background: #00c0ef;
            background-color: #00c0ef;
        }
        .box.box-solid.box-info>.box-header a, .box.box-solid.box-info>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-danger {
            border: 1px solid #dd4b39;
        }
        .box.box-solid.box-danger>.box-header {
            color: #fff;
            background: #dd4b39;
            background-color: #dd4b39;
        }
        .box.box-solid.box-danger>.box-header a, .box.box-solid.box-danger>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-warning {
            border: 1px solid #f39c12;
        }
        .box.box-solid.box-warning>.box-header {
            color: #fff;
            background: #f39c12;
            background-color: #f39c12;
        }
        .box.box-solid.box-warning>.box-header a, .box.box-solid.box-warning>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-success {
            border: 1px solid #00a65a;
        }
        .box.box-solid.box-success>.box-header {
            color: #fff;
            background: #00a65a;
            background-color: #00a65a;
        }
        .box.box-solid.box-success>.box-header a, .box.box-solid.box-success>.box-header .btn {
            color: #fff;
        }
        .box.box-solid>.box-header>.box-tools .btn {
            border: 0;
            box-shadow: none;
        }
        .box.box-solid[class*='bg']>.box-header {
            color: #fff;
        }
        .box .box-group>.box {
            margin-bottom: 5px;
        }
        .box .knob-label {
            text-align: center;
            color: #333;
            font-weight: 100;
            font-size: 12px;
            margin-bottom: 0.3em;
        }
        .box>.overlay, .overlay-wrapper>.overlay, .box>.loading-img, .overlay-wrapper>.loading-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%}
        .box .overlay, .overlay-wrapper .overlay {
            z-index: 50;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 3px;
        }
        .box .overlay>.fa, .overlay-wrapper .overlay>.fa {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -15px;
            margin-top: -15px;
            color: #000;
            font-size: 30px;
        }
        .box .overlay.dark, .overlay-wrapper .overlay.dark {
            background: rgba(0, 0, 0, 0.5);
        }
        .box-header:before, .box-body:before, .box-footer:before, .box-header:after, .box-body:after, .box-footer:after {
            content: " ";
            display: table;
        }
        .box-header:after, .box-body:after, .box-footer:after {
            clear: both;
        }
        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
        }
        .box-header.with-border {
            border-bottom: 1px solid #f4f4f4;
        }
        .collapsed-box .box-header.with-border {
            border-bottom: none;
        }
        .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {
            display: inline-block;
            font-size: 18px;
            margin: 0;
            line-height: 1;
        }
        .box-header>.fa, .box-header>.glyphicon, .box-header>.ion {
            margin-right: 5px;
        }
        .box-header>.box-tools {
            position: absolute;
            right: 10px;
            top: -1px;
        }
        .box-header>.box-tools [data-toggle="tooltip"] {
            position: relative;
        }
        .box-header>.box-tools.pull-right .dropdown-menu {
            right: 0;
            left: auto;
        }
        .btn-box-tool {
            padding: 5px;
            font-size: 12px;
            background: transparent;
            color: #97a0b3;
        }
        .open .btn-box-tool, .btn-box-tool:hover {
            color: #606c84;
        }
        .btn-box-tool.btn:active {
            box-shadow: none;
        }
        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
        }
        .no-header .box-body {
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }
        .box-body>.table {
            margin-bottom: 0;
        }
        .box-body .fc {
            margin-top: 5px;
        }
        .box-body .full-width-chart {
            margin: -19px;
        }
        .box-body.no-padding .full-width-chart {
            margin: -9px;
        }
        .box-body .box-pane {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 3px;
        }
        .box-body .box-pane-right {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 0;
        }
        .box-footer {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-top: 1px solid #f4f4f4;
            padding: 10px;
            background-color: #fff;
        }
        .direct-chat .box-body {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            position: relative;
            overflow-x: hidden;
            padding: 0;
        }
        .direct-chat.chat-pane-open .direct-chat-contacts {
            -webkit-transform: translate(0,  0);
            -ms-transform: translate(0,  0);
            -o-transform: translate(0,  0);
            transform: translate(0,  0);
        }
        .direct-chat-messages {
            -webkit-transform: translate(0,  0);
            -ms-transform: translate(0,  0);
            -o-transform: translate(0,  0);
            transform: translate(0,  0);
            padding: 10px;
            height: 250px;
            overflow: auto;
        }
        .direct-chat-msg, .direct-chat-text {
            display: block;
        }
        .direct-chat-msg {
            margin-bottom: 10px;
        }
        .direct-chat-msg:before, .direct-chat-msg:after {
            content: " ";
            display: table;
        }
        .direct-chat-msg:after {
            clear: both;
        }
        .direct-chat-messages, .direct-chat-contacts {
            -webkit-transition: -webkit-transform .5s ease-in-out;
            -moz-transition: -moz-transform .5s ease-in-out;
            -o-transition: -o-transform .5s ease-in-out;
            transition: transform .5s ease-in-out;
        }
        .direct-chat-text {
            border-radius: 5px;
            position: relative;
            padding: 5px 10px;
            background: #d2d6de;
            border: 1px solid #d2d6de;
            margin: 5px 0 0 50px;
            color: #444;
        }
        .direct-chat-text:after, .direct-chat-text:before {
            position: absolute;
            right: 100%;
            top: 15px;
            border: solid transparent;
            border-right-color: #d2d6de;
            content: ' ';
            height: 0;
            width: 0;
            pointer-events: none;
        }
        .direct-chat-text:after {
            border-width: 5px;
            margin-top: -5px;
        }
        .direct-chat-text:before {
            border-width: 6px;
            margin-top: -6px;
        }
        .right .direct-chat-text {
            margin-right: 50px;
            margin-left: 0;
        }
        .right .direct-chat-text:after, .right .direct-chat-text:before {
            right: auto;
            left: 100%;
            border-right-color: transparent;
            border-left-color: #d2d6de;
        }
        .direct-chat-img {
            border-radius: 50%;
            float: left;
            width: 40px;
            height: 40px;
        }
        .right .direct-chat-img {
            float: right;
        }
        .direct-chat-info {
            display: block;
            margin-bottom: 2px;
            font-size: 12px;
        }
        .direct-chat-name {
            font-weight: 600;
        }
        .direct-chat-timestamp {
            color: #999;
        }
        .direct-chat-contacts-open .direct-chat-contacts {
            -webkit-transform: translate(0,  0);
            -ms-transform: translate(0,  0);
            -o-transform: translate(0,  0);
            transform: translate(0,  0);
        }
        .direct-chat-contacts {
            -webkit-transform: translate(101%,  0);
            -ms-transform: translate(101%,  0);
            -o-transform: translate(101%,  0);
            transform: translate(101%,  0);
            position: absolute;
            top: 0;
            bottom: 0;
            height: 250px;
            width: 100%;
            background: #222d32;
            color: #fff;
            overflow: auto;
        }
        .contacts-list>li {
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            padding: 10px;
            margin: 0;
        }
        .contacts-list>li:before, .contacts-list>li:after {
            content: " ";
            display: table;
        }
        .contacts-list>li:after {
            clear: both;
        }
        .contacts-list>li:last-of-type {
            border-bottom: none;
        }
        .contacts-list-img {
            border-radius: 50%;
            width: 40px;
            float: left;
        }
        .contacts-list-info {
            margin-left: 45px;
            color: #fff;
        }
        .contacts-list-name, .contacts-list-status {
            display: block;
        }
        .contacts-list-name {
            font-weight: 600;
        }
        .contacts-list-status {
            font-size: 12px;
        }
        .contacts-list-date {
            color: #aaa;
            font-weight: normal;
        }
        .contacts-list-msg {
            color: #999;
        }
        .direct-chat-danger .right>.direct-chat-text {
            background: #dd4b39;
            border-color: #dd4b39;
            color: #fff;
        }
        .direct-chat-danger .right>.direct-chat-text:after, .direct-chat-danger .right>.direct-chat-text:before {
            border-left-color: #dd4b39;
        }
        .direct-chat-primary .right>.direct-chat-text {
            background: #3c8dbc;
            border-color: #3c8dbc;
            color: #fff;
        }
        .direct-chat-primary .right>.direct-chat-text:after, .direct-chat-primary .right>.direct-chat-text:before {
            border-left-color: #3c8dbc;
        }
        .direct-chat-warning .right>.direct-chat-text {
            background: #f39c12;
            border-color: #f39c12;
            color: #fff;
        }
        .direct-chat-warning .right>.direct-chat-text:after, .direct-chat-warning .right>.direct-chat-text:before {
            border-left-color: #f39c12;
        }
        .direct-chat-info .right>.direct-chat-text {
            background: #00c0ef;
            border-color: #00c0ef;
            color: #fff;
        }
        .direct-chat-info .right>.direct-chat-text:after, .direct-chat-info .right>.direct-chat-text:before {
            border-left-color: #00c0ef;
        }
        .direct-chat-success .right>.direct-chat-text {
            background: #00a65a;
            border-color: #00a65a;
            color: #fff;
        }
        .direct-chat-success .right>.direct-chat-text:after, .direct-chat-success .right>.direct-chat-text:before {
            border-left-color: #00a65a;
        }
    </style>
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
                    <li class="active">
                        <a href="Chat.php">
                            <i  class="fas fa-envelope-square"></i>
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
                        <a class="navbar-brand">Chat</a>
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
                $reg = new Registration();
                $user_details = $reg->userAdminEmail($_SESSION['email']);
                $user_id = $user_details->id;
                $user_name = $user_details->name;
                ?>
                <input type="hidden" class="user_id" value="<?php echo $user_id?>">
                <input type="hidden" class="user_name" value="<?php echo $user_name?>">
                <input type="hidden" class="sellers_name">
                <input type="hidden"  class="seller_id">
                <div class="card-body">
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Position</th>

                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody class="attrTable">
                        <?php
                        $list =  $reg->usersAll();
                        $count = 1;
                        if ($list){
                            foreach ($list as $lists){
                                ?>
                                <tr>
                                    <td>0<?php echo $count++ ?></td>
                                    <td class="attrName"><?php echo $lists->fullname ?><span class="message-show-on-alert badge-danger badge"></span></td>
                                    <td><?php echo $lists->type ?></td>
                                    <td>
                                        <a data-id = "<?php echo $lists->id?>" href="#" class="attrValue show-chat-box-click btn btn-info"><i class="fas fa-user-edit"></i> Chat</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <tbody>
                    </table>
                </div>
            </div>

            <div  style="display: none; position: absolute; width: 35%; bottom: 2%;right: 5%; z-index: 9999999" class="show-chat-box">
                <div class="row bootstrap snippets bootdeys">
                    <div class="">
                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Chat</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool btn-close-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body ">
                                <div style="height: 400px;width: 400px" class="direct-chat-messages chatlogs">
                                </div>
                            </div>
                            <div class="box-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input style="border-right:1px solid #bebebe;height: 40px;margin-top: 9px" type="text" name="message" placeholder="Type Message ..." class="form-control chatMessageSend">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-success chatSendBtn">Send</button>
                                        </span>
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

        setInterval(function () {
            var ary = [];
            var sellers_id = $(".user_id").val();
            $(function () {
                $('.attrTable tr').each(function (a, b) {
                    /*var name = $('.attrName', b).text();*/
                    var value = $('.attrValue', b).attr('data-id');
                    ary.push(value)
                });
                /*console.log(JSON.stringify(ary));*/
                $.ajax({
                    url: "../dataprocess/process.php",
                    type:'GET',
                    data:{user_type:ary,sellers_id:sellers_id},
                    success:function (result) {
                        var datas = JSON.parse(result);

                        htmlstring = "";
                        var j = 0;
                        for (var f = 0; f<ary.length; f++) {
                            for (var i = 0; i < datas.length; i++) {
                                if ((datas[i].message == "unseen") && (datas[i].user_id == ary[f]) ) {
                                    console.log(datas)

                                    $('.attrTable tr').each(function (a, b) {
                                        var name = $('.attrName', b).text();
                                        /*var value = $('.attrValue', b).attr('data-id');*/
                                        if($(".attrValue",b).attr('data-id') == datas[i].user_id){
                                            console.log(datas[i].user_id)
                                            j=j+1;
                                            htmlstring = $(".attrValue",b).attr('data-id');
                                            $('.attrName .message-show-on-alert',b).text(j);
                                        }
                                    });
                                }
                            }
                            j=0;
                        }
                    }
                });
            });
        },800);
        $(".btn-close-tool").click(function () {
            $(".show-chat-box").css("display","none");
            location.reload();
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
        $(".show-chat-box-click").click(function () {
            var users_name = $(".user_name").val();
            var users_id = $(".user_id").val();
            var sellers_id = $(this).attr("data-id");
            var sellerDataCollectViaId = "";
            var sellers_name = $(this).parent().parent().find('td').eq('1').text();
            $(".seller_id").val(sellers_id);
            $(".sellers_name").val(sellers_name);
            setInterval(function () {
                $.ajax({
                    type: "POST",
                    url: "../dataprocess/process.php",
                    data: {
                        sellerSDataCollectViaId :sellerDataCollectViaId,
                        users_id :users_id,
                        sellers_id :sellers_id
                    },
                    success: function(data)
                    {
                        console.log(data)
                        var data = JSON.parse(data);
                        var htmlstring = "";
                        for(var i =0; i<data.length;i++){
                            if((data[i].message_from) !=null){
                                htmlstring +="<div class=\"direct-chat-msg\">\n" +
                                    "                        <div class=\"direct-chat-info clearfix\">\n" +
                                    "                            <span class=\"direct-chat-name pull-left\">" + data[i].user_name + "</span>\n" +
                                    "                            <span class=\"direct-chat-timestamp pull-right\">" + tConvert(data[i].time) + "</span>\n" +
                                    "                        </div>\n" +
                                    "                        <img class=\"direct-chat-img\"  src=\"https://bootdey.com/img/Content/user_2.jpg\"  alt=\"Message User Image\">\n" +
                                    "                        <div class=\"direct-chat-text\">\n" + data[i].message_from +
                                    "                        </div>\n" +
                                    "                    </div>"
                            }
                            if((data[i].message_to) !=null){
                                htmlstring += "<div class=\"direct-chat-msg right\">\n" +
                                    "                        <div class=\"direct-chat-info clearfix\">\n" +
                                    "                            <span class=\"direct-chat-name pull-right\">"+ data[i].admin_name + "</span>\n" +
                                    "                            <span class=\"direct-chat-timestamp pull-left\">"+tConvert(data[i].time) + "</span>\n" +
                                    "                        </div>\n" +
                                    "                        <img class=\"direct-chat-img\"  src=\"https://bootdey.com/img/Content/user_1.jpg\"  alt=\"Message User Image\">\n" +
                                    "                        <div class=\"direct-chat-text\">\n" + data[i].message_to +
                                    "                        </div>\n" +
                                    "                    </div>"
                            }
                        }
                        $('.chatlogs').html(htmlstring);
                    }
                });
            },1000);

            $(".btn-tool").click(function () {
                sellers_id = null;
                $(".seller_id").val("")
            });
            $(".show-chat-box").css("display","block")
        });

        $(".chatSendBtn").click(function () {
            var users_name = $(".user_name").val();
            var users_id = $(".user_id").val();
            var sellers_id = $(".seller_id").val();
            var sellers_name = $(".sellers_name").val();
            var chat_message = $(".chatMessageSend").val();
            var htmlstring = " ";
            var sellerDataCollectViaId = " ";
            if(chat_message.length>0){
                $.ajax({
                    type: "POST",
                    url: "../dataprocess/process.php",
                    data: {
                        buyers_names :users_name,
                        buyers_ids :users_id,
                        sellers_ids :sellers_id,
                        sellers_names :sellers_name,
                        chat_messages :chat_message,
                        sellerActive :htmlstring
                    },
                    success: function(data)
                    {
                        $(".chatMessageSend").val("")
                        $.ajax({
                            type: "POST",
                            url: "../dataprocess/process.php",
                            data: {
                                sellerSDataCollectViaId :sellerDataCollectViaId,
                                users_id :users_id,
                                sellers_id :sellers_id
                            },
                            success: function(data)
                            {
                                console.log(data)
                                var data = JSON.parse(data);
                                var htmlstring = "";
                                for(var i =0; i<data.length;i++){
                                    if((data[i].message_from) !=null){
                                        htmlstring +="<div class=\"direct-chat-msg\">\n" +
                                            "                        <div class=\"direct-chat-info clearfix\">\n" +
                                            "                            <span class=\"direct-chat-name pull-left\">" + data[i].user_name + "</span>\n" +
                                            "                            <span class=\"direct-chat-timestamp pull-right\">" + tConvert(data[i].time) + "</span>\n" +
                                            "                        </div>\n" +
                                            "                        <img class=\"direct-chat-img\"  src=\"https://bootdey.com/img/Content/user_2.jpg\"  alt=\"Message User Image\">\n" +
                                            "                        <div class=\"direct-chat-text\">\n" + data[i].message_from +
                                            "                        </div>\n" +
                                            "                    </div>"
                                    }
                                    if((data[i].message_to) !=null){
                                        htmlstring += "<div class=\"direct-chat-msg right\">\n" +
                                            "                        <div class=\"direct-chat-info clearfix\">\n" +
                                            "                            <span class=\"direct-chat-name pull-right\">"+ data[i].admin_name + "</span>\n" +
                                            "                            <span class=\"direct-chat-timestamp pull-left\">"+tConvert(data[i].time) + "</span>\n" +
                                            "                        </div>\n" +
                                            "                        <img class=\"direct-chat-img\"  src=\"https://bootdey.com/img/Content/user_1.jpg\"  alt=\"Message User Image\">\n" +
                                            "                        <div class=\"direct-chat-text\">\n" + data[i].message_to +
                                            "                        </div>\n" +
                                            "                    </div>"
                                    }
                                }
                                $('.chatlogs').html(htmlstring);
                            }
                        });
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

