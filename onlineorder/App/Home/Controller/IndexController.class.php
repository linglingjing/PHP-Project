<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
        $this->display();//显示对应的模板（html)文件
    }

    public function login(){
        $this->display();
    }
   public function register(){
        $this->display();
    }
     public function logout(){
        $this->display();
    }
    public function login_handle(){
        //写login form的处理代码
        //I方法是获取数据,可以相当于$_POST,$_SESSION等，U是获取路径的
        $username=I('username');//获取的是表单的username
        $password=I('password');
        if (!empty($username)&&!empty($password)) {
               $user=D('user');//D('user')相当于操作数据库的user表，用自定义的Model模型就用D()方法，如果没有自定义Model方法，就用M()方法。
               $where['name']=$username;
               $where['pwd']=$password;
               if($user->create()){
                    $result=$user->where($where)->find();
                   if($result){
                        $_SESSION['username']=$username;
                        $_SESSION['userid']=$result['id'];
                        alertMes("登录成功！","index.html");
                   }else{
                        alertMes("登录失败，请重新登录！","login.html");
                   }
               }else{
                    alertMes("创建对象失败","login.html");
               }
               
            }
    }
    /* 退出登录*/
    public function logout_handle(){
        if(session('?username')){
            session('username',null);
            session('userid',null);
            alertMes("您已成功退出!","index.html");
        }
    }
    /* 退出登录*/

    public function register_handle(){
         // 写register form的处理代码
        $username=I('username');
        $password=I('password');
        $tel=I('telephone');
        $user=M('user');
        $where['name']=$username;
            $result=$user->where($where)->find();
            if($result){
                alertMes("该用户已存在！",'register.html');
            }else{
               $data=array(
                    'id'=>NULL,
                    'name'=>$username,
                    'pwd'=>$password,
                    'tel'=>$tel,
                );
            
                $insert=$user->add($data);
                if($insert){
                    $_SESSION['username']=$username;
                    // $re=$user->where('name="'.$username.'"')->getField('id');
                    // getField读取某个字段值
                    $_SESSION['userid']=$user->where('name="'.$username.'"')->getField('id');;
                    alertMes("注册成功！","index.html");
                }else{
                    alertMes("写入数据库失败！","register.html");
                }
        }  
    }

    

}
