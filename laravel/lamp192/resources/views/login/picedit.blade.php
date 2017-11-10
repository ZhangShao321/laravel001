@extends('tests.moban')

@section('title','修改头像')

@section('content')

<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span>修改头像</span>
    </div>
    <div class="mws-panel-body no-padding">

    	<div class="mws-form-row bordered">
            <label class="mws-form-label">原头像</label>
            <div class="mws-form-item">
                <img src="{{ $res->pic }}" alt="">
            </div>
        </div>

        <form class="mws-form" action="/admin/picupdate/{{ $res->id }}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row bordered">
                    <label class="mws-form-label">新头像</label>
                    <div class="mws-form-item">
                        <input type="file" name="pic" class="large">
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