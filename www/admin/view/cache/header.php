<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../favicon.ico">
<title>爱上聚会</title>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="../html/dist/css/bootstrap.min.css">
<script src="../html/js/jquery-1.7.1.min.js"></script>
<script src="../html/dist/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="html/dist/html5shiv.min.js"></script>
      <script src="html/dist/respond.min.js"></script>
<![endif]-->
</head>
<style>
.info{
	color:#999999;
}
.row{
	padding-left:0px;
padding-right:0px;
margin-left:0px;
margin-right:0px;
}

#globalAlert{
	position:fixed;
	z-index:999999;
display:none;
	top:0px;
	color:#ffffff;
	padding:0px 20px;
}
</style>
<script type="text/javascript">
function showGlobalAlert(content){
	$("#globalAlert").css("background-color","green");
    $("#globalAlert").html(content);
    centershow($('#globalAlert'));
    $("#globalAlert").fadeIn(100);
    setTimeout("hideGlobalAlert()",2000);
}

function showGlobalAlertError(content){
	$("#globalAlert").css("background-color","red");
    $("#globalAlert").html(content);
    centershow($('#globalAlert'));
    $("#globalAlert").fadeIn(100);
    setTimeout("hideGlobalAlert()",2000);
}

function hideGlobalAlert(){
    $("#globalAlert").fadeOut(200);
}
function centershow(obj) {
    var screenWidth = $(window).width();
    var screenHeight = $(window).height();  //当前浏览器窗口的 宽高
    var scrolltop = $(document).scrollTop();//获取当前窗口距离页面顶部高度
    var objLeft = (screenWidth - obj.width())/2 ;
    var objTop = (screenHeight - obj.height())/2 + scrolltop;
    //$('.msgdetail_content').css("left" , "'"+objLeft + "px'");
    obj.css( "left" , objLeft + "px");
    obj.css("display" , "block");
    //obj.css("top" , "'"+objTop + "px'");
    //浏览器窗口大小改变时
    $(window).resize(function() {
        screenWidth = $(window).width();
        screenHeight = $(window).height();
        scrolltop = $(document).scrollTop();
        objLeft = (screenWidth - obj.width())/2 ;
        //objTop = (screenHeight - obj.height())/2 + scrolltop;
        obj.css("left" , objLeft + "px");
    });
    //浏览器有滚动条时的操作、
    $(window).scroll(function() {
        screenWidth = $(window).width();
        screenHeight = $(widow).height();
        scrolltop = $(document).scrollTop();
        objLeft = (screenWidth - obj.width())/2 ;
        //objTop = (screenHeight - obj.height())/2 + scrolltop;
        obj.css("left" , objLeft + "px");
    });
   
}
</script>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">爱上聚会后台</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <!-- 
        <li class="active"><a href="#">空</a></li>
        <li><a href="#">空</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">真心话大冒险<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?showpage=punish_shenhe">审核</a></li>
            <li><a href="index.php?showpage=punish_edit">管理</a></li>
            <li class="divider"></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">推送<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?showpage=push_edit">已发</a></li>
            <li><a href="index.php?showpage=push_new">新建</a></li>
          </ul>
        </li>
       </ul>
             <ul class="nav navbar-nav">
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">游戏<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?showpage=punish_shenhe">列表</a></li>
            <li><a href="index.php?showpage=push_e">新建</a></li>
          </ul>
        </li>
       </ul>
      <ul class="nav navbar-nav">
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">邮件<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?showpage=punish_shenhe">列表</a></li>
            <li><a href="index.php?showpage=punish_edit">新建</a></li>
          </ul>
        </li>
       </ul>
      <!-- 
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

