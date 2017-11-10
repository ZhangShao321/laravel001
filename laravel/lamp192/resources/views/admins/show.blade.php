@extends('admins.moban')

@section('content')


			<h3>查看学生信息</h3>
			<table border='1' width='1200'>
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
					<th>头像</th>
					<th>操作</th>
				</tr>

				@foreach($ccc as $k=>$v)

					<tr>
						<td>{{ $v->id }}</td>
						<td>{{ $v->name }}</td>
						<td>{{ $v->sex }}</td>
						<td>{{ $v->age }}</td>
						<td>{{ $v->phone }}</td>
						<td>{{ $v->address }}</td>
						<td>{{ $v->email }}</td>
						<td>{{ $v->wechat }}</td>
						<td>{{ $v->ip }}</td>
						<td><img src="{{ $v->pic }}" width="50px" alt=""></td>
						<td>
							<a href="stu/{{ $v->id }}/edit"><button>修改</button></a>
							<form action="stu/{{ $v->id }}" method="post" style="display:inline">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button>删除</button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


@endsection