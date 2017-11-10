@extends('admins.moban')

@section('content')

			<h3>添加信息</h3>
			<form action="/admin/stu" method="post" enctype="multipart/form-data">
				姓名：<input type='text' name='name' value=''/><br/>
				性别：<input type='radio' name='sex' value='w'/> 女
					  <input type='radio' name='sex' value='m'/> 男<br/>
				年龄：<input type='text' name='age' value=''/><br/>
				电话：<input type='text' name='phone' value=''/><br/>
				地址：<input type='text' name='address' value=''/><br/>
				邮箱：<input type='text' name='email' value=''/><br/>
				微信：<input type='text' name='wechat' value=''/><br/>
				头像：<input type='file' name='pic' /><br/>
				<input type="hidden" name="ip" value="<?= $_SERVER['REMOTE_ADDR'] ?>" />
				
				{{ csrf_field() }}
				
				<input type="submit" value="提交" />
			</form>

@endsection