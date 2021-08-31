<?php
include_once "../../vendor/autoload.php";
if (!isset($_SESSION)){session_start();}
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;

$dataManipulation = new DataManipulation();

if (isset($_POST["update_profile"]))
{
    $dataManipulation->adminSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $status = $dataManipulation->updateAdminDetails();
    if ($status){
        $_SESSION["successMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Profile Update Successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_GET["id"]))
{
    $status = $dataManipulation->deleteNotApproved($_GET["id"]);
    $http = $_SERVER["HTTP_REFERER"];
    if ($status){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Delete - </b>Moderateor Id Delete Successfully.</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_GET["active_id"]))
{
    $status = $dataManipulation->moderatorApproved($_GET["active_id"]);
    if ($status){
        Utility::redirect("../admin/active_moderator_list.php");
    }
}
if (isset($_POST["update_moderator_profile"])){
    $dataManipulation->moderatorSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $status = $dataManipulation->updateModeratorDetails($_POST['id']);
    if ($status){
        $_SESSION["successModeratorMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Profile Update Successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_POST["leave_member"]))
{
    $http = $_SERVER["HTTP_REFERER"];
//var_dump($_POST);
     $member_id = $_POST['member_id'];
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $status = "Leave";
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/member_img/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);





    $data = $dataManipulation->insertPermitImage($member_id,$status,$destinationFile);

    if ($data){
        $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Insert - </b> Insert Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }




}
if (isset($_POST["add_old_age_home"]))
{
    $http = $_SERVER["HTTP_REFERER"];
//var_dump($_POST);
     $name = $_POST['name'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $phone = $_POST['phone'];
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/oah_image/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);





    $data = $dataManipulation->insertOldAgeHome($name,$email,$address,$phone,$destinationFile);

    if ($data){
        $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Insert - </b> Insert Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }




}
if (isset($_POST["update_old_age_home"]))
{
    $http = $_SERVER["HTTP_REFERER"];
//var_dump($_POST);
     $id = $_POST['id'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $phone = $_POST['phone'];
    $destinationFile = $_POST['destinationFile'];

    $file = $_FILES['photo'];
     if($file!=""){
         $files = $_FILES['photo'];
         $fileName = $files['name'];
         $fileTmpName = $files['tmp_name'];
         $destinationFile = '../../contents/oah_image/' . date('d_m_Y_h_i_s_') . $fileName;
         move_uploaded_file($fileTmpName, $destinationFile);
         $data = $dataManipulation->updateOldAgeHome($name,$email,$address,$phone,$destinationFile,$id);

     }else{
         $data = $dataManipulation->updateOldAgeHome($name,$email,$address,$phone,$destinationFile,$id);
}


    if ($data){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Data Successfully.</span>
                         </div>";
        Utility::redirect("../admin/old_age_home.php");
    }




}
if (isset($_POST["change_nurse_doctor_profile"]))
{
    $http = $_SERVER["HTTP_REFERER"];
     $id = $_POST['id'];
     $fullname = $_POST['fullname'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $pnumber = $_POST['pnumber'];
     $pass = $_POST['pass'];
     $city = $_POST['city'];

         $data = $dataManipulation->update_nurse_doctor_profile($id,$fullname,$email,$address,$pnumber,$pass,$city);

    if ($data){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if (isset($_GET["approve_nurse_doctor"]))
{
    $http = $_SERVER["HTTP_REFERER"];

     $id = $_GET["approve_nurse_doctor"];


         $data = $dataManipulation->approve_nurse_doctor_profile($id);

    if ($data){
        $_SESSION["updatetMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Approved - </b> User Approved Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if (isset($_GET["approve_user"]))
{
    $http = $_SERVER["HTTP_REFERER"];

     $id = $_GET["approve_user"];


         $data = $dataManipulation->approve_user_profile($id);

    if ($data){
        $_SESSION["ApproveMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Approved - </b> User Approved Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if (isset($_GET["recover_user"]))
{
    $http = $_SERVER["HTTP_REFERER"];

     $id = $_GET["recover_user"];


         $data = $dataManipulation->recover_user($id);

    if ($data){
        $_SESSION["recoverUserMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Recover - </b> Recover Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if (isset($_GET["recover_nurse_doctor"]))
{
    $http = $_SERVER["HTTP_REFERER"];

     $id = $_GET["recover_nurse_doctor"];


         $data = $dataManipulation->recover_nurse_doctor($id);

    if ($data){
        $_SESSION["recoverNurseDoctorMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Recover - </b> Recover Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if (isset($_GET["move_to_nurse_doctor_acount"]))
{
    $http = $_SERVER["HTTP_REFERER"];

     $id = $_GET["move_to_nurse_doctor_acount"];


         $data = $dataManipulation->move_to_nurse_doctor_acount($id);

    if ($data){
        $_SESSION["moveMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Move - </b> Moved to Trash.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if (isset($_GET["move_to_user_acount"]))
{
    $http = $_SERVER["HTTP_REFERER"];

     $id = $_GET["move_to_user_acount"];


         $data = $dataManipulation->move_to_user_acount($id);

    if ($data){
        $_SESSION["moveUserMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Move - </b> Moved to Trash.</span>
                         </div>";
        Utility::redirect("$http");
    }

}

if (isset($_POST["add_member_byAdmin"]))
{
    $http = $_SERVER["HTTP_REFERER"];

    $member_id = $dataManipulation->user_id_by_Email($_POST['gurdianemail']);
    $member_id = $member_id->id;

    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $health = $_POST['health'];
    $room = $_POST['room'];
    $seat = $_POST['seat'];
    $gurdianname = $_POST['gurdianname'];
    $gurdianpnumber = $_POST['gurdianpnumber'];
    $gurdianemail = $_POST['gurdianemail'];
    $joindate = $_POST['joindate'];



    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/member_img/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);



    //$status = $dataManipulation->inser_member_data($member_id, $fullname ,$gender ,$age ,$address ,$health ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile );

    $idtoken = $dataManipulation->memberIdIsExist($member_id);

    if ($member_id==""){
        $_SESSION["noMemberMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Warning - </b> There are no member for this email id.</span>
                         </div>";
        Utility::redirect("$http");
    }else{
        if ($idtoken){
            $_SESSION["addMemberExist"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Warning - </b> Member id already exist.</span>
                         </div>";
            Utility::redirect("$http");
        }
        else{
            $status = $dataManipulation->inser_member_data($member_id, $fullname ,$gender ,$age ,$address ,$health ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile );

            if ($status)
            {
                $_SESSION["addMemberExist"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Insert Data Successfully.</span>
                         </div>";
                Utility::redirect("$http");
            }
        }
    }




}
if (isset($_POST["add_member_by_nurse_doctor"]))
{
    $http = $_SERVER["HTTP_REFERER"];

    $member_id = $dataManipulation->user_id_by_Email($_POST['gurdianemail']);
    $member_id = $member_id->id;

    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $health = $_POST['health'];
    $room = $_POST['room'];
    $seat = $_POST['seat'];
    $gurdianname = $_POST['gurdianname'];
    $gurdianpnumber = $_POST['gurdianpnumber'];
    $gurdianemail = $_POST['gurdianemail'];
    $joindate = $_POST['joindate'];



    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/member_img/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);



    //$status = $dataManipulation->inser_member_data($member_id, $fullname ,$gender ,$age ,$address ,$health ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile );

    $idtoken = $dataManipulation->memberIdIsExist($member_id);

    if ($member_id==""){
        $_SESSION["noMemberMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Warning - </b> There are no member for this email id.</span>
                         </div>";
        Utility::redirect("$http");


    }else{
        if ($idtoken){
            $_SESSION["addMemberExist"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Warning - </b> Member id already exist.</span>
                         </div>";
            Utility::redirect("$http");
        }
        else{
            $status = $dataManipulation->inser_member_data($member_id, $fullname ,$gender ,$age ,$address ,$health ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile );

            if ($status)
            {
                $_SESSION["dataInsert"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Insert Data Successfully.</span>
                         </div>";
                Utility::redirect('../nurse_doctor/view_member_list.php');
            }
        }
    }




}
if (isset($_POST["add_member"]))
{

    $http = $_SERVER["HTTP_REFERER"];

    $member_id = $dataManipulation->user_id_by_Email($_POST['gurdianemail']);
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $health = $_POST['health'];
    $room = $_POST['room'];
    $seat = $_POST['seat'];
    $gurdianname = $_POST['gurdianname'];
    $gurdianpnumber = $_POST['gurdianpnumber'];
    $gurdianemail = $_POST['gurdianemail'];
    $joindate = $_POST['joindate'];



    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/member_img/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);


    /*var_dump($member_id);
    var_dump($fullname);
    var_dump($address);
    var_dump($gurdianemail);
    var_dump($destinationFile);*/


    $http = $_SERVER["HTTP_REFERER"];
    $status = $dataManipulation->inser_member_data($member_id,$fullname ,$gender ,$age ,$address ,$health ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile );

    if ($status)
    {
        $_SESSION["addMemberExist"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Insert Data Successfully.</span>
                        </div>";
        Utility::redirect("$http");
    }
   /* $idtoken = $dataManipulation->memberIdIsExist($member_id);
    if ($idtoken){
        $_SESSION["addMemberExist"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Member id already exist.</span>
                        </div>";
        Utility::redirect("$http");
    }
    else{
        $status = $dataManipulation->inser_member_data($member_id,$fullname ,$gender ,$age ,$address ,$hehealth ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile );

        if ($status)
        {
            $_SESSION["addMemberExist"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Insert Data Successfully.</span>
                        </div>";
            Utility::redirect("$http");
        }
    }*/


}
if (isset($_POST["add_admin"]))
{
    var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];
   $name = $_POST['name'];
   $address = $_POST['address'];
   $gender = $_POST['gender'];
   $type = $_POST['type'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
  // $type = "admin";

    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/admin_img/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);


    $isExist =$dataManipulation->AdminEmailisExist($email);
    if($isExist){
        $_SESSION["isExistMsg"] = "<div style='background-color: #218838' class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> is Exist - </b> Sorry! This Email ID Already Exist... </span>
                        </div>";
        Utility::redirect($http);
    }else{
        $data =$dataManipulation->inser_admin_data($name, $type, $gender , $address, $phone, $email,$password ,$destinationFile);


        if ($data)
        {
            $_SESSION["insertMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Insert Data Successfully. </span>
                        </div>";
            Utility::redirect($http);

        }
    }

}

if (isset($_POST["Change_profile"]))
{
    $http = $_SERVER["HTTP_REFERER"];
   $name = $_POST['name'];
   $id = $_POST['id'];
   $address = $_POST['address'];
   $gender = $_POST['gender'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $pass = $_POST['password'];

   $data =$dataManipulation->update_admin_data($id,$name,$gender , $address, $phone, $email,$pass);


    if ($data)
    {
        $_SESSION["updateMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Update Data Successfully. </span>
                        </div>";
        Utility::redirect($http);

    }
}


if (isset($_POST["add_member2"]))
{
   $id = $_POST['name'];
   $amount = $_POST['amount'];
   $pnumber = $_POST['pnumber'];
   $transaction = $_POST['transaction'];
   $date = $_POST['date'];

   $update_send_money =$dataManipulation->update_send_money($amount,$pnumber,$transaction,$date,$id);


    if ($update_send_money)
    {
        $_SESSION["updateMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Update - </b> Update Data Successfully. </span>
                        </div>";
        Utility::redirect("../users/money_send_details.php");

    }
}
if (isset($_GET["delete_admin_id"]))
{
   $id = $_GET['delete_admin_id'];
    $http = $_SERVER["HTTP_REFERER"];

   $data =$dataManipulation->delete_admin($id);


    if ($data)
    {
        $_SESSION["deleteMsg"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Delete - </b> Delete Data Successfully. </span>
                        </div>";
        Utility::redirect($http);

    }else{
        $_SESSION["notDeleteMsg"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Not Deleted - </b> Something Wrong. </span>
                        </div>";
        Utility::redirect($http);
    }

}

if (isset($_POST["update"]))
{
   $id = $_POST['id'];
   $amount = $_POST['amount'];
   $pnumber = $_POST['pnumber'];
   $transaction = $_POST['transaction'];
   $date = $_POST['date'];

   $update_send_money =$dataManipulation->update_send_money($amount,$pnumber,$transaction,$date,$id);


    if ($update_send_money)
    {
        $_SESSION["updateMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Update - </b> Update Data Successfully. </span>
                        </div>";
        Utility::redirect("../users/money_send_details.php");

    }
}


if (isset($_GET["delete_money_details"]))
{

    $delete_id = $_GET['delete_money_details'];
    $data = $dataManipulation->delete_money_details($delete_id);

    if ($data)
    {
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Delete - </b> Delete Data Successfully .</span>
                        </div>";
        Utility::redirect("../users/money_send_details.php");
    }
}
if (isset($_GET["update_id"]))
{

    $update_id = $_GET['update_id'];
    $data = $dataManipulation->singleMember($update_id);

    if ($data)
    {
        $_SESSION["data_id"] = $data->id;
        Utility::redirect("../nurse_doctor/update_condition.php");
    }
}


if (isset($_POST["update_member"])){
    $dataManipulation->memberSetData($_POST);
    $data = $dataManipulation->updateMemberDetails($_POST['id']);
    if ($data)
    {
        $_SESSION["successMemberUpdateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b>  Update Member Data Successfully .</span>
                        </div>";
        Utility::redirect("../nurse_doctor/update_condition.php");
    }

}
if (isset($_POST['send']))
{
    //amount,pnumber,transaction,reference,date,email
    $amount = $_POST['amount'];
    $pnumber = $_POST['pnumber'];
    $transaction = $_POST['transaction'];
    $reference = $_POST['reference'];
    $date = $_POST['date'];
    $email = $_POST['email'];

    //$dataManipulation->userSetData($_POST);
    $data = $dataManipulation->insertUserDonate($amount,$pnumber,$transaction,$reference,$date,$email);
    if ($data){
        Utility::redirect("../users/money_send_details.php");
    }
}
if (isset($_POST['normal_condition']))
{
    $http = $_SERVER["HTTP_REFERER"];
    $prescription =$_POST['prescription'];
    $id =$_POST['member_id'];

    $data = $dataManipulation->ChangeCriticalToNormalHealthCondition($prescription,$id);
    //var_dump($data);
    if ($data)
    {
        $_SESSION["UpdateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b>  Update Data Successfully .</span>
                        </div>";
        Utility::redirect($http);
    }else{
        Utility::redirect($http);
    }
}
if (isset($_POST['Critical_condition']))
{
    $http = $_SERVER["HTTP_REFERER"];
    $prescription =$_POST['prescription'];
    $id =$_POST['member_id'];
    $data = $dataManipulation->ChangeNormalToCriticalHealthCondition($prescription,$id);
    //var_dump($data);
    if ($data)
    {
        $_SESSION["UpdateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b>  Update Data Successfully .</span>
                        </div>";
        Utility::redirect($http);
    }else{
        Utility::redirect($http);
    }
}
if (isset($_GET['alert_id']))
{
    $data = $dataManipulation->updateAlert($_GET['alert_id']);
    if ($data)
    {
        Utility::redirect("../nurse_doctor/serious_condition_member.php");
    }
}
if (isset($_GET['warning_id']))
{
    $data = $dataManipulation->updateWarning($_GET['warning_id']);
    if ($data)
    {
        Utility::redirect("../nurse_doctor/view_member_list.php");
    }
}
if (isset($_GET['notification_id']))
{
    $data = $dataManipulation->updateNotification($_GET['notification_id']);
    if ($data)
    {
        Utility::redirect("../users/serious_condition.php");
    }
    else{
        Utility::redirect("../users/serious_condition.php");
    }
}

if (isset($_GET['leave_id'])){

    $data = $dataManipulation->updateLeftMemberDetails($_GET['leave_id']);
    if ($data)
    {
        Utility::redirect("../nurse_doctor/left_member.php");
    }

}
if (isset($_GET['send_msg_id']))
{
    $data = $dataManipulation->userAlert($_GET['send_msg_id']);
    $http = $_SERVER['HTTP_REFERER'];
    if ($data) {
        $_SESSION["alertUsers"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Reminder alert send successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }

}
if (isset($_POST['post']))
{

    $files = rand(1000,10000).$_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $destinationFile ='../../contents/images/'.$files;
    move_uploaded_file($fileTmpName,$destinationFile);
    $_POST['destinationFile']=$destinationFile ;
    $user_name = $_POST['name'];
    $user_id = $_POST['user_id'];
    $textarea = $_POST['post'];
    $image = $_POST['destinationFile'];
    $dataManipulation->textareaPostSave($user_id,$user_name,$textarea,$image);
}

if (isset($_GET["logout"]))
{
    session_destroy();
    Utility::redirect("../login.php");
}

if (isset($_GET['managePostDelete'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $id = $_GET['managePostDelete'];
    $managePostDelete = $dataManipulation->managePostDelete($id);
    if ($managePostDelete){
        $_SESSION['TostUpdate'] ="<div id=\"toast-container\" class=\"toast-top-right\"><div class=\"toast toast-error\" aria-live=\"assertive\" style=\"\"><div class=\"toast-message\">Delete post Successfully</div></div></div>";
        Utility::redirect("$http_reffer");
    }
}
if (isset($_POST['postDataCollect'])){

    $user_id = $_POST['value'];
    $data = $dataManipulation->postDataCollectviaUserId($user_id);
    echo json_encode($data);
}
if (isset($_POST['btn-save-changes'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $user_id = $_POST['user_no_from'];
    $user_update_post = $_POST['updatePostDataSection'];
    $data = $dataManipulation->postUpdateDataCollectviaUserId($user_id,$user_update_post);
    if ($data){
        $_SESSION['TostUpdate'] = "<div id=\"toast-container\" class=\"toast-top-right\"><div class=\"toast toast-success\" aria-live=\"polite\" style=\"\"><div class=\"toast-message\">Update your post Successfully</div></div></div>";
        Utility::redirect("$http_reffer");
    }
}
if (isset($_GET['getData']))
{
    $data = $dataManipulation->getPostDataToShow();
    echo json_encode($data);
}
if (isset($_POST['commentValue'])){
    $commentNo = $_POST['commentNo'];
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $commentValue = $_POST['commentValue'];
    $data = $dataManipulation->insertComment($user_id,$user_name,$commentValue,$commentNo);
}
if (isset($_POST['sellerDataCollectViaId']))
{
    $users_id = $_POST['users_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $dataManipulation->viewSellerBuyersTotalInfo($users_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['sellerSDataCollectViaId']))
{
    $users_id = $_POST['users_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $dataManipulation->viewSellerBuyersTotalInfoS($users_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['users_name']) && isset($_POST['users_id'])){
    $buyers_name = $_POST['users_name'];
    $buyers_id = $_POST['users_id'];
    $sellers_id = $_POST['sellers_id'];
    $sellers_name = $_POST['sellers_name'];
    $chat_message = $_POST['chat_message'];
    $data = $dataManipulation->insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);

}
if (isset($_GET['user_type_for_buyers'])){
    $data = $dataManipulation->showAlertonMessageforbuyers($_GET['user_id']);
    echo json_encode($data);
}
if (isset($_POST['buyers_ids']) && isset($_POST['sellerActive']) && isset($_POST['sellers_names'])){
    $buyers_name = $_POST['buyers_names'];
    $buyers_id = $_POST['buyers_ids'];
    $sellers_id = $_POST['sellers_ids'];
    $sellers_name = $_POST['sellers_names'];
    $chat_message = $_POST['chat_messages'];
    $data = $dataManipulation->insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);

}
if (isset($_GET['user_type'])){
    $data = $dataManipulation->showAlertonMessage($_GET['sellers_id']);
    echo json_encode($data);
}