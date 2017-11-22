<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
        
    }
    public function show(){
        if(isset($_SESSION['adminid'])){
        	$this->assign('adminname',I('session.adminname'));
            $this->assign('logintime',I('session.adminlogintime'));
        	$this->display();
        }else{
            alertMes('您还未登陆，请先登陆！','index.html');
        }
    }
    /*删除数据*/
    public function Delete(){
        $tablename=I('table');
        $id=I('id');
        $this->ajaxReturn(DeleteInfo($tablename,$id));
    }

    /*批量删除数据*/
    public function DeleteAll($table){
        $table=M($table);
        $ids=I('id');
        $result=$table->where(array('id'=>array('in',$ids)))->delete();
        if($result){
            $this->success("删除成功！");
        }else{
            $this->error("删除失败，请稍候重试！");
        }
    }
}