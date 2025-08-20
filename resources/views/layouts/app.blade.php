<!DOCTYPE html>
<html class="no-js" lang="az">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17459837374"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-17459837374');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'No1Kulinariya — Azərbaycan mətbəxi və reseptlər | Fast food, şirniyyat, içkilər')</title>

    <meta name="author" content="@yield('meta_author', 'No1Kulinariya')">
    <meta name="description" content="@yield('meta_description', 'No1Kulinariya — Azərbaycan mətbəxi, fast food, salatlar, şirniyyatlar və içkilər üçün addım-addım reseptlər. Günlük ilham və praktik məsləhətlər.')">
    <meta name="keywords" content="@yield('meta_keywords', 'kulinariya, reseptlər, Azərbaycan mətbəxi, şirniyyat, salat, içkilər, fast food, desert, tort, sup, sous, toyuq yeməkləri')">
    <meta name="robots" content="@yield('meta_robots', 'index,follow')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Laravel --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- PWA/Tile/Favicon --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/180x180.png') }}">
    <link rel="manifest" href="{{ asset('assets/manifest.webmanifest') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/144x144.png') }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bangers&family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Open Graph / Social --}}
    <meta property="og:title" content="@yield('og_title', 'No1Kulinariya — Azərbaycan mətbəxi və reseptlər')">
    <meta property="og:description" content="@yield('og_description', 'Sınanmış, fotoşəkilli reseptlər və kulinariya məsləhətləri.')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="No1Kulinariya">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/og-default.jpg'))">

    {{-- Səhifəyə xüsusi əlavə meta/css üçün stack --}}
    @stack('head')
</head>
<body>
<div class="preloader">
    <button class="th-btn preloaderCls">Cancel Preloader</button>
    <div class="preloader-inner" id="preloader">
        <div class="header-logo pb-2">
            <a href="{{ route('home') }}">
                <img alt="No1Kulinariya" class="jump" src="{{ asset('assets/img/logo-icon.svg') }}"/>
            </a>
        </div>
        <div class="txt-loading">
            <span class="letters-loading" data-text-preloader="K">K</span>
            <span class="letters-loading" data-text-preloader="U">U</span>
            <span class="letters-loading" data-text-preloader="L">L</span>
            <span class="letters-loading" data-text-preloader="İ">İ</span>
            <span class="letters-loading" data-text-preloader="N">N</span>
            <span class="letters-loading" data-text-preloader="A">A</span>
            <span class="letters-loading" data-text-preloader="R">R</span>
            <span class="letters-loading" data-text-preloader="İ">İ</span>
            <span class="letters-loading" data-text-preloader="Y">Y</span>
            <span class="letters-loading" data-text-preloader="A">A</span>
        </div>
    </div>
</div>

{{-- ======= MENYU AĞACI: TƏMİZ, TƏHLÜKƏSİZ, REKURSİV FUNKSİYA ======= --}}
@php
    /**
     * $items: Illuminate\Support\Collection<Category>
     * $level: dərinlik (CSS üçün)
     *
     * Düzəlişlər:
     * - href düz qurulur (slug varsa ondan, yoxdursa name-dən slug).
     * - children yoxdursa boş kolleksiya kimi davranır.
     * - HTML tam bağlanır; XSS üçün e() istifadə olunur.
     */
    use Illuminate\Support\Str;

    $renderMenu = function ($items, $level = 1) use (&$renderMenu) {
        if (!$items || $items->isEmpty()) return;

        echo '<ul class="sub-menu" data-level="'.(int)$level.'">';

        foreach ($items as $cat) {
            $children = $cat->children ?? collect();
            $hasChildren = $children->isNotEmpty();

            $liClass = $hasChildren ? 'menu-item-has-children' : '';

            // URL: əgər öz route-unuz varsa bunu uyğunlaşdırın
            $slug = $cat->slug ?? Str::slug($cat->name ?? 'kateqoriya');
            $url  = url('recipes/category/'.$slug);

            echo '<li class="'.$liClass.'">';
                echo '<a href="'.e($url).'">'.e($cat->name ?? 'Kateqoriya').'</a>';

                if ($hasChildren) {
                    $renderMenu($children, $level + 1);
                }
            echo '</li>';
        }

        echo '</ul>';
    };
@endphp
{{-- ======= /MENYU AĞACI ======= --}}

<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="far fa-times"></i></button>
    <form action="{{ route('recipes') }}" method="GET">
        <input name="q" placeholder="Yeməyə nə axtarırsan?" type="text"/>
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>

