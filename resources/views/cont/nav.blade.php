<div class="account-nav">
    <ul>
        <li><a class="{{$activ == 'detalii' ? 'activ' : ''}}" href="{{ config('app.url')}}contul-meu">Detalii personale</a></li>
        <li><a class="{{$activ == 'oferte' ? 'activ' : ''}}" href="{{ config('app.url')}}contul-meu/oferte">Oferte disponibile</a></li>
        <li><a class="{{$activ == 'polite' ? 'activ' : ''}}" href="{{ config('app.url')}}contul-meu/polite">Polite inregistrate</a></li>
        <li><a class="{{$activ == 'vehicule' ? 'activ' : ''}}" href="{{ config('app.url')}}contul-meu/vehicule">Vehicule inregistrate</a></li>
        <li><a class="{{$activ == 'proprietari' ? 'activ' : ''}}" href="{{ config('app.url')}}contul-meu/proprietari">Proprietari inregistrati</a></li>
        <li><a class="{{$activ == 'conducatori' ? 'activ' : ''}}" href="{{ config('app.url')}}contul-meu/conducatori">Conducatori inregistrati</a></li>
        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'partener')
            <li><a href="{{ config('app.url')}}admin">Panou de administrare</a></li>
        @endif
    </ul>
</div>