@php use Illuminate\Support\Facades\Storage;use Illuminate\Support\Str; @endphp
@extends('layouts.app')

@section('content')

    <section class="food-sec-1 space overflow-hidden">
        <div class="container">
            <div class="row gy-30 justify-content-center">
                <div class="menu-1-content-wrap style-2 pt-0 border-0 ps-xl-3 pe-xl-5">

                    <div class="row">
                        <div class="col-12">
                            <div class="title-area text-center mb-2">
                                <span class="sub-title text-anime-style-1">No1 Kulinariya</span>
                                <h2 class="sec-title text-anime-style-2 mb-50">Dadlı <span
                                        class="text-theme">Məhsullar</span></h2>

                                {{-- Tabs: kateqoriyalar --}}
                                <ul class="nav nav-tabs mt-4 mb-50 wow fadeinup" id="menuTabs" role="tablist">
                                    @foreach($categories as $cat)
                                        @php
                                            $isActive = $cat->slug === $activeSlug;
                                        @endphp
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link th-btn btn-mask {{ $isActive ? 'active' : '' }}"
                                                id="tab-{{ $cat->slug }}"
                                                data-bs-toggle="tab"
                                                data-bs-target="#pane-{{ $cat->slug }}"
                                                type="button"
                                                role="tab"
                                                aria-controls="pane-{{ $cat->slug }}"
                                                aria-selected="{{ $isActive ? 'true' : 'false' }}"
                                            >
                                                {{ $cat->name }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Tab contents --}}
                    <div class="tab-content" id="menuTabContent">
                        @forelse($categories as $cat)
                            @php
                                $isActive = $cat->slug === $activeSlug;
                            @endphp

                            <div class="tab-pane fade {{ $isActive ? 'show active' : '' }}"
                                 id="pane-{{ $cat->slug }}"
                                 role="tabpanel"
                                 aria-labelledby="tab-{{ $cat->slug }}">
                                <div class="row gy-40">
                                    @forelse($cat->products as $product)

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="food-card-1 style-2 wow fadeinup" data-wow-delay=".1s">
                                                <div class="thumb">
                                                    <div class="food-mask"
                                                         data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>


                                                    <img src="{{ isset($product->images[0]) ? asset('storage/' . $product->images[0]) : asset('assets/img/food/placeholder.png') }}"
                                                         alt="{{ $product->name }}">
                                                    <div class="actions">
                                                        <a href="{{ route('product.show', $product->slug) }}"
                                                           class="icon-btn" title="Bax"><i class="far fa-eye"></i></a>
                                                        <a href="/" class="icon-btn" title="Səbətə at"><i
                                                                class="far fa-cart-plus"></i></a>
                                                        <a href="/" class="icon-btn" title="Sevimlilərə əlavə et"><i
                                                                class="far fa-heart"></i></a>
                                                    </div>
                                                </div>

                                                <div class="content">
                                                    {{-- Qiymət --}}
                                                    <h4 class="price">₼{{ number_format($product->price, 2) }}</h4>

                                                    <h4 class="box-title">
                                                        <a href="{{ route('product.show', $product->slug) }}">
                                                            {{ Str::limit($product->name, 60) }}
                                                        </a>
                                                    </h4>

                                                    <p class="box-text">
                                                        {{ Str::limit($product->description, 90) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p class="text-center text-muted">Bu kateqoriyada hələ məhsul yoxdur.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">Kateqoriya tapılmadı.</div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
