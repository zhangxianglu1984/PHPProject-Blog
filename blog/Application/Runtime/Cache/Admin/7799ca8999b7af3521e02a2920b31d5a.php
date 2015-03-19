<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/blog/Application/Admin/View/Public/Css/public.css" />
	</head>
	<body>
		<table class='table'>
			<tr>
				<th style='text-align: left;' colspan="5">博文属性类表</th>
			</tr>
			<tr>
				<th style='text-align: center; width: 20px;'>序号</th>
				<th style='text-align: center;'>名称</th>
				<th style='text-align: center;'>颜色</th>
				<th style='text-align: center;'>操作</th>
			</tr>
			
			<?php if(is_array($records)): $index = 0; $__LIST__ = $records;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attribute): $mod = ($index % 2 );++$index;?><tr>
					<td align="left">
						<?php echo ($index); ?>
					</td>
					<td align="left">
						<?php echo ($attribute['name']); ?>
					</td>
					<td align="left">
						<div style="width: 20px;height: 20px; background: <?php echo ($attribute['color']); ?>;"></div>
					</td>
					<td align="left">
						[<a href="<?php echo U('update',array('id'=>$attribute['id']));?>">修改</a>]
						[<a href="<?php echo U('runDelete',array('id'=>$attribute['id']));?>">删除</a>]
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			
			<tr>
				<td align="center" colspan="5">
					<input type='submit' value='保存排序' />
				</td>
			</tr>
		</table>
	</body>
</html>