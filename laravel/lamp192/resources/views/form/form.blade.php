<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form表单POST提交</title>
</head>
<body>
	<form action="/doform" method="post">
		用户名: <input type="text" name="uname"><br/>
		<input type="submit" value="提交">
		{{ csrf_field() }}
	</form>
</body>
</html>