<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	</head>
	<body>
		<form action="<?php echo U('update');?>" method='POST'>
			<table class='table'>
				<tr>
					<th colspan="2" style='text-align: left;'>配置项管理</th>
				</tr>
				
				<tr>
					<td align="right">验证码长度：</td>
					<td>
						<input type='text' name='verify_length' value="<?php echo C('VERIFY_LENGTH');?>" />
					</td>
				</tr>
				
				<tr>
					<td colspan='2' align="center">
						<input type='submit' value='保存' />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>