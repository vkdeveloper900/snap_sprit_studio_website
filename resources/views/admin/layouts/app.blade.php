<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- =============================================================== -->
    <!-- Admin CSS -->
    <!-- =============================================================== -->
    @include('admin.layouts.head-css')

    <!-- Page Specific CSS -->
    @yield('style')
</head>
<body class="admin-body">
    <div class="container-fluid">
        <div class="row g-0" style="min-height: 100vh; margin-left: 16.666%;">
            @include('admin.components.sidebar')

            <div class="col p-0 d-flex flex-column" style="width: 100%;">
                @include('admin.components.header')

                <main class="admin-main flex-grow-1">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- =============================================================== -->
    <!-- Admin JavaScript -->
    <!-- =============================================================== -->
    @include('admin.layouts.head-js')

    <!-- Page Specific JavaScript -->
    @yield('scripts')
</body>
</html>