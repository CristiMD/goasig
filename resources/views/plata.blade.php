@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card custom-card-view">
        @if ($pdf)
            <div class="card-header">{{ __('Polita ta a fost generata cu succes!') }}</div>
            <div class="card-body"> 
                Polita ta a fost generata cu succes. O poti accesa folosind link-ul de mai jos sau din contul tau de client.
                <br>
                O copie a politei a fost trimisa pe adresa de email speficicata.
                
                <div class="wrapper-polita"><a class="vezi-polita" href='{{$pdf}}' target="_blank">Vezi polita</a> </div>  
            </div>
        @else
            <div class="card-header eroare">{{ __('A aparut o eroare!') }}</div>
            <div class="card-body"> 
                A aparut o eroare la generarea politei: 
                <br>
                {{$eroare}}
                <div class="wrapper-polita"><a class="vezi-polita" href="{{ URL::route('landing') }}">Inapoi</a> </div>  
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
