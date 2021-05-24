@extends('includes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">Liste des producteurs</h2>
                {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Nom complet</th>
                            <th class="border-top-0">Telephone</th>
                            <th class="border-top-0">Adrresse</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($les_producteurs as $producteur)
                            <tr>
                                <td>{{$producteur->id}}</td>
                                <td>{{$producteur->nom}}</td>
                                <td>{{$producteur->telephone}}</td>
                                <td>{{$producteur->adresse}}</td>
                                <td>
                                    <a href="{{route('editer_producteur',[$producteur->id])}}" class="mt-2 mt-1 mb-1 btn btn-primary">Editer</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

