@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @auth
        <div class="card card-oferte  custom-card-view">
            <div class="card-header ">{{ __('Contul meu') }}</div>
            <div class="card-body">
            <h3 style="text-align: center;">Salutare {{Auth::user()->nume}}</h3>
            </div>
        </div>
    </div>
    @endauth
    @guest
        <div id="revenire">
            <h2>Nu esti conectat</h2>
        </div>
    @endguest
</div>
@endsection
