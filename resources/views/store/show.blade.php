@extends('layouts.app')
@section('title', $seoData['title'])
@section('description', $seoData['description'])
@section('keywords', $seoData['keywords'])
@section('content')

{{-- ── Google Font ── --}}
 <style>

    /* ── COLOR TOKENS (NaanTwist logo-matched) ──────────────────────────
       --red:    #D0232A  Naan Red (primary brand)
       --red-dk: #A01A1F  Dark Red (hover / dark panels)
       --cream:  #FFF8EE  Warm Cream (page bg)
       --offwht: #FAEBD0  Card / section bg
       --brown:  #2A1205  Deep Brown (body text)
       --gold:   #F0D070  Naan Gold (accent / icon)
       --green:  #3A8C3F  Leaf Green (open status)
       --border: #E8DCCC  Beige Border
       --muted:  #A07850  Spice Brown (labels)
    ────────────────────────────────────────────────────────────────── */

    .sc-wrap * { box-sizing: border-box; margin: 0; padding: 0; }
    .sc-wrap { font-family: 'DM Sans', sans-serif; display: flex; flex-direction: column; gap: 3px; }

    /* ── SCROLL REVEAL ── */
    .sc-reveal        { opacity:0; transform:translateY(28px); transition:opacity .75s cubic-bezier(.22,1,.36,1), transform .75s cubic-bezier(.22,1,.36,1); }
    .sc-reveal.sc-in  { opacity:1; transform:translateY(0); }
    .sc-reveal-l      { opacity:0; transform:translateX(-36px); transition:opacity .85s cubic-bezier(.22,1,.36,1), transform .85s cubic-bezier(.22,1,.36,1); }
    .sc-reveal-l.sc-in{ opacity:1; transform:translateX(0); }
    .sc-reveal-r      { opacity:0; transform:translateX(36px); transition:opacity .85s cubic-bezier(.22,1,.36,1), transform .85s cubic-bezier(.22,1,.36,1); }
    .sc-reveal-r.sc-in{ opacity:1; transform:translateX(0); }
    .sc-d1{transition-delay:.08s} .sc-d2{transition-delay:.16s}
    .sc-d3{transition-delay:.24s} .sc-d4{transition-delay:.32s} .sc-d5{transition-delay:.40s}

    /* ── HERO ── */
    .sc-hero { display: grid; grid-template-columns: 1fr 1.55fr; border-radius: 24px; overflow: hidden; }

    /* Logo Panel — Naan Red background */
    .sc-logo-panel {
        background: #D0232A;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        padding: 3rem 2rem; gap: 1.2rem; position: relative; overflow: hidden;
    }
    .sc-logo-panel::before {
        content: ''; position: absolute; width: 240px; height: 240px; border-radius: 50%;
        border: 1px solid rgba(255,248,238,0.07);
        top: 50%; left: 50%; transform: translate(-50%,-50%); pointer-events: none;
    }
    .sc-logo-panel::after {
        content: ''; position: absolute; width: 180px; height: 180px; border-radius: 50%;
        border: 1px solid rgba(255,248,238,0.05);
        top: 50%; left: 50%; transform: translate(-50%,-50%); pointer-events: none;
    }

    @keyframes scSpin { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }

    .sc-logo-wrap { position: relative; width: 96px; height: 96px; z-index: 1; }
    .sc-ring-spin {
        position: absolute; inset: -7px; border-radius: 50%;
        border: 1.5px solid transparent;
        border-top-color: rgba(240,208,112,0.85);   /* Naan Gold */
        border-right-color: rgba(240,208,112,0.3);
        animation: scSpin 5s linear infinite;
    }
    .sc-logo-ring {
        position: absolute; inset: 0; border-radius: 50%;
        border: 1.5px solid rgba(255,248,238,0.2);
        overflow: hidden; background: #A01A1F;
        display: flex; align-items: center; justify-content: center;
    }
    .sc-logo-ring img { width: 100%; height: 100%; object-fit: cover; }
    .sc-logo-initial { font-family: 'Cormorant Garamond', serif; font-size: 40px; color: #FFF8EE; font-weight: 300; }
    .sc-store-name   { font-family: 'Cormorant Garamond', serif; font-size: 27px; color: #FFF8EE; text-align: center; line-height: 1.2; font-weight: 400; position: relative; z-index: 1; }

    /* Category tag */
    .sc-tag {
        background: transparent; border: 0.5px solid rgba(255,248,238,0.3);
        color: rgba(255,248,238,0.7); font-size: 9px; letter-spacing: 0.2em;
        text-transform: uppercase; padding: 5px 16px; border-radius: 2px;
        position: relative; z-index: 1;
        transition: background .3s, color .3s;
    }
    .sc-tag:hover { background: rgba(255,248,238,0.1); color: #FFF8EE; }

    /* Info Panel — warm cream */
    .sc-info-panel { background: #FFF8EE; padding: 2.5rem; display: flex; flex-direction: column; justify-content: center; gap: 1.4rem; }
    .sc-info-row   { display: flex; align-items: flex-start; gap: 14px; cursor: default; }
    .sc-icon {
        width: 38px; height: 38px; min-width: 38px; border-radius: 10px;
        background: #D0232A; display: flex; align-items: center; justify-content: center;
        transition: background .3s, transform .3s;
    }
    .sc-info-row:hover .sc-icon { background: #F0D070; transform: scale(1.1) rotate(5deg); }
    .sc-icon svg { width: 15px; height: 15px; }
    .sc-info-label { font-size: 9px; text-transform: uppercase; letter-spacing: 0.18em; color: #A07850; font-weight: 500; margin-bottom: 4px; }
    .sc-info-value { font-size: 13.5px; color: #2A1205; line-height: 1.5; font-weight: 400; }
    .sc-status     { display: flex; align-items: center; gap: 8px; margin-top: 2px; }
    .sc-dot        { width: 8px; height: 8px; border-radius: 50%; }
    .sc-status-text{ font-size: 13.5px; font-weight: 500; }

    /* Green pulse for open, red for closed */
    @keyframes scPulse { 0%,100%{box-shadow:0 0 0 0 rgba(58,140,63,.5)} 70%{box-shadow:0 0 0 8px rgba(58,140,63,0)} }
    .sc-dot-open { animation: scPulse 2s ease-in-out infinite; }
    @keyframes scPulseRed { 0%,100%{box-shadow:0 0 0 0 rgba(208,35,42,.5)} 70%{box-shadow:0 0 0 8px rgba(208,35,42,0)} }
    .sc-dot-closed { animation: scPulseRed 2s ease-in-out infinite; }

    /* ── HOURS PANEL — deep brown bg ── */
    .sc-hours-panel { background: #2A1205; border-radius: 24px; padding: 2.5rem 2.5rem 2rem; }
    .sc-hours-title {
        font-family: 'Cormorant Garamond', serif; font-size: 27px; color: #FFF8EE; font-weight: 400;
        margin-bottom: 1.8rem; display: flex; align-items: center; gap: 14px;
    }
    .sc-hours-title::before { content: ''; display: block; width: 28px; height: 0.5px; background: #F0D070; flex-shrink: 0; }
    .sc-hours-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 7px; }
    .sc-day-col    { display: flex; flex-direction: column; align-items: center; gap: 7px; }
    .sc-day-label  { font-size: 9px; color: rgba(255,248,238,0.35); letter-spacing: .12em; font-weight: 500; text-transform: uppercase; }
    .sc-time-block {
        border-radius: 10px; padding: 10px 4px; text-align: center; width: 100%;
        background: rgba(255,248,238,0.04); border: 0.5px solid transparent;
        transition: background .25s, border-color .25s, transform .25s; cursor: default;
    }
    .sc-time-block:hover        { transform: translateY(-4px); }
    .sc-time-block.open         { background: rgba(208,35,42,0.22); border-color: rgba(208,35,42,0.45); }
    .sc-time-block.open:hover   { background: rgba(208,35,42,0.35); }
    .sc-time-block.today        { background: rgba(240,208,112,0.18); border-color: rgba(240,208,112,0.55); }
    .sc-time-text               { font-size: 9px; color: rgba(255,248,238,0.3); line-height: 1.8; }
    .sc-time-block.open  .sc-time-text { color: rgba(255,248,238,0.75); }
    .sc-time-block.today .sc-time-text { color: #F0D070; font-weight: 500; }
    .sc-closed-dot   { width: 4px; height: 4px; border-radius: 50%; background: rgba(255,248,238,0.12); margin: 8px auto 4px; }
    .sc-closed-label { font-size: 8px; color: rgba(255,248,238,0.2); }

    /* ── ABOUT PANEL ── */
    .sc-about-panel { display: grid; grid-template-columns: 1fr 1fr; border-radius: 24px; overflow: hidden; min-height: 480px; }

    .sc-about-img { position: relative; overflow: hidden; background: #2A1205; }
    .sc-about-img img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        opacity: 0.65; filter: saturate(0.75) contrast(1.05);
        transition: transform 1.4s cubic-bezier(.22,1,.36,1), opacity .8s;
    }
    .sc-about-img:hover img { transform: scale(1.07); opacity: .78; }
    .sc-about-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to right, rgba(42,18,5,0) 48%, #FAEBD0 100%),
                    linear-gradient(to top, rgba(42,18,5,0.55) 0%, transparent 55%);
        pointer-events: none;
    }
    /* Ornament uses Naan Gold + Red */
    .sc-about-ornament { position: absolute; top: 24px; left: 24px; width: 46px; height: 46px; opacity: .5; }
    .sc-about-bottom   { position: absolute; bottom: 28px; left: 28px; }
    .sc-about-est  { font-size: 8px; letter-spacing: .28em; text-transform: uppercase; color: rgba(255,248,238,.35); margin-bottom: 4px; }
    .sc-about-year { font-family: 'Cormorant Garamond', serif; font-size: 68px; font-style: italic; font-weight: 300; color: rgba(255,248,238,.08); line-height: 1; letter-spacing: -3px; user-select: none; }

    /* Text side — offwhite card bg */
    .sc-about-text {
        background: #FAEBD0;
        padding: 4rem 3.5rem 4rem 3rem;
        display: flex; flex-direction: column; justify-content: center;
        position: relative;
    }
    /* Gold-to-Red gradient left border */
    .sc-about-text::before {
        content: ''; position: absolute; left: 0; top: 10%; bottom: 10%;
        width: 0.5px;
        background: linear-gradient(to bottom, transparent, #F0D070, #D0232A, transparent);
    }

    .sc-about-eyebrow  { display: flex; align-items: center; gap: 10px; margin-bottom: 1.8rem; }
    .sc-eyebrow-line   { width: 0; height: 0.5px; background: #D0232A; transition: width 1.1s cubic-bezier(.22,1,.36,1); }
    .sc-eyebrow-line.sc-grow { width: 26px; }
    .sc-eyebrow-txt    { font-size: 9px; letter-spacing: .25em; text-transform: uppercase; color: #D0232A; font-weight: 500; }

    .sc-about-heading  { font-family: 'Cormorant Garamond', serif; font-size: 54px; line-height: .98; color: #2A1205; font-weight: 300; letter-spacing: -1px; margin-bottom: .3rem; }
    .sc-about-heading em { font-style: italic; display: block; font-size: 60px; color: #D0232A; }

    .sc-about-divider  { display: flex; align-items: center; gap: 10px; margin: 1.8rem 0; }
    .sc-divider-line   { flex: 1; height: 0.5px; background: linear-gradient(to right, #E8DCCC, transparent); }
    .sc-divider-diamond{ width: 5px; height: 5px; background: #F0D070; transform: rotate(45deg); flex-shrink: 0; }
    @keyframes scDiam  { 0%,100%{box-shadow:0 0 0 0 rgba(240,208,112,.5)} 50%{box-shadow:0 0 0 6px rgba(240,208,112,0)} }
    .sc-divider-diamond{ animation: scDiam 2.5s ease-in-out infinite; }

    .sc-about-body { font-size: 13.5px; color: #A07850; line-height: 1.95; font-weight: 300; margin-bottom: 2.5rem; }

    /* CTA button — Naan Red */
    .sc-about-cta {
        display: inline-flex; align-items: center; gap: 12px;
        font-size: 9.5px; letter-spacing: .22em; text-transform: uppercase; font-weight: 500;
        color: #D0232A; text-decoration: none; padding: 13px 24px;
        border: 0.5px solid rgba(208,35,42,.4); border-radius: 2px;
        width: fit-content; position: relative; overflow: hidden;
        transition: color .3s, border-color .3s;
    }
    .sc-about-cta::before { content: ''; position: absolute; inset: 0; background: #D0232A; transform: translateX(-101%); transition: transform .38s cubic-bezier(.22,1,.36,1); }
    .sc-about-cta::after  { content: ''; position: absolute; top: 0; left: -60%; width: 38%; height: 100%; background: linear-gradient(90deg,transparent,rgba(255,255,255,.22),transparent); animation: scShimmer 3.5s ease-in-out infinite; pointer-events: none; }
    @keyframes scShimmer  { 0%{left:-60%} 65%,100%{left:120%} }
    .sc-about-cta:hover::before { transform: translateX(0); }
    .sc-about-cta:hover         { color: #FFF8EE; border-color: #D0232A; }
    .sc-about-cta:hover::after  { display: none; }
    .sc-about-cta span, .sc-cta-arr { position: relative; z-index: 1; }
    .sc-cta-arr { transition: transform .3s; display: inline-block; }
    .sc-about-cta:hover .sc-cta-arr { transform: translateX(4px); }

    /* ── RESPONSIVE ── */
    @media (max-width: 640px) {
        .sc-hero, .sc-about-panel { grid-template-columns: 1fr; }
        .sc-hours-grid { grid-template-columns: repeat(4, 1fr); }
        .sc-about-img { min-height: 280px; }
        .sc-about-overlay { background: linear-gradient(to bottom, rgba(42,18,5,0) 55%, #FAEBD0 100%); }
        .sc-about-text    { padding: 3rem 2.5rem; }
        .sc-about-heading { font-size: 42px; }
        .sc-about-heading em { font-size: 48px; }
    }
    .sc-lux-divider{
display:flex;
align-items:center;
justify-content:center;
gap:24px;
margin:45px 0;
}

.sc-lux-divider span{
flex:1;
height:1px;
background:linear-gradient(to right,transparent,#F0D070,transparent);
}

.sc-lux-ornament{
width:36px;
height:36px;
border:1px solid rgba(240,208,112,.4);
display:flex;
align-items:center;
justify-content:center;
transform:rotate(45deg);
}

.sc-lux-ornament svg{
width:14px;
height:14px;
fill:#F0D070;
transform:rotate(-45deg);
}
</style>

{{-- ── Banner ── --}}
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
            <h2 class="font-lobster text-white mb-5 2xl:text-[70px] md:text-[60px] text-[40px] leading-[1.2]">
                {{ $store->name }}
            </h2>
            <nav aria-label="breadcrumb" class="breadcrumb-row">
                <ul class="breadcrumb bg-primary shadow-[0px_10px_20px_rgba(0,0,0,0.05)] rounded-[10px] inline-block lg:py-[13px] md:py-[10px] sm:py-[5px] py-[7px] lg:px-[30px] md:px-[18px] sm:px-5 px-3.5 m-0">
                    <li class="breadcrumb-item p-0 inline-block text-[15px] font-normal">
                        <a href="{{ url('/') }}" class="text-white">Home</a>
                    </li>
                    <li class="breadcrumb-item text-white p-0 inline-block text-[15px] font-normal pl-2 active">
                        {{ $store->name }}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

{{-- ── PHP Setup ── --}}
@php
    use Carbon\Carbon;

    $days        = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    $fullDays    = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $todayIndex  = Carbon::now()->dayOfWeekIso - 1; // 0 = Mon … 6 = Sun

    // Today open/closed status
    $todaySchedule = $store->schedules->first(
        fn($s) => strtolower($s->day) === strtolower(Carbon::now()->format('l'))
    );
    $isOpen = false;
    if ($todaySchedule && $todaySchedule->open_time && $todaySchedule->close_time) {
        $now   = Carbon::now();
        $open  = Carbon::parse($todaySchedule->open_time);
        $close = Carbon::parse($todaySchedule->close_time);
        $isOpen = $now->between($open, $close);
    }
@endphp
{{-- ── Styles ── --}}

{{-- ── Store Info Section ── --}}
<section class="lg:pt-[80px] sm:pt-[70px] pt-[50px] lg:pb-[100px] sm:pb-10 pb-5 relative bg-white">
    <div class="container">
        <div class="sc-wrap">

            {{-- ── HERO ── --}}
            <div class="sc-hero  mb-3">

                {{-- Logo Panel --}}
                <div class="sc-logo-panel sc-reveal" id="sc-logo-panel">
                    <div class="sc-logo-wrap">
                        <div class="sc-ring-spin"></div>
                        <div class="sc-logo-ring">
                          
                                <img src="{{ asset('assets/images/favicon.png' ) }}" alt="{{ $store->name }}">
                          
                        </div>
                    </div>
                    <div class="sc-store-name sc-reveal sc-d2">{{ $store->name }}</div>
                    @if(!empty($store->category))
                        <div class="sc-tag sc-reveal sc-d3">{{ $store->category }}</div>
                    @endif
                </div>

                {{-- Info Panel --}}
                <div class="sc-info-panel">

                    @if($store->address)
                    <div class="sc-info-row sc-reveal sc-d1">
                        <div class="sc-icon">
                            <svg viewBox="0 0 24 24" fill="white"><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203.21-4.243 4.242a3 3 0 0 1-4.097.135l-.144-.135-4.244-4.243a9 9 0 0 1 12.728-12.728zm-6.364 3.364a3 3 0 1 0 0 6 3 3 0 0 0 0-6"/></svg>
                        </div>
                        <div>
                            <div class="sc-info-label">Address</div>
                            <div class="sc-info-value">{{ $store->address }}</div>
                        </div>
                    </div>
                    @endif

                    @if($store->phone)
                    <div class="sc-info-row sc-reveal sc-d2">
                        <div class="sc-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/></svg>
                        </div>
                        <div>
                            <div class="sc-info-label">Contact</div>
                            <div class="sc-info-value">{{ $store->phone }}</div>
                        </div>
                    </div>
                    @endif

                    @if($store->email)
                    <div class="sc-info-row sc-reveal sc-d3">
                        <div class="sc-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7"/><path d="M3 7l9 6 9-6"/></svg>
                        </div>
                        <div>
                            <div class="sc-info-label">Email</div>
                            <div class="sc-info-value">{{ $store->email }}</div>
                        </div>
                    </div>
                    @endif

                    <div class="sc-info-row sc-reveal sc-d4">
                        <div class="sc-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
                        </div>
                        <div>
                            <div class="sc-info-label">Status</div>
                            <div class="sc-status">
                                <span class="sc-dot {{ $isOpen ? 'sc-dot-open' : 'sc-dot-closed' }}"
                                      style="background:{{ $isOpen ? '#3A8C3F' : '#D0232A' }}"></span>
                                <span class="sc-status-text" style="color:{{ $isOpen ? '#3A8C3F' : '#D0232A' }}">
                                    {{ $isOpen ? 'Open Now' : 'Closed' }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="sc-lux-divider">
                <span></span>
                <div class="sc-lux-ornament">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2L15 9L22 9L16.5 13.5L19 21L12 16.8L5 21L7.5 13.5L2 9L9 9Z"/>
                    </svg>
                </div>
                <span></span>
            </div>

            {{-- ── HOURS ── --}}
            @if($store->schedules->count())
            <div class="sc-hours-panel sc-reveal  mb-3">
                <div class="sc-hours-title">Opening Hours</div>
                <div class="sc-hours-grid">
                    @foreach($days as $index => $day)
                        @php
                            $sch        = $store->schedules->first(fn($s) => strtolower(substr($s->day, 0, 3)) === strtolower($day));
                            $isToday    = ($index === $todayIndex);
                            $hasHours   = $sch && $sch->open_time && $sch->close_time;
                            $blockClass = 'sc-time-block' . ($hasHours ? ' open' : '') . ($isToday ? ' today' : '');
                            $delay      = 'sc-d' . min($index + 1, 5);
                        @endphp
                        <div class="sc-day-col sc-reveal {{ $delay }}">
                            <div class="sc-day-label">{{ strtoupper($day) }}</div>
                            <div class="{{ $blockClass }}">
                                @if($hasHours)
                                    <div class="sc-time-text">
                                        {{ Carbon::parse($sch->open_time)->format('H:i') }}<br>
                                        {{ Carbon::parse($sch->close_time)->format('H:i') }}
                                    </div>
                                @else
                                    <div class="sc-closed-dot"></div>
                                    <div class="sc-closed-label">Closed</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
                <div class="sc-lux-divider">
                    <span></span>
                    <div class="sc-lux-ornament">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2L15 9L22 9L16.5 13.5L19 21L12 16.8L5 21L7.5 13.5L2 9L9 9Z"/>
                        </svg>
                    </div>
                    <span></span>
                </div>
            {{-- ── ABOUT ── --}}
            @if($store->description)
            <div class="sc-about-panel">

                {{-- Image Left --}}
                <div class="sc-about-img sc-reveal-l" id="sc-about-img">
                    @if($store->image)
                        <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}">
                    @endif
                    <div class="sc-about-overlay"></div>
                    {{-- Ornament: Naan Gold outer, Red inner --}}
                    <svg class="sc-about-ornament" viewBox="0 0 46 46" fill="none">
                        <rect x="1" y="1" width="44" height="44" stroke="#F0D070" stroke-width="0.7"/>
                        <rect x="6" y="6" width="34" height="34" stroke="#D0232A" stroke-width="0.4"/>
                        <circle cx="23" cy="23" r="3.5" stroke="#F0D070" stroke-width="0.7"/>
                        <line x1="23" y1="1" x2="23" y2="10" stroke="#F0D070" stroke-width="0.7"/>
                        <line x1="1"  y1="23" x2="10" y2="23" stroke="#F0D070" stroke-width="0.7"/>
                        <line x1="36" y1="23" x2="45" y2="23" stroke="#F0D070" stroke-width="0.7"/>
                        <line x1="23" y1="36" x2="23" y2="45" stroke="#F0D070" stroke-width="0.7"/>
                    </svg>
                    <div class="sc-about-bottom">
                        <div class="sc-about-est">Established</div>
                        <div class="sc-about-year">{{ $store->created_at->format('Y') }}</div>
                    </div>
                </div>

                {{-- Text Right --}}
                <div class="sc-about-text sc-reveal-r" id="sc-about-txt">
                    <div class="sc-about-eyebrow">
                        <div class="sc-eyebrow-line" id="sc-eline"></div>
                        <span class="sc-eyebrow-txt">{{ $store->name }}</span>
                    </div>
                    <div class="sc-about-heading sc-reveal sc-d1">
                        A little<em>about us.</em>
                    </div>
                    <div class="sc-about-divider">
                        <div class="sc-divider-line"></div>
                        <div class="sc-divider-diamond"></div>
                    </div>
                    <p class="sc-about-body sc-reveal sc-d2">{{ $store->description }}</p>
                   
                </div>

            </div>
            @endif

        </div>
    </div>
</section>


{{-- ── Our Deals ── --}}


@if($store->deals->count())
<section class="bg-light sm:py-[100px] py-[40px] relative overflow-hidden mb-5">
    <div class="container">

        <div class="2xl:mb-[60px] mb-[40px] relative mx-auto text-center ">
            <h2 class="font-lobster">Our Deals</h2>
        <div>

        <div class="swiper team-swiper overflow-visible swiper-visible ">
            <div class="swiper-wrapper mt-10" style="align-items: stretch; ">

                @foreach($store->deals as $deal)
                <div class="swiper-slide" style="height: auto;">
                    <div class="slide-box" style="height: 100%;">
                        <div class="shadow-[0_15px_55px_rgba(35,35,35,0.15)] rounded-[10px] bg-white overflow-hidden group" style="height: 100%; display: flex; flex-direction: column;">

                            <!-- Image -->
                            <div class="relative overflow-hidden z-[1] before:content-[''] before:absolute before:w-[200px] before:h-[200px] before:bg-black2 before:top-[-100px] before:left-[-100px] before:opacity-30 before:z-[1] before:duration-500 before:rounded-full before:scale-50 before:translate-x-[-50%] group-hover:before:scale-[7]" style="height: 200px; flex-shrink: 0;">
                                <img
                                    src="{{ asset('storage/'.$deal->image) }}"
                                    alt="{{ $deal->title }}"
                                    class="group-hover:scale-110 duration-500 block w-full h-full object-cover"
                                >
                            </div>

                            <!-- Content -->
                            <div class="content bg-white py-[15px] px-5" style="display: flex; flex-direction: column; flex: 1;">

                                <h6 class="mb-1">
                                    <a href="javascript:void(0);">
                                        {{ $deal->name }}
                                    </a>
                                </h6>

                                <span class="font-normal text-sm leading-5 text-primary block mb-2">
                                    {{ $deal->title }}
                                </span>

                                <p class="text-sm text-gray-500" style="flex: 1;">
                                    {{ Str::words($deal->description, 15, '...') }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Section ke bahar ek Explore Now button -->
            <div class="text-center mt-8">
                <a href="{{ url('/menu') }}"
                   class="btn btn-md btn-primary btn-hover-1">
                    Explore Now
                </a>
            </div>

            <!-- Navigation -->
            <div class="swiper-nav">
                <div class="swiper-button-prev team-button-prev group hover:before:animate-spin">
                    <i class="fa-solid fa-arrow-left text-white group-hover:text-primary relative"></i>
                </div>
                <div class="swiper-button-next team-button-next group hover:before:animate-spin">
                    <i class="fa-solid fa-arrow-right text-white group-hover:text-primary relative"></i>
                </div>
            </div>

        </div>
    </div>
</section>
@endif





{{-- ── Store Gallery ── --}}
@if($store->gallery && $store->gallery->count())
<section class="sm:pb-[100px] pb-[40px] relative bg-white mt-10">
    <div class="container">
        <div class="2xl:mb-[50px] mb-[25px] relative mx-auto text-center">
            <h2 class="font-lobster">Store Gallery</h2>
        </div>
        <div class="slider-frame relative">
            <div class="swiper menu-swiper">
                <div class="swiper-wrapper">
                    @foreach($store->gallery as $galleryImage)
                    <div class="swiper-slide">
                        <div class="slide-box">
                            <div class="dz-img-box2 group">
                                <div class="w-full min-w-full h-full">
                                    <img src="{{ asset('storage/' . $galleryImage->image) }}"
                                         alt="{{ $galleryImage->caption ?? $store->name }}"
                                         class="block w-full object-cover h-[250px]">
                                </div>
                                @if($galleryImage->caption)
                                <div class="hover-content flex justify-between py-5 px-[30px] absolute bottom-0 opacity-0 z-[2] w-full items-center duration-500 mb-[-100px] group-hover:mb-0 group-hover:opacity-100">
                                    <div class="info relative">
                                        <h5 class="mb-0">{{ $galleryImage->caption }}</h5>
                                    </div>
                                </div>
                                @endif
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
@endif

{{-- ── Sign-Up for Exclusive Deals ── --}}
<section class="bg-fixed sm:py-[100px] py-[40px] relative z-[2] after:content-[''] after:absolute after:z-[-1] after:bg-black-blur after:opacity-100 after:w-full after:h-full after:top-0 after:left-0 after:backdrop-blur-[6px]"
    style="background-image: url('{{ asset('images/background/pic1.png') }}')">
    <div class="container">
        <div class="2xl:mb-[50px] mb-[25px] relative mx-auto text-center">
            <h2 class="font-lobster text-white">Sign up to get exclusive deals</h2>
        </div>

        @if(session('success'))
        <div class="bg-green-600 bg-opacity-80 text-white px-4 py-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-600 bg-opacity-80 text-white px-4 py-3 rounded mb-4 text-center">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('exclusive_deal.store') }}">
            @csrf
            <input type="hidden" name="store_id" value="{{ $store->id }}">
            <div class="row">
                <div class="lg:w-1/3 md:w-1/2 w-full sm:mb-[50px] mb-[30px] px-[15px]">
                    <input name="name" type="text" required placeholder="Your Name"
                        class="placeholder:text-white bg-transparent text-white text-lg border-b border-white h-[48px] outline-none w-full"/>
                </div>
                <div class="lg:w-1/3 md:w-1/2 w-full sm:mb-[50px] mb-[30px] px-[15px]">
                    <input name="phone" type="tel" required placeholder="Phone Number"
                        class="placeholder:text-white bg-transparent text-white text-lg border-b border-white h-[48px] outline-none w-full"/>
                </div>
                <div class="lg:w-1/3 md:w-1/2 w-full sm:mb-[50px] mb-[30px] px-[15px]">
                    <input name="email" type="email" required placeholder="Your Email"
                        class="placeholder:text-white bg-transparent text-white text-lg border-b border-white h-[48px] outline-none w-full"/>
                </div>
                <div class="w-full text-center mt-[20px]">
                    <button type="submit" class="btn btn-primary btn-hover-2">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</section>

{{-- ── Google Map ── --}}
@if($store->map_link)
<section class="sm:py-[100px] py-[40px] bg-white">
    <div class="container">
        <div class="2xl:mb-[50px] mb-[25px] text-center">
            <h2 class="font-lobster text-[36px] font-semibold text-black">Our Location</h2>
        </div>
        <div class="w-full rounded-lg overflow-hidden shadow-lg">
            <iframe
                src="{{ $store->map_link }}"
                width="100%"
                height="450"
                class="w-full"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>
@endif

{{-- ── Scroll Reveal JS ── --}}
<script>
(function(){
    var io = new IntersectionObserver(function(entries){
        entries.forEach(function(e){
            if(e.isIntersecting){
                e.target.classList.add('sc-in');
                if(e.target.id === 'sc-about-txt'){
                    setTimeout(function(){
                        var el = document.getElementById('sc-eline');
                        if(el) el.classList.add('sc-grow');
                    }, 450);
                }
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.sc-reveal, .sc-reveal-l, .sc-reveal-r').forEach(function(el){
        io.observe(el);
    });

    setTimeout(function(){
        document.querySelectorAll('.sc-reveal, .sc-reveal-l, .sc-reveal-r').forEach(function(el){
            if(el.getBoundingClientRect().top < window.innerHeight){
                el.classList.add('sc-in');
                if(el.id === 'sc-about-txt'){
                    setTimeout(function(){
                        var e = document.getElementById('sc-eline');
                        if(e) e.classList.add('sc-grow');
                    }, 500);
                }
            }
        });
    }, 120);
})();
</script>
@endsection