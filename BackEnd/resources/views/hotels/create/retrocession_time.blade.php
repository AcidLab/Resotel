@extends('layouts.app')
@section('title')
Délais de rétrocession
@endsection
@section('css-includes')
@endsection
@section('row-title')
Délais de rétrocession
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
                <form action="{{route('hotel.createRetrocessionTimes')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" required value="{{$hotel->id}}" hidden name="hotel_id" />
                        <input type="text" required hidden value="{{count($hotel->contracts[0]->seasons)}}" name="number_of_seasons" />

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($hotel->contracts[0]->seasons as $i=>$season)
                                    @if($i==0)
                                    <div class="row" id="first_row_{{$i}}">
                                    @else
                                    <div class="row" id="first_row_{{$i}}" style="display:none;">
                                    @endif
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" data-toggle="tooltip" title="De {{date('d-m-Y',strtotime($season->start_date))}} à {{date('d-m-Y',strtotime($season->end_date))}}">Délais de rétrocession pour la saison {{$i+1}}</label>
                                                <input type="number" class="form-control" name="retrocession_time_{{$i}}" placeholder="Délais de rétrocession" required />
                                                <input type="text" name="season_id_{{$i}}" value="{{$season->id}}" required hidden />
                                            </div>    
                                        </div>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-actions">
                    @if(count($hotel->contracts[0]->seasons) > 1)
                <button type="button" id="next_button" class="btn btn-success"> <i class="fa fa-check"></i> Suivant </button>
                @endif
                @if(count($hotel->contracts[0]->seasons)>1)
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
var nb_types = "{{count($hotel->contracts[0]->seasons)}}";
$('#next_button').on('click',function(){
        $('#first_row_'+index).show();
        //$('#second_row_'+index).show();
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