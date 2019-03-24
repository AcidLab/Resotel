@extends('layouts.app')
@section('title')
Création d'un contrat
@endsection
@section('css-includes')
@endsection
@section('row-title')
Création d'un contrat
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('hotel.createContract')}}" method="POST">
                <div class="form-body">
                    <h3 class="card-title">Informations du contrat</h3>
                    <hr>
                    
                    {{csrf_field()}}
                    <div class="row" hidden>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">De : </label>
                                <input type="date"  name="date_from" class="form-control"/>
                                <input type="text" name="hotel_id" hidden required value="{{$hotel->id}}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Jusqu'à :  </label>
                                <input type="date"  name="date_to" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Devise : </label>
                                <input type="text" required placeholder="Devise" name="devise" class="form-control"/>
                            </div> 
                        </div>

                        <div class="col-md-4" hidden>
                            <div class="form-group">
                                <label class="control-label">Destination : </label>
                                <input type="text"  placeholder="destination" name="destination" class="form-control"/>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre de saisons : </label>
                                <input type="number" min="1" required placeholder="Nombre de saisons : " name="seasons_number" class="form-control"/>
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
<script>

</script>
@endsection