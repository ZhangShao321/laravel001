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
    	<form action="/test/update/{{ $res->id }}" class="mws-form" method="post" >
    		<div class="mws-form-inline">


    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名:</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="username" value="{{ $res->username }}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱:</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="email" value="{{ $res->email }}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机:</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="phone" value="{{ $res->phone }}">
    				</div>
    			</div>
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><label><input type="radio" name="status" checked value="1"> 开启</label></li>
    						<li><label><input type="radio" name="status" value="0"> 关闭</label></li>
    						
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			{{ csrf_field() }}
    			<input type="submit" class="btn btn-danger" value="修改">
    			
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