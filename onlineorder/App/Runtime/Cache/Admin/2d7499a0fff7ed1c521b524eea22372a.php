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
		<div class="public-nav">您当前的位置：<a href="">菜品类型管理</a>&gt;<a href="#">修改菜品类型</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>修改菜品类型</h3>
			</div>
			<div class="public-content-cont">
			<form action="<?php echo U('Dishtype/modify',array('oldname'=>$name));?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">id：</label>
					<input type="text" class="form-input-txt" name="dishtypeid" value="<?php echo ($id); ?>" readonly="readonly"><!--当设置了disable属性时无法向后台传数据，只能由readonly代替-->
				</div>
				<div class="form-group">
					<label for="">菜品类型名称：</label>
					<input class="form-input-txt" type="text" name="dishtypename" required="required" value="<?php echo ($name); ?>"/>
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