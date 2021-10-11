<!--Column2/Sidebar-->


<div class="grid_4 gd widget-area" id="secondary" style="float: left;margin-left: -10%;margin-top: 9%;">

<?php if(!function_exists('dynamic_sidebar')||!dynamic_sidebar('First_sidebar')):?>

    
<div id="menu" style="margin-top: -40%;">
<ul style="display:flex;flex-direction: column;">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
        <li style="margin-top:15%"><a style="display:flex;flex-direction: row;"><h2 style="font-size: 26px;">萌遊世界</h2><b></b></a>
            <ul style="font-size:20px;">
                <li>
                    <?php wp_list_pages('sort_column=post_date&title_li=&depth=2&include=&exclude=90'); ?>
                </li>
                
                
            </ul>
                
        </li>
                <li style="margin-top:15%"><a href="https://cutegod.cn/"><h2 style="font-size: 26px;">萌小福官網</h2></a></li>
                <li style="margin-top:15%"><a href="https://cutegod.cn/jieqing/"><h2 style="font-size: 26px;">節慶中華</h2></a></li>
</ul>
        
</div>
<?php endif;?>
</div>

<div class="hrgrid_12clearfix">&nbsp;</div>
<style type="text/css">
    .gd{
        margin-right: -6%;
        margin-top: 11%;
        float: right;
    }
    ul,ol,li{list-style:none;padding:0px;margin:0px;}
     #menu li{line-height:54px;} 
    #menu a{
    text-decoration:none;
    display:block;
    }
    #menu ul{
    text-align:left;
    }
    #menu .arrow{ /* 菜单项的右侧小箭头 */
    float:right;
    padding-right:5px;
    }
    #menu>ul{height:30px;} /* 即使没有菜单项也能保持顶级菜单栏的高度。 */
    /* 一级菜单 */
    #menu>ul>li{
    display:inline-block;
    width:180px;
    }
    #menu>ul>li:hover{color:#e80000;}
    #menu>ul>li>a{color:#000000;}
    
    #menu>ul>li>a:hover h2{color:#e80000;}
    
    #menu>ul>li>a:hover b{border-color: #e80000 transparent transparent transparent;}
    /* 下拉的菜单栏 */
    #menu>ul>li ul{
    display:none;
    width:260px;
    position:relative;
    float: right;
    margin-right: -73%;
    background:#eeeeee40;
    }
    /* 下拉菜单的菜单项 */
    #menu>ul>li>ul li{padding-left:5px; position:relative;margin-bottom:10px;}
    #menu>ul>li>ul li>a{color:#000;}
    #menu>ul>li>ul li>a:hover{color:#e80000;}
    /* #menu>ul>li>ul li:hover{background:#dedede;} */
    /* 三级及以下的菜单项的定位 */
    #menu>ul>li>ul>li ul{left:150px; top:0px;}
    #menu>ul>li>a>b{
        width: 0;
        height: 0;
        left: 7px;
        top: 12px;
        border: 10px solid;
        border-color: black transparent transparent transparent;
        position: relative;
    }
    #menu>ul>li>a>b::after{
        content: '';
        position: absolute;
        top: -14px;
        left: -10px;
        border: 10px solid;
        border-color: white transparent transparent transparent;
    }
</style>
<script>
    $(document).ready(function()
    {
    /* 菜单初始化 */
    // $('#menu>ul>li>ul').find('li:has(ul:not(:empty))>a').append("<span class='arrow'>></span>"); // 为有子菜单的菜单项添加'>'符号
    $("#menu>ul>li").bind('mousedown',function() // 顶级菜单项的鼠标移入操作
    {
    $(this).children('ul').slideDown('normal');
    }).bind('mouseleave',function() // 顶级菜单项的鼠标移出操作
    {
    $(this).children('ul').slideUp('normal');
    });
    $('#menu>ul>li>ul li').bind('mousedown',function() // 子菜单的鼠标移入操作
    {
    $(this).children('ul').slideDown('normal');
    }).bind('mouseleave',function() // 子菜单的鼠标移出操作
    {
    $(this).children('ul').slideUp('normal');
    });
    });
</script>
<div class="Xian" style="position: absolute;margin-left: 45%;width: 1px;height: 110%;background: #a9a9a91f;box-shadow:3px 0px 5px #99999959;"></div>
<style type="text/css">
@media only screen and (max-width: 1300px) {
    .Xian{
        display:none;
    }
}
</style>