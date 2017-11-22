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
	<script>
		function Delete(id){
			if(confirm("真的要删除吗？")){
				$.ajax({
					type:"POST",
					url:"<?php echo U('Index/Delete');?>",
					data:{"id":id,"table":"user"},
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
		<div class="public-nav">您当前的位置：<a href="">会员管理</a>&gt;<a href="">会员列表</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>会员信息</h3>
			</div>
			<form action="<?php echo U('Index/DeleteAll',array('table'=>'user'));?>">
			<div class="public-content-cont">
				<table class="public-cont-table">
					<tr>
						<th>选择</th>
						<th>ID</th>
						<th>用户名</th>
						<?php if($_SESSION['adminsuper']){ echo "<th>密码</th>"; } ?>
						<th>电话</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($select)): foreach($select as $key=>$s): ?><tr>
						<td><input type="checkbox" name="id[]" value="<?php echo ($s["id"]); ?>"></td>
						<td><?php echo ($s["id"]); ?></td>
						<td><?php echo ($s["name"]); ?></td>
						<?php if($_SESSION['adminsuper']){ echo "<td>".$s['pwd']."</td>"; } ?>
						<td><?php echo ($s["tel"]); ?></td>
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