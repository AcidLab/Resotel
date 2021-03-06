@extends('layouts.app')
@section('title')
Suppléments
@endsection
@section('css-includes')
@endsection
@section('row-title')
Frais des suppléments
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
                <form action="{{route('hotel.createExtraCharges')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" required name="number_of_supps" value="{{count($final_supps)}}" class="form-control" hidden />
                        <input type="text" required hidden class="form-control" name="seasons_number" value="{{count($hotel->contracts[0]->seasons)}}"/>
                        <input type="text" required hidden class="form-control" value="{{$hotel->id}}" name="hotel_id" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($final_supps as $i=>$supp)
                                    @if($i == 0)
                                    <div class="row" id="first_row_{{$i}}">
                                    @else
                                    <div class="row" id="first_row_{{$i}}" style="display:none;">
                                    @endif
                                        <div class="col-md-12">
                                            <h4 class="text-themecolor">Frais pour le supplément {{$supp->label}}</h4>
                                            <input type="text" name="arrangement_id_{{$i}}" hidden class="form-control" required value="{{$supp->id}}" />
                                        </div>
                                    </div>
                                    @if($i == 0)
                                    <div class="row" id="second_row_{{$i}}">
                                    @else
                                    <div class="row" id="second_row_{{$i}}" style="display:none;">
                                    @endif
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($hotel->contracts[0]->seasons as $j=>$season)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" data-toggle="tooltip" title="De {{date('d-m-Y',strtotime($season->start_date))}} à {{date('d-m-Y',strtotime($season->end_date))}}">Saison {{$j+1}}</label>
                                                            <input type="number" name="price_{{$i}}_{{$j}}" min="0"  class="form-control" placeholder="Prix du supplément {{$supp->label}} pour la saison {{$j+1}}" required />
                                                            <input type="text" name="season_id_{{$i}}_{{$j}}" hidden class="form-control" value="{{$season->id}}" />

                                                            
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                @endforeach
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-actions">
                    @if(count($final_supps) > 1)
                <button type="button" id="next_button" class="btn btn-success"> <i class="fa fa-check"></i> Suivant </button>
                @endif
                @if(count($final_supps)>1)
                <button type="submit" id="send_button" class="btn btn-info" style="display:none;"> <i class="fa fa-check"></i> Ajouter</button>
                @else
                <button type="submit" id="send_button" class="btn btn-info" > <i class="fa fa-check"></i> Ajouter</button>
                @endif
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
var nb_types = "{{count($final_supps)}}";
$('#next_button').on('click',function(){
        $('#first_row_'+index).show();
        $('#second_row_'+index).show();
        index++;
        //alert(index);
        if(nb_types == index){
            $(this).hide();
            //$('#extras_div').show();
            $('#send_button').show();
        }        
    });    
</script>
@endsection