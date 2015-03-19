<?php
namespace Admin\Controller;

/**
 * 验证码配置
 */
class VerifyCodeController extends BaseController {
	
	public function indexAction(){
		$this->display();
	}
	
	public function updateAction(){
		if(!IS_POST){
			$this->error('验证码修改错误！');
		}
		
		$verifyLength = I('POST.verify_length',0);
		
		$verifyCodeConfigFilePath = MODULE_PATH . 'Conf/verifyCode.php';
		
		$verifyCodeConfig = load_config($verifyCodeConfigFilePath);
		$verifyCodeConfig['VERIFY_LENGTH'] = $verifyLength;
		
		$verifyCodeConfigFileContent = '<?php return ' . var_export($verifyCodeConfig,TRUE) . ';';
		\Think\Storage::put($verifyCodeConfigFilePath,$verifyCodeConfigFileContent);
		
		$this->success('验证码修改成功！',U('index'));
	}
}


