<!DOCTYPE html>
    <html lang="en">
        <head>
            @include('layout.head')            
        </head>
    <body>

        
        <div id="wrapper">
            {{-- Sidebar --}}
            {{-- @include('layout.sidebar') --}}

            <div id="page-content-wrapper">
                {{-- Page Content --}}
                @include('layout.content')
            </div>    
        </div>

        {{-- footer page and script  --}}
        <footer class="text-muted">
            @include('layout.footer')
            @include('layout.footer-script')
        </footer>

        @yield('page_script')

    </body>
</html>