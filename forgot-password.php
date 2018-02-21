<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
<?php 
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    //Connect to BDD
    try{
        $bdd = new PDO('mysql:host='.$MYSQL_HOST.';dbname='.$MYSQL_DB.';charset=utf8',$MYSQL_USER,$MYSQL_PASS);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }    
    
    $email=$_POST['email'];
    $username=$_POST['username'];
    
    // Vérification des identifiants
    
    $req = $bdd->prepare('SELECT id FROM members WHERE email = :email AND username = :username');
    $req->execute(array('email' => $email, 'username' => $username));
    $resultat = $req->fetch();
    //If the username and email match, then we change the password.
    if ($resultat)
    {
        // Generateb new password
        $new_pass=randomPassword();
        $new_pass_hache = password_hash($new_pass, PASSWORD_DEFAULT);
        $req = $bdd->prepare('UPDATE `members` SET `password` = :password WHERE `id` = :id');
        $req->execute(array(
            'id' => $resultat['id'],
            'password' => $new_pass_hache));  
        // Send email
        $to = $email;
        $subject = 'New password';
        $body = 'Dear member, you will find in this message your new password. Once connected to the website, you will be able to modify it. <br>New password :<b>'.$new_pass.'</b>';
        $body .= '<br>Please contact support if you have not requested an account recovery.';
        $headers = 'From: BTZ'."\r\n";
        $headers .= 'Reply-To: '.$EMAIL."\r\n";
        $headers .= 'Return-Path: '.$EMAIL."\r\n";
        $headers .= 'X-Mailer: PHP5'."\n";
        $headers .= 'MIME-Version: 1.0'."\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        mail($to, $subject, $body, $headers);
    }


?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Password reset</h4>
          <p>An email with new password vient de vous etre envoye. N'oubliez pas de changer le mot de passe</p>
        </div>

        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
<?php } else
{
?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form action="forgot-password.php" method="post">
          <div class="form-group">
            <input class="form-control" name ="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
            <input class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
          </div>
          <input type="submit" value="Reset Password" class="btn btn-primary btn-block"/>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
<?php } ?>

  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
