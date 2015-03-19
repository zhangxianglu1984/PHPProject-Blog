<?php
namespace Admin\Controller;

/**
 * 博文属性
 */
class AttributeController extends BaseController {
	
	public function indexAction(){
		$records = M('Attribute')->select();  
		
		$this->records = $records;
		$this->display();
	}
	
	public function createAction(){
		$this->display();
	}
	
	public function runCreateAction(){
		if(!IS_POST){
			$this->error('属性添加错误！');
		}
		
		$attributeModel = D('Attribute');
		if($attributeModel->create()){
			if($attributeModel->add()){
				$this->success('属性添加成功！',U('index'));
			}
		}
		
		$this->error('属性添加失败！');
	}
	
	public function updateAction($id=0){
		if(empty($id)){
			$this->error('属性修改错误！');
		}
		
		$record = M('Attribute')->where(array('id'=>$id))->find();
		if($record && is_array($record)){
			$this->assign('record',$record);
			$this->display();
		}else {
			$this->error('属性修改失败！');
		}
	}
	
	public function runUpdateAction(){
		if(!IS_POST){
			$this->error('属性修改错误！');
		}
		
		$attributeModel = D('Attribute');
		if($attributeModel->create()){
			if($attributeModel->save() >= 0){
				$this->success('属性修改成功',U('index'));
			}
		}
		
		$this->error('属性修改失败！');
	}
	
	public function runDeleteAction($id=0){
		if(empty($id)){
			$this->error('属性删除错误！');
		}
		
		if(M('Attribute')->where(array('id'=>$id))->delete()){
			$this->success('属性删除成功！',U('index'));
		}
		
		$this->error('属性删除失败！');
	}
}