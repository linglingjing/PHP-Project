<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
	public function userlist(){
		$userlist=M('user');
		$count=$userlist->count();
		$p=getpage($count,8);
		$list=$userlist->field(true)->order('id')->limit($p->firstRow,$p->listRows)->select();
		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();

	}
	
}