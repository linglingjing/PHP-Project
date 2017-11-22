<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/reset.css" />
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/content.css" />
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">管理员管理</a>&gt;<a href="#">个人信息修改</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>个人信息修改</h3>
			</div>
			<div class="public-content-cont">
			<form action="<?php echo U('Admin/modify');?>" method="post">
				<div class="form-group">
					<label for="">管理员姓名：</label>
					<input class="form-input-txt" type="text" name="adminname" value="<?php echo $_SESSION['adminname'] ?>" required="required"/>
				</div>
				<div class="form-group">
					<label for="">旧密码：</label>
					<input class="form-input-txt" type="password" name="oldpwd" value="" required="required"/>
				</div>
				<div class="form-group">
					<label for="">新密码：</label>
					<input class="form-input-txt" type="password" name="adminpwd" value="" required="required" placeholder="请输入6-18位密码" />
				</div>
				<div class="form-group">
					<label for="">注册时间：</label>
					<input class="form-input-txt" type="text" name="adminregtime" value="<?php echo $_SESSION['adminregtime'] ?>" disabled="true" />
				</div>
				<div class="form-group" style="margin-left:150px;">
					<input type="submit" class="sub-btn" value="提  交" name="sub" />
					<input type="reset" class="sub-btn" value="重  置" />
				</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>