<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Calo version</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<?php
    include "config.php";
    include "register_execute.php";
?>
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <?php if($REGISTER_OPEN){ ?>
      <div class="card-body">
        <form action="register.php" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputName">Username</label>
                <input class="form-control" name="username" id="username" type="text" aria-describedby="nameHelp" placeholder="Enter Username">
              </div>
            </div>
            <small id="passwordHelp" class="text-danger"><?php echo $usernameErr;?></small>
          </div>
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="passwordHelp" class="text-danger"><?php echo $emailErr;?></small>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputPassword">Password</label>
                <input class="form-control" name="password" id="password" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="ConfirmPassword">Confirm password</label>
                <input class="form-control" id="ConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
            <small id="passwordHelp" class="text-danger"><?php echo $passwordErr;?></small>
          </div>
          <input type="submit" value="Register" class="btn btn-primary btn-block"/>
        </form>
      <?php }else{ ?>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Register Closed, Go back to home</a>
        </div>
      <?php } ?>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
<script>
//Script to validate the confirm password
var password = document.getElementById("password")
  , confirm_password = document.getElementById("ConfirmPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

//Script to validate email address
var email = document.getElementById("email")

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  var email = $("#email").val();
  if (validateEmail(email)) {
    email.setCustomValidity("Passwords Don't Match");
  } else {
    email.setCustomValidity("");
  }
  return false;
}

email.onchange = validate;


</script>
