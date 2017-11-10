@extends('tests.moban')

@section('title','修改密码')

@section('content')

<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span>修改密码</span>
    </div>
    <div class="mws-panel-body no-padding">

        <form class="mws-form" action="/admin/passupdate/{{ $res->id }}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row bordered">
                    <label class="mws-form-label">新密码</label>
                    <div class="mws-form-item">
                        <input type="password" name="password" class="large">
                    </div>
                </div>

                <div class="mws-form-row bordered">
                    <label class="mws-form-label">重复密码</label>
                    <div class="mws-form-item">
                        <input type="password" name="repass" class="large">
                    </div>
                </div>
                
                
            </div>
            <div class="mws-button-row">
            	{{ csrf_field() }}
                <input type="submit" value="修改" class="btn btn-danger">
            	
            </div>
        </form>
    </div>      
</div>

@endsection