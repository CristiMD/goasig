<h3 style="text-align: center;">Oferte</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'oferte'])
    <div class="account-extra">
        @if (count($content) > 0)
            <table>
                @php ($data_incepere = 'data-incepere')
                @php ($data_expirare = 'data-expirare')
                @php ($link_plata = 'link-plata')

                <thead>
                    <tr>
                        <th>Numar inmatriculare</th>
                        <th>Asigurator</th>
                        <th>Data emitere</th>
                        <th>Data expirare</th>
                        <th>D.D.</th>
                        <th>Suma</th>
                        <th>Link plata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $oferta)
                        <tr>
                            <td>{{$oferta->nr_inmatriculare}}</td>
                            <td>{{$oferta->asigurator }}</td>
                            <td>{{$oferta->$data_incepere}}</td>
                            <td>{{$oferta->$data_expirare}}</td>
                            <td>{{$oferta->decontare_directa}}</td>
                            <td>{{$oferta->suma}}</td>
                            <td><a class="vezi-polita" href="{{$oferta->$link_plata}}" target="_blank" >Plateste polita </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="with-padding">Nu sunt oferte de afisat</span>
        @endif
    </div>
</div>