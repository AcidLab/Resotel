@extends('layouts.app')
@section('title')
Edition d'un utilisateur
@endsection
@section('css-includes')
@endsection
@section('row-title')
Edition d'un utilisateur
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('users.update',$user->id)}}" method="PUT" enctype="multipart/form-data" >
                <div class="form-body">
                    <h3 class="card-title">Informations de l'utilisateur</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                    	<div class="col-md-4" id="name_div">
                    		<div class="form-group">
                                                <h4 class="card-title">Nom :</h4>
                                                <input required type="text" value="{{$user->name}}" name="name"  class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom">
                                                @if($errors->has('name'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('name') }}</strong>
                                                 </span>
                                                @endif
                             </div>
                    	</div>
                    	<div class="col-md-4" id="email_div">
                    		<div class="form-group">
                                                <h4 class="card-title">Email :</h4>
                                                <input required type="email" value="{{$user->email}}" name="email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                                                @if($errors->has('email'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('email') }}</strong>
                                                 </span>
                                                @endif
                             </div>
                    	</div>
                    	<div class="col-md-4" id="type_div">
                    		<div class="form-group">
                    			<h4 class="card-title">Type :</h4>
                    			<select required name="type" id="type_select" class="form-control">
                    				<option value="1" {{$user->type == 1 ?  'selected' : ''}}>Admin</option>
                    				<option value="2" {{$user->type == 2 ?  'selected' : ''}}>Agence</option>
                                    <option value="3" {{$user->type == 3 ?  'selected' : ''}}>Tout</option>
                    			</select>
                    			@if($errors->has('type'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('type') }}</strong>
                                                 </span>
                                                @endif
                    		</div>
                    	</div>
                        <div class="col-md-3" id="agency_div" style="display: none;">
                            <div class="form-group">
                                <h4 class="card-title">Agence</h4>
                                <select name="agency_id" class="form-control" id="agency_select">
                                    @foreach(Agencytoadd::all() as $row)
                                        <option value="{{$row->id}}" {{$row->id == $user->agency_id ? 'selected' : ''}}>{{$row->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('agency_id'))
                                                 <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('agency_id') }}</strong>
                                                 </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="form-actions">
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Modifier</button>
                
            </div>
            </form>
            </div>
            
        </div>
    </div>
</diV>
@endsection
@section('js-includes')
<script>

    $('#type_select').change(function(){
        if($(this).val() == 2){
            $('#name_div').removeClass('col-md-4');
            $('#name_div').addClass('col-md-3');
            $('#email_div').removeClass('col-md-4');
            $('#email_div').addClass('col-md-3');
            $('#type_div').removeClass('col-md-4');
            $('#type_div').addClass('col-md-3');
            $('#agency_select').prop('required',true);
            $('#agency_div').show();
        }
        else {

            $('#name_div').removeClass('col-md-3');
            $('#name_div').addClass('col-md-4');
            $('#email_div').removeClass('col-md-3');
            $('#email_div').addClass('col-md-4');
            $('#type_div').removeClass('col-md-3');
            $('#type_div').addClass('col-md-4');
            $('#agency_select').prop('required',false);
            $('#agency_div').hide();
        }
    });

    $(document).ready(function(){
        if($('#type_select').val() == 2){

            $('#name_div').removeClass('col-md-4');
            $('#name_div').addClass('col-md-3');
            $('#email_div').removeClass('col-md-4');
            $('#email_div').addClass('col-md-3');
            $('#type_div').removeClass('col-md-4');
            $('#type_div').addClass('col-md-3');
            $('#agency_select').prop('required',true);
            $('#agency_div').show();
        }
        else {

            $('#name_div').removeClass('col-md-3');
            $('#name_div').addClass('col-md-4');
            $('#email_div').removeClass('col-md-3');
            $('#email_div').addClass('col-md-4');
            $('#type_div').removeClass('col-md-3');
            $('#type_div').addClass('col-md-4');
            $('#agency_select').prop('required',false);
            $('#agency_div').hide();
        }
    });
</script>
@endsection