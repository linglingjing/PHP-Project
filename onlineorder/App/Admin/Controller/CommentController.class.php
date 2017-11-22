<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {
	public function commentlist(){
		$commentlist=M('comment');
		$count=$commentlist->count();
		$p=getpage($count,8);
		$list=$commentlist->table('__COMMENT__ as a')->join('__USER__ as b ON b.id=a.userid')->field('a.id,b.name,scorc,content,time')->order('id')->limit($p->firstRow,$p->listRows)->select();
		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();
	}
}