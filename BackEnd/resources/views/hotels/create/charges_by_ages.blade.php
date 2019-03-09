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
                    <input type="text" name="number_of_seasons" hidden required value="{{count($hotel->contracts[0]->seasons)}}"/>
                        <div class="row">
                            <div class="col-md-12">
                                
                                @for($i=0;$i<5;$i++)
                                @if($i == 0)
                                <div class="row" id="row_{{$i}}" >
                                @else
                                <div class="row" id="row_{{$i}}" style="display:none;" >
                                @endif
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Personne : </label>
                                                    @if($i == 0 )
                                                    <input type="text" class="form-control" value="Bébé" readonly required />
                                                    <input type="text" name="type_{{$i}}" hidden value="0" required />
                                                    @elseif($i == 1)
                                                    <input type="text" class="form-control" value="1er Enfant" readonly required />
                                                    <input type="text" name="type_{{$i}}" hidden value="1" required />
                                                    @elseif($i == 2)
                                                    <input type="text" class="form-control" value="2ème Enfant" readonly required />
                                                    <input type="text" name="type_{{$i}}" hidden value="2" required />
                                                    @elseif($i == 3)
                                                    <input type="text" class="form-control" value="1,2 Enfant" readonly required />
                                                    <input type="text" name="type_{{$i}}" hidden value="3" required />
                                                    @elseif($i == 4)
                                                    <input type="text" class="form-control" value="Adulte supplémentaire" readonly required />
                                                    <input type="text" name="type_{{$i}}" hidden value="4" required />
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">De : </label>
                                                    <input type="number" placeholder="Age minimum" class="form-control" min="0" required name="from_{{$i}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">A : </label>
                                                    <input type="number" placeholder="Age maximum" class="form-control" min="0" required name="to_{{$i}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Types des chambres : </label>
                                                    <select class="form-control" multiple name="room_types_{{$i}}[]" required>
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
                                                        <input type="number" name="percentage_{{$i}}_{{$j}}" min="0" max="100"  class="form-control" placeholder="Pourcentage  pour la saison {{$j+1}}" required />
                                                        <input type="text" name="season_id_{{$i}}_{{$j}}" hidden class="form-control" value="{{$season->id}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                @endfor

                                

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
var nb_types = 5;
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