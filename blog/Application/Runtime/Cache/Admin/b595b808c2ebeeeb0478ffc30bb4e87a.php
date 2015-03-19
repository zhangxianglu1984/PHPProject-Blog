<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

	<!-- 导入脚本 -->
	<script type="text/javascript" src="/blog/Application/Admin/View/Public/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/blog/Application/Admin/View/Public/Js/index.js"></script>
	
	<!-- 导入样式文件 -->
	<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/index.css" />
	
	<base target="iframe"/>
</head>
<body>
	<div id="top">
		<div class="menu">
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
		</div>
		<div class="exit">
			<a href="<?php echo U('Authorize/logout');?>" target="_self">退出</a>
		</div>
	</div>
	<div id="left">
		<dl>
			<dt>博文管理</dt>
			<dd>
				<a href="<?php echo U('Blog/create');?>">添加博文</a>
			</dd>
			<dd>
				<a href="<?php echo U('Blog/index');?>">博文列表</a>
			</dd>
		</dl>
	
		<dl>
			<dt>栏目管理</dt>
			<dd>
				<a href="<?php echo U('Category/create');?>">添加栏目</a>
			</dd>
			<dd>
				<a href="<?php echo U('Category/index');?>">栏目列表</a>
			</dd>
		</dl>
		
		<dl>
			<dt>博文属性管理</dt>
			<dd>
				<a href="<?php echo U('Attribute/create');?>">添加属性</a>
			</dd>
			<dd>
				<a href="<?php echo U('Attribute/index');?>">属性列表</a>
			</dd>
		</dl>
		
		<dl>
			<dt>验证码管理</dt>
			<dd>
				<a href="<?php echo U('VerifyCode/index');?>">配置项管理</a>
			</dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src="#"></iframe>
	</div>
</body>
</html>