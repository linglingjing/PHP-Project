<?php
namespace Admin\Controller;
use Think\Controller;
class DishController extends Controller {
	public function dishlist(){
		$subdishtype=M('dishtypeitem')->select();
		$this->assign('dtinfo',$subdishtype);

		$dishlist=M('dish');
		$count=$dishlist->count();
		$p=getpage($count,8);

		/*多表查询*/
		$list=$dishlist->table('__DISH__ as a,__DISHTYPEITEM__ as b,__DISHTYPE__ as c')->where('b.id=a.subdishtypeid and c.id=b.typeid')->field('a.*,b.name as subdishtype,c.name as dishtype')->order('id')->limit($p->firstRow,$p->listRows)->select();

		$this->assign('select',$list);
		$this->assign('page',$p->show());
		$this->display();
	}


	/*查询菜品类型并输出到模板中的select标签中*/
	public function dishadd(){
		$dishtype=M('dishtype');//查菜类型，一级下拉
		$dtinfo=$dishtype->select();

		$where['typeid']=$dtinfo[0]['id'];//二级下拉是根据一级id查（默认）的条件
		$sub_dishtype=M('dishtypeitem');//查子菜类型，二级下拉
		$sub_dishtypes=$sub_dishtype->where($where)->select();

		$this->assign('dtinfo',$dtinfo);
		$this->assign('sub_dishtypes',$sub_dishtypes);
		$this->display();
	}

	public function Add(){
		$dish=D('dish');
		if(!$dish->create()){
			$this->redirect('Dish/dishadd','',1,$dish->getError());
		}
		$dishname=I('dishname');
		$sub_dishtype=I('sub_dishtype');
		$dishinfo=I('dishinfo');
		$dishprice=I('dishprice');

		$config=C('UPLOAD_CONFIG');//C方法读取配置文件的变量，UPLOAD_CONFIG是文件上传配置
		$upload=new \Think\Upload($config);//实例化上传类
		$info=$upload->upload();
		if(!$info){//上传失败
			$this->error($upload->getError());
		}else{

			$path[0]=thumb(240,240,$info[0]["savepath"],$info[0]["savename"]);
			$path[1]=thumb(350,350,$info[0]["savepath"],$info[0]["savename"]);
			$path[2]=thumb(600,600,$info[0]["savepath"],$info[0]["savename"]);
			for($i=0;$i<count($info);$i++){
				unlink('./Public'.$info[$i]['savepath'].$info[$i]["savename"]);
			}

			//保存表单信息，包括附加数据
			$data=array(
				'id'=>NULL,
				'name'=>$dishname,
				'subdishtypeid'=>$sub_dishtype,
				'price'=>$dishprice,
				'info'=>$dishinfo,
				'sellcount'=>NULL,
				'small_pic'=>$path[0],
				'middle_pic'=>$path[1],
				'big_pic1'=>$path[2],

			);
			$result=$dish->data($data)->add();//写入数据库
			if($result){
				// $this->success('添加成功',U('Dish/dishlist'));
				alertMes('添加成功','dishlist.html');
			}else{
				// $this->error('添加失败',U('Dish/dishadd'));
				alertMes('添加失败','dishadd.html');
			}
		}	
	}

