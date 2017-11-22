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
		<div class="public-nav">您当前的位置：<a href="">管理员管理</a>&gt;<a href="#">添加管理员</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>添加管理员</h3>
			</div>
			<div class="public-content-cont">
			<form action="<?php echo U('Admin/Add');?>" method="post">
				<div class="form-group">
					<label for="">管理员姓名：</label>
					<input class="form-input-txt" type="text" name="adminname" value="" placeholder="请输入真实姓名" required="required" />
				</div>
				<div class="form-group">
					<label for="">密码：</label>
					<input class="form-input-txt" type="password" name="adminpwd" value="" required="required" placeholder="请输入6-18位密码" />
				</div>
				<div class="form-group">
					<label for="">确认密码：</label>
					<input class="form-input-txt" type="password" name="repwd" value="" required="required"/>
				</div>
				<div class="form-group">
					<label for="">权限：</label>
					<input class="form-input-radius" type="radio" name="adminsuper" value="1"><span style="height: 32px;line-height: 32px;display: inline-block;">超级管理员</span>
					<input class="form-input-radius" type="radio" name="adminsuper" value="0" checked="checked"><span style="height: 32px;line-height: 32px;display: inline-block;">普通管理员</span>
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