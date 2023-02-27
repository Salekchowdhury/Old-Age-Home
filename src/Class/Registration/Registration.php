<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01-Nov-19
 * Time: 8:13 PM
 */

namespace App\Registration;

use App\Model\DatabaseConnection as DB;
class Registration extends DB
{
    public
        $fullname,
        $name,
        $email,
        $member_id,
        $pass,
        $type;
    public function registrationSetData($data)
    {
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
        if (array_key_exists("type",$data))
        {
            if ($data["type"] == "nurse_doctor"){
                $this->type = $data["type"];
            }
            else
            {
                $this->type = $data["type"];
            }
        }
    }
    public function insertNurse_doctor($fullname,$email,$type,$pass,$emailToken)
    {
        $array = array($fullname,$email,$type,$pass,$emailToken);
        $sql = "insert into nurse_doctor (fullname,email,type,pass,emailtoken) VALUE (?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public function insertUser($fullname,$email,$type,$pass,$emailToken)
    {
        $array = array($fullname,$email,$type,$pass,$emailToken);
        $sql = "insert into user (fullname,email,type,pass,emailtoken) VALUE (?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function checkTokenNurseDoctor($email,$code)
    {
        $sql = "select * from nurse_doctor WHERE email = '".$email."' && emailtoken = '".$code."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
     public function checkTokenUser($email,$code)
    {
        $sql = "select * from user WHERE email = '".$email."' && emailtoken = '".$code."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function checkTypeFromUserTable($email)
    {
        $sql = "select * from user WHERE email = '".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function checkTypeFromNurseDoctorTable($email)
    {
        $sql = "select * from nurse_doctor WHERE email = '".$email."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }

    public function isExistEmail()
    {
        $sql = "select email from nurse_doctor where email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function isExistEmailUser()
    {
        $sql = "select email from user where email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    /////end//////

    public function authSetData($data)
    {
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
    }
    public function admin()
    {
        $sql = "select * from admin where pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function adminAll()
    {
        $sql = "select * from admin";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function usersAll()
    {
        $sql = "select * from user WHERE activate ='yes' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function nurse_doctor()
    {
        $sql = "select * from nurse_doctor where emailtoken = 'yes' && pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function userAdminEmail($email)
    {
        $sql = "select * from admin where email ='".$email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function user()
    {
        $sql = "select * from user where  pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function userEmail($email)
    {
        $sql = "select * from user where email ='".$email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function moderatorApprovedNo()
    {
        $sql = "select * from nurse_doctor where approved = 'no'&& pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function member_idSetData($data)
    {
        if (array_key_exists("member_id",$data))
        {
            $this->member_id = $data['member_id'];
        }
    }
    public function isExistMemberId($member_id){
        $sql = "select * from member WHERE member_id = '".$member_id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function updateTokenNurseDoctor($email)
    {
        $sql = "update nurse_doctor set emailtoken = 'yes' WHERE email='".$email."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function updatePasswordNurseDoctor($pass,$email)
    {
        $array = array($pass);
        $sqls = "update nurse_doctor set pass=?,emailtoken='yes' WHERE  email='".$email."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function updatePasswordUser($pass,$email)
    {
        $array = array($pass);
        $sqls = "update user set pass=?, emailtoken='yes' WHERE  email='".$email."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function update_user_emailtoken($emailToken,$email)
    {
        $array = array($emailToken);
        $sqls = "update user set emailtoken=? WHERE  email='".$email."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
       public function update_nurse_doctor_emailtoken($emailToken,$email)
    {
        $array = array($emailToken);
        $sqls = "update nurse_doctor set emailtoken=? WHERE  email='".$email."'";
        $data = $this->conn->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public function updateTokenUser($email)
    {
        $sql = "update user set emailtoken = 'yes' WHERE email='".$email."'";
        $data = $this->conn->exec($sql);
        return $data;
    }

    public function updateUser($email)
    {
        $array = array($this->member_id);
        $sql = "update user set activate = 'yes', member_id =? WHERE email='".$email."'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

}
