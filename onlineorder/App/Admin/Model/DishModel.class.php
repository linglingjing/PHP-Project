<?php
namespace Admin\Model;
use Think\Model;
class DishModel extends Model{
	protected $_map=array(
		'dishid'=>'id',
		'dishname'=>'name',
		'dishtype'=>'dishtype',
		'dishprice'=>'price',
		'dishinfo'=>'info',
	);

	protected $_validate=array(
		array('name','','菜品名称已存在，请更换！',0,'unique',1),
		array('name','/^[\x{4e00}-\x{9fa5}]+$/u','菜品名称格式不正确！'),
	);
}