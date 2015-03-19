<?php
namespace Admin\Controller;

use Think\Controller;
use Tool\Image;

/**
 * 用户身份校验，授权
 */
class AuthorizeController extends Controller {
	
    /**
     * 显示登录视图
     */
    public function indexAction(){
    	$this->display();
    }
    
    /**
     * 生成验证码
     */
    public function verifyCodeAction(){
    	Image::verify();
    }
    
    /**
     * 登录校验
     */
    public function loginAction(){
    	if(!IS_POST){
    		$this->error('提交方式有误！');
    	}
    	
    	//验证码校验
    	$verifyCode = I('POST.verifyCode');
    	if(!session('?verify') || session('verify') != $verifyCode){
    		$this->error('验证码有误！');
    	}

    	$account = I('POST.account');
    	$password = I('POST.password','','md5,strtoupper');
    	
    	$userModel = D('User');
    	
    	$records = $userModel->where(array('account'=>$account))->find();
    	if(!$records || $password != $records['password']){
    		$this->error('账号或密码错误！');
    	}
    	
    	$datas['login_time'] = time();
    	$datas['login_ip'] = get_client_ip();
    	
    	//模型对表记录的更新
    	$userModel->data($datas)->where(array('id'=>$records[id]))->save();
    	
    	//Session值的写入
    	session('uid',$records['id']);
    	session('account',$records['account']);
    	session('name',$records['name']);
    	session('login_time',$datas['login_time']);
    	session('login_ip',$datas['login_ip']);
    	
    	//跳转到操作
    	$this->success('恭喜您,登录成功！',U('Index/index'));
    }
    
    /**
     * 登出操作
     */
    public function logoutAction(){
    	//清空session
    	session(NULL);
    	//销毁session
    	session('[destroy]');
    	
		$this->success('恭喜您！退出成功！',U('Authorize/index'));
    }
    
}

