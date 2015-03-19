<?php
namespace Admin\Model;

use Think\Model;

/**
 * 类别模型
 */
class CategoryModel extends Model {
	
	protected $fields = array(
		'id',
		'name',
		'parent_id',
		'sort',
		'path',
		'create_time',
		'update_time',
			
		'_pk' => 'id'
	);
	
	/**
	 * 自动完成
	 */
	protected $_auto = array(
		array('create_time','time',self::MODEL_INSERT,'function'),
		array('update_time','time',self::MODEL_BOTH,'function'),
		array('path','calPath',self::MODEL_BOTH,'callback'),
	);
	
	protected function calPath(){
		$parentId = I('POST.parent_id',0,'intval');
		
		$path = '0';
		if($parentId !== 0){
			$path = $this->getFieldById($parentId,'path') . '-' . $parentId;
		}
		
		return $path;
	}
	
	
}






