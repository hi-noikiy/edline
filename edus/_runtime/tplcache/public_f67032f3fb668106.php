<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>注册</title>
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
				<h2>hello, 欢迎加入某某某教育 !</h2>
				<div class="login-left fl">
					<form action="<?php echo U('public/Passport/regLogin');?>" method="post" autocomplete="off">
						<div class="username rel">
							<label for="registerform-username" class="icon-user abs"></label>
							<input type="text" value="" name="uname" class="inputxt" 
								datatype="*" errormsg="用户名必须为名字"
								 placeholder="用户名" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;"/>
							<div class="help-block help-msg"></div>
						</div>
						<div class="mobile rel">
							<label for="registerform-username" class="icon-mobile-phone abs"></label>
							<input type="text" id="phone" name="phone" class="inputxt" 
								datatype="/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/" errormsg="请填写正确手机号"
								 placeholder="手机号" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;"/>
							<div class="help-block help-msg"></div>
						</div>
						<div class="code rel clearfix">
							<label for="registerform-username" class="icon-barcode abs"></label>
							<input type="text" value="" name="verify" class="inputxt fl" 
								 errormsg="请填写正确验证码"
								 placeholder="验证码" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;"/>
								<a id="yanzheng" class="fl">获取验证码</a>
							<div class="help-block help-msg"></div>
						</div>
						<div class="username rel">
							<label for="registerform-username" class="icon-lock abs"></label>
							<input type="password" value="" name="password" class="inputxt" 
								datatype="s6-14" errormsg="密码长度必须为6-14位"
								 placeholder="密码" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;"/>
							<div class="help-block help-msg"></div>
						</div>
						<button type="submit" class="btn-primary" name="Submit">立即注册</button>
					</form>
				</div>
				<div class="login-right fr">
					<div class="san-fang fr">
						<p>已经有账号？ <a href="<?php echo U('public/Passport/up');?>">马上登录</a></p>
						<div>
							<p class="tac fast-login"> <span>快速登录</span> </p>
							<a href="jvavscript:0;" class="fl"><img src="__APP__/images/qq.png" width="80"></a>
							<a href="jvavscript:0;" class="fr"><img src="__APP__/images/wx.png" width="80"></a>
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
			});
			$("#yanzheng").click(function(){
				// alert(11111);
				phone = $("#phone").val();
				// alert(phone);
				$.ajax({
					'url':"<?php echo U('public/Passport/getVerify');?>",
					'type':'post',
					'data':{phone:phone},
					'async':true,
					'dataType':'json',
					success:function(data){
                		
                			alert(data['info']);
                		
             		}
				});
			});

		</script>
	</body>
</html>