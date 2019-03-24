@extends('layouts.app')

@section('content')


<div class="page-header" style="background-image: url('../assets/img/sections/bruno-abatti.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3">
                        <div class="card card-register" style="margin-top:180px;background-color:#dbdcdb;">
                            <h3 class="card-title">Réinitialisé le mot de passe</h3>

                            
                    
                            <form class="register-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                                <label style="color:#303030;">Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('email') }}<br></strong>
                                    </span>
                                @endif

                                


                                <button class="btn btn-info btn-block">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
				
            </div>
        </div>

@endsection




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <label style="color:#303030;">Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('email') }}<br></strong>
                                    </span>
                                @endif

                                <label style="color:#303030;">Mot de passe</label>
                                <input type="password" class="form-control no-border {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


                                <label style="color:#303030;">Mot de passe</label>
                                <input type="password" class="form-control no-border" placeholder="Confirmation de mot de passe" name="password_confirmation" required>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Réinitialiser
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
