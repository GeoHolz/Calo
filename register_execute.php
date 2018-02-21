<?php 
// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $GO_IN_DATABASE = True;
    $email_recu=$_POST['email'];
    $username_recu=$_POST['username'];
    $password_recu=$_POST['password'];
    
    // Test username
    if (empty($username_recu)) {
        $usernameErr = "username is required";
        $GO_IN_DATABASE = False;
    } else {
        $username = test_input($username_recu);
        // check if username only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z1.9]*$/",$username)) {
            $usernameErr = "Username : Only letters and white space allowed\n";
            $GO_IN_DATABASE = False;
        }   
    }
    //Test email     
    if (empty($email_recu)) {
        $emailErr = "Email is required";
        $GO_IN_DATABASE = False;
    } else {
        $email = test_input($email_recu);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $GO_IN_DATABASE = False;
        }
    }
    //Connect to BDD
    try{
        $bdd = new PDO('mysql:host='.$MYSQL_HOST.';dbname='.$MYSQL_DB.';charset=utf8',$MYSQL_USER,$MYSQL_PASS);
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }       
    //Test is username already exists
    $query=$bdd->query("SELECT count(*) FROM members WHERE username = '$username_recu'");
    if($query->fetchColumn()> 0){
        $GO_IN_DATABASE = False;
        $usernameErr = "username already exists\n";
    }
    //Test is email already exists
    $query=$bdd->query("SELECT count(*) FROM members WHERE email = '$email'");
    if($query->fetchColumn()> 0){
        $GO_IN_DATABASE = False;
        $emailErr = "email already exists\n";
    }    
    
    $checkPassword=checkPassword($password_recu);
    if($checkPassword!=""){
        $passwordErr=$checkPassword;
        $GO_IN_DATABASE = False;
    }

    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Insert if all is OK

    if($GO_IN_DATABASE){
        $req = $bdd->prepare('INSERT INTO members(username, password, email, date_signup) VALUES(:pseudo, :pass, :email, CURDATE())');

        $req->execute(array(
            'pseudo' => $username_recu,
            'pass' => $pass_hache,
            'email' => $email_recu));
            
        header('Location: login.php');  
    }
 
}//End of If POST



    
?>