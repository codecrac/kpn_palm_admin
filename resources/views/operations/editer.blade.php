@extends('includes')

@section('content')

    <div class="container-fluid">
        <form class="form-horizontal form-material" method="post" action="{{route('modifier_producteur',[$le_producteur->id])}}">

            <div class="form-group mb-4">
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">INFORMATIONS PRODUCTEUR</h2>
                {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
            </div>
            <div class="row">
                <!-- Column -->
                {{--            ======================INFORMATIONS producteurS=====================--}}
                <div class="offset-md-1 col-md-5 col-xlg-3">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Nom complet  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Johnathan Doe" value="{{$le_producteur->nom}}" class="form-control p-0 border-0" name="nom" required> </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Telephone  <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="123 456 7890" class="form-control p-0 border-0" value="{{$le_producteur->telephone}}" name="telephone" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="example-email" class="col-md-12 p-0">Email </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="email" placeholder="johnathan@admin.com" class="form-control p-0 border-0" value="{{$le_producteur->email}}" name="email">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Lieu d'habitation <i class="text-danger">*</i></label>

                        <div class="col-sm-12 border-bottom p-0">
                            <input type="text" placeholder="Adresse" class="form-control p-0 border-0" value="{{$le_producteur->adresse}}" name="adresse">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-xlg-3">
                    <div class="form-group mb-4">
                        <label class="col-sm-12">Identifiant(Pseudo)<i class="text-danger">*</i></label>

                        <div class="col-sm-12 border-bottom p-0">
                            <input type="text" placeholder="Identifiant de connexion" class="form-control p-0 border-0" value="{{$le_producteur->pseudo}}" name="pseudo">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Mot de passe <i class="text-danger">*</i></label>

                        <div class="col-sm-12 border-bottom p-0">
                            <input type="text" placeholder="Mot de passe" class="form-control p-0 border-0" value="{{$le_producteur->mot_de_passe}}" name="mot_de_passe">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12 text-center">
                            @csrf
                            <button class="btn btn-success">Modifier</button>
                        </div>

                        <br/><br/><br/>
                        <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalSuppression">
                            Supprimer
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalSuppression" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SUPPRESION producteur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous confirmer la suppression du producteur "<b>{{$le_producteur->nom}}</b>" et de toutes les informations le concernant ? </p>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-6">
                            <form method="post" action="{{route('supprimer_producteur',[$le_producteur->id])}}">
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
