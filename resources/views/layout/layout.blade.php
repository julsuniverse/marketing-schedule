        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robot" content="noindex, nofollow">
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('/images/favicon.png') }}" type="image/png" sizes="16x16">

        <link href="{{ asset('build/css/app.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>
    <div id="base-url" data-url="{{ URL::to('/') }}/"></div>

    <div id="wrapper">
        @include('layout.nav')
    </div>
    <div id="page-wrapper">
        <div class="row" id="app">
            <h2 class="heading">@yield('sub-title')</h2>
            <div class="add-line clear"></div>

            @include('layout.errors')

            @yield('content')
        </div>
    </div>
    <div id="spinner">
        <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
    </div>
    <script src="{{ asset('build/js/app.js') }}"></script>
    </body>
</html>