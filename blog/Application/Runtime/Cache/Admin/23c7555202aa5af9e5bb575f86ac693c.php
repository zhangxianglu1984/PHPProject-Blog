<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	</head>
	<body>
		<form action="<?php echo U('Category/runCreate');?>" method='POST'>
			<table class='table'>
				<tr>
					<th colspan="2" style='text-align: left;'>添加栏目</th>
				</tr>
				
				<tr>
					<td align="right">栏目名称：</td>
					<td>
						<input type='text' name='name' />
					</td>
				</tr>
				
				<tr>
					<td align="right">栏目排序：</td>
					<td>
						<input type='text' name='sort' value='100' />
					</td>
				</tr>
				
				<tr>
					<td align="right">父级栏目：</td>
					<td>
						<select name='parent_id'>
							<option value='0'>根栏目</option>
							<?php if(is_array($categories)): $index = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($index % 2 );++$index;?><option value="<?php echo ($category['id']); ?>"
									<?php if(($parent_id) == $category['id']): ?>selected="selected"<?php endif; ?>
								>
									
									<?php $__FOR_START_21172__=1;$__FOR_END_21172__=mb_substr_count($category['xpath'],'-');for($i=$__FOR_START_21172__;$i <= $__FOR_END_21172__;$i+=1){ ?>--<?php } ?>
									<?php echo ($category['name']); ?>
								</option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
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