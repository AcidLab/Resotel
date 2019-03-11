@extends('layouts.app')
@section('title')
Mise à jour d'un arrangement
@endsection
@section('css-includes')
@endsection
@section('row-title')
Mise à jour d'un arrangement
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('arrangement.set',$arrangement->id)}}" method="POST"  >
                <div class="form-body">
                    <h3 class="card-title">Informations de l'arrangement</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Label : </label>
                                <input type="text" placeholder="Label" class="form-control" required value="{{$arrangement->label}}" name="label">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nom: </label>
                                <input type="text" placeholder="Nom" class="form-control" required value="{{$arrangement->name}}" name="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Type : </label>
                                <select required class="form-control" name="type">
                                    <option value="1" {{$arrangement->type == 1 ? 'selected' : ''}} >Principal</option>
                                    <option value="0" {{$arrangement->type == 0 ? 'selected' : ''}} >Supplément</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Mettre à jour</button>
                
            </div>
            </form>
            </div>
            
        </div>
    </div>
</diV>
@endsection
@section('js-includes')
@endsection