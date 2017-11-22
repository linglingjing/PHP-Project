<?php
//注册功能
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
	public function register(){
		header("Content-Type:text/html;charset=utf-8");
		if(isset($_POST['sub'])){
			$name=I('name');
			$pwd=I('pwd'); 
			$repwd=I('repwd');     
	        $tel=I('tel'); 
	        $rules = array(
			     array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证uname字段是否唯一
			     //array('name','^[\u4e00-\u9fa5]{0,}$','用户名格式不正确！'),
			     array('name','/^[\x{4e00}-\x{9fa5}A-Za-z]+$/u','用户名格式不正确！'),//用户名只能输入中文或者英文
			     array('pwd','/[\S\w{6,18}]$/','密码格式不正确！'), // 验证密码格式，6-18位
			     array('repwd','pwd','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
			     array('tel','/^0?(13|14|15|17|18)[0-9]{9}$/','手机号码格式不正确！'),//验证手机号码格式
			);
	        $user = M("user"); // 实例化user对象
			if (!$user->validate($rules)->create()){
 				// 如果创建失败 表示验证没有通过 输出错误提示信息
 				$this->redirect('Index/register','',1,$user->getError());
			}else{
				 // 验证通过 可以进行其他数据操作
			

	    	// if(!empty($uname)&&!empty($upwd)){
		    //     //判断用户是否已经注册了
		    //     $user1=M();
		    //     $select =$user1->query("select * from onlineorder_user where name='$uname' and pwd='$upwd'");
		    //     if($select){//如果存在该用户
		    //       $this->redirect('Index/index','',3,'该用户已经注册，请直接登陆');
		    //      }
		         //注册
		      	$data = array(
			        'id'  => NULL,
			        'name' =>$name,
			        'pwd' =>$pwd,
			        'tel' =>$tel,
			    );


		     	$insert=M('user')->add($data);
			    if($insert){
			        //如果注册成功  把密码保存在seesion 里
			        session_start();
			        $_SESSION['uname'] =$name;
			        $_SESSION['upwd'] = $pwd;
			        $_SESSION['utel']=$tel;
			        //页面跳转
			        $this->redirect('Index/show','',2,'注册成功，前往用户中心');     
			    }else{
			         echo "<script>alert('注册失败！');</script>";
			    }
			}
		}
	}
}