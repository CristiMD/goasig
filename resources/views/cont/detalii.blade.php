<h3 style="text-align: center;">Salutare <span id="nume-detalii-header">{{Auth::user()->nume}}</span></h3>
<div class="account-wrapper">
    @include('cont.nav', ['activ' => 'detalii'])
    <div class="account-extra with-padding">
        <div><span class="span-detalii">Nume: </span><input class="show-info" disabled id="nume-detalii" type="text" value="{{$content->nume}}" /></div>
        <div><span class="span-detalii">Telefon: </span><input class="show-info" disabled id="telefon-detalii" type="text" value="{{$content->telefon}}" /></div>
        <div><span class="span-detalii">Email: </span><input class="show-info" disabled id="email-detalii" type="email" value="{{$content->email}}" /></div>
        <div class="actiuni-edit"><button class="editare e-submit" id="editare-detalii">Editeaza</button><button class="editare e-cancel" id="cancel-editare-detalii">Anuleaza</button></div>
    </div>
    <button id="toggle-editare-detalii"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
</div>