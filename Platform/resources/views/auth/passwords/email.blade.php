@extends('layouts.app')

@section('content')


<div class="page-header" style="background-image: url('../assets/img/sections/bruno-abatti.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3">
                        <div class="card card-register" style="margin-top:180px;background-color:#dbdcdb;">
                            <h3 class="card-title">Mot de passe oublié ?</h3>

                            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                            <form class="register-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
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

