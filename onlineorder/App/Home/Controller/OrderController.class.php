<?php 
namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html; charset=utf-8");
class OrderController extends Controller{	
	/*显示订单基本*/
	public function orderlist(){
		$orderlist=M('order');
		$count=$orderlist->where('userid='.$_SESSION['userid'])->count();
		$p=getpage($count,8);
		$list=$orderlist->table('__ORDER__ as a,__SEAT__ as c')->where('a.userid='.$_SESSION['userid'].' and a.seatid=c.id')->field('a.*,c.type as seattype')->order('a.id desc')->limit($p->firstRow,$p->listRows)->select();

		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();
	}

	/*查看订单详细信息*/
	public function getData(){
		$orderid=I('id');
		$orderitem=M('orderitem');
		$list=$orderitem->table('__ORDERITEM__ as a,__DISH__ as b,__DISHTYPE__ as c,__DISHTYPEITEM__ as d')->where('orderid="'.$orderid.'"and a.dishid=b.id and b.subdishtypeid=d.id and d.typeid=c.id')->field('a.*,b.name as dishname,b.price,b.small_pic,d.name as subdishtype,c.name as dishtype')->select();	
		if($list){
			$this->ajaxReturn($list);
		}else{
			alertMes('查询失败','orderlist.html');
		}
	}
}
?>