<?php
namespace Admin\Model;

use Think\Model;

class BlogModel extends Model {
	protected $fields = array(
		'id',
		'title',
		'content',
		'category_id',
		'create_time',
		'author_id',
		'is_recycle',
		
		'_pk' => 'id'
	);
	
	protected $_auto = array(
		array('create_time','time',self::MODEL_INSERT,'function'),
		array('author_id','session',self::MODEL_INSERT,'function',array('uid')),
	);
}


