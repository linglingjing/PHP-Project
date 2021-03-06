<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/reset.css" />
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/content.css" />
	<script src="/onlineorder/Public/Admin/js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		  $("#dishtype").change(function(){
		  	var $id=$("#dishtype").val();//一级的id
		  	$.ajax({
			type:"POST",
			url:"<?php echo U('Dish/getSubtype');?>",
			data:{"id":$id},
			dataType:"json",
			success:function(data){
				
				var html="<select name='sub_dishtype' class='form-select' id='sub_dishtype'>";

				for (var i = data.length - 1; i >= 0; i--) {
					html+="<option value='"+data[i].sub_id+"'>"+data[i].sub_name+"</option>";
				};
				html+="</select>"
				$("#sub_dishtype").replaceWith(html);
				
				
			},
			error:function(){
				alert("获取信息失败");
			}
		});
		  });
		});
	</script>
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">菜品管理</a>&gt;<a href="#">添加菜品</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>添加菜品</h3>
			</div>
			<div class="public-content-cont">
			<form action="<?php echo U('Dish/Add');?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">菜品名称：</label>
					<input class="form-input-txt" type="text" name="dishname" value="" required="required" placeholder="请输入中文" />
				</div>
				<div class="form-group">
					<label for="">菜品类型：</label>
					<select name="dishtype" class="form-select" id="dishtype">
						<?php if(is_array($dtinfo)): foreach($dtinfo as $key=>$i): ?><option value="<?php echo ($i["id"]); ?>"><?php echo ($i["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<select name="sub_dishtype" class="form-select" id="sub_dishtype">
						<?php if(is_array($sub_dishtypes)): foreach($sub_dishtypes as $key=>$i): ?><option value="<?php echo ($i["id"]); ?>"><?php echo ($i["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="">价格：</label>
					<input class="form-input-txt" type="text" name="dishprice" value="" required="required"/>
				</div>
				<div class="form-group">
					<label for="">说明：</label>
					<textarea name="dishinfo" class="form-textarea" cols="40" rows="10" value="" required ></textarea>
				</div>
				<div class="form-group">
					<label for="">图片：</label>
					<input class="form-input-txt" type="text" value=""  id="photoName1" required="required"/>
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
		function upload1(){
	    	var value=document.getElementById("photo1").value;
	    	document.getElementById("photoName1").value=value;
	    }
	</script>
</body>
</html>