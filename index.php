<?php
require_once 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Colossus of Lagos | The Hustle. The Heat. The Rise.</title>
  <meta name="description" content="Official website and online registration platform for Colossus of Lagos — Africa's premier entrepreneurship  partnership with Lagos State Government." />
  <meta name="keywords" content="Colossus of Lagos, entrepreneurship , Lagos State Government, Ministry of Wealth Creation, Bravopoints, business pitch, Lagos startups" />
  
  <!-- OpenGraph & Twitter Cards -->
  <meta property="og:title" content="Colossus of Lagos | Official Registration Platform" />
  <meta property="og:description" content="₦30M Grand Prize. 30 Bootcamp Winners. 53M+ TV Viewers. Register now for Colossus of Lagos." />
  <meta property="og:image" content="assets/slider/Image/Artboard 1-100.jpg" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Colossus of Lagos | The Hustle. The Heat. The Rise." />
  <meta name="twitter:description" content="Africa's premier entrepreneurship competition and festival in partnership with Lagos State Government." />
  <meta name="twitter:image" content="assets/slider/Image/Artboard 1-100.jpg" />

  <!-- Favicon & Brand Icons -->
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="shortcut icon" href="favicon.ico" />

  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;700;900&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    :root {
      --navy: #0a1628;
      --navy-deep: #070f1f;
      --navy-light: #0f1d32;
      --royal-blue: #083B74;
      --gold: #d4af37;
      --gold-light: #f4d03f;
      --gold-dark: #b8941f;
    } 

    body {
      font-family: "Inter", sans-serif;
      background-color: var(--navy);
      color: white;
      overflow-x: hidden;
    }

    .font-display {
      font-family: "Playfair Display", serif;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: var(--navy);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--gold);
      border-radius: 4px;
    }

    /* Animations */
    @keyframes float {

      0%,
      100% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-20px);
      }
    }

    @keyframes pulse-glow {

      0%,
      100% {
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
      }

      50% {
        box-shadow: 0 0 40px rgba(212, 175, 55, 0.6);
      }
    }

    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(60px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes gradientShift {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .animate-float {
      animation: float 6s ease-in-out infinite;
    }

    .animate-slide-up {
      animation: slideInUp 0.8s ease-out forwards;
    }

    .gold-gradient {
      background: linear-gradient(135deg,
          var(--gold) 0%,
          var(--gold-light) 50%,
          var(--gold) 100%);
      background-size: 200% 200%;
      animation: gradientShift 3s ease infinite;
    }

    .text-gold-gradient {
      background: linear-gradient(135deg,
          var(--gold) 0%,
          var(--gold-light) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .glass-panel {
      background: rgba(15, 29, 50, 0.7);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .hover-lift {
      transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
    }

    .hover-lift:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .stage-card {
      background: linear-gradient(145deg,
          rgba(8, 59, 116, 0.5),
          rgba(10, 22, 40, 0.95));
      border: 1px solid rgba(8, 59, 116, 0.4);
      transition: all 0.4s ease;
    }

    .stage-card:hover {
      border-color: var(--gold);
      background: linear-gradient(145deg,
          rgba(8, 59, 116, 0.7),
          rgba(10, 22, 40, 0.95));
      transform: translateY(-5px);
      box-shadow: 0 12px 40px rgba(8, 59, 116, 0.3);
    }

    .count-up {
      font-variant-numeric: tabular-nums;
    }

    /* Particle canvas */
    #particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
    }

    .nav-blur {
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .btn-gold {
      background: linear-gradient(135deg, var(--gold), var(--gold-dark));
      color: var(--navy);
      font-weight: 700;
      transition: all 0.3s ease;
    }

    .btn-gold:hover {
      transform: scale(1.05);
      box-shadow: 0 0 30px rgba(212, 175, 55, 0.5);
    }

    .section-reveal {
      opacity: 0;
      transform: translateY(40px);
      transition:
        opacity 0.8s ease,
        transform 0.8s ease;
    }

    .section-reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Hero Slider Container Dimensions */
    #hero-slider-wrap {
      width: 100%;
      aspect-ratio: 16 / 9;
      height: auto;
      min-height: 200px;
      touch-action: pan-y;
    }
    @media (min-width: 640px) {
      #hero-slider-wrap {
        aspect-ratio: 16 / 9;
        height: auto;
      }
    }
    @media (min-width: 768px) {
      #hero-slider-wrap {
        aspect-ratio: auto;
        height: 660px;
        min-height: 620px;
      }
    }
    @media (min-width: 1024px) {
      #hero-slider-wrap {
        aspect-ratio: auto;
        height: 760px;
        min-height: 720px;
      }
    }
    @media (min-width: 1280px) {
      #hero-slider-wrap {
        aspect-ratio: auto;
        height: 840px;
        min-height: 800px;
      }
    }
    @media (min-width: 1536px) {
      #hero-slider-wrap {
        aspect-ratio: auto;
        height: 920px;
        min-height: 880px;
      }
    }

    /* Premium Slider */
    .slide-item {
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      width: calc(100% / 4);
      height: 100%;
      flex-shrink: 0;
    }

    #slide-track {
      display: flex;
      width: 400%;
      height: 100%;
      transition: transform 1.2s cubic-bezier(0.85, 0, 0.15, 1);
      touch-action: pan-y;
    }
  </style>
