<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  if(!isset($_SESSION['user_loggedin'])){
    header('location:login.php');
  }
  include('connection.php');
  $obj = new Connection;
  $user_details = $obj->getUser();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>My Profile</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <div class="container">
      <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Hi, <?= $user_details['name']; ?></a>
        <button type="button" class="btn btn-outline-danger my-2 my-sm-0" id="btnLogout" >Logout</button>
      </nav>
      <div class="d-flex justify-content-center p-5 h-100">
        <div class="row w-50">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Your Details
              </div>
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="<?= $user_details['name']; ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="<?= $user_details['email']; ?>" disabled readonly/>
                  </div>
                  <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" id="mobile" name="mobile" aria-describedby="mobile" value="<?= $user_details['mobile']; ?>" minlength="10" maxlength="10"/>
                  </div>
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?= $user_details['age']; ?>" aria-describedby="age"/>
                  </div>
                  <div class="form-group">
                    <label for="dob">Date of birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?= $user_details['dob']; ?>" aria-describedby="dob"/>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
  <script type="text/javascript" src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <script type="text/javascript" src="js/profile.js"></script>
</body>
</html>