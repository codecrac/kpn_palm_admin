@extends('includes')

@section('content')

    <div class="container-fluid">
        <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_operation')}}">
            {!! \Illuminate\Support\Facades\Session::get('notif',"") !!}
            <div class="row">
                <!-- Column -->
                {{--            ======================INFORMATIONS producteurS=====================--}}
                <div class="col-lg-4 col-xlg-3 col-md-12">
                    <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">Producteur</h3>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Choisissez le producteur<i class="text-danger">*</i></label>
                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select" name="id_producteur">
                                <option value>Choissisez le producteur</option>
                                @foreach($les_producteurs as $item_producteur)
                                    <option value="{{$item_producteur->id}}"> {{$item_producteur->nom}} </option>
                                @endforeach
                            </select>
                            <br/>
                            <a href="{{asset("nouveau_producteur")}}"> Nouveau producteur ? / je ne trouve pas le producteur</a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                {{--            ======================INFORMATIONS VEHICULES=====================--}}
                <div class="col-lg-8 col-xlg-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-uppercase pb-4 pt-4">INFORMATIONS OPERATIONS</h3>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Reference</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="#40" value="{{date('Ys')}}" class="form-control p-0 border-0"  required name="titre">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Description</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea rows="5" class="form-control p-0 border" placeholder="15 tonnes de palmier a huile" name="description" required></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Cash (FCFA)</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" placeholder="0" class="form-control p-0 border-0" value="0"  required name="cash">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Etat</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select type="text" placeholder="0" class="form-control p-0 border-0"  required name="statut">
                                        <option value="en_attente"> Dans la plantation </option>
                                        <option value="livraison_en_cours"> Livraison en cours </option>
                                        <option value="livraison_recue"> Livraison recue </option>
                                        <option value="paiement_disponible"> Paiement disponible </option>
                                        <option value="paiement_effectuer"> Paiement effectuer </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date depart</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" placeholder="0" class="form-control p-0 border-0" value="0"  required name="date_depart">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Heure depart</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="time" placeholder="10H50" class="form-control p-0 border-0" value="0"  required name="heure_depart">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date arrivée</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" placeholder="0" class="form-control p-0 border-0" value="0"  required name="date_arriver">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Heure arrivée</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="time" placeholder="10H50" class="form-control p-0 border-0" value="0"  required name="heure_arriver">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Maluces</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select type="text" placeholder="0" class="form-control p-0 border-0" name="maluce">
                                        <option value="non"> NON </option>
                                        <option value="oui"> OUI </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Commentaire</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea rows="5" class="form-control p-0 border" placeholder="" name="commentaire" ></textarea>
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    @csrf
                                    <button class="btn btn-success">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </form>
    </div>
@endsection
