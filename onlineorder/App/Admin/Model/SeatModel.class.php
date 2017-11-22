<?php
namespace Admin\Model;
use Think\Model;
class SeatModel extends Model{
	protected $_map=array(
		'seatid'=>'id',
		'seattype'=>'type',
		'seatstock'=>'stock',
	);

	protected $_validate=array(
		array('type','','席位类型已存在，请更换！',0,'unique',1),
		array('type','/^[\x{4e00}-\x{9fa5}]+$/u','席位名称格式不正确！'),
	);
}