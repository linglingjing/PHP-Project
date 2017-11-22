<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
class PublicController extends Controller {
    public function header(){
        $this->display();
    }
    public function footer(){
        $this->display();
    }
}
