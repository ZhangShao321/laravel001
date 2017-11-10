@extends('homes.moban')

@section('title', 'aaaaa')

@section('content')
		
		<h3>添加信息</h3>
		<form action='/admin/user' method='post'>
			姓名:<input type='text' name='name' value='' /><br/>
			性别:<input type='radio' name='sex' value='m' />男
			     <input type='radio' name='sex' value='w' />女<br/>
			年龄:<input type='text' name='age' value='' /><br/>
			电话:<input type='text' name='phone' value='' /><br/>
			地址:<input type='text' name='address' value='' /><br/>
			邮箱:<input type='text' name='email' value='' /><br/>
			微信:<input type='text' name='wechat' value='' /><br/>
			<input type='hidden' name='ip' value='<?= $_SERVER['REMOTE_ADDR'] ?>' /><br/>
			{{ csrf_field() }}
			<input type='submit'  value='提交' /><br/>
		</form>

@endsection