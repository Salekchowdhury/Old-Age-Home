<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
$userEmail=$_SESSION['email'];
$datamanipulation =new DataManipulation();
$registration =new registration();

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer( true);
use App\Utility\Utility;

$datamanipulation =new DataManipulation();
$userEmail=$_SESSION['email'];


if(isset($_POST['send_message_form_user']))
{
    $subject = $_POST['subject'];
    $message_user = $_POST['mesaage'];
    $name_user = $_POST['name'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
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
        //$mail->addAddress("$userEmail", 'User');     // Add a recipient
        $mail->addAddress('oldagehomeservice@gmail.com');               // Name is optional
        $mail->addReplyTo($userEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<p>Me $name_user , I am a user of the website. my email id is <b>$userEmail</b>  </p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
            Utility::redirect("$http_reffer");

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}
if(isset($_POST['send_message_form_nurse_doctor']))
{
    $subject = $_POST['subject'];
    $message_user = $_POST['mesaage'];
    $name_user = $_POST['name'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
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
        //$mail->addAddress("$userEmail", 'User');     // Add a recipient
        $mail->addAddress('oldagehomeservice@gmail.com');            // Name is optional
        $mail->addReplyTo($userEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<p>Me $name_user , I am a user of the website. my email id is <b>$userEmail</b>  </p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
            Utility::redirect("$http_reffer");

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}
if(isset($_POST['send_message_to_other_oah'])){
    $userData =$datamanipulation->showUserData($userEmail);
    $subject = $_POST['subject'];
    $message_user = $_POST['mesaage'];
    $company_name = $_POST['name'];
    $oah_email = $_POST['email'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
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
        $mail->setFrom("oldagehomeservice@gmail.com", 'Old Age Home Service');
        $mail->addAddress($oah_email, 'User');     // Add a recipient
        $mail->addAddress($oah_email);               // Name is optional
        $mail->addReplyTo($userEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<p> me $userData->fullname . my email id is $userData->email.</p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to $company_name Author. </span>
                        </div>";
            Utility::redirect("$http_reffer");

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}
if(isset($_GET['send_main_to_gurdian'])){
    $userData =$datamanipulation->showUserData($userEmail);
    $subject = "Member Condition";
    $message_user = $_POST['mesaage'];
    $company_name = $_POST['name'];
    $gurdianEmail = $_GET['send_main_to_gurdian'];
    $data = $datamanipulation->showMemberInfo($gurdianEmail);
    $http_reffer = $_SERVER["HTTP_REFERER"];
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
        $mail->setFrom("oldagehomeservice@gmail.com", 'Old Age Home Service');
        $mail->addAddress($gurdianEmail, 'User');     // Add a recipient
        $mail->addAddress($gurdianEmail);               // Name is optional
        $mail->addReplyTo("oldagehomeservice@gmail.com", 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "  
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>Sir Your Member name $data->fullname and Refere Id  $data->member_id. His/Her Body Condition is Critical.</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Mail sent to $data->fullname Gurdian . </span>
                        </div>";
            Utility::redirect("$http_reffer");

        }else{
            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Not Send - </b> Something Wrong!!!. </span>
                        </div>";
            Utility::redirect("$http_reffer");

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}


if(isset($_POST['forgotPassword'])){
    $http_reffer = $_SERVER["HTTP_REFERER"];
    $_SESSION['email']=$_POST['email'];
    $receiver=$_POST['email'];
    $emailToken = rand(100000, 999999);
    $_POST['emailToken'] = $emailToken;

    $checkUserEmail=$datamanipulation->checkEmailInUserTable($receiver);
    var_dump($checkUserEmail);
    $checkNurseDoctorEmail=$datamanipulation->checkEmailInNurseDoctorTable($receiver);
    if($checkUserEmail){

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
            $mail->addAddress("$receiver", 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('oldagehomeservice@gmail.com', 'confirmation code');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Change password';
            $mail->Body    = "$emailToken";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){

                $status=$registration->update_user_emailtoken($emailToken,$receiver);
                if($status){
                    Utility::redirect('../verify.php');
                    //include_once ("../../views/login_register_forgot/verification_forgot_password.php");
                }


                /* utility::redirect("view_List.php");
                 include_once ("../../views/teacher/post-board.php");*/

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }



    }elseif($checkNurseDoctorEmail){

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
            $mail->addAddress("$receiver", 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('oldagehomeservice@gmail.com', 'confirmation code');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Change password';
            $mail->Body    = "$emailToken";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $status=$registration->update_nurse_doctor_emailtoken($emailToken,$receiver);
                if($status){
                    Utility::redirect('../verify.php');
                }


                /* utility::redirect("view_List.php");
                 include_once ("../../views/teacher/post-board.php");*/

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }



    }
    else{

        $_SESSION['SendMessage']="<div class='alert alert-danger' >Wrong Email id.Please try again </div>";
        Utility::redirect("$http_reffer");
    }


}

if(isset($_POST['sendmessage_form_tutor'])){
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $tutorEmail=$_SESSION['email'];


    $receiver = "tutorstudentportal@gmail.com";

    $tutorDataforSendEmail=$datamanipulation->viewtutorDataforSendEmail($tutorEmail);
    if($tutorDataforSendEmail){
        $name="$tutorDataforSendEmail->name";
        $phone="$tutorDataforSendEmail->phone";
        $phone= "0".$phone;

    }





    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'chysalek2@gmail.com';                     // SMTP username
        $mail->Password   = '112787salek';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('chysalek2@gmail.com', 'Online Tutor and Student Portal');
        $mail->addAddress("$receiver", 'User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('chysalek2@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<p>Me $name , I am a tutor. my contact number is <b>$phone</b> and email id is <b>$studentEmail</b>  </p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){
            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION['SendMessage']="<div class='alert alert-success' style='font-size: 26px;padding-left: 162px;'>Your message sent to admin </div>";
            Utility::redirect("$http_reffer");

            /* utility::redirect("view_List.php");
             include_once ("../../views/teacher/post-board.php");*/

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}
if(isset($_POST['contactFormHomePage'])){
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $email=$_POST['email'];



    $receiver = "tutorstudentportal@gmail.com";







    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'chysalek2@gmail.com';                     // SMTP username
        $mail->Password   = '112787salek';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('chysalek2@gmail.com', 'Online Tutor and Student Portal');
        $mail->addAddress("$receiver", 'User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('chysalek2@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<p>Message from home page. Me $name and email id is <b>$email</b>  </p>
                            
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){
            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION['SendMessage']="<div class='alert alert-success align-content-center' style='font-size: 26px;padding-left: 105px;'>Your message sent to admin </div>";
            Utility::redirect("$http_reffer");

            /* utility::redirect("view_List.php");
             include_once ("../../views/teacher/post-board.php");*/

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}