@extends('layouts.app')
@section('title')
Création des chambres
@endsection
@section('css-includes')
@endsection
@section('row-title')
Création des chambres
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            
            <form action="#" method="POST">
            {{csrf_field()}}
                <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Arrangement : </label>
                                <select class="form-control" name="arrangement_id" required>
                                    @foreach($arrangements as $row)
                                        <option value="{{$row->id}}">{{$row->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                </div>
                @foreach($types as $key=>$row)
                    @if($key != 0)
                   <div class="row" id="first_row_{{$key}}" style="display : none;">
                   @else
                   <div class="row" id="first_row_{{$key}}" >
                   @endif
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Type : </label>
                                <input type="text" readonly value="{{$row->label}}" class="form-control"/>
                                <input type="text" required hidden name="{{$row->label}}" value="{{$row->id}}"/>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Allotement : </label>
                                <input type="number" required placeholder="Allotement" class="form-control" min="1" name="allotement_{{$row->label}}"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Code chambre : </label>
                                <input type="text" required placeholder="Code chambre" name="room_code_{{$row->label}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Plein tarif : </label>
                                <input type="number" required placeholder="Plein tarif" class="form-control" min="1" max="2" name="full_price_{{$row->label}}"/>

                            </div>
                        </div>
                   </div>
                    @if($key != 0)
                   <div class="row" id="second_row_{{$key}}" style="display:none;"> 
                   @else
                   <div class="row" id="second_row_{{$key}}" > 
                   @endif
                        <div class="col-md-3">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Min personnes </label>
                                        <input type="number" required placeholder="Min personnes" class="form-control" min="0" name="min_person_{{$row->label}}"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Max personnes </label>
                                        <input type="number" required placeholder="Max personnes" class="form-control" min="0" name="max_person_{{$row->label}}"/>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Min adultes </label>
                                        <input type="number" required placeholder="Min adultes" class="form-control" min="0" name="min_major_{{$row->label}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Max adultes </label>
                                        <input type="number" required placeholder="Max adultes" class="form-control" min="0" name="max_major_{{$row->label}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Min enfants </label>
                                        <input type="number" required placeholder="Min enfants" class="form-control" min="0" name="min_children_{{$row->label}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Max enfants </label>
                                        <input type="number" required placeholder="Max enfants" class="form-control" min="0" name="max_children_{{$row->label}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Max bébés </label>
                                        <input type="number" required placeholder="Max bébés" class="form-control" min="0" name="max_baby_{{$row->label}}"/>
                                    </div>
                        </div>
                   </div>
                   
                @endforeach
                </div>
                <div class="form-actions">
                <button type="button" id="next_button" class="btn btn-success"> <i class="fa fa-check"></i> Suivant </button>
                <button type="submit" id="send_button" class="btn btn-info" style="display:none;"> <i class="fa fa-check"></i> Ajouter</button>
                
            </div>
            </form>
            </div>
            
        </div>
    </div>
</diV>
@endsection
@section('js-includes')
<script>
var index = 1 ;
var nb_types = "{{count($types)}}";
$('#next_button').on('click',function(){
        $('#first_row_'+index).show();
        $('#second_row_'+index).show();
        index++;
        //alert(index);
        if(nb_types == index){
            $(this).hide();
            $('#send_button').show();
        }        
    });

    
    
</script>
@endsection