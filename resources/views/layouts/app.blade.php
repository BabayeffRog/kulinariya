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

    {{-- Sayfa xüsusi əlavə meta/css üçün stack --}}
    @stack('head')
</head>
<body>
<div class="preloader">
    <button class="th-btn preloaderCls">
        Cancel Preloader
    </button>
    <div class="preloader-inner" id="preloader">
        <div class="header-logo pb-2">
            <a href="index-2.html">
                <img alt="No1Kulinariya" class="jump" src="assets/img/logo-icon.svg"/>
            </a>
        </div>
        <div class="txt-loading">
     <span class="letters-loading" data-text-preloader="K">
      K
     </span>
            <span class="letters-loading" data-text-preloader="U">
      u
     </span>
            <span class="letters-loading" data-text-preloader="L">
      L
     </span>
            <span class="letters-loading" data-text-preloader="İ">
      İ
     </span>
            <span class="letters-loading" data-text-preloader="N">
      N
     </span>
            <span class="letters-loading" data-text-preloader="A">
      A
     </span>
            <span class="letters-loading" data-text-preloader="R">
      R
     </span>
            <span class="letters-loading" data-text-preloader="İ">
      İ
     </span>
            <span class="letters-loading" data-text-preloader="Y">
      Y
     </span>
            <span class="letters-loading" data-text-preloader="A">
      A
     </span>

        </div>
    </div>
</div>
<div class="sidemenu-wrapper sidemenu-cart">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls">
            <i class="far fa-times">
            </i>
        </button>
        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title">
                Ma&gbreve;azaping cart
            </h3>
            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget">
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a class="remove remove_from_cart_button" href="#">
                            <i class="far fa-times">
                            </i>
                        </a>
                        <a href="#">
                            <img alt="Cart Image" src="assets/img/product/product_1_1.png"/>
                            Dumbbells
                        </a>
                        <span class="quantity">
         1 &times;
         <span class="woocommerce-Price-amount amount">
          <span class="woocommerce-Price-currencySymbol">
           ₼
          </span>
          940.00
         </span>
        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a class="remove remove_from_cart_button" href="#">
                            <i class="far fa-times">
                            </i>
                        </a>
                        <a href="#">
                            <img alt="Cart Image" src="assets/img/product/product_1_2.png"/>
                            Leather Bag
                        </a>
                        <span class="quantity">
         1 &times;
         <span class="woocommerce-Price-amount amount">
          <span class="woocommerce-Price-currencySymbol">
           ₼
          </span>
          899.00
         </span>
        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a class="remove remove_from_cart_button" href="#">
                            <i class="far fa-times">
                            </i>
                        </a>
                        <a href="#">
                            <img alt="Cart Image" src="assets/img/product/product_1_3.png"/>
                            Protein Bottle
                        </a>
                        <span class="quantity">
         1 &times;
         <span class="woocommerce-Price-amount amount">
          <span class="woocommerce-Price-currencySymbol">
           ₼
          </span>
          756.00
         </span>
        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a class="remove remove_from_cart_button" href="#">
                            <i class="far fa-times">
                            </i>
                        </a>
                        <a href="#">
                            <img alt="Cart Image" src="assets/img/product/product_1_4.png"/>
                            Gym Cycle
                        </a>
                        <span class="quantity">
         1 &times;
         <span class="woocommerce-Price-amount amount">
          <span class="woocommerce-Price-currencySymbol">
           ₼
          </span>
          723.00
         </span>
        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a class="remove remove_from_cart_button" href="#">
                            <i class="far fa-times">
                            </i>
                        </a>
                        <a href="#">
                            <img alt="Cart Image" src="assets/img/product/product_1_5.png"/>
                            Sports Shoes
                        </a>
                        <span class="quantity">
         1 &times;
         <span class="woocommerce-Price-amount amount">
          <span class="woocommerce-Price-currencySymbol">
           ₼
          </span>
          1080.00
         </span>
        </span>
                    </li>
                </ul>
                <p class="woocommerce-mini-cart__total total">
                    <strong>
                        Subtotal:
                    </strong>
                    <span class="woocommerce-Price-amount amount">
        <span class="woocommerce-Price-currencySymbol">
         ₼
        </span>
        4398.00
       </span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <a class="th-btn style2 wc-forward" href="cart.html">
                        Səbətə bax
                    </a>
                    <a class="th-btn style2 checkout wc-forward" href="checkout.html">
                        &Ouml;dəni&scedil;
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose">
        <i class="far fa-times">
        </i>
    </button>
    <form action="#">
        <input placeholder="Yeməyə  nə axtarırsan?))" type="text"/>
        <button type="submit">
            <i class="fal fa-search">
            </i>
        </button>
    </form>
