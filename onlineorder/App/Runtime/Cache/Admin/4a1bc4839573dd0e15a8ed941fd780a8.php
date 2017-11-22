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
		<div class="public-nav">您当前的位置：<a href="">菜品管理</a>&gt;<a href="#">菜品信息修改</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>菜品信息修改</h3>
			</div>
			<div class="public-content-cont">
			<form action="<?php echo U('Dish/modify',array('oldname'=>$select['name']));?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">菜品ID：</label>
					<input class="form-input-txt" type="text" name="dishid" value="<?php echo ($select["id"]); ?>" required readonly="readonly" />
				</div>
				<div class="form-group">
					<label for="">菜品名称：</label>
					<input class="form-input-txt" type="text" name="dishname" value="<?php echo ($select["name"]); ?>" required/>
				</div>
				<div class="form-group">
					<label for="">菜品类型：</label>
					<select name="dishtype" class="form-select" id="selectId">
						<?php if(is_array($dtinfo)): foreach($dtinfo as $key=>$i): ?><option value="<?php echo ($i["id"]); ?>"><?php echo ($i["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
				
				<div class="form-group">
					<label for="">价格：</label>
					<input class="form-input-txt" type="number" name="dishprice" value="<?php echo ($select["price"]); ?>" required/>
				</div>
				<div class="form-group">
					<label for="">说明：</label>
					<textarea  name="dishinfo" class="form-textarea" cols="40" rows="10" value="<?php echo ($select["info"]); ?>" required id="dishinfo" ></textarea>
				</div>
				<div class="form-group">
					<label for="">图片：</label>
					<input class="form-input-txt" type="text" id="photoName1"/>
					<div class="file"><input type="file" class="form-input-file" name="photo[]" onchange ="upload1()" id="photo1"/>选择文件</div>
				</div>
				<div class="form-group" style="margin-left:150px;">
					<input type="submit" class="sub-btn" value="提  交" name="sub" />
					<input type="reset" class="sub-btn" value="重  置" />
				</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		//select动态选择		
	 	var select=document.getElementById("selectId");
	 	for(var i=0;i<select.options.length;i++){
	 		if(select.options[i].value==<?php echo ($select["subdishtypeid"]); ?>){
	 			select.options[i].selected=true;
	 			break;
	 		}	
		}
	</script>
	<script type="text/javascript">
		document.getElementById("dishinfo").value="<?php echo ($select["info"]); ?>";
		function upload1(){
	    	var value=document.getElementById("photo1").value;
	    	document.getElementById("photoName1").value=value;
	    }
	</script>
	
</body>
</html>