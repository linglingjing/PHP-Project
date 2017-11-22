<?php
//管理员登录登出功能
namespace Admin\Controller;
use Think\Controller;
class LogController extends Controller {

	/*登录*/
	public function login(){
		header("Content-Type:text/html;charset=utf-8");
		$adminname=I('adminname');
	    $adminpwd=I('adminpwd');
	    $verify=I('verify');
	    $logintime=date("Y-m-d H:i:s");
	    if(isset($_POST['sub'])){
	    	if(!empty($adminname)&&!empty($adminpwd)){
	    		if(!check_verify($verify)){//验证验证码
	    			$this->redirect('Index/index','',1,"验证码输入错误，请重新输入。");
	    		}else{
		       		$admin=M('admin');
		       		$select=$admin->query("select * from __ADMIN__ where name='$adminname' and pwd='$adminpwd'");
		       		if($select){//如果存在这个用户把数据存放到session中
		       			session_start();
		       			$_SESSION['adminid']=$select[0]['id'];
		       			$_SESSION['adminname']=$select[0]['name'];
		       			$_SESSION['adminpwd']=$select[0]['pwd'];
						$_SESSION['adminsuper']=$select[0]['super'];
						$_SESSION['adminregtime']=$select[0]['regtime'];
		       			$_SESSION['adminlogintime']=$logintime;
		       			alertMes('登陆成功！前往后台管理中心。','../Index/show.html');
		       		}else{
		       			alertMes("用户民或者密码错误",'../Index/index.html');
		       		}
	       		}
	       	}else{
	       		alertMes('请填写用户名以及密码','../Index/index.html');
	       	}
	    }
	}
	/*前台页面显示验证码*/
	public function verify_c(){
		verify_c();
	}

	/*退出登录*/
	public function logout(){
		if(session('?adminname')){
			session('adminid',null);
			session('adminname',null);
			session('adminpwd',null);
			session('logintime',null);
			session('adminsuper',null);
			session('adminregtime',null);
			alertMes('您已成功退出，请重新登录。','../Index/index.html');
		}else{
			alertMes('您还未登录，请登录。','../Index/index.html');
		}
	}
}

