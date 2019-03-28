@extends('layouts.app')
@section('title')
Demandes d'adhésion
@endsection
@section('css-includes')
@endsection
@section('row-title')
Demandes d'adhésion
@endsection
@section('add-button')
@endsection
@section('content')
@if(count($demands) > 0)
<div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro de la demande</th>
                                                <th style="text-align: center;">Nom d'agence</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Adresse</th>
                                                <th style="text-align: center;">N° SIRET</th>
                                                <th style="text-align: center;">Date de la demande</th>
                                                <th style="text-align: center;">Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           	@foreach($demands as $row)
                                           		<td style="text-align: center;">{{$row->id}}</td>
                                           		<td style="text-align: center;">{{$row->name}}</td>
                                           		<td style="text-align: center;">{{$row->email}}</td>
                                              <td style="text-align: center;">{{$row->address}}</td>
                                              <td style="text-align: center;">{{$row->siret}}</td>
                                              
                                           		<td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                           		<td style="text-align: center;">
                                           				
                                           			<a class="btn btn-circle btn-success" data-toggle="modal" data-target="#validate_agency{{$row->id}}" ><i class="icon-check" style="color:white;"></i></a>
                                           		</td>
                                           	@endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                @else 
                                Aucune demande d'adhésion 
                                @endif
@endsection
<!--modals-->
@foreach($demands as $row)
<div class="modal fade" id="validate_agency{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <form action ="{{route('demand.accept',$row->id)}}" method="POST">
                      {{csrf_field()}}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Validation d'une demande d'adhésion</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="control-label">Nom de l'agence : </label>
                                                      <input type="text" class="form-control" readonly value="{{$row->name}}">
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="control-label">Email: </label>
                                                      <input type="email" class="form-control" readonly value="{{$row->email}}">
                                                  </div>
                                                </div>
                                               </div>
                                               <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label class="control-label">Adresse : </label>
                                                          <input type="text" class="form-control" readonly value="{{$row->address}}"/>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label class="control-label">N° Siret :  </label>
                                                          <input type="text" class="form-control" readonly value="{{$row->siret}}"/>
                                                      </div>
                                                  </div>
                                               </div>
                                               <div class="row">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <input type="checkbox" class="check" id="minimal-checkbox-2" checked disabled>
                                                      <label for="minimal-checkbox-2">Payement en ligne </label>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <input type="checkbox" class="check" id="minimal-checkbox-2" value="1" name="transfer_option">
                                                      <label for="minimal-checkbox-2">Payement avec virement </label>
                                                    </div>
                                                  </div>
                                               </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="submit"  class="btn btn-success">Accepter</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
@endforeach
<!--Modals-->
@section('js-includes')
@endsection