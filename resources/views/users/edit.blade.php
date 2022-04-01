@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Kullanıcı Düzenle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Geri</a>
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



<form action="{{route('users.update', $user->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ad Soyad:</strong>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>E-Posta:</strong>
            <input type="email" name="email"  value="{{$user->email}}" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Şifre:</strong>
            <input type="password" name="password"   class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Şifre Tekrar :</strong>
            <input type="password" name="confirm-password" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rol:</strong>
            <select name="roles[]"class="form-control" multiple>
                @if (!empty($roles))
                    @foreach ($roles as $role)

                        <option value="{{$role}}"  {{ in_array($role,  $userRole) ? 'selected' : ''}}> {{$role}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection
