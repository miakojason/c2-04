<?php $sub = $Que->find($_GET['id']); ?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $sub['text']; ?></legend>
    <h3><?= $sub['text']; ?></h3>
    <?php
    $opts = $Que->all(['subject_id' => $_GET['id']]);
    foreach ($opts as $opt) {
        $total=($sub['vote']!=0)?$sub['vote']:1;
        $rate=round($opt['vote']/$total,2);
    ?>
    <div style="display: flex;">
        <div style="width: 50%;"><?= $opt['text']; ?></div>
        <div class="clo" style="width: <?=$rate*40;?>%;"></div>
        <div style="width:10%"><?=$opt['vote'];?>票(<?=$rate*100;?>%)</div>
        </div>
        <div class="ct">
            </div>
            <?php
    }
    ?>
    <input type="button" value="返回" onclick="location.href='./index.php?do=que'">
</fieldset>