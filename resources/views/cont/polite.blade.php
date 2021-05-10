<h3 style="text-align: center;">Polite</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'polite'])
    <div class="account-extra">
        @if (count($content) > 0)
            <table>
                @php ($data_incepere = 'data-incepere')
                @php ($data_expirare = 'data-expirare')
                @php ($link_polita = 'link-polita')

                <thead>
                    <tr>
                        <th>Numar inmatriculare</th>
                        <th>Asigurator</th>
                        <th>Data emitere</th>
                        <th>Data expirare</th>
                        <th>Link polita</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $polita)
                        <tr>
                            <td>{{$polita->nr_inmatriculare}}</td>
                            <td>{{$polita->asigurator }}</td>
                            <td>{{$polita->$data_incepere}}</td>
                            <td>{{$polita->$data_expirare}}</td>
                            <td><a class="vezi-polita" href="{{$polita->$link_polita}}" target="_blank" >Vezi polita </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="with-padding">Nu sunt polite de afisat</span>
        @endif
    </div>
</div>