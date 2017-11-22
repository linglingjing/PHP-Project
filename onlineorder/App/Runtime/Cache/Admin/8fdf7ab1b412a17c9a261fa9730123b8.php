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
		<div class="public-nav">您当前的位置：<a href="">席位管理</a>&gt;<a href="#">添加席位</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>添加席位</h3>
			</div>
			<div class="public-content-cont">
			<form action="<?php echo U('Seat/modify',array('oldtype'=>$select['type']));?>" method="post">
				<div class="form-group">
					<label for="">id：</label>
					<input class="form-input-txt" type="text" name="seatid" value="<?php echo ($select["id"]); ?>" required="required" readonly="readonly" />
				</div>
				<div class="form-group">
					<label for="">席位类型：</label>
					<input class="form-input-txt" type="text" name="seattype" value="<?php echo ($select["type"]); ?>" required="required"/>
				</div>
				<div class="form-group">
					<label for="">库存量：</label>
					<input class="form-input-txt" type="number" name="seatstock" value="<?php echo ($select["stock"]); ?>" required="required"/>
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