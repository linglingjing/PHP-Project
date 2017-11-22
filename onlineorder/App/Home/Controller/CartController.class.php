<?php 
namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html; charset=utf-8");
class CartController extends Controller{	
	// 显示购物车页面
	public function addcart(){
		$cart_dish=M()->table('__DISH__ as a,__CART__ as b,__DISHTYPEITEM__ as c')->where('a.id=b.dishid and a.subdishtypeid=c.id and b.userid='.$_SESSION['userid'])->field('b.*,a.name,a.price,c.name as dishtype')->select();

		$seat=M('seat')->select();
		$this->assign('seat',$seat);
		$this->assign('cart_dish',$cart_dish);

		for($i=0;$i<count($cart_dish);$i++){
			$total+=$cart_dish[$i]['price']*$cart_dish[$i]['dishcount'];
		}
		$this->assign('total',$total);
		$this->display();


	}
	// 加入购物车功能
	public function addToCart(){
		$dishid=I('id');
        $cart_amount=I('amount');
        $a['userid']=$_SESSION['userid'];//查询条件
        $a['dishid']=$dishid;//查询条件
        // 判断用户是否登录了
        if (isset($_SESSION['username']) && isset($_SESSION['userid'])){
            $result=M('cart')->where($a)->find();
            if($result){
                $amount['dishcount']=(int)$result['dishcount']+(int)$cart_amount;
                if(M('cart')->where($a)->save($amount)){
                    $list=M('dish')->where('id='.$dishid)->find();
                    $list['dishcount']=$amount['dishcount'];
                    $this->ajaxReturn('添加成功！');
                }else{
                    $this->ajaxReturn('添加失败！');
                }
            }else{
                $data=array(
                    'id'=>NULL,
                    'userid'=>$_SESSION['userid'],
                    'dishid'=>$dishid,
                    'dishcount'=>$cart_amount,
                );
                if(M('cart')->add($data)){
                    $list=M('dish')->where('id='.$dishid)->find();
                    $list['dishcount']=$cart_amount;
                    $this->ajaxReturn('添加成功！');
                }else{
                     $this->ajaxReturn('添加失败！');
                }
            }
        }else{
              alertMes("登录失败，请重新登录！","login.html");
        }
	}

	//从购车车中删除
	public function deleteFromCart() {
		$dishid=I('id');
		$a['userid']=$_SESSION['userid'];//查询条件
        $a['dishid']=$dishid;//查询条件
        // 判断用户是否登录了
        if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
            $result=M('cart')->where($a)->delete();
            if($result){
            	$this->ajaxReturn("删除成功！");
            }else{
            	$his->ajaxReturn("删除失败！");
            }
        }
	}

	// 结算功能
	public function getTotal(){
		$orderid=time();
		$userid=$_SESSION['userid'];
		$seatid=I('seatid');
		$total_price=I('total_price');
		$mealtime=I('date');
		$data_order=array(
			'id'=>$orderid,
			'userid'=>$userid,
			'seatid'=>$seatid,
			'totalprice'=>$total_price,
			'mealtime'=>$mealtime,
			'creattime'=>date("Y/m/d"),
		);
		if($result=M('order')->add($data_order)){//添加订单表

			$list=M('cart')->where('userid='.$userid)->select();

			/*添加数据到orderitem表*/
			for($i=0;$i<count($list);$i++){
				$date_orderitem=array(
					'id'=>NULL,
					'orderid'=>$orderid,
					'dishid'=>$list[$i]['dishid'],
					'dishamount'=>$list[$i]['dishcount'],
				);
				if(M('orderitem')->add($date_orderitem)){
					;
				}else{
					alertMes('添加orderitem失败！','addcart.html');
					break;
				}
			}

			/*修改菜品表的销量*/
			for ($i=0; $i < count($list); $i++) { 
				$count=(int)$list[$i]['dishcount'];
				M('dish')->where('id='.$list[$i]['dishid'])->setInc('sellcount',$count);
			}

			/*修改席位表的库存*/
			M('seat')->where('id='.$seatid)->setDec('stock'); // 席位库存1

			/*清空购物车*/
			M('cart')->where('userid='.$userid)->delete();
			alertMes('确定付款吗？','../Order/orderlist.html');
		}else{
			alertMes('订单提交失败！','addcart.html');
		}
	}
}
 

?>