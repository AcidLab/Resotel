@extends('layouts.app')
@section('title')
Messages
@endsection
@section('css-includes')
@endsection
@section('row-title')
Messages
@endsection
@section('content')
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Nom de l'agence</th>
                                                <th>Téléphone</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contacts as $row)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->name}}</td>
                                                    <td>{{$row->email}}</td>
                                                    <td>{{$row->agency_name}}</td>
                                                    <td>{{$row->phone}}</td>
                                                    <td>{{$row->message}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
@endsection
@section('js-includes')
@endsection