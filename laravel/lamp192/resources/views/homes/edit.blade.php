<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改信息</title>
</head>
<body>
	<center>
		<h2>学生信息管理系统</h2>
		<a href='/admin/user'>添加信息</a>
		<a href='/admin/user/show'>查看信息</a>
		<hr/>
		
		<h3>添加信息</h3>

		<!-- <?= var_dump($data) ?> -->
		<form action='/admin/user/update' method='post'>
			ID: <input type="text" name="id" readonly="readonly" value="<?= $data[0]['id'] ?>"><br/>
			姓名:<input type='text' name='name' value="<?= $data[0]['name'] ?>" /><br/>
			性别:<input type='radio' name='sex' value='m' <?= $data[0]['sex'] == 'm' ? 'checked' : '' ?> />男
			     <input type='radio' name='sex' value='w' <?= $data[0]['sex'] == 'w' ? 'checked' : '' ?> />女<br/>
			年龄:<input type='text' name='age' value="<?= $data[0]['age'] ?>" /><br/>
			电话:<input type='text' name='phone' value="<?= $data[0]['phone'] ?>" /><br/>
			地址:<input type='text' name='address' value="<?= $data[0]['address'] ?>" /><br/>
			邮箱:<input type='text' name='email' value="<?= $data[0]['email'] ?>" /><br/>
			微信:<input type='text' name='wechat' value="<?= $data[0]['wechat'] ?>" /><br/>
			{{ csrf_field() }}
			<input type='submit'  value='修改' /><br/>
		</form>
	</center>
</body>
</html>