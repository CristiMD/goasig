<h3 style="text-align: center;">Proprietari</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'proprietari'])
    <div class="account-extra">
        @if (count($content) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Cod unic</th>
                        <th>Nr CI</th>
                        <th>Serie CI</th>
                        <th>Localitate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $proprietar)
                        <tr>
                            <td>{{$proprietar->nume.' '.$proprietar->prenume}}</td>
                            <td>{{$proprietar->cod_unic}}</td>
                            <td>{{$proprietar->nr_ci}}</td>
                            <td>{{$proprietar->serie_ci}}</td>
                            <td>{{$proprietar->localitate}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="with-padding">Nu sunt proprietari de afisat</span>
        @endif
    </div>
</div>