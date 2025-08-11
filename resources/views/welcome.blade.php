@extends('layouts.app')
@section('content')
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
<div class="th-hero-wrapper hero-1 bg-smoke" id="hero">
    <div class="hero-img-shape-1">
        <div class="logo-icon-wrap">
            <div class="logo-icon">
                <h4 class="order">
                    <a href="{{ route('home') }}">
                       Sifariş Et
                    </a>
                    </a>
                </h4>
            </div>
            <div class="logo-icon-wrap__text">
      <span class="logo-animation">
       İsti İsti İsti İsti İsti İsti İsti İsti
      </span>
            </div>
        </div>
    </div>
    <div class="shape-mockup d-none d-xl-block movingX" data-right="5%" data-top="0%">
        <img alt="img" src="assets/img/icon/hero-1-1.png"/>
    </div>
    <div class="shape-mockup hero-shape-1-2 gsap-scroll-rotate" data-left="1%" data-top="14%">
        <img alt="img" src="assets/img/icon/hero-1-2.png"/>
    </div>
    <div class="shape-mockup jump-reverse hero-shape-1-3" data-right="2%" data-top="13%">
        <img alt="img" src="assets/img/icon/hero-1-3.png"/>
    </div>
    <div class="shape-mockup movingX" data-bottom="0%" data-left="5%">
        <img alt="img" src="assets/img/icon/hero-1-4.png"/>
    </div>
    <div class="shape-mockup jump hero-shape-1-5" data-bottom="0%" data-right="0%">
        <img alt="img" src="assets/img/icon/hero-1-5.png"/>
    </div>
    <div class="hero-1-bg">
        <img alt="img" src="assets/img/bg/hero-1-bg.png"/>
    </div>
    <div class="hero-inner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="hero-style1">
        <span class="sub-title gsap-scale-down-fade">
         No1 Kulinariya
        </span>
                        <h1 class="hero-title text-anime-style-2">Ad Bizim Dad Sizin!</h1>
                        <div class="hero-img1 gsap-scale-up-fade">
                            <img alt="Image" src="assets/img/hero/hero-img.png"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="space overflow-hidden space-extra-bottom">
    <div class="container">
        <div class="title-area text-center mb-60">
     <span class="sub-title text-anime-style-1">
      Qida kateqoriyas&inodot;
     </span>
            <h2 class="sec-title text-anime-style-2">
                Dadlı Şirniyyatlar
                <span class="text-theme">
       Kateqoriya
      </span>
            </h2>
            <img alt="img" class="img-anime-style-1" src="assets/img/icon/title-shape.png"/>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider" data-slider-options='{"autoplay":true,"loop":true,"breakpoints":{"0":{"slidesPerView":1},"400":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}' id="catSlider1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-1.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="shop.html">
                                    Domino Pitsa
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                25 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-2.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="shop.html">
                                    Qrildə Toyuq
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                22 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-3.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('home') }}">
                                    Ləzzətli Burger
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                23 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-4.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="shop.html">
                                    Qutu Menyular
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                22 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-5.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('home') }}">
                                    Combo yeməklərimiz
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                20 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-1.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('home') }}">
                                    Domino Pitsa
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                25 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-2.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('home') }}">
                                    Qrildə Toyuq
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                22 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-3.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('home') }}">
                                    Ləzzətli Burger
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                23 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-4.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('home') }}">
                                    Qutu Menyular
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                22 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="Image" src="assets/img/category/category_1-5.png"/>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('home') }}">
                                    Combo yeməklərimiz
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                20 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-arrow slider-prev" data-slider-prev="#catSlider1">
                <img alt="" src="assets/img/icon/left-arrow.svg"/>
            </button>
            <button class="slider-arrow slider-next" data-slider-next="#catSlider1">
                <img alt="" src="assets/img/icon/right-arrow.svg"/>
            </button>
        </div>
    </div>
