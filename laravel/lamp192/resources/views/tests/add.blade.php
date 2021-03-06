@extends('tests.moban')

@section('title','添加用户')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>添加用户</span>
    </div>
    @if (count($errors) > 0)
	    <div class="mws-form-message error">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li style="font-size:17px;list-style:none">{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    <div class="mws-panel-body no-padding">
    	<form action="/test/insert" class="mws-form" method="post" enctype="multipart/form-data">
    		<div class="mws-form-inline">


    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名:</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="username" value="{{ old('username') }}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">密码:</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="password" value="">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码:</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="repass" value="">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱:</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="email" value="{{ old('email') }}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机:</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="phone" value="{{ old('phone') }}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">头像:</label>
    				<div class="mws-form-item">
    					<input class="fileinput-preview" type="file" name="pic" style="width: 100%; padding-right: 85px;" placeholder="No file selected...">
    				</div>
    			</div>
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio" name="status" checked value="1"> <label>开启</label></li>
    						<li><input type="radio" name="status" value="0"> <label>关闭</label></li>
    						
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			{{ csrf_field() }}
    			<input type="submit" class="btn btn-danger" value="添加">
    			
    		</div>
    	</form>
    </div>    	
</div>

@endsection

@section('js')
<script>
	// alert($);
	$('.mws-form-message').delay(3000).slideUp(1000);
</script>
@endsection