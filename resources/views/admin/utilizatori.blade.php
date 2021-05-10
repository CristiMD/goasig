<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/react.css') }}" rel="stylesheet">


        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
    </head>
    <body>
        <div class="react-wrapper" id="utilizatori"></div>
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>