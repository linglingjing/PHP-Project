<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<!-- HTML文档结构里<head></head>里引入的标签 -->
<meta charset="UTF-8">
<title>食全食美</title>
<link rel="stylesheet" href="/onlineorder/Public/Home/css/font.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/common.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/basic.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/index.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/style.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/menu.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/detail.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/circumstance.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/cart.css">
<link rel="stylesheet" href="/onlineorder/Public/Home/css/comment.css">
<link rel="stylesheet" href="/onlineorder/Public/paging.css">
<script type="text/javascript" src="/onlineorder/Public/Home/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="/onlineorder/Public/Home/js/jquery.fly.min.js"></script>
<script type="text/javascript" src="/onlineorder/Public/Home/js/common.js"></script>

<script type="text/javascript">
	$(function(){
		if ("<?php echo $_SESSION['username'];?>") {
			$('.login_and_register').replaceWith("<div class='login_and_register'><b><a href='<?php echo U('Order/orderlist');?>' style='color:#000;'><?php echo $_SESSION['username'];?></a></b><a id='cart' href='<?php echo U('Cart/addcart');?>' style='color:#555;cursor:pointer;'>购物车</a><a href='<?php echo U('Index/logout_handle');?>' style='color:#555;cursor:pointer;'>退出<a></div>");}

		$('#cart').click(function(){
			$('.layer').show();
			$('.layer').fadeIn(100);
			$('.cart_modal').slideDown(200);
			$('.cart_modal').show();
		});
		$('.close_model').click(function(){
			// $('.layer').show();
			$('.layer').fadeOut(100);
			$('.cart_modal').slideUp(200);
		});

		$('.jia').click(function(){
			var n=$(this).prev().val();
			var amount=parseInt(n)+1;
			if(amount==0){return;}
			$(this).prev().val(amount);
		});
		$('.jian').click(function(){
			var n=$(this).next().val();
			var amount=parseInt(n)-1;
			if(amount==0){ return;}
			$(this).next().val(amount);
		});

		 var offset = $("#cart").offset(); //offset()用于设置或返回当前匹配元素相对于当前文档的偏移，也就是相对于当前文档的坐标，该函数对可见元素有效
	    $(".add_cart").click(function(event){ 
	    	
	        var add_cart = $(this); 
	        var img = $('.addcart_img').attr('src'); 
	        var flyer = $('<img class="u-flyer" src="'+img+'">'); 
	        flyer.fly({ 
	            start: { 
	                left: event.pageX-859, //开始位置（必填）#fly元素会被设置成position: fixed 
	                top: event.pageY //开始位置（必填）
	            }, 
	            end: { 
	                left: offset.left+10, //结束位置（必填） 
	                top: offset.top+10, //结束位置（必填） 
	                width: 0, //结束时宽度 
	                height: 0 //结束时高度 
	            }, 
	            onEnd: function(){ //结束回调 
	                $("#msg").show().animate({width: '250px'}, 200).fadeOut(3000); //提示信息 
	            	} 
	        }); 
	    }); 

	})

	
</script>
<style type="text/css">
	#msg{
		text-align: center;
		display: none;
		position: absolute;
		top:22%;
		right:4%;
		height: 30px;
		line-height: 30px;
		border-radius: 5px;
		background: rgba(0,0,0,.5); 
		padding: 10px;
		color: #fff;
		font-size: 1.2em;
	}
</style>



</head>
<body>
	<header id="header">
	<div class="container header_content">
		<div id="logo">食全食美</div>
		<nav id="nav">
			<ul>
				<li><a href="<?php echo U('Index/index');?>">首&nbsp;&nbsp;页</a></li>
				<li><a href="<?php echo U('Menu/Menu');?>">查看菜单</a></li>
				<!-- <li><a href="#">菜谱推荐</a></li> -->
				<li><a href="<?php echo U('Circumstance/circumstance');?>">餐厅环境</a></li>
				<li><a href="<?php echo U('Liuyan/liuyan');?>">用户评价</a></li>
			</ul>
		</nav>
		
		<div class="login_and_register">
			<span><a href="<?php echo U('Index/login');?>">登录</a></span>
			<span><a href="#">/</a></span>
			<span><a href="<?php echo U('Index/register');?>">注册</a></span>
		</div>
		
	</div>	
</header>


	<div id="cart_list">
	<div class="dishlist_group">
		<h3 class="lace_top"></h3>
		<table class="ordertable" cellpadding="0" cellspacing="0">
			<tr class="list">
				<th>订单编号</th>
				<th>席位</th>
				<th>下单时间</th>
				<th>就餐时间</th>
				<th>总额</th>
				<th>查看详情</th>
			</tr>
			<?php if(is_array($select)): foreach($select as $key=>$s): ?><tr class="list">
				<td><?php echo ($s["id"]); ?></td>
				<td><?php echo ($s["seattype"]); ?></td>
				<td><?php echo ($s["creattime"]); ?></td>
				<td><?php echo ($s["mealtime"]); ?></td>
				<td>&#65509;<?php echo ($s["totalprice"]); ?></td>
				<td>
					<a onclick="getData(<?php echo ($s['id']); ?>)" class="details">详情</a> 
				</td>
			</tr>
			<tr class="details-sub" id="detail-<?php echo ($s['id']); ?>" style="display:none;">
				<td colspan="6" >
				</td>
			</tr><?php endforeach; endif; ?>
		</table>
		<h3 class="lace_bottom"></h3>	
	</div>
	<div class="pages">
		<?php echo ($page); ?>
	</div>
	<div class="cart_list"></div>
</div>



<script type="text/javascript">
function getData(id){
	$.ajax({
		type:"POST",
		url:"<?php echo U('Order/getData');?>",
		data:{"id":id},
		dataType:"json",
		success:function(data){
			var html="<ul style=''>";
			for(var i=0;i<data.length;i++){
				html+="<li><span><img src='"+data[i].small_pic+"'></span><span>菜品名称："+data[i].dishname+"</span><span>菜品类型："+data[i].dishtype+">>"+data[i].subdishtype+"</span><span>单价："+data[i].price+"</span><span>数量："+data[i].dishamount+"</span></li>";
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
</script>

	<div id="footer">
	<div class="container footer_container">
		<div class="footer_left">
			<ul>
				<li><i class="icon-clock icon1"></i>10:00-21:00</li>
				<li><i class="icon-location icon2"></i>珠海市香洲区金凤路6号唐家湾站对面</li>
				<li><i class="icon-phone icon3"></i>13160678169</li>
				<li class="copyright"><i class="icon-banquan icon4"></i>
					<span class="brand">Lingjing  Liyan</span>
					&copy; 2017 | Privacy Policy 
				</li>
			</ul>
		</div>
		<div class="footer_right">
			<ul>
				<li><a class="contact" href="#"><i class="icon-weixin"></i></a></li>
				<li><a class="contact" href="#"><i class="icon-qq"></i></a></li>
				<li><a class="contact" href="#"><i class="icon-weibo"></i></a></li>
				<li><a class="contact" href="#"><i class="icon-facebook"></i></a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>