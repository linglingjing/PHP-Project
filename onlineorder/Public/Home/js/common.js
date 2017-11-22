function getCartlist(id){
	var cart_amount=$('.amount').val();
	$.ajax({
			type:"POST",
			url:"/onlineorder/index.php/Home/Cart/addToCart.html",
			data:{"id":id,"amount":cart_amount},
			dataType:"json",
			success:function(data){
				console.log(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
 				console.log(XMLHttpRequest.status);
				console.log(XMLHttpRequest.readyState);
				console.log(textStatus);
				alert("您还未登录，请先登录");
			},
		});
	}
	function deleteCartlist(id){
	$.ajax({
			type:"POST",
			url:"/onlineorder/index.php/Home/Cart/deleteFromCart.html",
			data:{"id":id},
			dataType:"json",
			success:function(data){
				console.log(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
 				console.log(XMLHttpRequest.status);
				console.log(XMLHttpRequest.readyState);
				console.log(textStatus);
				alert("删除失败，请稍后再试。");
			},
		});
	}