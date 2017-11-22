<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
	/*管理员信息列表*/
	public function adminlist(){
		$adminlist=M('admin');
		$count=$adminlist->count();
		$p=getpage($count,8);
		$list=$adminlist->field(true)->order('id')->limit($p->firstRow,$p->listRows)->select();
		
		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();

	}

	/*查询操作*/
	//查询个人信息在登录时已完成，个人信息存放在session中

	/*修改操作*/
	public function modify(){
		//实现修改操作
		$adminname=I('adminname');
		$adminpwd=I('adminpwd');
		$oldpwd=I('oldpwd');
		$where['id']=$_SESSION['adminid'];
		$admin=M('admin');
		if(isset($_POST['sub'])){
			if(strcmp($oldpwd,$_SESSION['adminpwd'])){
				alertMes('旧密码输入不正确，请重新输入。','adminmodify.html');
			}elseif(strcmp($adminname,$_SESSION['adminname'])){
				if($admin->query("select * from __ADMIN__ where name='$adminname'")){
					alertMes('该用户名已被使用，请重新输入。','adminmodify.html');
				}
			}if(strcmp($_SESSION['adminpwd'],$adminpwd)){
				$data=array(
						'name'=>$adminname,
						'pwd'=>$adminpwd,
					);
				$result=$admin->where($where)->save($data);
				if($result){
					$_SESSION['adminname']=$adminname;
					$_SESSION['adminpwd']=$adminpwd;
					$url=U('Admin/admininfo');
					$this->success('修改成功。',$url);
				}else{
					$this->error('修改失败，请稍候重试。',$url);
				}
			}else{
				alertMes('新密码与旧密码相同,请重新输入！','adminmodify.html');
			}
			
		}
	}

	/*添加操作*/
	public function adminadd(){
		if(!strcmp($_SESSION['adminsuper'],'1')){
			$this->display();
		}else{
			$this->error('对不起，您没有权限添加管理员。',U('Admin/admininfo'));
		}
	}
	public function Add(){
		$admin=D('admin');
		if($admin->create()){
			$insert=$admin->add();
			if($insert){
				alertMes('添加成功。','adminlist.html');
			}else{
				alertMes('添加失败，请稍候重试。','adminadd.html');
			}
		}else{
			alertMes($admin->getError(),'adminadd.html');
		}
	}

	/*删除操作*/
	public function Delete(){
		//从前端模板中传$name,$id的值过来
		$id=I('id');
		if($_SESSION['adminsuper']){
			$admin=M('admin');
			$where['id']=$id;
			$result=$admin->where($where)->delete();
			if($result){
				$info="删除成功！";
				$this->ajaxReturn($info);
			}else{
				$info="删除失败，请稍候重试！";
				$this->ajaxReturn($info);
			}
		}else{
			$info="对不起，您没有权限删除信息。";
			$this->ajaxReturn($info);
		}
	}

	/*批量删除操作*/
	public function DeleteAll(){
		if($_SESSION['adminsuper']){
	        $comment=M('admin');
	        $ids=I('id');
	        $result=$comment->where(array('id'=>array('in',$ids)))->delete();
	        if($result){
	            $this->success("删除成功！");
	        }else{
	            $this->error("删除失败，请稍候重试！");
	        }
	    }else{
			$this->error("对不起，您没有权限删除信息。");
		}
    }
}