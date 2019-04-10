@extends('layouts.app')
@section('content')
<div class="page-header page-header-xs" style="height: 1000px !important; background-image: url('https://images.unsplash.com/photo-1498063401574-13cbee350467?dpr=2&amp;auto=format&amp;fit=crop&amp;w=1500&amp;h=1000&amp;q=80&amp;cs=tinysrgb&amp;crop=');">
            <div class="filter"></div>
            <div class="container" style="margin-top: 70px;">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <h2 class="text-center" style="margin-bottom: 40px;">Resotel</h2>
                     <p>
                     	
                     </p>
                     <form class="contact-form" method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="row">
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label style="color:white;">Nom de l'agence</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom de l'agence" name="name" value="{{old('name')}}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('name') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label style="color:white;">Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{old('email')}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('email') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label style="color:white;">Numero de SIRET</label>
                                <input type="text" class="form-control {{ $errors->has('siret') ? ' is-invalid' : '' }}" placeholder="Numero de SIRET" value="{{old('siret')}}" name="siret" required>

                                @if ($errors->has('siret'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('siret') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">TVA</label>
                                        <input type="text" name="tva" class="form-control {{ $errors->has('tva') ? ' is-invalid' : '' }}" value="{{old('tva')}}" placeholder="TVA" required  >
                                        @if ($errors->has('tva'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('tva') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">Téléphone</label>
                                        <input type="number" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{old('phone')}}" min="0" placeholder="Téléphone" required  >
                                        @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('phone') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label style="color:white;">Adresse</label>
                                <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Adresse" value="{{old('address')}}" name="address" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('address') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">Nom Responsable</label>
                                        <input type="text" name="responsable_name" class="form-control {{ $errors->has('responsable_name') ? ' is-invalid' : '' }}" value="{{old('responsable_name')}}"  placeholder="Nom du responsable" required  >
                                        @if ($errors->has('responsable_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('responsable_name') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">Email Responsable</label>
                                        <input type="email" name="responsable_mail" class="form-control {{ $errors->has('responsable_mail') ? ' is-invalid' : '' }}" value="{{old('responsable_mail')}}" placeholder="Email du responsable" required  >
                                        @if ($errors->has('responsable_mail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('responsable_mail') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">Téléphone Responsable</label>
                                        <input type="number" name="responsable_tel" class="form-control {{ $errors->has('responsable_tel') ? ' is-invalid' : '' }}" value="{{old('responsable_tel')}}" min="0"  placeholder="Téléphone du responsable" required  >
                                        @if ($errors->has('responsable_tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('responsable_tel') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">Nom du gérant</label>
                                        <input type="text" name="manager_name" class="form-control {{ $errors->has('manager_name') ? ' is-invalid' : '' }}" value="{{old('manager_name')}}"   placeholder="Nom du gérant" required  >
                                        @if ($errors->has('manager_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('manager_name') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">Email du gérant</label>
                                        <input type="email" name="manager_mail" class="form-control {{ $errors->has('manager_mail') ? ' is-invalid' : '' }}" value="{{old('manager_mail')}}"   placeholder="Email du gérant" required  >
                                        @if ($errors->has('manager_mail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('manager_mail') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			 <label class="control-label" style="color : white;">Téléphone Gérant</label>
                                        <input type="number" name="manager_tel" class="form-control {{ $errors->has('manager_tel') ? ' is-invalid' : '' }}" value="{{old('manager_tel')}}" min="0"  placeholder="Téléphone du gérant" required  >
                                        @if ($errors->has('manager_tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('manager_tel') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label class="control-label" style="color : white;">Imo</label>
                                        <input type="text" name="imo" class="form-control {{ $errors->has('imo') ? ' is-invalid' : '' }}" value="{{old('imo')}}"   placeholder="Imo" required  >
                                        @if ($errors->has('imo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('imo') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label class="control-label" style="color:white;">Garantie</label>
                        			<select name="guarantee" required class="form-control {{ $errors->has('imo') ? ' is-invalid' : '' }}">
                        				<option value="0" {{old('guarantee') == 0 ? 'selected' : ''}}>APST</option>
                        				<option value="1" {{old('guarantee') == 1 ? 'selected' : ''}}>Banque</option>
                        				<option value="2" {{old('guarantee') == 2 ? 'selected' : ''}}>Assurance</option>
                        				<option value="3" {{old('guarantee') == 3 ? 'selected' : ''}}>Autre</option>
                        			</select>
                        			@if ($errors->has('guarantee'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('guarantee') }}<br></strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label style="color:white;">Mot de passe</label>
                                <input type="password" class="form-control no-border {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
                        			<label class="control-label" style="color: white;">Confirmer le mot de passe :</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                        		</div>
                        	</div>
                        </div>
                        
                        <div class="row">
                           <div class="col-md-4 offset-md-4">
                              <button type="submit" class="btn btn-info btn-lg btn-fill">Inscription</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div id="contactUsMap" class="big-map"></div>
@endsection
@section('js')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $().ready(function(){
        demo.initContactUsMap()
    });
</script>
@endsection