<?php
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION))
{session_start();}

use App\DataManipulation\DataManipulation;


$datamanipulation =new DataManipulation();

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer( true);

$reg = new Registration();
if (isset($_POST['signup']))
{
    $reg->registrationSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $isExist = $reg->isExistEmail();
    $isExistUsers = $reg->isExistEmailUser();
    $type = $_POST['type'];
    $name = $_POST['fullname'];
    if ($isExist){
        $_SESSION["isExistMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Email already exist. Please give another email. </span>
                        </div>";
        Utility::redirect("$http");
    }
    elseif ($isExistUsers){
        $_SESSION["isExistMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Email already exist. Please give another email. </span>
                        </div>";
        Utility::redirect("$http");
    }
    else{
        if ($type=='nurse_doctor'){
            $_SESSION['email'] = $_POST['email'];
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $type=$_POST['type'];
            $pass=$_POST['pass'];
            $emailToken = rand(100000, 999999);
            $_POST['emailToken'] = $emailToken;
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'oldagehomeservice@gmail.com';                     // SMTP username
                $mail->Password   = 'oldagehome12';                               // SMTP password
                $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('oldagehomeservice@gmail.com', 'Old Age Home Service');
                $mail->addAddress("$email", 'User');     // Add a recipient
                $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('oldagehomeservice@gmail.com', 'confirmation code');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // Attachments
                //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Confirmation Code';
                $mail->Body    = "$emailToken";
                $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

                if($mail->send()){
                    $insert = $reg->insertNurse_doctor($fullname,$email,$type,$pass,$emailToken);
                    if ($insert){
                       /* $_SESSION["isExistMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b>  Hi $name - </b> Your Registration Successfully. </span>
                        </div>";*/
                        Utility::redirect("../verification.php");

                    }


                }

            }
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                //echo 'Message has been sent';
            }


        }
        else{

            $_SESSION['email'] = $_POST['email'];
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $type=$_POST['type'];
            $pass=$_POST['pass'];
            $emailToken = rand(100000, 999999);
            $_POST['emailToken'] = $emailToken;
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'oldagehomeservice@gmail.com';                     // SMTP username
                $mail->Password   = 'oldagehome12';                               // SMTP password
                $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('oldagehomeservice@gmail.com', 'Old Age Home Service');
                $mail->addAddress("$email", 'User');     // Add a recipient
                $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('oldagehomeservice@gmail.com', 'confirmation code');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // Attachments
                //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Confirmation Code';
                $mail->Body    = "$emailToken";
                $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

                if($mail->send()){
                    $insert = $reg->insertUser($fullname,$email,$type,$pass,$emailToken);
                    if ($insert){
                        /* $_SESSION["isExistMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"fa fa-times\"></i>
                           </button>
                           <span style='color: white'>
                             <b>  Hi $name - </b> Your Registration Successfully. </span>
                         </div>";*/
                        Utility::redirect("../verification.php");

                    }


                }

            }
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                //echo 'Message has been sent';
            }






            $insert = $reg->insertUser();
            if ($insert){
                $_SESSION["isExistMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b>  Hi $name - </b> Your Registration Successfully. </span>
                        </div>";
                Utility::redirect("$http");

            }
        }

    }
}
if (isset($_POST['confirm'])){
    $http = $_SERVER["HTTP_REFERER"];
    $email=$_POST['email'];
    $code=$_POST['code'];
    $Nurse_DoctorData = $reg->checkTokenNurseDoctor($email,$code);
    $userData = $reg->checkTokenUser($email,$code);


    if($Nurse_DoctorData){
        $data = $reg->updateTokenNurseDoctor($email);

        if ($data)
        {
            Utility::redirect("../login.php");

        }
    }elseif ($userData){
        $data = $reg->updateTokenUser($email);

        if ($data)
        {
            Utility::redirect("../login.php");

        }
    }else{
        $_SESSION["notMatchMemberID"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Token Id not Matched. Please try again. </span>
                        </div>";
        Utility::redirect("$http");
    }

}
if (isset($_POST['confirm_for_forgotPasswor'])){
    $http = $_SERVER["HTTP_REFERER"];
    $_SESSION['email']=$_POST['email'];
    $email=$_POST['email'];
    $code=$_POST['code'];
    $Nurse_DoctorData = $reg->checkTokenNurseDoctor($email,$code);
    $userData = $reg->checkTokenUser($email,$code);


    if($Nurse_DoctorData){
        $data = $reg->updateTokenNurseDoctor($email);

        if ($data)
        {
            Utility::redirect("../change_password.php");

        }
    }elseif ($userData){
        $data = $reg->updateTokenUser($email);

        if ($data)
        {
            Utility::redirect("../change_password.php");

        }
    }else{
        $_SESSION["notMatchMemberID"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Token Id not Matched. Please try again. </span>
                        </div>";
        Utility::redirect("$http");
    }

}
if (isset($_POST['change_password'])){
    $http = $_SERVER["HTTP_REFERER"];
    $_SESSION['email']=$_POST['email'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $checkTypeFromUserTable = $reg->checkTypeFromUserTable($email);
    $checkTypeFromNurseDoctorTable = $reg->checkTypeFromNurseDoctorTable($email);


    if($checkTypeFromNurseDoctorTable){
        $data = $reg->updatePasswordNurseDoctor($pass,$email);

        if ($data)
        {
            Utility::redirect("../login.php");

        }
    }elseif ($checkTypeFromUserTable){
        $data = $reg->updatePasswordUser($pass,$email);

        if ($data)
        {
            Utility::redirect("../login.php");

        }
    }else{
        $_SESSION["notMatchMemberID"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Something Wrong. Please try again. </span>
                        </div>";
        Utility::redirect("$http");
    }

}
if (isset($_POST["signin"]))
{
    $reg->authSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $admin = $reg->admin();
    $type=$admin->type;
    $nurse_doctor = $reg->nurse_doctor();
    $moderatorApprovedNo = $reg->moderatorApprovedNo();
    $user = $reg->user();
    if ($type=='admin'){
        $_SESSION["email"] = $admin->email;
        Utility::redirect("../admin/dashboard.php");
    }
    elseif ($moderatorApprovedNo){
        $_SESSION["isErorMsg"] = "<div  class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b>Sorry..! Id not activated yet </span>
                        </div>";
        Utility::redirect("$http");
    }
    elseif ($nurse_doctor){
        $_SESSION["email"] = $nurse_doctor->email;
        $_SESSION["id"] = $nurse_doctor->id;
        Utility::redirect("../nurse_doctor/add_member.php");
    }
    elseif ($type=='Moderator'){
        $_SESSION["email"] = $admin->email;
        Utility::redirect("../admin/profile.php");
    }
    elseif ($user){
        $_SESSION["email"] = $user->email;
        //$_SESSION["member_id"] = $user->member_id;
        Utility::redirect("../users/user_dashboard.php");
    }
    else{
        $_SESSION["isErorMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b>Incorrect email and password. </span>
                        </div>";
        Utility::redirect("$http");
    }
}