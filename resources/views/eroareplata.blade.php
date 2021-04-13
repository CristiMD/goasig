@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Eroare plata') }}</div>
                <div class="card-body">  
                    @if($eroare)
                    <h1>A aparut o eroare la procesarea platii!</h1> 
                    @endif  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
