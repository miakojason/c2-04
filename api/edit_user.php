<?php include_once "./db.php";
if($_POST['del']){
    foreach($_POST['del'] as $id){
        $User->del($id);
    }
}
to("../back.php?do=admin");

