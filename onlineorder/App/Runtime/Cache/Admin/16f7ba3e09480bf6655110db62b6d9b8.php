<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/reset.css" />
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/content.css" />
	<link rel="stylesheet" href="/onlineorder/Public/paging.css">
	<script src="/onlineorder/Public/Admin/js/jquery.min.js"></script>
	<script>
		//ajax删除操作 
		function Delete(id){
			if(confirm("真的要删除吗？")){
				$.ajax({
					type:"POST",
					url:"<?php echo U('Dish/Delete');?>",
					data:{"id":id},
					dataType:"json",
					success:function(data){
						alert(data);
					},
					error:function(){
						alert("删除失败。");
					}
				});
			}else{
				return;
			}
		}

		// 动态获取分类菜品信息
		$(document).ready(function(){
			$("#select").change(function(){
				var id=$("#select").val();//获取子类型菜品id
				console.log(id);
				$.ajax({
					type:"POST",
					url:"<?php echo U('Dish/getData');?>",
					data:{"id":id},
					dataType:"json",
					success:function(data){
						var html="<table class='public-cont-table'><tr><th>ID</th><th>菜品名称</th><th>菜品类型</th><th>价格</th><th>销售量</th><th>图片</th><th>介绍</th><th>操作</th></tr>";
						for(var i=0;i<data.length;i++){
							html+="<tr><td>"+data[i].id+"</td><td>"+data[i].name+"</td><td>"+data[i].dishtype+">>"+data[i].subdishtype+"</td><td>"+data[i].price+"</td><td>"+data[i].sellcount+"</td><td><img src="+data[i].small_pic+"><img src="+data[i].middle_pic+"><img src="+data[i].big_pic1+"></td><td>"+data[i].info+"</td><td><div class='table-fun'><a href='<?php echo U('Dish/dishmodify',array('id'=>$s['id']));?>'>修改</a><a href='' onclick='Delete("+data[i].id+")'>删除</a></div></td></tr>";
						}
						html+="</table>";
						$(".public-cont-table").replaceWith(html);
						$(".pages").replaceWith("");
					},
					error:function(){
						alert("获取信息失败。");
					}
				});
			});
		});
	</script>
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">菜品管理</a>&gt;<a href="">菜品列表</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3 style="float: left; display: inline-block;">菜品信息</h3>
				<div style="float: right; margin-bottom: 5px;">
					<select name="dishtypeid" class="form-select" id="select">
						<?php if(is_array($dtinfo)): foreach($dtinfo as $key=>$d): ?><option value="<?php echo ($d["id"]); ?>"><?php echo ($d["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
			</div>
			<div class="public-content-cont">
				<table class="public-cont-table">
					<tr>
						<th>ID</th>
						<th>菜品名称</th>
						<th>菜品类型</th>
						<th>价格</th>
						<th>销售量</th>
						<th>图片</th>
						<th>介绍</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($select)): foreach($select as $key=>$s): ?><tr>
						<td><?php echo ($s["id"]); ?></td>
						<td><?php echo ($s["name"]); ?></td>
						<td><?php echo ($s["dishtype"]); ?>>><?php echo ($s["subdishtype"]); ?></td>
						<td><?php echo ($s["price"]); ?></td>
						<td><?php echo ($s["sellcount"]); ?></td>
						<td>
							<img src="<?php echo ($s['small_pic']); ?>">
							<img src="<?php echo ($s['middle_pic']); ?>">
							<img src="<?php echo ($s['big_pic1']); ?>">
						</td>
						<td><?php echo ($s["info"]); ?></td>
						<td>
							<div class="table-fun">
								<a href="<?php echo U('Dish/dishmodify',array('id'=>$s['id']));?>">修改</a>
								<a href="" onclick="Delete(<?php echo ($s['id']); ?>)">删除</a>
							</div>
						</td>
					</tr><?php endforeach; endif; ?>
				</table>
				<div class="pages">
					<?php echo ($page); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>