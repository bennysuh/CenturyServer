<? if(!defined('IN_MOOPHP')) exit('Access Denied');?>
<script>
function checkLogin(){
	var email=$("#email").val();
	var password=$("#password").val();
	$.post("command/command_base.php?mod=check&action=login", {
		email : email,
		password:password
	}, function(data) {
		alert(data);
		if(data=="1"){
			alert("登录成功，将要跳转");
			window.location.href="index.php?showpage=admin_index";
		}
	}, "html");
}



</script>
<div class="container">
        <h2 class="form-signin-heading">爱上聚会管理</h2>
        <input id="email" type="email" class="form-control" placeholder="Email address" required="" autofocus="" value="<?php echo $_SESSION['adminname'];?>">
        <input id="password" type="password" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" onclick="checkLogin()">Sign in</button>
    </div>