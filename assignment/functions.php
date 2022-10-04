<?php
session_start();
include('connection.php');
$obj = new Connection;
$_action = $_GET['action'];

if($_action == 'get-user'){
  $user_details = $obj->getUser();
  return $user_details;
}

if($_action == 'login'){
  extract($_POST);
  if((!isset($email)) && (empty($email))){
    $resp = array(
      'status' => FALSE,
      'title' => 'Not allowed!',
      'html' => 'Email is required.'
    );
    echo json_encode($resp);
    die;
  }
  if((!isset($password)) && (empty($password))){
    $resp = array(
      'status' => FALSE,
      'title' => 'Not allowed!',
      'html' => 'Password is required.'
    );
    echo json_encode($resp);
    die;
  }
  $user = $obj->loginUser($email, $password);
  if(!empty($user)){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_loggedin'] = TRUE;
    $resp = array(
      'status' => TRUE,
      'title' => 'Done!',
      'html' => 'Login success.'
    );
    echo json_encode($resp);
    die;
  } else {
    $resp = array(
      'status' => FALSE,
      'title' => 'Not Allowed!',
      'html' => 'User not found.'
    );
    echo json_encode($resp);
    die;
  }
}

if($_action == 'logout'){
  unset($_SESSION['user_name']);
  unset($_SESSION['user_email']);
  unset($_SESSION['user_loggedin']);
  $resp = array(
    'status' => TRUE,
    'title' => 'Done!',
    'html' => 'Logout success.'
  );
  echo json_encode($resp);
  die;
}

if($_action == 'register'){
  extract($_POST);
  if( (!isset($_POST['name'])) || (empty($name)) ){
    $resp = array(
      'status' => FALSE,
      'title' => 'Not allowed!',
      'html' => 'Name is required.'
    );
    echo json_encode($resp);
    die;
  }
  if( (!isset($_POST['email'])) || (empty($email)) ){
    $resp = array(
      'status' => FALSE,
      'title' => 'Not allowed!',
      'html' => 'E-mail is required.'
    );
    echo json_encode($resp);
    die;
  }
  $user = $obj->checkUser($email);
  if(!empty($user)){
    $resp = array(
      'status' => FALSE,
      'title' => 'Not allowed!',
      'html' => 'E-mail already exist try another email.'
    );
    echo json_encode($resp);
    die;
  }
  
  if( (!isset($_POST['password'])) || (empty($password)) ){
    $resp = array(
      'status' => FALSE,
      'title' => 'Not allowed!',
      'html' => 'Password is required.'
    );
    echo json_encode($resp);
    die;
  }
  if($obj->registerUser($name, $email, $password)){
    $resp = array(
      'status' => TRUE,
      'title' => 'Done!',
      'html' => 'Register successfully.'
    );
    echo json_encode($resp);
    die;
  } else {
    $resp = array(
      'status' => FALSE,
      'title' => 'Not Allowed!',
      'html' => 'Something went wrong. Please check.'
    );
    echo json_encode($resp);
    die;
  }
}

if($_action == 'update'){
  extract($_POST);
  if(empty($name)){
    $resp = array(
      'status' => FALSE,
      'title' => 'Not allowed!',
      'html' => 'Name is required.'
    );
    echo json_encode($resp);
    die;
  }
  if($obj->updateUser($name, $mobile, $age, $dob)){
    $resp = array(
      'status' => TRUE,
      'title' => 'Done!',
      'html' => 'Update successully done.'
    );
    echo json_encode($resp);
    die;
  } else {
    $resp = array(
      'status' => FALSE,
      'title' => 'Not Allowed!',
      'html' => 'Something went wrong.Please check.'
    );
    echo json_encode($resp);
    die;
  }
}