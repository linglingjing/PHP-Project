<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/reset.css" />
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/content.css" />
	<link rel="stylesheet" href="/onlineorder/Public/paging.css">
	<script src="/onlineorder/Public/Admin/js/jquery.min.js"></script>
	<script src="/onlineorder/Public/Admin/js/selectcheck.js"></script>
	<script type="text/javascript">
	function Delete(id){
		if(confirm("真的要删除吗？")){
			$.ajax({
				type:"POST",
				url:"<?php echo U('Admin/Delete');?>",
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
	</script>
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">管理员管理</a>&gt;<a href="">管理员列表</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>管理员信息</h3>
			</div>
			<form action="<?php echo U('Admin/DeleteAll');?>">
			<div class="public-content-cont">
				<table class="public-cont-table">
					<tr>
						<th>选择</th>
						<th>ID</th>
						<th>姓名</th>
						<?php if(strcmp($_SESSION['adminsuper'],'1')){} else{ echo "<th>密码</th>"; } ?>
						<th>权限</th>
						<th>注册时间</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($select)): foreach($select as $key=>$s): ?><tr>
						<td><input type="checkbox" value="<?php echo ($s["id"]); ?>" name='id[]'></td>
						<td><?php echo ($s["id"]); ?></td>
						<td><?php echo ($s["name"]); ?></td>
						<?php if(strcmp($_SESSION['adminsuper'],'1')){} else{ echo "<td>".$s['pwd']."</td>"; } ?>
						<td>
							<?php if(!strcmp($s['super'],'1')): ?>超级管理员
							<?php else: ?>
								普通管理员<?php endif; ?>
						</td>
						<td><?php echo ($s["regtime"]); ?></td>
						<td>
							<div class="table-fun">
								<!-- <a href="">修改</a> -->
								<a href="" onclick="Delete(<?php echo ($s['id']); ?>)">删除</a>
							</div>
						</td>
					</tr><?php endforeach; endif; ?>
					<tr>
						<td colspan="7">
							<div class="table-fun">
								<a onclick="selectall()">全选</a>
								<a onclick="inverse()">反选</a>
								<a onclick="unselectall()">全不选</a>
								<input type="submit" value="批量删除"></a>
							</div>
						</td>
					</tr>
				</table>
				<div class="pages">
					<?php echo ($page); ?>
				</div>
			</div>
			</form>
		</div>
	</div>
</body>
</html>