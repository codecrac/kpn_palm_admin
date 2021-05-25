<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KPN PALM</title>

    <style>
        body{
            background-image:url("{{asset('images/agriculteur.jpeg')}}") ;
            background-size:cover ;
        }
    </style>
</head>
<body>
    <div style="width: 33%;background-color: #ffffffaa; text-align: center !important;margin: 10% 33%">
        <div style="padding: 15px">
            <h3>PRODUCTEUR</h3>
            {!! \Illuminate\Support\Facades\Session::get('notif','') !!}
            <form action="{{route('connexion_producteur')}}" method="post">
                <input type="text" name="pseudo" style="width: 300px;padding: 8px;border-bottom: 1px solid #2d3748">
                <br/><br/>
                <input type="password" name="mot_de_passe" style="width: 300px;padding: 8px;border-bottom: 1px solid #2d3748">
                <br/><br/>
                @csrf
                <input type="submit" name="connexion_producteur" value="ME CONNECTER" style="text-decoration: none;padding: 8px;background-color: #2d3748;color: #fff">
            </form>
            <br/><br/>
            <div>
                <a href="{{ route('nouveau_producteur') }}" class="ml-4 text-sm text-gray-700 underline">Pas de compte? je m'inscris</a>
            </div>
            <div>
                <br/><br/>
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" style="text-decoration: none;padding: 8px;background-color: #2d3748;color: #fff">Je suis un administrateur</a>
            </div>
        </div>
    </div>
</body>
</html>
