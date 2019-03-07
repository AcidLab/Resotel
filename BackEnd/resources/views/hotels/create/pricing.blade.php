@extends('layouts.app')
@section('title')
Pricing
@endsection
@section('css-includes')
@endsection
@section('row-title')
Pricing
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
                <form action="{{route('hotel.createPricing')}}" method="POST">
                        {{csrf_field()}}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-themecolor">Prix de l'arrangement {{$arrangement->label}} : </h4>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <input type="text" class="form-control" name="arrangement_id" hidden readonly value="{{$arrangement->id}}">
                                        <input type="text" hidden class="form-control" name="room_types_number" value="{{count($rooms)}}"/>
                                        <input type="text" hidden class="form-control" name="seasons_number" value="{{count($seasons)}}"/>
                                        </div>
                                    </div>
                                </div>
                                @foreach($rooms as $k=>$room)
                                    @if($k != 0)
                                    <div class="row" id="first_row_{{$k}}" style="display : none;">
                                    @else
                                    <div class="row" id="first_row_{{$k}}" >
                                    @endif
                                        <div class="col-md-12">
                                        <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-themecolor">Les chambres de type {{$room->type->label}} </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <input type="text" hidden name="room_type_{{$k}}" value="{{$room->type_id}}" class="form-control" />
                                            @foreach($seasons as $key=>$row)
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" data-toggle="tooltip" title="De {{date('d-m-Y',strtotime($row->start_date))}} à {{date('d-m-Y',strtotime($row->end_date))}}">Saison {{$key+1}}</label>
                                                        <input type="number" min="0" placeholder="Prix d'arrangement pour la saison {{$key+1}}" required class="form-control" name="arrangement_price_{{$k}}_{{$key}}"/>
                                                    </div>
                                                </div>
                                                <input type="text" name="sason_id_{{$k}}_{{$key}}" hidden class="form-control" value="{{$row->id}}" />
                                            @endforeach
                                            
                                            
                                    </div>
                                    <hr/>
                                        </div>
                                    </div>
                                    
                                @endforeach

                            </div>
                                    

                        </div>
                        @if(count($rooms)>1)
                        <div id="extras_div" class="row" style="display:none;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Suppléments à tarifier : </label>
                                    <select class="form-control" required name="extra_charges[]" multiple>
                                        @foreach($arrangements as $row)
                                            <option value="{{$row->id}}">{{$row->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div> 
                        @else
                        <div id="extras_div" class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Suppléments à tarifier : </label>
                                    <select class="form-control" required name="extra_charges[]" multiple>
                                        @foreach($arrangements as $row)
                                            <option value="{{$row->id}}">{{$row->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div> 
                        @endif
                    </div>

                    <div class="form-actions">
                        
                    @if(count($rooms) > 1)
                <button type="button" id="next_button" class="btn btn-success"> <i class="fa fa-check"></i> Suivant </button>
                @endif
                @if(count($rooms)>1)
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
var nb_types = "{{count($rooms)}}";
$('#next_button').on('click',function(){
        $('#first_row_'+index).show();
        $('#second_row_'+index).show();
        index++;
        //alert(index);
        if(nb_types == index){
            $(this).hide();
            $('#extras_div').show();
            $('#send_button').show();
        }        
    });    
</script>
@endsection