<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ route('home') }}">
                <img alt="No1Kulinariya" src="{{ asset('assets/img/logo.svg') }}"/>
            </a>
        </div>
        {{-- MOBİL MENYU --}}
        <div class="th-mobile-menu">
            <ul>
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">ANA SƏHİFƏ</a>
                </li>

                <li><a href="{{ url('/about') }}">HAQQIMIZDA</a></li>

                {{-- Reseptlər: Dinamik kateqoriya ağacı --}}
                <li class="menu-item-has-children">
                    <a href="{{ route('recipes') }}">Reseptlər</a>
                    @isset($menuCategories)
                        {!! $renderMenu($menuCategories) !!}
                    @endisset
                </li>

                <li><a href="{{ url('/contact') }}">ƏLAQƏ</a></li>
            </ul>
        </div>
    </div>
</div>

<header class="th-header header-default">
    <div class="header-top d-sm-block d-none">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-xl-inline-block">
                                <i class="far fa-location-dot"></i>
                                28 May M/S Rus Plovoslar kilsəsinin yanı
                            </li>
                            <li class="d-none d-md-inline-block">
                                <i class="far fa-envelope-open"></i>
                                <a href="mailto:info@no1kulinariya.com">info@no1kulinariya.com</a>
                            </li>
                            <li class="d-none d-sm-inline-block">
                                <i class="far fa-clock"></i>
                                İş saatları: Hər Gün 09:00 - 22:00
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-xxl-inline-block header-contact">
                                <i class="far fa-phone"></i>
                                <a href="tel:994559711197">+994 55 971 11 97</a>
                            </li>
                            <li>
                                <div class="th-social">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.tiktok.com/"><i class="fab fa-tiktok"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                <img alt="No1Kulinariya" src="{{ asset('assets/img/logo.svg') }}"/>
                            </a>
                        </div>
                    </div>

                    <div class="col-auto">
                        {{-- DESKTOP MENYU --}}
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">ANA SƏHİFƏ</a>
                                </li>

                                <li><a href="{{ url('/about') }}">HAQQIMIZDA</a></li>

                                {{-- Reseptlər: Dinamik kateqoriya ağacı --}}
                                <li class="menu-item-has-children">
                                    <a href="{{ route('recipes') }}">Reseptlər</a>
                                    @isset($menuCategories)
                                        {!! $renderMenu($menuCategories) !!}
                                    @endisset
                                </li>

                                <li><a href="{{ url('/contact') }}">ƏLAQƏ</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">
                            <button class="icon-btn searchBoxToggler" type="button">
                                <i class="far fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </div>
</header>

{{-- ======= CONTENT SLOT ======= --}}
@yield('content')

<footer class="footer-wrapper footer-default overflow-hidden shape-mockup-wrap">
    <div class="shape-mockup d-none d-xxl-block wow fadeinup" style="top: 22%; left: 0%; visibility: hidden; animation-name: none;">
        <img src="{{ asset('assets/img/footer/footer-left.png') }}" alt="img">
    </div>

    <div class="shape-mockup moving d-none d-lg-block" style="top: 10%; right: 4%;">
        <img src="{{ asset('assets/img/shape/footer-top.png') }}" alt="img">
    </div>

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row gy-40 align-items-center justify-content-center">
                <div class="col-xl-12">
                    <div class="subscribe-box">
                        <h2 class="footer-top_title">Let’s Talk With Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Widget Area -->
    <div class="widget-area">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <!-- Contact Info -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Əlaqə</h3>
                        <div class="icon">
                            <img src="{{ asset('assets/img/icon/f-title-icon.png') }}" alt="icon">
                        </div>
                        <div class="th-widget-contact">
                            <div class="info-box">
                                <p class="info-box_text">
                                    <span>Phone:</span>
                                    <a href="tel:994559711197" class="info-box_link">+994 55 971 11 97</a>
                                </p>
                            </div>
                            <div class="info-box">
                                <p class="info-box_text">
                                    <span>Email:</span>
                                    <a href="mailto:info@no1kulinariya.com" class="info-box_link">info@no1kulinariya.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Faydalı linklər</h3>
                        <div class="icon">
                            <img src="{{ asset('assets/img/icon/f-title-icon.png') }}" alt="icon">
                        </div>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{{ url('/recipes') }}">Yemek Reseptleri</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- widget-area -->

    <!-- Copyright -->
    <div class="copyright-wrap">
        <div class="container">
            <div class="copy-right-content">
                <div class="copyright-text-wrap">
                    <p class="copyright-text">
                        <i class="fal fa-copyright"></i>
                        <a href="{{ route('home') }}">No1Kulinariya</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="footer-bottom-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="img">
                    </a>
                </div>
                <div class="footer-card">
                    <img src="{{ asset('assets/img/icon/f-card.png') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="scroll-top">
    <svg class="progress-circle svg-content" height="100%" viewBox="-1 -1 102 102" width="100%">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>

<script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/js/lenis.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@stack('scripts')
</body>
</html>
