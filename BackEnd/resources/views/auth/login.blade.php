@extends('layouts.auth')
@section('content')
@php
$primaryColor = '#005bab';
$tintColor = '#e4322d';
$icon = 'http://condairplus.com.tn/wp-content/uploads/2017/02/LogoCodairPlush112.png';
@endphp
 <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="{{route('login')}}" method="POST">
                        {{csrf_field()}}

                        <h3 class="box-title m-b-20">Connexion</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Mot de passe">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>Se rappeler de moi</label>
                                    <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Mot de passe oublié ?</a> 
                                </div> 
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit" style="border-width: 0px;">Login</button>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        
                    </form>
                    <form class="form-horizontal" id="recoverform" action="">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Restorer votre mot de passe</h3>
                                <p class="text-muted">Entrez votre email et les instructions vous seront envoyées! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit" style="background-color: <?php echo $primaryColor; ?>;border-width: 0px;">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
