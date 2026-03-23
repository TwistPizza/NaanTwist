<style>
  .bg-color {
    background-color: #083305; /* orange background */
}
</style>
<section class="site-footer style-1 bg-primary   relative">
    <div class="xl:py-[60px] py-[40px] relative z-[2]">
        <div class="container">
            
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">

                <!-- Logo -->
      <div class="logo-header w-[180px] h-[64px] items-center relative flex">
					<a href="{{ route('home') }}" class="">
						<img src="{{ asset('assets/images/logo3.png') }}" alt="Naan Twist">
					</a>
				</div>

                <!-- Menu Links -->
                <ul style="display:flex;gap:15px;flex-wrap:wrap;justify-content:center;" class="text-white text-sm">
                    <li><a href="#" class="text-white hover:text-white-500">Corporate</a></li>
                    <li><a href="#" class="text-white hover:text-white-500">Corporate</a></li>
                    <li><a href="#" class="text-white hover:text-white-500">Corporate</a></li>
                    <li><a href="#" class="text-white hover:text-white-500">Nutrition</a></li>
                    <li><a href="#" class="text-white hover:text-white-500">Franchising Opportunities</a></li>
                    <li><a href="#" class="text-white hover:text-white-500">Privacy Policy</a></li>
                    <li><a href="#" class="text-white hover:text-white-500">Customer Support</a></li>
                </ul>
                <!-- Social Media -->
                <div class="flex gap-5 text-xl">
                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-youtube"></i></a>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- Footer -->

<div class="menu-backdrop"></div>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/masonry/masonry-4.2.2.js') }}"></script>
<script src="{{ asset('assets/vendor/masonry/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/particles/particles.js') }}"></script>
<script src="{{ asset('assets/vendor/particles/particles-app.js') }}"></script>
<script src="{{ asset('assets/js/dz.ajax.js') }}"></script>
<script src="{{ asset('assets/js/dz.carousel.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/vendor/rangeslider/rangeslider.js') }}"></script>
<script src="{{ asset('assets/js/dznav-init.js') }}"></script>
<script src="{{ asset('assets/vendor/switcher/switcher.js') }}"></script>

<script>
    jQuery(document).ready(function(){
        dzSettingsOptions.themeFullColor_value = 'color_2';
        new dzSettings(dzSettingsOptions);
    });
</script>