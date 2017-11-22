<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class UserModel extends Model
{
	protected $_map=array(
		'username'=>'name',
		'password'=>'pwd',
		'telephone'=>'tel',
		'password_comfirm'=>'',

	);
	
}

 ?>