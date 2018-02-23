<?php 
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = "";
$username = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $GO_IN_DATABASE = True;
    $post_password=$_POST['password']; 
    $post_lastname=purify_text($_POST['lastname']);
    $post_firstname=purify_text($_POST['firstname']);
    $post_email=purify_text($_POST['email']);
    
    // Test Firstname
    if (empty($post_firstname)) {
        $usernameErr = "firstname is required";
        $GO_IN_DATABASE = False;
    } else {
        // check if variable only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z1.9]*$/",$post_firstname)) {
            $firstnameErr = "firstname : Only letters and white space allowed\n";
            $GO_IN_DATABASE = False;
        }   
    }    
    // Test Lastname
    if (empty($post_lastname)) {
        $lastnameErr = "lastname is required";
        $GO_IN_DATABASE = False;
    } else {
        // check if variable only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z1.9]*$/",$post_lastname)) {
            $firstnameErr = "firstname : Only letters and white space allowed\n";
            $GO_IN_DATABASE = False;
        }   
    } 
    //Test email     
    if (empty($post_email)) {
        $emailErr = "Email is required";
        $GO_IN_DATABASE = False;
    } else {
        // check if e-mail address is well-formed
        if (!filter_var($post_email, FILTER_VALIDATE_EMAIL)) {
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
    //Test is email already exists
    $query=$bdd->query("SELECT count(*) FROM members WHERE email = '$post_email'");
    if($query->fetchColumn()> 0){
        $GO_IN_DATABASE = False;
        $emailErr = "email already exists\n";
    }    
    
    $checkPassword=checkPassword($post_password);
    if($checkPassword!=""){
        $passwordErr=$checkPassword;
        $GO_IN_DATABASE = False;
    }

    $pass_hash = password_hash($post_password, PASSWORD_DEFAULT);


    // Insert if all is OK

    if($GO_IN_DATABASE){
        $req = $bdd->prepare('INSERT INTO members(firstname, lastname, password, email, date_signup) VALUES(:firstname, :lastname, :pass, :email, CURDATE())');

        $req->execute(array(
            'firstname' => $post_firstname,
            'lastname' => $post_lastname,
            'pass' => $pass_hash,
            'email' => $post_email));
            
        header('Location: login.php');  
    }
 
}//End of If POST



    
?>