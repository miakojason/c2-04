<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>
    <table>
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th></th>
        </tr>
        <?php
        $news = $News->all(['sh'] == 0);
        foreach ($news as $new) {
        ?>
            <tr>
                <td class="clo"><?=$new['title'];?></td>
                <td>
                    <div id="s<?=$new['id'];?>"><?=mb_substr($new['text'],0,20);?>...</div>
                </td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>