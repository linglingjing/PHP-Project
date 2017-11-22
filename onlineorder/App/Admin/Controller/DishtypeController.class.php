<?php
namespace Admin\Controller;
use Think\Controller;
class DishtypeController extends Controller {
	/*查询主分类列表*/
	public function dishtypelist(){
		$dishtypelist=M('dishtype');
		$count=$dishtypelist->count();
		$p=getpage($count,8);
		$list=$dishtypelist->field(true)->order('id')->limit($p->firstRow,$p->listRows)->select();
		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();

	}

	/*删除操作统一写在IndexController*/
	

	/*修改操作*/
	public function dishtypemodify($name,$id){
		$this->assign('name',$name);
		$this->assign('id',$id);
		$this->display();
	}
	public function modify($oldname){
		$dishtypeid=I('dishtypeid');
		$dishtypename=I('dishtypename');
		$dishtype=M('dishtype');

		if(strcmp($oldname,$dishtypename)){
			$select=$dishtype->query("select * from __DISHTYPE__ where name='$dishtypename'");
			if($select){
				$this->redirect('Dishtype/dishtypemodify',array('id'=>$dishtypeid,'name'=>$dishtypename),1,'菜品类型名已被使用，请重新输入。');
			}
		}
		$result=$dishtype->execute("update __DISHTYPE__ set name='$dishtypename' where id='$dishtypeid'");
		if($result){
			$this->success('修改成功。',U('Dishtype/dishtypelist'));
		}else{
			$this->error('未修改原类型名，请重新输入！',U('Dishtype/dishtypemodify',array('id'=>$dishtypeid,'name'=>$dishtypename)));
		}
		
	}

	/*添加操作*/
	public function dishtypeadd(){
		$this->show();
	}

	public function Add(){
		if(isset($_POST['sub'])){
			
			$dishtype=D('dishtype');
			if($dishtype->create()){
				$insert=$dishtype->add();
				if($insert){
					alertMes('添加成功。','dishtypelist.html');
				}else{
					$this->error('添加失败，请稍候重试。',U('Dishtype/dishtypeadd'));
				}
			}else{
				$this->redirect('Dishtype/dishtypeadd','',1,$dishtype->getError());
			}
		}
	}

/****************************************************************/
/*****************子菜类型处理方法*********************************/
/****************************************************************/

	public function subdishtypelist(){
		$subdishtypelist=M('dishtypeitem');
		$count=$subdishtypelist->count();
		$p=getpage($count,8);
		$list=$subdishtypelist->table('__DISHTYPEITEM__ as a,__DISHTYPE__ as b')->where('a.typeid=b.id')->field('a.*,b.name as fathertype')->order('id')->limit($p->firstRow,$p->listRows)->select();
		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();
	}
	/*修改操作*/
	public function subdishtypemodify($id){
		/*查询所有父菜品类型*/
		$fathertype=M('dishtype');
		$fatherlist=$fathertype->select();
		$this->assign('fathertype',$fatherlist);//父菜品类型传输到前台

		/*查询当前ID的子菜品类型信息*/
		$subtype=M('dishtypeitem');
		$where['id']=$id;
		$subselect=$subtype->where($where)->find();
		$this->assign('subselect',$subselect);


		$this->display();
	}
	public function submodify($oldname){
		$dishtypeid=I('dishtypeid');
		$dishtypename=I('dishtypename');
		$fathertype=I('fathertype');

		$subdishtype=M('dishtypeitem');

		if(strcmp($oldname,$dishtypename)!=0){

			$select=$subdishtype->query("select * from __DISHTYPEITEM__ where name='$dishtypename'");
			if($select){
				$this->redirect('Dishtype/subdishtypemodify',array('id'=>$dishtypeid),1,'菜品类型名已被使用，请重新输入。');
			}
		}
		$where['id']=$dishtypeid;
		$data=array(
			'name'=>$dishtypename,
			'typeid'=>$fathertype,
		);
		$result=$subdishtype->where($where)->save($data);
		if($result){
			$this->success('修改成功。',U('Dishtype/subdishtypelist'));
		}else{
			$this->error('修改失败，请稍候重试。',U('Dishtype/subdishtypemodify',array('id'=>$dishtypeid)));
		}
		
	}
	public function subdishtypeadd(){
		$fathertype=M('dishtype');
		$fatherlist=$fathertype->select();
		$this->assign('fathertype',$fatherlist);
		$this->display();
	}
	public function subAdd(){
		if(isset($_POST['sub'])){
			
			$subdishtype=D('dishtypeitem');
			if($subdishtype->create()){
				$insert=$subdishtype->add();
				if($insert){
					alertMes('添加成功。','subdishtypelist.html');
				}else{
					alertMes('添加失败，请稍候重试。','subdishtypeadd.html');
				}
			}else{
				alertMes($subdishtype->getError(),'subdishtypeadd.html');
			}
		}
	}
}