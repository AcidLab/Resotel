@extends('layouts.app')
@section('title')
Création d'un hôtel
@endsection
@section('css-includes')
<link href="{{asset('assets/node_modules/horizontal-timeline/css/horizontal-timeline.css')}}" rel="stylesheet">
<link href="{{asset('assets/dist/css/pages/timeline-vertical-horizontal.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('row-title')
Création d'un hôtel
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
    
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('hotel.createHotel') }}" method="POST" enctype="multipart/form-data" >
                <div class="form-body">
                    <h3 class="card-title">Informations de l'hôtel</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nom : </label>
                                <input type="text" placeholder="Nom" name="name" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ville : </label>
                                <select class="form-control" name="city_id" required>
                                    @foreach($cities as $row)
                                        <option value="{{$row->id}}">{{$row->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Adresse : </label>
                                <input type="text" placeholder="Adresse" class="form-control" name="address" required/>
                             </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Code postal : </label>
                                <input type="text" placeholder="Code postal" class="form-control" name="postal_code" required/>
                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre d'étoiles local :</label>
                                <input type="number" placeholder="Nomber d'étoiles local" name="local_stars_number" required class="form-control" min="1"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre d'étoiles externe :</label>
                                <input type="number" placeholder="Nomber d'étoiles externe" name="to_stars_number" required class="form-control" min="1"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre de lits :</label>
                                <input type="number" placeholder="Nomber de lits" name="beds_number" required class="form-control" min="1"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(Auth::user()->type == 2)
                        <div class="col-md-12">
                            <label class="control-label">Images : </label>
                            <input type="file"  name="pictures[]" multiple accept="image/*" class="form-control" required />
                            <input type="text" hidden name="agency_id" required value="{{Auth::user()->agency_id}}" class="form-control" />
                        </div>
                        @else 
                        <div class="col-md-6">
                            <label class="control-label">Images : </label>
                            <input type="file"  name="pictures[]" multiple accept="image/*" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label class="label-control">Agence </label>
                            <select name="agency_id" required class = "form-control">
                                @foreach(Agencytoadd::all() as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        
                    </div>


                    

                </div>
                <div class="form-actions">
                    <br/>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Ajouter</button>
                
            </div>
            </form>
            </div>
            
        </div>
    </div>
</diV>
@endsection
@section('js-includes')
<script src="{{asset('assets/node_modules/horizontal-timeline/js/horizontal-timeline.js')}}"></script>
<script src="{{asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
@endsection