</head>

<body class="antialiased text-white bg-[#0a1628] overflow-x-hidden">
  <!-- Navigation & Mobile Menu -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Hero Section with Interactive Slider & Visual Experience -->
  <section class="relative w-full pt-[68px] sm:pt-[76px] md:pt-[88px] overflow-hidden bg-[#0a1628]">
    <!-- Top Interactive Slider (Balanced on Mobile, Tablet & Desktop) -->
    <div id="hero-slider-wrap" class="relative group shadow-2xl shadow-black/80 select-none">
      <div class="absolute inset-0 z-0 bg-[#0a1628] overflow-hidden">
        <div id="slide-track">
          <div class="slide-item" style="background-image: url('assets/slider/Image/Artboard-1-100.jpg'); background-position: center center;"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Image/Artboard-2-100.jpg'); background-position: center center;"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Image/Artboard-3-100.jpg?v=2'); background-position: center center;"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Image/Artboard-4-100.jpg'); background-position: center center;"></div>
        </div>
      </div>

      <canvas id="particles"></canvas>
      <div class="absolute inset-0 bg-gradient-to-b from-[#0a1628]/15 via-transparent to-[#0a1628]/40 sm:from-[#0a1628]/25 sm:to-[#0a1628]/50 z-10 pointer-events-none"></div>

      <!-- Slider Arrows -->
      <button id="prev-slide"
        class="absolute left-2 sm:left-4 md:left-6 top-1/2 -translate-y-1/2 z-30 w-7 h-7 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full border border-yellow-400/30 bg-[#0a1628]/80 text-yellow-400 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1628] hover:border-yellow-400 transition-all duration-300 shadow-lg backdrop-blur-sm md:opacity-0 md:group-hover:opacity-100" aria-label="Previous slide">
        <i data-lucide="chevron-left" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6"></i>
      </button>
      <button id="next-slide"
        class="absolute right-2 sm:right-4 md:right-6 top-1/2 -translate-y-1/2 z-30 w-7 h-7 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full border border-yellow-400/30 bg-[#0a1628]/80 text-yellow-400 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1628] hover:border-yellow-400 transition-all duration-300 shadow-lg backdrop-blur-sm md:opacity-0 md:group-hover:opacity-100" aria-label="Next slide">
        <i data-lucide="chevron-right" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6"></i>
      </button>

      <!-- Slider Dots -->
      <div class="absolute bottom-2 sm:bottom-4 md:bottom-5 left-1/2 -translate-x-1/2 z-30 flex gap-1.5 sm:gap-2.5">
        <button class="w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-yellow-400 transition-all duration-300 slide-dot" data-slide="0" aria-label="Slide 1"></button>
        <button class="w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="1" aria-label="Slide 2"></button>
        <button class="w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="2" aria-label="Slide 3"></button>
        <button class="w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="3" aria-label="Slide 4"></button>
      </div>
    </div>

    <!-- 5 Golden Milestones Ribbon Section -->
    <div class="relative max-w-7xl mx-auto px-6 py-6 sm:py-8 lg:py-10">
      <!-- 5 Golden Milestones Ribbon (Responsive 5-Stage Program Journey) -->
      <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-3.5 lg:gap-4 text-left">
        <!-- 1st Box: Business Pitches -->
        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-3.5 sm:p-4 lg:p-4 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div>
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1.5 flex items-center justify-between">
              <span class="truncate">Business Pitches</span>
              <i data-lucide="mic" class="w-3.5 h-3.5 text-yellow-400 shrink-0"></i>
            </div>
            <div class="text-base sm:text-lg md:text-xl lg:text-2xl font-black text-white tracking-tight leading-tight whitespace-nowrap tabular-nums">Thousands+</div>
          </div>
          <p class="text-[11px] sm:text-xs text-gray-300 font-light leading-snug mt-2">Thousands of hopeful entrepreneurs</p>
        </div>

        <!-- 2nd Box: Summit Delegates -->
        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-3.5 sm:p-4 lg:p-4 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div>
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1.5 flex items-center justify-between">
              <span class="truncate">Summit Delegates</span>
              <i data-lucide="users" class="w-3.5 h-3.5 text-yellow-400 shrink-0"></i>
            </div>
            <div class="text-base sm:text-lg md:text-xl lg:text-2xl font-black text-yellow-400 tracking-tight leading-tight whitespace-nowrap tabular-nums">1,000+</div>
          </div>
          <p class="text-[11px] sm:text-xs text-gray-300 font-light leading-snug mt-2">Delegates attending Entrepreneurship Summit</p>
        </div>

        <!-- 3rd Box: Bootcamp -->
        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-3.5 sm:p-4 lg:p-4 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div>
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1.5 flex items-center justify-between">
              <span class="truncate">Bootcamp</span>
              <i data-lucide="flame" class="w-3.5 h-3.5 text-yellow-400 shrink-0"></i>
            </div>
            <div class="text-sm sm:text-base font-bold text-white tracking-tight leading-tight mb-1">Top 100 Intensive</div>
          </div>
          <ul class="text-[11px] sm:text-xs text-gray-300 font-light space-y-0.5 mt-1">
            <li class="flex items-center gap-1.5"><span class="text-yellow-400 font-bold text-xs">—</span><span>Competition</span></li>
            <li class="flex items-center gap-1.5"><span class="text-yellow-400 font-bold text-xs">—</span><span>Training</span></li>
            <li class="flex items-center gap-1.5"><span class="text-yellow-400 font-bold text-xs">—</span><span>Mentoring</span></li>
            <li class="flex items-center gap-1.5"><span class="text-yellow-400 font-bold text-xs">—</span><span>Seed Grants</span></li>
          </ul>
        </div>

        <!-- 4th Box: Investors Evening -->
        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-3.5 sm:p-4 lg:p-4 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div>
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1.5 flex items-center justify-between">
              <span class="truncate">Investors Evening</span>
              <i data-lucide="briefcase" class="w-3.5 h-3.5 text-yellow-400 shrink-0"></i>
            </div>
            <div class="text-sm sm:text-base font-bold text-white tracking-tight leading-tight mb-1">Deal Room</div>
          </div>
          <div class="text-[11px] sm:text-xs text-gray-300 font-light leading-snug mt-2 flex items-start gap-1.5">
            <span class="text-yellow-400 font-bold text-xs shrink-0">—</span>
            <span>Entrepreneurs needing Investors</span>
          </div>
        </div>

        <!-- 5th Box: Grand Finale Champion -->
        <div class="col-span-2 md:col-span-2 lg:col-span-1 rounded-2xl border-2 border-yellow-400/70 bg-gradient-to-b from-yellow-400/10 via-[#070f1f]/95 to-[#070f1f]/95 backdrop-blur-md p-3.5 sm:p-4 lg:p-4 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div>
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-yellow-400 font-semibold mb-1.5 flex items-center justify-between">
              <span class="truncate">Grand Finale Champion</span>
              <i data-lucide="crown" class="w-3.5 h-3.5 text-yellow-400 shrink-0"></i>
            </div>
            <div class="text-base sm:text-lg md:text-xl lg:text-2xl font-black text-yellow-400 tracking-tight leading-tight whitespace-nowrap tabular-nums">₦25,000,000</div>
          </div>
          <p class="text-[11px] sm:text-xs text-gray-300 font-light leading-snug mt-2">Awarded to the Champion of the Grand Finale</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Official Partner: Lagos State Government (LASG) Endorsement Section -->
  <section id="lasg" class="py-20 md:py-28 bg-[#070f1f] relative overflow-hidden border-t border-yellow-400/10">
    <div class="max-w-4xl mx-auto px-6 relative z-10 text-center flex flex-col items-center">
      <!-- Official Seal -->
      <div class="relative mb-5">
        <div class="absolute inset-0 bg-gradient-to-br from-[#d4af37]/30 to-[#083B74]/40 rounded-full blur-2xl"></div>
        <div class="relative w-32 h-32 sm:w-40 sm:h-40 rounded-full bg-gradient-to-br from-yellow-400/10 to-[#083B74]/30 border-2 border-yellow-400/40 p-4 shadow-2xl flex items-center justify-center backdrop-blur-md">
          <img src="assets/proposal/lagos_seal.png" alt="Official Seal of Lagos State Government" class="max-w-full max-h-full object-contain filter drop-shadow-[0_10px_20px_rgba(212,175,55,0.4)]" />
        </div>
      </div>

      <h3 class="font-display text-xl sm:text-2xl font-bold text-yellow-400 mb-3">Official Partner</h3>

      <div class="inline-flex items-center gap-2 mb-4">
        <div class="h-px w-10 bg-yellow-400"></div>
        <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">State Strategic Backing</span>
        <div class="h-px w-10 bg-yellow-400"></div>
      </div>

      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold mb-6 leading-tight max-w-3xl">
        Accelerating Enterprise, Innovation & <span class="text-gold-gradient">Sustainable Job Creation</span>
      </h2>

      <div class="space-y-4 text-gray-300 text-sm sm:text-base md:text-lg leading-relaxed font-light max-w-3xl">
        <p>
          Lagos State Government supports <strong class="text-white font-medium">Colossus of Lagos</strong> as a strategic platform to accelerate entrepreneurship, job creation, and innovation across the state.
        </p>
        <p>
          The festival directly aligns with Lagos State's vision to position itself as Africa's leading hub for enterprise by identifying, empowering, and scaling high-potential entrepreneurs who can drive economic growth, solve local challenges, and create sustainable employment.
        </p>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 md:py-28 bg-[#0a1628] relative">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-4xl mx-auto mb-16">
        <p class="text-gray-200 text-base sm:text-lg leading-relaxed font-light mb-6">
          Colossus of Lagos is a premier entrepreneurship competition and festival designed to discover, develop, celebrate and empower the next generation of entrepreneurs.
        </p>
        <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light">
          Colossus of Lagos is designed to be the most exciting entrepreneurship platform in Lagos and Nigeria, and a major annual entrepreneurship competition and festival that connects ambitious entrepreneurs with capital, mentorship, business opportunities, markets and investors.
        </p>
      </div>

      <!-- Extended Platform Description Banner -->
      <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-yellow-400/20 mb-16 relative overflow-hidden bg-gradient-to-br from-[#070f1f]/90 via-[#0a1628]/95 to-[#070f1f]">
        <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-yellow-400/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="grid lg:grid-cols-12 gap-8 items-center">
          <div class="lg:col-span-8 space-y-4 text-gray-300 text-sm sm:text-base font-light leading-relaxed">
            <p>
              <strong class="text-white font-medium">Supported by the Lagos State Government</strong> as a major official partner and principal sponsor, the platform brings together emerging entrepreneurs, investors, business leaders, industry experts, government institutions, corporate organizations and the wider public to advance entrepreneurship, innovation and enterprise development.
            </p>
            <p>
              It is a competition and festival designed to discover, develop, celebrate and empower the next generation of entrepreneurs; and a platform that provides emerging entrepreneurs with opportunities to present their business ideas, receive mentorship, access opportunities, develop capabilities and compete for financial rewards.
            </p>
            <p>
              Colossus of Lagos is a major platform for entrepreneurship, innovation, entertainment that brings together entrepreneurs, aspiring business owners, investors, brands, government institutions, business leaders, industry experts, mentors and the general public.
            </p>
            <p>
              Through business pitches, training, mentorship, investor engagement and access to strategic opportunities, the platform equips entrepreneurs with the knowledge, exposure and connections needed to build and scale successful businesses.
            </p>
          </div>
          <div class="lg:col-span-4 flex flex-col gap-4">
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 text-center">
              <span class="text-3xl sm:text-4xl font-display font-extrabold text-yellow-400 block mb-1">₦60,000,000</span>
              <span class="text-xs uppercase tracking-wider text-gray-400 font-semibold">Total Prize & Grant Pool</span>
            </div>
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 text-center">
              <span class="text-3xl sm:text-4xl font-display font-extrabold text-white block mb-1">1,000+</span>
              <span class="text-xs uppercase tracking-wider text-gray-400 font-semibold">Delegates & Participants</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Vision & Mission Side-by-Side Cards -->
      <div class="grid md:grid-cols-2 gap-8">
        <div class="rounded-3xl p-8 sm:p-10 border border-yellow-400/30 bg-[#070f1f]/90 backdrop-blur-md shadow-xl hover-lift transition-all relative overflow-hidden">
          <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center text-yellow-400 mb-6">
            <i data-lucide="eye" class="w-7 h-7"></i>
          </div>
          <div class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-2">Strategic Direction</div>
          <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-4">Our Vision</h3>
          <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light">
            To establish Lagos as a leading hub for entrepreneurship and enterprise development by identifying, nurturing and empowering the next generation of business leaders.
          </p>
        </div>

        <div class="rounded-3xl p-8 sm:p-10 border border-yellow-400/30 bg-[#070f1f]/90 backdrop-blur-md shadow-xl hover-lift transition-all relative overflow-hidden">
          <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center text-yellow-400 mb-6">
            <i data-lucide="target" class="w-7 h-7"></i>
          </div>
          <div class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-2">Core Mandate</div>
          <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-4">Our Mission</h3>
          <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light">
            To create a dynamic platform that connects entrepreneurial talent with the resources, expertise, networks and opportunities required to build sustainable businesses and drive economic growth.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Target Audience Demographics -->
  <section class="py-24 bg-[#070f1f] relative border-t border-yellow-400/10">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Ecosystem Reach</span>
          <div class="h-px w-10 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">
          Audience & Demographics
        </h2>
        <p class="text-gray-400 text-xs sm:text-sm font-light">
          Engaging vibrant, aspirational urban youth alongside high-net-worth business executives and diaspora investors.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="glass-panel p-8 rounded-2xl border-t-4 border-yellow-400 hover-lift">
          <div class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-2">Primary Demographic</div>
          <h3 class="font-display text-2xl font-bold text-white mb-2">20 – 39 Years</h3>
          <p class="text-xs text-gray-400 font-light mb-6">Urban Lagosians and ambitious Nigerians across key commercial hubs.</p>
          <ul class="space-y-2.5 text-xs text-gray-300 font-light">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-yellow-400"></i> Youth founders & innovators</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-yellow-400"></i> Aspiring entrepreneurs</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-yellow-400"></i> Tech-savvy, aspirational creatives</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-yellow-400"></i> Early adopters with disposable income</li>
          </ul>
        </div>

        <div class="glass-panel p-8 rounded-2xl border-t-4 border-blue-400 hover-lift">
          <div class="text-xs font-bold text-blue-400 uppercase tracking-widest mb-2">Secondary Demographic</div>
          <h3 class="font-display text-2xl font-bold text-white mb-2">40+ Years & Diaspora</h3>
          <p class="text-xs text-gray-400 font-light mb-6">Established decision-makers, investors, and international Africans.</p>
          <ul class="space-y-2.5 text-xs text-gray-300 font-light">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-blue-400"></i> Angel investors & fund managers</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-blue-400"></i> Corporate business executives</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-blue-400"></i> Established entrepreneurs & mentors</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-blue-400"></i> Diaspora Africans investing back home</li>
          </ul>
        </div>

        <div class="glass-panel p-8 rounded-2xl border-t-4 border-purple-400 hover-lift">
          <div class="text-xs font-bold text-purple-400 uppercase tracking-widest mb-2">Tertiary Demographic</div>
          <h3 class="font-display text-2xl font-bold text-white mb-2">Broad Ecosystem</h3>
          <p class="text-xs text-gray-400 font-light mb-6">Creative industry practitioners and general business enthusiasts.</p>
          <ul class="space-y-2.5 text-xs text-gray-300 font-light">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-purple-400"></i> Digital creators & side-hustlers</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-purple-400"></i> Early-stage startup teams</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-purple-400"></i> TV reality & business competition fans</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-purple-400"></i> General public & retail consumers</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Sponsors & Partners Should Pay Attention -->
  <section class="py-24 bg-[#070f1f] relative border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7">
          <div class="inline-flex items-center gap-2 mb-3">
            <div class="h-px w-10 bg-yellow-400"></div>
            <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Value For Brands</span>
          </div>
          <h2 class="font-display text-3xl sm:text-5xl font-bold mb-6 leading-tight">
            Where Corporate Brands Meet <span class="text-gold-gradient">Entrepreneurial Ambition</span>
          </h2>
          <div class="space-y-4 text-gray-300 text-sm sm:text-base leading-relaxed font-light">
            <p>
              An unmatched opportunity for brands to become active contributors to the development of the Nigerian entrepreneurial ecosystem.
            </p>
            <p>
              Engage directly with ambitious entrepreneurs, connect with millions of potential consumers, showcase proprietary products and solutions, and demonstrate measurable commitment to Lagos economic empowerment.
            </p>
            <div class="grid sm:grid-cols-2 gap-4 pt-4">
              <div class="p-4 rounded-xl bg-[#0a1628] border border-white/5">
                <div class="font-bold text-white text-sm mb-1">High-Level Brand Visibility</div>
                <p class="text-xs text-gray-400">TV commercials, squeezebacks, billboard promos, and digital takeovers.</p>
              </div>
              <div class="p-4 rounded-xl bg-[#0a1628] border border-white/5">
                <div class="font-bold text-white text-sm mb-1">Experiential Activation</div>
                <p class="text-xs text-gray-400">Branded contestant tasks, convention exhibition booths, and product sampling.</p>
              </div>
              <div class="p-4 rounded-xl bg-[#0a1628] border border-white/5">
                <div class="font-bold text-white text-sm mb-1">Executive Presence</div>
                <p class="text-xs text-gray-400">High-table seats, keynote speaking, and red-carpet gala appearances.</p>
              </div>
              <div class="p-4 rounded-xl bg-[#0a1628] border border-white/5">
                <div class="font-bold text-white text-sm mb-1">Measurable ESG Impact</div>
                <p class="text-xs text-gray-400">Direct partnership with Lagos State Government on job creation & wealth development.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="lg:col-span-5 flex justify-center">
          <div class="glass-panel-strong p-8 rounded-3xl border border-yellow-400/30 text-center w-full max-w-md shadow-2xl">
            <div class="w-16 h-16 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center mx-auto mb-6 shadow-lg shadow-yellow-400/10">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m11 17 2 2a1 1 0 0 0 1.4 0l4.24-4.24a1 1 0 0 0 0-1.42l-2.58-2.58a1 1 0 0 0-1.42 0L13.3 12.1"/>
                <path d="m14.7 10.7-2.58-2.58a1 1 0 0 0-1.42 0L6.46 12.36a1 1 0 0 0 0 1.42l2 2"/>
                <path d="m3 14 3 3"/>
                <path d="m21 10-3-3"/>
              </svg>
            </div>
            <h3 class="font-display text-2xl font-bold text-white mb-2">Partner with Colossus of Lagos</h3>
            <p class="text-xs text-gray-400 leading-relaxed font-light mb-6">
              Join leading organizations, financial institutions, and multinationals partnering to drive sustainable enterprise development.
            </p>
            <a href="contact.php" class="btn-gold w-full py-3.5 rounded-full text-xs uppercase tracking-wider font-bold block mb-3">
              Request Sponsorship Deck
            </a>
            <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20we%20want%20to%20discuss%20sponsorship%20opportunities" target="_blank" rel="noopener" class="text-xs text-gray-400 hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5">
              <i data-lucide="message-circle" class="w-4 h-4 text-green-400"></i>
              <span>Chat with Partnership Desk</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- FAQ Section -->
  <section id="faq" class="py-24 md:py-32 bg-[#0a1628] relative">
    <div class="max-w-4xl mx-auto px-6">
      <div class="text-center mb-16">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Got Questions?</span>
          <div class="h-px w-10 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">Frequently Asked Questions</h2>
        <p class="text-gray-400 text-xs sm:text-sm font-light">
          Everything you need to know about eligibility, prize structure, and the festival format.
        </p>
      </div>

      <div class="space-y-4">
        <div class="glass-panel rounded-xl overflow-hidden border border-white/5">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors" onclick="toggleFaq(this)">
            <span class="font-semibold text-base sm:text-lg">1. Who can participate in the competition?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            The competition is open to entrepreneurs residing in Lagos State, regardless of their tribe or ethnic background, whose businesses are based in Lagos. Applicants must provide a valid Lagos State Residents Registration Agency (LASRRA) identification number.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden border border-white/5">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors" onclick="toggleFaq(this)">
            <span class="font-semibold text-base sm:text-lg">2. Do I need to have an existing business to participate?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            The competition is designed to accommodate aspiring entrepreneurs and existing business owners. Specific requirements regarding business ideas, business registration and operational status will be provided in the official eligibility guidelines.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden border border-white/5">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors" onclick="toggleFaq(this)">
            <span class="font-semibold text-base sm:text-lg">3. Can I establish my business outside Lagos State and still participate?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            No. Participants must be committed to establishing and operating their businesses in Lagos State. To qualify for participation and the competition's prizes, businesses must be established in Lagos State and not elsewhere.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden border border-white/5">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors" onclick="toggleFaq(this)">
            <span class="font-semibold text-base sm:text-lg">4. What happens after registration?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            Registered applicants will be contacted via phone call or email regarding the next steps in the selection and business pitching process. Successful candidates will be selected to participate in the Top 100 Bootcamp, where they will undergo training, mentorship and further competitive assessments.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Final Call To Action (CTA) Section -->
  <section class="py-24 bg-gradient-to-b from-[#0a1628] to-[#070f1f] relative overflow-hidden border-t border-yellow-400/10">
    <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
      <div class="w-20 h-20 rounded-full bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center mx-auto mb-6 shadow-2xl">
        <i data-lucide="rocket" class="w-10 h-10"></i>
      </div>

      <h2 class="font-display text-3xl sm:text-5xl font-black mb-6">
        Ready to Rise as the <span class="text-gold-gradient italic">Colossus of Lagos?</span>
      </h2>

      <p class="text-gray-300 text-sm sm:text-base md:text-lg leading-relaxed font-light mb-10 max-w-2xl mx-auto">
        Join thousands of ambitious entrepreneurs across Lagos. ₦30M Grand Prize, 30 × ₦1M Bootcamp Grants, over 20 top mentors, and national television exposure await you.
      </p>

      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="register.php" class="btn-gold px-10 py-4 rounded-full text-sm font-bold uppercase tracking-widest inline-flex items-center gap-3 shadow-xl shadow-yellow-400/20 hover:scale-105 transition-all w-full sm:w-auto justify-center">
          <span>Register Now</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
     
      </div>
    </div>
  </section>

  <!-- Footer & Floating WhatsApp Widget -->
  <?php include 'includes/footer.php'; ?>

  <!-- Video Modal -->
  <div id="video-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-sm"
    onclick="
        if(event.target === this) {
          this.classList.add('hidden');
          const iframe = document.getElementById('trailer-video');
          const src = iframe.src;
          iframe.src = '';
          iframe.src = src;
        }
      ">
    <div
      class="relative w-full max-w-4xl mx-4 aspect-video bg-[#0a1628] rounded-2xl overflow-hidden border border-yellow-400/20">
      <iframe id="trailer-video" class="w-full h-full" src="https://www.youtube.com/embed/O82mC5HW1rU"
        title="Colossus of Lagos Trailer" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>
      <button
        class="absolute top-4 right-4 text-white/50 hover:text-white bg-black/20 rounded-full p-2 backdrop-blur-md transition-all"
        onclick="
            document.getElementById('video-modal').classList.add('hidden');
            const iframe = document.getElementById('trailer-video');
            const src = iframe.src;
            iframe.src = '';
            iframe.src = src;
          ">
        <i data-lucide="x" class="w-6 h-6"></i>
      </button>
    </div>
  </div>

  <script>
    // Initialize Lucide icons
    // Mobile Menu Logic
    const menuBtn = document.getElementById('menu-btn');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && closeMenu && mobileMenu) {
      menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
      });

      closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
      });

      // Close menu on link click
      const mobileLinks = mobileMenu.querySelectorAll('a');
      mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
          mobileMenu.classList.add('translate-x-full');
        });
      });
    }

    lucide.createIcons();

    // Premium Hero Slider Logic
    const track = document.getElementById('slide-track');
    const slides = document.querySelectorAll('.slide-item');
    const dots = document.querySelectorAll('.slide-dot');
    const prevBtn = document.getElementById('prev-slide');
    const nextBtn = document.getElementById('next-slide');
    let currentSlide = 0;
    let slideInterval;

    function showSlide(index) {
      if (track) {
        track.style.transform = `translateX(-${index * (100 / slides.length)}%)`;
      }

      dots.forEach((dot, i) => {
        if (i === index) {
          dot.classList.add('bg-yellow-400');
          dot.classList.remove('bg-white/30');
        } else {
          dot.classList.remove('bg-yellow-400');
          dot.classList.add('bg-white/30');
        }
      });

      currentSlide = index;
    }

    function nextSlide() {
      let next = (currentSlide + 1) % slides.length;
      showSlide(next);
    }

    function prevSlide() {
      let prev = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(prev);
    }

    function startSlideShow() {
      stopSlideShow();
      slideInterval = setInterval(nextSlide, 5000); // Transitions every 5 seconds
    }

    function stopSlideShow() {
      if (slideInterval) clearInterval(slideInterval);
    }

    if (slides.length > 0) {
      // Initialize first slide as active
      showSlide(0);
      startSlideShow();

      // Dots controls
      dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
          showSlide(i);
          startSlideShow(); // Reset timer
        });
      });

      // Prev/Next controls
      if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
          prevSlide();
          startSlideShow(); // Reset timer
        });
        nextBtn.addEventListener('click', () => {
          nextSlide();
          startSlideShow(); // Reset timer
        });
      }

      // Touch swipe support for mobile
      const sliderEl = document.getElementById('slide-track') ? document.getElementById('slide-track').parentElement.parentElement : null;
      if (sliderEl) {
        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartY = 0;
        let touchEndY = 0;

        sliderEl.addEventListener('touchstart', (e) => {
          touchStartX = e.changedTouches[0].clientX;
          touchStartY = e.changedTouches[0].clientY;
          stopSlideShow();
        }, { passive: true });

        sliderEl.addEventListener('touchend', (e) => {
          touchEndX = e.changedTouches[0].clientX;
          touchEndY = e.changedTouches[0].clientY;
          const diffX = touchEndX - touchStartX;
          const diffY = touchEndY - touchStartY;
          if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 30) {
            if (diffX < 0) {
              nextSlide();
            } else {
              prevSlide();
            }
          }
          startSlideShow();
        }, { passive: true });
      }
    }

    // Navbar scroll effect
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        navbar.classList.add("nav-blur");
      } else {
        navbar.classList.remove("nav-blur");
      }
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, observerOptions);

    document
      .querySelectorAll(".section-reveal")
      .forEach((el) => observer.observe(el));

    // Count up animation
    const countObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const target = parseInt(el.getAttribute("data-target"));
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
              current += increment;
              if (current >= target) {
                el.textContent = target + (target === 500 ? "+" : "");
                clearInterval(timer);
              } else {
                el.textContent = Math.floor(current);
              }
            }, 30);
            countObserver.unobserve(el);
          }
        });
      },
      { threshold: 0.5 },
    );

    document
      .querySelectorAll(".count-up")
      .forEach((el) => countObserver.observe(el));

    // FAQ Toggle
    function toggleFaq(button) {
      const content = button.nextElementSibling;
      const icon = button.querySelector("svg");

      if (content.classList.contains("hidden")) {
        content.classList.remove("hidden");
        icon.style.transform = "rotate(45deg)";
      } else {
        content.classList.add("hidden");
        icon.style.transform = "rotate(0deg)";
      }
    }

    // Stage Card Toggle
    function toggleStage(card) {
      // Add ripple effect or expand details
      card.style.transform = "scale(0.98)";
      setTimeout(() => {
        card.style.transform = "";
      }, 200);
    }

    // Particle System
    const canvas = document.getElementById("particles");
    const ctx = canvas.getContext("2d");
    let particles = [];

    function resizeCanvas() {
      canvas.width = canvas.parentElement.clientWidth;
      canvas.height = canvas.parentElement.clientHeight;
    }

    resizeCanvas();
    window.addEventListener("resize", resizeCanvas);

    class Particle {
      constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.size = Math.random() * 2 + 0.5;
        this.speedX = Math.random() * 0.5 - 0.25;
        this.speedY = Math.random() * 0.5 - 0.25;
        this.opacity = Math.random() * 0.5 + 0.1;
      }

      update() {
        this.x += this.speedX;
        this.y += this.speedY;

        if (this.x > canvas.width) this.x = 0;
        if (this.x < 0) this.x = canvas.width;
        if (this.y > canvas.height) this.y = 0;
        if (this.y < 0) this.y = canvas.height;
      }

      draw() {
        ctx.fillStyle = `rgba(212, 175, 55, ${this.opacity})`;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
      }
    }

    function initParticles() {
      particles = [];
      for (let i = 0; i < 50; i++) {
        particles.push(new Particle());
      }
    }

    function animateParticles() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      particles.forEach((particle) => {
        particle.update();
        particle.draw();
      });
      requestAnimationFrame(animateParticles);
    }

    initParticles();
    animateParticles();

    // Newsletter Subscription AJAX
    const newsletterForm = document.getElementById('newsletterForm');
    const newsletterAlert = document.getElementById('newsletterAlert');
    if (newsletterForm) {
      newsletterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(newsletterForm);
        fetch('process-newsletter.php', {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          newsletterAlert.classList.remove('hidden', 'bg-red-500/20', 'text-red-300', 'bg-green-500/20', 'text-green-300');
          if (data.status === 'success') {
            newsletterAlert.classList.add('bg-green-500/20', 'text-green-300');
            newsletterAlert.textContent = data.message;
            newsletterForm.reset();
          } else {
            newsletterAlert.classList.add('bg-red-500/20', 'text-red-300');
            newsletterAlert.textContent = data.message || 'Error subscribing.';
          }
        })
        .catch(err => {
          newsletterAlert.classList.remove('hidden');
          newsletterAlert.classList.add('bg-red-500/20', 'text-red-300');
          newsletterAlert.textContent = 'Network error. Please try again.';
        });
      });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
          target.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      });
    });
  </script>
</body>

</html>