	/*对应模板dishmodify.html*/
	public function dishmodify($id){
		/*依据前台传的id值查询菜品信息*/
		$dish=M('dish');
		$where['id']=$id;
		$select=$dish->where($where)->find();

		/*查询所有子菜类型并在前台显示*/
		$subdishtype=M('dishtypeitem');
		$dtinfo=$subdishtype->select();

		/*查询出来的菜品信息以及所有子菜类型传到前台*/
		$this->assign('dtinfo',$dtinfo);
		$this->assign('select',$select);
		$this->display();

	}
	/*点击修改按钮后的处理事件*/
	public function modify($oldname){
		/*oldname指菜品原来的名字，修改时既可以修改原来的名字也可以不修改原来的名字，ooldname为了方便判断是否修改了菜品名字*/

		/*获取表单信息*/
		$dishname=I('dishname');
		$dishtype=I('dishtype');//dishtype指菜品的子菜类型
		$dishinfo=I('dishinfo');
		$dishprice=I('dishprice');
		$dishid=I('dishid');
		$photoName=I('photo');

		/*创建操作表的对象*/
		$dish=M('dish');
		$where['id']=$dishid;
		$find=$dish->where($where)->find();//查找当前id的菜品信息，以便后面用于删除对应的图片文件
		//将图片保存路径中“/onlineorder/”替换成“./”,不然无法删除文件
		$find['small_pic']=str_replace("/onlineorder", ".",$find['small_pic']);
		$find['middle_pic']=str_replace("/onlineorder", ".",$find['middle_pic']);
		$find['big_pic1']=str_replace("/onlineorder", ".",$find['big_pic1']);


		if(strcmp($oldname,$dishname)){
			$select=$dish->query("select * from __DISH__ where name='$dishname'");
			if($select){
				$this->redirect('Dish/dishmodify',array('id'=>$dishid),1,'菜品名称已被使用，请重新输入。');
			}
		}
		/*文件上传的配置*/
		$config=C('UPLOAD_CONFIG');//C方法读取配置文件的变量，UPLOAD_CONFIG是文件上传配置

		
		$data['name']=$dishname;
		$data['subdishtypeid']=$dishtype;
		$data['price']=$dishprice;
		$data['info']=$dishinfo;
		

		if(!empty($photoName)){//如果没有上传文件，则执行空语句
			;
		}else{//如果上传了文件，进行文件处理
			$upload=new \Think\Upload($config);//实例化上传类
			$info=$upload->upload();
			if(!$info){//上传失败
				$this->error($upload->getError());
			}else{
				//生成缩略图
				$path[0]=thumb(240,240,$info[0]["savepath"],$info[0]["savename"]);
				$path[1]=thumb(350,350,$info[0]["savepath"],$info[0]["savename"]);
				$path[2]=thumb(600,600,$info[0]["savepath"],$info[0]["savename"]);
				$data['small_pic']=$path[0];
				$data['middle_pic']=$path[1];
				$data['big_pic1']=$path[2];
				/*删除原来的图片文件*/
				unlink($find['small_pic']);
				unlink($find['middle_pic']);
				unlink($find['big_pic1']);
				/*删除上传的原图*/
				for($i=0;$i<count($info);$i++){
					unlink('./Public'.$info[$i]['savepath'].$info[$i]["savename"]);
				}
			}
		}
		$result=$dish->where($where)->save($data);//写入数据库
		/*echo $data;
		echo $result;
		echo $dish->getLastSql();*/
		if($result){
			$this->success('修改成功。',U('Dish/dishlist'));
		}else{
			$this->error('修改失败',U('Dish/dishmodify',array('id'=>$dishid)),100);
		}
	}

	public function Delete(){
		$dish=M('dish');
		$where['id']=I('id');


		$result=$dish->where($where)->delete();
		if($result){
			// 查找当前id的菜品图片保存路径，使用unlink删除掉这些图片
			$find=$dish->where($where)->find();

			//将图片保存路径中“/onlineorder/”替换成“./”,不然无法删除文件
			$find['small_pic']=str_replace("/onlineorder", ".",$find['small_pic']);
			$find['middle_pic']=str_replace("/onlineorder", ".",$find['middle_pic']);
			$find['big_pic1']=str_replace("/onlineorder", ".",$find['big_pic1']);

			unlink($find['small_pic']);
			unlink($find['middle_pic']);
			unlink($find['big_pic1']);
			$info="删除成功！";
			$this->ajaxReturn($info);
		}else{
			$info="删除失败，请稍候重试！";
			$this->ajaxReturn($info);
		}
	}	

	// ajax获取子菜类型的信息
	public function getSubtype(){
		$where['typeid']=I('id');//二级下拉是根据一级id查（默认）的条件
		$sub_dishtype=M('dishtypeitem');//查子菜类型，二级下拉
		$sub_dishtypes=$sub_dishtype->where($where)->field('name as sub_name,id as sub_id')->select();
		$this->ajaxReturn($sub_dishtypes);
	}

	//ajax获取分类后的菜品信息
	public function getData(){
		$where['subdishtypeid']=I('id');
		$dish=M('');
		$select=$dish->table('__DISH__ as a,__DISHTYPEITEM__ as b,__DISHTYPE__ as c')->where('b.id=a.subdishtypeid and c.id=b.typeid')->where($where)->field('a.*,b.name as subdishtype,c.name as dishtype')->order('id')->select();
		if($select){
			$this->ajaxReturn($select);
		}else{
			alertMes('查询失败','dishlist.html');
		}
	}
}