</div>
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle">
            <i class="fal fa-times">
            </i>
        </button>
        <div class="mobile-logo">
            <a href="{{ route('home') }}">
                <img alt="No1Kulinariya" src="assets/img/logo.svg"/>
            </a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li class="">
                    <a href="{{ route('home') }}">
                        ANA SƏH&Idot;FƏ
                    </a>

                </li>
                <li class="menu-item-has-children">
                    <a href="#">
                        MENYULAR
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="menu-grid.html">
                                Menu Grid View
                            </a>
                        </li>
                        <li>
                            <a href="menu-list.html">
                                Menu List View
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="about.html">
                        HAQQIMIZDA
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">
                        SƏH&Idot;FƏLƏR
                    </a>
                    <ul class="sub-menu">
                        <li class="menu-item-has-children">
                            <a href="#">
                                Ma&gbreve;aza
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="shop.html">
                                        Ma&gbreve;aza
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-details.html">
                                        Ma&gbreve;aza Details
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.html">
                                        Səbət Səhifəsi
                                    </a>
                                </li>
                                <li>
                                    <a href="checkout.html">
                                        &Ouml;dəni&scedil;
                                    </a>
                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        Se&ccedil;ilənlər
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="reservation.html">
                                Reservation
                            </a>
                        </li>
                        <li>
                            <a href="team.html">
                                A&scedil;pazlar&inodot;m&inodot;z
                            </a>
                        </li>
                        <li>
                            <a href="team-details.html">
                                A&scedil;paz Detallar&inodot;
                            </a>
                        </li>
                        <li>
                            <a href="gallery.html">
                                Qalereya
                            </a>
                        </li>
                        <li>
                            <a href="faq.html">
                                Suallar
                            </a>
                        </li>
                        <li>
                            <a href="testimonials.html">
                                Rəylər
                            </a>
                        </li>
                        <li>
                            <a href="error.html">
                                Səhifə Tap&inodot;lmad&inodot;
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">
                        Faydalı Məlumatlar
                    </a>
                </li>
                <li>
                    <a href="contact.html">
                        ƏLAQƏ
                    </a>
                </li>
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
                                <i class="far fa-location-dot">
                                </i>
                                28 May M/S Rus Plovoslar kilsəsinin yanı
                            </li>
                            <li class="d-none d-md-inline-block">
                                <i class="far fa-envelope-open">
                                </i>
                                <a href="mailto:info@no1kulinariya.com">
                                    info@no1kulinariya.com
                                </a>
                            </li>
                            <li class="d-none d-sm-inline-block">
                                <i class="far fa-clock">
                                </i>
                                &Idot;&scedil; saatlar&inodot;: Hər Gün 09:00 - 22:00
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-xxl-inline-block header-contact">
                                <i class="far fa-phone">
                                </i>
                                <a href="tel:994559711197">
                                    +994 55 971 11 97
                                </a>
                            </li>
                            <li>
                                <div class="th-social">
                                    <a href="https://www.facebook.com/">
                                        <i class="fab fa-facebook-f">
                                        </i>
                                    </a>
                                    <a href="https://www.twitter.com/">
                                        <i class="fab fa-tiktok">
                                        </i>
                                    </a>
                                    <a href="https://www.linkedin.com/">
                                        <i class="fab fa-instagram">
                                        </i>
                                    </a>
                                    <a href="https://www.whatsapp.com/">
                                        <i class="fab fa-whatsapp">
                                        </i>
                                    </a>
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
                            <a href="index-2.html">
                                <img alt="No1Kulinariya" src="assets/img/logo.svg"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li class="{{ route('home') }}">
                                    <a href="index-2.html">
                                        ANA SƏH&Idot;FƏ
                                    </a>
                                </li>
                                <li>
                                    <a href="about.html">
                                        HAQQIMIZDA
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        MENYU
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="menu-grid.html">
                                                Menu grid
                                            </a>
                                        </li>
                                        <li>
                                            <a href="menu-list.html">
                                                Menu List
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        Reseptlər
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                Ma&gbreve;aza
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop.html">
                                                        Ma&gbreve;aza
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-details.html">
                                                        Ma&gbreve;aza Details
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">
                                                        Səbət Səhifəsi
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html">
                                                        &Ouml;dəni&scedil;
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        Se&ccedil;ilənlər
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="reservation.html">
                                                Reservation
                                            </a>
                                        </li>
                                        <li>
                                            <a href="team.html">
                                                A&scedil;pazlar&inodot;m&inodot;z
                                            </a>
                                        </li>
                                        <li>
                                            <a href="team-details.html">
                                                A&scedil;paz Detallar&inodot;
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery.html">
                                                Qalereya
                                            </a>
                                        </li>
                                        <li>
                                            <a href="testimonials.html">
                                                Rəylər
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faq.html">
                                                Suallar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="error.html">
                                                Səhifə Tap&inodot;lmad&inodot;
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Faydalı Məlumatlar
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        ƏLAQƏ
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header-button d-flex d-lg-none">
                            <button class="icon-btn sideMenuToggler" type="button">
          <span class="badge">
           5
          </span>
                                <i class="fa-regular fa-cart-shopping">
                                </i>
                            </button>
                            <button class="icon-btn th-menu-toggle" type="button">
                                <i class="far fa-bars">
                                </i>
                            </button>
                        </div>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">
                            <button class="icon-btn searchBoxToggler" type="button">
                                <i class="far fa-search">
                                </i>
                            </button>
                            <button class="icon-btn sideMenuToggler" type="button">
          <span class="badge">
           5
          </span>
                                <i class="fa-regular fa-cart-shopping">
                                </i>
                            </button>
                            <a class="th-btn btn-mask" href="reservation.html">
                                isti-isti sifariş et
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



