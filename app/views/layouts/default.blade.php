<!doctype html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
            <!-- header content -->
        <header id="header">
            @include('includes.header')
        </header>
            @yield('content')
        <footer id="footer" class="midnight-blue">
            @include('includes.footer')
        </footer>
        @include('includes.scripts')
    </body>
</html>
            


