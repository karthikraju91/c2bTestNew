@include('layouts.user_header')
@yield('content')
        <script>
            var public_path   = '{{URL::to("/")}}';
        </script>
@include('layouts.user_footer')