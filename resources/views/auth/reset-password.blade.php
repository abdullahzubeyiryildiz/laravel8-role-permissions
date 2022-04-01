@extends('layouts.app')

@section('content')




<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row">
                        <div class="card col-lg-12">
                            <div class="card-content  col-lg-12">
                              <h1 class="title">Şifre Sıfırla</h1>
                                <ul>
                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    @endif

                                    @if (session('status'))
                                    <li class="alert alert-success">
                                        {{ session('status') }}
                                    </li>
                                    @endif
                                </ul>

                              <form method="POST" action="{{ route('password.update') }}" role="form">
                                  @csrf
                                  <input type="hidden" name="token" value="{{ $token }}">

                                <div class="col-lg-12">
                                        <div class="form-group">
                                        <label for="email" class="label">Eposta Adresiniz</label>
                                        <p class="form-group">
                                            <input class="form-control {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email') ?? $request->email}}" required>
                                        </p>
                                        @if ($errors->has('email'))
                                            <p class="help is-danger">{{$errors->first('email')}}</p>
                                        @endif
                                        </div>

                                    <div class="form-group">
                                      <label for="password" class="label">Yeni Şifre</label>
                                      <p class="form-group">
                                        <input class="form-control  {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" required>
                                      </p>
                                      @if ($errors->has('password'))
                                        <p class="help is-danger">{{$errors->first('password')}}</p>
                                      @endif
                                    </div>

                                    <div class="form-group">
                                      <label for="password-confirmation" class="label">Yeni Şifre Tekrar</label>
                                      <p class="form-group">
                                        <input class="form-control {{$errors->has('password_confirmation') ? 'is-danger' : ''}}" type="password" name="password_confirmation" id="password-confirmation" required>
                                      </p>
                                      @if ($errors->has('password_confirmation'))
                                        <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                                      @endif
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-block btn-lg login-btn mt-2 mb-3">Şifreyi Sıfırla</button>
                              </form>
                            </div> <!-- end of .card-content -->
                          </div> <!-- end of .card -->
                    </div>
                </div>
                <!-- /Login Tab Content -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->


@endsection
