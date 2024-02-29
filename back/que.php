<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">
        <div style="display: flex;">
            <div class="clo">問卷名稱</div>
            <input type="text" name="subject" id="">
        </div>
            <div class="clo opt">
                選項<input type="text" name="option[]" id=""><input type="button" value="更多" onclick="more()">
            </div>
    </form>
</fieldset>
<script>
    function more() {
        let opt = ` <div class="clo" >
            選項<input type="text" name="option[]" id="">
        </div>`
        $(".opt").before(opt)
    }
</script>