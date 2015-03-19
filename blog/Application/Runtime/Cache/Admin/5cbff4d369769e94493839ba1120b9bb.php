<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	</head>
	<body>
		<form action="<?php echo U('runUpdate');?>" method='POST'>
			<table class='table'>
				<tr>
					<th colspan="2" style='text-align: left;'>添加博文属性</th>
				</tr>
				
				<tr>
					<td align="right">属性名：</td>
					<td>
						<input type='text' name='name' value="<?php echo ($record['name']); ?>" />
					</td>
				</tr>
				
				<tr>
					<td align="right">属性颜色：</td>
					<td>
						<input type='text' name='color' value="<?php echo ($record['color']); ?>" />
					</td>
				</tr>
				
				<tr>
					<td colspan='2' align="center">
						<input type='hidden' name='id' value="<?php echo ($record['id']); ?>" />
						<input type='submit' value='保存' />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>