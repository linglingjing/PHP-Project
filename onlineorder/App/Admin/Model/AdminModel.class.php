<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
	protected $_map=array(
		'adminid'=>'id',
		'adminname'=>'name',
		'adminpwd'=>'pwd',
		'adminsuper'=>'super',
		'adminregtime'=>'regtime',
	);

	protected $_validate=array(
		array('name','','用户名已存在，请更换！',0,'unique',1),
		array('name','/^[\x{4e00}-\x{9fa5}A-Za-z]+$/u','用户名格式不正确！'),
		array('pwd','/[\S\w{6,18}]$/','密码格式不正确！'),
		array('repwd','pwd','确认密码不正确',0,'confirm'),
	);
}