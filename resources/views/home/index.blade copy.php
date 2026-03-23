@extends('layouts.app')

@section('title', 'Best Pizza Near Me | Fresh & Hot Pizza Delivery')
@section('meta_description', 'Order fresh and hot pizza online. Explore our menu, best deals, and create your own pizza. Fast pizza delivery near you.')
@section('meta_keywords', 'pizza near me, best pizza, pizza delivery, online pizza order, fresh pizza')

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="px-2 px-sm-4 py-5" aria-label="Pizza Promotion Banner">
<div class="container mt-5">

<div id="pizzaHeroSlider" class="carousel slide carousel-fade rounded-5" data-bs-ride="carousel">

<div class="carousel-inner">

<!-- Slide 1 -->
<div class="carousel-item active">
<img src="{{ asset('images/freepik__clean-pizza-banner-rustic-brickred-backdrop-light-__12363.png') }}" 
     class="d-block w-100 banner-img"
     loading="lazy"
     alt="Best Pizza Restaurant - Fresh Oven Baked Pizza">

<div class="carousel-caption text-start text-white">
<h1 class="fw-bold">Best Pizza Near You – Fresh & Hot</h1>
<p>Order delicious oven-baked pizza online.</p>
<a href="{{ url('/store-location') }}" class="btn btn-primary btn-lg">
Find Pizza Store Near Me
</a>
</div>
</div>

<!-- Slide 2 -->
<div class="carousel-item">
<img src="{{ asset('images/front-view-tasty-mushroom-pizza-with-red-tomatoes-bell-peppers-olives-mushrooms.jpg') }}"
     class="d-block w-100 banner-img"
     loading="lazy"
     alt="Hot and Fresh Pizza Delivery">

<div class="carousel-caption text-start text-white">
<h2 class="fw-bold">Fast Pizza Delivery</h2>
<p>Get hot & fresh pizza delivered to your doorstep.</p>
</div>
</div>

</div>
</div>
</div>
</section>


<!-- ================= MENU SECTION ================= -->
<section class="menu-section px-2 px-sm-4 py-5" aria-labelledby="menuHeading">
<div class="container">

<h2 id="menuHeading" class="text-center mb-5 fw-bold">
Our Pizza Menu
</h2>

<div class="row g-4">

<div class="col-md-4">
<article class="menu-card">
<img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092"
     class="img-fluid"
     loading="lazy"
     alt="Cheese Pizza with Fresh Toppings">

<h3 class="h5 mt-3 text-uppercase">Classic Pizza</h3>
<a href="{{ url('/menu') }}" class="btn btn-sm btn-outline-danger">
View Pizza Menu
</a>
</article>
</div>

<div class="col-md-4">
<article class="menu-card">
<img src="https://images.unsplash.com/photo-1550547660-d9450f859349"
     class="img-fluid"
     loading="lazy"
     alt="Delicious Burger Combo">

<h3 class="h5 mt-3 text-uppercase">Burger & Combos</h3>
<a href="{{ url('/menu') }}" class="btn btn-sm btn-outline-danger">
Explore Combos
</a>
</article>
</div>

</div>
</div>
</section>


<!-- ================= CREATE YOUR OWN ================= -->
<section class="position-relative py-5"
style="background:url('https://pizzatwist.com/assets/images/createyourown.png') center/cover no-repeat;"
aria-label="Create Your Own Pizza Section">

<div class="container text-center text-md-start">
<h2 class="fw-bold text-uppercase">
Create Your Own Pizza Online
</h2>

<p>Customize your pizza with your favorite toppings.</p>

<a href="https://order.online/online-ordering/business/-71389/"
   class="btn btn-danger btn-lg rounded-pill">
Order Custom Pizza Now
</a>
</div>
</section>


<!-- ================= DEALS SECTION ================= -->
<section class="px-2 px-sm-4 py-5" aria-labelledby="dealsHeading">
<div class="container text-center">

<h2 id="dealsHeading" class="fw-bold text-uppercase mb-5">
Best Pizza Deals & Offers
</h2>

<div class="row g-4">

<div class="col-md-3">
<article class="card shadow-lg rounded-4">
<img src="https://pizzatwist.com/storage//01JEQQ3Y64PPJXS0HWT74EV5M5.webp"
     class="card-img-top"
     loading="lazy"
     alt="Buy 2 Large Pizza Deal">

<div class="card-body">
<h3 class="h6">Buy 2 Large 3-Topping Pizzas</h3>
</div>
</article>
</div>

</div>

<a href="https://order.online/online-ordering/business/-71389/"
   class="btn btn-danger btn-lg mt-4 rounded-pill">
Order Pizza Online
</a>

</div>
</section>


<!-- ================= STRUCTURED DATA ================= -->
<script type="application/ld+json">
{
 "@context": "https://schema.org",
 "@type": "Restaurant",
 "name": "Pizza Restaurant",
 "servesCuisine": "Pizza",
 "priceRange": "$$",
 "acceptsReservations": "True",
 "hasMenu": "{{ url('/menu') }}"
}
</script>

@endsection