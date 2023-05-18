<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @include('frontend.goldevine.include.goldevineStyle')
</head>
<body>
    <div id="wrapper">
        @include('frontend.include.header')
        @include('frontend.include.navbar')
        <div class="inner-content">
            @yield('content')
            @include('frontend.include.footer')
        </div>
        @include('frontend.goldevine.include.goldevineScript')
    </div>
</body>

</html>
