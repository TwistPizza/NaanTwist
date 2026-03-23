@extends('layouts.app') 
@section('title','Best Restaurant in Delhi | Naan Restaurant') 
@section('description','Naan Restaurant provides best Indian food in Delhi with fresh ingredients and fast service.') 
@section('keywords','restaurant in delhi, naan
restaurant, indian food') @section('content')

<div class="main-bnr-2 overflow-hidden translate-y-[95px] max-xl:translate-y-[75px] mb-[90px]"></div>

<section class="bg-gray-100 py-16 lg:py-24">

    <div class="container mx-auto px-4">

        <div class="flex flex-col lg:flex-row items-center gap-10">

            <!-- Left Content -->
            <div class="lg:w-1/2 text-center lg:text-left">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    Fresh Naan
                </h1>

                <p class="text-gray-600 text-lg mb-6">
                    Soft, fluffy and freshly baked naan made with authentic ingredients. Perfect with curries or enjoy it on its own.
                </p>

                <a href="#menu" class="inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                   View Menu
                </a>
            </div>

            <!-- Right Image -->
            <div class="lg:w-1/2 flex justify-center">
                <img src="assets/images/naan.png" alt="Fresh Butter Naan" class="w-[420px] lg:w-[520px] object-contain drop-shadow-2xl mx-auto">
            </div>

        </div>

    </div>

</section>
<section class="pt-0 lg:pb-[100px] pb-[70px] relative bg-white overflow-hidden">
    <div class="container">
        <div class="mb-[50px] max-xl:mb-[30px] relative mx-auto text-center">
            <h2 class="font-lobster">Our Menu</h2>
        </div>
        <div class="swiper-btn-lr">
            <div class="swiper portfolio-swiper">
                <div class="swiper-wrapper p-b5">
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1] active">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic1.jpg" alt="" class="rounded-full relative group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
											<a href="product-detail.html">
												Pizza
											</a>
										</h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$55.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1] active">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic2.jpg" alt="" class="rounded-full group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
											<a href="product-detail.html">
												Rice
											</a>
										</h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$50.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1] active">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic3.jpg" alt="" class="rounded-full group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
											<a href="product-detail.html">
												Green Salad
											</a>
										</h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$45.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1]">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic9.jpg" alt="" class="rounded-full group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
                                            <a href="product-detail.html">
                                                Aloo Sticks
                                            </a>
                                        </h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$36.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1]">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic4.jpg" alt="" class="rounded-full group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
                                            <a href="product-detail.html">
                                                Pasta
                                            </a>
                                        </h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$35.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1]">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic5.jpg" alt="" class="rounded-full group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
                                            <a href="product-detail.html">
                                                Momose
                                            </a>
                                        </h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$25.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1]">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic6.jpg" alt="" class="rounded-full group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
                                            <a href="product-detail.html">
                                                Panner
                                            </a>
                                        </h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$60.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="group rounded-lg menu-box box-hover text-center pt-10 px-5 pb-[30px] bg-white border border-grey-border hover:border-primary h-full flex duration-500 flex-col relative overflow-hidden z-[1]">
                            <div class="w-[150px] min-w-[150px] h-[150px] mt-0 mx-auto mb-[10px] rounded-full border-[9px] border-white duration-500 z-[1]">
                                <img src="assets/images/gallery/small/pic7.jpg" alt="" class="rounded-full group-hover:animate-spin">
                            </div>
                            <div class="mt-auto">
                                <h4 class="mb-2.5">
                                            <a href="product-detail.html">
                                                Macrony
                                            </a>
                                        </h4>
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                <h5 class="text-primary">$22.00</h5>
                                <a href="shop-cart.html" class="btn btn-primary mt-[18px] btn-hover-2">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="relative bg-white overflow-hidden h-screen flex items-center">

    <!-- Background decorative images -->
    <img src="assets/images/background/pic214.png" alt="" class="absolute bottom-0 left-[-275px] max-2xl:hidden animate-move z-0">
    <img src="assets/images/background/pic3.png" alt="" class="absolute right-[40px] top-[100px] max-2xl:right-0 max-2xl:top-[28px] 2xl:block hidden z-0">

    <div class="container mx-auto flex flex-col lg:flex-row items-center justify-center relative z-10 px-4">

        <!-- Image (Hidden on mobile) -->
        <div class="w-full lg:w-6/12 justify-center lg:justify-end mb-8 lg:mb-0 hidden lg:flex">
        </div>

        <!-- Text Content -->
        <div class="w-full lg:w-6/12 text-center lg:text-left">
            <h1 class="font-lobster text-4xl lg:text-6xl mb-4 text-red-600">Naan</h1>

            <p class="text-gray-700 text-lg lg:text-xl leading-relaxed mb-6">
                Freshly baked Indian bread, soft and fluffy. Perfect to pair with curries or enjoy on its own. Made with the finest ingredients and baked to perfection in traditional ovens.
            </p>

            <a href="#order" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-4 rounded-lg transition-all">
                Order Now
            </a>
        </div>

    </div>
</section>
<section class="sm:pb-[100px] pb-[40px] relative">
    <div class="container">
        <div class="2xl:mb-[50px] mb-[25px] relative mx-auto text-center">
            <h2 class="font-lobster">From Our Deal</h2>
        </div>

        <div class="slider-frame relative">
            <div class="swiper menu-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic1.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Burger
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex align-center relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic2.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Pasta
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex align-center relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic3.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Tandoor
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex align-center relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic4.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Dal
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex align-center relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic1.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Burger
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex align-center relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic2.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Pasta
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex align-center relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic3.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Tandoor
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex align-center relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="assets/images/gallery/grid2/pic4.jpg" alt="" class="block w-full">
                                </div>
                                <span class="absolute bg-[var(--secondary-dark)] left-0 text-white rounded-ee-[10px] uppercase py-[4px] px-1.5 font-semibold text-xs leading-[18px] z-[2] group-hover:top-0 top-[-40px] duration-500">top seller</span>
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center  duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">
												<a class="text-white" href="our-menu-1.html">
													Dal
												</a>
											</h5>
                                        <span class="text-xl text-yellow font-bold leading-[30px]">$50.00</span>
                                    </div>
                                    <a href="shop-cart.html">
                                        <i class="flaticon-shopping-cart items-center bg-white rounded-md min-w-[45px] h-[45px] min-h-[45px] leading-[45px] flex relative justify-center text-2xl text-center"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
<style>
    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.92); }
        to   { opacity: 1; transform: scale(1); }
    }
    
    @keyframes bounceIn {
        0%   { opacity: 0; transform: scale(0.3); }
        50%  { opacity: 1; transform: scale(1.1); }
        70%  { transform: scale(0.9); }
        85%  { transform: scale(1.05); }
        100% { opacity: 1; transform: scale(1); }
    }
    
    .animate-zoom-in {
        animation: zoomIn 0.8s ease-out both;
    }
    
    .animate-bounce-in {
        animation: bounceIn 0.8s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
    }
</style>
@endsection