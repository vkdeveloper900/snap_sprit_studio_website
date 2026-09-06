# 🎯 BLADE INCLUDES STRUCTURE - SNAP SPIRIT STUDIO

**Complete include components for cleaner layout management**

---

## 📁 INCLUDE FILES CREATED

```
resources/views/
├── website/
│   └── layouts/
│       ├── app.blade.php                      (Master layout)
│       ├── head-css.blade.php        ✅ CSS Includes
│       └── head-js.blade.php         ✅ JS Includes
│
└── admin/
    └── layouts/
        ├── app.blade.php                      (Master layout)
        ├── head-css.blade.php        ✅ CSS Includes
        ├── head-js.blade.php         ✅ JS Includes
        ├── auth-css.blade.php        ✅ Auth CSS Includes
        └── auth-js.blade.php         ✅ Auth JS Includes
```

---

## 🌐 WEBSITE INCLUDES

### `website/layouts/head-css.blade.php`

**Purpose:** All CSS includes for website pages

**Includes:**
```blade
{{-- Bootstrap CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

{{-- Global Layout CSS --}}
<link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">

{{-- Website Specific CSS --}}
<link rel="stylesheet" href="{{ asset('assets/website/css/layout.css') }}">

{{-- Vite Assets (CSS) --}}
@vite(['resources/css/app.css'])
```

**Used In:**
- `website/layouts/app.blade.php`
- All website pages extending master layout

---

### `website/layouts/head-js.blade.php`

**Purpose:** All JavaScript includes for website pages

**Includes:**
```blade
{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- Global Layout JS --}}
<script src="{{ asset('assets/js/layout.js') }}"></script>

{{-- Website Specific JS --}}
<script src="{{ asset('assets/website/js/layout.js') }}"></script>


**Used In:**
- `website/layouts/app.blade.php`
- All website pages extending master layout

---

## 🔐 ADMIN INCLUDES

### `admin/layouts/head-css.blade.php`

**Purpose:** All CSS includes for admin panel pages

**Includes:**
```blade
{{-- Bootstrap CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

{{-- Global Layout CSS --}}
<link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">

{{-- Admin Panel CSS --}}
<link rel="stylesheet" href="{{ asset('assets/admin/css/layout.css') }}">

{{-- Vite Assets (CSS) --}}
@vite(['resources/css/app.css'])
```

**Used In:**
- `admin/layouts/app.blade.php`
- All admin pages extending master layout

---

### `admin/layouts/head-js.blade.php`

**Purpose:** All JavaScript includes for admin panel pages

**Includes:**
```blade
{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- Global Layout JS --}}
<script src="{{ asset('assets/js/layout.js') }}"></script>

{{-- Admin Panel JS --}}
<script src="{{ asset('assets/admin/js/layout.js') }}"></script>

```

**Used In:**
- `admin/layouts/app.blade.php`
- All admin pages extending master layout

---

### `admin/layouts/auth-css.blade.php`

**Purpose:** CSS includes for login/register pages

**Includes:**
```blade
{{-- Bootstrap CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Global Layout CSS --}}
<link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">

{{-- Admin Auth CSS --}}
<link rel="stylesheet" href="{{ asset('assets/admin/css/auth.css') }}">

{{-- Vite Assets (CSS) --}}
@vite(['resources/css/app.css'])
```

**Used In:**
- `admin/auth/login.blade.php`
- `admin/auth/register.blade.php`

---

### `admin/layouts/auth-js.blade.php`

**Purpose:** JavaScript includes for login/register pages

**Includes:**
```blade
{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- Global Layout JS --}}
<script src="{{ asset('assets/js/layout.js') }}"></script>


**Used In:**
- `admin/auth/login.blade.php`
- `admin/auth/register.blade.php`

---

## 🎯 HOW TO USE

### In Website Master Layout

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Snap Spirit Studio</title>

    <!-- =============================================================== -->
    <!-- Global CSS -->
    <!-- =============================================================== -->
    @include('website.layouts.head-css')

    <!-- Page Specific CSS -->
    @yield('style')
