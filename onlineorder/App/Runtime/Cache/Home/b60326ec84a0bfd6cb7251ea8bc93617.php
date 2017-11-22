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


	
	<div class="container">
		<div class="row">
			<div class="grid_4">
				<div class="banner">
					<div class="gallery_block">
						<img src="/onlineorder/Public/Home/image/recommendation/zaoxiangsanhuangji.png" alt="">
						<div class="banner_capt bn_1">
							<img src="/onlineorder/Public/Home/image/icon1.png" alt="">
							<hgroup class="name_price">
								<p>糟香三黄鸡</p>
								<strong>￥23.3</strong>
							</hgroup>
						</div>
					</div>
				</div>
			</div>
			<div class="grid_4">
				<div class="banner">
					<div class="gallery_block">
						<div class="banner_capt bn_2">
							<img src="/onlineorder/Public/Home/image/icon2.png" alt="">
							<hgroup class="name_price">
								<p>花生冰激凌</p>
								<strong>￥23.3</strong>
							</hgroup>
						</div>
						<img src="/onlineorder/Public/Home/image/recommendation/huashengbingjiling.png" alt="">
					</div>
				</div>
			</div>
			<div class="grid_4">
				<div class="banner">
					<div class="gallery_block">
						<img src="/onlineorder/Public/Home/image/recommendation/hongyaodounanguadoujiang.png" alt="">
						<div class="banner_capt bn_3">
							<img src="/onlineorder/Public/Home/image/icon3.png" alt="">
							<hgroup class="name_price">
								<p>红豆南瓜豆浆</p>
								<strong>￥23.3</strong>
							</hgroup>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="grid_drinking">
				<div class="drinking">
					<i></i>
					<img src="/onlineorder/Public/Home/image/drink1.jpg" alt="">
				</div>
				<p class="drinking_discription">番茄意大利面是一个色香味俱全的菜，主要以番茄酱作为佐料；意大利面主要营养成分有蛋白质、碳水化合物等，易于消化吸收，有改善贫血、增强免疫力、平衡营养吸收等功效。</p>
			</div>
			<div class="grid_drinking">
				<div class="drinking">
					<i></i>
					<img src="/onlineorder/Public/Home/image/drink2.jpg" alt="">
				</div>
				<p class="drinking_discription">草莓它是一款受欢迎程度极高的水果，长得形状又萌又可爱，颜色还总是娇艳欲滴。用草莓做各种蛋糕，草莓也总能与它们完美融合，真是美貌与口感俱佳。</p>
			</div>
			<div class="grid_drinking">
				<div class="drinking">
					<i></i>
					<img src="/onlineorder/Public/Home/image/drink3.jpg" alt="">
				</div>
				<p class="drinking_discription">马卡龙，又称作玛卡龙、法式小圆饼，是一种用蛋白、杏仁粉、白砂糖和糖霜制作，并夹有水果酱或奶油的法式甜点。口感丰富，外脆内柔，外观五彩缤纷，精致小巧。</p>
			</div>
		</div>
		<div class="row store_intro">
			<div class="welcome">
				<hgroup class="store_hgroup">
					<h2>欢迎您~</h2>
					<p>
					感谢您选择我们食全食美餐厅，您的支持与信任是我们持续上升的动力。为了使您能通过本网站更透彻地了解我们餐厅，我们将特别为您提供一系列的服务，包括：<br>
						1．查看餐厅菜单<br>
						2．在线预订<br>
						3．会员享有优惠
					</p>
				</hgroup>
			</div>
			<div class="about_store">
				<hgroup class="store_hgroup">
					<h2>享受生活的滋味</h2>
					<p>
					本餐厅一直全力打造集健康、美味、丰富、便捷为一体的综合性快餐模式，各地特色小吃，原汁原味，满足您挑剔的味蕾；更新开辟咖啡厅，提供特调咖啡、热饮，花式调酒、精美点心等，环境典雅舒适；专业的厨师团队，开发和研究新派融合菜，定期推出特色菜品，聘请专业艺术团队研发造型，让食全食美每一款菜品成为一件艺术品，让客人感受别样的饮食文化。<br>
					</p>
				</hgroup>
			</div>
		</div>
		<div class="row room_recommend">
			<h1>餐厅环境</h1>
			<div class="room_gallery">
				<div class="rooms">
					<div class="set_image">
						<img src="/onlineorder/Public/Home/image/recommendation/包间2.jpg" alt="">
						<!-- <i><strong>¥403</strong><a href="">more+</a></i> -->
					</div>
					<div class="ribbon_wrapper">
				      <div class="ribbon">凌霄阁</div>
				    </div>
				</div>
				<div class="rooms">
					<div class="set_image">
						<img src="/onlineorder/Public/Home/image/recommendation/包间3.jpg" alt="">
						<!-- <i><strong>¥403</strong><a href="">more+</a></i> -->
					</div>
					<div class="ribbon_wrapper">
				      <div class="ribbon">凌霄阁</div>
				    </div>
				</div>
				<div class="rooms">
					<div class="set_image">
						<img src="/onlineorder/Public/Home/image/recommendation/包间4.jpg" alt="">
						<!-- <i><strong>¥403</strong><a href="">more+</a></i> -->
					</div>
					<div class="ribbon_wrapper">
				      <div class="ribbon">凌霄阁</div>
				    </div>
				</div>
			</div>
		</div>
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