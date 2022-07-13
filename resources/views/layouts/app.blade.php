<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.19.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/app.css') }}">
    <title>Freelancing - @yield('title')</title>
</head>
<body>

    @include('layouts._navigation')
    @include('layouts._breadcrumbs')
    @include('layouts._header')

    @if ($flash_message = Session::get('flash_message'))
        @include('layouts.alert._alert')
    @endif

    <div class="page-container">
        @yield('content')
    </div>

</body>
</html>