</head>
<body>
    @include('website.components.navbar')

    <main>
        @yield('content')
    </main>

    @include('website.components.footer')

    <!-- =============================================================== -->
    <!-- Global & Website JavaScript -->
    <!-- =============================================================== -->
    @include('website.layouts.head-js')

    <!-- Page Specific JavaScript -->
    @yield('scripts')
</body>
</html>
```

### In Admin Master Layout

```blade
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
```

### In Auth Pages (Login/Register)

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Snap Spirit Studio</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.auth-css')
</head>
<body class="auth-body">
    <div class="auth-container">
        <!-- Auth content here -->
    </div>

    @include('admin.layouts.auth-js')
</body>
</html>
```

---

## 📝 ADDING PAGE-SPECIFIC ASSETS

### Page Specific CSS

In your page view:

```blade
@extends('website.layouts.app')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/website/css/custom-page.css') }}">
    <style>
        /* Inline CSS if needed */
    </style>
@endsection

@section('content')
    <!-- Page content -->
@endsection
```

### Page Specific JavaScript

In your page view:

```blade
@section('scripts')
    <script src="{{ asset('assets/website/js/custom-page.js') }}"></script>
    <script>
        // Inline JavaScript if needed
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded');
        });
    </script>
@endsection
```

---

## 📊 ASSETS LOADING ORDER

### Website Page Load Order
1. HTML meta tags
2. **head-css.blade.php** (global + website CSS)
3. Page @section('style')
4. HTML body & content
5. **head-js.blade.php** (global + website JS)
6. Page @section('scripts')

### Admin Page Load Order
1. HTML meta tags
2. **head-css.blade.php** (global + admin CSS)
3. Page @section('style')
4. Admin layout (sidebar, header, content)
5. **head-js.blade.php** (global + admin JS)
6. Page @section('scripts')

### Auth Page Load Order
1. HTML meta tags
2. **auth-css.blade.php** (global + auth CSS)
3. Auth form
4. **auth-js.blade.php** (global JS)

---

## ✅ BENEFITS OF THIS STRUCTURE

✅ **DRY Principle** - Don't Repeat Yourself
- CSS/JS not duplicated across files
- Changes in one place affect all pages

✅ **Maintainability**
- Easy to add/remove assets
- Clear separation of concerns
- Page-specific assets clearly defined

✅ **Performance**
- Consistent asset loading
- Ability to add CDN assets once
- Easy to implement caching

✅ **Scalability**
- Easy to add new pages
- New includes can be created for new sections
- Modular structure

✅ **Organization**
- Clear folder hierarchy
- Easy to find and update assets
- Consistent naming conventions

---

## 🚀 ADDING NEW INCLUDES

### Create New Include File

```bash
# For website
touch resources/views/website/layouts/custom-css.blade.php
touch resources/views/website/layouts/custom-js.blade.php

# For admin
touch resources/views/admin/layouts/custom-css.blade.php
touch resources/views/admin/layouts/custom-js.blade.php
```

### Add to Master Layout

```blade
<!-- In your layout master -->
@include('website.layouts.custom-css')
<!-- ... other content ... -->
@include('website.layouts.custom-js')
```

---

## 📋 CURRENT INCLUDE STRUCTURE SUMMARY

```
Website:
  ├── head-css   → Bootstrap + Fonts + Global + Website CSS
  └── head-js    → Bootstrap JS + Global + Website JS

Admin:
  ├── head-css   → Bootstrap + Fonts + Global + Admin CSS
  ├── head-js    → Bootstrap JS + Global + Admin JS
  ├── auth-css   → Bootstrap + Fonts + Global + Auth CSS
  └── auth-js    → Bootstrap JS + Global JS
```

---

## 🎯 NEXT STEPS

1. ✅ Includes created
2. ✅ Layouts updated
3. ✅ Auth pages updated
4. ⏳ Update all child views to extend layouts
5. ⏳ Add @yield('style') and @yield('scripts') to pages as needed
6. ⏳ Create page-specific CSS/JS files

---

**Created:** September 6, 2026  
**Status:** ✅ COMPLETE  
**Version:** 1.0.0
