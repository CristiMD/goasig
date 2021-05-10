<h3 style="text-align: center;">Conducatori</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'conducatori'])
    <div class="account-extra">
        @if (count($content) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Cod unic</th>
                        <th>Nr CI</th>
                        <th>Serie CI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $conducator)
                        <tr>
                            <td>{{$conducator->nume.' '.$conducator->prenume}}</td>
                            <td>{{$conducator->cod_unic}}</td>
                            <td>{{$conducator->nr_ci}}</td>
                            <td>{{$conducator->serie_ci}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="with-padding">Nu sunt conducatori de afisat</span>
        @endif
    </div>
</div>