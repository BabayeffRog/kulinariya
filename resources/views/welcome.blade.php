@extends('layouts.app')
@section('content')


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
                        <h1 class="hero-title text-anime-style-2" style="color:#11A1AD;">Ad Bizim Dad Sizin!</h1>
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
                    @foreach($categories AS $cate)
                    <div class="swiper-slide">
                        <div class="category-card">
                            <img alt="img" class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"/>
                            <div class="box-icon">
                                <img alt="{{ $cate->name }}" src="{{ asset('storage/' . $cate->image) }}"/>
                            </div>
                            <h3 class="box-title">
                                <a href="shop.html">
                                    {{ $cate->name }}
                                </a>
                            </h3>
                            <p class="box-subtitle">
                                25 məhsul m&ouml;vcuddur
                            </p>
                        </div>
                    </div>
                    @endforeach
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
                <span class="sub-title text-anime-style-1" >Dadlı vitrinimiz</span>
                <h2 class="sec-title text-anime-style-2" style="color:red;">
                    İsti-İsti <span class="text-theme"> Hal Hazırda</span>
                </h2>
                <img class="img-anime-style-1" src="{{ asset('assets/img/icon/title-shape.png') }}" alt="img">
            </div>
        </div>

        @php $delay = 0.2; @endphp

        <div class="row gy-30">
            @forelse($products as $product)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="food-card-1 wow fadeinleft" data-wow-delay="{{ number_format($delay, 1) }}s">
                        <div class="thumb">
                            <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>

                            <img
                                src="{{ $product->image_url ? asset($product->image_url) : asset('assets/img/placeholder.png') }}"
                                alt="{{ $product->name }}">

                            <div class="actions">
                                <a class="icon-btn"
                                   href="{{ route('product.show', $product->slug) }}" title="Sifariş et">
                                    <i class="far fa-cart-plus"></i>
                                </a>
                                <a class="icon-btn"
                                   href="{{ route('product.show', $product->slug) }}" title="Bəyəndim">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                        </div>

                        <div class="content">
                            <h4 class="price">₼{{ number_format($product->price, 2) }}</h4>

                            <h4 class="box-title">
                                <a href="{{ route('product.show', $product->slug ?? $product->id) }}">
                                    {{ $product->name }}
                                </a>
                            </h4>

                            <p class="box-text">
                                {{ \Illuminate\Support\Str::limit($product->short_description ?? $product->description, 90) }}
                            </p>
                        </div>
                    </div>
                </div>

                @php $delay += 0.1; @endphp
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <p class="mb-1">Hazırda vitrin üçün məhsul yoxdur.</p>
                        <a href="{{ route('products') }}" class="btn btn-primary mt-2">Bütün məhsullara bax</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>


<div class="menu-sec1 space-top overflow-hidden" id="menu-sec">
    <div class="container">
        <div class="title-area text-center mb-40">
            <span class="sub-title text-anime-style-1">
                İçkilər
            </span>
            <h2 class="sec-title text-anime-style-2">
                Barlik By
                <span class="text-theme"> Malik</span>
            </h2>
            <img alt="img" class="img-anime-style-1" src="{{ asset('assets/img/icon/barlik-line.png') }}"/>
        </div>

        <div class="row gy-4 justify-content-center">
            <div class="col-lg-3">
                <div class="menu-img-1-1 gsap-scroll-float-down2">
                    <img alt="img" src="{{ asset('assets/img/menu/barlik.png') }}"/>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="menu-1-content-wrap ps-xl-3 pe-xl-5">

                    {{-- Tabs: alt kateqoriyalar --}}
                    <ul class="nav nav-tabs wow fadeinup" id="drinkTabs" role="tablist">
                        @foreach($drinks->children as $key => $subcategory)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $key==0 ? 'active' : '' }}"
                                        id="tab-{{ $subcategory->id }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#cat-{{ $subcategory->id }}"
                                        type="button" role="tab">
                                    {{ $subcategory->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Məhsullar --}}
                    <div class="tab-content" id="drinkTabContent">
                        @foreach($drinks->children as $key => $subcategory)
                            <div class="tab-pane fade {{ $key==0 ? 'show active' : '' }}"
                                 id="cat-{{ $subcategory->id }}" role="tabpanel">

                                @forelse($subcategory->products as $product)
                                    <div class="menu-item-1 wow fadeinup" data-wow-delay=".{{ $loop->iteration+2 }}s">
                                        <div class="thumb global-img" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.jpg') }}">
                                            <img alt="{{ $product->name }}"
                                                 src="{{ $product->images && isset($product->images[0])
                                                        ? asset('storage/'.$product->images[0])
                                                        : asset('assets/img/food/placeholder.png') }}">
                                        </div>
                                        <div class="content">
                                            <div class="left">
                                                <h3 class="box-title">
                                                    <a href="{{ route('products.show', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h3>
                                                <p class="box-text">{{ $product->description ?? '' }}</p>
                                            </div>
                                            <div class="right">
                                                <h4 class="price"><span>₼</span> {{ $product->price }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">Bu kateqoriyada məhsul yoxdur.</p>
                                @endforelse

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="menu-img-1-2 gsap-scroll-float-up">
                    <img alt="img" src="{{ asset('assets/img/menu/menu-1-2.jpg') }}"/>
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
                Ən son Reseptlər və
                <span class="text-theme">
       bloqlar
      </span>
            </h2>
            <img alt="img" class="img-anime-style-1" src="assets/img/icon/title-shape.png"/>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider"
                 id="recipeSlider1"
                 data-slider-options='{
            "breakpoints":{
                "0":{"slidesPerView":1},
                "576":{"slidesPerView":1},
                "768":{"slidesPerView":1},
                "992":{"slidesPerView":2},
                "1200":{"slidesPerView":3}
            },
            "autoHeight": true
         }'>
                <div class="swiper-wrapper">
                    @forelse($recipes as $r)
                        @php
                            $img = $r->image
                                ? (\Illuminate\Support\Str::startsWith($r->image, ['http://','https://'])
                                    ? $r->image
                                    : \Illuminate\Support\Facades\Storage::url($r->image))
                                : asset('assets/img/food/placeholder.jpg');
                            $author = $r->author ?: 'No1 Kulinariya';
                        @endphp

                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="{{ route('recipes.show', $r->slug) }}">
                                        <img src="{{ $img }}" alt="{{ $r->title }}">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a class="author" href="{{ route('home') }}">
                                            <i class="fal fa-user"></i> {{ $author }}
                                        </a>
                                        <span>
                                    <i class="fal fa-calendar"></i>
                                    {{ $r->created_at?->format('d M, Y') }}
                                </span>
                                    </div>

                                    <h3 class="box-title">
                                        <a href="{{ route('recipes.show', $r->slug) }}">
                                            {{ \Illuminate\Support\Str::limit($r->title, 80) }}
                                        </a>
                                    </h3>

                                    <a class="th-btn btn-mask" href="{{ route('recipes.show', $r->slug) }}">
                                        Ətraflı oxu
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">Hələlik resept yoxdur</h3>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <button class="slider-arrow slider-prev" data-slider-prev="#recipeSlider1">
                <img src="{{ asset('assets/img/icon/left-arrow.svg') }}" alt="prev">
            </button>
            <button class="slider-arrow slider-next" data-slider-next="#recipeSlider1">
                <img src="{{ asset('assets/img/icon/right-arrow.svg') }}" alt="next">
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
