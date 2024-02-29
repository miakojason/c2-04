<style>
    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        min-height: 100px;
        width: 300px;
        height: 300px;
        position: absolute;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
</style>
<fieldset>
    <legend>目前位置:首頁>人氣文章區</legend>
    <table>
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th>人氣</th>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $news = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
        foreach ($news as $new) {
        ?>
            <tr>
                <td class="clo title" data-id="<?= $new['id']; ?>"><?= $new['title']; ?></td>
                <td>
                    <div id="s<?= $new['id']; ?>"><?= mb_substr($new['text'], 0, 20); ?>...</div>
                    <div class="pop" id="a<?= $new['id']; ?>" style="display:none">
                        <h3 style="color:aqua"><?= $new['title']; ?></h3><?= $new['text'] ?>
                    </div>
                </td>
                <td><span><?= $new['good']; ?>個人說</span><img src="./icon/02B03.jpg" style="width:15px">
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $new['id'], 'acc' => $_SESSION['user']]) > 0) {
                    ?>
                            <a href="Javascript:good(<?= $new['id']; ?>)">收回讚</a>
                        <?php
                        } else {
                        ?>
                            <a href="Javascript:good(<?= $new['id']; ?>)">讚</a>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if ($now > 1) {
            $prev = $now - 1;
            echo "<a href='?do=$do&p=$prev'><</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? '24px' : '16px';
            echo "<a href='?do=$do&p=$i'style='font-size:$fontsize'>$i</a>";
        }
        if ($now < $pages) {
            $next = $now + 1;
            echo "<a href='?do=$do&p=$next'>></a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $(".title").hover(function() {
        $(".pop").hide()
        let id = $(this).data('id')
        $("#a" + id).show()
    })

    function good(id) {
        $.post("./api/good.php", {
            id
        }, (res) => {
            location.reload()
        })
    }
</script>