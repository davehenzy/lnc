<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lagos New Colossus | The Hustle. The Heat. The Rise.</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;700;900&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/lucide@0.262.0"></script>
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

    /* Premium Slider */
    .slide-item {
      background-size: cover;
      background-position: center;
      width: calc(100% / 6);
      height: 100%;
      flex-shrink: 0;
    }

    #slide-track {
      display: flex;
      width: 600%;
      height: 100%;
      transition: transform 1.2s cubic-bezier(0.85, 0, 0.15, 1);
    }
  </style>
</head>

<body class="antialiased text-white bg-[#0a1628] overflow-x-hidden">
  <!-- Navigation -->
  <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-6 bg-[#0a1628] border-b border-white/5">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
      <a href="index.php" class="flex items-center">
        <img src="assets/slider/LASG-LNC.svg" alt="Lagos New Colossus Logo"
          class="h-10 md:h-16 w-auto object-contain" />
      </a>

      <div class="hidden md:flex items-center gap-12">
        <a href="index.php" class="text-sm font-medium text-white transition-colors">Home</a>
        <a href="about.php" class="text-sm font-medium text-gray-300 hover:text-yellow-400 transition-colors">About</a>
        <a href="eligibility.php"
          class="text-sm font-medium text-gray-300 hover:text-yellow-400 transition-colors">Eligibility</a>
        <a href="faq.php" class="text-sm font-medium text-gray-300 hover:text-yellow-400 transition-colors">FAQ</a>

      </div>

      <div class="flex items-center gap-4">
        <a href="register.php"
          class="hidden sm:block btn-gold px-6 py-2.5 rounded-full text-xs md:text-sm uppercase tracking-wider">
          Register Now
        </a>
        <button id="menu-btn"
          class="md:hidden w-10 h-10 flex items-center justify-center text-gray-300 hover:text-yellow-400 transition-colors">
          <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu"
    class="fixed inset-0 z-[60] bg-[#0a1628]/95 backdrop-blur-xl translate-x-full transition-transform duration-500 md:hidden">
    <div class="flex flex-col h-full p-8">
      <div class="flex items-center justify-between mb-12">
        <img src="assets/slider/LASG-LNC.svg" alt="Logo" class="h-8 w-auto" />
        <button id="close-menu" class="text-gray-400 hover:text-white">
          <i data-lucide="x" class="w-8 h-8"></i>
        </button>
      </div>

      <nav class="flex flex-col gap-6">
        <a href="index.php" class="text-2xl font-bold text-yellow-400">Home</a>
        <a href="about.php" class="text-2xl font-bold text-gray-300 hover:text-yellow-400">About</a>
        <a href="eligibility.php" class="text-2xl font-bold text-gray-300 hover:text-yellow-400">Eligibility</a>
        <a href="faq.php" class="text-2xl font-bold text-gray-300 hover:text-yellow-400">FAQ</a>

      </nav>

      <div class="mt-auto pt-8 border-t border-white/10">
        <a href="register.php" class="btn-gold w-full py-4 rounded-full text-center uppercase tracking-widest block">
          Register Now
        </a>
      </div>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="relative w-full pt-[112px] md:pt-[130px] overflow-hidden bg-[#0a1628]">
    <div class="relative w-full aspect-[16/9] md:aspect-[21/9] group shadow-2xl shadow-black/80">
      <!-- Premium background slider -->
      <div class="absolute inset-0 z-0 bg-[#0a1628] overflow-hidden">
        <div id="slide-track">
          <div class="slide-item" style="background-image: url('assets/slider/Artboard 1.png');"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Artboard 2.png');"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Artboard 3.png');"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Artboard 4.png');"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Artboard 5.png');"></div>
          <div class="slide-item" style="background-image: url('assets/slider/Artboard 6.png');"></div>
        </div>
      </div>

      <canvas id="particles"></canvas>

      <!-- Gradient overlay for premium contrast and edge blending -->
      <div
        class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#0a1628]/40 z-10 pointer-events-none">
      </div>

      <!-- Slider Navigation Arrows -->
      <button id="prev-slide"
        class="absolute left-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full border border-yellow-400/20 bg-[#0a1628]/60 text-yellow-400 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1628] hover:border-yellow-400 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex">
        <i data-lucide="chevron-left" class="w-6 h-6"></i>
      </button>
      <button id="next-slide"
        class="absolute right-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full border border-yellow-400/20 bg-[#0a1628]/60 text-yellow-400 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1628] hover:border-yellow-400 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex">
        <i data-lucide="chevron-right" class="w-6 h-6"></i>
      </button>

      <!-- Slider Indicators (Dots) -->
      <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex gap-2.5">
        <button class="w-2.5 h-2.5 rounded-full bg-yellow-400 transition-all duration-300 slide-dot"
          data-slide="0"></button>
        <button
          class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot"
          data-slide="1"></button>
        <button
          class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot"
          data-slide="2"></button>
        <button
          class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot"
          data-slide="3"></button>
        <button
          class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot"
          data-slide="4"></button>
        <button
          class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot"
          data-slide="5"></button>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="relative py-24 md:py-32">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-2 gap-16 items-center section-reveal">
        <div>
          <div class="inline-flex items-center gap-2 mb-6">
            <div class="h-px w-12 bg-yellow-400"></div>
            <span class="text-yellow-400 text-sm font-semibold tracking-widest uppercase">The Vision</span>
          </div>

          <h2 class="font-display text-4xl md:text-5xl font-bold mb-6 leading-tight">
            In the heart of Africa's most
            <span class="text-gold-gradient">electrifying city</span>
          </h2>

          <p class="text-gray-400 text-lg leading-relaxed mb-6">
            Lagos is not just a location; it is a furnace of potential where
            dreams are forged into reality and destiny favours the relentless.
            This is where the audacious come to build and the visionary come
            to stand.
          </p>

          <p class="text-gray-400 text-lg leading-relaxed mb-8">
            Lagos New Colossus is an 8-week entrepreneurial reality and
            competition show searching for talented and audacious young
            Lagosian entrepreneurs. It is more than a competition; it is a
            catalyst for economic transformation.
          </p>

          <div class="flex flex-wrap gap-4">
            <div class="flex items-center gap-2 text-sm text-gray-300">
              <i data-lucide="check-circle" class="w-5 h-5 text-yellow-400"></i>
              <span>100 Entrepreneurs win cash prizes</span>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-300">
              <i data-lucide="check-circle" class="w-5 h-5 text-yellow-400"></i>
              <span>3-Month mentorship with industry titans</span>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-300">
              <i data-lucide="check-circle" class="w-5 h-5 text-yellow-400"></i>
              <span>National TV Exposure</span>
            </div>
          </div>
        </div>

        <div class="relative">
          <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-transparent rounded-2xl blur-2xl"></div>
          <div class="relative glass-panel-strong rounded-3xl p-8 flex flex-col items-center">
            <div class="w-full aspect-square rounded-2xl flex items-center justify-center p-4">
              <img src="assets/locations/logo.png" alt="Lagos New Colossus Logo"
                class="max-w-full max-h-full object-contain">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Show Mechanics -->
  <section id="mechanics" class="relative py-24 md:py-32"
    style="background: linear-gradient(160deg, #083B74 0%, #070f1f 50%, #0a1628 100%);">
    <div class="absolute inset-0 opacity-5 pointer-events-none"
      style="background-image: radial-gradient(circle at 1px 1px, #d4af37 1px, transparent 0); background-size: 40px 40px;">
    </div>
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-6">
          <div class="h-px w-12 bg-yellow-400"></div>
          <span class="text-yellow-400 text-sm font-semibold tracking-widest uppercase">The Journey</span>
          <div class="h-px w-12 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold">
          Show Mechanics
        </h2>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stage 1 -->
        <div class="stage-card rounded-2xl p-8 section-reveal group cursor-pointer" onclick="toggleStage(this)">
          <div class="flex items-center justify-between mb-6">
            <span
              class="text-6xl font-black text-yellow-400/20 group-hover:text-yellow-400/40 transition-colors">01</span>
            <div
              class="w-12 h-12 rounded-full bg-yellow-400/10 flex items-center justify-center group-hover:bg-yellow-400/20 transition-colors">
              <i data-lucide="search" class="w-6 h-6 text-yellow-400"></i>
            </div>
          </div>
          <h3 class="text-xl font-bold mb-3 text-white group-hover:text-yellow-400 transition-colors">
            The Search
          </h3>
          <p class="text-gray-400 text-sm leading-relaxed mb-4">
            4-week registration drive with auditions across Ikeja, Badagry,
            Ikorodu, Lagos Island, and Epe.
          </p>
          <div class="flex items-center gap-2 text-yellow-400 text-sm font-semibold">
            <span>150 Candidates</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </div>
        </div>

        <!-- Stage 2 -->
        <div class="stage-card rounded-2xl p-8 section-reveal group cursor-pointer" style="transition-delay: 0.1s"
          onclick="toggleStage(this)">
          <div class="flex items-center justify-between mb-6">
            <span
              class="text-6xl font-black text-yellow-400/20 group-hover:text-yellow-400/40 transition-colors">02</span>
            <div
              class="w-12 h-12 rounded-full bg-yellow-400/10 flex items-center justify-center group-hover:bg-yellow-400/20 transition-colors">
              <i data-lucide="rocket" class="w-6 h-6 text-yellow-400"></i>
            </div>
          </div>
          <h3 class="text-xl font-bold mb-3 text-white group-hover:text-yellow-400 transition-colors">
            The Launch
          </h3>
          <p class="text-gray-400 text-sm leading-relaxed mb-4">
            Grand opening ceremony introducing 20 finalists who enter the
            Colossus House for the 8-week journey.
          </p>
          <div class="flex items-center gap-2 text-yellow-400 text-sm font-semibold">
            <span>20 Finalists</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </div>
        </div>

        <!-- Stage 3 -->
        <div class="stage-card rounded-2xl p-8 section-reveal group cursor-pointer" style="transition-delay: 0.2s"
          onclick="toggleStage(this)">
          <div class="flex items-center justify-between mb-6">
            <span
              class="text-6xl font-black text-yellow-400/20 group-hover:text-yellow-400/40 transition-colors">03</span>
            <div
              class="w-12 h-12 rounded-full bg-yellow-400/10 flex items-center justify-center group-hover:bg-yellow-400/20 transition-colors">
              <i data-lucide="swords" class="w-6 h-6 text-yellow-400"></i>
            </div>
          </div>
          <h3 class="text-xl font-bold mb-3 text-white group-hover:text-yellow-400 transition-colors">
            The Showdown
          </h3>
          <p class="text-gray-400 text-sm leading-relaxed mb-4">
            Real-world business tasks, weekly evictions, expert mentorship,
            and high-pressure challenges on national TV.
          </p>
          <div class="flex items-center gap-2 text-yellow-400 text-sm font-semibold">
            <span>8 Weeks</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </div>
        </div>

        <!-- Stage 4 -->
        <div class="stage-card rounded-2xl p-8 section-reveal group cursor-pointer" style="transition-delay: 0.3s"
          onclick="toggleStage(this)">
          <div class="flex items-center justify-between mb-6">
            <span
              class="text-6xl font-black text-yellow-400/20 group-hover:text-yellow-400/40 transition-colors">04</span>
            <div
              class="w-12 h-12 rounded-full bg-yellow-400/10 flex items-center justify-center group-hover:bg-yellow-400/20 transition-colors">
              <i data-lucide="crown" class="w-6 h-6 text-yellow-400"></i>
            </div>
          </div>
          <h3 class="text-xl font-bold mb-3 text-white group-hover:text-yellow-400 transition-colors">
            The Finale
          </h3>
          <p class="text-gray-400 text-sm leading-relaxed mb-4">
            Live gala event crowning the champion. Grand Prize awarded, plus
            100 entrepreneurs receive cash prizes.
          </p>
          <div class="flex items-center gap-2 text-yellow-400 text-sm font-semibold">
            <span>Grand Prize</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Eligibility Section -->
  <section id="eligibility" class="relative py-24 md:py-32">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-2 gap-16 items-start">
        <div class="section-reveal">
          <div class="inline-flex items-center gap-2 mb-6">
            <div class="h-px w-12 bg-yellow-400"></div>
            <span class="text-yellow-400 text-sm font-semibold tracking-widest uppercase">Join The Competition</span>
          </div>
          <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">
            Are You The Next <span class="text-gold-gradient">Colossus?</span>
          </h2>
          <p class="text-gray-400 text-lg mb-8">
            We're searching for Lagos-based entrepreneurs aged 20-40 who have
            what it takes to build the next great African company.
          </p>

          <div class="space-y-4">
            <div
              class="flex items-start gap-4 p-4 rounded-xl bg-[#0f1d32] border border-yellow-400/10 hover:border-yellow-400/30 transition-colors">
              <div class="w-10 h-10 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0 mt-1">
                <i data-lucide="map-pin" class="w-5 h-5 text-yellow-400"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  Lagos-Based Entrepreneur
                </h4>
                <p class="text-sm text-gray-400">
                  Must prove residence in Lagos with LASRRA or utility bill.
                  Business must be situated in Lagos.
                </p>
              </div>
            </div>

            <div
              class="flex items-start gap-4 p-4 rounded-xl bg-[#0f1d32] border border-yellow-400/10 hover:border-yellow-400/30 transition-colors">
              <div class="w-10 h-10 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0 mt-1">
                <i data-lucide="calendar" class="w-5 h-5 text-yellow-400"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  Age 20 - 40 Years
                </h4>
                <p class="text-sm text-gray-400">
                  Open to graduates and undergraduates of Higher Institutions.
                </p>
              </div>
            </div>

            <div
              class="flex items-start gap-4 p-4 rounded-xl bg-[#0f1d32] border border-yellow-400/10 hover:border-yellow-400/30 transition-colors">
              <div class="w-10 h-10 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0 mt-1">
                <i data-lucide="home" class="w-5 h-5 text-yellow-400"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  Residency Requirement
                </h4>
                <p class="text-sm text-gray-400">
                  Must be willing to reside in the Colossus House for the full
                  8-week duration.
                </p>
              </div>
            </div>

            <div
              class="flex items-start gap-4 p-4 rounded-xl bg-[#0f1d32] border border-yellow-400/10 hover:border-yellow-400/30 transition-colors">
              <div class="w-10 h-10 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0 mt-1">
                <i data-lucide="heart-pulse" class="w-5 h-5 text-yellow-400"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  Excellent Health
                </h4>
                <p class="text-sm text-gray-400">
                  Must be in excellent physical and mental health to
                  participate.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="section-reveal lg:sticky lg:top-24">
          <div class="glass-panel rounded-2xl p-8 border-yellow-400/20 relative overflow-hidden group">
            <!-- Decorative background element -->
            <div
              class="absolute -top-24 -right-24 w-48 h-48 bg-yellow-400/10 rounded-full blur-3xl transition-all duration-700 group-hover:bg-yellow-400/20">
            </div>

            <div class="relative z-10 text-center">
              <div
                class="w-20 h-20 bg-yellow-400/10 rounded-2xl flex items-center justify-center mx-auto mb-8 transform transition-transform duration-500 group-hover:scale-110 group-hover:rotate-3">
                <i data-lucide="rocket" class="w-10 h-10 text-yellow-400"></i>
              </div>

              <h3 class="font-display text-3xl font-bold mb-4">
                Ready to Change Your Future?
              </h3>

              <p class="text-gray-400 mb-8 leading-relaxed">
                Join thousands of aspiring entrepreneurs in the most prestigious business competition in Lagos. Your
                journey to the New Colossus starts here.
              </p>

              <div class="space-y-4">
                <a href="register.php"
                  class="block w-full btn-gold py-4 rounded-xl text-lg font-bold uppercase tracking-widest shadow-lg shadow-yellow-400/10 hover:shadow-yellow-400/20 transition-all text-center">
                  Register Now
                </a>

                <div class="flex items-center justify-center gap-4 text-sm text-gray-500">
                  <span class="flex items-center gap-1">
                    <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                    Free Entry
                  </span>
                  <span class="w-1 h-1 bg-gray-700 rounded-full"></span>
                  <span class="flex items-center gap-1">
                    <i data-lucide="clock" class="w-4 h-4 text-yellow-400/60"></i>
                    Limited Slots
                  </span>
                </div>
              </div>

              <div class="mt-12 pt-8 border-t border-white/5">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- Impact Section -->
  <section id="impact" class="relative py-24 md:py-32 bg-[#070f1f]">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-6">
          <div class="h-px w-12 bg-yellow-400"></div>
          <span class="text-yellow-400 text-sm font-semibold tracking-widest uppercase">The Impact</span>
          <div class="h-px w-12 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
          Transforming Lagos, <br /><span class="text-gold-gradient">One Entrepreneur at a Time</span>
        </h2>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="glass-panel rounded-2xl p-8 text-center hover-lift section-reveal">
          <div class="w-16 h-16 rounded-full bg-yellow-400/10 flex items-center justify-center mx-auto mb-6">
            <i data-lucide="banknote" class="w-8 h-8 text-yellow-400"></i>
          </div>
          <h3 class="text-2xl font-bold mb-3">Direct Cash Support</h3>
          <p class="text-gray-400">
            Over 100 entrepreneurs receive direct cash prizes and grants to
            scale their businesses.
          </p>
        </div>

        <div class="glass-panel rounded-2xl p-8 text-center hover-lift section-reveal" style="transition-delay: 0.1s">
          <div class="w-16 h-16 rounded-full bg-yellow-400/10 flex items-center justify-center mx-auto mb-6">
            <i data-lucide="graduation-cap" class="w-8 h-8 text-yellow-400"></i>
          </div>
          <h3 class="text-2xl font-bold mb-3">Mentorship Support</h3>
          <p class="text-gray-400">
            mentorship with leaders.
          </p>
        </div>

        <div class="glass-panel rounded-2xl p-8 text-center hover-lift section-reveal" style="transition-delay: 0.2s">
          <div class="w-16 h-16 rounded-full bg-yellow-400/10 flex items-center justify-center mx-auto mb-6">
            <i data-lucide="globe" class="w-8 h-8 text-yellow-400"></i>
          </div>
          <h3 class="text-2xl font-bold mb-3">Global Exposure</h3>
          <p class="text-gray-400">
            Showcasing top 20 on global stage, inspiring millions of viewers
            across major TV networks.
          </p>
        </div>
      </div>

      <!-- <div class="mt-16 glass-panel rounded-2xl p-8 md:p-12 section-reveal">
          <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
              <h3 class="font-display text-3xl font-bold mb-4">
                Government Backed. <br />Private Sector Driven.
              </h3>
              <p class="text-gray-400 mb-6">
                Lagos State Government through the Ministry of Wealth Creation
                and Employment partners with Bravopoints International to create
                a de-risked, high-impact environment for entrepreneurs and
                investors alike.
              </p>
              <div class="flex items-center gap-4">
                <div
                  class="h-12 w-12 rounded-full bg-yellow-400/20 flex items-center justify-center"
                >
                  <i
                    data-lucide="shield-check"
                    class="w-6 h-6 text-yellow-400"
                  ></i>
                </div>
                <div>
                  <div class="font-semibold">Official State Partnership</div>
                  <div class="text-sm text-gray-500">
                    Ministry of Wealth Creation & Employment
                  </div>
                </div>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div
                class="rounded-xl p-6 text-center border border-[#083B74]/60" style="background: linear-gradient(135deg, #083B74 0%, #0a1628 100%);"
              >
                <div class="text-3xl font-bold text-gold-gradient mb-1">
                  500+
                </div>
                <div class="text-xs text-gray-500 uppercase tracking-wider">
                  Entrepreneurs Trained
                </div>
              </div>
              <div
                class="rounded-xl p-6 text-center border border-[#083B74]/60" style="background: linear-gradient(135deg, #083B74 0%, #0a1628 100%);"
              >
                <div class="text-3xl font-bold text-gold-gradient mb-1">
                  100
                </div>
                <div class="text-xs text-gray-500 uppercase tracking-wider">
                  Cash Winners
                </div>
              </div>
              <div
                class="rounded-xl p-6 text-center border border-[#083B74]/60" style="background: linear-gradient(135deg, #083B74 0%, #0a1628 100%);"
              >
                <div class="text-3xl font-bold text-gold-gradient mb-1">
                  30+
                </div>
                <div class="text-xs text-gray-500 uppercase tracking-wider">
                  Mentors
                </div>
              </div>
              <div
                class="rounded-xl p-6 text-center border border-[#083B74]/60" style="background: linear-gradient(135deg, #083B74 0%, #0a1628 100%);"
              >
                <div class="text-3xl font-bold text-gold-gradient mb-1">
                  Millions
                </div>
                <div class="text-xs text-gray-500 uppercase tracking-wider">
                  Of Viewers
                </div>
              </div>
            </div>
          </div>
        </div> -->
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq" class="relative py-24 md:py-32">
    <div class="max-w-4xl mx-auto px-6">
      <div class="text-center mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-6">
          <div class="h-px w-12 bg-yellow-400"></div>
          <span class="text-yellow-400 text-sm font-semibold tracking-widest uppercase">Got Questions?</span>
          <div class="h-px w-12 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-4xl md:text-5xl font-bold">
          Frequently Asked Questions
        </h2>
      </div>

      <div class="space-y-4 section-reveal">
        <div class="glass-panel rounded-xl overflow-hidden">
          <button
            class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors"
            onclick="toggleFaq(this)">
            <span class="font-semibold text-lg">Who is eligible to participate?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400">
            Participation is open to graduates and undergraduates who are
            residents of Lagos, between the ages of 20 and 40. You must have a
            commercially viable business idea and be willing to reside in the
            Colossus House for 8 weeks.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden">
          <button
            class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors"
            onclick="toggleFaq(this)">
            <span class="font-semibold text-lg">What kind of business ideas are you looking for?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400">
            Lagos New Colossus is looking for innovative, commercially viable, and scalable
            business ideas that are sustainable and have the potential to
            create real economic and social impact within Lagos.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden">
          <button
            class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors"
            onclick="toggleFaq(this)">
            <span class="font-semibold text-lg">Will the organizers take ownership of my business?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400">
            No. The producers of Lagos New Colossus will not take ownership,
            shares, or management control of any winning business. The
            entrepreneur retains full ownership and responsibility.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden">
          <button
            class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors"
            onclick="toggleFaq(this)">
            <span class="font-semibold text-lg">How do I audition?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400">
            You can audition by choosing any of five audition centres across
            Lagos: Lagos Island, Ikeja, Ikorodu, Badagry, or Epe. First,
            complete the online registration form.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden">
          <button
            class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors"
            onclick="toggleFaq(this)">
            <span class="font-semibold text-lg">What is the selection process?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400">
            Stage 1: Online Registration. Stage 2: Auditions. Stage 3: Top 150
            Bootcamp (3-day intensive). Stage 4: Top 20 selected for the
            Colossus House and 8-week main show.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Audition Centers Section -->
  <section class="py-24 bg-[#070f1f] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-yellow-400/20 to-transparent">
    </div>

    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-6">
          <div class="h-px w-12 bg-yellow-400"></div>
          <span class="text-yellow-400 text-sm font-semibold tracking-widest uppercase">Visit Your Region</span>
          <div class="h-px w-12 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-4xl md:text-5xl font-bold">Audition <span class="text-gold-gradient">Centers</span>
        </h2>
        <p class="text-gray-400 mt-4 max-w-2xl mx-auto">Find the nearest center to your location and begin your journey.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
        <!-- Ikeja -->
        <div class="glass-panel rounded-2xl overflow-hidden group section-reveal">
          <div class="h-48 overflow-hidden relative">
            <img src="assets/locations/ikeja.jpg" alt="Ikeja Center"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-navy to-transparent opacity-60"></div>
            <div class="absolute bottom-4 left-4">
              <span
                class="bg-yellow-400 text-navy text-[10px] font-bold px-2 py-1 rounded uppercase tracking-tighter">Main
                Center</span>
            </div>
          </div>
          <div class="p-5">
            <h4 class="font-bold text-white mb-1">Ikeja</h4>
            <p class="text-xs text-gray-400">The Secretariat, Alausa</p>
          </div>
        </div>

        <!-- Badagry -->
        <div class="glass-panel rounded-2xl overflow-hidden group section-reveal" style="transition-delay: 0.1s">
          <div class="h-48 overflow-hidden relative">
            <img src="assets/locations/badagry.jpg" alt="Badagry Center"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-navy to-transparent opacity-60"></div>
          </div>
          <div class="p-5">
            <h4 class="font-bold text-white mb-1">Badagry</h4>
            <p class="text-xs text-gray-400">Local Government Secretariat</p>
          </div>
        </div>

        <!-- Ikorodu -->
        <div class="glass-panel rounded-2xl overflow-hidden group section-reveal" style="transition-delay: 0.2s">
          <div class="h-48 overflow-hidden relative">
            <img src="assets/locations/ikorodu.jpg" alt="Ikorodu Center"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-navy to-transparent opacity-60"></div>
          </div>
          <div class="p-5">
            <h4 class="font-bold text-white mb-1">Ikorodu</h4>
            <p class="text-xs text-gray-400">Town Hall, Ikorodu</p>
          </div>
        </div>

        <!-- Lagos Island -->
        <div class="glass-panel rounded-2xl overflow-hidden group section-reveal" style="transition-delay: 0.3s">
          <div class="h-48 overflow-hidden relative">
            <img src="assets/locations/lagos-island.webp" alt="Lagos Island Center"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-navy to-transparent opacity-60"></div>
          </div>
          <div class="p-5">
            <h4 class="font-bold text-white mb-1">Lagos Island</h4>
            <p class="text-xs text-gray-400">Freedom Park, Broad Street</p>
          </div>
        </div>

        <!-- Epe -->
        <div class="glass-panel rounded-2xl overflow-hidden group section-reveal" style="transition-delay: 0.4s">
          <div class="h-48 overflow-hidden relative">
            <img src="assets/locations/epe.jpg" alt="Epe Center"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-navy to-transparent opacity-60"></div>
          </div>
          <div class="p-5">
            <h4 class="font-bold text-white mb-1">Epe</h4>
            <p class="text-xs text-gray-400">Epe Recreation Center</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="relative py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/10 via-transparent to-yellow-400/10"></div>
    <div
      class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23d4af37\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20">
    </div>

    <div class="relative max-w-4xl mx-auto px-6 text-center section-reveal">
      <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
        The Future of Lagos <br /><span class="text-gold-gradient">Starts With You</span>
      </h2>
      <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto">
        Join 500+ entrepreneurs in the most electrifying business competition
        in Africa. Register now for your chance to become the next Colossus of
        Lagos.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="#register"
          class="btn-gold px-10 py-5 rounded-full text-lg uppercase tracking-widest flex items-center gap-3">
          <span>Register Now</span>
          <i data-lucide="arrow-right" class="w-5 h-5"></i>
        </a>

      </div>


    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-[#d4af37]/10 py-16 bg-[#070f1f]">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-4 gap-12 mb-12">
        <div class="md:col-span-2">
          <div class="flex items-center gap-3 mb-6">
            <img src="assets/slider/LASG-LNC.svg" alt="Lagos New Colossus" class="h-12 w-auto">
          </div>
          <p class="text-gray-500 text-sm max-w-sm leading-relaxed mb-6">
            An entrepreneurial reality and competition show developed in
            partnership with Lagos State Government to identify, support, and
            scale high-potential entrepreneurs driving jobs, innovation, and
            economic growth.
          </p>
          <div class="flex items-center gap-4">
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all">
              <i data-lucide="instagram" class="w-4 h-4"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all">
              <i data-lucide="twitter" class="w-4 h-4"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all">
              <i data-lucide="facebook" class="w-4 h-4"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all">
              <i data-lucide="youtube" class="w-4 h-4"></i>
            </a>
          </div>
        </div>

        <div>
          <h4 class="font-semibold mb-6 text-[#d4af37] text-sm tracking-wider uppercase">
            Navigation
          </h4>
          <ul class="space-y-3 text-sm text-gray-500">
            <li>
              <a href="index.php" class="hover:text-white transition-colors">Home</a>
            </li>
            <li>
              <a href="about.php" class="hover:text-white transition-colors">About</a>
            </li>
            <li>
              <a href="eligibility.php" class="hover:text-white transition-colors">Eligibility</a>
            </li>
            <li>
              <a href="faq.php" class="hover:text-white transition-colors">FAQ</a>
            </li>
            <li>
              <a href="register.php" class="hover:text-white transition-colors">Register</a>
            </li>

          </ul>
        </div>


      </div>

      <div
        class="border-t border-[#d4af37]/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
        <p class="text-sm text-gray-600">
          © 2026 Lagos New Colossus. All rights reserved.
        </p>
        <p class="text-sm text-gray-600">
          Produced by Bravopoints International Limited <span class="hidden md:inline mx-2">|</span> Design by <a
            href="https://linktr.ee/techiextract" target="_blank"
            class="hover:text-white transition-colors">techieXtract</a>
        </p>
      </div>
    </div>
  </footer>

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
        title="Lagos New Colossus Trailer" frameborder="0"
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