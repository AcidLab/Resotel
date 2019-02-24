@extends('layouts.app')
@section('title')
Modification d'un partenaire
@endsection
@section('css-includes')
<link rel="stylesheet" href="{{asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('row-title')
Modification d'un partenaire
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('partner.set',$partner->id)}}" method="POST" enctype="multipart/form-data" >
                <div class="form-body">
                    <h3 class="card-title">Informations du partenaire</h3>
                    <hr>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nom : </label>
                                <input type="text" placeholder="Nom" class="form-control" required value="{{old('name') ? old('name') : $partner->name}}" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Description : </label>
                                <textarea placeholder="Description" class="form-control"  rows="8"   name="description">{{old('description') ? old('description') : $partner->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="input-file-now">Image : </label>
                                <input type="file" id="input-file-now" name="picture_path" accept="image/*" class="dropify"/>
                            </div>
                        </div>
                    </div>


                    

                </div>
                <div class="form-actions">
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Mettre à jour</button>
                
            </div>
            </form>
            </div>
            
        </div>
    </div>
</diV>
@endsection
@section('js-includes')
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