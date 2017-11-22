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


	
<script type="text/javascript"> 
function rate(obj,oEvent){ 
    var num= obj.getElementsByTagName("input");
	var imgSrc = '/onlineorder/Public/Home/image/star.gif'; 
	var imgSrc_2 = '/onlineorder/Public/Home/image/star-hover.gif'; 
    //如果 obj的rateFlag是false ,那么直接返回，什么都不做
	if(obj.rateFlag) return; 
	var e = oEvent || window.event; 
    //获取点击的目标元素(做了ie的兼容性)
	var target = e.target || e.srcElement;  
    //获取obj元素节点下的 所有img标签元素
	var imgArray = obj.getElementsByTagName("img"); 
    
    //给每个img元素中绑定事件
	for(var i=0;i<imgArray.length;i++){ 
		imgArray[i]._num = i; 
		imgArray[i].onclick=function(){ 
			if(obj.rateFlag)
			return; 
			obj.rateFlag=true; 
			//alert(this._num+1); 
            num[0].value=this._num+1;
		}; 
	} 
	//当点击的是img标签的时候，改变其的src属性，显示几个星星
	if(target.tagName=="IMG"){ 
		for(var j=0;j<imgArray.length;j++){ 
			if(j<=target._num){ 
				imgArray[j].src=imgSrc_2; 
			}else{ 
				imgArray[j].src=imgSrc; 
			} 
		} 
	}else{ 
		for(var k=0;k<imgArray.length;k++){ 
			imgArray[k].src=imgSrc; 
		} 
	} 
} 
</script> 
<div style="min-height: 640px;">
<div class="make_comment container">
		<?php  if(isset($_SESSION['userid'])){ echo '<div id="message-form">
					<h1>留言板</h1>
					<form action="/onlineorder/index.php/Home/Liuyan/handle.html" method="post" name="board">
						<div class="starWrapper" onmouseover="rate(this,event)">
						<span>评分：</span> 
							<img src="/onlineorder/Public/Home/image/star.gif" title="很差">
							<img src="/onlineorder/Public/Home/image/star.gif" title="一般">
							<img src="/onlineorder/Public/Home/image/star.gif" title="不错">
							<img src="/onlineorder/Public/Home/image/star.gif" title="好评">
							<img src="/onlineorder/Public/Home/image/star.gif" title="赞一个"> 
						    <input type="hidden" name="scorc" id="scorc" value="">
						</div>
						<br>
						<div class="comment_content">
							<label for="content">评价内容：</label>
							<textarea name="content" id="content" cols="85" rows="15"></textarea>
						</div>
						<input type="submit" value="发表留言" class="comment_button">
					</form>
				</div>'; } ?>
</div>
<div class="container" id="comment">
	<h3 class="top_lace"></h3>
	
	
	<div class="watch_comment">
		<table class="comment_table">
			<tr>
				<th>用户名</th>
				<th>评分</th>
				<th>评价</th>
				<th>评价时间</th>
			</tr>
			<?php if(is_array($select)): foreach($select as $key=>$s): ?><tr class="content">
				<td><?php echo ($s["username"]); ?></td>
				<td>
					<?php $scorc=(int)$s['scorc']; ?>
					<?php $__FOR_START_9971__=0;$__FOR_END_9971__=5;for($i=$__FOR_START_9971__;$i < $__FOR_END_9971__;$i+=1){ if($i < $scorc): ?><img src="/onlineorder/Public/Home/image/star-hover.gif">
						<?php else: ?>
							<img src="/onlineorder/Public/Home/image/star.gif"><?php endif; } ?>
				</td>
				<td><?php echo ($s["content"]); ?></td>
				<td><?php echo ($s["time"]); ?></td>
			</tr><?php endforeach; endif; ?>
		</table>
		<div class="pages"><?php echo ($page); ?></div>
	</div>
	<h3 class="bottom_lace"></h3>
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