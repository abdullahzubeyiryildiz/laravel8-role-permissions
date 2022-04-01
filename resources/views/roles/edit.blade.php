@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Düzenle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}">Geri</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif



<form action="{{route('roles.update', $role->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role Adı:</strong>
            <input type="text" name="name" value="{{$role->name}}" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>İzin (Permission) Erişim Ver:</strong>
            <br/>
            @if (!empty($permission))
                @foreach($permission as $value)
                    <label>

                    <input type="checkbox" name="permission[]" value="{{$value->id}}" {{in_array($value->id, $rolePermissions) ? 'checked' : ''}} class="name">

                    {{ $value->name }}</label>
                <br/>
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>


@endsection
