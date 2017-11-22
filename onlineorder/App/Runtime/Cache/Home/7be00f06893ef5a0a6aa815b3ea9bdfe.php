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


	
<script>
	function getSubmenu(id){
		$.ajax({
			type:"POST",
			url:"<?php echo U('Menu/sub_Menu');?>",
			data:{"id":id},
			dataType:"json",
			success:function(data){
				$('.dishes_list').empty();
				for (var i = data.length - 1; i >= 0; i--) {

					var html='<a href="/onlineorder/index.php/Home/Menu/detail_Menu/id/'+data[i].id+'.html" target="_self"><figure><div class="dishes_img"><img src="'+data[i].small_pic+'" alt=""></div><figcaption class="dishes_info"><ul><li><span class="dishes_name">'+data[i].name+'</span></li><li><span class="sales_volume">￥'+data[i].price+'</span></li></ul></figcaption></figure></a>';
					$('.dishes_list').append(html);
				};
				$('.pages').replaceWith();
			},
			error:function(){
				alert("获取失败。");
			}
		});
	}

	function getFristmenu(id){
		$.ajax({
			type:"POST",
			url:"<?php echo U('Menu/first_Menu');?>",
			data:{"id":id},
			dataType:"json",
			success:function(data){
				$('.dishes_list').empty();
				for (var i = data.length - 1; i >= 0; i--) {
					console.log(data[i].id);
					var html='<a href="/onlineorder/index.php/Home/Menu/detail_Menu/id/'+data[i].id +'.html" target="_self"><figure><div class="dishes_img"><img src="'+data[i].small_pic+'"></div><figcaption class="dishes_info"><ul><li><span class="dishes_name">'+data[i].name+'</span></li><li><span class="sales_volume">￥'+data[i].price+'</span></li></ul></figcaption></figure></a>';
					$('.dishes_list').append(html);
				};
			},
			error:function(){
				alert("获取失败。");
			}
		});
	}
</script>
<div class="container">
		<div class="row detail_menu">
			<ul class="menu_container">
				<?php if(is_array($dishtype)): foreach($dishtype as $key=>$d): ?><li class="">
					<p class="menu_firstType"><?php echo ($d["name"]); ?></p>
					<ul class="menu_list sub_menu2">
						<li><a onclick='getFristmenu(<?php echo ($d['id']); ?>)'>全部</a></li>
						<?php if(is_array($sub_dishtype)): foreach($sub_dishtype as $key=>$s): if($s['typeid'] == $d['id']): ?><li><a onclick="getSubmenu(<?php echo ($s['id']); ?>)"><?php echo ($s["name"]); ?></a></li><?php endif; endforeach; endif; ?>
					</ul>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="dishes_list">
			<?php if(is_array($dishs)): foreach($dishs as $key=>$s): ?><a href='<?php echo U("Menu/detail_Menu",array("id"=>$s["id"]));?>' target="_self">
					<figure>
						<div class="dishes_img"><img src="<?php echo ($s["small_pic"]); ?>" alt=""></div>
						<figcaption class="dishes_info">
							<ul>
								<li><span class="dishes_name"><?php echo ($s["name"]); ?></span></li>
								<li><span class="sales_volume">￥<?php echo ($s["price"]); ?></span></li>
							</ul>
						</figcaption>
					</figure>
				</a><?php endforeach; endif; ?>
		</div>
	<div class="pages">
		<?php echo ($page); ?>
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