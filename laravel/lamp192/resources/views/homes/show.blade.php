@extends('homes.moban')

@section('title', '用户列表')

@section('content')


	@if($b > 1)
		<h1>aaaaaaa</h1>
	@elseif ($b < 1)
		<h2>bbbbbbb</h2>
	@else
		<h3>ccccccc</h3>
	@endif

	@for($i = 1; $i <= 10; $i++)

		{{ $i }}
	@endfor

	
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

		@foreach($res as $k=>$v)
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
				<td align="center">
					<a href=""><button>修改</button></a>
					<form action="" method="post" style="display:inline">
						<button>删除</button>
					</form>
				</td>
			</tr>

		@endforeach

		<!-- <?php
			/*foreach ($data as $key => $value) {
				
				echo "<tr algin='center'>";
					echo "<td> $value[id] </td>";
					echo "<td> $value[name] </td>";
					echo "<td> $value[sex] </td>";
					echo "<td> $value[age] </td>";
					echo "<td> $value[phone] </td>";
					echo "<td> $value[address] </td>";
					echo "<td> $value[email] </td>";
					echo "<td> $value[wechat] </td>";
					echo "<td> $value[ip] </td>";
					echo "<td> 
							<a href='/admin/user/delete/$value[id]'>删除</a>
							<a href='/admin/user/edit/$value[id]'>修改</a>
					 </td>";
				echo "</tr>";
			}*/
		?> -->
		
		
	</table>
@endsection