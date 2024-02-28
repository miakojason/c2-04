<?php include_once "./db.php";
$rows=$News->find($_GET['id']);
?>
<pre><h1><?=$rows['title'];?></h1><?=$rows['text'];?></pre>