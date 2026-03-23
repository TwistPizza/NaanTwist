@extends('layouts.app')

@section('content')

<!-- Banner -->
<section 
    style="background-image: url('{{ $banner->image ? asset('storage/' . $banner->image) : asset('images/banner/bnr5.jpg') }}');"
    class="bg-fixed relative z-[1] 
           after:content-[''] after:absolute after:z-[-1] 
           after:bg-[#222222e6] after:opacity-100 
           after:w-full after:h-full after:top-0 after:left-0
           pt-[50px] lg:h-[450px] sm:h-[400px] h-[300px] overflow-hidden 
           bg-cover bg-center"
>
    <div class="container table h-full relative z-[1] text-center">
        <div class="dz-bnr-inr-entry align-middle table-cell">
            <h2 class="font-lobster font-extrabold text-white mb-5 2xl:text-[70px] md:text-[60px] text-[40px] leading-[1.2]">
                {{ $banner->title ?? 'Store Location' }}
            </h2>
            <nav aria-label="breadcrumb" class="breadcrumb-row">
                <ul class="breadcrumb bg-primary shadow-[0px_10px_20px_rgba(0,0,0,0.05)] rounded-[10px] inline-block lg:py-[13px] md:py-[10px] sm:py-[5px] py-[7px] lg:px-[30px] md:px-[18px] sm:px-5 px-3.5 m-0">
                    <li class="breadcrumb-item p-0 inline-block text-[15px] font-semibold">
                        <a href="{{ url('/') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item text-white p-0 inline-block text-[15px] pl-2 font-semibold active">
                        {{ $banner->title ?? 'Store Location' }}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- Banner End -->

<!-- Search + Store Location Section -->
<section class="lg:pt-[100px] sm:pt-[70px] pt-[50px] lg:pb-[100px] sm:pb-10 pb-5 relative bg-[#f8f8f8]">
    <div class="container mx-auto px-[15px]">

        <!-- Search Bar -->
        <div class="row search-wraper style-1 text-center lg:mt-[-135px] sm:mt-[-100px] mt-[-90px] xl:mb-[80px] lg:mb-[60px] sm:mb-[50px] mb-[40px]">
            <div class="lg:w-2/3 w-full px-[15px] m-auto">
                <form id="storeSearchForm">
                    <div class="input-group relative flex flex-wrap items-stretch z-[1] w-full">
                        <input type="text" name="search" id="storeSearchInput" placeholder="Search by city, state or store..."
                            class="form-control bg-white py-[25px] pl-[30px] sm:pr-[150px] pr-20 border-none rounded-[10px] lg:h-[80px] h-[60px] w-full shadow-[0px_15px_55px_rgba(34,34,34,0.15)] text-[#666666] text-[15px] font-semibold outline-none" />
                    </div>
                </form>
            </div>
        </div>

        <!-- Store Finder: Left Accordion + Right Map -->
        <div class="flex flex-wrap -mx-[15px]">

            <!-- LEFT SIDE: Accordion -->
            <div class="lg:w-5/12 w-full px-[15px]">
                <h3 class="text-[20px] sm:text-[24px] md:text-[28px] font-extrabold mb-6">
                    Find Our Stores
                </h3>
                <div id="storeAccordion" class="space-y-4">
                    @include('store.partials.store-accordion', ['stores' => $stores])
                </div>
            </div>

            <!-- RIGHT SIDE: Map -->
            <div class="lg:w-7/12 w-full px-[15px] mt-10 lg:mt-0">
                <div class="relative rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('assets/images/GoogleMapTA.webp')}}" class="w-full h-full object-cover" alt="Store Map">
                    <div class="absolute top-6 left-1/2 -translate-x-1/2 w-full max-w-[650px] px-4">
                        <form id="storeSearchFormMobile" class="flex items-center bg-white rounded-full shadow-xl px-6 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#16a34a" viewBox="0 0 16 16" class="mr-3">
                                <path d="M8 0a5 5 0 0 0-5 5c0 3.25 5 11 5 11s5-7.75 5-11a5 5 0 0 0-5-5z"/>
                            </svg>
                            <input type="text" name="search" id="storeSearchInputMobile" placeholder="Enter city, state or zip" class="flex-1 outline-none text-sm font-semibold text-gray-600">
                            <button type="submit" class="ml-3 bg-red-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 transition">➜</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Styles -->
<style>
/* Accordion + Card Styles */
.accordion-item { 
    border-radius: 14px; 
    overflow: hidden; 
    border: 1px solid #e5e7eb; 
    background: #fff; 
    box-shadow: 0 2px 8px rgba(0,0,0,0.06); 
    transition: box-shadow 0.3s ease; 
}
.accordion-item:hover { 
    box-shadow: 0 4px 16px rgba(0,0,0,0.10); 
}
.accordion-btn { 
    width: 100%; 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    padding: 16px 24px; 
    font-weight: 900; /* Increased weight */
    font-size: 15px; 
    color: #374151; 
    background: #fff; 
    border: none; 
    cursor: pointer; 
    transition: background 0.3s ease, color 0.3s ease; 
}
.accordion-item.open .accordion-btn { 
    background: #e21e30; 
    color: #fff; 
}
.accordion-icon { 
    width: 20px; 
    height: 20px; 
    flex-shrink: 0; 
    transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), fill 0.3s ease; 
}
.accordion-item.open .accordion-icon { 
    transform: rotate(180deg); 
    fill: #fff;
}
.accordion-content { 
    max-height: 0; 
    overflow: hidden; 
    transition: max-height 0.45s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.35s ease; 
    opacity: 0; 
    background: #fff; 
}
.accordion-item.open .accordion-content { 
    max-height: 800px; 
    opacity: 1; 
}
.accordion-content-inner { 
    padding: 20px; 
    display: flex; 
    flex-direction: column; 
    gap: 14px; 
}
.store-card { 
    padding: 16px; 
    border-radius: 12px; 
    border: 1px solid #e5e7eb; 
    transition: box-shadow 0.25s ease, transform 0.2s ease; 
    background: #fafafa; 
}
.store-card:hover { 
    box-shadow: 0 6px 20px rgba(0,0,0,0.09); 
    transform: translateY(-2px); 
    background: #fff; 
}
.store-card h5 { font-size: 16px; font-weight: 900; margin-bottom: 4px; color: #111827; }
.store-card p { font-size: 13px; font-weight: 600; color: #6b7280; margin-bottom: 12px; }
.store-card .btn-group { display: flex; gap: 10px; }
.btn-order { background: #16a34a; color: #fff; padding: 8px 16px; font-size: 13px; border-radius: 8px; border: none; cursor: pointer; font-weight: 700; transition: background 0.2s ease, transform 0.15s ease; }
.btn-order:hover { background: #15803d; transform: scale(1.03); }
.btn-info { background: #ef4444; color: #fff; padding: 8px 16px; font-size: 13px; border-radius: 8px; border: none; cursor: pointer; font-weight: 700; transition: background 0.2s ease, transform 0.15s ease; }
.btn-info:hover { background: #dc2626; transform: scale(1.03); }
</style>

<!-- Scripts -->
<script>
function initAccordion() {

    document.querySelectorAll(".accordion-btn").forEach(button => {

        button.addEventListener("click", () => {

            const item = button.closest(".accordion-item");

            item.classList.toggle("open");

            const content = item.querySelector(".accordion-content");

            content.classList.toggle("hidden");

        });

    });

}

document.addEventListener("DOMContentLoaded", () => {

    const accordion = document.getElementById("storeAccordion");

    openMatchedAccordions(accordion);

    initAccordion();

});


function openMatchedAccordions(container){

    const matchedItems = container.querySelectorAll(".accordion-item.matched");

    if(matchedItems.length){

        matchedItems.forEach(item => {

            item.classList.add("open");

            const content = item.querySelector(".accordion-content");

            if(content){
                content.classList.remove("hidden");
            }

        });

    } else {

        const firstItem = container.querySelector(".accordion-item");

        if(firstItem){

            firstItem.classList.add("open");

            const content = firstItem.querySelector(".accordion-content");

            if(content){
                content.classList.remove("hidden");
            }

        }

    }

}


let debounceTimer;

function fetchStores(query){

    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(() => {

        fetch(`{{ route('store.location') }}?search=${query}`,{
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })

        .then(res => res.text())

        .then(html => {

            const accordion = document.getElementById('storeAccordion');

            accordion.innerHTML = html;

            initAccordion();

            openMatchedAccordions(accordion);

        });

    },400);

}


document.getElementById('storeSearchInput')
.addEventListener('keyup', e => fetchStores(e.target.value));


document.getElementById('storeSearchForm')
.addEventListener('submit', e => {

    e.preventDefault();

    fetchStores(document.getElementById('storeSearchInput').value);

});


document.getElementById('storeSearchInputMobile')
.addEventListener('keyup', e => fetchStores(e.target.value));


document.getElementById('storeSearchFormMobile')
.addEventListener('submit', e => {

    e.preventDefault();

    fetchStores(document.getElementById('storeSearchInputMobile').value);

});
</script>

@endsection