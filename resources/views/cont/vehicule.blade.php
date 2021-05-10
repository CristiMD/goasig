<h3 style="text-align: center;">Vehicule</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'vehicule'])
    <div class="account-extra">
        @if (count($content) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Numar inmatriculare</th>
                        <th>Tip</th>
                        <th>Marca</th>
                        <th>Model</th>
                        <th>An fabricatie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $vehicul)
                        <tr>
                            <td>{{$vehicul->nr_inmatriculare}}</td>
                            <td>{{$vehicul->tip_vehicul }}</td>
                            <td>{{$vehicul->marca}}</td>
                            <td>{{$vehicul->model}}</td>
                            <td>{{$vehicul->an_fabricatie}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="with-padding">Nu sunt vehicule de afisat</span>
        @endif
    </div>
</div>