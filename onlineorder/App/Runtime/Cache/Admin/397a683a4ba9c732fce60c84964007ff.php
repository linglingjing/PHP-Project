<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>食全食美后台管理系统</title>
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/reset.css">
	<link rel="stylesheet" href="/onlineorder/Public/Admin/css/public.css">
	
</head>
<body>
<div class="public-header-warrp">
	<div class="public-header">
		<div class="content">
			<div class="public-header-logo"><a href=""><h3>食全食美</h3></a></div>
			<div class="public-header-admin fr">
				<p class="admin-name"><span><?php echo ($adminname); ?></span>管理员 您好！</p>
				<div class="public-header-fun fr">
					<a href="<?php echo U('/Log/logout');?>" class="public-header-loginout">安全退出</a>	
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- 内容展示 -->
<div class="public-ifame mt20">
	<div class="content">
	<!-- 内容模块头 -->
		<div class="public-ifame-header">
			<ul>
				<li class="ifame-item logo">
					<div class="item-warrp">
						<a href="#">
							<h3 class="logo-title">食全食美</h3>				
						</a>
					</div>
				</li>
				<li class="ifame-item">
					<div class="item-warrp">
						<span>登录时间：</span>
						<span><?php echo ($logintime); ?></span>
					</div>
				</li>
				<div class="clearfix"></div>
			</ul>
		</div>
		<div class="clearfix"></div>
		<!-- 左侧导航栏 -->
		<div class="public-ifame-leftnav">
			<div class="public-title-warrp">
				<div class="public-ifame-title ">
					<a href="">首页</a>
				</div>
			</div>
			<ul class="left-nav-list">
				<li class="public-ifame-item">
					<a href="javascript:;">管理员信息</a>
					<div class="ifame-item-sub">
						<ul>
							<li><a href="<?php echo U('Admin/admininfo');?>" target="content">个人信息</a></li>
							<li><a href="<?php echo U('Admin/adminmodify');?>" target="content">个人信息修改</a></li>
							<li><a href="<?php echo U('Admin/adminlist');?>" target="content">管理员列表</a></li>
							<li><a href="<?php echo U('Admin/adminadd');?>" target="content">添加管理员</a></li>
						</ul>
					</div>
				</li>
				<li class="public-ifame-item">
					<a href="javascript:;">菜品管理</a>
					<div class="ifame-item-sub">
						<ul>
							<li><a href="<?php echo U('Dish/dishlist');?>" target="content">菜品列表</a></li>
							<li><a href="<?php echo U('Dish/dishadd');?>" target="content">添加菜品</a></li>
						</ul>
					</div>
				</li>
				<li class="public-ifame-item">
					<a href="javascript:;">菜品分类管理</a>
					<div class="ifame-item-sub">
						<ul>
							<li><a href="<?php echo U('Dishtype/dishtypelist');?>" target="content">主分类列表</a></li>
							<li><a href="<?php echo U('Dishtype/subdishtypelist');?>" target="content">子分类列表</a></li>
							<li><a href="<?php echo U('Dishtype/dishtypeadd');?>" target="content">添加主分类</a></li>
							<li><a href="<?php echo U('Dishtype/subdishtypeadd');?>" target="content">添加子分类</a></li>
						</ul>
					</div>
				</li>
				<li class="public-ifame-item">
					<a href="javascript:;">席位管理</a>
					<div class="ifame-item-sub">
						<ul>
							<li><a href="<?php echo U('Seat/seatlist');?>" target="content">席位列表</a></li>
							<li><a href="<?php echo U('Seat/seatadd');?>" target="content">添加席位</a></li>
						</ul>
					</div>
				</li>
				<li class="public-ifame-item">
					<a href="javascript:;">订单管理</a>
					<div class="ifame-item-sub">
						<ul>
							<li><a href="<?php echo U('Order/orderlist');?>" target="content">订单列表</a></li>
						</ul>
					</div>
				</li>
				<li class="public-ifame-item">
					<a href="javascript:;">会员管理</a>
					<div class="ifame-item-sub">
						<ul>
							<li><a href="<?php echo U('/User/userlist');?>" target="content">会员列表</a></li>
						</ul>
					</div>
				</li>
				<li class="public-ifame-item">
					<a href="javascript:;">评价管理</a>
					<div class="ifame-item-sub">
						<ul>
							<li><a href="<?php echo U('/Comment/commentlist');?>" target="content">评价列表</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		<!-- 右侧内容展示部分 -->
		<div class="public-ifame-content">
		<iframe name="content" src="main.html" frameborder="0" id="mainframe" scrolling="yes" marginheight="0" marginwidth="0" width="100%" style="height: 700px;"></iframe>
		</div>
	</div>
</div>
<script src="/onlineorder/Public/Admin/js/jquery.min.js"></script>
<script>
$().ready(function(){
	var item = $(".public-ifame-item");

	for(var i=0; i < item.length; i++){
		$(item[i]).on('click',function(){
			$(".ifame-item-sub").hide();
			if($(this.lastElementChild).css('display') == 'block'){
				$(this.lastElementChild).hide()
				$(".ifame-item-sub li").removeClass("active");
			}else{
				$(this.lastElementChild).show();
				$(".ifame-item-sub li").on('click',function(){
					$(".ifame-item-sub li").removeClass("active");
					$(this).addClass("active");
				});
			}
		});
	}
});
</script>
</body>
</html>