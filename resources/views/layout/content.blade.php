    {{-- Page Content --}}
    <div id="page-wrapper">
        <div class="container-fluid col col-md-12">
            <div class="row page-header">
                <div class="col-md-8">
                    <h3>
                        @yield('title_page')
                    </h3>		
                </div>
                <div class="col-md-4">
                    @yield('page_search')
                </div>                
            </div>
            <div class="row">
                <div class="col-md-12">
                    @yield('page_message')
                </div>    
            </div>    
            {{-- ... Your content goes here ... --}}
            @yield('content')

        </div>
    </div>

