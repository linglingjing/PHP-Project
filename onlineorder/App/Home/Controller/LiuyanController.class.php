<?php
namespace Home\Controller;
use Think\Controller;
class LiuyanController extends Controller{
	public function liuyan(){
		// 分页
		$board=M('comment');
		$count=$board->count();
		$p=getpage($count,5);
		$list=$board->table('__COMMENT__ as a,__USER__ as b')->where('a.userid=b.id')->field('a.*,b.name as username')->order('time desc')->limit($p->firstRow, $p->listRows)->select();
		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();
	}
	public function handle(){
		//发布内容方法
		//获取表单提交数据
		$data=array(
			'userid'=>$_SESSION['userid'],
			'content'=>$_POST['content'],
			'scorc'=>$_POST['scorc']
		);
		if(M('comment')->data($data)->add()){
			alertMes('发布成功！','liuyan.html');
		}else{
			alertMes('发布失败，请重试！','liuyan.html');
		}
	}
}