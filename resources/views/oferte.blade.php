<div class="container">
    <div class="row justify-content-center">
            <div class="card card-oferte  custom-card-view">
                <div class="card-header ">{{ __('Oferte disponibile') }}</div>
                <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Asigurator</th>
                            <th>Beneficii</th>
                            <th>Valabilitate ({{$valabilitate}} luni)</th>
                            <th>Valabilitate (12 luni)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($oferte as $key => $asigurator)
                        <tr>
                        <td><img class="logo-asigurator" src="{{URL::asset('/images/'.$key.'.png')}}" /></td>
                        <td><div class="clasa-bonus">Clasa BM: {{$asigurator[0]->ClasaBM}}</div>
                            <div class="carte-verde">Tari excluse carte verde: {{$asigurator[0]->CarteaVerde}}</div>
                            <div class="comision">Comision inclus {{$key}}: {{$asigurator[0]->ComisionProcent}}</div>
                        </td>
                        @foreach ($asigurator as $ceva => $oferta)
                                <td>@if($oferta->Valabilitate == $valabilitate) 
                                    <div class="actiuni"><a class="buton" href="{{$oferta->LinkPlata}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>{{$oferta->Valoare}} lei</span></a></div>
                                    @endif</td>
                                <td>@if($oferta->Valabilitate == 12) 
                                    <div class="actiuni"><a class="buton" href="{{$oferta->LinkPlata}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>{{$oferta->Valoare}} lei</span></a></div>
                                    @endif</td>
                                @endforeach
                            </tr>
                        @endforeach
                    @foreach ($oferte as $key => $asigurator)
                        @foreach ($asigurator as $ceva => $oferta)
                            @if($oferta->Eroare) 
                                <span>{{$oferta->Mesaj}}</span>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                 </table>
                </div>
        </div>
    </div>
</div>
