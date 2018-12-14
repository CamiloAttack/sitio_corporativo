@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
          
                <div class="panel-body" id="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" /> 

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}  form-group-login">
                            <label for="email" class="col-md-3 control-label label-login"><img src="images/fondo_input_1_rojo.png"></label>

                            <div class="col-md-7 col-input-login">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}  form-group-login">
                            <label for="password" class="col-md-3 control-label label-login"><img src="images/fondo_input_2_rojo.png"></label>

                            <div class="col-md-7 col-input-login">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar contraseña
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-login">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
     
    </div>
</div>

@endsection
