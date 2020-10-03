@include('layouts.header')
@include('layouts.side_menu')
<div id="main-wrapper" data-sidebartype="full">
<div class="page-wrapper">
<div class="container-fluid">
@yield('content')
        <script>
            var public_path   = '{{URL::to("/")}}';
        </script>
</div>		
</div>
</div>		
@include('layouts.footer')
