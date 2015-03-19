<?php
namespace Tool;

/**
 * 无限级分类工具
 */
class Category {
	
	/**
	 * 整理分类数组
	 */
	public static function listCategoriesByParentIdForLevel($categories,$parent_id=0,$level=0,$html='--'){
		//子类别数组
		$categoryArray = array();
		foreach($categories as $category){
			if($category['parent_id'] == $parent_id){
				$category['html'] = str_repeat($html, $level);
				$category['level'] = $level + 1;
				
				$categoryArray[] = $category;
				
				//合并当前类别与其子类别
				$categoryArray = array_merge($categoryArray,self::listCategoriesByParentIdForLevel($categories,$category[id],$category['level']));
			}
		}
		
		return $categoryArray;
	}
	
	/**
	 * 获取当前类别的所有子类别的id
	 */
	public static function listCategoryIdsByParentId($categories,$parentId=0){
		$categoryIdsArray = array();
		
		foreach ($categories as $category){
			if($category['parent_id'] == $parentId){
				$categoryIdsArray[] = $category['id'];
				$categoryIdsArray = array_merge($categoryIdsArray,self::listCategoryIdsByParentId($categories,$category['id']));
			}
		}
		return $categoryIdsArray;
	}
}



