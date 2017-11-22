<?php 
namespace Home\Controller;
use Think\Controller;
/*读取一级分类及二级分类进行商品展示*
* 
*/
header("Content-Type:text/html; charset=utf-8");
class MenuController extends Controller
{	
	 public function Menu(){

        /*读取一级分类*/
        $dishtype=M("dishtype")->select();
        $this->assign("dishtype",$dishtype);
        //从数据库获取信息赋值给$dishtype,再把$dishtype赋值给dishtype，前台根据dishtype变量来获取数据.

        /*读取二级分类*/
        $sub_dishtype=M("dishtypeitem")->select();
        $this->assign("sub_dishtype",$sub_dishtype);


         /*读取商品的全部信息*/
        $dish=M("dish");
        $count=$dish->count();
        $p=getpage($count,12);
        $dishs=$dish->limit($p->firstRow,$p->listRows)->select();
        $this->assign('page',$p->show());
        $this->assign("dishs",$dishs);

         /*读取二级分类的列表*/

         $this->display();
        
    }
    public function first_Menu(){//获得前端传过来的一级分类的id
        // 先查询dishtypeitem的有多少条记录满足条件typeid=$id
        // 获取满足条件的二级分类$sub_id
        // 再查询dish表的subdisdhtypeid=二级分类$sub_id
        // select()
        $first_Menu=M("dish");
        $id=I('id');
        $dishes=$first_Menu->table('__DISH__ as a,__DISHTYPE__ as b,__DISHTYPEITEM__ as c')->where('a.subdishtypeid=c.id and c.typeid=b.id and b.id='.$id)->field('a.*')->select();
        $this->ajaxReturn($dishes,'json');

    }
    public function sub_Menu(){
        $sub_Menu=M("dish");
        $where['subdishtypeid']=I('id');
        $result=$sub_Menu->where($where)->select();
        $this->ajaxReturn($result,'json');

       
    }

	/*菜单展示，前台的*/
	public function detail_Menu($id){
		$sub_Menu=M("dish");
        // $where['id']=$id;
        $detail_dish=$sub_Menu->table('__DISH__ as a,__DISHTYPE__ as b,__DISHTYPEITEM__ as c')->where('a.subdishtypeid=c.id and c.typeid=b.id')->where('a.id='.$id)->field('a.*,b.name as firstmenuname,c.name as submenuname')->find();
        // 查询一条记录
        // dump($detail_dish);
        $this->assign("detail_dish",$detail_dish);
		$this->display();
	}
}

 ?>