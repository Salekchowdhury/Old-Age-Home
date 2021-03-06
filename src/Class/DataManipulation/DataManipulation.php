<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01-Nov-19
 * Time: 8:15 PM
 */

namespace App\DataManipulation;

use App\Model\DatabaseConnection as DB;
use PDO,PDOException;
class DataManipulation extends DB
{
    public
        $fullname,
        $amount,
        $date,
        $transaction,
        $reference,
        $member_id,
        $cost,
        $age,
        $gender,
        $gurdianname,
        $gurdianpnumber,
        $health,
        $joindate,
        $pass,
        $email,
        $fname,
        $lname,
        $address,
        $city,
        $country,
        $pnumber;
    public function adminSetData($data)
    {
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("fname",$data))
        {
            $this->fname = $data["fname"];
        }
        if (array_key_exists("lname",$data))
        {
            $this->lname = $data["lname"];
        }
        if (array_key_exists("address",$data))
        {
            $this->address = $data["address"];
        }
        if (array_key_exists("city",$data))
        {
            $this->city = $data["city"];
        }
        if (array_key_exists("country",$data))
        {
            $this->country = $data["country"];
        }
        if (array_key_exists("pnumber",$data))
        {
            $this->pnumber = $data["pnumber"];
        }
    }
    public function viewAdminDetails()
    {
        $sql = "select * from admin";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function updateAdminDetails()
    {
        $array = array($this->pass,$this->email,$this->fname,$this->lname,$this->address,$this->city,$this->country,$this->pnumber);
        $sql = "update admin set pass=?,email=?,fname=?,lname=?,address=?,city=?,country=?,pnumber=?";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function moderator()
    {
        $sql = "select * from nurse_doctor where approved = 'no' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showMemberProfile($id)
    {
        $sql = "select * from member where 	member_id = '".$id."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function countTotalMember()
    {
        $sql = "select count(*) as total from member";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function totalAmount()
    {
        $sql = "select sum(amount) as total from moneydetails";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
     public function countTotalPost()
    {
        $sql = "select count(user_id) as total from post";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }

    public function totalCriticalCondition()
    {
        $sql = "select count(health) as totalCritical from member where health='Critical'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function FindReferId($email)
    {
        $sql = "select member_id  from member where gurdianemail='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function totalNormalCondition()
    {
        $sql = "select count(health) as totalNormal from member where health='Normal'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function show_member_data()
    {
        $sql = "select * from member";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showMemberInfo($email)
    {
        $sql = "select * from member where gurdianemail='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showUserData($email)
    {
        $sql = "select * from user where email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function show_old_age_home_by_email($email)
    {
        $sql = "select * from old_age_home where email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function nurseDoctorActive()
    {
        $sql = "select count(status) as total from nurse_doctor where status = 'yes' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function nurseDoctorRequest()
    {
        $sql = "select count(status) as total from nurse_doctor where approved = 'no' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function trashnurseDoctor()
    {
        $sql = "select count(status) as total from nurse_doctor where status = 'no' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function userActive()
    {
        $sql = "select count(status) as total from user where status = 'yes' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function totalMember()
    {
        $sql = "select count(id) as total from member ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function totalAdmin()
    {
        $sql = "select count(id) as total from admin ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function totalOldAgeHome()
    {
        $sql = "select count(id) as total from old_age_home ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function trashUser()
    {
        $sql = "select count(status) as total from user where status = 'no' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function userRequest()
    {
        $sql = "select count(status) as total from user where activate = 'no' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function show_all_old_age_home()
    {
        $sql = "select * from old_age_home ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function user_id_by_Email($email)
    {
        $sql = "select id from user where email = '".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function deleteNotApproved($id)
    {
        $sql = "delete from nurse_doctor WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function delete_admin($id)
    {
        $sql = "delete from admin WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function delete_money_details($id)
    {
        $sql = "delete from  moneydetails WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }


     public function approve_nurse_doctor_profile($id)
    {
        $sql = "update nurse_doctor set approved = 'yes' WHERE  id = '".$id."'";
        $status = $this->conn->exec($sql);
        return $status;
    }
   public function approve_user_profile($id)
    {
        $sql = "update user set activate = 'yes' WHERE  id = '".$id."'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public function recover_user($id)
    {
        $sql = "update user set status = 'yes' WHERE  id = '".$id."'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public function recover_nurse_doctor($id)
    {
        $sql = "update nurse_doctor set status = 'yes' WHERE  id = '".$id."'";
        $status = $this->conn->exec($sql);
        return $status;
    }

    public function moderatorSetData($data)
    {
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("address",$data))
        {
            $this->address = $data["address"];
        }
        if (array_key_exists("city",$data))
        {
            $this->city = $data["city"];
        }
        if (array_key_exists("country",$data))
        {
            $this->country = $data["country"];
        }
        if (array_key_exists("pnumber",$data))
        {
            $this->pnumber = $data["pnumber"];
        }
    }

    public function update_send_money($amount,$pnumber,$transaction,$date,$id){
        $dataArray=array($amount,$pnumber,$transaction,$date);
        $sql="update   moneydetails set amount=?,pnumber=?,transaction=?,date=? WHERE id ='".$id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($dataArray);
        return $status;
    }
    public function updateOldAgeHome($name,$email,$address,$phone,$destinationFile,$id){
        $dataArray = array($name,$email,$address,$phone,$destinationFile);
        $sql="update   old_age_home set name=?,email=?,address=?,phone=?,image=? WHERE id ='".$id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($dataArray);
        return $status;
    }
    public function updateOldAgeHomeWithoutimage($name,$email,$address,$phone,$id){
        $dataArray = array($name,$email,$address,$phone);
        $sql="update   old_age_home set name=?,email=?,address=?,phone=? WHERE id ='".$id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($dataArray);
        return $status;
    }
    public function update_nurse_doctor_profile($id,$fullname,$email,$address,$pnumber,$pass,$city){
        $dataArray = array($fullname,$email,$address,$pnumber,$pass,$city);
        $sql="update   nurse_doctor set fullname=?,email=?,address=?,pnumber=?,pass=?,city=? WHERE id ='".$id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($dataArray);
        return $status;
    }
    public function updateModeratorDetails($id)
    {
        $array = array($this->pass,$this->email,$this->fullname,$this->address,$this->city,$this->country,$this->pnumber);
        $sql = "update nurse_doctor set pass=?,email=?,fullname=?,address=?,city=?,country=?,pnumber=? where id=$id";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function view_nurse_doctorDetails($id)
    {
        $sql = "select * from nurse_doctor WHERE id = '".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
   public function AdminEmailisExist($email)
    {
        $sql = "select * from admin WHERE email = '".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function checkToken($email,$code)
    {
        $sql = "select * from nurse_doctor WHERE email = '".$email."' && emailtoken = '".$code."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }

    public function edit_send_money($id)
    {
        $sql = "select * from moneydetails WHERE id = '".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }



    /// add member set data


    public function memberSetData($data)
    {
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("gender",$data))
        {
            $this->gender = $data["gender"];
        }
        if (array_key_exists("age",$data))
        {
            $this->age = $data["age"];
        }
        if (array_key_exists("gurdianname",$data))
        {
            $this->gurdianname = $data["gurdianname"];
        }
        if (array_key_exists("gurdianpnumber",$data))
        {
            $this->gurdianpnumber = $data["gurdianpnumber"];
        }
        if (array_key_exists("address",$data))
        {
            $this->address = $data["address"];
        }
        if (array_key_exists("health",$data))
        {
            $this->health = $data["health"];
        }
        if (array_key_exists("joindate",$data))
        {
            $this->joindate = $data["joindate"];
        }
        if (array_key_exists("cost",$data))
        {
            $this->cost = $data["cost"];
        }
        if (array_key_exists("member_id",$data))
        {
            $this->member_id = $data["member_id"];
        }
    }

    public function inser_member_data($member_id,$fullname ,$gender ,$age ,$address ,$health ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile)
    {
        $array = array($member_id,$fullname ,$gender ,$age ,$address ,$health ,$room ,$seat ,$gurdianname ,$gurdianpnumber ,$gurdianemail ,$joindate ,$destinationFile);
        $sql = "insert into member (member_id,fullname ,gender ,age ,address ,health ,room ,seat ,gurdianname ,gurdianpnumber ,gurdianemail ,joindate ,image) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
     public function inser_admin_data($name, $type, $gender , $address, $phone, $email,$password ,$destinationFile)
    {
        $array = array($name,$type,$gender , $address, $phone, $email,$password ,$destinationFile);
        $sql = "insert into admin (name,type,gender , address, phone, email,pass ,image) VALUE (?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
     public function memberDataInsert()
    {
        $array = array($this->fullname,$this->gender,$this->age,$this->gurdianname,$this->gurdianpnumber,$this->address,$this->member_id,$this->health,$this->joindate);
        $sql = "insert into member (fullname,gender,age,gurdianname,gurdianpnumber,address,member_id,health,joindate) VALUE (?,?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public function memberIdIsExist($id)
    {
        $sql = "select * from member WHERE member_id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function viewMemberDetails()
    {
        $sql = "select * from member";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewLeftMemberDetails()
    {
        $sql = "select * from member WHERE left_member = 'yes' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function updateLeftMemberDetails($id)
    {
        $sql = "update member set left_member = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function searchMemberDetails($data)
    {
        $sql = "select * from member WHERE  fullname like'%".$data."%'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showNotApprovAcountNurseDoctor()
    {
        $sql = "select * from nurse_doctor WHERE  approved='no'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
     public function showNotApprovAcountUser()
    {
        $sql = "select * from user WHERE  	activate='no'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function checkEmailInUserTable($email)
    {
        $sql = "select * from user WHERE  email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function checkEmailInNurseDoctorTable($email)
    {
        $sql = "select * from nurse_doctor WHERE  email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showAllActiveUserAcount()
    {
        $sql = "select * from user where status= 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showAllActiveNurseDoctorAcount()
    {
        $sql = "select * from nurse_doctor where status= 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
  public function showAllStatusNoNurseDoctorAcount()
    {
        $sql = "select * from nurse_doctor where status= 'no'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function showAllStatusNoUserAcount()
    {
        $sql = "select * from user where status= 'no'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }


     public function show_admin_data()
    {
        $sql = "select * from admin";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
  public function show_admin_personal_data($email)
    {
        $sql = "select * from admin WHERE email='".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }

    public function singleMember($id)
    {
        $sql = "select * from member WHERE id = '".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
//        return $id;
    }
    public function singleMember_Id()
    {
        $sql = "select * from member";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
//        return $id;
    }
    public function viewPostByUserId($id)
    {
        $sql = "select * from post WHERE user_id = '".$id."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
//        return $id;
    }
    public function viewPostComment($postNo){
        $sql = "SELECT * FROM post where commentNo = '".$postNo."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
    public function updateMemberDetails($id)
    {
        $array = array($this->fullname,$this->gender,$this->age,$this->gurdianname,$this->gurdianpnumber,$this->address,$this->cost,$this->health,$this->joindate);
        $sql = "update member set fullname=?,gender=?,age=?,gurdianname=?,gurdianpnumber=?,address=?,cost=?,health=?,joindate=? WHERE id='".$id."'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public function memberIdMatchByUser($member_id)
    {
        $sql = "select m.fullname,m.gender,m.age,m.gurdianname,m.gurdianpnumber,m.address,m.member_id,m.health,m.joindate from member as m INNER JOIN user as u on m.member_id = '".$member_id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }

    /////// user set data

    public function userSetData($data)
    {
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("amount",$data))
        {
            $this->amount = $data["amount"];
        }
        if (array_key_exists("pnumber",$data))
        {
            $this->pnumber = $data["pnumber"];
        }
        if (array_key_exists("transaction",$data))
        {
            $this->transaction = $data["transaction"];
        }
        if (array_key_exists("reference",$data))
        {
            $this->reference = $data["reference"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("date",$data))
        {
            $this->date = $data["date"];
        }
    }
    public function textareaPostSave($user_id,$name,$post,$image){
        $dataArray=array($user_id,$name,$post,$image);
        $sql="insert into post(user_id,name,post,image,date,time)VALUES(?,?,?,?,now(),now())";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function insertUserDonate($amount,$pnumber,$transaction,$reference,$date,$email)
    {
        $array = array($amount,$pnumber,$transaction,$reference,$date,$email);
        $sql = "insert into moneyDetails (amount,pnumber,transaction,reference,date,email) VALUE (?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function insertOldAgeHome($name,$email,$address,$phone,$destinationFile)
    {
        $array = array($name,$email,$address,$phone,$destinationFile);
        $sql = "insert into old_age_home (name,email,address,phone,image) VALUE (?,? ,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public function userEmail($email)
    {
        $sql = "select * from moneyDetails where email ='".$email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function donatedDetails()
    {
        $sql = "select * from moneydetails";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function show_old_age_home_data()
    {
        $sql = "select * from old_age_home ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function show_old_age_home($id)
    {
        $sql = "select * from old_age_home where id ='".$id."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function viewCriticalConditionMember()
    {
        $sql = "select * from member where health ='Critical' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function show_Leave_member_data()
    {
        $sql = "select * from member where status ='Leave' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function update_admin_data($id,$name,$gender , $address, $phone, $email,$pass)
    {
        $array = array($name,$gender , $address, $phone, $email,$pass);
        $sqls = "update admin set name=?,gender=? , address=?, phone=?, email=?,pass=? WHERE  id='" . $id . "'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function insertPermitImage($member_id,$status,$destinationFile)
    {
        $array = array($destinationFile,$status);
        $sqls = "update member set permit_image=?,status=? WHERE  member_id='".$member_id."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public function ChangeCriticalToNormalHealthCondition($prescription,$id){

        $date=date("Y-m-d");
        $array = array($date,$prescription);
        $sqls = "update member set date=?,health ='Normal',prescription=?  WHERE  member_id='". $id . "'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
  /*  public function ChangeNormalToCriticalHealthCondition($id){

        $sql = "update member set health ='Critical' WHERE member_id ='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }*/
    public function ChangeNormalToCriticalHealthCondition($prescription,$id)
    {
        $date=date("Y-m-d");
        $array = array($date,$prescription);
        $sqls = "update member set date=?,health ='Critical',prescription=?  WHERE  member_id='". $id . "'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public function move_to_nurse_doctor_acount($id){
        $sql = "update nurse_doctor set status ='no' WHERE id ='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    } public function move_to_user_acount($id){
        $sql = "update user set status ='no' WHERE id ='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
     public function updateAlert($id)
    {
        $sql = "update member set health ='Critical Condition', notification = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }


    public function updateWarning($id)
    {
        $sql = "update member set health ='normal', notification = 'no' ,status = 'no' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function singleAlert($member_id)
    {
        $sql = "select * from member WHERE  member_id = '".$member_id."'&& notification = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function notification($member_id)
    {
        $sql = "select * from member WHERE  status = 'no' && member_id = '".$member_id."'&& notification = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function updateNotification($id)
    {
        $sql = "update member set status = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function user()
    {
        $sql = "select * from user where activate = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function userAlert($id)
    {
        $sql = "update user set alert = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function reminderUpdate($id)
    {
        $sql = "update user set alert = 'no' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function reminder($email)
    {
        $sql = "select * from user where email='".$email."' && activate = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function postDataCollectviaUserId($id){
    $sql = "SELECT * FROM post WHERE id ='".$id."'";
    $data = $this->conn->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();

    return $satatus;
}
    public function managePostDelete($postNo){
        $sql=" delete from post WHERE commentNo ='".$postNo."' || id='".$postNo."'";
        $data= $this->conn->exec($sql);
        return $data;
    }
    public function postUpdateDataCollectviaUserId($user_id,$post){
        $dataArray=array($post);
        $sql="update  post set post=? WHERE id ='".$user_id."'";
        $data= $this->conn->prepare($sql);
        $status=$data->execute($dataArray);
        return $status;
    }
    public function getPostDataToShow(){
        $sql = "SELECT * FROM post ORDER BY id DESC ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function insertComment($user_id,$name,$post,$commentNo){
        $dataArray=array($user_id,$name,$post,$commentNo);
        $sql="insert into post(user_id,name,post,date,time,commentNo)VALUES (?,?,?,now(),now(),?)";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function viewAllPostForAdmin(){
        $sql = "SELECT * FROM post WHERE commentNo is NULL ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function viewSellerBuyersTotalInfo($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where user_id = '".$buyers_id."' &&  admin_id = '".$sellers_id."' ORDER BY id DESC";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $updates = "update chat set messageRead = 'seen' where user_id = '".$buyers_id."' &&  admin_id = '".$sellers_id."'";
        $this->conn->exec($updates);

        return $satatus;
    }
    public function insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $dataArray=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(user_id,admin_id,user_name,admin_name,message_from,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($dataArray);
        $update = "update chat set messageRead = 'seen' where user_id = '".$buyers_id."' &&  admin_id = '".$sellers_id."'";
        $this->conn->exec($update);
        return $status;
    }
    public function showAlertonMessageforbuyers($id){
        $message = "unseen";
        $sql = "select admin_id, messageRead from chat where user_id = '".$id."' && messageRead='".$message."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }
    public function viewSellerBuyersTotalInfoS($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where admin_id = '".$buyers_id."' &&  user_id = '".$sellers_id."' ORDER BY id DESC";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $update = "update chat set message = 'seen' where admin_id = '".$buyers_id."' &&  user_id = '".$sellers_id."'";
        $this->conn->exec($update);

        return $satatus;
    }
    public function insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $data=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(admin_id,user_id,admin_name,user_name,message_to,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->conn->prepare($sql);
        $status=$sth->execute($data);
        $update = "update chat set message = 'seen' where admin_id = '".$buyers_id."' &&  user_id = '".$sellers_id."'";
        $this->conn->exec($update);
        return $status;
    }
    public function showAlertonMessage($sellers_id){
        $message = "unseen";
        $sql = "select user_id, message from chat where  admin_id = '".$sellers_id."' &&  message='".$message."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }
}