@yield('content')


<footer class="footer-wrapper footer-layout1 space-top">
    <div class="shape-mockup jump d-none d-xxl-block" data-left="0" data-top="0">
        <img alt="img" src="assets/img/icon/footer-1-1.png"/>
    </div>
    <div class="shape-mockup" data-left="0" data-top="0">
        <img alt="img" src="assets/img/icon/footer-1-11.png"/>
    </div>
    <div class="shape-mockup movingX d-none d-xxl-block" data-left="40%" data-top="0">
        <img alt="img" src="assets/img/icon/footer-1-2.png"/>
    </div>
    <div class="shape-mockup" data-left="40%" data-top="0">
        <img alt="img" src="assets/img/icon/footer-1-22.png"/>
    </div>
    <div class="shape-mockup jump-reverse d-none d-xxl-block" data-right="0%" data-top="-5%">
        <img alt="img" src="assets/img/icon/footer-1-3.png"/>
    </div>
    <div class="shape-mockup d-none d-xxl-block" data-right="0%" data-top="0">
        <img alt="img" src="assets/img/icon/footer-1-33.png"/>
    </div>
    <div class="shape-mockup d-none d-xxl-block" data-bottom="6%" data-right="0%">
        <img alt="img" src="assets/img/icon/footer-1-4.png"/>
    </div>
    <div class="shape-mockup d-none d-xxl-block" data-bottom="4%" data-left="0%">
        <img alt="img" src="assets/img/icon/footer-1-5.png"/>
    </div>
    <div class="container">
        <div class="footer-logo">
            <div class="footer-border left">
            </div>
            <a href="{{ route('home') }}">
                <img alt="No1Kulinariya" src="assets/img/logo-white.svg"/>
            </a>
            <div class="footer-border right">
            </div>
        </div>
        <div class="widget-area">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">
                            Faydal&inodot; ke&ccedil;idlər
                        </h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li>
                                    <a href="about.html">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Tariximiz
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Xidmətlərimiz
                                    </a>
                                </li>
                                <li>
                                    <a href="blog.html">
                                        Sevimli məkan
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Bizimlə əlaqə
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Məxfilik siyasəti
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="widget widget_info footer-widget">
                        <div class="opening-time">
                            <div class="event-info-mask" data-mask-src="assets/img/bg/footer-1-open-border.png">
                            </div>
                            <div class="content-wrap">
                                <div class="icon">
                                    <i class="fa-light fa-clock">
                                    </i>
                                </div>
                                <p class="top-text">
                                    Haz&inodot;rda a&ccedil;&inodot;&gbreve;&inodot;q!
                                </p>
                                <p class="opening-text">
                                    &Idot;&scedil; saatlar&inodot;: 8:00AM To 10:00PM
                                </p>
                                <p class="opening-text">
                                    &Idot;&scedil; saatlar&inodot;: 8:00AM To 10:00PM
                                </p>
                            </div>
                        </div>
                        <div class="th-social">
                            <a href="https://www.facebook.com/">
                                <i class="fab fa-facebook-f">
                                </i>
                            </a>
                            <a href="https://www.twitter.com/">
                                <i class="fab fa-twitter">
                                </i>
                            </a>
                            <a href="https://www.linkedin.com/">
                                <i class="fab fa-linkedin-in">
                                </i>
                            </a>
                            <a href="https://www.whatsapp.com/">
                                <i class="fab fa-whatsapp">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="widget widget_nav_menu footer-widget favorite-menu">
                        <h3 class="widget_title">
                            Sevimli menyular
                        </h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li>
                                    <a href="contact.html">
                                        Burgers
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        X&inodot;rt&inodot;ldayan dadlar
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Səhər yeməyi menyusu
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Desertlər
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        U&scedil;aq menyular&inodot;
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        &Idot;&ccedil;kilər
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text">
                        M&uuml;əllif h&uuml;quqlar&inodot;
                        <i class="fal fa-copyright">
                        </i>
                        2025
                        <a href="index-2.html">
                            No1Kulinariya
                        </a>
                        B&uuml;t&uuml;n h&uuml;quqlar qorunur.
                    </p>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="footer-links">
                        <ul>
                            <li>
                                <a href="about.html">
                                    Məxfilik siyasəti
                                </a>
                            </li>
                            <li>
                                <a href="about.html">
                                    &Scedil;ərtlər və qaydalar
                                </a>
                            </li>
                            <li>
                                <a href="about.html">
                                    Dəstək siyasəti
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="scroll-top">
    <svg class="progress-circle svg-content" height="100%" viewbox="-1 -1 102 102" width="100%">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>
<script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/js/lenis.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
