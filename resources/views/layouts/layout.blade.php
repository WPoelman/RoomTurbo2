<!DOCTYPE html>

@include('includes.head')

<body>
    @include('includes.navigation')
    <div class="container justify-content-center">
        @include('includes.message')
        @yield('content')
    </div>

</body>

@include('includes.footer')
</html>