</section>
<section class="food-sec-1 space bg-smoke overflow-hidden">
    <div class="container">
        <div class="row gy-40">
            <div class="title-area text-center mb-60">
      <span class="sub-title text-anime-style-1">
       Fast foodlar&inodot;m&inodot;z
      </span>
                <h2 class="sec-title text-anime-style-2">
                    Dadl&inodot;
                    <span class="text-theme">
        yeməklərimiz
       </span>
                </h2>
                <img alt="img" class="img-anime-style-1" src="assets/img/icon/title-shape.png"/>
            </div>
        </div>
        <div class="row gy-30">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="food-card-1 wow fadeinleft" data-wow-delay=".2s">
                    <div class="thumb">
                        <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png">
                        </div>
                        <img alt="Image" src="assets/img/food/food-1-1.png"/>
                        <div class="actions">
                            <a class="icon-btn" href="{{ route('home') }}">
                                <i class="far fa-cart-plus">
                                </i>
                            </a>
                            <a class="icon-btn" href="{{ route('home') }}">
                                <i class="far fa-heart">
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h4 class="price">
                            ₼26.00
                        </h4>
                        <h4 class="box-title">
                            <a href="{{ route('home') }}">
                                Ləzzətli Qara Burger
                            </a>
                        </h4>
                        <p class="box-text">
                            At the heart of our kitchen are bold flavors, high-quality ingredients
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="food-card-1 wow fadeinleft" data-wow-delay=".4s">
                    <div class="thumb">
                        <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png">
                        </div>
                        <img alt="Image" src="assets/img/food/food-1-2.png"/>
                        <div class="actions">
                            <a class="icon-btn" href="cart.html">
                                <i class="far fa-cart-plus">
                                </i>
                            </a>
                            <a class="icon-btn" href="wishlist.html">
                                <i class="far fa-heart">
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h4 class="price">
                            ₼20.00
                        </h4>
                        <h4 class="box-title">
                            <a href="shop-details.html">
                                Ac&inodot;l&inodot; Mal Əti Burgeri
                            </a>
                        </h4>
                        <p class="box-text">
                            At the heart of our kitchen are bold flavors, high-quality ingredients
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="food-card-1 wow fadeinright" data-wow-delay=".6s">
                    <div class="thumb">
                        <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png">
                        </div>
                        <img alt="Image" src="assets/img/food/food-1-3.png"/>
                        <div class="actions">
                            <a class="icon-btn" href="cart.html">
                                <i class="far fa-cart-plus">
                                </i>
                            </a>
                            <a class="icon-btn" href="wishlist.html">
                                <i class="far fa-heart">
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h4 class="price">
                            ₼16.00
                        </h4>
                        <h4 class="box-title">
                            <a href="shop-details.html">
                                Q&inodot;z&inodot;l X&inodot;rt-x&inodot;rt Kartof
                            </a>
                        </h4>
                        <p class="box-text">
                            At the heart of our kitchen are bold flavors, high-quality ingredients
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="food-card-1 wow fadeinright" data-wow-delay=".8s">
                    <div class="thumb">
                        <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png">
                        </div>
                        <img alt="Image" src="assets/img/food/food-1-4.png"/>
                        <div class="actions">
                            <a class="icon-btn" href="cart.html">
                                <i class="far fa-cart-plus">
                                </i>
                            </a>
                            <a class="icon-btn" href="wishlist.html">
                                <i class="far fa-heart">
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h4 class="price">
                            ₼36.00
                        </h4>
                        <h4 class="box-title">
                            <a href="shop-details.html">
                                Tur&scedil;umsu Qril Sendvi&ccedil;
                            </a>
                        </h4>
                        <p class="box-text">
                            At the heart of our kitchen are bold flavors, high-quality ingredients
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="menu-sec1 space-top overflow-hidden" id="menu-sec">
    <div class="container">
        <div class="title-area text-center mb-40">
     <span class="sub-title text-anime-style-1">
      Menyu kart&inodot;
     </span>
            <h2 class="sec-title text-anime-style-2">
                Fast foodlar&inodot;m&inodot;z
                <span class="text-theme">
       Menyu kart&inodot;
      </span>
            </h2>
            <img alt="img" class="img-anime-style-1" src="assets/img/icon/title-shape.png"/>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-3">
                <div class="menu-img-1-1 gsap-scroll-float-down2">
                    <img alt="img" src="assets/img/menu/menu-1-1.jpg"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="menu-1-content-wrap ps-xl-3 pe-xl-5">
                    <ul class="nav nav-tabs wow fadeinup" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button aria-controls="event-creating" aria-selected="true" class="nav-link active" data-bs-target="#event-creating" data-bs-toggle="tab" id="event-creating-tab" role="tab" type="button">
                                Tədbir menyusu
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button aria-controls="meal-plans" aria-selected="false" class="nav-link" data-bs-target="#meal-plans" data-bs-toggle="tab" id="meal-plans-tab" role="tab" type="button">
                                Qidalanma planlar&inodot;
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button aria-controls="food-delivery" aria-selected="false" class="nav-link" data-bs-target="#food-delivery" data-bs-toggle="tab" id="food-delivery-tab" role="tab" type="button">
                                &Ccedil;atd&inodot;r&inodot;lma
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button aria-controls="diet-plans" aria-selected="false" class="nav-link" data-bs-target="#diet-plans" data-bs-toggle="tab" id="diet-plans-tab" role="tab" type="button">
                                Pəhriz planlar&inodot;
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div aria-labelledby="event-creating-tab" class="tab-pane fade show active" id="event-creating" role="tabpanel">
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-1.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                &Scedil;&uuml;y&uuml;d souslu qril somon
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            40
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-2.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Tərəvəzli rostbif
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            60
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-3.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Marrake&scedil; veqan k&ouml;ri
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            30
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-4.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Ac&inodot;l&inodot; veqan kartof k&ouml;risi
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            50
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-5.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Kremli almal&inodot; piroq
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            80
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-6.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Frans&inodot;z so&gbreve;an &scedil;orbas&inodot;
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            28
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="meal-plans-tab" class="tab-pane fade" id="meal-plans" role="tabpanel">
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-1.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                &Scedil;&uuml;y&uuml;d souslu qril somon
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            40
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-2.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Tərəvəzli rostbif
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            60
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-3.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Marrake&scedil; veqan k&ouml;ri
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            30
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-4.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Ac&inodot;l&inodot; veqan kartof k&ouml;risi
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            50
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-5.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Kremli almal&inodot; piroq
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            80
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-6.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Frans&inodot;z so&gbreve;an &scedil;orbas&inodot;
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            28
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="food-delivery-tab" class="tab-pane fade" id="food-delivery" role="tabpanel">
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-1.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                &Scedil;&uuml;y&uuml;d souslu qril somon
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            40
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-2.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Tərəvəzli rostbif
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            60
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-3.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Marrake&scedil; veqan k&ouml;ri
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            30
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-4.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Ac&inodot;l&inodot; veqan kartof k&ouml;risi
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            50
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-5.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Kremli almal&inodot; piroq
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            80
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-6.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Frans&inodot;z so&gbreve;an &scedil;orbas&inodot;
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            28
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="diet-plans-tab" class="tab-pane fade" id="diet-plans" role="tabpanel">
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-1.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                &Scedil;&uuml;y&uuml;d souslu qril somon
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            40
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-2.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Tərəvəzli rostbif
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            60
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-3.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Marrake&scedil; veqan k&ouml;ri
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            30
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-4.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Ac&inodot;l&inodot; veqan kartof k&ouml;risi
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            50
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-5.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Kremli almal&inodot; piroq
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            80
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg">
                                    <img alt="img" src="assets/img/menu/menu-1-item-1-6.jpg"/>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="box-title">
                                            <a href="shop-details.html">
                                                Frans&inodot;z so&gbreve;an &scedil;orbas&inodot;
                                            </a>
                                        </h3>
                                        <p class="box-text">
                                            &Scedil;irinlə&scedil;dirilmi&scedil; yersəməni, tr&uuml;f
                                        </p>
                                    </div>
                                    <div class="right">
                                        <h4 class="price">
             <span>
              ₼
             </span>
                                            28
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="menu-img-1-2 gsap-scroll-float-up">
                    <img alt="img" src="assets/img/menu/menu-1-2.jpg"/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gallery-sec-1 space bg-smoke overflow-hidden">
    <div class="container">
        <div class="title-area secTitle-gsap-anim-1 text-center mb-60">
     <span class="sub-title text-anime-style-1">
      Our Food Qalereya
     </span>
            <h2 class="sec-title text-anime-style-2">
                Toy Tortları
                <span class="text-theme">
       Qalereya
      </span>
            </h2>
            <img alt="img" class="img-anime-style-1" src="assets/img/icon/title-shape.png"/>
        </div>
        <div class="slider-area">
            <div class="slider-area-wrap" data-mask-src="assets/img/bg/gallery-1-mask.png">
                <div class="swiper th-slider has-shadow gallery-1-slider" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}, "loop":true, "autoHeight": "true"}' id="gallerySlider1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="gallery-thumb-1">
                                <img alt="Gallery Image" src="assets/img/gallery/gallery_1_1.png"/>
                                <a class="gallery-btn popup-image" href="assets/img/gallery/gallery_1_1.png">
                                    <img alt="img" src="assets/img/icon/plus-icon.svg"/>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-thumb-1">
                                <img alt="Gallery Image" src="assets/img/gallery/gallery_1_2.png"/>
                                <a class="gallery-btn popup-image" href="assets/img/gallery/gallery_1_2.png">
                                    <img alt="img" src="assets/img/icon/plus-icon.svg"/>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-thumb-1">
                                <img alt="Gallery Image" src="assets/img/gallery/gallery_1_3.png"/>
                                <a class="gallery-btn popup-image" href="assets/img/gallery/gallery_1_3.png">
                                    <img alt="img" src="assets/img/icon/plus-icon.svg"/>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-thumb-1">
                                <img alt="Gallery Image" src="assets/img/gallery/gallery_1_4.png"/>
                                <a class="gallery-btn popup-image" href="assets/img/gallery/gallery_1_4.png">
                                    <img alt="img" src="assets/img/icon/plus-icon.svg"/>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-thumb-1">
                                <img alt="Gallery Image" src="assets/img/gallery/gallery_1_5.png"/>
                                <a class="gallery-btn popup-image" href="assets/img/gallery/gallery_1_5.png">
                                    <img alt="img" src="assets/img/icon/plus-icon.svg"/>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-thumb-1">
                                <img alt="Gallery Image" src="assets/img/gallery/gallery_1_3.png"/>
                                <a class="gallery-btn popup-image" href="assets/img/gallery/gallery_1_3.png">
                                    <img alt="img" src="assets/img/icon/plus-icon.svg"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-arrow slider-prev" data-slider-prev="#gallerySlider1">
                <img alt="" src="assets/img/icon/left-arrow.svg"/>
            </button>
            <button class="slider-arrow slider-next" data-slider-next="#gallerySlider1">
                <img alt="" src="assets/img/icon/right-arrow.svg"/>
            </button>
        </div>
    </div>
