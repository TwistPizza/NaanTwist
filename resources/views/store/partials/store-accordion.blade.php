@php
$grouped = $stores->groupBy(fn($store) => $store->state->name);
$search = strtolower(request('search'));
@endphp

@foreach($grouped as $state => $stateStores)

@php
$matched = $stateStores->first(function($store) use ($search){
    return $search && (
        str_contains(strtolower($store->name), $search) ||
        str_contains(strtolower($store->city->name), $search)
    );
});
@endphp

<div class="accordion-item {{ $matched ? 'matched' : '' }}" data-state="{{ $state }}">

    <button class="accordion-btn flex justify-between w-full py-4 border-b">
        <span class="text-lg lg:text-xl font-extrabold">
            {{ strtoupper($state) }}
        </span>

        <svg class="accordion-icon w-5 h-5 text-gray-700 transition-transform duration-300"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div class="accordion-content hidden">
        <div class="accordion-content-inner py-4">

            @foreach($stateStores as $store)

            <div class="store-card border p-4 mb-3 rounded">

                <h4 class="text-lg lg:text-xl font-extrabold mb-1">
                    {{ $store->city->name }} ({{ $store->name }})
                </h4>

                <p class="text-gray-800 mb-2">
                    {{ $store->address }}
                </p>

                <div class="flex gap-4">

                    <a href="{{ $store->order_link ?: '#' }}"
                    class="btn btn-info btn-hover-2"
                    target="_blank">
                        Order Here
                    </a>

                    <a href="{{ route('locations.show', ['slug' => Str::slug($store->name)]) }}"
                    class="btn btn-info btn-hover-2 ml-2">
                        Store Info
                    </a>

                </div>
            </div>

            @endforeach

        </div>
    </div>

</div>

@endforeach