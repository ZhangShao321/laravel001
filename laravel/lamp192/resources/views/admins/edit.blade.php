@extends('admins/moban')

@section('content')


			<form action="/admin/stu/{{ $res->id }}" method="post" enctype="multipart/form-data">
				姓名：<input type='text' name='name' value='{{ $res->name }}'/><br/>
				性别：<input type='radio' name='sex' value='w' {{ $res->sex or 'checked' }} /> 女
					  <input type='radio' name='sex' value='m'  /> 男<br/>
				年龄：<input type='text' name='age' value='{{ $res->age }}'/><br/>
				电话：<input type='text' name='phone' value='{{ $res->phone }}'/><br/>
				地址：<input type='text' name='address' value='{{ $res->address }}'/><br/>
				邮箱：<input type='text' name='email' value='{{ $res->email }}'/><br/>
				微信：<input type='text' name='wechat' value='{{ $res->wechat }}'/><br/>
				头像：<input type='file' name='pic' /><br/>
				<input type="hidden" name="ip" value="<?= $_SERVER['REMOTE_ADDR'] ?>" />
				{{ csrf_field() }}
				{{ method_field('PUT')}}
				<input type="submit" value="提交" />
			</form>
			<h3>原头像</h3>
			<img src="{{ $res->pic }}" width="100px" alt="">
@endsection