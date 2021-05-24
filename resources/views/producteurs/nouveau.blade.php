@extends('includes')

@section('content')

    <div class="container-fluid">
        <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_producteur')}}">

            <div class="form-group mb-4">
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">INFORMATIONS PRODUCTEUR</h2>
                {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
            </div>
            <div class="row">
                <!-- Column -->
                {{--            ======================INFORMATIONS CLIENTS=====================--}}
                <div class="offset-md-1 col-md-5 col-xlg-3">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Nom complet  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="nom" required> </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Telephone  <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="123 456 7890" class="form-control p-0 border-0" name="telephone" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="example-email" class="col-md-12 p-0">Email </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="email" placeholder="johnathan@admin.com" class="form-control p-0 border-0" name="email">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Lieu d'habitation <i class="text-danger">*</i></label>

                        <div class="col-sm-12 border-bottom p-0">
                            <input type="text" placeholder="Adresse" class="form-control p-0 border-0" name="adresse">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-xlg-3">
                    <div class="form-group mb-4">
                        <label class="col-sm-12">Identifiant(Pseudo)<i class="text-danger">*</i></label>

                        <div class="col-sm-12 border-bottom p-0">
                            <input type="text" placeholder="Identifiant de connexion" class="form-control p-0 border-0" name="pseudo">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Mot de passe <i class="text-danger">*</i></label>

                        <div class="col-sm-12 border-bottom p-0">
                            <input type="text" placeholder="Mot de passe" class="form-control p-0 border-0" name="mot_de_passe">
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        @csrf
                        <button class="btn btn-success">Enregistrer</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
