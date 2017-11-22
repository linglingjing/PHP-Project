<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/reset.css" />
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/login.css" />
</head>
<body>
	<div class="page">
	<div class="loginwarrp">
		<div class="logo">管理员登陆</div>
        <div class="login_form">
			<form method="post" action="<?php echo U('/Log/login');?>">
				<li class="login-item">
					<span>用户名：</span>
					<input type="text" name="adminname" class="login_input" required="required">
				</li>
				<li class="login-item">
					<span>密　码：</span>
					<input type="password" name="adminpwd" class="login_input" required="required">
				</li>
				<li class="login-item verify">
					<span>验证码：</span>
					<input type="text" name="verify" class="login_input verify_input" required="required" placeholder="不区分大小写">
				</li>
				<img src="<?php echo U('Admin/Log/verify_c',array());?>" border="0" class="verifyimg" title="点击刷新" onClick="this.src=this.src+'?'+Math.random()"/>
				<div class="clearfix"></div>
				<li class="login-sub">
					<input type="submit" name="sub" value="登录" />
				</li>                      
           </form>
		</div>
	</div>
</div>
</body>
</body>
</html>