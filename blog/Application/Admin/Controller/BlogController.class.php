<?php
namespace Admin\Controller;

/**
 * 博文管理
 */
class BlogController extends BaseController {
	
	public function indexAction(){
		$this->display();
	}
	
	public function createAction(){
		//博文栏目
		$categories = M('Category')->field(array('id','name',"CONCAT(path,'-',id)"=>'xpath'))->order(array('xpath'=>'ASC'))->select();
		$this->assign('categories',$categories);
		
		//博文属性
		$attributes = M('Attribute')->select();
		$this->assign('attributes',$attributes);
		
		$this->display();
	}
	
	public function runCreateAction(){
		P($_POST);
		die;
	}
	
	public function updateAction(){
		$this->display();
	}
	
	public function runUpdateAction(){}
	
	/**
	 * 回收的博文列表
	 */
	public function recycleAction(){
		$this->display();
	}
	
	/**
	 * 回收博文
	 */
	public function runRecycleAction(){}
	
	/**
	 * 删除博文
	 */
	public function runDeleteAction(){}
}