@extends('layouts.app')
@section('content')
<div class="section landing-section register" id="result">
    <div class="" style="padding-left: 150px;padding-right: 150px;">
        <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <h4></h4>
                </div>
                <div class="col-md-12 ">
                
                    <h4 class="title"><small>Récapitulation</small></h4>
                    <form action="#" method="POST">
                    {{csrf_field()}}
                    <div class="form-group" hidden>
                        <input type="text" required class="form-control" name="hotel_id" hidden value="{{$booking->hotel_id}}" />
                    </div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align : center;"><label class="control-label">Date d'arrivée : </label></td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="date" style="border-color : gray;" required value="{{$booking->arrival_date}}" readonly  class="form-control" name="arrival_date"  />
                                    </div>
                                </td>
                                <td style="text-align : center;"><label class="control-label">Date de départ : </label></td>
                                <td style="text-align:center;">
                                <div class="form-group">
                                <input type="date" style="border-color : gray;" required value="{{$booking->departure_date}}" readonly  class="form-control" name="departure_date"  />
                                    </div>
                                </td>
                                
                            </tr>
                            <tr>
                                
                                
                                <th style="text-align : center;">Type de la chambre</th>
                                <th style="text-align : center;">Arrangement</th>
                                <th style="text-align : center;">Suppléments</th>
                                <th style="text-align : center ; ">Nombre d'adultes</th>
                                <th style="text-align : center ; ">Nombre d'enfants</th>
                                <th style="text-align : center ; ">Nombre de bébés</th>
                                <th style="text-align : center ; ">Prix</th>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booking->bookingType as $key=>$row)
                                <tr>
                                    <td style="text-align:center;">{{$row->roomType->name}}</td>
                                    <td style="text-align:center;">{{$booking->hotel->rooms[0]->arrangement->name}}</td>
                                    <td style="text-align:center;">
                                        @if($row->supplements)
                                            <?php
                                                $supps = explode(';',$row->supplements); 
                                            ?>
                                            
                                                @foreach($supplements as $supp)
                                                    @for($i=0;$i<count($supps);$i++)
                                                        @if($supps[$i] && $supp->id == $supps[$i])
                                                            {{$supp->name}} <br/>
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            
                                        @else
                                            Pas de suppléments sur cette chambre
                                        @endif
                                    </td>
                                    <td style="text-align:center;">{{$row->majors_number}}</td>
                                    <td style="text-align:center;">{{$row->childrens_number}}</td>
                                    <td style="text-align:center;">{{$row->babies_number}}</td>
                                    <td style="text-align : center">
                                        {{$row->roomPriceInSeason()}} Euros
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align : center;">Prix Total</td>
                                <td style="text-align : center ; ">
                                    <?php
                                        $total = 0;
                                        foreach($booking->bookingType as $key=>$row){
                                            $total += $row->roomPriceInSeason();
                                        } 
                                    ?>
                                    {{$total}} Euros
                                </td>
                            </tr>
                            <tr>
                                        
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td style="text-align : center;">
                                        <label class="control-label">Type de paiement</label>
                                </td>
                                <td style="text-align:center;">
                                        <div class="form-group">
                                            <select class="form-control" required name="payment_type">
                                                <option value="0">Virement</option>
                                                <option value="1"> En ligne</option>
                                            </select>
                                        </div>
                                </td>
                                <td></td>
                                <td style="text-align : center ; ">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Payer</button>
                                    </div>
                                </td>       
                            </tr>
                            
                           
                        </tbody>
                    </table>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection