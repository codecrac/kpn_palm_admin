@extends('includes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">Liste des operations</h2>
                {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                            <tr>
                                <th class="border-top-0">Reference</th>
                                <th class="border-top-0">Producteur</th>
                                <th class="border-top-0">Statut</th>
                                <th class="border-top-0">Date depart</th>
                                <th class="border-top-0">Date Arrive</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($les_operations as $operation)
                            <tr>
                                <td>{{$operation->titre}}</td>
                                <td>
                                    {{$operation->producteur->nom}}
                                    <br/>
                                    Tel : {{$operation->producteur->telephone}}
                                </td>
                                <td class="text-uppercase">
                                    <span style="padding: 4px;background-color: #2d3748;color: #fff;min-width: 120px">
                                        {{str_replace('_',' ',$operation->statut)}}
                                    </span>
                                </td>
                                <td>{{$operation->temps_depart}}</td>
                                <td>{{$operation->temps_arriver}}</td>
                                <td>
                                    <a href="{{route('editer_operation',[$operation->id])}}" class="mt-2 mt-1 mb-1 btn btn-primary">Editer</a>
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

