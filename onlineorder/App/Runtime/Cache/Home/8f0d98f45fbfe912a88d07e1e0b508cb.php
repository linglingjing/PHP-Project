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
	<form action="<?php echo U('Cart/getTotal');?>" method="post">
		<div class="dishlist_group">
			<h3 class="lace_top"></h3>
			<?php if(is_array($cart_dish)): foreach($cart_dish as $key=>$c): ?><figure class="cart_dishes">
					<figcaption>
						<div class="cart_dishlist_info">
							<span><?php echo ($c["name"]); ?></span>
							<label>菜品编号：#<input type="text" value="<?php echo ($c["dishid"]); ?>" readonly="readonly"></label>
							<label>菜品类型：<span><?php echo ($c["dishtype"]); ?></span></label>
							<label class="single_price">￥<input type="text" value="<?php echo ($c["price"]); ?>" readonly="readonly"></label>
							<label class="buy_amount"  id="cartamount" >数量：<input type="text"class="amount" value="<?php echo ($c["dishcount"]); ?>" >
							</label>
						</div>
					</figcaption>
					<a class="delete_dish" onclick="deleteCartlist(<?php echo ($c["dishid"]); ?>)" href="">X</a>
				</figure><?php endforeach; endif; ?>
			<h3 class="lace_bottom"></h3>	
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;选择席位：
		<select name="seatid" id="seat_select">
			<?php if(is_array($seat)): foreach($seat as $key=>$s): if($s['stock'] != '0'): ?><option value="<?php echo ($s["id"]); ?>"><?php echo ($s["type"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		选择就餐时间：<input type="date" name="date" class="meal_date" required="required">
		<div class="price_group" style="float: right;">
			总额：<span style="font-size: 18px;color: red;">￥</span><input type="text" value="<?php echo ($total); ?>" id="total_price" name="total_price" readonly="readonly" style="border: 0;background-color: #ffefd5;font-size: 18px;color: red;">
		</div>
		<div style="position: relative;">
			<input id="total_button" value="结算" type="submit">
		</div>
	</form>
	<div class="cart_list"></div>
</div>

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