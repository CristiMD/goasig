@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @auth
        <div class="card card-oferte  custom-card-view card-cont">
            <div class="card-header ">{{ __('Contul meu') }}</div>
            <div class="card-body">
            @include($partial, $content)
            
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
