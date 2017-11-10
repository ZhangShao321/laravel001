@extends('tests.moban')

@section('title','用户列表页')

@section('content')


<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i> 用户列表</span>
		</div>
		<div class="mws-panel-body no-padding">
		<div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
		<div id="DataTables_Table_1_length" class="dataTables_length">
		<form action="/test/show" method="get">
		<label>显示 
		    <select name="num" size="1" aria-controls="DataTables_Table_1">
		        <option value="10" @if(@$aaa['num'] == 10) selected="selected" @endif >10</option>
		        <option value="25" @if(@$aaa['num'] == 25) selected="selected" @endif>25</option>
		        <option value="50" @if(@$aaa['num'] == 50) selected="selected" @endif>50</option>
		        <option value="100" @if(@$aaa['num'] == 100) selected="selected" @endif>100</option>
		    </select> 条每页
		</label>
		</div>
		
		<div class="dataTables_filter" id="DataTables_Table_1_filter">
		    <label>搜索: 
		    	<input type="text" name="sousuo" value="{{ @$aaa['sousuo'] }}" aria-controls="DataTables_Table_1">
		    </label>
		    {{ csrf_field() }}
		    <button class="btn btn-defaul">搜索</button>
		</div>
		</form>
		<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
		    <thead>
		        <tr role="row">
		            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
		            	ID
		            </th>
		            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Browser: activate to sort column ascending">
		            	用户名
		            </th>
		            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
		            	邮箱
		            </th>
		            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
		            	手机号
		            </th>
		            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
		            	头像
		            </th>
		            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
		            	状态
		            </th>
		            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 150px;" aria-label="CSS grade: activate to sort column ascending">
		            	操作
		            </th>
		        </tr>
		    </thead>

		<tbody role="alert" aria-live="polite" aria-relevant="all">
				@foreach($res as $k => $v)
				<tr class=" @if($k % 2 == 0) odd @else even @endif">
		            <td class="  sorting_1">{{ $v->id }}</td>
		            <td class=" ">{{ $v->username }}</td>
		            <td class=" ">{{ $v->email }}</td>
		            <td class=" ">{{ $v->phone }}</td>
		            <td class=" "><img src="{{ $v->pic }}" alt="" ></td>
		            <td class=" ">{{ $v->status }}</td>
		            <td class=" ">
		            	<a href="/test/edit/{{ $v->id }}" class="btn btn-defaul">修改</a>
		            	<form action="/test/delete/{{ $v->id }}" method="post" style="display:inline">
							{{ csrf_field() }}
							<button class="btn btn-defaul">删除</button>
		            	</form>
		            </td>
		        </tr>

		        @endforeach

		</tbody>
		</table>

		
		<style>
			.pagination li{
                background-color: #444444;
                border-left: 1px solid rgba(255, 255, 255, 0.15);
                border-right: 1px solid rgba(0, 0, 0, 0.5);
                box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;
                
                cursor: pointer;
                display: block;
                float: left;
                font-size: 12px;
                height: 20px;
                line-height: 20px;
                outline: medium none;
                padding: 0 10px;
                text-align: center;
                text-decoration: none;
            }

            .pagination a{
                color: #fff;

            }
            
            .pagination .active{
                background-color: #88a9eb;
                background-image: none;
                border: medium none;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
                color: #323232;
            }

            .pagination .disabled{
                color: #666666;
                cursor: default;
            }

            .pagination{

                margin:0px;
            }
		</style>
		<div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 55 entries</div>
		    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
		        {!! $res->appends($aaa)->render() !!}
		        
		    </div>

		</div>

    </div>
</div>


@endsection