@extends('layouts.app')
@section('title')
Affectation des services 
@endsection
@section('css-includes')
@endsection
@section('row-title')
Affectation des services
@endsection
@section('add-button')
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
    
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('hotel.storeAffectedServices') }}" method="POST">
                <div class="form-body">
                    <h3 class="card-title">Services à affecter</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                    <input type="text" class="form-control" required value="{{$hotel->id}}" name="hotel_id" hidden />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Services: </label>
                                <select name="services[]" multiple required class="form-control">
                                    @foreach($services as $row)
                                        <option value="{{$row->id}}">{{$row->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="form-actions">
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Affecter</button>
                
            </div>
            </form>
            </div>
            
        </div>
    </div>
</diV>
@endsection
@section('js-includes')
@endsection