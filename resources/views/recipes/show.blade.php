@extends('layouts.app')

@section('title', ($recipe->meta_title ?? $recipe->title) . ' | Kulinariya')
@section('meta_description', $recipe->meta_description ?? Str::limit(strip_tags($recipe->instructions ?? ''), 155))

@section('content')
    <section class="th-blog-wrapper blog-details overflow-hidden space-top space-extra2-bottom">
        <div class="container">
            <div class="row gx-40">
                <!-- Main Content -->
                <div class="col-xxl-9 col-lg-8">
                    <div class="th-blog blog-single">
                        <div class="blog-img">
                            <img
                                src="{{ $cover ?: asset('assets/img/food/placeholder.png') }}"
                                alt="{{ $recipe->title }}">
                        </div>

                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="author"><i class="far fa-user"></i> {{ $recipe->author ?? 'Admin' }}</span>
                                <span><i class="fa-light fa-calendar"></i> {{ $recipe->created_at?->format('d M, Y') }}</span>
                                <span><i class="fa-regular fa-eye"></i> {{ number_format($recipe->views_count) }} baxış</span>
                                @if($recipe->servings)<span><i class="fa-regular fa-user-group"></i> {{ $recipe->servings }} nəfər</span>@endif
                            </div>

                            <h1 class="blog-title">{{ $recipe->title }}</h1>

                            {{-- Tərkib (inqrediyentlər) --}}
{{--                            @dd($recipe->ingredients)--}}
                            @if(!empty($recipe->ingredients))
                                <blockquote class="bg-white">
                                    <p><strong>İnqrediyentlər:</strong></p>
                                    <ul class="mb-0">
                                        @foreach($recipe->ingredients as $ing)
                                            <li>{{ $ing }}</li>
                                        @endforeach
                                    </ul>
                                </blockquote>
                            @endif

                            {{-- Təlimat --}}
                            @if($recipe->instructions)
                                <div class="mb-4">
                                    {!! nl2br(e($recipe->instructions)) !!}
                                </div>
                            @endif

                            {{-- Qalereya --}}
                            @if($gallery->isNotEmpty())
                                <div class="row gx-30 mt-30">
                                    @foreach($gallery as $img)
                                        <div class="col-md-4 mb-30">
                                            <div class="blog-radius-img">
                                                <img class="w-100" src="{{ $img }}" alt="{{ $recipe->title }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Tags & Share --}}
                            <div class="share-links clearfix mt-4">
                                <div class="row justify-content-between">
                                    <div class="col-md-auto">
                                        @if(!empty($recipe->tags))
                                            <span class="share-links-title">Tags:</span>
                                            <div class="tagcloud">
                                                @foreach($recipe->tags as $tag)
                                                    <a href="{{ route('recipes.search', ['q' => $tag]) }}">{{ $tag }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-auto text-xl-end">
                                        <span class="share-links-title">Paylaş:</span>
                                        @php $shareUrl = urlencode(url()->current()); $shareText = urlencode($recipe->title); @endphp
                                        <div class="th-social style2 align-items-center">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareText }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="https://t.me/share/url?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank"><i class="fab fa-telegram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Prev / Next --}}
                    <div class="blog-navigation">
                        @if($prev)
                            <a href="{{ route('recipes.show', $prev->slug) }}" class="nav-btn prev">
                                <div class="icon"><img src="{{ asset('assets/img/icon/left-arrow.svg') }}" alt="icon"></div>
                                <div class="title-wrap">
                                    <span class="nav-text">Öncəki resept</span>
                                    <span class="title">{{ Str::limit($prev->title, 70) }}</span>
                                </div>
                            </a>
                        @endif

                        @if($next)
                            <a href="{{ route('recipes.show', $next->slug) }}" class="nav-btn next">
                                <div class="icon"><img src="{{ asset('assets/img/icon/right-arrow.svg') }}" alt="icon"></div>
                                <div class="title-wrap">
                                    <span class="nav-text">Növbəti resept</span>
                                    <span class="title">{{ Str::limit($next->title, 70) }}</span>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-xxl-3 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <h3 class="widget_title">Axtar</h3>
                            <form class="search-form" action="{{ route('recipes.search') }}" method="GET">
                                <input type="text" name="q" value="{{ request('q') }}" placeholder="Axtarış...">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget widget_categories">
                            <h3 class="widget_title">Kateqoriyalar</h3>
                            <ul>
                                @foreach($categories as $c)
                                    <li>
                                        <a href="/">{{ $c->name }}</a>
                                        <span>({{ $c->recipes_count }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget">
                            <h3 class="widget_title">Son Reseptlər</h3>
                            <div class="recent-post-wrap">
                                @foreach($recent as $r)
                                    @php
                                        $rimg = $r->image
                                          ? (Str::startsWith($r->image, ['http://','https://']) ? $r->image : Storage::url($r->image))
                                          : asset('assets/img/food/placeholder-sm.jpg');
                                    @endphp
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="{{ route('recipes.show', $r->slug) }}">
                                                <img src="{{ $rimg }}" alt="{{ $r->title }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title">
                                                <a href="{{ route('recipes.show', $r->slug) }}">{{ Str::limit($r->title, 60) }}</a>
                                            </h4>
                                            <div class="recent-post-meta">
                                                <span><i class="far fa-calendar"></i> {{ $r->created_at?->format('d M, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if($tags->isNotEmpty())
                            <div class="widget widget_tag_cloud">
                                <h3 class="widget_title">Populyar Taglər</h3>
                                <div class="tagcloud">
                                    @foreach($tags as $t)
                                        <a href="{{ route('recipes.search', ['q' => $t]) }}">{{ $t }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="widget widget_banner" data-bg-src="{{ asset('assets/img/widget/sidebar-banner.jpg') }}">
                            <div class="widget-banner text-center">
                                <a href="{{ url('/contact') }}" class="th-btn btn-mask btn-sm style3">Sifariş et</a>
                                <p class="text-des">Dadlı reseptlər üçün bizi izləyin.</p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
