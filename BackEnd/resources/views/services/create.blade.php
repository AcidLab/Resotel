@extends('layouts.app')
@section('title')
Création d'un service
@endsection
@section('css-includes')
@endsection
@section('row-title')
Création d'un service
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('services.store')}}" method="POST"  >
                <div class="form-body">
                    <h3 class="card-title">Informations du service</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nom : </label>
                                <input type="text" placeholder="Label" class="form-control" required value="{{old('label')}}" name="label">
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