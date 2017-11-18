@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}'s Profile</div>
 
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="/uploads/avatar/{{ $user->avatar }}" style="width:160px; height:160px; float:left; border-radius:50%; margin-right:25px;">
                    This is {{ Auth::user()->name }} Information. You must be privileged to be here !

                    <form enctype="multipart/form-data" action="{{ route('admin.proupdate') }}" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection