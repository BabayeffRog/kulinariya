@extends('layouts.app')

@section('title', ($product->meta_title ?? $product->name) . ' | Kulinariya')
@section('meta_description', $product->meta_description ?? Str::limit(strip_tags($product->description ?? ''), 155))

@section('content')
    <section class="product-details space-top space-extra-bottom arrow-wrap">
        <div class="container">
            <div class="row gx-60">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="food-mask bg-mask" style="mask-image: url('{{ asset("assets/img/bg/menu-1-msk-bg.png") }}');"></div>
                        <div class="img">
                            <img src="{{ $product->images[0] ? asset('storage/'.$product->images[0]) : asset('assets/img/food/placeholder.png') }}"
                                 alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <h2 class="product-title">{{ $product->name }}</h2>

                        <p class="text pe-xl-5">{{ $product->description }}</p>

                        <p class="price">
                            {{ $product->currency }} {{ number_format($product->price, 2) }}
                        </p>

                        <div class="mt-2 link-inherit">
                            <p>
                                <strong class="text-title me-3">Availability:</strong>
                                <span class="stock {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                                {!! $product->stock > 0 ? '<i class="far fa-check-square me-2 ms-1"></i>In Stock' : 'Out of Stock' !!}
                            </span>
                            </p>
                        </div>

                        <!-- Ingredients -->
                        @if(!empty($product->ingredients))
                            <blockquote class="bg-white">
                                <p><strong>İnqrediyentlər:</strong></p>
                                <ul class="mb-0">
                                    @foreach($product->ingredients as $ing)
                                        <li>{{ $ing }}</li>
                                    @endforeach
                                </ul>
                            </blockquote>
                        @endif

                        <!-- Categories -->
                        <div class="product_meta mt-3">
                            <span class="sku_wrapper">SKU: <span class="sku">{{ $product->sku ?? 'N/A' }}</span></span>
                            <span class="posted_in">Categories:
                            @foreach($product->categories as $cat)
                                    <a href="/">{{ $cat->name }}</a>@if(!$loop->last),@endif
                                @endforeach
                        </span>
                        </div>

                        <!-- Actions -->
                        <div class="actions mt-4">
                            <div class="quantity">
                                <button class="quantity-minus qty-btn"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" class="qty-input" value="1" min="1" max="{{ $product->stock }}">
                                <button class="quantity-plus qty-btn"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <button class="th-btn style2">Add to Cart</button>
                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="space-extra-top mb-30">
                <h2 class="sec-title text-center">Related Products</h2>
                <div class="row">
                    @foreach($related as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="th-product product-grid">
                                <div class="product-img">
                                    <img src="{{ $item->images[0] ? asset('storage/'.$item->images[0]) : asset('assets/img/food/placeholder.png') }}"
                                         alt="{{ $item->name }}">
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title">
                                        <a href="{{ route('product.show', $item->slug) }}">{{ $item->name }}</a>
                                    </h3>
                                    <span class="price">{{ $item->currency }} {{ number_format($item->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
