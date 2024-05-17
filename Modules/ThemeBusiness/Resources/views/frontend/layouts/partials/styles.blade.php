<!-- Favicon -->
<link rel="shortcut icon" href="/previews/9.0.0/img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="/previews/9.0.0/img/apple-touch-icon.png">


<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<!-- Favicon -->
@if (empty($settings->general->favicon))
@else
    <link rel="icon" type="image/png" href="{{ asset('public/assets/images/logo/' . $settings->general->favicon) }}">
@endif

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
<!-- Slick Slider -->
<link rel="stylesheet" href="{{ asset('public/modules/spc/css/slick.css') }}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/modules/spc/css/bootstrap.min.css') }}">
<!-- StyleSheet -->
<link rel="stylesheet" href="{{ asset('public/modules/spc/css/style.css') }}">
<!--     <link rel="stylesheet" href="https://tisf.com/wp-content/themes/treasure-island/css/slick.css"> -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

{{-- Any Custom style include in the `styles` blade section --}}
@yield('styles')
