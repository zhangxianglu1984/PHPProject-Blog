<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller {
	
	protected function _initialize(){
		if(!session('?uid') || !session('?account')){
			$this->error('还未登录或登录已过期！',U('Authorize/index'));
		}
	}
}
