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
		<div class="public-nav">您当前的位置：<a href="">管理员管理</a>&gt;<a href="#">个人信息</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>个人信息</h3>
			</div>
			<div class="public-content-cont">
				<div class="form-group">
					<span>管理员ID:</span>
					<span><?php echo $_SESSION['adminid'] ?></span>
				</div>
				<div class="form-group">
					<span>管理员姓名:</span>
					<span><?php echo $_SESSION['adminname'] ?></span>
				</div>
				<div class="form-group">
					<span>密码：</span>
					<span><?php echo $_SESSION['adminpwd'] ?></span>
				</div>
				<div class="form-group">
					<span>权限：</span>
					<?php if(strcmp($_SESSION['super'],'1')): ?><span>超级管理员</span>
					<?php else: ?>
						<span>普通管理员</span><?php endif; ?>
				</div>
				<div class="form-group">
					<span>注册时间：</span>
					<span><?php echo $_SESSION['adminregtime'] ?></span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>