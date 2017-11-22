<?php
namespace Admin\Model;
use Think\Model;
class DishtypeitemModel extends Model{
	protected $_map=array(
		'dishtypeid'=>'id',
		'dishtypename'=>'name',
		'fathertype'=>'typeid',
	);

	protected $_validate=array(
		array('name','','菜品类型已存在，请更换！',0,'unique',1),
		array('name','/^[\x{4e00}-\x{9fa5}]+$/u','菜品类型名称格式不正确！'),
	);
}