@extends('includes')

@section('style')
    <style>
        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
            -webkit-animation: blink-animation 1s steps(5, start) infinite;
        }
        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }
        @-webkit-keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }
    </style>
@endsection

@section('content')
    {{--                <!-- ============================================================== -->--}}
    <div class="row justify-content-center">
        {{--<div class="row">
            <hr/>
            <h4 class="text-center">PREVUES DANS LES 10 PROCHAINS JOURS </h4>
            <hr/>
        </div>--}}
        <br/><br/>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <a href="{{route('liste_operations',['en_attente'])}}">
                    <h3 class="box-title"> Productions dans les champs</h3>
                </a>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto" style="padding: 15px;background-color: green;color: white !important;">
                            <span class="counter">{{$nb_operation_en_attente}}</span>
                        </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <a href="{{route('liste_operations',['livraison_en_cours'])}}">
                    <h3 class="box-title text-uppercase"> Livraisons en cours </h3>
                </a>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ms-auto" style="padding: 15px;background-color: green;color: white !important;">
                        <span class="counter">{{$nb_livraison_en_cours}}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <a href="{{route('liste_operations',['livraison_effectuer'])}}">
                    <h3 class="box-title text-uppercase"> Livraisons recues </h3>
                </a>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto" style="padding: 15px;background-color: green;color: white !important;">
                            <span class="counter">{{$nb_livraison_effectuer}}</span>
                        </li>
                </ul>
            </div>
        </div>
        {{--    #========================================================--}}
       {{-- <div class="row">
            <hr/>
            <h4 class="text-center"> STATISTIQUES GENERALES </h4>
            <hr/>
        </div>--}}
        <br/><br/>

        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <a href="{{route('liste_operations',['maluces'])}}">
                    <h3 class="box-title  text-uppercase">Maluces <br/>.</h3>
                </a>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ms-auto" style="padding: 15px;background-color: green;color: white !important;">
                        <span class="counter">{{$nb_maluces}}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <a href="{{route('liste_operations',['paiement_disponible'])}}">
                    <h3 class="box-title  text-uppercase">Paiement disponibles<br/>.</h3>
                </a>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ms-auto" style="padding: 15px;background-color: green;color: white !important;">
                        <span class="counter">{{$nb_paiement_disponible}}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <a href="{{route('liste_operations',['paiement_effectuer'])}}">
                    <h3 class="box-title text-uppercase">Paiements effectuer <br/>.</h3>
                </a>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ms-auto" style="padding: 15px;background-color: green;color: white !important;">
                        <span class="counter">{{$nb_paiement_effectuer}}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    {{--                <!-- ============================================================== -->--}}
@endsection
