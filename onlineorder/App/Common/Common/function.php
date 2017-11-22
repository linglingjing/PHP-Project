<?php
/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('first', '首页');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    $p->rollPage = 3;//分页栏每页显示的页数，当数据不足2页以上不会出现“首页”“尾页”按钮
    return $p;
}

/*验证码生成*/
function verify_c(){
    $Verify=new \Think\Verify();
    $Verify->fontSize=20;
    $Verify->length=4;
    $Verify->imageW=140;
    $Verify->imageH=50;
    $Verify->useNoise=false;
    $Verify->entry();
}
function check_verify($code,$id=""){
    $verify=new \Think\Verify();
    return $verify->check($code,$id);
}

/*删除操作*/
function DeleteInfo($tablename,$id){
    $table=M($tablename);
    $where['id']=$id;
    $result=$table->where($where)->delete();
    if($result){
        $info="删除成功！";
        return $info;
    }else{
        $info="删除失败，请稍候重试！";
        return $info;
    }
}

/**
 * 生成缩略图
 * @param int $width 缩略图的宽
 * @param int $height 缩略图的高
 * @param string $savepath 文件保存的路径
 * @param string $savename 文件名
 * @return string
 */
function thumb($width,$height,$savepath,$savename){

    $file='./Public'.$savepath.$savename;//上传的原文件保存路径
    $prefix=$width."x".$height."_";//定义缩略图前缀
    $path='./Public'.$savepath.$prefix.$savename;//缩略图保存路径+文件名

    $image=new \Think\Image();//调用Image类
    $image->open($file);//打开原文件
    $image->thumb($width,$height,2);//缩略图生成
    $image->save($path);//保存缩略图

    $newpath='/onlineorder/Public'.$savepath.$prefix.$savename;
    return $newpath;//返回缩略图保存的路径
}



/****************************************************************/
/**********************liangjing*********************************/
/****************************************************************/





/*封装信息提示函数*/
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}


?>