@extends('layouts.app')
@section('content')
<div class="page-header page-header-xs" style="height: 800px !important; background-image: url('https://images.unsplash.com/photo-1498063401574-13cbee350467?dpr=2&amp;auto=format&amp;fit=crop&amp;w=1500&amp;h=1000&amp;q=80&amp;cs=tinysrgb&amp;crop=');">
            <div class="filter"></div>
            <div class="container" style="margin-top: 100px;">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <h2 class="text-center" style="margin-bottom: 80px;">Contactez-nous</h2>
                     <p>
                     	Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualise customer directed convergence without revolutionary ROI.
                     </p>
                     <form class="contact-form">
                        <div class="row">
                           <div class="col-md-6">
                              <label>Nom</label>
                              <input class="form-control" placeholder="Nom">
                           </div>
                           <div class="col-md-6">
                              <label>Email</label>
                              <input class="form-control" placeholder="Email">
                           </div>
                           <div class="col-md-6">
                              <label>Nom de l'agence</label>
                              <input class="form-control" placeholder="Nom de l'agence">
                           </div>
                           <div class="col-md-6">
                              <label>Téléphone</label>
                              <input class="form-control" placeholder="Téléphone">
                           </div>
                        </div>
                        <label>Message</label>
                        <textarea class="form-control" rows="4" placeholder="Racontez-nous vos pensées et vos sentiments ..."></textarea>
                        <div class="row">
                           <div class="col-md-4 offset-md-4">
                              <button class="btn btn-info btn-lg btn-fill">Envoyez</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div id="contactUsMap" class="big-map"></div>
@endsection
@section('js')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $().ready(function(){
        demo.initContactUsMap()
    });
</script>
@endsection