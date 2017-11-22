<?php
namespace Admin\Controller;
use Think\Controller;
class SeatController extends Controller {
	public function seatlist(){
		$seatlist=M('seat');
		$count=$seatlist->count();
		$p=getpage($count,8);
		$list=$seatlist->field(true)->order('id')->limit($p->firstRow,$p->listRows)->select();
		
		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();

	}

	public function Add(){
		if(isset($_POST['sub'])){
			$seattype=I('seattype');
			$seatstock=I('seatstock');
			$seat=D('seat');
			if(!$seat->create()){
				alertMes($seat->getError(),'seatadd.html');
			}else{
				$insert=$seat->add();
				if($insert){
					alertMes('添加成功。','seatlist.html');

				}else{
					alertMes('添加失败，请稍候重试。','seatadd.html');

				}
			}
		}
	}

	public function seatmodify($id){
		$where['id']=$id;
		$seat=M('seat');
		$select=$seat->where($where)->find();
		$this->assign('select',$select);
		$this->display();
	}
	public function modify($oldtype){
		$seatid=I('seatid');
		$seattype=I('seattype');
		$seatstock=I('seatstock');
		$seat=M('seat');
		if(strcmp($oldtype, $seattype)){
			$select=$seat->query("select * from onlineorder_seat where type='$seattype'");
			if($select){
				alertMes('该席位类型已存在，请重新输入。','seatmodify.html');
			}
		}
		$where['id']=$seatid;
		$data=array(
			'type'=>$seattype,
			'stock'=>$seatstock,
		);
		$result=$seat->where($where)->save($data);
		if($result){
			$this->success('修改成功。',U('Seat/seatlist'));
		}else{
			$this->error('修改失败，请稍候重试。',U('Seat/seatmodify',array('id'=>$seatid)));
		}
	}
}