</div>
<section class="coming-soon-sec-1 bg-theme3 overflow-hidden">
    <img alt="img" class="round-shape-top" src="assets/img/shape/shape-top-smoke.png"/>
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-xl-4 col-lg-4">
                <div class="coming-left">
                    <img alt="img" src="assets/img/coming/coming-left-1.png"/>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="coming-soon">
                    <h5 class="coming-top-title text-anime-style-2">
                        endirim
                        <span>
         50%
        </span>
                        qədər
                    </h5>
                    <h2 class="coming-middle-title text-anime-style-1">
        <span>
         Super
        </span>
                        Ləzzətli
                    </h2>
                    <h2 class="coming-title text-anime-style-1">
                        Burger
                    </h2>
                    <div class="upcoming-counter-wrap">
                        <p class="box-text wow fadeinleft" data-wow-delay=".3s">
                            Məhdud m&uuml;ddətli təklif
                        </p>
                        <ul class="upcoming-counter counter-list" data-offer-date="07/03/2029">
                            <li class="wow fadeinup" data-wow-delay=".4s">
                                <div class="day count-number">
                                    00
                                </div>
                                <span class="count-name">
           G&uuml;n
          </span>
                            </li>
                            <li class="wow fadeinup" data-wow-delay=".5s">
                                <div class="hour count-number">
                                    00
                                </div>
                                <span class="count-name">
           Saat
          </span>
                            </li>
                            <li class="wow fadeinup" data-wow-delay=".6s">
                                <div class="minute count-number">
                                    00
                                </div>
                                <span class="count-name">
           Dəqiqə
          </span>
                            </li>
                            <li class="wow fadeinup" data-wow-delay=".7s">
                                <div class="seconds count-number">
                                    00
                                </div>
                                <span class="count-name">
           Saniyə
          </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="coming-right wow fadeinright">
                    <img alt="img" src="assets/img/coming/coming-right.png"/>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testi-area-1 space-bottom overflow-hidden" id="testi-sec">
    <div class="shape-mockup d-none d-xxl-block jump-reverse" style="top: 2%; left: 0%;">
        <img alt="img" src="assets/img/icon/hero-1-3.png"/>
    </div>
    <div class="shape-mockup d-none d-xxl-block jump" style="top: 10%; right: 0%;">
        <img alt="img" src="assets/img/icon/testi-top-1-1.png"/>
    </div>
    <div class="shape-mockup d-none d-xxl-block jump" style="bottom: 2%; left: 0%;">
        <img alt="img" src="assets/img/icon/testi-top-1-2.png"/>
    </div>
    <div class="container">
        <div class="title-area text-center mb-60">
     <span class="sub-title text-anime-style-1">
      Rəylər
     </span>
            <h2 class="sec-title text-anime-style-2">
                M&uuml;&scedil;təri
                <span class="text-theme">
       rəyləri
      </span>
            </h2>
            <img alt="img" class="img-anime-style-1" src="assets/img/icon/title-shape.png"/>
        </div>
        <div class="row gy-40 gx-30">
            <div class="col-xl-6">
                <div class="testi-1-item wow fadeinleft" data-wow-delay=".3s">
                    <div class="client-thumb">
                        <img alt="img" src="assets/img/testimonial/testi-1-1.png"/>
                    </div>
                    <div class="content">
                        <img alt="icon" class="testi-1-quote" src="assets/img/icon/testi-1-quote.png"/>
                        <p class="box-text">
                            &ldquo;Hər pitsa hər g&uuml;n təzə yo&gbreve;rulan xəmirdən ba&scedil;lay&inodot;r; &uuml;zərinə yeti&scedil;mi&scedil; pomidorlardan və gizli ot qar&inodot;&scedil;&inodot;&gbreve;&inodot;m&inodot;zdan haz&inodot;rlanan imza sousu &ccedil;əkilir.&rdquo;
                        </p>
                    </div>
                    <div class="bottom">
                        <h4 class="box-title">
                            Victoria Wotton
                        </h4>
                        <p>
                            Fementum Odio Co.
                        </p>
                        <div class="th-social">
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="testi-1-item wow fadeinright" data-wow-delay=".3s">
                    <div class="client-thumb">
                        <img alt="img" src="assets/img/testimonial/testi-1-2.png"/>
                    </div>
                    <div class="content">
                        <img alt="icon" class="testi-1-quote" src="assets/img/icon/testi-1-quote.png"/>
                        <p class="box-text">
                            &ldquo;Hər pitsan&inodot;n əsas&inodot; təzə yo&gbreve;rulmu&scedil; xəmirdir; &uuml;st&uuml;nə &scedil;irəli pomidorlardan və x&uuml;susi ot reseptimizdən haz&inodot;rlanan ev sousu əlavə olunur.&rdquo;
                        </p>
                    </div>
                    <div class="bottom">
                        <h4 class="box-title">
                            Emma Mia
                        </h4>
                        <p>
                            Fementum Odio Co.
                        </p>
                        <div class="th-social">
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                            <i class="fa-solid fa-star">
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="space bg-smoke overflow-hidden" id="blog-sec">
    <div class="shape-mockup d-none d-xxl-block jump-reverse" style="top: 3%; left: 2%;">
        <img alt="img" src="assets/img/icon/blog-1-1.png"/>
    </div>
    <div class="shape-mockup d-none d-xxl-block jump" style="top: 3%; right: 2%;">
        <img alt="img" src="assets/img/icon/blog-1-2.png"/>
    </div>
    <div class="shape-mockup d-none d-xxl-block jump" style="bottom: 3%; right: 2%;">
        <img alt="img" src="assets/img/icon/blog-1-3.png"/>
    </div>
    <div class="container">
        <div class="title-area text-center mb-50">
     <span class="sub-title text-anime-style-1">
      Xəbərlər və bloq
     </span>
            <h2 class="sec-title text-anime-style-2">
                Ən son xəbərlər və
                <span class="text-theme">
       bloqlar
      </span>
            </h2>
            <img alt="img" class="img-anime-style-1" src="assets/img/icon/title-shape.png"/>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}, "autoHeight": "true"}' id="blogSlider1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img alt="blog image" src="assets/img/blog/blog_1_1.jpg"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a class="author" href="blog.html">
                                        <i class="fal fa-user">
                                        </i>
                                        Barlik By Malik
                                    </a>
                                    <a href="blog.html">
                                        <i class="fal fa-calendar">
                                        </i>
                                        12 April, 2025
                                    </a>
                                </div>
                                <h3 class="box-title">
                                    <a href="blog-details.html">
                                        Fast food do&gbreve;rudanm&inodot; daha sa&gbreve;lam olur? Bilməli olduqlar&inodot;n&inodot;z
                                    </a>
                                </h3>
                                <a class="th-btn btn-mask" href="blog-details.html">
                                    Daha &ccedil;ox oxu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img alt="blog image" src="assets/img/blog/blog_1_2.jpg"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a class="author" href="blog.html">
                                        <i class="fal fa-user">
                                        </i>
                                        Barlik By Malik
                                    </a>
                                    <a href="blog.html">
                                        <i class="fal fa-calendar">
                                        </i>
                                        16 March, 2025
                                    </a>
                                </div>
                                <h3 class="box-title">
                                    <a href="blog-details.html">
                                        Fast food daha sa&gbreve;lam olurmu? Biz nələri edirik
                                    </a>
                                </h3>
                                <a class="th-btn btn-mask" href="blog-details.html">
                                    Daha &ccedil;ox oxu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img alt="blog image" src="assets/img/blog/blog_1_3.jpg"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a class="author" href="blog.html">
                                        <i class="fal fa-user">
                                        </i>
                                        Barlik By Malik
                                    </a>
                                    <a href="blog.html">
                                        <i class="fal fa-calendar">
                                        </i>
                                        17 June, 2025
                                    </a>
                                </div>
                                <h3 class="box-title">
                                    <a href="blog-details.html">
                                        Sa&gbreve;lam fast food: mif, yoxsa reall&inodot;q? Həqiqət budur
                                    </a>
                                </h3>
                                <a class="th-btn btn-mask" href="blog-details.html">
                                    Daha &ccedil;ox oxu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img alt="blog image" src="assets/img/blog/blog_1_1.jpg"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a class="author" href="blog.html">
                                        <i class="fal fa-user">
                                        </i>
                                        Barlik By Malik
                                    </a>
                                    <a href="blog.html">
                                        <i class="fal fa-calendar">
                                        </i>
                                        12 April, 2025
                                    </a>
                                </div>
                                <h3 class="box-title">
                                    <a href="blog-details.html">
                                        Fast food do&gbreve;rudanm&inodot; daha sa&gbreve;lam olur? Bilməli olduqlar&inodot;n&inodot;z
                                    </a>
                                </h3>
                                <a class="th-btn btn-mask" href="blog-details.html">
                                    Daha &ccedil;ox oxu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img alt="blog image" src="assets/img/blog/blog_1_2.jpg"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a class="author" href="blog.html">
                                        <i class="fal fa-user">
                                        </i>
                                        Barlik By Malik
                                    </a>
                                    <a href="blog.html">
                                        <i class="fal fa-calendar">
                                        </i>
                                        17 June, 2025
                                    </a>
                                </div>
                                <h3 class="box-title">
                                    <a href="blog-details.html">
                                        Fast food daha sa&gbreve;lam olurmu? Biz nələri edirik
                                    </a>
                                </h3>
                                <a class="th-btn btn-mask" href="blog-details.html">
                                    Daha &ccedil;ox oxu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img alt="blog image" src="assets/img/blog/blog_1_3.jpg"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a class="author" href="blog.html">
                                        <i class="fal fa-user">
                                        </i>
                                        Barlik By Malik
                                    </a>
                                    <a href="blog.html">
                                        <i class="fal fa-calendar">
                                        </i>
                                        12 April, 2025
                                    </a>
                                </div>
                                <h3 class="box-title">
                                    <a href="blog-details.html">
                                        Sa&gbreve;lam fast food: mif, yoxsa reall&inodot;q? Həqiqət budur
                                    </a>
                                </h3>
                                <a class="th-btn btn-mask" href="blog-details.html">
                                    Daha &ccedil;ox oxu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-arrow slider-prev" data-slider-prev="#blogSlider1">
                <img alt="" src="assets/img/icon/left-arrow.svg"/>
            </button>
            <button class="slider-arrow slider-next" data-slider-next="#blogSlider1">
                <img alt="" src="assets/img/icon/right-arrow.svg"/>
            </button>
        </div>
    </div>
