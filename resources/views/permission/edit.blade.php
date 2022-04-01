@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>İzin (Permission) Düzenle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('permission.index') }}"> Geri</a>
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



<form action="{{route('permission.update', $permission->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>İzin Adı:</strong>
            <input type="text" name="name" value="{{$permission->name}}" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>
</div>
</form>


@endsection
