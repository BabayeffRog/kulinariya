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
                                <h2 class="sec-title text-anime-style-2 mb-50">Dadlı <span class="text-theme">Reseptlər</span></h2>

                                {{-- Tabs: kateqoriyalar --}}
                                <ul class="nav nav-tabs mt-4 mb-50 wow fadeinup" id="menuTabs" role="tablist">
                                    @foreach($categories as $idx => $cat)
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
                                    @forelse($cat->recipes as $recipe)
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="food-card-1 style-2 wow fadeinup" data-wow-delay=".1s">
                                                <div class="thumb">
                                                    <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>

                                                    {{-- Şəkil: public disk istifadə edirsənsə Storage::url --}}
                                                    @php
                                                        $img = $recipe->image
                                                            ? (Str::startsWith($recipe->image, ['http://','https://'])
                                                                ? $recipe->image
                                                                : Storage::url($recipe->image))
                                                            : asset('assets/img/food/placeholder.png');
                                                    @endphp
                                                    <img src="{{ $img }}" alt="{{ $recipe->title }}">

                                                    <div class="actions">
                                                        <a href="{{ route('recipes.show', $recipe->slug) }}" class="icon-btn" title="Bax"><i class="far fa-eye"></i></a>
                                                        {{-- istəsən sevimli/səbət ikonlarını öz loqikanla bağla --}}
                                                        <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                                    </div>
                                                </div>

                                                <div class="content">
                                                    {{-- Qiymət yoxdursa bu hissəni dəyiş: burada views göstərə bilərik --}}
                                                    <h4 class="price">{{ number_format($recipe->views_count ?? 0) }} baxış</h4>

                                                    <h4 class="box-title">
                                                        <a href="{{ route('recipes.show', $recipe->slug) }}">{{ Str::limit($recipe->title, 60) }}</a>
                                                    </h4>

                                                    <p class="box-text">
                                                        {{ Str::limit($recipe->meta_description ?? strip_tags($recipe->instructions ?? ''), 90) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p class="text-center text-muted">Bu kateqoriyada hələ resept yoxdur.</p>
                                        </div>
                                    @endforelse
                                </div>

                                {{-- Daha çox → kateqoriya səhifəsinə keçid (əgər ayrıca route varsa) --}}
                                {{-- <div class="text-center pt-4">
                                  <a href="{{ route('categories.show', $cat->slug) }}" class="th-btn btn-mask">Daha çox göstər</a>
                                </div> --}}
                            </div>
                        @empty
                            <div class="alert alert-info">Kateqoriya tapılmadı.</div>
                        @endforelse
                    </div>

                </div>
            </div>

            {{-- Pagination: Tabs-li eyni səhifədə çətin olduğundan gizlədildi.
                 Əgər hər kateqoriyanın ayrıca səhifəsi olacaqsa, burada klassik paginate istifadə etmək olar. --}}
        </div>
    </section>

@endsection
