<div class="account-nav">
    <ul>
        <li><a class="{{$activ == 'detalii' ? 'activ' : ''}}" href="{{ url('contul-meu')}}">Detalii personale</a></li>
        <li><a class="{{$activ == 'oferte' ? 'activ' : ''}}" href="{{ url('contul-meu/oferte')}}">Oferte disponibile</a></li>
        <li><a class="{{$activ == 'polite' ? 'activ' : ''}}" href="{{ url('contul-meu/polite')}}">Polite inregistrate</a></li>
        <li><a class="{{$activ == 'vehicule' ? 'activ' : ''}}" href="{{ url('contul-meu/vehicule')}}">Vehicule inregistrate</a></li>
        <li><a class="{{$activ == 'proprietari' ? 'activ' : ''}}" href="{{ url('contul-meu/proprietari')}}">Proprietari inregistrati</a></li>
        <li><a class="{{$activ == 'conducatori' ? 'activ' : ''}}" href="{{ url('contul-meu/conducatori')}}">Conducatori inregistrati</a></li>
    </ul>
</div>