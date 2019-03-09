@extends('layouts.app')
@section('title')
Personnes supplémentaires
@endsection
@section('css-includes')
@endsection
@section('row-title')
Frais des personnes supplémentaires
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
                <form action="{{route('hotel.createChargesByAges')}}" method="POST">
                        {{csrf_field()}}
                        
                    <div class="form-body">
                    <input type="text" name="hotel_id" hidden required value="{{$hotel->id}}"/>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row" id="row_0">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Personne : </label>
                                                    <input type="text" class="form-control" value="Bébé" readonly required />
                                                    <input type="text" hidden value="0" required />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">De : </label>
                                                    <input type="number" placeholder="Age minimum" class="form-control" min="0" required name="from_0" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">A : </label>
                                                    <input type="number" placeholder="Age maximum" class="form-control" min="0" required name="to_0" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Types des chambres : </label>
                                                    <select class="form-control" multiple name="room_types_0[]" required>
                                                        @foreach($final_room_types as $row)
                                                            <option value="{{$row->id}}"> {{$row->label}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach($hotel->contracts[0]->seasons as $j=>$season)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" data-toggle="tooltip" title="De {{date('d-m-Y',strtotime($season->start_date))}} à {{date('d-m-Y',strtotime($season->end_date))}}">Saison {{$j+1}}</label>
                                                        <input type="number" name="percentage_0_{{$j}}" min="0" max="100"  class="form-control" placeholder="Pourcentage bébé pour la saison {{$j+1}}" required />
                                                        <input type="text" name="season_id_0_{{$j}}" hidden class="form-control" value="{{$season->id}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>

                    <div class="form-actions">
                   
                         <button type="button" id="next_button" class="btn btn-success"> <i class="fa fa-check"></i> Suivant </button>
                
                        <button type="submit" id="send_button" class="btn btn-info" style="display:none;"> <i class="fa fa-check"></i> Ajouter</button>
               
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-includes')
<script>
var index = 1 ;
var nb_types = 4;
$('#next_button').on('click',function(){
        $('#row_'+index).show();
        //$('#second_row_'+index).show();
        index++;
        
        if(nb_types == index){
            $(this).hide();
            $('#send_button').show();
        }        
    });    
</script>
@endsection