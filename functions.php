<?php
function isEmailAlreadyInDatabase( $email )
{
    $res = mysql_query( 'SELECT `id` FROM `user` WHERE `user_email` = \'' . mysql_real_escape_string( $email ) . '\' LIMIT 1' );
    return ( bool ) mysql_num_rows( $res );
}  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function checkPassword($pwd) {
    $errors="";
    if (strlen($pwd) < 8) {
        $errors = "Password too short!\n";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors .= "Password must include at least one number!\n";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors .= "Password must include at least one letter!\n";
    }     

    return ($errors);
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>