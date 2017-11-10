<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
</head>
<body>
	<center>
	<h2>学生信息管理系统</h2>
	<a href='/admin/user'>添加信息</a>
	<a href='/admin/user/show'>查看信息</a>
	<hr/>
	
	<h3>用户列表</h3>
	<table border="1" width="1200">
		<tr>
			<th>ID</th>
			<th>姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>电话</th>
			<th>地址</th>
			<th>邮箱</th>
			<th>微信</th>
			<th>IP</th>
			<th>操作</th>
		</tr>

		<?php
			foreach ($data as $key => $value) {
				
				echo "<tr algin='center'>";
					echo "<td> $value->id </td>";
					echo "<td> $value->name </td>";
					echo "<td> $value->sex </td>";
					echo "<td> $value->age </td>";
					echo "<td> $value->phone </td>";
					echo "<td> $value->address </td>";
					echo "<td> $value->email </td>";
					echo "<td> $value->wechat</td>";
					echo "<td> $value->ip </td>";
					echo "<td> 
							<a href='/admin/user/delete/$value->id'>删除</a>
							<a href='/admin/user/edit/$value->id'>修改</a>
					 </td>";
				echo "</tr>";
			}
		?>
		
		
	</table>
</body>
</html>