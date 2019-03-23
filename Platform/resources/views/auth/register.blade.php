@extends('layouts.app')

@section('content')



<div class="page-header" style="background-image: url('assets/img/sections/bruno-abatti.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3">
                        <div class="card card-register" style="margin-top:180px;background-color:#dbdcdb;">
                            <h3 class="card-title">Resotel</h3>
                            <form class="register-form" action="{{ route('register') }}" method="POST">
                            @csrf

                            <label style="color:#303030;">Nom de l'agence</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom de l'agence" name="name" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('name') }}<br></strong>
                                    </span>
                                @endif

                                <label style="color:#303030;">Numero de SIRET</label>
                                <input type="text" class="form-control {{ $errors->has('siret') ? ' is-invalid' : '' }}" placeholder="Numero de SIRET" name="siret" required>

                                @if ($errors->has('siret'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('siret') }}<br></strong>
                                    </span>
                                @endif


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

                                


                                <button class="btn btn-info btn-block btn-round">Inscription</button>
                            </form>
                            <div class="forgot">
                                <a href="{{ route('login') }}" class="btn btn-link btn-info">Vous-avez déja un compte?</a>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
        </div>

@endsection


