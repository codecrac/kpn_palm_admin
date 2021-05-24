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
                <h2 class="text-uppercase text-decoration-underline pb-4 pt-4 text-center">Configuration du bilan</h2>
                <br/>
                <form method="post" target="_blank" action="{{route('bilan_periodique')}}">
                    <div class="row">
                        <div class="form-group mb-6">
                            Bilan Operation de :
                            <select name="id_producteur">
                                <option value="0"> Tout le monde </option>
                                @foreach($les_producteurs as $item_producteur)
                                    <option value="{{$item_producteur->id}}"> {{$item_producteur->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Date debut <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="date" name="date_debut" class="form-control p-0 border-0" required> </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Date fin  <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="date" name="date_fin" class="form-control p-0 border-0"  required> </div>
                    </div>
                    </div>

                    <div class="col-sm-12 text-center">
                        @csrf
                        <button type="submit" name="voir_bilan" value="voir_bilan" class="btn btn-warning">Voir le bilan</button>
                        <br/><br/>
                        <button type="submit" name="imprimer_bilan" value="imprimer_bilan" class="btn btn-success">Imprimer le bilan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

