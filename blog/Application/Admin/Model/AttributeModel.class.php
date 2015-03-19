<?php
namespace Admin\Model;

use Think\Model;

/**
 * 博文属性
 */
class AttributeModel extends Model {
	
	protected $fields = array(
		'id',
		'name',
		'color',
		
		'_pk' => 'id'
	);
}