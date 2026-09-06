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
    <div class="admin-container">
        @include('admin.components.sidebar')

        <div class="admin-content">
            @include('admin.components.header')

            <main class="admin-main">
                @yield('content')
            </main>
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