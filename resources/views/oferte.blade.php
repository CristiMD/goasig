@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Asigurator</th>
                            <th>Beneficii</th>
                            <th>Valabilitate (3 luni)</th>
                            <th>Valabilitate (6 luni)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($oferte as $key => $asigurator)
                        <tr>
                        <td><div class="logo-asigurator">{{$key}}</div></td>
                        <td><div class="clasa-bonus">Clasa BM: {{$asigurator[0]->ClasaBM}}</div>
                            <div class="valabilitate">Valabilitate: {{$asigurator[0]->Valabilitate}} luni</div>
                            <div class="carte-verde">Tari excluse carte verde: {{$asigurator[0]->CarteaVerde}}</div>
                            <div class="comision">Comision inclus {{$key}}: {{$asigurator[0]->ComisionProcent}}</div>
                        </td>
                        @foreach ($asigurator as $ceva => $oferta)
                                <td>@if($oferta->Valabilitate == 3) 
                                    <div class="actiuni"><a class="buton" href="{{$oferta->LinkPlata}}">{{$oferta->Valoare}} lei</a></div>
                                    @endif</td>
                                <td>@if($oferta->Valabilitate == 6) 
                                    <div class="actiuni"><a class="buton" href="{{$oferta->LinkPlata}}">{{$oferta->Valoare}} lei</a></div>
                                    @endif</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
