<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.backsite.meta')
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    @stack('before-style')
      @include('includes.backsite.style')
    @stack('after-style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')

    @include('components.backsite.header')
    @include('components.backsite.menu')
        @yield('content')
    @include('components.backsite.footer')

    @stack('before-script')
        @include('includes.backsite.script')
    @stack('after-script')
</body>
</html>
