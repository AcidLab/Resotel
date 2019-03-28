@extends('layouts.app')
@section('title')
Création d'un utilisateur
@endsection
@section('css-includes')
@endsection
@section('row-title')
Création d'un utilisateur
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data" >
                <div class="form-body">
                    <h3 class="card-title">Informations de l'utilisateur</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                    	<div class="col-md-4">
                    		<div class="form-group">
                                                <h4 class="card-title">Nom :</h4>
                                                <input required type="text" value="{{old('name')}}" name="name"  class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom">
                                                @if($errors->has('name'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('name') }}</strong>
                                                 </span>
                                                @endif
                             </div>
                    	</div>
                    	<div class="col-md-4">
                    		<div class="form-group">
                                                <h4 class="card-title">Email :</h4>
                                                <input required type="email" value="{{old('email')}}" name="email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                                                @if($errors->has('email'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('email') }}</strong>
                                                 </span>
                                                @endif
                             </div>
                    	</div>
                    	<div class="col-md-4">
                    		<div class="form-group">
                    			<h4 class="card-title">Type :</h4>
                    			<select required name="type" class="form-control">
                    				<option value="1" {{old("type") == 1 ?  'selected' : ''}}>Admin</option>
                    				<option value="2" {{old("type") == 2 ?  'selected' : ''}}>Agence</option>
                    			</select>
                    			@if($errors->has('type'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('type') }}</strong>
                                                 </span>
                                                @endif
                    		</div>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                                    		<div class="form-group">
                                    			<label>Mot de passe : </label>
                                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" name="password" required>
                                                    
                                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <p style="color: red;font-size: 12px;">{{ $errors->first('password') }}</p>
                                    </span>
                                @endif

                                    		</div>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<div class="form-group">
                                    			<label>Confirmer le mot de passe :</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>

                                    		</div>
                                    	</div>
                    </div>

                </div>
                <div class="form-actions">
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Ajouter</button>
                
            </div>
            </form>
            </div>
            
        </div>
    </div>
</diV>
@endsection
@section('js-includes')
@endsection