<?php
namespace Admin\Controller;

use Tool\Category;
/**
 * 类别管理
 */
class CategoryController extends BaseController {
	
	/**
	 * 类别管理界面
	 */
	public function indexAction(){
		$categoryModel = D('Category');
		
		//SELECT * FROM t_category GROUP BY parent_id,sort
		//$records = $categoryModel->order(array('parent_id'=>'ASC','sort'=>'ASC'))->select();
		$records = $categoryModel->group('parent_id,sort,id')->select();

		//整理分类数据
		$records = Category::listCategoriesByParentIdForLevel($records);
	
		$this->assign('records',$records);
		$this->display();
	}
	
	/**
	 * 新增类别界面
	 */
	public function createAction($parent_id=0){
		$categories = D('Category')->field(array('id','name',"CONCAT(path,'-',id)"=>'xpath'))->order(array('xpath'=>'ASC'))->select();
		if($categories){
			$this->assign('categories',$categories);
		}
		
		$this->assign('parent_id',$parent_id);
		$this->display();
	}
	
	/**
	 * 新增类别
	 */
	public function runCreateAction(){
		if(!IS_POST){
			$this->error('栏目创建错误！');
		}
		
		$categoryModel = D('Category');
		if($categoryModel->create()){
			if($categoryModel->add()){
				$this->success('栏目添加成功！',U('index'));
			}
		}
		
		$this->error('栏目添加失败！');
	}
	
	/**
	 * 修改类别
	 */
	public function updateAction($id=0){
		if(empty($id)){
			$this->error('栏目修改错误！');
		}
		
		$categoryModel = D('Category');
		$path = $categoryModel->getFieldById($id,'path');
		//所有类别的类表
		//SELECT id,name,CONCAT(path,'-',id) AS xpath FROM t_category ORDER BY xpath ASC
		$categories = D('Category')->query("SELECT id,name,CONCAT(path,'-',id) AS xpath FROM t_category HAVING xpath NOT LIKE '%s%%' ORDER BY xpath ASC;",array($path.'-'.$id));
		if($categories){
			$this->assign('categories',$categories);
		}
		
		//要修改的类别
		$record = $categoryModel->where(array('id'=>$id))->find();
		if(!$record){
			$this->error('栏目不存在！');
		}
		
		$this->assign('record',$record);
		$this->display();
	}
	
	/**
	 * 运行更新
	 */
	public function runUpdateAction(){
		if(!IS_POST){
			$this->error('栏目修改错误！');
		}
		
		$categoryModel = D('Category');
		if($categoryModel->create()){
			$id = $categoryModel->id;
			//old path
			$oldPath = I('POST.path');
			if($categoryModel->save()){
				//查询类别的新path值
				$newPath = M('Category')->getFieldById($id,'path');
				//查找其子类别，修改其path字段
				$sql = "UPDATE t_category SET path=REPLACE(path,'%s','%s') WHERE parent_id=%d  AND path LIKE '%s%%'";
				
				$result = M()->execute($sql,array($oldPath,$newPath,$id,$oldPath));
				//注意更新结果(EmtySet[0]和Error[false]的区别)
				if($result >= 0){
					$this->success('栏目修改成功！',U('index'));
				}
			}
		}
		
		$this->error('栏目修改失败！');
	}
	
	/**
	 * 删除类别
	 */
	public function deleteAction($id=0){
		if(empty($id)){
			$this->error('栏目删除错误！');
		}
		
		$categoryModel = D('Category');
		
		$records = $categoryModel->select();
		$records = Category::listCategoryIdsByParentId($records,$id);
		$records[] = $id;
		
		$where['id'] = array('IN',$records);
		$categoryModel->where($where)->delete();
		
		$this->success('栏目删除成功！',U('index'));
	}
	
	/**
	 * 保存排序
	 */
	public function sortAction(){
		if(!IS_POST){
			$this->error('保存排序错误！');
		}
		
		$categorySorts = I('POST.sort');
		foreach ($categorySorts as $key=>$value){
			D('Category')->data(array('sort'=>$value))->where(array('id'=>$key))->save();
		}
		
		$this->success('保存排序成功！',U('index'));
	}
	
}