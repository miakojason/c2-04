<?php include_once "./db.php";
$res=$User->find(['email'=>$_GET['email']]);