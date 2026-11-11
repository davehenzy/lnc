<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eligibility | Colossus of Lagos</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap"
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

    @keyframes float {

      0%,
      100% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-20px);
      }
    }

    @keyframes gradientFlow {
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

    @keyframes pulse-ring {
      0% {
        transform: scale(0.8);
        opacity: 1;
      }

      100% {
        transform: scale(1.3);
        opacity: 0;
      }
    }

    .animate-float {
      animation: float 6s ease-in-out infinite;
    }

    .text-gold-gradient {
      background: linear-gradient(135deg,
          var(--gold) 0%,
          var(--gold-light) 50%,
          var(--gold) 100%);
      background-size: 200% auto;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: gradientFlow 4s ease infinite;
    }

    .text-gold-gradient-static {
      background: linear-gradient(135deg,
          var(--gold) 0%,
          var(--gold-light) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .glass-panel {
      background: rgba(15, 29, 50, 0.6);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(212, 175, 55, 0.15);
    }

    .glass-panel-strong {
      background: rgba(15, 29, 50, 0.85);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .hover-lift {
      transition:
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.4s ease;
    }

    .hover-lift:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .section-reveal {
      opacity: 0;
      transform: translateY(40px);
      transition:
        opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1),
        transform 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .section-reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .reveal-left {
      opacity: 0;
      transform: translateX(-60px);
      transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .reveal-left.visible {
      opacity: 1;
      transform: translateX(0);
    }

    .reveal-right {
      opacity: 0;
      transform: translateX(60px);
      transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .reveal-right.visible {
      opacity: 1;
      transform: translateX(0);
    }

    .nav-blur {
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .btn-gold {
      background: linear-gradient(135deg, var(--gold), var(--gold-dark));
      color: var(--navy);
      font-weight: 700;
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
      overflow: hidden;
    }

    .btn-gold::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg,
          transparent,
          rgba(255, 255, 255, 0.3),
          transparent);
      transition: left 0.5s ease;
    }

    .btn-gold:hover::before {
      left: 100%;
    }

    .btn-gold:hover {
      transform: scale(1.05);
      box-shadow: 0 0 40px rgba(212, 175, 55, 0.4);
    }

    .btn-outline-gold {
      border: 1.5px solid rgba(212, 175, 55, 0.4);
      color: var(--gold);
      transition: all 0.3s ease;
    }

    .btn-outline-gold:hover {
      background: rgba(212, 175, 55, 0.1);
      border-color: var(--gold);
      box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
    }

    .requirement-card {
      background: linear-gradient(145deg,
          rgba(15, 29, 50, 0.9),
          rgba(10, 22, 40, 0.95));
      border: 1px solid rgba(212, 175, 55, 0.1);
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .requirement-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 3px;
      height: 100%;
      background: var(--gold);
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.4s ease;
    }

    .requirement-card:hover::before {
      transform: scaleY(1);
    }

    .requirement-card:hover {
      border-color: rgba(212, 175, 55, 0.3);
      transform: translateX(5px);
    }

    .check-pulse {
      position: relative;
    }

    .check-pulse::after {
      content: "";
      position: absolute;
      inset: -4px;
      border-radius: 50%;
      border: 2px solid var(--gold);
      animation: pulse-ring 2s ease-out infinite;
    }

    .process-step {
      position: relative;
    }

    .process-step::after {
      content: "";
      position: absolute;
      top: 50%;
      right: -50%;
      width: 100%;
      height: 2px;
      background: linear-gradient(to right, var(--gold), transparent);
      transform: translateY(-50%);
    }

    .process-step:last-child::after {
      display: none;
    }

    @media (max-width: 768px) {
      .process-step::after {
        display: none;
      }
    }

    .location-card {
      transition: all 0.4s ease;
      cursor: pointer;
    }

    .location-card:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 20px 40px rgba(212, 175, 55, 0.15);
      border-color: var(--gold);
    }

    .location-card.active {
      border-color: var(--gold);
      background: rgba(212, 175, 55, 0.05);
    }

    .progress-bar {
      height: 4px;
      background: rgba(212, 175, 55, 0.2);
      border-radius: 2px;
      overflow: hidden;
    }

    .progress-bar-fill {
      height: 100%;
      background: linear-gradient(90deg, var(--gold), var(--gold-light));
      border-radius: 2px;
      transition: width 0.6s ease;
    }
  </style>
</head>

<body class="antialiased text-white bg-[#0a1628] overflow-x-hidden">
  <!-- Navigation -->
  <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-4 bg-[#070f1f]/90 backdrop-blur-md border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
      <a href="index.php" class="flex items-center">
        <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo"
          class="h-10 md:h-14 w-auto object-contain" />
      </a>

      <div class="hidden md:flex items-center gap-8">
        <a href="index.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">Home</a>
        <a href="about.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">About</a>
        <a href="eligibility.php" class="text-sm font-semibold text-[#d4af37] transition-colors border-b-2 border-[#d4af37] pb-1">Eligibility</a>
        <a href="faq.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">FAQ</a>
      </div>

      <div class="flex items-center gap-4">
        <a href="register.php"
          class="hidden sm:inline-flex btn-gold px-6 py-2.5 rounded-full text-xs md:text-sm uppercase tracking-wider items-center gap-2">
          <span>Register Now</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <button id="menu-btn"
          class="md:hidden w-10 h-10 flex items-center justify-center text-gray-300 hover:text-[#d4af37] transition-colors">
          <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu"
    class="fixed inset-0 z-[60] bg-[#070f1f]/98 backdrop-blur-2xl translate-x-full transition-transform duration-500 md:hidden">
    <div class="flex flex-col h-full p-8">
      <div class="flex items-center justify-between mb-12">
        <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" class="h-9 w-auto" />
        <button id="close-menu" class="text-gray-400 hover:text-white">
          <i data-lucide="x" class="w-8 h-8"></i>
        </button>
      </div>

      <nav class="flex flex-col gap-6 text-xl font-bold">
        <a href="index.php" class="text-gray-300 hover:text-[#d4af37]">Home</a>
        <a href="about.php" class="text-gray-300 hover:text-[#d4af37]">About</a>
        <a href="eligibility.php" class="text-[#d4af37]">Eligibility</a>
        <a href="faq.php" class="text-gray-300 hover:text-[#d4af37]">FAQ</a>
      </nav>

      <div class="mt-auto pt-8 border-t border-white/10">
        <a href="register.php" class="btn-gold w-full py-4 rounded-full text-center uppercase tracking-widest block font-bold">
          Register Now
        </a>
      </div>
    </div>
  </div>

  <!-- Hero Section with Duration & Audition Callouts -->
  <section class="relative min-h-[82vh] flex items-center justify-center overflow-hidden pt-[116px] md:pt-[136px] pb-16">
    <div class="absolute inset-0 bg-gradient-to-b from-[#070f1f] via-[#0a1628] to-[#070f1f]"></div>
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
      <div class="absolute top-16 left-10 w-96 h-96 bg-[#d4af37]/10 rounded-full blur-[110px] animate-float"></div>
      <div class="absolute bottom-16 right-10 w-[500px] h-[500px] bg-[#083B74]/25 rounded-full blur-[130px] animate-float" style="animation-delay: 3s"></div>
    </div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(212,175,55,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(212,175,55,0.03)_1px,transparent_1px)] bg-[size:60px_60px] pointer-events-none"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">

      <!-- Official Major Partner Badge -->
      <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full glass-panel border border-[#d4af37]/30 mb-6">
        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] animate-ping"></span>
        <span class="text-xs font-semibold tracking-wider uppercase text-[#f4d03f]">
          Official Major Partner — Lagos State Government
        </span>
      </div>

      <h1 class="font-display text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-black leading-tight mb-4">
        <span class="block text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-300">ARE YOU</span>
        <span class="block text-gold-gradient italic mt-1">ELIGIBLE?</span>
      </h1>

      <p class="font-display italic text-lg sm:text-xl text-yellow-400/90 mb-4 font-normal">
        "The Hustle. The Heat. The Rise."
      </p>

      <p class="max-w-3xl mx-auto text-base sm:text-lg text-gray-300 mb-8 leading-relaxed font-light">
        A major <strong class="text-white font-semibold">1-Month Entrepreneurship Competition & Festival</strong> developed in partnership with the <strong class="text-yellow-400">Lagos State Government</strong> to discover, fund, celebrate, and empower ambitious founders across Lagos Mainland and Lagos Island.
      </p>

      <!-- Key Parameters Strip: Duration, Registration, Audition Zones -->
      <div class="max-w-4xl mx-auto grid grid-cols-2 sm:grid-cols-4 gap-3 mb-10 text-left">
        <div class="glass-panel p-3.5 rounded-xl border border-yellow-400/20">
          <div class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold">Programme Duration</div>
          <div class="text-base sm:text-lg font-bold text-yellow-400 mt-0.5">1-Month Festival</div>
          <div class="text-[11px] text-gray-400">Fast-paced & impactful</div>
        </div>

        <div class="glass-panel p-3.5 rounded-xl border border-yellow-400/20">
          <div class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold">Application Window</div>
          <div class="text-base sm:text-lg font-bold text-white mt-0.5">2 Weeks Only</div>
          <div class="text-[11px] text-gray-400">Statewide registration</div>
        </div>

        <div class="glass-panel p-3.5 rounded-xl border border-yellow-400/20">
          <div class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold">Auditions & Pitches</div>
          <div class="text-base sm:text-lg font-bold text-yellow-400 mt-0.5">5 Major Zones</div>
          <div class="text-[11px] text-gray-400">Mainland & Island</div>
        </div>

        <div class="glass-panel p-3.5 rounded-xl border border-yellow-400/20">
          <div class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold">Grand Prize Pool</div>
          <div class="text-base sm:text-lg font-bold text-white mt-0.5">₦70M+ Total</div>
          <div class="text-[11px] text-gray-400">₦30M + 40 × ₦1M</div>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-14">
        <a href="#auditions"
          class="btn-gold px-8 py-3.5 rounded-full text-xs md:text-sm uppercase tracking-widest flex items-center gap-2">
          <span>Explore Auditions Guide</span>
          <i data-lucide="arrow-down" class="w-4 h-4"></i>
        </a>
        <a href="#duration"
          class="btn-outline-gold px-8 py-3.5 rounded-full text-xs md:text-sm uppercase tracking-widest flex items-center gap-2">
          <i data-lucide="clock" class="w-4 h-4 text-yellow-400"></i>
          <span>1-Month Timeline</span>
        </a>
        <a href="register.php"
          class="btn-gold px-8 py-3.5 rounded-full text-xs md:text-sm uppercase tracking-widest flex items-center gap-2">
          <span>Apply in 2-Week Window</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>

      <!-- 4 Golden Metrics Ribbon (Overflow-Proof & Balanced) -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-5 text-left">
        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div class="min-w-0 mb-2">
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Grand Finale Champion</div>
            <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-yellow-400 tracking-tight leading-tight whitespace-nowrap tabular-nums">₦30,000,000</div>
          </div>
          <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Awarded to the ultimate champion of the Grand Finale</p>
        </div>

        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div class="min-w-0 mb-2">
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Bootcamp Seed Grants</div>
            <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-white tracking-tight leading-tight whitespace-nowrap tabular-nums"><span class="text-yellow-400">40 ×</span> ₦1M</div>
          </div>
          <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">40 standout entrepreneurs win ₦1,000,000 each</p>
        </div>

        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div class="min-w-0 mb-2">
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Summit Delegates</div>
            <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-yellow-400 tracking-tight leading-tight whitespace-nowrap tabular-nums">1,000+</div>
          </div>
          <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Delegates attending the Entrepreneurship Convention</p>
        </div>

        <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
          <div class="min-w-0 mb-2">
            <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Total TV Viewership</div>
            <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-white tracking-tight leading-tight whitespace-nowrap tabular-nums">53M+</div>
          </div>
          <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Channels TV, TVC, Hip TV & Africa Magic nationwide</p>
        </div>
      </div>

    </div>

    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-[#070f1f] to-transparent pointer-events-none"></div>
  </section>

  <!-- Section 1: Programme Duration & Timeline Focus -->
  <section id="duration" class="relative py-24 md:py-32 bg-[#070f1f] border-t border-yellow-400/10">
    <div class="max-w-7xl mx-auto px-6">
      
      <!-- Section Header -->
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-3 mb-4">
          <div class="h-px w-12 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-[0.25em] uppercase">Programme Duration & Schedule</span>
          <div class="h-px w-12 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-black text-white tracking-tight mb-5">
          1-Month Festival: <span class="text-gold-gradient italic">Fast-Paced & Business-First</span>
        </h2>
        <p class="text-gray-300 text-base md:text-lg font-light leading-relaxed">
          Unlike traditional reality shows that sequester founders for months in an isolated house, Colossus of Lagos is an intensive <strong class="text-white">one-month entrepreneurial platform</strong> structured so active founders can accelerate their ventures without shutting down daily business operations.
        </p>
      </div>

      <!-- Duration Differentiator Banner -->
      <div class="grid md:grid-cols-3 gap-6 mb-16 section-reveal">
        <div class="rounded-2xl border border-yellow-400/30 bg-[#0a1628]/80 p-6 flex items-start gap-4 hover-lift">
          <div class="w-12 h-12 rounded-xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center flex-shrink-0">
            <i data-lucide="timer" class="w-6 h-6"></i>
          </div>
          <div>
            <h4 class="font-bold text-white text-base mb-1">Strict 2-Week Registration</h4>
            <p class="text-xs text-gray-400 font-light leading-relaxed">The call for applications is open for exactly 2 weeks. Late entries cannot be entertained due to rapid broadcast screening.</p>
          </div>
        </div>

        <div class="rounded-2xl border border-yellow-400/30 bg-[#0a1628]/80 p-6 flex items-start gap-4 hover-lift">
          <div class="w-12 h-12 rounded-xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center flex-shrink-0">
            <i data-lucide="briefcase" class="w-6 h-6"></i>
          </div>
          <div>
            <h4 class="font-bold text-white text-base mb-1">Zero Business Disruption</h4>
            <p class="text-xs text-gray-400 font-light leading-relaxed">Stage attendance is milestone-based. Founders maintain direct control and operational leadership of their existing companies.</p>
          </div>
        </div>

        <div class="rounded-2xl border border-yellow-400/30 bg-[#0a1628]/80 p-6 flex items-start gap-4 hover-lift">
          <div class="w-12 h-12 rounded-xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center flex-shrink-0">
            <i data-lucide="zap" class="w-6 h-6"></i>
          </div>
          <div>
            <h4 class="font-bold text-white text-base mb-1">High-Impact Velocity</h4>
            <p class="text-xs text-gray-400 font-light leading-relaxed">30 days packed with masterclasses, live televised pitches, corporate networking, and ₦70M+ distributed in catalytic prizes.</p>
          </div>
        </div>
      </div>

      <!-- Stage-by-Stage Timeline Progression -->
      <div class="glass-panel rounded-3xl p-6 sm:p-10 border border-yellow-400/20 section-reveal">
        <h3 class="font-display text-2xl font-bold text-white mb-8 text-center sm:text-left flex items-center gap-3">
          <i data-lucide="calendar-days" class="w-6 h-6 text-yellow-400"></i>
          <span>Official 6-Stage Programme Roadmap</span>
        </h3>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          
          <!-- Stage 1 -->
          <div class="rounded-2xl bg-[#0a1628] border border-white/5 p-6 relative hover:border-yellow-400/40 transition-all">
            <div class="flex items-center justify-between mb-3">
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-400 text-[#070f1f]">Stage 1</span>
              <span class="text-xs text-yellow-400 font-semibold">2-Week Window</span>
            </div>
            <h4 class="font-bold text-white text-base mb-2">Call for Registrations</h4>
            <p class="text-xs text-gray-400 leading-relaxed font-light">Online application intake across Lagos State. Business verification, concept review, and shortlisting for regional pitch rounds.</p>
            <div class="mt-4 pt-3 border-t border-white/5 text-[11px] text-gray-400 flex items-center gap-1.5">
              <i data-lucide="check" class="w-3.5 h-3.5 text-yellow-400"></i>
              <span>Portal open to Lagos founders (Age 20–40)</span>
            </div>
          </div>

          <!-- Stage 2 -->
          <div class="rounded-2xl bg-[#0a1628] border border-white/5 p-6 relative hover:border-yellow-400/40 transition-all">
            <div class="flex items-center justify-between mb-3">
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-400 text-[#070f1f]">Stage 2</span>
              <span class="text-xs text-yellow-400 font-semibold">Week 3</span>
            </div>
            <h4 class="font-bold text-white text-base mb-2">Regional Auditions & Pitches</h4>
            <p class="text-xs text-gray-400 leading-relaxed font-light">In-person pitch sessions on Lagos Mainland and Lagos Island covering 5 major zones. Filmed for national TV broadcast.</p>
            <div class="mt-4 pt-3 border-t border-white/5 text-[11px] text-gray-400 flex items-center gap-1.5">
              <i data-lucide="mic" class="w-3.5 h-3.5 text-yellow-400"></i>
              <span>Live 3–5 min pitch + 3 min jury Q&A</span>
            </div>
          </div>

          <!-- Stage 3 -->
          <div class="rounded-2xl bg-[#0a1628] border border-white/5 p-6 relative hover:border-yellow-400/40 transition-all">
            <div class="flex items-center justify-between mb-3">
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-400 text-[#070f1f]">Stage 3</span>
              <span class="text-xs text-yellow-400 font-semibold">Week 4</span>
            </div>
            <h4 class="font-bold text-white text-base mb-2">Entrepreneurship Convention</h4>
            <p class="text-xs text-gray-400 leading-relaxed font-light">1,000+ delegates gather for summit keynotes, masterclasses, executive panels, and business exhibition in Lagos.</p>
            <div class="mt-4 pt-3 border-t border-white/5 text-[11px] text-gray-400 flex items-center gap-1.5">
              <i data-lucide="users" class="w-3.5 h-3.5 text-yellow-400"></i>
              <span>High-profile public & corporate leaders</span>
            </div>
          </div>

          <!-- Stage 4 -->
          <div class="rounded-2xl bg-[#0a1628] border border-yellow-400/30 p-6 relative hover:border-yellow-400 transition-all bg-gradient-to-b from-[#0a1628] to-[#0d1e38]">
            <div class="flex items-center justify-between mb-3">
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-400 text-[#070f1f]">Stage 4</span>
              <span class="text-xs text-yellow-400 font-bold">₦40M Awarded</span>
            </div>
            <h4 class="font-bold text-white text-base mb-2">Top 100 Accelerator Bootcamp</h4>
            <p class="text-xs text-gray-400 leading-relaxed font-light">Rigorous training academy. <strong>40 standout entrepreneurs each win ₦1,000,000 cash seed grants</strong> to inject directly into their operations.</p>
            <div class="mt-4 pt-3 border-t border-white/5 text-[11px] text-yellow-400 flex items-center gap-1.5 font-semibold">
              <i data-lucide="award" class="w-3.5 h-3.5 text-yellow-400"></i>
              <span>40 × ₦1,000,000 Seed Grants</span>
            </div>
          </div>

          <!-- Stage 5 -->
          <div class="rounded-2xl bg-[#0a1628] border border-white/5 p-6 relative hover:border-yellow-400/40 transition-all">
            <div class="flex items-center justify-between mb-3">
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-400 text-[#070f1f]">Stage 5</span>
              <span class="text-xs text-yellow-400 font-semibold">Week 6</span>
            </div>
            <h4 class="font-bold text-white text-base mb-2">Top 20 Investors Evening</h4>
            <p class="text-xs text-gray-400 leading-relaxed font-light">Exclusive high-level boardroom gala. Top 20 finalists pitch directly to private equity investors, VCs, and angel syndicates.</p>
            <div class="mt-4 pt-3 border-t border-white/5 text-[11px] text-gray-400 flex items-center gap-1.5">
              <i data-lucide="briefcase" class="w-3.5 h-3.5 text-yellow-400"></i>
              <span>Private syndicates & equity matchmaking</span>
            </div>
          </div>

          <!-- Stage 6 -->
          <div class="rounded-2xl bg-[#0a1628] border border-yellow-400/40 p-6 relative hover:border-yellow-400 transition-all bg-gradient-to-br from-yellow-400/10 via-[#0a1628] to-[#070f1f]">
            <div class="flex items-center justify-between mb-3">
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-400 text-[#070f1f]">Stage 6</span>
              <span class="text-xs text-yellow-400 font-bold">₦30M Grand Prize</span>
            </div>
            <h4 class="font-bold text-white text-base mb-2">Grand Finale (Live on TV)</h4>
            <p class="text-xs text-gray-400 leading-relaxed font-light">Nationally televised grand championship. One visionary winner emerges as the Colossus of Lagos, taking home ₦30,000,000.</p>
            <div class="mt-4 pt-3 border-t border-white/5 text-[11px] text-yellow-400 flex items-center gap-1.5 font-bold">
              <i data-lucide="crown" class="w-3.5 h-3.5 text-yellow-400"></i>
              <span>₦30,000,000 Equity-Free Prize</span>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- Section 2: Auditions & Business Pitches Guide Focus -->
  <section id="auditions" class="relative py-24 md:py-32 bg-[#0a1628] border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Section Header -->
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-3 mb-4">
          <div class="h-px w-12 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-[0.25em] uppercase">Auditions & Business Pitches</span>
          <div class="h-px w-12 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-black text-white tracking-tight mb-5">
          Auditions on <span class="text-gold-gradient italic">Mainland & Island</span>
        </h2>
        <p class="text-gray-300 text-base md:text-lg font-light leading-relaxed">
          Shortlisted applicants will pitch their ventures live in front of our grand jury panel. Sessions are filmed for national television across Nigeria's leading networks.
        </p>
      </div>

      <!-- Audition Mechanics Breakdown -->
      <div class="grid lg:grid-cols-12 gap-8 mb-16 items-center">
        
        <!-- Left: Live Pitch Format -->
        <div class="lg:col-span-6 section-reveal space-y-4">
          <div class="rounded-2xl bg-[#070f1f] border border-yellow-400/20 p-6 sm:p-8">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 text-yellow-400 flex items-center justify-center">
                <i data-lucide="video" class="w-5 h-5"></i>
              </div>
              <div>
                <h3 class="text-lg font-bold text-white">Live Pitch Mechanics</h3>
                <span class="text-xs text-yellow-400">Filmed for Multi-Network Broadcast</span>
              </div>
            </div>

            <div class="space-y-4">
              <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-full bg-yellow-400/20 text-yellow-400 flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">1</div>
                <div>
                  <h5 class="text-sm font-semibold text-white">3–5 Minute Live Pitch</h5>
                  <p class="text-xs text-gray-400 font-light">Present your business vision, problem addressed, product/service solution, target customer base, and revenue model without interruption.</p>
                </div>
              </div>

              <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-full bg-yellow-400/20 text-yellow-400 flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">2</div>
                <div>
                  <h5 class="text-sm font-semibold text-white">3 Minute Jury Q&A</h5>
                  <p class="text-xs text-gray-400 font-light">Field rigorous questions from experienced investors and corporate titans regarding your financials, unit economics, and operational risks.</p>
                </div>
              </div>

              <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-full bg-yellow-400/20 text-yellow-400 flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">3</div>
                <div>
                  <h5 class="text-sm font-semibold text-white">Instant Feedback & Deliberation</h5>
                  <p class="text-xs text-gray-400 font-light">Receive direct feedback on your business viability. Qualifying entrepreneurs proceed to the Top 100 Bootcamp stage.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: 4 Evaluation Pillars -->
        <div class="lg:col-span-6 section-reveal">
          <div class="grid sm:grid-cols-2 gap-4">
            
            <div class="rounded-2xl bg-[#070f1f] border border-white/5 p-5 hover:border-yellow-400/30 transition-all">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 text-yellow-400 flex items-center justify-center mb-3">
                <i data-lucide="lightbulb" class="w-5 h-5"></i>
              </div>
              <h4 class="text-sm font-bold text-white mb-1">Innovation</h4>
              <p class="text-xs text-gray-400 font-light leading-relaxed">Originality of approach, proprietary value, or unique disruption in solving daily Lagos challenges.</p>
            </div>

            <div class="rounded-2xl bg-[#070f1f] border border-white/5 p-5 hover:border-yellow-400/30 transition-all">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 text-yellow-400 flex items-center justify-center mb-3">
                <i data-lucide="trending-up" class="w-5 h-5"></i>
              </div>
              <h4 class="text-sm font-bold text-white mb-1">Commercial Viability</h4>
              <p class="text-xs text-gray-400 font-light leading-relaxed">Proof of paying customers, clear pricing architecture, and demonstrable path to recurring cash flow.</p>
            </div>

            <div class="rounded-2xl bg-[#070f1f] border border-white/5 p-5 hover:border-yellow-400/30 transition-all">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 text-yellow-400 flex items-center justify-center mb-3">
                <i data-lucide="layers" class="w-5 h-5"></i>
              </div>
              <h4 class="text-sm font-bold text-white mb-1">Scalability & Jobs</h4>
              <p class="text-xs text-gray-400 font-light leading-relaxed">Capacity to grow across Lagos LGAs/LCDAs and create tangible direct employment for local youth.</p>
            </div>

            <div class="rounded-2xl bg-[#070f1f] border border-white/5 p-5 hover:border-yellow-400/30 transition-all">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 text-yellow-400 flex items-center justify-center mb-3">
                <i data-lucide="shield-check" class="w-5 h-5"></i>
              </div>
              <h4 class="text-sm font-bold text-white mb-1">Founder Grit</h4>
              <p class="text-xs text-gray-400 font-light leading-relaxed">Tenacity, deep domain passion, coachability, leadership presence, and poise under TV scrutiny.</p>
            </div>

          </div>
        </div>

      </div>

      <!-- What to Bring Checklist -->
      <div class="rounded-3xl border border-yellow-400/20 bg-gradient-to-r from-[#070f1f] via-[#0a1628] to-[#070f1f] p-8 md:p-10 section-reveal">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-6 pb-6 border-b border-white/10">
          <div>
            <span class="text-xs font-bold uppercase tracking-wider text-yellow-400">Candidate Preparation</span>
            <h3 class="text-xl md:text-2xl font-bold text-white mt-1">What to Bring to Your Audition</h3>
          </div>
          <span class="text-xs text-gray-400">Strictly inspected at the venue entrance</span>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="flex items-start gap-3">
            <i data-lucide="id-card" class="w-5 h-5 text-yellow-400 flex-shrink-0 mt-0.5"></i>
            <div>
              <h5 class="text-sm font-semibold text-white">Valid Photo ID</h5>
              <p class="text-xs text-gray-400 font-light">NIN Slip, Voter's Card, Driver's License, or International Passport.</p>
            </div>
          </div>

          <div class="flex items-start gap-3">
            <i data-lucide="map-pin" class="w-5 h-5 text-yellow-400 flex-shrink-0 mt-0.5"></i>
            <div>
              <h5 class="text-sm font-semibold text-white">Proof of Lagos Base</h5>
              <p class="text-xs text-gray-400 font-light">LASRRA card, Lagos utility bill, or Lagos business registration proof.</p>
            </div>
          </div>

          <div class="flex items-start gap-3">
            <i data-lucide="package" class="w-5 h-5 text-yellow-400 flex-shrink-0 mt-0.5"></i>
            <div>
              <h5 class="text-sm font-semibold text-white">Product / Deck</h5>
              <p class="text-xs text-gray-400 font-light">Physical product prototype, samples, or digital deck on a clean USB flash drive.</p>
            </div>
          </div>

          <div class="flex items-start gap-3">
            <i data-lucide="file-check" class="w-5 h-5 text-yellow-400 flex-shrink-0 mt-0.5"></i>
            <div>
              <h5 class="text-sm font-semibold text-white">Registration Slip</h5>
              <p class="text-xs text-gray-400 font-light">Printed or digital registration confirmation with assigned reference ID.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Section 3: 5 Regional Audition Centres (IBILE Divisions) -->
  <section class="relative py-24 md:py-32 bg-[#070f1f] border-t border-yellow-400/10">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-3 mb-4">
          <div class="h-px w-12 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-[0.25em] uppercase">5 Major Zones Across Lagos</span>
          <div class="h-px w-12 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-black text-white tracking-tight mb-5">
          Regional Audition Centres
        </h2>
        <p class="text-gray-300 text-base md:text-lg font-light leading-relaxed">
          Covering the historic 5 IBILE administrative divisions of Lagos State to ensure founders from every district have direct, equitable access to audition.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
        
        <!-- 1. Lagos Island -->
        <div class="rounded-2xl overflow-hidden border border-white/10 bg-[#0a1628] hover:border-yellow-400/50 transition-all hover-lift group flex flex-col justify-between">
          <div>
            <div class="relative h-44 overflow-hidden">
              <img src="assets/locations/lagos-island.webp" alt="Lagos Island Hub" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-2 py-1 rounded bg-[#070f1f]/80 backdrop-blur-md text-[10px] font-bold text-yellow-400 uppercase tracking-wider">Zone 1</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-white text-base mb-1">Lagos Island</h3>
              <p class="text-[11px] text-yellow-400 font-semibold mb-2">CBD & Maritime Trade</p>
              <p class="text-xs text-gray-400 font-light leading-snug">Centred on commerce, financial tech, maritime services, and urban consumer retail.</p>
            </div>
          </div>
          <div class="p-4 pt-0">
            <span class="inline-block text-[10px] text-gray-400 bg-white/5 px-2.5 py-1 rounded-full">Island Division</span>
          </div>
        </div>

        <!-- 2. Ikeja -->
        <div class="rounded-2xl overflow-hidden border border-white/10 bg-[#0a1628] hover:border-yellow-400/50 transition-all hover-lift group flex flex-col justify-between">
          <div>
            <div class="relative h-44 overflow-hidden">
              <img src="assets/locations/ikeja.jpg" alt="Ikeja Hub" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-2 py-1 rounded bg-[#070f1f]/80 backdrop-blur-md text-[10px] font-bold text-yellow-400 uppercase tracking-wider">Zone 2</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-white text-base mb-1">Ikeja</h3>
              <p class="text-[11px] text-yellow-400 font-semibold mb-2">State Capital & Tech</p>
              <p class="text-xs text-gray-400 font-light leading-snug">Mainland commercial engine, software innovation, electronics, and corporate services.</p>
            </div>
          </div>
          <div class="p-4 pt-0">
            <span class="inline-block text-[10px] text-gray-400 bg-white/5 px-2.5 py-1 rounded-full">Ikeja Division</span>
          </div>
        </div>

        <!-- 3. Ikorodu -->
        <div class="rounded-2xl overflow-hidden border border-white/10 bg-[#0a1628] hover:border-yellow-400/50 transition-all hover-lift group flex flex-col justify-between">
          <div>
            <div class="relative h-44 overflow-hidden">
              <img src="assets/locations/ikorodu.jpg" alt="Ikorodu Hub" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-2 py-1 rounded bg-[#070f1f]/80 backdrop-blur-md text-[10px] font-bold text-yellow-400 uppercase tracking-wider">Zone 3</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-white text-base mb-1">Ikorodu</h3>
              <p class="text-[11px] text-yellow-400 font-semibold mb-2">Industrial & Manufacturing</p>
              <p class="text-xs text-gray-400 font-light leading-snug">Light manufacturing, logistics corridor, consumer goods, and rapid urban growth.</p>
            </div>
          </div>
          <div class="p-4 pt-0">
            <span class="inline-block text-[10px] text-gray-400 bg-white/5 px-2.5 py-1 rounded-full">Ikorodu Division</span>
          </div>
        </div>

        <!-- 4. Badagry -->
        <div class="rounded-2xl overflow-hidden border border-white/10 bg-[#0a1628] hover:border-yellow-400/50 transition-all hover-lift group flex flex-col justify-between">
          <div>
            <div class="relative h-44 overflow-hidden">
              <img src="assets/locations/badagry.jpg" alt="Badagry Hub" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-2 py-1 rounded bg-[#070f1f]/80 backdrop-blur-md text-[10px] font-bold text-yellow-400 uppercase tracking-wider">Zone 4</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-white text-base mb-1">Badagry</h3>
              <p class="text-[11px] text-yellow-400 font-semibold mb-2">Coastal Economy & Tourism</p>
              <p class="text-xs text-gray-400 font-light leading-snug">Cross-border trade, eco-tourism, cultural heritage, and blue economy ventures.</p>
            </div>
          </div>
          <div class="p-4 pt-0">
            <span class="inline-block text-[10px] text-gray-400 bg-white/5 px-2.5 py-1 rounded-full">Badagry Division</span>
          </div>
        </div>

        <!-- 5. Epe -->
        <div class="rounded-2xl overflow-hidden border border-white/10 bg-[#0a1628] hover:border-yellow-400/50 transition-all hover-lift group flex flex-col justify-between">
          <div>
            <div class="relative h-44 overflow-hidden">
              <img src="assets/locations/epe.jpg" alt="Epe Hub" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-2 py-1 rounded bg-[#070f1f]/80 backdrop-blur-md text-[10px] font-bold text-yellow-400 uppercase tracking-wider">Zone 5</span>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-white text-base mb-1">Epe</h3>
              <p class="text-[11px] text-yellow-400 font-semibold mb-2">Agro-Tech & Free Zone</p>
              <p class="text-xs text-gray-400 font-light leading-snug">Agribusiness processing, aquaculture, green energy, and industrial free trade corridors.</p>
            </div>
          </div>
          <div class="p-4 pt-0">
            <span class="inline-block text-[10px] text-gray-400 bg-white/5 px-2.5 py-1 rounded-full">Epe Division</span>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- Requirements Section -->
  <section id="requirements" class="relative py-24 md:py-32">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">Must Meet All Criteria</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
          Eligibility Requirements
        </h2>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg">
          To participate in the Colossus of Lagos, applicants must meet the
          following criteria:
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">
        <!-- Requirement 1 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="map-pin" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Lagos-Based Entrepreneur
              </h3>
              <p class="text-gray-400 leading-relaxed mb-3">
                Must be a Lagos-based entrepreneur with proof of residence in
                Lagos. Your business must be situated in Lagos.
              </p>
              <div
                class="flex items-center gap-2 text-xs text-[#d4af37] bg-[#d4af37]/10 px-3 py-1.5 rounded-full w-fit">
                <i data-lucide="file-text" class="w-3 h-3"></i>
                <span>LASRRA or Utility Bill required</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Requirement 2 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.1s">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="calendar" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Age 20 — 40 Years
              </h3>
              <p class="text-gray-400 leading-relaxed mb-3">
                Must be between 20 and 40 years of age. Open to both graduates
                and undergraduates of Higher Institutions of Learning.
              </p>
              <div
                class="flex items-center gap-2 text-xs text-[#d4af37] bg-[#d4af37]/10 px-3 py-1.5 rounded-full w-fit">
                <i data-lucide="graduation-cap" class="w-3 h-3"></i>
                <span>Degree not mandatory</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Requirement 3 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.2s">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="heart-pulse" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Excellent Physical & Mental Health
              </h3>
              <p class="text-gray-400 leading-relaxed">
                Must be in excellent physical and mental health to actively withstand and excel in the accelerator bootcamp and pitch presentations.
              </p>
            </div>
          </div>
        </div>

        <!-- Requirement 4 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.3s">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="calendar-check" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Programme Commitment
              </h3>
              <p class="text-gray-400 leading-relaxed mb-3">
                Must be willing and available to commit fully to all scheduled auditions, convention, bootcamp accelerator sessions, and pitch evaluations.
              </p>
              <div
                class="flex items-center gap-2 text-xs text-[#d4af37] bg-[#d4af37]/10 px-3 py-1.5 rounded-full w-fit">
                <i data-lucide="clock" class="w-3 h-3"></i>
                <span>Full commitment during key milestones</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Requirement 5 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plane" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Travel & Logistics Coverage
              </h3>
              <p class="text-gray-400 leading-relaxed">
                Must be willing and able to cover your travel and personal
                logistics to and from official filming venues and production
                locations across Lagos.
              </p>
            </div>
          </div>
        </div>

        <!-- Requirement 6 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.1s">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="shield-check" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Professionalism & Integrity
              </h3>
              <p class="text-gray-400 leading-relaxed mb-3">
                Must demonstrate strong entrepreneurial character, high ethical standards, and readiness to compete constructively.
              </p>
              <div
                class="flex items-center gap-2 text-xs text-[#d4af37] bg-[#d4af37]/10 px-3 py-1.5 rounded-full w-fit">
                <i data-lucide="award" class="w-3 h-3"></i>
                <span>Strictly professional conduct</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Requirement 7 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.2s">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="users" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Collaborative Team Spirit
              </h3>
              <p class="text-gray-400 leading-relaxed">
                Must be willing and able to network, collaborate, and engage respectfully with fellow entrepreneurs, judges, and mentors throughout the festival.
              </p>
            </div>
          </div>
        </div>

        <!-- Requirement 8 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.3s">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="ban" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                No Conflict of Interest
              </h3>
              <p class="text-gray-400 leading-relaxed mb-3">
                Neither you nor any of your immediate family members should be
                an employee, producer, director or agent of Bravopoints
                International Ltd and other sponsors of the show.
              </p>
              <div class="flex items-center gap-2 text-xs text-red-400 bg-red-400/10 px-3 py-1.5 rounded-full w-fit">
                <i data-lucide="alert-triangle" class="w-3 h-3"></i>
                <span>Strictly enforced</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Summary Box -->
      <div class="mt-16 glass-panel-strong rounded-3xl p-8 md:p-12 max-w-4xl mx-auto section-reveal">
        <div class="flex items-start gap-6">
          <div
            class="w-16 h-16 rounded-full bg-gradient-to-br from-[#d4af37] to-[#b8941f] flex items-center justify-center flex-shrink-0">
            <i data-lucide="clipboard-list" class="w-8 h-8 text-[#0a1628]"></i>
          </div>
          <div>
            <h3 class="text-2xl font-bold mb-3">
              Quick Eligibility Checklist
            </h3>
            <div class="grid sm:grid-cols-2 gap-3">
              <div class="flex items-center gap-3 text-sm text-gray-300">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span>Lagos resident (20-40 years)</span>
              </div>
              <div class="flex items-center gap-3 text-sm text-gray-300">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span>Business located in Lagos</span>
              </div>
              <div class="flex items-center gap-3 text-sm text-gray-300">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span>Graduate or undergraduate</span>
              </div>
              <div class="flex items-center gap-3 text-sm text-gray-300">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span>Excellent health condition</span>
              </div>
              <div class="flex items-center gap-3 text-sm text-gray-300">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span>Available for key programme milestones</span>
              </div>
              <div class="flex items-center gap-3 text-sm text-gray-300">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span>No sponsor affiliation</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- What We're Looking For -->
  <section class="relative py-24 md:py-32"
    style="background: linear-gradient(160deg, #083B74 0%, #070f1f 50%, #0a1628 100%);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div class="section-reveal">
          <div class="inline-flex items-center gap-3 mb-8">
            <div class="h-px w-16 bg-[#d4af37]"></div>
            <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">The Ideal Candidate</span>
          </div>

          <h2 class="font-display text-4xl md:text-5xl font-bold mb-8 leading-tight">
            What Kind of Business <br />
            <span class="text-gold-gradient italic">Ideas We Seek</span>
          </h2>

          <p class="text-gray-400 text-lg leading-relaxed mb-8">
            Colossus of Lagos is looking for innovative, commercially viable, and scalable
            business ideas that are sustainable and have the potential to
            create real economic and social impact within Lagos.
          </p>

          <div class="space-y-4">
            <div class="flex items-center gap-4 p-4 rounded-xl bg-[#0a1628] border border-[#d4af37]/10">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center">
                <i data-lucide="lightbulb" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white">Innovation</h4>
                <p class="text-sm text-gray-500">
                  Creative solutions to real problems
                </p>
              </div>
            </div>

            <div class="flex items-center gap-4 p-4 rounded-xl bg-[#0a1628] border border-[#d4af37]/10">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center">
                <i data-lucide="trending-up" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white">Commercial Viability</h4>
                <p class="text-sm text-gray-500">
                  Clear path to revenue and profit
                </p>
              </div>
            </div>

            <div class="flex items-center gap-4 p-4 rounded-xl bg-[#0a1628] border border-[#d4af37]/10">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center">
                <i data-lucide="expand" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white">Scalability</h4>
                <p class="text-sm text-gray-500">
                  Potential to grow beyond initial concept
                </p>
              </div>
            </div>

            <div class="flex items-center gap-4 p-4 rounded-xl bg-[#0a1628] border border-[#d4af37]/10">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center">
                <i data-lucide="leaf" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white">Sustainability</h4>
                <p class="text-sm text-gray-500">
                  Long-term economic and social impact
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="reveal-right">
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-[#d4af37]/10 to-transparent rounded-3xl blur-2xl"></div>
            <div class="relative glass-panel-strong rounded-3xl p-8 md:p-10">
              <h3 class="font-display text-2xl font-bold mb-6 text-center">
                Selection Process & Stages
              </h3>

              <div class="space-y-5">
                <div class="relative pl-8 pb-5 border-l-2 border-[#d4af37]/30">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-xs font-semibold text-[#d4af37] mb-0.5">Stage 1</div>
                  <h4 class="font-bold text-white text-sm mb-0.5">Call for Registrations</h4>
                  <p class="text-xs text-gray-400">Complete the online registration form with your business profile and growth vision.</p>
                </div>

                <div class="relative pl-8 pb-5 border-l-2 border-[#d4af37]/30">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-xs font-semibold text-[#d4af37] mb-0.5">Stage 2</div>
                  <h4 class="font-bold text-white text-sm mb-0.5">Regional Auditions </h4>
                  <p class="text-xs text-gray-400">Pitch before expert judges in Lagos Mainland and Island .</p>
                </div>

                <div class="relative pl-8 pb-5 border-l-2 border-[#d4af37]/30">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-xs font-semibold text-[#d4af37] mb-0.5">Stage 3</div>
                  <h4 class="font-bold text-white text-sm mb-0.5">Entrepreneurship Convention</h4>
                  <p class="text-xs text-gray-400">Join 1,000+ delegates and corporate mentors for summit sessions and capacity building.</p>
                </div>

                <div class="relative pl-8 pb-5 border-l-2 border-[#d4af37]/30">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-xs font-semibold text-[#d4af37] mb-0.5">Stage 4</div>
                  <h4 class="font-bold text-white text-sm mb-0.5">Top 100 Bootcamp (40 × ₦1M)</h4>
                  <p class="text-xs text-gray-400">Accelerator programme where 40 standout entrepreneurs win ₦1,000,000 cash grants each (₦40M total).</p>
                </div>

                <div class="relative pl-8 pb-5 border-l-2 border-[#d4af37]/30">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-xs font-semibold text-[#d4af37] mb-0.5">Stage 5</div>
                  <h4 class="font-bold text-white text-sm mb-0.5">Top 20 Investors Evening</h4>
                  <p class="text-xs text-gray-400">Exclusive boardroom gala pitching directly to angel syndicates, VCs, and institutional partners.</p>
                </div>

                <div class="relative pl-8">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px] check-pulse"></div>
                  <div class="text-xs font-semibold text-[#d4af37] mb-0.5">Stage 6</div>
                  <h4 class="font-bold text-white text-sm mb-0.5">Grand Finale (₦30,000,000)</h4>
                  <p class="text-xs text-gray-400">Televised live nationwide; one visionary founder is crowned with the ₦30M grand equity-free cash prize!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Official Partner: Lagos State Government Endorsement Section -->
  <section class="py-24 bg-[#070f1f] relative overflow-hidden border-t border-yellow-400/10">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <!-- Official Seal Card -->
        <div class="lg:col-span-5 flex justify-center section-reveal">
          <div class="relative w-full max-w-md">
            <div class="absolute inset-0 bg-gradient-to-br from-[#d4af37]/20 to-[#083B74]/30 rounded-3xl blur-2xl"></div>
            <div class="relative glass-panel-strong rounded-3xl p-8 sm:p-10 border border-yellow-400/30 text-center flex flex-col items-center">
              <div class="w-36 h-36 sm:w-44 sm:h-44 rounded-full bg-gradient-to-br from-yellow-400/10 to-[#083B74]/20 border-2 border-yellow-400/40 p-4 mb-6 shadow-2xl flex items-center justify-center">
                <img src="assets/proposal/lagos_seal.png" alt="Official Seal of Lagos State Government" class="max-w-full max-h-full object-contain filter drop-shadow-[0_10px_20px_rgba(212,175,55,0.4)]" />
              </div>
              <span class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-1">Official Major Partner</span>
              <h3 class="font-display text-2xl font-bold text-white mb-2">LAGOS STATE GOVERNMENT</h3>
              <p class="text-xs text-gray-300 uppercase tracking-wider font-semibold">Ministry of Wealth Creation and Employment</p>
              <div class="mt-6 pt-6 border-t border-white/10 flex items-center justify-center gap-2 text-xs text-yellow-400 font-medium">
                <i data-lucide="shield-check" class="w-4 h-4"></i>
                <span>Institutional Endorsement & Enterprise Alignment</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Endorsement Content -->
        <div class="lg:col-span-7 section-reveal">
          <div class="inline-flex items-center gap-2 mb-3">
            <div class="h-px w-10 bg-yellow-400"></div>
            <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Strategic State Partnership</span>
          </div>
          <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold mb-6 leading-tight">
            An Impactful Initiative Supported By <span class="text-gold-gradient">Lagos State</span>
          </h2>
          <p class="text-gray-300 text-base leading-relaxed font-light mb-8">
            Colossus of Lagos is developed in strategic partnership with the <strong class="text-white">Lagos State Government</strong> through the <strong class="text-yellow-400">Ministry of Wealth Creation and Employment</strong> to identify, support, and scale high-potential entrepreneurs who will drive job creation, innovation, and economic prosperity across the state.
          </p>

          <div class="grid sm:grid-cols-2 gap-4">
            <div class="glass-panel p-5 rounded-2xl border border-white/5 hover:border-yellow-400/30 transition-all">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-3">
                <i data-lucide="trending-up" class="w-5 h-5"></i>
              </div>
              <h4 class="font-bold text-white text-base mb-1">Economic Expansion</h4>
              <p class="text-xs text-gray-400 leading-relaxed font-light">Catalyzing enterprise development and accelerating youth self-reliance across Lagos State.</p>
            </div>

            <div class="glass-panel p-5 rounded-2xl border border-white/5 hover:border-yellow-400/30 transition-all">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-3">
                <i data-lucide="award" class="w-5 h-5"></i>
              </div>
              <h4 class="font-bold text-white text-base mb-1">Direct State Support</h4>
              <p class="text-xs text-gray-400 leading-relaxed font-light">Connecting verified emerging business titans with public and private ecosystem resources.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Television Broadcast Reach Section -->
  <section class="py-24 bg-[#0a1628] relative overflow-hidden border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">Broadcast Exposure</span>
          <div class="h-px w-10 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">53 Million+ Audience Viewership</h2>
        <p class="text-gray-300 text-sm md:text-base leading-relaxed font-light">
          Contestants receive unprecedented nationwide visibility across Nigeria's most influential television networks.
        </p>
      </div>

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-12">
        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center hover-lift section-reveal">
          <div class="w-12 h-12 mx-auto rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="tv" class="w-6 h-6"></i>
          </div>
          <div class="font-display text-3xl font-extrabold text-yellow-400 mb-1">20M</div>
          <h4 class="font-bold text-white text-base mb-1">Channels TV</h4>
          <p class="text-xs text-gray-400">Saturdays Prime Slot</p>
        </div>

        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center hover-lift section-reveal" style="transition-delay: 0.1s">
          <div class="w-12 h-12 mx-auto rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="film" class="w-6 h-6"></i>
          </div>
          <div class="font-display text-3xl font-extrabold text-white mb-1">15M</div>
          <h4 class="font-bold text-white text-base mb-1">Africa Magic</h4>
          <p class="text-xs text-gray-400">DStv Ch. 154 (Sundays)</p>
        </div>

        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center hover-lift section-reveal" style="transition-delay: 0.2s">
          <div class="w-12 h-12 mx-auto rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="radio" class="w-6 h-6"></i>
          </div>
          <div class="font-display text-3xl font-extrabold text-yellow-400 mb-1">10M</div>
          <h4 class="font-bold text-white text-base mb-1">Hip TV</h4>
          <p class="text-xs text-gray-400">Youth & Creative Audience</p>
        </div>

        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center hover-lift section-reveal" style="transition-delay: 0.3s">
          <div class="w-12 h-12 mx-auto rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="play-circle" class="w-6 h-6"></i>
          </div>
          <div class="font-display text-3xl font-extrabold text-white mb-1">8M</div>
          <h4 class="font-bold text-white text-base mb-1">TVC News / Ent.</h4>
          <p class="text-xs text-gray-400">Saturdays Prime Show</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Executive Producers: Bravopoints International -->
  <section class="py-24 bg-[#070f1f] relative overflow-hidden border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-5 section-reveal">
          <div class="glass-panel-strong rounded-3xl p-8 sm:p-10 border border-yellow-400/20 text-center">
            <div class="w-32 h-20 mx-auto mb-6 flex items-center justify-center">
              <img src="assets/bravo.png" alt="Bravopoints International Logo" class="max-h-full max-w-full object-contain filter drop-shadow" />
            </div>
            <h3 class="font-display text-2xl font-bold text-white mb-1">Bravopoints International</h3>
            <p class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-4">Executive Producers</p>
            <p class="text-xs text-gray-300 leading-relaxed font-light">
              Producers of Africa's most consistent entrepreneurial reality show, <strong class="text-white">The Next Titan Nigeria</strong> (11+ consecutive seasons). Awarded "Global Most Innovative Entrepreneurship Company" by World Quality Day & Chartered Institute of Quality UK.
            </p>
          </div>
        </div>

        <div class="lg:col-span-7 section-reveal space-y-4">
          <div class="inline-flex items-center gap-2 mb-2">
            <div class="h-px w-10 bg-yellow-400"></div>
            <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Proven Track Record</span>
          </div>
          <h2 class="font-display text-3xl sm:text-4xl font-bold text-white mb-4">
            World-Class Production & <span class="text-gold-gradient">Proven Pedigree</span>
          </h2>
          <p class="text-gray-300 text-sm leading-relaxed font-light mb-6">
            With over a decade of producing tier-1 business competitions across Africa, Bravopoints International brings institutional rigor, national credibility, and corporate trust to the Colossus of Lagos.
          </p>

          <div class="glass-panel p-4 rounded-xl border border-white/10 flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-yellow-400/10 flex items-center justify-center text-yellow-400 flex-shrink-0">
              <i data-lucide="shield-check" class="w-5 h-5"></i>
            </div>
            <p class="text-xs text-gray-300 font-light">Trusted by Central Bank of Nigeria, MTN, First Bank, Zenith Bank, Shell, and leading corporate sponsors.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="relative py-24 md:py-32 overflow-hidden"
    style="background: linear-gradient(160deg, #0a1628 0%, #070f1f 40%, #083B74 100%);">
    <div class="absolute inset-0 bg-gradient-to-r from-[#d4af37]/5 via-transparent to-[#d4af37]/5"></div>
    <div class="relative max-w-4xl mx-auto px-6 text-center section-reveal">
      <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">
        Ready to Prove You Have
        <span class="text-gold-gradient">What It Takes?</span>
      </h2>
      <p class="text-xl text-gray-400 mb-10">
        The next colossus of Lagos could be you. Register now and begin your
        journey.
      </p>
      <a href="register.php"
        class="btn-gold px-10 py-5 rounded-full text-lg uppercase tracking-widest inline-flex items-center gap-3">
        <span>Start Registration</span>
        <i data-lucide="arrow-right" class="w-5 h-5"></i>
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-[#d4af37]/10 py-16 bg-[#070f1f]">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-4 gap-12 mb-12">
        <div class="md:col-span-2">
          <div class="flex items-center gap-3 mb-6">
            <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos" class="h-12 w-auto">
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
          <ul class="space-y-3 text-sm text-gray-400 font-light">
            <li>
              <a href="index.php" class="hover:text-white transition-colors">Home</a>
            </li>
            <li>
              <a href="about.php" class="hover:text-white transition-colors">About</a>
            </li>
            <li>
              <a href="eligibility.php" class="text-white font-medium">Eligibility</a>
            </li>
            <li>
              <a href="faq.php" class="hover:text-white transition-colors">FAQ</a>
            </li>
            <li>
              <a href="register.php" class="hover:text-white transition-colors">Register</a>
            </li>
          </ul>
        </div>

        <div>
          <h4 class="font-semibold mb-3 text-[#d4af37] text-xs tracking-wider uppercase">Official Partner</h4>
          <p class="text-xs text-gray-400 leading-relaxed font-light mb-4">
            Lagos State Government<br>
            Ministry of Wealth Creation and Employment
          </p>
          <h4 class="font-semibold mb-2 text-[#d4af37] text-xs tracking-wider uppercase">Produced By</h4>
          <p class="text-xs text-gray-400 leading-relaxed font-light mb-6">
            Bravopoints International Limited
          </p>
        </div>

        <div>
          <h4 class="font-semibold mb-3 text-[#d4af37] text-xs tracking-wider uppercase">Stay Updated</h4>
          <p class="text-xs text-gray-400 font-light leading-relaxed mb-3">
            Subscribe for official announcements, audition schedules, and broadcast dates.
          </p>
          <form id="newsletterForm" class="space-y-3">
            <div id="newsletterAlert" class="hidden p-2.5 rounded-lg text-xs font-semibold"></div>
            <div class="flex flex-col sm:flex-row gap-2">
              <input type="email" name="email" required placeholder="Enter email" class="px-3.5 py-2 rounded-xl bg-[#0a1628] border border-white/10 text-white text-xs flex-1 focus:outline-none focus:border-[#d4af37]" />
              <button type="submit" class="btn-gold px-3.5 py-2 rounded-xl text-xs uppercase font-bold tracking-wider whitespace-nowrap">
                Join
              </button>
            </div>
          </form>
        </div>

      </div>

      <div
        class="border-t border-[#d4af37]/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left text-xs text-gray-500 font-light">
        <p>© 2026 Colossus of Lagos. All rights reserved.</p>
        <p>
          Produced by Bravopoints International Limited <span class="hidden md:inline mx-2">|</span> Built by <a
            href="https://techiextract.com" target="_blank" rel="noopener"
            class="text-[#d4af37] hover:underline font-semibold">TechieXtract Limited</a>
        </p>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Widget -->
  <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry" target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-40 flex items-center gap-2.5 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-transform" title="Chat on WhatsApp">
    <i data-lucide="message-circle" class="w-5 h-5"></i>
    <span class="text-xs font-bold hidden sm:inline">WhatsApp Help Desk</span>
  </a>

  <script>
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

    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        navbar.classList.add("nav-blur");
      } else {
        navbar.classList.remove("nav-blur");
      }
    });

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
          }
        });
      },
      { threshold: 0.1, rootMargin: "0px 0px -60px 0px" },
    );

    document
      .querySelectorAll(".section-reveal, .reveal-left, .reveal-right")
      .forEach((el) => observer.observe(el));

    function selectLocation(card) {
      document
        .querySelectorAll(".location-card")
        .forEach((c) => c.classList.remove("active"));
      card.classList.add("active");
    }
  </script>
  <!-- Floating WhatsApp Widget (TechieXtract Scope) -->
  <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry" target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-40 flex items-center gap-3 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-transform" title="Chat on WhatsApp">
    <i data-lucide="message-circle" class="w-6 h-6"></i>
    <span class="text-xs font-bold hidden sm:inline">WhatsApp Help Desk</span>
  </a>
</body>

</html>