<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BILAN PERIODIQUE</title>

    <style>
        td,th{
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h4 style="text-align: center;text-decoration: underline">
                BILAN DES OPERATIONS {{$nom_producteur}} : {{date('d-m-Y',strtotime($date_debut))}} à {{date('d-m-Y',strtotime($date_fin))}}
            </h4>
            {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
            <div class="table-responsive">
                <table class="datatable table " border="1" width="100%">
                    <thead>
                    <tr>
                        <th class="border-top-0">Reference</th>
                        <th class="border-top-0">Producteur</th>
                        <th class="border-top-0">Statut</th>
                        <th class="border-top-0">Date depart</th>
                        <th class="border-top-0">Date Arrive</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($les_operations as $operation)
                        <tr>
                            <td>{{$operation->titre}}</td>
                            <td>
                                {{$operation->producteur->nom}}
                                <br/>
                                Tel :  {{$operation->producteur->telephone}}
                            </td>
                            <td class="text-uppercase">
                                {{str_replace('_',' ',$operation->statut)}}
                            </td>
                            <td>{{$operation->temps_depart}}</td>
                            <td>{{$operation->temps_arriver}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
