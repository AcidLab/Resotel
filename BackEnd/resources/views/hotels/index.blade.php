@extends('layouts.app')
@section('title')
Hôtels
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des hôtels
@endsection
@section('add-button')
<a  class="btn btn-info d-none d-lg-block m-l-15" href="{{route('hotel.createPage',1)}}"><i class="fa fa-plus-circle"></i> Créer </a>
@endsection
@section('content')
@endsection
@section('js-includes')
@endsection