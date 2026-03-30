@extends('layouts.app') 

@section('title', $seoData['title'])
@section('description', $seoData['description'])
@section('keywords', $seoData['keywords'])
@section('content')
<style>
.description {
    display: -webkit-box;       /* Flexbox for webkit */
    -webkit-line-clamp: 2;      /* Limit to 2 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;           /* Hide overflow */
    text-overflow: ellipsis;    /* Add … at the end */
}
</style>
<div class="main-bnr-2 overflow-hidden translate-y-[95px] max-xl:translate-y-[75px] mb-[90px]"></div>

<!-- Hero Section -->
<section class="bg-gray-100 py-16 lg:py-24">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-10">
            <div class="lg:w-1/2 text-center lg:text-left">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">{{ optional($banner)->title ?? '' }}</h1>
                <p class="text-gray-600 text-lg mb-6">
                    {{ optional($banner)->description ?? '' }}
                </p>
                <a href="#menu" class="btn btn-primary btn-hover-2 lg:py-[15px] xl:px-[30px] sm:py-[10px] py-[6px] px-3">
                  Order Now
                </a>
            </div>
            <div class="lg:w-1/2 flex justify-center">
                <img src="{{ optional($banner)->image 
            ? asset('storage/' . $banner->image) 
            : asset('assets/images/naan.png') }}" 
             alt="{{ optional($banner)->title ?? 'Fresh Naan' }}"  class="w-[420px] lg:w-[520px] object-contain drop-shadow-2xl mx-auto">
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<section id="menu" class="pt-0 lg:pb-[100px] pb-[50px] relative bg-white overflow-hidden">
    <div class="container">
        <div class="mb-[50px] max-xl:mb-[30px] relative mx-auto text-center">
            <h2 class="font-lobster">Our Menu</h2>
        </div>

        <div class="swiper-btn-lr">
            <div class="swiper portfolio-swiper">
                <div class="swiper-wrapper p-b5">

                    @foreach($menus as $menu)
                    <div class="swiper-slide">

                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1] active">

                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">

                                <img src="{{ asset('storage/' . $menu->image) }}"
                                     alt="{{ $menu->name }}"
                                     class="w-32 h-32 object-cover rounded-full group-hover:animate-spin">

                            </div>

                            <div class="mt-auto">
                                <h4 class="mb-2.5">{{ $menu->name }}</h4>
                                <p class="mb-2 description">{{ $menu->description }}</p>
                            </div>

                        </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>



<!-- Naan Twist Story Section -->
<section class="bg-gray-100 pb-[90px] lg:pb-[110px] pt-[40px] relative overflow-hidden">
    <div class="w-full px-6 lg:px-16">

        <!-- Heading -->
        <div class="text-center mb-16">
            <h3 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-3 font-lobster">
                Naan Twist
            </h3>

            <p class="text-gray-500 tracking-[4px] uppercase text-sm">
                Taste The Best Flavour Of India
            </p>

            <div class="flex justify-center mt-4">
                <img src="{{ asset('assets/images/floral.png') }}" class="h-8 opacity-80">
            </div>
        </div>

        <!-- Main Flex -->
      <div class="flex flex-col lg:flex-row items-center justify-between gap-y-10 lg:gap-16">

            <!-- Left Image -->
            <div class="w-full lg:w-[55%] flex justify-center mb-10 lg:mb-0">
                <div class="relative flex justify-center">

                    <!-- Glow Background -->
                    <div class="absolute w-[500px] h-[500px] bg-orange-200 rounded-full blur-3xl opacity-40"></div>

                    <!-- Food Image -->
                    <img 
                        src="{{ asset('assets/images/naanchap.png') }}"
                        class="relative w-[420px] sm:w-[500px] lg:w-[600px] xl:w-[700px] 2xl:w-[780px] object-contain drop-shadow-2xl"
                    >

                </div>
            </div>

            <!-- Right Content -->
            <div class="w-full lg:w-[45%] text-center lg:text-left 
                        pl-0 lg:pl-6
                        pr-6 md:pr-10 lg:pr-20 xl:pr-32 2xl:pr-40 
                        max-w-[600px]">

                <p class="text-gray-800 text-[17px] md:text-lg lg:text-[19px] 
                        leading-[1.9] tracking-[0.3px] font-normal 
                        antialiased subpixel-antialiased
                        max-w-[520px] mx-auto lg:mx-0">

                    Welcome to 
                    <span class="font-semibold text-orange-500">Naan Twist</span> —
                    where 
                    <span class="font-medium text-gray-900">
                        traditional Indian flavours
                    </span>
                    blend perfectly with
                    <span class="italic text-orange-500">
                        modern culinary creativity
                    </span>.

                    Every dish is freshly prepared using
                    <span class="font-medium text-gray-900">
                        authentic spices
                    </span>,
                    rich ingredients, and time-honored recipes that celebrate the
                    <span class="text-gray-900 font-medium">
                        true taste of India
                    </span>.

                    From
                    <span class="text-orange-500 font-medium">
                        sizzling starters
                    </span>
                    to our
                    <span class="text-orange-500 font-medium">
                        signature specials
                    </span>,
                    we transform every meal into a
                    <span class="font-semibold text-gray-900">
                        delightful and unforgettable dining experience
                    </span>.

                </p>

            </div>
        </div>
    </div>
</section>

<!-- Deals Section -->
<section class="pt-[70px] lg:pt-[100px] pb-[40px] lg:pb-[100px] relative">

    <div class="container">

        <div class="2xl:mb-[50px] mb-[25px] relative mx-auto text-center">
            <h2 class="font-lobster">From Our Deal</h2>
        </div>

        <div class="slider-frame relative">

            <div class="swiper menu-swiper">

                <div class="swiper-wrapper">

                    @foreach($deals as $deal)
                    <div class="swiper-slide">

                        <div class="slide-box">

                            <div class="dz-img-box2 group">

                                <div class="w-full min-w-full h-full">

                                    <img src="{{ asset('storage/' . $deal->image) }}"
                                         alt="{{ $deal->name }}"
                                         class="block w-full">

                                </div>

                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">

                                    <div class="info relative">
                                        <h5 class="mb-0">{{ $deal->name }}</h5>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    @endforeach

                </div>

            </div>

            <div class="swiper-nav">

                <div class="swiper-button-prev prev1 group hover:before:animate-spin">
                    <i class="fa-solid fa-arrow-left text-white group-hover:text-primary relative"></i>
                </div>

                <div class="swiper-button-next next1 group hover:before:animate-spin">
                    <i class="fa-solid fa-arrow-right text-white group-hover:text-primary relative"></i>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection