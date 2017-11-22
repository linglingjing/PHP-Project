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
		<div class="public-nav">您当前的位置：<a href="">订单管理</a>&gt;<a href="#">订单状态修改</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>订单状态修改</h3>
			</div>
			<div class="public-content-cont">
			<form action="<?php echo U('order/modify');?>" method="post">
				<div class="form-group">
					<label for="">订单ID：</label>
					<input class="form-input-txt" type="text" name="orderid" value="<?php echo ($id); ?>" required readonly="readonly" />
				</div>
				<div class="form-group">
					<label for="">订单状态：</label>
					<select name="orderstate" class="form-select">
						<option value="未付款">未付款</option>
						<option value="已付款">已付款</option>
						<option value="已完成">已完成</option>
						<option value="交易关闭">交易关闭</option>
					</select>
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