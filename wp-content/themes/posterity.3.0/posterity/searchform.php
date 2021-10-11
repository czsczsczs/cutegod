<form method="get" class="searchaa" id="searchform" action="<?php bloginfo('url'); ?>/">
<input class="searchInput searchaaInput" type="text" value="搜索地點" name="s" id="s"/>

<button class="searcha" value="搜 索" onClick="if(document.forms['search'].searchinput.value=='- Search -')document.forms['search'].searchinput.value='';" alt="Search">
    <img class="searchimg" src="http://cutegod.cn/shijie/wp-content/uploads/sites/4/2021/09/P2-搜索.png"/>
</button>
</form>
<style type="text/css">
    .searchaa{
        width: 115%;
        height: 38px;
        display: flex;
        float: right;
        margin-right: -17.4%;
        margin-top: 5%;
        border: 1px solid #00000029;
        border-radius: 10px;
    }
    .searchaaInput{
        width: 160% !important;
        height: 36px !important;
        font-size: 16px !important;
        background-color: #ffffff !important;
        border-radius: 20px !important;
        border: 1px solid #ff000000 !important;
    }
    .searcha{
        outline:none !important;
        border:none !important;
        list-style: none !important;
        width: 30%;
        border-top-right-radius:11px !important;
        border-bottom-right-radius:11px !important;
    }
    .searchimg{
        width: 80% !important;
    }
    @media screen and (max-width: 800px){
        .searchaa {
        width: 53%;
        height: 38px;
        display: flex;
        float: left;
        margin-left: -4%;
        margin-top: 0%;
        border: 1px solid #00000029;
        border-radius: 10px;
}
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
// 当鼠标聚焦在搜索框
$('#s').focus(
function() {
if($(this).val() == '搜索地點') {
$(this).val('').css({color:"#454545"});
}
}
// 当鼠标在搜索框失去焦点
).blur(
function(){
if($(this).val() == '') {
$(this).val('搜索地點').css({color:"#333333"});
}
}
);
});
</script>
