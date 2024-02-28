<div class="nav">目前位置:首頁>分類網誌><span class="type">健康新知</span></div>
<fieldset>
    <legend>分類網誌</legend>
    <a class="type-item" data-type=1>健康新知</a>
    <a class="type-item" data-type=2>菸害防治</a>
    <a class="type-item" data-type=3>癌症防治</a>
    <a class="type-item" data-type=4>慢性病防治</a>
</fieldset>
<fieldset>
    <legend>文章列表</legend>
<div class="list-item"></div>
<div class="article"></div>
</fieldset>
<script>
     getlist(1)
    $(".type-item").on('click',function(){
        $(".type").text($(this).text())
        let type=$(this).data('type')
        getlist(type)
    })
    function getlist(type){
$.get("./api/getlist.php",{type},(list)=>{
    $(".list-item").html(list)
    $(".article").hide()
    $(".list-item").show()
})
    }
    function getnews(id){
$.get("./api/getnews.php",{id},(news)=>{
    $(".article").html(news)
    $(".article").show()
    $(".list-item").hide()
})
    }
</script>