<?php 
session_start();
include "config.php";
$loginErr = "";
// If logout Deleting session and session variables    
if (isset($_GET['action']) AND $_GET['action']=="logout")
{ 
    $_SESSION = array();    
    session_destroy();    
}
// If Login 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //Connect to BDD
    try{
        $bdd = new PDO('mysql:host='.$MYSQL_HOST.';dbname='.$MYSQL_DB.';charset=utf8',$MYSQL_USER,$MYSQL_PASS);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }    
    // Password hash
    
    $post_email=$_POST['email'];
    
    // Verification of credentials
    
    $req = $bdd->prepare('SELECT password,id,firstname,lastname FROM members WHERE email = :email');
    $req->execute(array('email' => $post_email));
    $resultat = $req->fetch();
    // If not in the BDD
    if (!$resultat)
    {
        $loginErr='Wrong credentials';

    }
    else
    {
        // If it is in the DBD and the password is correct
        if(password_verify($_POST['password'],$resultat[0]))
        {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['firstname'] = $resultat['firstname'];
            $_SESSION['lastname'] = $resultat['lastname'];
            header('Location: index.php');  
        }
        else{
            $loginErr='Wrong credentials';
            }
    }
}
        

?>
<!DOCTYPE html>
<html lang="en">
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

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input class="form-control" name="email" id="InputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input class="form-control" name="password" id="InputPassword1" type="password" placeholder="Password">
          </div>
          <small id="passwordHelp" class="text-danger"><?php echo $loginErr;?></small>
          <input type="submit" value="Login" class="btn btn-primary btn-block"/>
        </form>
        <div class="text-center">
          <?php if($REGISTER_OPEN == true){ ?>
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <?php } ?>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
          <?php if($NEED_TO_LOG_FOR_ACCESS == false){ ?>
          <a class="d-block small" href="index.php">Visit web site as guest</a>
          <?php } ?>
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
