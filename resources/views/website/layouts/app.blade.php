<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Snap Spirit Studio - Premium Photography & Cinematography. Weddings, Events, Commercial, and Creative Productions in Ahmedabad.">
    <meta name="keywords" content="photography, cinematography, wedding photographer, video production, Ahmedabad">
    <meta property="og:title" content="Snap Spirit Studio - Premium Photography & Cinematography">
    <meta property="og:description" content="Capturing stories through premium photography and cinematography for weddings, events, brands, and creative projects.">
    <meta property="og:image" content="https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&q=80">
    <meta property="og:type" content="website">

    <title>@yield('title') - Snap Spirit Studio</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='75' font-size='75' font-family='serif'>📸</text></svg>">

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

<!-- WhatsApp Button -->
<a href="https://wa.me/[PHONE_NUMBER]?text=Hello%20Snap%20Spirit%20Studio!" class="whatsapp-btn" title="Chat on WhatsApp" target="_blank" rel="noopener noreferrer">
    <i class="bi bi-whatsapp"></i>
</a>

<!-- Go to Top Button -->
<button id="goToTop" class="go-to-top" title="Go to top">
    <i class="bi bi-chevron-up"></i>
</button>

<!-- =============================================================== -->
<!-- Global & Website JavaScript -->
<!-- =============================================================== -->
@include('website.layouts.head-js')

<!-- Page Specific JavaScript -->
@yield('scripts')

</body>
</html>
