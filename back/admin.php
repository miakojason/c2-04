<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table>
            <tr class="clo">
                <th>帳號</th>
                <th>密碼</th>
                <th>刪除</th>
            </tr>
            <?php
            $users = $User->all();
            foreach ($users as $user) {
                if ($user['acc'] != 'admin') {
            ?>
                    <tr>
                        <td><?= $user['acc']; ?></td>
                        <td><?= str_repeat("*", mb_strlen($user['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $user['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
</fieldset>
<h1>新增會員</h1>
<span style="color: red;">*請設定您要註冊的帳號及密碼（最長 12 個字元）</span>
<table>
    <tr>
        <th class="clo">Step1:登入帳號</th>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <th class="clo">Step2:登入密碼</th>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <th class="clo">Step3:再次確認密碼</th>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <th class="clo">Step4:信箱(忘記密碼時使用)</th>
        <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="新增" onclick="login()">
            <input type="button" value="清除" onclick="clean()">
        </td>
        <td></td>
    </tr>
</table>