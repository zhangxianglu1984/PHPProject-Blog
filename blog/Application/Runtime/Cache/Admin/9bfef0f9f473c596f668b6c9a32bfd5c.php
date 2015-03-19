<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	</head>
	<body>
		<form action="<?php echo U('sort');?>" method='POST'>
			<table class='table'>
				<tr>
					<th style='text-align: left;' colspan="5">栏目列表</th>
				</tr>
				<tr>
					<th style='text-align: center; width: 20px;'>序号</th>
					<th style='text-align: center;'>名称</th>
					<th style='text-align: center; width: 20px;'>排序</th>
					<th style='text-align: center; width: 20px;'>层级</th>
					<th style='text-align: center;'>操作</th>
				</tr>
				
				<?php if(is_array($records)): $index = 0; $__LIST__ = $records;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($index % 2 );++$index;?><tr>
						<td align="left"><?php echo ($index); ?></td>
						<td align="left">
							<?php echo ($category['html']); ?>
							<?php echo ($category['name']); ?>
						</td>
						<td align="left">
							<input type='text' name="sort[<?php echo ($category['id']); ?>]" value="<?php echo ($category['sort']); ?>" />
						</td>
						<td align="left">
							<?php echo ($category['level']); ?>
						</td>
						<td align="left">
							[<a href="<?php echo U('create',array('parent_id'=>$category['id']));?>">添加子栏目</a>]
							[<a href="<?php echo U('update',array('id'=>$category['id']));?>">修改</a>]
							[<a href="<?php echo U('delete',array('id'=>$category['id']));?>">删除</a>]
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				
				<tr>
					<td align="center" colspan="5">
						<input type='submit' value='保存排序' />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>