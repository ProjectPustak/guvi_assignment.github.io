<?php 
  session_start();
  if(isset($_SESSION['user_loggedin'])){
    header('location:profile.php');
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <div class="container h-100 w-100">
      <div class="d-flex justify-content-center align-items-center p-2 h-100 w-100">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Enter Registration Details
              </div>
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name"/>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email"/>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"/>
                  </div>
                  <div>
                    Already have an account?&nbsp;<a href="login.php">Login here</a>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Register</button>
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
  <script type="text/javascript" src="js/register.js"></script>
</body>
</html>