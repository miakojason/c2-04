<?php include_once "./db.php";
if(isset($_POST['subject'])){
    $sub['text']=$_POST['subject'];
    $sub['subject_id']=0;
    $Que->save($sub);
    $subject_id=$Que->max('id');
}
if(isset($_POST['option'])){
    foreach($_POST['option'] as $option){
        $opt['text']=$option;
        $opt['subject_id']=$subject_id;
        $Que->save($opt);
    }
}
to("../back.php?do=que");