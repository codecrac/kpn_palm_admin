@extends('includes')

@section('content')

    <div class="container-fluid">
        <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_information')}}">

            <div class="form-group mb-4">
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">NOUVELLE INFORMATIONS</h2>
                {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
            </div>
            <div class="row">
                <!-- Column -->
                {{--            ======================INFORMATIONS CLIENTS=====================--}}
                <div class="offset-md-1 col-md-5 col-xlg-3">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Titre <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Deplacement" class="form-control p-0 border-0" name="titre" required> </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Description  <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <textarea type="text" placeholder="L'information detaillée" class="form-control p-0 border-0" required name="description" ></textarea>
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
