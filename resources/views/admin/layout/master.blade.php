<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title') Admin Panel</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="shortcut icon" href="https://cdn.worldvectorlogo.com/logos/laravel-2.svg" type="image/x-icon">
</head>
<body>
    @include('admin.layout.partials.header')
    <main>
        @component('admin.components.modal')
            <x-slot:class>delete</x-slot:class>
            <x-slot:title>¿Seguro que quieres borrar?</x-slot:title>
            <div class="buttons">
                <button class="confirmation-button">Si</button>
                <button class="close">No</button>
            </div>
        @endcomponent
        @yield('content')
    </main>
</body>
</html>