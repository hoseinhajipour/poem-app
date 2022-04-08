<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <livewire:styles/>
    <script src="{!!url('/js/jquery.min.js')!!}"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container fixed-top shadow bg-light">
    @auth
        <div class="row">
            <div class="col-6">
                <div class="btn btn-outline-info form-control">
                    {{auth()->user()->wallet}}
                </div>
            </div>
            <div class="col-6">
                <div class="btn btn-outline-info form-control">
                    {{auth()->user()->score}}
                </div>
            </div>
        </div>
    @endauth
</div>

<main class="container" style="padding-top: 60px">
    {{ $slot }}
</main>



@include('layouts.parts.bottomNav')
<livewire:scripts/>
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
