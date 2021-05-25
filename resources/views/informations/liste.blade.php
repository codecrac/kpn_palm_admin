@extends('includes')

@section('style')
    <style>
        th,td{
            text-align: center;
            width: 350px !important;
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
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">Liste des informations</h2>
                {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <th class="border-top-0">Titre</th>
                            <th class="border-top-0">Description</th>
                            <th class="border-top-0">Date</th>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <th class="border-top-0">Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($les_informations as $information)
                            <tr>
                                <td>{{$information->titre}}</td>
                                <td> {{$information->description}} </td>
                                <td> {{date('d-m-Y',strtotime($information->timestamp))}} </td>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <td>
                                    <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalSuppression_{{$information->id}}">
                                        Supprimer
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalSuppression_{{$information->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">SUPPRESION information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Voulez-vous confirmer la suppression du information "<b>{{$information->titre}}</b>" et de toutes les informations le concernant ? </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <form method="post" action="{{route('supprimer_information',[$information->id])}}">
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

                                </td>
                                @endif

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

