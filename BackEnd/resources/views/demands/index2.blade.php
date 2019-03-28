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
<div class="row">
    <div class="col-md-12">
    <div class="card">
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Agences validées</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-time"></i></span> <span class="hidden-xs-down">Agences en attente</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#banned" role="tab"><span class="hidden-sm-up"><i class="fa fa-ban"></i></span> <span class="hidden-xs-down">Agences bannées</span></a> </li>
                               
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-20">
                                       @if(count($acceptedDemands)>0)
                                       <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro de la demande</th>
                                                <th style="text-align: center;">Nom d'agence</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Adresse</th>
                                                <th style="text-align: center;">N° SIRET</th>
                                                
                                                <th style="text-align: center;">Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           	@foreach($acceptedDemands as $row)
                                           		<tr>
                                           		<td style="text-align: center;">{{$row->id}}</td>
                                           		<td style="text-align: center;">{{$row->name}}</td>
                                           		<td style="text-align: center;">{{$row->email}}</td>
                                              <td style="text-align: center;">{{$row->address}}</td>
                                              <td style="text-align: center;">{{$row->siret}}</td>
                                              
                                           		
                                           		<td style="text-align: center;">
                                           			<a class="btn btn-circle btn-info" data-toggle="modal" data-target="#edit_agency{{$row->id}}" ><i class="fa fa-edit" style="color:white;"></i></a>
                                           			<a class="btn btn-circle btn-danger" data-toggle="modal" data-target="#bann_agency{{$row->id}}" ><i class="fa fa-ban" style="color:white;"></i></a>
                                           		</td>
                                           	</tr>
                                           	@endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                       @else
                                       	<center>Aucune agence acceptée</center> 
                                       @endif
                                    </div>
                                </div>
                                <div class="tab-pane " id="profile2" role="tabpanel">
                                    <div class="p-20">
                                       @if(count($noAcceptedDemands)>0)
                                       <div class="table-responsive">
                                    <table class="table color-table warning-table">
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
                                           	@foreach($noAcceptedDemands as $row)
                                           	
                                           		<tr>
                                           		<td style="text-align: center;">{{$row->id}}</td>
                                           		<td style="text-align: center;">{{$row->name}}</td>
                                           		<td style="text-align: center;">{{$row->email}}</td>
                                              <td style="text-align: center;">{{$row->address}}</td>
                                              <td style="text-align: center;">{{$row->siret}}</td>
                                              
                                           		<td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                           		<td style="text-align: center;">
                                           				
                                           			<a class="btn btn-circle btn-success" data-toggle="modal" data-target="#validate_agency{{$row->id}}" ><i class="icon-check" style="color:white;"></i></a>
                                           		</td>
                                           	</tr>
                                           	
                                           	@endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                       @else
                                       	<center>Aucune agence en attente</center> 
                                       @endif
                                    </div>

                                </div>
                                <div class="tab-pane " id="banned" role="tabpanel">
                                    <div class="p-20">
                                    	@if(count($bannedDemands)>0)
                                       <div class="table-responsive">
                                    <table class="table color-table danger-table">
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
                                           	@foreach($bannedDemands as $row)
                                           	
                                           		<tr>
                                           		<td style="text-align: center;">{{$row->id}}</td>
                                           		<td style="text-align: center;">{{$row->name}}</td>
                                           		<td style="text-align: center;">{{$row->email}}</td>
                                              <td style="text-align: center;">{{$row->address}}</td>
                                              <td style="text-align: center;">{{$row->siret}}</td>
                                              
                                           		<td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                           		<td style="text-align: center;">
                                           				
                                           			<a class="btn btn-circle btn-success" data-toggle="modal" data-target="#recover_agency{{$row->id}}" ><i class="fa  fa-mail-reply-all" style="color:white;"></i></a>
                                           		</td>
                                           	</tr>
                                           	
                                           	@endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                       @else
                                       	<center>Aucune agence bloquée</center> 
                                       @endif
                                    </div>
                                </div>
                                
                            </div>
                        </div>
    </div>
</div>
@endsection
<!--Modals-->
<!--Accept demands Modals -->
@foreach($noAcceptedDemands as $row)
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
<!--end accept modals -->
<!--Edit accepted demands modals-->
@foreach($acceptedDemands as $row)
<div class="modal fade" id="edit_agency{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <form action ="{{route('demand.set',$row->id)}}" method="POST">
                      {{csrf_field()}}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Mise à jour d'une demande d'adhésion</h4>
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
                                                      <input type="checkbox" class="check" id="minimal-checkbox-2" value="1" name="transfer_option" {{$row->transfer_option == 1 ? 'checked' : ''}}>
                                                      <label for="minimal-checkbox-2">Payement avec virement </label>
                                                    </div>
                                                  </div>
                                               </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="submit"  class="btn btn-success">Mettre à jour</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
@endforeach
<!---->
<!--Bann modal -->
 @foreach($acceptedDemands as $row)
    <div class="modal fade" id="bann_agency{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               <h4>Etes-vous sur de bloquer cette agence ?</h4> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <a href="{{route('demand.bann',$row->id)}}"  class="btn btn-danger">Bloquer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    @endforeach
<!---->
<!--Recover modal-->
 @foreach($bannedDemands as $row)
    <div class="modal fade" id="recover_agency{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               <h4>Etes-vous sur de récupérer cette agence ?</h4> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <a href="{{route('agency.recover',$row->id)}}"  class="btn btn-success">Récupérer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    @endforeach
<!---->
<!----->
@section('js-includes')
@endsection