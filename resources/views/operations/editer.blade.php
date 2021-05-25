@extends('includes')

@section('content')

    <div class="container-fluid">
        <form class="form-horizontal form-material" method="post" action="{{route('modifier_operation',[$loperation->id])}}">
            {!! \Illuminate\Support\Facades\Session::get('notif',"") !!}
            <div class="row">
                <!-- Column -->
                {{--            ======================INFORMATIONS operationS=====================--}}
                <div class="col-lg-4 col-xlg-3 col-md-12">
                    <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">producteurs</h3>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Choisissez le producteur<i class="text-danger">*</i></label>
                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select" name="id_producteur">
                                <option value="{{$loperation->producteur->id}}">{{$loperation->producteur->nom}}</option>
                                @foreach($les_producteurs as $item_producteur)
                                    <option value="{{$item_producteur->id}}"> {{$item_producteur->nom}} </option>
                                @endforeach
                            </select>
                            <br/>
                            <a href="{{asset("nouveau_operation")}}"> Nouveau operation ? / je ne trouve pas le operation</a>
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
                                    <input type="text" placeholder="#40" value="{{$loperation->titre}}" class="form-control p-0 border-0"  required name="titre">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Description</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea rows="5" class="form-control p-0 border" placeholder="15 tonnes de palmier a huile" name="description" required>{{$loperation->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Cash (FCFA)</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" placeholder="0" class="form-control p-0 border-0" value="{{$loperation->cash}}"  required name="cash">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Etat</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select type="text" placeholder="0" class="form-control p-0 border-0"  required name="statut">
                                        <option value="{{$loperation->statut}}" style="text-transform: uppercase">{{str_replace('_',' ',$loperation->statut)}} </option>
                                        <option value="en_attente"> Dans la plantation </option>
                                        <option value="livraison_en_cours"> Livraison en cours </option>
                                        <option value="livraison_effectuer"> Livraison recue </option>
                                        <option value="paiement_disponible"> Paiement disponible </option>
                                        <option value="paiement_effectuer"> Paiement effectuer </option>
                                    </select>
                                </div>
                            </div>


                            @php
                                $tableau_depart = explode('à',$loperation->temps_depart);
                                $date_depart = date('Y-m-d',strtotime(trim($tableau_depart[0])));
                                $heure_depart = date('H:i',strtotime(trim($tableau_depart[1])));
                            @endphp
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date depart</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" placeholder="0" class="form-control p-0 border-0" value="{{$date_depart}}"   name="date_depart">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Heure depart</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="time" placeholder="10H50" class="form-control p-0 border-0" value="{{$heure_depart}}"   name="heure_depart">
                                </div>
                            </div>

                            @php
                                $tableau_arriver = explode('à',$loperation->temps_arriver);
                                $date_arriver = date('Y-m-d',strtotime(trim($tableau_arriver[0])));
                                $heure_arriver = date('H:i',strtotime(trim($tableau_arriver[1])));
                            @endphp
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date arrivée</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" placeholder="0" class="form-control p-0 border-0" value="{{$date_arriver}}"   name="date_arriver">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Heure arrivée</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="time" placeholder="10H50" class="form-control p-0 border-0" value="{{$heure_arriver}}"   name="heure_arriver">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Maluces</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select type="text" placeholder="0" class="form-control p-0 border-0" name="maluce">
                                        <option value="{{$loperation->maluces}}"> {{$loperation->maluces}} </option>
                                        <option value="non"> NON </option>
                                        <option value="oui"> OUI </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Commentaire</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea rows="5" class="form-control p-0 border" placeholder="" name="commentaire" >{{$loperation->commentaire}}</textarea>
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    @csrf
                                    <button class="btn btn-success">Enregistrer</button>
                                </div>

                                <br/><br/><br/>
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalSuppression">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalSuppression" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SUPPRESION operation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous confirmer la suppression de l'operation "<b>{{$loperation->titre}}</b>" et de toutes les informations le concernant ? </p>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-6">
                            <form method="post" action="{{route('supprimer_operation',[$loperation->id])}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger text-white" >OUI</button>
                            </form>
                        </div>
                        <div class="col-6 ">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
