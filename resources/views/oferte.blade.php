@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="valabilitate">Perioada valabilitate: {{$valabilitate}} luni</div>
                    @foreach ($oferte as $oferta)
                        <div class="oferta">
                            <div class="logo-asigurator">{{$oferta['asigurator']}}</div>
                            <div class="clasa-bonus">Clasa BM: {{$oferta['date']->ClasaBM}}</div>
                            <div class="valabilitate">Valabilitate: {{$oferta['date']->Valabilitate}} luni</div>
                            <div class="carte-verde">Tari excluse carte verde: {{$oferta['date']->CarteaVerde}}</div>
                            <div class="comision">Comision inclus {{$oferta['asigurator']}}: {{$oferta['date']->ComisionProcent}}</div>
                            <div class="actiuni"><a class="buton" href="{{$oferta['date']->LinkPlata}}">{{$oferta['date']->Valoare}} lei</a></div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
