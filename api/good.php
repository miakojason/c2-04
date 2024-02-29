<?php include_once "./db.php";
if(isset($_POST['id'])){
    if($Log->count(['news'=>$_POST['id'],'acc'=>$_SESSION['user']])>0){
        $Log->del($_POST['id']);
    }else{
        $Log->save(['news'=>$_POST['id'],'acc'=>$_SESSION['user']]);
    }
}