<h3 style="text-align: center;">Conducatori</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'conducatori'])
    <div id="lista-conducator" class="account-extra">
        @if (count($content) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Cod unic</th>
                        <th>Nr CI</th>
                        <th>Serie CI</th>
                        <th>Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $key=>$conducator)
                        <tr>
                            <td>{{$conducator->nume.' '.$conducator->prenume}}</td>
                            <td>{{$conducator->cod_unic}}</td>
                            <td>{{$conducator->nr_ci}}</td>
                            <td>{{$conducator->serie_ci}}</td>
                            <td><div class="actiuni">
                                <button data-conducator={{$conducator->cod_unic}} class="conducator-edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button data-conducator={{$conducator->cod_unic}} class="conducator-delete"><i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                </div></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="with-padding">Nu sunt conducatori de afisat</span>
        @endif
    </div>
    <div id="edit-form-conducator" class="edit-form">
        <div class="e-half">
            <div><span class="span-detalii">Nume: </span><input id="nume-conducator" type="text"/></div>
            <div><span class="span-detalii">Prenume: </span><input id="prenume-conducator" type="text"/></div>
            <div><span class="span-detalii">Cod unic: </span><input  class="show-info" disabled id="cod-conducator" type="text"/></div>
            <div><span class="span-detalii">Nr CI: </span><input id="nr-ci-conducator" type="text"/></div>
            <div><span class="span-detalii">Serie CI: </span><input id="serie-ci-conducator" type="text"/></div>
            <div class="actiuni-edit"><button class="editare e-submit" id="editare-conducator">Editeaza</button><button class="editare e-cancel" id="cancel-editare-conducator">Anuleaza</button></div>
        </div>
    </div>
</div>