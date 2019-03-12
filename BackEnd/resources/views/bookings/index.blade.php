@extends('layouts.app')
@section('title')
Commandes
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des commandes
@endsection
@section('add-button')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Commandes validées</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-time"></i></span> <span class="hidden-xs-down">Commandes en attentes</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab"><span class="hidden-sm-up"><i class=" ti-close"></i></span> <span class="hidden-xs-down">Commandes annulées</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-20">
                                       
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="profile2" role="tabpanel"></div>
                                <div class="tab-pane p-20" id="messages2" role="tabpanel"></div>
                            </div>
                        </div>
    </div>
</div>
@endsection
@section('js-includes')
@endsection