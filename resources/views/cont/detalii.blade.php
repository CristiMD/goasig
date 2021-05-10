<h3 style="text-align: center;">Salutare {{Auth::user()->nume}}</h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'detalii'])
    <div class="account-extra with-padding">
        <p><span>Nume: </span>{{$content->nume}}</p>
        <p><span>Email: </span>{{$content->email}}</p>
        <p><span>Telefon: </span>{{$content->telefon}}</p>
    </div>
</div>