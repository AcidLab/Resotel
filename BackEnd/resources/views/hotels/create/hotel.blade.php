@extends('layouts.app')
@section('title')
Création d'un hôtel
@endsection
@section('css-includes')
@endsection
@section('row-title')
Création d'un hôtel
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{ action('Backend\HotelController@store') }}" method="POST">
                <div class="form-body">
                    <h3 class="card-title">Informations de l'hôtel</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nom : </label>
                                <input type="text" placeholder="Nom" name="name" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ville : </label>
                                <select class="form-control" name="city_id" required>
                                    @foreach($cities as $row)
                                        <option value="{{$row->id}}">{{$row->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Adresse : </label>
                                <input type="text" placeholder="Adresse" class="form-control" name="address" required/>
                             </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Code postal : </label>
                                <input type="text" placeholder="Code postal" class="form-control" name="postal_code" required/>
                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre d'étoiles local :</label>
                                <input type="number" name="local_stars_number" required class="form-control" min="1"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre d'étoiles externe :</label>
                                <input type="number" name="to_stars_number" required class="form-control" min="1"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre de lits :</label>
                                <input type="number" name="beds_number" required class="form-control" min="1"/>
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