</section>
<section class="cta-area-1 bg-theme4 overflow-hidden">
    <div class="shape-mockup footer-bg-shape1-1 jump d-none d-xl-block" data-left="0" data-top="5%">
        <img alt="img" src="assets/img/icon/cta-1-top.png"/>
    </div>
    <img alt="img" class="round-shape-top" src="assets/img/shape/shape-top-smoke.png"/>
    <div class="cta-bg-1-1-wrap">
        <div class="cta-bg-1-1">
            <img alt="img" src="assets/img/bg/cta-bg-1-1.png"/>
        </div>
    </div>
    <div class="cta-1-shape-trangle">
    </div>
    <div class="cta-round-shape">
    </div>
    <div class="container z-index-common">
        <div class="row gy-30">
            <div class="col-xl-6 col-lg-6">
                <div class="cta-wrap1">
                    <div class="title-area me-xl-5 pe-xl-5 mb-0">
                        <h2 class="sec-title text-anime-style-1 text-white">
                            Subscribe to our newsletter &amp; Get 20% Off
                            <span class="text-theme">
          Fast Food Order
         </span>
                        </h2>
                        <p class="sec-text text-anime-style-2 text-title mt-30 mb-20 fw-medium">
                            Get all latest information on sales and qədərer
                        </p>
                        <form class="newsletter-form img-anime-style-1">
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your mail address...." required="" type="email"/>
                            </div>
                            <button class="th-btn style4 mt-0" type="submit">
                                ABUNƏ OL
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 align-self-end">
                <div class="cta-thumb1-1 text-center text-lg-end tilt-active wow fadeiright">
                    <img alt="img" src="assets/img/cta/cta-1-img.png"/>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
