<?php 
namespace Admin\Model;

use Think\Model;

/**
 * 用户表模型
 */
class UserModel extends Model {
	
	/**
	 * 说明模型有哪些表字段
	 */
	protected $fields = array(
		'id',
		'account',
		'password',
		'name',
		'login_ip',
		'login_time',

		'_pk' => 'id'
	);
}