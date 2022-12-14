<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Connection{
  var $servername = "localhost";
  var $username = "root";
  var $password = "";
  var $conn;

  public function __construct(){
    try {
      $this->conn = new PDO("mysql:host=$this->servername;dbname=assignment", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  public function getUser(){
    $user_id = $_SESSION['user_id'];
    $query = $this->conn->prepare("SELECT * FROM `tbl_users` WHERE `id` = $user_id LIMIT 1");
    $query->execute();
    return $query->fetch();
  }

  public function checkUser($email = NULL){
    $query = $this->conn->prepare("SELECT * FROM `tbl_users` WHERE `email` = '$email' LIMIT 1");
    $query->execute();
    return $query->fetch();
  }


  public function loginUser($email = NULL, $password = NULL){
    $query = $this->conn->prepare("SELECT * FROM `tbl_users` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1");
    $query->execute();
    return $query->fetch();
  }

  public function updateUser($name = NULL, $mobile = NULL, $age = NULL, $dob = NULL){
    $user_id = $_SESSION['user_id'];
    $query = $this->conn->prepare("UPDATE `tbl_users` SET `name`='$name',`mobile`='$mobile', `age`='$age', `dob`='$dob' WHERE `id` = $user_id");
    $query->execute();
    return TRUE;
  }

  public function registerUser($name = NULL, $email = NULL, $password = NULL){
    $create_date = date('Y-m-d');
    $create_time = date('h:i:s');
    $query = $this->conn->prepare("INSERT INTO `tbl_users`(`name`, `email`, `password`,`create_date`, `create_time`) VALUES ('$name','$email','$password','$create_date','$create_time')");
    $query->execute();
    return TRUE;
  }
}

?>