<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ Voyager::image(setting('site.logo')) }}">

    <title>@yield('title') | {{ setting('site.title') }}</title>

    <livewire:styles/>
    <script src="{!!url('/js/jquery.min.js')!!}"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css?v=1.4') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
<body>

<livewire:util.header/>

<main class="container" style="padding-top: 60px">
    {{ $slot }}
</main>
<div id="modal_part"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<livewire:scripts/>
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ url('js/script.js?v=1.0') }}"></script>

@yield('script')
</body>
</html>
