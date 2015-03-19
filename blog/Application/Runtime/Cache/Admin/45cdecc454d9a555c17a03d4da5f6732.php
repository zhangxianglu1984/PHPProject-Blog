<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	</head>
	<body>
		<form action="<?php echo U('runCreate');?>" method="POST">
			<table class='table'>
				<tr>
					<th colspan="2" style='text-align: left;'>添加博文</th>
				</tr>
				
				<tr>
					<td align="right">标题：</td>
					<td>
						<input type='text' name='title' value="" />
					</td>
				</tr>
				
				<tr>
					<td align="right">栏目：</td>
					<td>
						<select name='category_id'>
							<option value=''>=====请选择=====</option>
							<?php if(is_array($categories)): $index = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($index % 2 );++$index;?><option value="<?php echo ($category['id']); ?>">
									
									<?php $__FOR_START_12270__=1;$__FOR_END_12270__=mb_substr_count($category['xpath'],'-');for($i=$__FOR_START_12270__;$i < $__FOR_END_12270__;$i+=1){ ?>--<?php } ?>
									<?php echo ($category['name']); ?>
								</option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td align="right">属性：</td>
					<td>
						<?php if(is_array($attributes)): $index = 0; $__LIST__ = $attributes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attribute): $mod = ($index % 2 );++$index;?><input type='checkbox' name='attribute_id[]' value="<?php echo ($attribute['id']); ?>" />
							<?php echo ($attribute['name']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr>
				
				<tr>
					<td colspan="2" align="center">
						<textarea id='content' name='content'></textarea>
					</td>
				</tr>
				
				<tr>
					<td colspan="2" align="center">
						<input type='submit' value='保存' />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>