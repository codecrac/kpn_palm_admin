@extends('includes')


@section('style')
    <style>
        th,td{
            width: 500px !important;
            word-wrap: break-word;

            word-break: break-all;
            white-space: normal;
        }
    </style>
@endsection


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">Liste des operations</h2>
                @if($etat_operation)
                    <span style="padding: 4px;background-color: #2d3748;color: #fff;min-width: 120px;text-transform: uppercase;text-align: center">
                        {{str_replace('_',' ',$etat_operation)}}
                    </span>
                @endif
                <br/><br/>
                {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                            <tr>
                                <th class="border-top-0">Operation</th>
                                <th class="border-top-0">Producteur</th>
                                <th class="border-top-0">Statut</th>
                                <th class="border-top-0">Livraison</th>
                                <th class="border-top-0">Argent</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($les_operations as $operation)
                            <tr>
                                <td>
                                    Ref : {{$operation->titre}}
                                </td>
                                <td>
                                    {{$operation->producteur->nom}}
                                    <br/>
                                    Tel : {{$operation->producteur->telephone}}
                                </td>
                                <td class="text-uppercase">
                                    <span style="padding: 4px;background-color: #2d3748;color: #fff;min-width: 120px;font-size: 10px">
                                        {{str_replace('_',' ',$operation->statut)}}
                                    </span>
                                </td>
                                <td>
                                    Depart : {{$operation->temps_depart}}
                                    <br/>
                                    Arrivée : {{$operation->temps_arriver}}
                                </td>
                                <td>
                                    Cash : {{$operation->cash}} F
                                    <br/>
                                    Maluces : {{$operation->maluces}}
                                </td>
                                <td>

                                    <div class="garde_fou" id="garde_fou_{{$operation->id}}">
                                        <br/>
                                        <b>Description</b> : {{$operation->description}}
                                        <br/>
                                        <b>Commentaire</b> : {{$operation->commentaire}}
                                    </div>

                                    <button type="button" class="btn btn-primary" onclick="toggle_garde_fou({{$operation->id}})">Details</button>
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        <a href="{{route('editer_operation',[$operation->id])}}" class="mt-2 mt-1 mb-1 btn btn-warning">Editer</a>
                                    @endif
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

