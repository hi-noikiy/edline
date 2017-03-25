<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="__APP__/style.css">
		<link rel="stylesheet" type="text/css" href="__APP__/font-awesome.min.css">
		<script type="text/javascript" src="__APP__/js/jquery-1.11.1.min.js"></script>
		<script src="__APP__/js/Validform_v5.3.2_min.js"></script>
	</head>
	<body>
		<!--==Header==-->
		<div class="header">
			<div class="nav-header wrap clearfix">
				<h1 class="logo fl">
					<a href="<?php echo U('classroom/Index/index');?>">教育</a>
				</h1>
				<!--==用户未登录==-->
				<ul class="nav-up-0 fr clearfix">
					<li><a href="<?php echo U('public/Passport/up');?>">登录</a></li>
					<li>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
					<li><a href="<?php echo U('public/Passport/log');?>">注册</a></li>
				</ul>
			</div>
		</div>
		<!--==Header end==-->
		<div class="login-bg">
			<div class="login login-wrap clearfix">
				<h2>hello, 欢迎登录某某某教育 !</h2>
				<div class="login-left fl">
					<form action="<?php echo U('public/Passport/doLogin');?>" method="post" autocomplete="off">
						<div class="username rel">
							<label for="registerform-username" class="icon-user abs"></label>
							<input type="text" value="" name="login_email" class="inputxt" 
								datatype="*" errormsg="用户名不能为空"
								 placeholder="用户名" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;"/>
							<div class="help-block help-msg"></div>
						</div>
						<div class="username rel">
							<label for="registerform-username" class="icon-lock abs"></label>
							<input type="password" value="" name="login_password" class="inputxt" 
								datatype="s3-14" errormsg="密码长度必须为3-14位"
								 placeholder="密码" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;"/>
							<div class="help-block help-msg"></div>
						</div>
						<button type="submit" class="btn-primary" name="Submit">立刻登录</button>
					</form>
				</div>
				<div class="login-right fr">
					<div class="san-fang fr">
						<p>还没有账号？ <a href="<?php echo U('public/Passport/log');?>">马上注册</a></p>
						<div>
							<p class="tac fast-login"> <span>快速登录</span> </p>
							<a href="<?php echo U('public/Passport/quickLogin');?>" class="fl"><img src="__APP__/images/qq.png" width="80"></a>
							<a href="<?php echo U('public/Passport/quickLogin');?>" class="fr"><img src="__APP__/images/wx.png" width="80"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				//$(".registerform").Validform();  //就这一行代码！;
				$(".login-left").Validform({
					tiptype:function(msg,o,cssctl){
						if(!o.obj.is("form")){
							var objtip=o.obj.siblings(".help-block");
							cssctl(objtip,o.type);
							objtip.text(msg);
						}
					},
					usePlugin:{
					jqtransform:{}}
				});
			})
		</script>
	</body>
</html>