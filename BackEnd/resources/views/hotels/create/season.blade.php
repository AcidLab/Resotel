@extends('layouts.app')
@section('title')
Création des saisons
@endsection
@section('css-includes')
@endsection
@section('row-title')
Création des saisons
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            
            <form action="{{route('hotel.createSeason')}}" method="POST">
                <div class="form-body">
                    <h3 class="card-title">Saisons</h3>
                    <hr>
                    {{csrf_field()}}
                    @for($i=0;$i<$seasons_number;$i++)
                    <h4 class="card-title">Saison {{$i+1}}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date de début : </label>
                                <input type="date" class="form-control" required name="start_date_{{$i}}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date de fin : </label>
                                <input type="date" class="form-control" required name="end_date_{{$i}}" />
                            </div>
                        </div>
                    </div>
                    <hr/>
                    @endfor
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Types de chambres : </label>
                                <select class="form-control" required name="room_types[]" multiple>
                                    @foreach($types as $row)
                                        <option value="{{$row->id}}">{{$row->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="text" hidden required name="contract_id" value="{{$contract->id}}" />
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