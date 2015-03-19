<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	</head>
	<body>
		<form action="<?php echo U('runCreate');?>" method='POST'>
			<table class='table'>
				<tr>
					<th colspan="2" style='text-align: left;'>添加博文属性</th>
				</tr>
				
				<tr>
					<td align="right">属性名：</td>
					<td>
						<input type='text' name='name' value="" />
					</td>
				</tr>
				
				<tr>
					<td align="right">属性颜色：</td>
					<td>
						<input type='text' name='color' value="" />
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