<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    About | Lagos New Colossus - The Vision, The Mission, The Impact
  </title>
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
      --gold-muted: rgba(212, 175, 55, 0.15);
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

    @keyframes shimmer {
      0% {
        background-position: -200% center;
      }

      100% {
        background-position: 200% center;
      }
    }

    @keyframes pulse-glow {

      0%,
      100% {
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
      }

      50% {
        box-shadow: 0 0 40px rgba(212, 175, 55, 0.4);
      }
    }

    @keyframes revealUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes revealLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes revealRight {
      from {
        opacity: 0;
        transform: translateX(50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes scaleIn {
      from {
        opacity: 0;
        transform: scale(0.9);
      }

      to {
        opacity: 1;
        transform: scale(1);
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

    .animate-float {
      animation: float 6s ease-in-out infinite;
    }

    .animate-float-delayed {
      animation: float 6s ease-in-out infinite;
      animation-delay: 3s;
    }

    .animate-shimmer {
      background-size: 200% auto;
      animation: shimmer 3s linear infinite;
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

    .bg-gold-gradient {
      background: linear-gradient(135deg,
          var(--gold) 0%,
          var(--gold-dark) 100%);
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

    .reveal-scale {
      opacity: 0;
      transform: scale(0.95);
      transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .reveal-scale.visible {
      opacity: 1;
      transform: scale(1);
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

    .gold-border-left {
      border-left: 3px solid var(--gold);
      padding-left: 1.5rem;
    }

    .timeline-line {
      position: absolute;
      left: 50%;
      top: 0;
      bottom: 0;
      width: 2px;
      background: linear-gradient(to bottom, var(--gold), transparent);
      transform: translateX(-50%);
    }

    .quote-mark {
      font-family: "Playfair Display", serif;
      font-size: 8rem;
      line-height: 1;
      color: rgba(212, 175, 55, 0.15);
      position: absolute;
      top: -2rem;
      left: -1rem;
    }

    .image-reveal {
      position: relative;
      overflow: hidden;
    }

    .image-reveal::after {
      content: "";
      position: absolute;
      inset: 0;
      background: var(--gold);
      transform: translateX(-101%);
      transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .image-reveal.revealed::after {
      transform: translateX(101%);
    }

    .parallax-bg {
      will-change: transform;
    }

    .stat-card {
      background: linear-gradient(145deg,
          rgba(15, 29, 50, 0.9),
          rgba(10, 22, 40, 0.95));
      border: 1px solid rgba(212, 175, 55, 0.1);
      transition: all 0.4s ease;
    }

    .stat-card:hover {
      border-color: var(--gold);
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .pillar-card {
      position: relative;
      overflow: hidden;
    }

    .pillar-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg,
          var(--gold),
          var(--gold-light),
          var(--gold));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s ease;
    }

    .pillar-card:hover::before {
      transform: scaleX(1);
    }

    .partner-logo {
      filter: grayscale(100%) brightness(2);
      opacity: 0.6;
      transition: all 0.4s ease;
    }

    .partner-logo:hover {
      filter: grayscale(0%) brightness(1);
      opacity: 1;
    }

    @media (max-width: 768px) {
      .timeline-line {
        left: 20px;
      }
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
        <a href="index.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">Home</a>
        <a href="about.php" class="text-sm font-medium text-[#d4af37] transition-colors">About</a>

        <a href="eligibility.php"
          class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">Eligibility</a>
        <a href="faq.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">FAQ</a>

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
        <a href="index.php" class="text-2xl font-bold text-gray-300 hover:text-yellow-400">Home</a>
        <a href="about.php" class="text-2xl font-bold text-yellow-400">About</a>
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
  <section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden pt-[112px] md:pt-[130px]">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a1628] via-[#0f1d32] to-[#0a1628]"></div>
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
      <div class="absolute top-20 left-10 w-96 h-96 bg-[#d4af37]/5 rounded-full blur-[100px] animate-float"></div>
      <div
        class="absolute bottom-20 right-10 w-[500px] h-[500px] bg-[#d4af37]/5 rounded-full blur-[120px] animate-float-delayed">
      </div>
      <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#0f1d32] rounded-full blur-[150px]">
      </div>
    </div>

    <!-- Grid Pattern -->
    <div
      class="absolute inset-0 bg-[linear-gradient(rgba(212,175,55,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(212,175,55,0.03)_1px,transparent_1px)] bg-[size:60px_60px]">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
      <div class="mb-8 inline-flex items-center gap-3 px-5 py-2.5 rounded-full glass-panel">
        <span class="w-2 h-2 rounded-full bg-[#d4af37] animate-pulse"></span>
        <span class="text-xs font-semibold tracking-[0.2em] uppercase text-[#d4af37]">Official Partner — Lagos State
          Government</span>
      </div>

      <h1 class="font-display text-5xl md:text-7xl lg:text-8xl font-black leading-tight mb-8">
        <span class="block text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-400">About</span>
        <span class="block text-gold-gradient mt-2 italic">The Colossus</span>
      </h1>

      <p class="max-w-3xl mx-auto text-lg md:text-xl text-gray-400 mb-12 leading-relaxed font-light">
        In a city where ambition never sleeps, Lagos New Colossus is igniting the
        entrepreneurial spirit of a generation.
        <span class="text-white font-medium">Lagos New Colossus</span> is more
        than a competition — it is a movement.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="#vision"
          class="btn-gold px-8 py-4 rounded-full text-base uppercase tracking-widest flex items-center gap-3">
          <span>Explore The Vision</span>
          <i data-lucide="arrow-down" class="w-5 h-5"></i>
        </a>
        <a href="#impact"
          class="btn-outline-gold px-8 py-4 rounded-full text-base uppercase tracking-widest flex items-center gap-3">
          <span>Our Impact</span>
        </a>
      </div>
    </div>

    <!-- Bottom fade -->
    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-[#0a1628] to-transparent"></div>
  </section>

  <!-- Vision Section -->
  <section id="vision" class="relative py-24 md:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 items-center">
        <!-- Left Content -->
        <div class="lg:col-span-7 section-reveal">
          <div class="inline-flex items-center gap-3 mb-8">
            <div class="h-px w-16 bg-[#d4af37]"></div>
            <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">The Vision</span>
          </div>

          <h2 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold mb-8 leading-[1.1]">
            In the heart of Africa's most <br />
            <span class="text-gold-gradient italic">electrifying city</span>
          </h2>

          <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
            <p>
              Lagos is not just a location; it is a
              <span class="text-white font-medium">furnace of potential</span>
              where dreams are forged into reality and destiny favours the
              relentless. This is where the audacious come to build and the
              visionary come to stand.
            </p>

            <p>
              Lagos is the epicentre of African entrepreneurs, the
              headquarters of wealth creation, and the home of Africa's
              richest entrepreneurs for both men and women. The
              entrepreneurial spirit of the younger generations in Lagos needs
              to be
              <span class="text-[#d4af37] font-medium">provoked and ignited</span>
              to see entrepreneurship as a source of limitless possibility.
            </p>

            <div class="gold-border-left my-8">
              <p class="text-white text-xl font-display italic leading-relaxed">
                "Through high-stakes competition and strategic mentorship, Lagos New Colossus is creating more than a
                show; it is building a legacy."
              </p>
            </div>

            <p>
              We invite you to witness the emergence of the entrepreneurial
              icons who will carry the torch of the next colossus of Lagos —
              building the pillars upon which the future of Lagos rests.
            </p>
          </div>

          <div class="mt-10 flex flex-wrap gap-6">
            <div class="flex items-center gap-3">
              <div class="w-12 h-12 rounded-full bg-[#d4af37]/10 flex items-center justify-center">
                <i data-lucide="flame" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <div class="font-semibold text-white">Ignite</div>
                <div class="text-xs text-gray-500">
                  Entrepreneurial Spirit
                </div>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <div class="w-12 h-12 rounded-full bg-[#d4af37]/10 flex items-center justify-center">
                <i data-lucide="zap" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <div class="font-semibold text-white">Transform</div>
                <div class="text-xs text-gray-500">Economic Landscape</div>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <div class="w-12 h-12 rounded-full bg-[#d4af37]/10 flex items-center justify-center">
                <i data-lucide="crown" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <div class="font-semibold text-white">Crown</div>
                <div class="text-xs text-gray-500">The Next Colossus</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Visual -->
        <div class="lg:col-span-5 reveal-scale">
          <div class="relative max-w-md mx-auto lg:ml-auto">
            <div
              class="absolute inset-0 bg-gradient-to-tr from-[#d4af37]/20 to-transparent rounded-3xl blur-2xl transform rotate-6">
            </div>
            <div class="relative glass-panel-strong rounded-3xl p-8 flex flex-col items-center">
              <div
                class="w-full aspect-square rounded-2xl overflow-hidden relative flex items-center justify-center p-4 mb-8">
                <img src="assets/locations/logo.png" alt="Lagos Vision" class="max-w-full max-h-full object-contain">
              </div>

              <div class="w-full grid grid-cols-2 gap-4">
                <div class="text-center p-4 rounded-xl bg-[#0a1628]/50 border border-[#d4af37]/10">
                  <div class="text-2xl font-bold text-gold-gradient-static">
                    8 Weeks
                  </div>
                  <div class="text-xs text-gray-500 mt-1">Of Intensity</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-[#0a1628]/50 border border-[#d4af37]/10">
                  <div class="text-2xl font-bold text-gold-gradient-static">
                    20
                  </div>
                  <div class="text-xs text-gray-500 mt-1">Finalists</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About The Show Section -->
  <section class="relative py-24 md:py-32"
    style="background: linear-gradient(160deg, #083B74 0%, #070f1f 45%, #0a1628 100%);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">The Platform</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
          What is Lagos New Colossus?
        </h2>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg">
          An 8-week entrepreneurial reality and competition show that
          transforms raw talent into industry-shaping phenomena.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="pillar-card glass-panel rounded-2xl p-8 hover-lift section-reveal">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="tv" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-white">Reality TV Show</h3>
          <p class="text-gray-400 leading-relaxed">
            A high-energy platform designed to be aspirational, inspirational,
            and globally appealing. Contestants live in the Colossus House,
            face real-world business tasks, and defend their decisions before
            The Council.
          </p>
        </div>

        <div class="pillar-card glass-panel rounded-2xl p-8 hover-lift section-reveal" style="transition-delay: 0.15s">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="users-2" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-white">
            Strategic Mentorship
          </h3>
          <p class="text-gray-400 leading-relaxed">
            Guided and judged by business moguls known as The Council. Over 30
            industry titans provide 3-month post-show mentorship with a ratio
            of 1 mentor to 5 entrepreneurs.
          </p>
        </div>

        <div class="pillar-card glass-panel rounded-2xl p-8 hover-lift section-reveal" style="transition-delay: 0.3s">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="banknote" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-white">
            Direct Cash Support
          </h3>
          <p class="text-gray-400 leading-relaxed">
            Over 120 entrepreneurs win direct cash prizes. The Grand Prize
            winner takes home life-changing funding, while all 20 finalists
            and 100 bootcamp participants receive financial support.
          </p>
        </div>
      </div>

      <div class="mt-16 glass-panel-strong rounded-3xl p-8 md:p-12 section-reveal">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div>
            <h3 class="font-display text-3xl font-bold mb-4">
              More Than Entertainment
            </h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
              The viewers learn and get entertained as they watch the
              contestants perform their tasks while also defending their
              actions in the boardroom. It is a catalyst for economic
              transformation, designed to inspire millions of viewers while
              providing direct support to over 120 entrepreneurs in Lagos.
            </p>
            <div class="space-y-3">
              <div class="flex items-center gap-3 text-sm">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span class="text-gray-300">Real-world business challenges in Lagos markets and
                  corporate towers</span>
              </div>
              <div class="flex items-center gap-3 text-sm">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span class="text-gray-300">Weekly eliminations based on execution, strategy, and
                  resilience</span>
              </div>
              <div class="flex items-center gap-3 text-sm">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span class="text-gray-300">Expert mentorship from Lagos' most successful business
                  leaders</span>
              </div>
              <div class="flex items-center gap-3 text-sm">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] flex-shrink-0"></i>
                <span class="text-gray-300">National television exposure across major TV networks</span>
              </div>
            </div>
          </div>
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-[#d4af37]/10 to-transparent rounded-2xl blur-xl"></div>
            <div class="relative bg-[#0a1628] rounded-2xl p-8 border border-[#d4af37]/10">
              <div class="grid grid-cols-2 gap-6">
                <div class="text-center">
                  <div class="text-4xl font-black text-gold-gradient-static mb-1">
                    150+
                  </div>
                  <div class="text-xs text-gray-500 uppercase tracking-wider">
                    Bootcamp Candidates
                  </div>
                </div>
                <div class="text-center">
                  <div class="text-4xl font-black text-gold-gradient-static mb-1">
                    100
                  </div>
                  <div class="text-xs text-gray-500 uppercase tracking-wider">
                    Bootcamp Winners
                  </div>
                </div>
                <div class="text-center">
                  <div class="text-4xl font-black text-gold-gradient-static mb-1">
                    20
                  </div>
                  <div class="text-xs text-gray-500 uppercase tracking-wider">
                    House Finalists
                  </div>
                </div>
                <div class="text-center">
                  <div class="text-4xl font-black text-gold-gradient-static mb-1">
                    1
                  </div>
                  <div class="text-xs text-gray-500 uppercase tracking-wider">
                    Grand Champion
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- The Colossus House Section -->
  <section class="relative py-24 md:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div class="order-2 lg:order-1 reveal-left">
          <div class="relative">
            <div class="absolute -inset-4 bg-gradient-to-r from-[#d4af37]/10 to-transparent rounded-3xl blur-2xl"></div>
            <div class="relative grid grid-cols-2 gap-4">
              <div class="space-y-4 mt-8">
                <div
                  class="glass-panel rounded-2xl p-6 aspect-square flex flex-col items-center justify-center text-center hover-lift">
                  <i data-lucide="home" class="w-10 h-10 text-[#d4af37] mb-3"></i>
                  <h4 class="font-semibold text-sm">The House</h4>
                  <p class="text-xs text-gray-500 mt-1">8-week residency</p>
                </div>
                <div
                  class="glass-panel rounded-2xl p-6 aspect-square flex flex-col items-center justify-center text-center hover-lift">
                  <i data-lucide="users" class="w-10 h-10 text-[#d4af37] mb-3"></i>
                  <h4 class="font-semibold text-sm">The Council</h4>
                  <p class="text-xs text-gray-500 mt-1">Business moguls</p>
                </div>
              </div>
              <div class="space-y-4">
                <div
                  class="glass-panel rounded-2xl p-6 aspect-square flex flex-col items-center justify-center text-center hover-lift">
                  <i data-lucide="briefcase" class="w-10 h-10 text-[#d4af37] mb-3"></i>
                  <h4 class="font-semibold text-sm">The Arena</h4>
                  <p class="text-xs text-gray-500 mt-1">Real tasks</p>
                </div>
                <div
                  class="glass-panel rounded-2xl p-6 aspect-square flex flex-col items-center justify-center text-center hover-lift">
                  <i data-lucide="gavel" class="w-10 h-10 text-[#d4af37] mb-3"></i>
                  <h4 class="font-semibold text-sm">Boardroom</h4>
                  <p class="text-xs text-gray-500 mt-1">Weekly judgments</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="order-1 lg:order-2 section-reveal">
          <div class="inline-flex items-center gap-3 mb-8">
            <div class="h-px w-16 bg-[#d4af37]"></div>
            <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">The Experience</span>
          </div>

          <h2 class="font-display text-4xl md:text-5xl font-bold mb-8 leading-tight">
            Life in the <br />
            <span class="text-gold-gradient italic">Colossus House</span>
          </h2>

          <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
            <p>
              For eight weeks, the Top 20 finalists reside in
              <span class="text-white font-medium">The Colossus House</span>.
              This environment serves as a pressure cooker of ambition, where
              contestants live together, form alliances, and prepare for the
              challenges ahead.
            </p>

            <p>
              It is here that the true character of every entrepreneur is
              revealed. The show features real-world business tasks designed
              to test
              <span class="text-[#d4af37]">resilience, creativity, and grit</span>.
            </p>
          </div>

          <div class="mt-8 space-y-4">
            <div class="flex items-start gap-4 p-5 rounded-xl border border-[#083B74]/50"
              style="background: linear-gradient(135deg, #083B74 0%, #0a1628 100%);">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
                <i data-lucide="sword" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  The Arena & Tasks
                </h4>
                <p class="text-sm text-gray-500">
                  From bustling markets to corporate towers, contestants
                  navigate the complexities of Lagos business under strict
                  deadlines.
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4 p-5 rounded-xl border border-[#083B74]/50"
              style="background: linear-gradient(135deg, #083B74 0%, #0a1628 100%);">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
                <i data-lucide="scale" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">The Boardroom</h4>
                <p class="text-sm text-gray-500">
                  Each week concludes in the ultimate judgement zone where
                  performance is critically evaluated, and those who fall
                  short face immediate eviction.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Impact Section -->
  <section id="impact" class="relative py-24 md:py-32"
    style="background: linear-gradient(160deg, #0a1628 0%, #070f1f 40%, #083B74 100%);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">Measurable Impact</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
          Building The Future of <span class="text-gold-gradient">Lagos</span>
        </h2>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg">
          Creating a new set of businesses, jobs, and entrepreneurial icons
          for Africa's most dynamic city.
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
        <div class="stat-card rounded-2xl p-8 section-reveal">
          <div class="flex items-start justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center">
              <i data-lucide="users" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <span class="text-xs font-semibold text-[#d4af37] bg-[#d4af37]/10 px-3 py-1 rounded-full">TRAINING</span>
          </div>
          <div class="text-4xl font-black text-white mb-2">
            500<span class="text-[#d4af37]">+</span>
          </div>
          <p class="text-gray-400 text-sm">
            Entrepreneurs to be trained at the pre-show stage
          </p>
        </div>

        <div class="stat-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.1s">
          <div class="flex items-start justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center">
              <i data-lucide="banknote" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <span class="text-xs font-semibold text-[#d4af37] bg-[#d4af37]/10 px-3 py-1 rounded-full">PRIZES</span>
          </div>
          <div class="text-4xl font-black text-white mb-2">120</div>
          <p class="text-gray-400 text-sm">
            Entrepreneurs to win direct cash prizes
          </p>
        </div>

        <div class="stat-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.2s">
          <div class="flex items-start justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center">
              <i data-lucide="graduation-cap" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <span class="text-xs font-semibold text-[#d4af37] bg-[#d4af37]/10 px-3 py-1 rounded-full">MENTORSHIP</span>
          </div>
          <div class="text-4xl font-black text-white mb-2">
            3 <span class="text-lg text-gray-500">Months</span>
          </div>
          <p class="text-gray-400 text-sm">
            Post-programme mentorship with industry titans
          </p>
        </div>

        <div class="stat-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.1s">
          <div class="flex items-start justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center">
              <i data-lucide="user-check" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <span class="text-xs font-semibold text-[#d4af37] bg-[#d4af37]/10 px-3 py-1 rounded-full">GUIDANCE</span>
          </div>
          <div class="text-4xl font-black text-white mb-2">
            30<span class="text-[#d4af37]">+</span>
          </div>
          <p class="text-gray-400 text-sm">Mentors from diverse industries</p>
        </div>

        <div class="stat-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.2s">
          <div class="flex items-start justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center">
              <i data-lucide="globe" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <span class="text-xs font-semibold text-[#d4af37] bg-[#d4af37]/10 px-3 py-1 rounded-full">EXPOSURE</span>
          </div>
          <div class="text-4xl font-black text-white mb-2">Top 20</div>
          <p class="text-gray-400 text-sm">
            Showcased on a global stage to inspire millions
          </p>
        </div>

        <div class="stat-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.3s">
          <div class="flex items-start justify-between mb-6">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center">
              <i data-lucide="brain" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <span class="text-xs font-semibold text-[#d4af37] bg-[#d4af37]/10 px-3 py-1 rounded-full">MINDSET</span>
          </div>
          <div class="text-4xl font-black text-white mb-2">Millions</div>
          <p class="text-gray-400 text-sm">
            Of viewers inspired across major TVs
          </p>
        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-6">
        <div class="glass-panel rounded-2xl p-8 flex items-center gap-6 section-reveal">
          <div
            class="w-16 h-16 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-transparent flex items-center justify-center flex-shrink-0">
            <i data-lucide="building" class="w-8 h-8 text-[#d4af37]"></i>
          </div>
          <div>
            <h4 class="text-xl font-bold mb-1">Creating New Businesses</h4>
            <p class="text-gray-400 text-sm">
              A new generation of Lagos-based enterprises with global
              potential.
            </p>
          </div>
        </div>

        <div class="glass-panel rounded-2xl p-8 flex items-center gap-6 section-reveal" style="transition-delay: 0.15s">
          <div
            class="w-16 h-16 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-transparent flex items-center justify-center flex-shrink-0">
            <i data-lucide="briefcase" class="w-8 h-8 text-[#d4af37]"></i>
          </div>
          <div>
            <h4 class="text-xl font-bold mb-1">Creating New Jobs</h4>
            <p class="text-gray-400 text-sm">
              Direct employment opportunities across Lagos and beyond.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Government Partnership -->
  <section class="relative py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a1628] via-[#0f1d32] to-[#0a1628]"></div>
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#d4af37]/5 rounded-full blur-[150px]"></div>

    <div class="relative max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div class="section-reveal">
          <div class="inline-flex items-center gap-3 mb-8">
            <div class="h-px w-16 bg-[#d4af37]"></div>
            <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">Official Partnership</span>
          </div>

          <h2 class="font-display text-4xl md:text-5xl font-bold mb-8 leading-tight">
            Why Lagos State Government <br />
            <span class="text-gold-gradient">Is On Board</span>
          </h2>

          <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
            <p>
              Lagos State Government through the
              <span class="text-white font-medium">Ministry of Wealth Creation and Employment</span>
              is committed to youth empowerment, job creation, innovation, and
              the growth of Micro, Small, and Medium Enterprises (MSMEs).
            </p>

            <p>
              The show aligns with Lagos' vision to position itself as
              <span class="text-[#d4af37]">Africa's leading hub for enterprise</span>
              by identifying, empowering, and scaling high-potential
              entrepreneurs who can drive economic growth and solve local
              challenges.
            </p>
          </div>

          <div class="mt-8 p-6 rounded-2xl bg-[#070f1f] border border-[#d4af37]/20">
            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
                <i data-lucide="shield" class="w-6 h-6 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-2">
                  A De-Risked Investment
                </h4>
                <p class="text-sm text-gray-400">
                  For private sector partners, this collaboration signals
                  credibility, alignment with state economic priorities, and
                  access to the next generation of high-growth businesses.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="reveal-right">
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-[#d4af37]/10 to-transparent rounded-3xl blur-2xl"></div>
            <div class="relative glass-panel-strong rounded-3xl p-10 text-center">
              <div
                class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-br from-[#d4af37] to-[#b8941f] flex items-center justify-center p-1">
                <div class="w-full h-full rounded-full bg-[#0a1628] flex items-center justify-center">
                  <i data-lucide="landmark" class="w-14 h-14 text-[#d4af37]"></i>
                </div>
              </div>

              <h3 class="font-display text-2xl font-bold mb-2">
                Lagos State Government
              </h3>
              <div class="h-px w-24 bg-[#d4af37]/30 mx-auto my-4"></div>
              <p class="text-[#d4af37] font-semibold mb-1">
                Ministry of Wealth Creation
              </p>
              <p class="text-[#d4af37] font-semibold mb-6">and Employment</p>

              <div class="space-y-3 text-left">
                <div class="flex items-center gap-3 text-sm text-gray-400">
                  <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                  <span>Youth Empowerment</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-400">
                  <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                  <span>Job Creation</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-400">
                  <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                  <span>Innovation & MSME Growth</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-400">
                  <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                  <span>Inclusive Prosperity</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Producers Section -->
  <section class="relative py-24 md:py-32"
    style="background: linear-gradient(160deg, #083B74 0%, #070f1f 50%, #0a1628 100%);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">The Architects</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">
          Produced By <span class="text-gold-gradient">Bravopoints</span>
        </h2>
      </div>

      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="section-reveal">
          <div class="relative glass-panel-strong rounded-3xl p-8 md:p-10">
            <div class="quote-mark">"</div>
            <p class="text-xl md:text-2xl font-display italic text-gray-300 leading-relaxed relative z-10 mb-8">
              For over a decade, we have stimulated and ignited
              entrepreneurship and economic development through creative media
              platforms.
            </p>

            <div class="flex items-center gap-4">
              <div
                class="w-14 h-14 rounded-full bg-gradient-to-br from-[#d4af37] to-[#b8941f] flex items-center justify-center">
                <span class="text-[#0a1628] font-black text-xl">B</span>
              </div>
              <div>
                <div class="font-bold text-white">
                  Bravopoints International
                </div>
                <div class="text-sm text-[#d4af37]">
                  Award-Winning Media Production
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="space-y-6 section-reveal">
          <div
            class="p-6 rounded-2xl bg-[#0a1628] border border-[#d4af37]/10 hover:border-[#d4af37]/30 transition-colors">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
                <i data-lucide="award" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  Global Recognition
                </h4>
                <p class="text-sm text-gray-400">
                  Previous winner of "Global Most Innovative Entrepreneurship
                  Company" by World Quality Day & Chartered Institute of
                  Quality UK.
                </p>
              </div>
            </div>
          </div>

          <div
            class="p-6 rounded-2xl bg-[#0a1628] border border-[#d4af37]/10 hover:border-[#d4af37]/30 transition-colors">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
                <i data-lucide="tv" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  The Next Titan Nigeria
                </h4>
                <p class="text-sm text-gray-400">
                  Producer of Nigeria's foremost entrepreneurial reality TV
                  show, now in its 11th season, with millions in prizes and
                  brand new cars for winners.
                </p>
              </div>
            </div>
          </div>

          <div
            class="p-6 rounded-2xl bg-[#0a1628] border border-[#d4af37]/10 hover:border-[#d4af37]/30 transition-colors">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
                <i data-lucide="mic" class="w-5 h-5 text-[#d4af37]"></i>
              </div>
              <div>
                <h4 class="font-semibold text-white mb-1">
                  Dialogue of Business Leaders
                </h4>
                <p class="text-sm text-gray-400">
                  Over 10 years of hosting top Nigerian business leaders
                  including CBN Governors, with hundreds of delegates as
                  participants.
                </p>
              </div>
            </div>
          </div>

          <div class="p-6 rounded-2xl bg-[#0a1628] border border-[#d4af37]/10">
            <h4 class="font-semibold text-[#d4af37] mb-3 text-sm tracking-wider uppercase">
              Previous Partners Include
            </h4>
            <p class="text-sm text-gray-500 leading-relaxed">
              Central Bank of Nigeria, MTN Nigeria, FGN, FCMB, First Bank,
              Union Bank, Toyota Nigeria, Zenith Bank, Shell Nigeria,
              AirPeace, and many more reputable organizations.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="relative py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#d4af37]/5 via-transparent to-[#d4af37]/5"></div>
    <div
      class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23d4af37\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]">
    </div>

    <div class="relative max-w-4xl mx-auto px-6 text-center section-reveal">
      <h2 class="font-display text-4xl md:text-6xl font-bold mb-6 leading-tight">
        Witness The Emergence of <br />
        <span class="text-gold-gradient italic">The Next Colossus</span>
      </h2>
      <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto leading-relaxed">
        The audacious come to build. The brave come to compete. The visionary
        come to stand tall. Are you ready to rise?
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
        <a href="register.php"
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

  <script>
    // Initialize Lucide icons
    lucide.createIcons();

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
      rootMargin: "0px 0px -60px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, observerOptions);

    document
      .querySelectorAll(
        ".section-reveal, .reveal-left, .reveal-right, .reveal-scale",
      )
      .forEach((el) => {
        observer.observe(el);
      });

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

    // Mobile Menu Logic
    const menuBtn = document.getElementById('menu-btn');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = mobileMenu.querySelectorAll('a');

    function toggleMenu(show) {
      if (show) {
        mobileMenu.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
      } else {
        mobileMenu.classList.add('translate-x-full');
        document.body.style.overflow = '';
      }
    }

    menuBtn?.addEventListener('click', () => toggleMenu(true));
    closeMenu?.addEventListener('click', () => toggleMenu(false));
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => toggleMenu(false));
    });

    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') toggleMenu(false);
    });
  </script>
</body>

</html>