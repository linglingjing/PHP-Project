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
	function getData(id){
		$.ajax({
			type:"POST",
			url:"<?php echo U('Order/getData');?>",
			data:{"id":id},
			dataType:"json",
			success:function(data){
				var html="<ul style='margin-left:50px;'>";
				for(var i=0;i<data.length;i++){
					html+="<li><span>菜品名称："+data[i].dishname+"</span><span>菜品类型："+data[i].dishtype+">>"+data[i].subdishtype+"</span><span>单价："+data[i].price+"</span><span>数量："+data[i].dishamount+"</span></li>";
				}
				
				html+="</ul>";
				var str1="#detail-"+id+" td:first";
				var str2="#detail-"+id;
				$(str1).html(html);
				$(str2).toggle();
			},
			error:function(){
				alert("获取信息失败");
			}
		});
	}
	function Delete(id){
		if(confirm("真的要删除吗？")){
			$.ajax({
				type:"POST",
				url:"<?php echo U('Order/Delete');?>",
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
		<div class="public-nav">您当前的位置：<a href="">订单管理</a>&gt;<a href="">订单列表</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>订单信息</h3>
			</div>
			<form action="<?php echo U('Index/DeleteAll',array('table'=>'order'));?>">
			<div class="public-content-cont">
				<table class="public-cont-table">
					<tr>
						<th>选择</th>
						<th>订单ID</th>
						<th>用户ID</th>
						<th>用户名</th>
						<th>用户电话</th>
						<th>席位</th>
						<th>下单时间</th>
						<th>就餐时间</th>
						<th>总额</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($select)): foreach($select as $key=>$s): ?><tr>
						<td><input type="checkbox" value="<?php echo ($s["id"]); ?>" name="id[]"></td>
						<td><?php echo ($s["id"]); ?></td>
						<td><?php echo ($s["userid"]); ?></td>
						<td><?php echo ($s["username"]); ?></td>
						<td><?php echo ($s["usertel"]); ?></td>
						<td><?php echo ($s["seattype"]); ?></td>
						<td><?php echo ($s["creattime"]); ?></td>
						<td><?php echo ($s["mealtime"]); ?></td>
						<td>&#65509;<?php echo ($s["totalprice"]); ?></td>
						<td>
							<div class="table-fun">
								<a onclick="Delete(<?php echo ($s['id']); ?>)" href="" ">删除</a>
								<a onclick="getData(<?php echo ($s['id']); ?>)" class="details">详情</a> 
							</div>
						</td>
					</tr>
					<tr class="details-sub" id="detail-<?php echo ($s['id']); ?>" style="display:none;">
						<td colspan="11" >
						</td>
					</tr><?php endforeach; endif; ?>
					<tr>
						<td colspan="12">
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