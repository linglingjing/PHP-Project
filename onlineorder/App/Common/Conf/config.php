<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'127.0.0.1',
	'DB_NAME'=>'onlineorder',
	'DB_USER'=>'root',
	'DB_PWD'=>'12345678',
	// 'DB_PWD'=>'',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'onlineorder_',//数据库前缀名
	'DB_DEBUG'=>TURE,
	'SHOW_PAGE_TRACE'=>true,
	'SESSION_AUTO_START'=>true,


	/*文件上传配置*/
	'UPLOAD_CONFIG'=>array(
		'maxSize'=>3145728,//最大文件大小（字节为单位）
		'rootPath'=>'./Public/',
		'savePath'=>'/Upload/Dish/',//上传文件保存路径
		'saveName'=>array('uniqid',''),//上传文件保存规则
		'exts'=>array('jpg','gif','png','jpeg'),//允许上传文件后缀
		'autoSub'=>flase,

	),
);