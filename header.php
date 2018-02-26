<?php
session_start();
// Test if the authentification is needed and redirect to login.php
if($NEED_TO_LOG_FOR_ACCESS)
{
    if (!isset($_SESSION['id']) AND !isset($_SESSION['firstname']))
    {
        header('Location: login.php');
    }
}
// For profile.php, test if user is logged
if(basename($_SERVER['PHP_SELF']) == "profile.php")
{
    if (!isset($_SESSION['id']) AND !isset($_SESSION['firstname'])){
        header('Location: login.php');  
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
  <link href="css/userprofile.css" rel="stylesheet">
  <!-- CSS file used for DataTables -->
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">