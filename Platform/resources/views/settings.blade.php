@extends('layouts.app')
@section('content')
        <div class="page-header page-header-xs settings-background" style="background-image: url('assets/img/sections/joshua-earles.jpg');">
            <div class="filter"></div>
        </div>
        <div class="profile-content section">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form class="settings-form" method="POST" action="{{route('profil.update',Auth::user()->id)}}">
                            <div class="row">
                            
                            @csrf
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Nom de l'agence</label>
                                        <input type="text" class="form-control border-input" placeholder="Nom de l'agence" value="{{Auth::user()->name}}" name="name">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Numero de SIRET</label>
                                        <input type="text" class="form-control border-input" placeholder="Numero de SIRET" value="{{Auth::user()->siret}}" name="siret">
                                    </div>
                                </div>
                            </div>
                          <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" class="form-control border-input" placeholder="Adresse" value="{{Auth::user()->address}}" name="address">
                          </div>

                          <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control border-input" placeholder="Job Title" value="{{Auth::user()->email}}" disabled>
                          </div>
                          

                        
                          <div class="text-center">
                            <input type="submit" class="btn btn-wd btn-info btn-round" value="Enregistrer">
                          </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection