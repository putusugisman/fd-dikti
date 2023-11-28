<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dist') }}/img/Logo_Poltrada_header.png">
        @include('partials.style')
    </head>
    <body data-topbar="dark">
        <!-- Begin layout-wrapper -->
        <div id="layout-wrapper">
            @include('partials.header')
            @include('partials.sidebar')
            <!-- Begin main content-->
            <div class="main-content">
                <!-- Begin Page-content -->
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <!-- End Page-content -->
                @include('partials.footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- End layout-wrapper -->
        @include('partials.script')
    </body>

</html>