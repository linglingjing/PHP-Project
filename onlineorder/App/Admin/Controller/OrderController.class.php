<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
	public function orderlist(){
		$orderlist=M('order');
		$count=$orderlist->count();
		$p=getpage($count,8);
		$list=$orderlist->table('__ORDER__ as a,__USER__ as b,__SEAT__ as c')->where('a.userid=b.id and a.seatid=c.id')->field('a.*,b.name as username,b.tel as usertel,c.type as seattype')->order('id')->limit($p->firstRow,$p->listRows)->select();

		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();


	}

	/*ajax动态获取订单详情（查该订单里订了哪些菜）*/
	public function getData(){
		$id=I('id');
		$orderitem=M('orderitem');
		$list=$orderitem->table('__ORDERITEM__ as a,__DISH__ as b,__DISHTYPE__ as c,__DISHTYPEITEM__ as d')->where('orderid="'.$id.'"and a.dishid=b.id and b.subdishtypeid=d.id and d.typeid=c.id')->field('a.*,b.name as dishname,b.price,d.name as subdishtype,c.name as dishtype')->select();	
		if($list){
			$this->ajaxReturn($list);
		}else{
			alertMes('查询失败','orderlist.html');
		}
			
	}

	
}