<?php
require_once 'config.php';
$announcements = [];
try {
    $announcements = $pdo->query("SELECT * FROM announcements ORDER BY published_at DESC LIMIT 3")->fetchAll();
} catch (Exception $e) {
    // Database fallback if table not yet populated
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Colossus of Lagos | The Hustle. The Heat. The Rise.</title>
  <meta name="description" content="Official website and online registration platform for Colossus of Lagos — Africa's premier entrepreneurship TV show in partnership with Lagos State Government." />
  <meta name="keywords" content="Colossus of Lagos, entrepreneurship TV show, Lagos State Government, Ministry of Wealth Creation, Bravopoints, business pitch, Lagos startups" />
  
  <!-- OpenGraph & Twitter Cards -->
  <meta property="og:title" content="Colossus of Lagos | Official TV Show & Registration Platform" />
  <meta property="og:description" content="₦30M Grand Prize. 40 Bootcamp Winners. 53M+ TV Viewers. Register now for Colossus of Lagos." />
  <meta property="og:image" content="assets/slider/Artboard 1.png" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Colossus of Lagos | The Hustle. The Heat. The Rise." />
  <meta name="twitter:description" content="Africa's premier entrepreneurship competition and festival in partnership with Lagos State Government." />
  <meta name="twitter:image" content="assets/slider/Artboard 1.png" />

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
        <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo"
          class="h-10 md:h-16 w-auto object-contain" />
      </a>

      <div class="hidden lg:flex items-center gap-7">
        <a href="index.php" class="text-xs font-semibold text-white transition-colors border-b-2 border-yellow-400 pb-1">Home</a>
        <a href="about.php" class="text-xs font-medium text-gray-300 hover:text-yellow-400 transition-colors">About</a>
        <a href="eligibility.php" class="text-xs font-medium text-gray-300 hover:text-yellow-400 transition-colors">Eligibility</a>
        <a href="faq.php" class="text-xs font-medium text-gray-300 hover:text-yellow-400 transition-colors">FAQ</a>
      </div>

      <div class="flex items-center gap-4">
        <a href="register.php"
          class="hidden sm:inline-flex btn-gold px-6 py-2.5 rounded-full text-xs uppercase tracking-wider items-center gap-1.5 font-bold">
          <span>Register Now</span>
          <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
        </a>
        <button id="menu-btn"
          class="lg:hidden w-10 h-10 flex items-center justify-center text-gray-300 hover:text-yellow-400 transition-colors">
          <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu"
    class="fixed inset-0 z-[60] bg-[#0a1628]/98 backdrop-blur-xl translate-x-full transition-transform duration-500 lg:hidden">
    <div class="flex flex-col h-full p-8 overflow-y-auto">
      <div class="flex items-center justify-between mb-8">
        <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" class="h-8 w-auto" />
        <button id="close-menu" class="text-gray-400 hover:text-white">
          <i data-lucide="x" class="w-8 h-8"></i>
        </button>
      </div>

      <nav class="flex flex-col gap-5 text-lg font-bold">
        <a href="index.php" class="text-yellow-400">Home</a>
        <a href="about.php" class="text-gray-300 hover:text-yellow-400">About the Show</a>
        <a href="eligibility.php" class="text-gray-300 hover:text-yellow-400">Eligibility</a>
        <a href="faq.php" class="text-gray-300 hover:text-yellow-400">FAQ</a>
      </nav>

      <div class="mt-auto pt-8 border-t border-white/10">
        <a href="register.php" class="btn-gold w-full py-4 rounded-full text-center uppercase tracking-widest block">
          Register Now
        </a>
      </div>
    </div>
  </div>

  <!-- Hero Section with Interactive Slider & Visual Experience -->
  <section class="relative w-full pt-[90px] md:pt-[110px] overflow-hidden bg-[#0a1628]">
    <!-- Top Interactive Slider -->
    <div class="relative w-full aspect-[1920/680] md:aspect-[1920/600] group shadow-2xl shadow-black/80">
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
      <div class="absolute inset-0 bg-gradient-to-b from-[#0a1628]/40 via-transparent to-[#0a1628] z-10 pointer-events-none"></div>

      <!-- Slider Arrows -->
      <button id="prev-slide"
        class="absolute left-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full border border-yellow-400/20 bg-[#0a1628]/70 text-yellow-400 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1628] hover:border-yellow-400 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex" aria-label="Previous slide">
        <i data-lucide="chevron-left" class="w-6 h-6"></i>
      </button>
      <button id="next-slide"
        class="absolute right-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full border border-yellow-400/20 bg-[#0a1628]/70 text-yellow-400 flex items-center justify-center hover:bg-yellow-400 hover:text-[#0a1628] hover:border-yellow-400 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex" aria-label="Next slide">
        <i data-lucide="chevron-right" class="w-6 h-6"></i>
      </button>

      <!-- Slider Dots -->
      <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex gap-2.5">
        <button class="w-2.5 h-2.5 rounded-full bg-yellow-400 transition-all duration-300 slide-dot" data-slide="0"></button>
        <button class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="1"></button>
        <button class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="2"></button>
        <button class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="3"></button>
        <button class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="4"></button>
        <button class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-yellow-400/50 transition-all duration-300 slide-dot" data-slide="5"></button>
      </div>
    </div>

    <!-- Hero Headline & Core Presentation -->
    <div class="relative max-w-7xl mx-auto px-6 pt-12 pb-20">
      <div class="text-center max-w-4xl mx-auto">
        <!-- Partnership Badge -->
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-[#070f1f]/90 border border-yellow-400/30 backdrop-blur-md mb-8 shadow-xl">
          <img src="assets/proposal/lagos_seal.png" alt="Lagos State Government Seal" class="w-7 h-7 object-contain" />
          <span class="text-xs md:text-sm font-semibold tracking-wide text-gray-200">
            Official Partner: <strong class="text-yellow-400">Lagos State Government</strong> • Ministry of Wealth Creation & Employment
          </span>
        </div>

        <h1 class="font-display text-4xl sm:text-6xl md:text-7xl font-black tracking-tight leading-[1.08] mb-4">
          COLOSSUS <span class="text-gold-gradient italic">OF LAGOS</span>
        </h1>

        <p class="text-xs sm:text-sm uppercase tracking-[0.3em] text-[#d4af37] font-bold mb-4">
          Lagos State Annual Entrepreneurship Competition & Festival
        </p>

        <p class="text-xl sm:text-2xl text-gray-200 font-display italic mb-6">
          "The Hustle. The Heat. The Rise."
        </p>

        <p class="text-gray-300 text-base sm:text-lg leading-relaxed font-light mb-10 max-w-3xl mx-auto">
          With Lagos State Government as a major Official Partner, Colossus of Lagos is an impactful platform that strengthens the entrepreneurial ecosystem, promotes innovation, encourages enterprise development, and connects ambitious entrepreneurs with capital, mentorship, markets, and investors.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
          <a href="register.php" class="btn-gold px-8 py-4 rounded-full text-sm font-bold uppercase tracking-wider inline-flex items-center gap-3 shadow-lg shadow-yellow-400/20 hover:scale-105 transition-all w-full sm:w-auto justify-center">
            <span>Register Your Business Now</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
          <button onclick="document.getElementById('video-modal').classList.remove('hidden');" class="btn-outline-gold px-8 py-4 rounded-full text-sm font-bold uppercase tracking-wider inline-flex items-center gap-3 hover:bg-yellow-400/10 transition-all w-full sm:w-auto justify-center">
            <i data-lucide="play-circle" class="w-5 h-5 text-yellow-400"></i>
            <span>Watch Show Trailer</span>
          </button>
        </div>

        <!-- 4 Golden Metrics Ribbon -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-5 text-left">
          <div class="glass-panel p-4 sm:p-5 lg:p-4 xl:p-5 rounded-2xl border-l-4 border-yellow-400 hover-lift flex flex-col justify-between overflow-hidden">
            <div>
              <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Grand Finale Champion</div>
              <div class="font-display text-lg sm:text-xl md:text-2xl lg:text-xl xl:text-2xl 2xl:text-3xl font-extrabold text-yellow-400 mb-1 tracking-tight whitespace-nowrap">₦30,000,000</div>
            </div>
            <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Awarded to the ultimate champion of the Grand Finale</p>
          </div>

          <div class="glass-panel p-4 sm:p-5 lg:p-4 xl:p-5 rounded-2xl border-l-4 border-yellow-400 hover-lift flex flex-col justify-between overflow-hidden">
            <div>
              <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Bootcamp Seed Grants</div>
              <div class="font-display text-lg sm:text-xl md:text-2xl lg:text-xl xl:text-2xl 2xl:text-3xl font-extrabold text-white mb-1 tracking-tight whitespace-nowrap">40 × ₦1M</div>
            </div>
            <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">40 standout entrepreneurs win ₦1,000,000 each</p>
          </div>

          <div class="glass-panel p-4 sm:p-5 lg:p-4 xl:p-5 rounded-2xl border-l-4 border-yellow-400 hover-lift flex flex-col justify-between overflow-hidden">
            <div>
              <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Summit Delegates</div>
              <div class="font-display text-lg sm:text-xl md:text-2xl lg:text-xl xl:text-2xl 2xl:text-3xl font-extrabold text-yellow-400 mb-1 tracking-tight whitespace-nowrap">1,000+</div>
            </div>
            <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Delegates attending the Entrepreneurship Convention</p>
          </div>

          <div class="glass-panel p-4 sm:p-5 lg:p-4 xl:p-5 rounded-2xl border-l-4 border-yellow-400 hover-lift flex flex-col justify-between overflow-hidden">
            <div>
              <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Total TV Viewership</div>
              <div class="font-display text-lg sm:text-xl md:text-2xl lg:text-xl xl:text-2xl 2xl:text-3xl font-extrabold text-white mb-1 tracking-tight whitespace-nowrap">53M+</div>
            </div>
            <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Channels TV, TVC, Hip TV & Africa Magic nationwide</p>
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
        <div class="lg:col-span-5 flex justify-center">
          <div class="relative w-full max-w-md">
            <div class="absolute inset-0 bg-gradient-to-br from-[#d4af37]/20 to-[#083B74]/30 rounded-3xl blur-2xl"></div>
            <div class="relative glass-panel-strong rounded-3xl p-8 sm:p-10 border border-yellow-400/30 text-center flex flex-col items-center">
              <div class="w-36 h-36 sm:w-44 sm:h-44 rounded-full bg-gradient-to-br from-yellow-400/10 to-[#083B74]/20 border-2 border-yellow-400/40 p-4 mb-6 shadow-2xl flex items-center justify-center">
                <img src="assets/proposal/lagos_seal.png" alt="Official Seal of Lagos State Government" class="max-w-full max-h-full object-contain filter drop-shadow-[0_10px_20px_rgba(212,175,55,0.4)]" />
              </div>
              <span class="text-xs font-bold text-yellow-400 uppercase tracking-widest mb-1">Official Major Partner</span>
              <h3 class="font-display text-2xl font-bold text-white mb-2">LAGOS STATE GOVERNMENT</h3>
              <p class="text-xs text-gray-300 uppercase tracking-wider font-semibold">Ministry of Wealth Creation and Employment</p>
              <div class="mt-6 pt-6 border-t border-white/10 w-full flex items-center justify-center gap-3 text-xs text-gray-400">
                <i data-lucide="shield-check" class="w-4 h-4 text-green-400"></i>
                <span>Institutional Endorsement & Prize Governance</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Official Partnership Rationale & Vision -->
        <div class="lg:col-span-7">
          <div class="inline-flex items-center gap-2 mb-4">
            <div class="h-px w-10 bg-yellow-400"></div>
            <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">State Strategic Backing</span>
          </div>

          <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold mb-6 leading-tight">
            Accelerating Enterprise, Innovation & <span class="text-gold-gradient">Sustainable Job Creation</span>
          </h2>

          <div class="space-y-5 text-gray-300 text-sm sm:text-base leading-relaxed font-light">
            <p>
              Lagos State Government supports <strong class="text-white font-medium">Colossus of Lagos</strong> as a strategic platform to accelerate entrepreneurship, job creation, and innovation across the state.
            </p>
            <p>
              The festival directly aligns with Lagos State's vision to position itself as Africa's leading hub for enterprise by identifying, empowering, and scaling high-potential entrepreneurs who can drive economic growth, solve local challenges, and create sustainable employment.
            </p>
            <div class="p-6 rounded-2xl bg-[#0a1628] border-l-4 border-yellow-400 border border-white/5 shadow-xl">
              <p class="italic text-gray-200 text-sm leading-relaxed mb-3">
                "Through this initiative, Lagos State is investing in talent development, private sector growth, and inclusive prosperity — leveraging MEDIA as a catalyst for real economic impact."
              </p>
              <span class="text-xs font-semibold text-yellow-400 tracking-wider uppercase">— Official Desk, Ministry of Wealth Creation & Employment</span>
            </div>
            <p>
              <strong class="text-yellow-400 font-semibold">Benefits for Corporate Sponsors & Partners:</strong> This landmark public-private collaboration signals immense credibility, direct alignment with state economic priorities, and privileged access to the next generation of high-growth businesses shaping the economic landscape of Lagos and Nigeria.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About The Platform: Competition & Festival -->
  <section id="about" class="py-24 md:py-32 bg-[#0a1628] relative">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">About The Show</span>
          <div class="h-px w-10 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-6">
          The Premier Platform for <span class="text-gold-gradient">Next-Gen Titans</span>
        </h2>
        <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light">
          Colossus of Lagos is designed to be the most exciting entrepreneurship platform in Lagos and Nigeria — an annual competition and one-month festival bringing together entrepreneurs, aspiring business owners, corporate brands, investors, mentors, and the public.
        </p>
      </div>

      <!-- 4 Core Pillars Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="glass-panel p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 hover-lift transition-all flex flex-col justify-between">
          <div>
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-6">
              <i data-lucide="award" class="w-7 h-7"></i>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-3">₦30M Grand Prize</h3>
            <p class="text-gray-400 text-xs sm:text-sm leading-relaxed font-light mb-4">
              One exceptional champion from the Grand Finale is awarded ₦30 million in direct equity-free prize capital to accelerate their venture.
            </p>
          </div>
          <div class="text-xs text-yellow-400 font-semibold flex items-center gap-1.5 pt-4 border-t border-white/5">
            <i data-lucide="check" class="w-3.5 h-3.5"></i>
            <span>Winner Takes All</span>
          </div>
        </div>

        <div class="glass-panel p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 hover-lift transition-all flex flex-col justify-between">
          <div>
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-6">
              <i data-lucide="coins" class="w-7 h-7"></i>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-3">40 × ₦1M Seed Grants</h3>
            <p class="text-gray-400 text-xs sm:text-sm leading-relaxed font-light mb-4">
              40 promising entrepreneurs from the Bootcamp stage each receive ₦1,000,000 cash grants — injecting ₦40,000,000 directly into grassroots startups.
            </p>
          </div>
          <div class="text-xs text-yellow-400 font-semibold flex items-center gap-1.5 pt-4 border-t border-white/5">
            <i data-lucide="check" class="w-3.5 h-3.5"></i>
            <span>40 Winners Empowered</span>
          </div>
        </div>

        <div class="glass-panel p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 hover-lift transition-all flex flex-col justify-between">
          <div>
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-6">
              <i data-lucide="briefcase" class="w-7 h-7"></i>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-3">Top 20 Investors Evening</h3>
            <p class="text-gray-400 text-xs sm:text-sm leading-relaxed font-light mb-4">
              The 20 best entrepreneurs are hosted at an exclusive Investors Evening with angel investors, VC firms, and corporate leaders for direct financing.
            </p>
          </div>
          <div class="text-xs text-yellow-400 font-semibold flex items-center gap-1.5 pt-4 border-t border-white/5">
            <i data-lucide="check" class="w-3.5 h-3.5"></i>
            <span>Direct Investor Dealflow</span>
          </div>
        </div>

        <div class="glass-panel p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 hover-lift transition-all flex flex-col justify-between">
          <div>
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-6">
              <i data-lucide="users" class="w-7 h-7"></i>
            </div>
            <h3 class="font-display text-xl font-bold text-white mb-3">1,000-Person Summit</h3>
            <p class="text-gray-400 text-xs sm:text-sm leading-relaxed font-light mb-4">
              A high-impact Entrepreneurship Convention with 1,000 participants and over 20 top mentors, industry titans, and keynote speakers.
            </p>
          </div>
          <div class="text-xs text-yellow-400 font-semibold flex items-center gap-1.5 pt-4 border-t border-white/5">
            <i data-lucide="check" class="w-3.5 h-3.5"></i>
            <span>Over 20 Industry Mentors</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- The 8 Core Programme Elements -->
  <section class="py-24 bg-[#070f1f] relative border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
        <div>
          <div class="inline-flex items-center gap-2 mb-3">
            <div class="h-px w-10 bg-yellow-400"></div>
            <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Strategic Architecture</span>
          </div>
          <h2 class="font-display text-3xl sm:text-5xl font-bold">8 Foundational Elements</h2>
          <p class="text-gray-400 text-xs sm:text-sm mt-2 max-w-xl font-light">
            A comprehensive, multi-dimensional platform bridging capital, capacity development, media visibility, and social celebration.
          </p>
        </div>
        <a href="register.php" class="btn-gold px-6 py-2.5 rounded-full text-xs uppercase tracking-wider font-bold inline-flex items-center gap-2 self-start md:self-auto">
          <span>Apply to Compete</span>
          <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
        </a>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="trophy" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">1. Entrepreneurship Competition</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            Competitive multi-round audition, pitch evaluation, and boardroom showdown to discover the sharpest business minds.
          </p>
        </div>

        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="mic" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">2. Entrepreneurship Convention</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            1,000-participant summit connecting youth founders with policymakers, industry captains, and investors.
          </p>
        </div>

        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="book-open" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">3. Capacity Development</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            Equipping entrepreneurs with practical knowledge, business modeling, financial governance, and scalability frameworks.
          </p>
        </div>

        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="trending-up" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">4. Investors Engagement</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            Closed-door sessions connecting promising founders with angel syndicates, institutional investors, and bank partners.
          </p>
        </div>

        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="network" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">5. Strategic Networking</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            Uniting government leaders, corporate giants, development institutions, and innovators into a thriving business ecosystem.
          </p>
        </div>

        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="sparkles" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">6. Corporate Brand Activation</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            Sponsor experiential centers, branded challenge tasks, TV commercial integration, and product sampling across events.
          </p>
        </div>

        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="music" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">7. Entertainment & Celebration</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            Celebrating the indomitable spirit of Lagos with high-energy live shows, musical performances, and cultural gala events.
          </p>
        </div>

        <div class="p-6 rounded-2xl bg-[#0a1628]/80 border border-white/5 hover:border-yellow-400/30 transition-all hover-lift">
          <div class="w-10 h-10 rounded-xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 mb-4">
            <i data-lucide="tv" class="w-5 h-5"></i>
          </div>
          <h3 class="font-bold text-white text-base mb-2">8. Media Visibility & Reach</h3>
          <p class="text-xs text-gray-400 leading-relaxed font-light">
            50M+ digital impressions, nationwide TV broadcasting, YouTube live streaming, and interactive public polls.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Programme Roadmap: 7-Stage Official Journey (Events + Stages) -->
  <section id="stages" class="py-24 md:py-32 bg-[#0a1628] relative">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-20">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Format & Programme</span>
          <div class="h-px w-10 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-6">
          The 7-Stage <span class="text-gold-gradient">Road to the Colossus</span>
        </h2>
        <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light">
          An interconnected sequence of competitive milestones and public festival events designed to create excitement, deliver real business value, and crown Africa's next business colossus.
        </p>
      </div>

      <!-- Roadmap Timeline Grid -->
      <div class="space-y-6">
        <!-- Stage 1 -->
        <div class="glass-panel p-6 sm:p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col md:flex-row md:items-center justify-between gap-6">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-display font-extrabold text-xl flex-shrink-0">
              01
            </div>
            <div>
              <div class="text-[11px] font-bold text-yellow-400 uppercase tracking-widest mb-1">Inaugural Launch</div>
              <h3 class="font-display text-xl sm:text-2xl font-bold text-white mb-2">Official Press Conference</h3>
              <p class="text-xs sm:text-sm text-gray-400 leading-relaxed font-light max-w-2xl">
                High-level commencement addressed by state officials, executive producers, and partners. Over 40 journalists in attendance across print, television, and digital media.
              </p>
            </div>
          </div>
          <div class="flex items-center gap-2 text-xs text-gray-400 bg-white/5 px-4 py-2 rounded-full border border-white/10 self-start md:self-auto whitespace-nowrap">
            <i data-lucide="radio" class="w-4 h-4 text-yellow-400"></i>
            <span>Media Launch & Partner Unveiling</span>
          </div>
        </div>

        <!-- Stage 2 -->
        <div class="glass-panel p-6 sm:p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col md:flex-row md:items-center justify-between gap-6">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-display font-extrabold text-xl flex-shrink-0">
              02
            </div>
            <div>
              <div class="text-[11px] font-bold text-yellow-400 uppercase tracking-widest mb-1">Statewide Applications (2 Weeks)</div>
              <h3 class="font-display text-xl sm:text-2xl font-bold text-white mb-2">Call for Registrations</h3>
              <p class="text-xs sm:text-sm text-gray-400 leading-relaxed font-light max-w-2xl">
                Open registration opportunity for all Lagos-based aspiring entrepreneurs, youth founders, and innovators across all local government areas.
              </p>
            </div>
          </div>
          <a href="register.php" class="btn-gold px-6 py-2.5 rounded-full text-xs uppercase tracking-wider font-bold inline-flex items-center gap-2 self-start md:self-auto whitespace-nowrap">
            <span>Register Venture</span>
            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
          </a>
        </div>

        <!-- Stage 3 -->
        <div class="glass-panel p-6 sm:p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col md:flex-row md:items-center justify-between gap-6">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-display font-extrabold text-xl flex-shrink-0">
              03
            </div>
            <div>
              <div class="text-[11px] font-bold text-yellow-400 uppercase tracking-widest mb-1">Live Screening & Pitches</div>
              <h3 class="font-display text-xl sm:text-2xl font-bold text-white mb-2">Auditions / Business Pitches</h3>
              <p class="text-xs sm:text-sm text-gray-400 leading-relaxed font-light max-w-2xl">
                Rigorous pitching sessions across dual hubs — <strong class="text-white">Lagos Mainland</strong> and <strong class="text-white">Lagos Island</strong>. Candidates pitch business viability directly before an evaluation panel.
              </p>
            </div>
          </div>
          <div class="flex items-center gap-2 text-xs text-gray-400 bg-white/5 px-4 py-2 rounded-full border border-white/10 self-start md:self-auto whitespace-nowrap">
            <i data-lucide="map-pin" class="w-4 h-4 text-yellow-400"></i>
            <span>Mainland & Island Hubs</span>
          </div>
        </div>

        <!-- Stage 4 -->
        <div class="glass-panel p-6 sm:p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col md:flex-row md:items-center justify-between gap-6">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-display font-extrabold text-xl flex-shrink-0">
              04
            </div>
            <div>
              <div class="text-[11px] font-bold text-yellow-400 uppercase tracking-widest mb-1">1,000 Participants Mega-Summit</div>
              <h3 class="font-display text-xl sm:text-2xl font-bold text-white mb-2">Entrepreneurship Convention</h3>
              <p class="text-xs sm:text-sm text-gray-400 leading-relaxed font-light max-w-2xl">
                A massive gathering of 1,000 delegates, emerging founders, enterprise leaders, ministers, and investors. High-level keynotes, masterclasses, and capacity development.
              </p>
            </div>
          </div>
          <div class="flex items-center gap-2 text-xs text-gray-400 bg-white/5 px-4 py-2 rounded-full border border-white/10 self-start md:self-auto whitespace-nowrap">
            <i data-lucide="users" class="w-4 h-4 text-yellow-400"></i>
            <span>1,000 Delegates • 20+ Mentors</span>
          </div>
        </div>

        <!-- Stage 5 -->
        <div class="glass-panel p-6 sm:p-8 rounded-2xl border-2 border-yellow-400/50 hover:border-yellow-400 transition-all hover-lift flex flex-col md:flex-row md:items-center justify-between gap-6 bg-gradient-to-r from-yellow-400/10 via-transparent to-transparent">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-yellow-400 text-[#0a1628] flex items-center justify-center font-display font-black text-xl flex-shrink-0 shadow-lg shadow-yellow-400/30">
              05
            </div>
            <div>
              <div class="text-[11px] font-black text-yellow-400 uppercase tracking-widest mb-1">₦40M Total Cash Disbursed</div>
              <h3 class="font-display text-xl sm:text-2xl font-bold text-white mb-2">Top 100 Bootcamp (40 Winners × ₦1M Each)</h3>
              <p class="text-xs sm:text-sm text-gray-300 leading-relaxed font-light max-w-2xl">
                Intensive business accelerator bootcamp. 40 standout entrepreneurs are selected to win ₦1,000,000 cash prizes each, receiving immediate catalytic business funding!
              </p>
            </div>
          </div>
          <div class="flex items-center gap-2 text-xs font-bold text-yellow-400 bg-yellow-400/10 px-4 py-2 rounded-full border border-yellow-400/30 self-start md:self-auto whitespace-nowrap">
            <i data-lucide="sparkles" class="w-4 h-4"></i>
            <span>40 × ₦1,000,000 Cash Grants</span>
          </div>
        </div>

        <!-- Stage 6 -->
        <div class="glass-panel p-6 sm:p-8 rounded-2xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col md:flex-row md:items-center justify-between gap-6">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-display font-extrabold text-xl flex-shrink-0">
              06
            </div>
            <div>
              <div class="text-[11px] font-bold text-yellow-400 uppercase tracking-widest mb-1">Boardroom Capital Showcase</div>
              <h3 class="font-display text-xl sm:text-2xl font-bold text-white mb-2">Top 20 Contestants' Investors Evening</h3>
              <p class="text-xs sm:text-sm text-gray-400 leading-relaxed font-light max-w-2xl">
                The 20 best entrepreneurs are hosted at an elite gala evening, pitching directly to angel syndicates, venture capitalists, corporate partners, and diaspora investors.
              </p>
            </div>
          </div>
          <div class="flex items-center gap-2 text-xs text-gray-400 bg-white/5 px-4 py-2 rounded-full border border-white/10 self-start md:self-auto whitespace-nowrap">
            <i data-lucide="gem" class="w-4 h-4 text-yellow-400"></i>
            <span>Top 20 Finalists Pitch</span>
          </div>
        </div>

        <!-- Stage 7 -->
        <div class="glass-panel p-6 sm:p-8 rounded-2xl border-2 border-yellow-400 rounded-2xl flex flex-col md:flex-row md:items-center justify-between gap-6 bg-[#070f1f] shadow-2xl shadow-yellow-400/10">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-yellow-400 to-amber-500 text-[#0a1628] flex items-center justify-center font-display font-black text-xl flex-shrink-0 shadow-xl shadow-yellow-400/40">
              07
            </div>
            <div>
              <div class="text-[11px] font-black text-yellow-400 uppercase tracking-widest mb-1">Grand Climax & 500+ VIP Guests</div>
              <h3 class="font-display text-xl sm:text-2xl font-bold text-white mb-2">Grand Finale: Crowning The ₦30,000,000 Colossus</h3>
              <p class="text-xs sm:text-sm text-gray-300 leading-relaxed font-light max-w-2xl">
                Televised live across Africa with Lagos State leadership, industry icons, and celebrities in attendance. One visionary founder is crowned with the ₦30 Million grand equity-free prize!
              </p>
            </div>
          </div>
          <div class="text-right self-start md:self-auto">
            <div class="font-display text-2xl sm:text-3xl font-extrabold text-yellow-400">₦30,000,000</div>
            <span class="text-[11px] text-gray-400 uppercase tracking-wider">Ultimate Prize Award</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Media Leverage & Expected Reach Section -->
  <section class="py-24 bg-[#070f1f] relative overflow-hidden border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Broadcast & Distribution</span>
          <div class="h-px w-10 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">
          Unmatched Media Leverage & <span class="text-gold-gradient">53M+ Viewers</span>
        </h2>
        <p class="text-gray-400 text-xs sm:text-sm font-light">
          Broadcast on leading nationwide television networks, supplemented by digital streaming and social media amplification across Nigeria and the African diaspora.
        </p>
      </div>

      <!-- TV Broadcasters Grid -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center flex flex-col items-center justify-between hover-lift">
          <div class="h-20 flex items-center justify-center mb-4">
            <img src="assets/proposal/channels_tv.jpg" alt="Channels TV" class="max-h-16 w-auto object-contain rounded-lg" />
          </div>
          <div>
            <h4 class="font-bold text-white text-base">Channels TV</h4>
            <div class="text-xs text-yellow-400 font-extrabold mt-1">20 Million Viewership</div>
            <p class="text-[11px] text-gray-500 mt-1">Saturday Primetime</p>
          </div>
        </div>

        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center flex flex-col items-center justify-between hover-lift">
          <div class="h-20 flex items-center justify-center mb-4">
            <img src="assets/proposal/africa_magic.jpg" alt="Africa Magic" class="max-h-16 w-auto object-contain rounded-lg" />
          </div>
          <div>
            <h4 class="font-bold text-white text-base">Africa Magic Family</h4>
            <div class="text-xs text-yellow-400 font-extrabold mt-1">15 Million Viewership</div>
            <p class="text-[11px] text-gray-500 mt-1">DSTV 154 (Sundays)</p>
          </div>
        </div>

        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center flex flex-col items-center justify-between hover-lift">
          <div class="h-20 flex items-center justify-center mb-4">
            <img src="assets/proposal/hiptv.png" alt="Hip TV" class="max-h-16 w-auto object-contain rounded-lg" />
          </div>
          <div>
            <h4 class="font-bold text-white text-base">Hip TV</h4>
            <div class="text-xs text-yellow-400 font-extrabold mt-1">10 Million Viewership</div>
            <p class="text-[11px] text-gray-500 mt-1">DSTV & GOTV (Sundays)</p>
          </div>
        </div>

        <div class="glass-panel p-6 rounded-2xl border border-white/5 hover:border-yellow-400/40 text-center flex flex-col items-center justify-between hover-lift">
          <div class="h-20 flex items-center justify-center mb-4">
            <img src="assets/proposal/tvc.jpg" alt="TVC" class="max-h-16 w-auto object-contain rounded-lg" />
          </div>
          <div>
            <h4 class="font-bold text-white text-base">TVC Network</h4>
            <div class="text-xs text-yellow-400 font-extrabold mt-1">8 Million Viewership</div>
            <p class="text-[11px] text-gray-500 mt-1">News & Entertainment</p>
          </div>
        </div>
      </div>

      <!-- Projected Reach Banner -->
      <div class="glass-panel-strong rounded-3xl p-8 md:p-10 border border-yellow-400/20">
        <div class="grid sm:grid-cols-3 gap-8 text-center divide-y sm:divide-y-0 sm:divide-x divide-white/10">
          <div class="pt-4 sm:pt-0">
            <div class="font-display text-3xl sm:text-4xl font-extrabold text-yellow-400 mb-1">5M+</div>
            <div class="text-xs uppercase tracking-wider text-white font-semibold">Weekly Impressions</div>
            <p class="text-xs text-gray-400 mt-1 font-light">Cross-channel TV and digital footprint</p>
          </div>
          <div class="pt-4 sm:pt-0">
            <div class="font-display text-3xl sm:text-4xl font-extrabold text-white mb-1">50M+</div>
            <div class="text-xs uppercase tracking-wider text-yellow-400 font-semibold">Digital Impressions</div>
            <p class="text-xs text-gray-400 mt-1 font-light">Season-wide social media amplification</p>
          </div>
          <div class="pt-4 sm:pt-0">
            <div class="font-display text-3xl sm:text-4xl font-extrabold text-yellow-400 mb-1">1M+</div>
            <div class="text-xs uppercase tracking-wider text-white font-semibold">Audience Interactions</div>
            <p class="text-xs text-gray-400 mt-1 font-light">Community polls, trivia, and live voting</p>
          </div>
        </div>

        <div class="mt-8 pt-8 border-t border-white/10 flex flex-wrap items-center justify-center gap-6 text-xs text-gray-400">
          <span class="text-gray-300 font-semibold uppercase tracking-wider">Multi-Platform Amplification:</span>
          <span class="flex items-center gap-1.5"><i data-lucide="video" class="w-4 h-4 text-red-500"></i> YouTube Streaming</span>
          <span class="flex items-center gap-1.5"><i data-lucide="instagram" class="w-4 h-4 text-pink-500"></i> Instagram Reels</span>
          <span class="flex items-center gap-1.5"><i data-lucide="music-2" class="w-4 h-4 text-cyan-400"></i> TikTok Challenges</span>
          <span class="flex items-center gap-1.5"><i data-lucide="twitter" class="w-4 h-4 text-blue-400"></i> X (Twitter) Trends</span>
          <span class="flex items-center gap-1.5"><i data-lucide="facebook" class="w-4 h-4 text-blue-600"></i> Facebook Community</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Target Audience Demographics -->
  <section class="py-24 bg-[#0a1628] relative">
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
            <div class="w-16 h-16 rounded-2xl bg-yellow-400/10 text-yellow-400 flex items-center justify-center mx-auto mb-6">
              <i data-lucide="handshake" class="w-8 h-8"></i>
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

  <!-- About The Producers: Bravopoints International -->
  <section class="py-20 bg-[#0a1628] relative border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
      <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-white/5 flex flex-col lg:flex-row items-center gap-10">
        <div class="w-full lg:w-1/3 flex flex-col items-center text-center">
          <div class="p-6 rounded-2xl bg-white/5 border border-white/10 mb-4 max-w-[260px]">
            <img src="assets/proposal/bravopoints.png" alt="Bravopoints International" class="w-full h-auto object-contain" />
          </div>
          <span class="text-xs text-yellow-400 font-bold uppercase tracking-widest">Executive Producers</span>
          <p class="text-[11px] text-gray-400 mt-1">Global Most Innovative Entrepreneurship Company (2018)</p>
        </div>

        <div class="w-full lg:w-2/3 border-t lg:border-t-0 lg:border-l border-white/10 lg:pl-10">
          <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-4">
            Africa's Foremost Business Reality & Media Producers
          </h3>
          <p class="text-gray-300 text-xs sm:text-sm leading-relaxed font-light mb-4">
            Bravopoints International is a premier media production company delivering inspiring, entertaining business content to audiences across Africa. Renowned as the producers of Africa's longest-running entrepreneurial reality show, <strong class="text-white font-medium">The Next Titan Nigeria</strong>, Bravopoints stimulates and ignites the entrepreneurial spirit in young Africans through creative business media platforms.
          </p>
          <div class="flex flex-wrap items-center gap-2 pt-2 text-[11px] text-gray-400">
            <span class="text-yellow-400 font-semibold uppercase tracking-wider">Trusted by Industry Leaders:</span>
            <span>Central Bank of Nigeria •</span>
            <span>MTN •</span>
            <span>First Bank •</span>
            <span>Shell •</span>
            <span>Zenith Bank •</span>
            <span>Oando •</span>
            <span>Coscharis</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- News & Announcements (Dynamic Database Integration) -->
  <section id="news" class="py-24 md:py-32 bg-[#070f1f] border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
        <div>
          <div class="inline-flex items-center gap-2 mb-3">
            <div class="h-px w-10 bg-yellow-400"></div>
            <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">Official Bulletins</span>
          </div>
          <h2 class="font-display text-3xl sm:text-5xl font-bold">News & Announcements</h2>
          <p class="text-gray-400 text-xs sm:text-sm mt-2 max-w-xl font-light">
            Stay informed on audition calls, convention scheduling, state partnership bulletins, and bootcamp updates.
          </p>
        </div>
        <a href="about.php#stages" class="btn-gold px-6 py-2.5 rounded-full text-xs uppercase tracking-wider font-bold inline-flex items-center gap-2 self-start md:self-auto">
          <span>Explore All Stages</span>
          <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
        </a>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <?php if (!empty($announcements)): ?>
          <?php foreach ($announcements as $item): ?>
            <div class="glass-panel rounded-2xl overflow-hidden hover-lift border border-white/5 hover:border-yellow-400/40 flex flex-col justify-between">
              <div class="relative h-48 overflow-hidden">
                <img src="<?php echo htmlspecialchars($item['image'] ?: 'assets/slider/Artboard 1.png'); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
                <div class="absolute top-3 left-3 bg-[#0a1628]/90 text-yellow-400 text-[10px] font-bold px-3 py-1 rounded-full border border-yellow-400/30 uppercase tracking-wider">
                  <?php echo htmlspecialchars($item['category']); ?>
                </div>
              </div>
              <div class="p-6 flex-1 flex flex-col justify-between">
                <div>
                  <div class="text-[11px] text-gray-500 mb-2 flex items-center gap-1.5">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 text-yellow-400"></i>
                    <span><?php echo date('M j, Y', strtotime($item['published_at'] ?: $item['created_at'])); ?></span>
                  </div>
                  <h3 class="font-bold text-base text-white mb-2 leading-snug">
                    <?php echo htmlspecialchars($item['title']); ?>
                  </h3>
                  <p class="text-xs text-gray-400 font-light leading-relaxed mb-4">
                    <?php echo htmlspecialchars(substr($item['content'], 0, 140)) . '...'; ?>
                  </p>
                </div>
                <a href="about.php#stages" class="text-xs font-bold text-yellow-400 flex items-center gap-1 hover:underline pt-2 border-t border-white/5">
                  <span>Read Full Notice</span>
                  <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="glass-panel rounded-2xl p-6 border border-white/5 hover-lift">
            <span class="text-[10px] font-bold text-yellow-400 bg-yellow-400/10 px-2.5 py-1 rounded-full uppercase">Auditions</span>
            <div class="text-xs text-gray-400 mt-3 mb-1">November 2026</div>
            <h3 class="font-bold text-white text-base mb-2">Audition Dates Confirmed Across Lagos Mainland & Island</h3>
            <p class="text-xs text-gray-400 font-light leading-relaxed">
              Dual-hub live pitches open to all registered candidates across Ikeja, Surulere, Victoria Island, and surrounding zones.
            </p>
          </div>
        <?php endif; ?>
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
            <span class="font-semibold text-base sm:text-lg">Who is eligible to register for Colossus of Lagos?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            Registration is open to young entrepreneurs, graduates, undergraduates, and startup founders based in Lagos, primarily aged 20 to 39 years. You must have an innovative, scalable, or commercially viable business idea or operating business.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden border border-white/5">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors" onclick="toggleFaq(this)">
            <span class="font-semibold text-base sm:text-lg">How are the prizes distributed?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            The champion of the Grand Finale receives a ₦30,000,000 cash prize. In addition, 40 outstanding entrepreneurs emerging from the Bootcamp stage will each receive ₦1,000,000 in cash seed grants (₦40M total). The Top 20 finalists are also hosted at the Investors Evening for direct private funding.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden border border-white/5">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors" onclick="toggleFaq(this)">
            <span class="font-semibold text-base sm:text-lg">Do the organizers or Lagos State Government take equity in my venture?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            No. The producers and Lagos State Government will not take ownership, equity, or management control of your business. The prize awards are intended to empower and catalyze enterprise development, leaving 100% ownership with the founder.
          </div>
        </div>

        <div class="glass-panel rounded-xl overflow-hidden border border-white/5">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-yellow-400/5 transition-colors" onclick="toggleFaq(this)">
            <span class="font-semibold text-base sm:text-lg">Where will the auditions take place?</span>
            <i data-lucide="plus" class="w-5 h-5 text-yellow-400 flex-shrink-0 transition-transform"></i>
          </button>
          <div class="hidden px-6 pb-5 text-gray-400 text-xs sm:text-sm leading-relaxed font-light">
            Auditions and live pitches will be held across two designated primary hubs: Lagos Mainland and Lagos Island. Exact dates and venues will be communicated to registered applicants via email and SMS.
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
        Join thousands of ambitious entrepreneurs across Lagos. ₦30M Grand Prize, 40 × ₦1M Bootcamp Grants, over 20 top mentors, and national television exposure await you.
      </p>

      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="register.php" class="btn-gold px-10 py-4 rounded-full text-sm font-bold uppercase tracking-widest inline-flex items-center gap-3 shadow-xl shadow-yellow-400/20 hover:scale-105 transition-all w-full sm:w-auto justify-center">
          <span>Apply For Season I</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <a href="faq.php" class="btn-outline-gold px-8 py-4 rounded-full text-sm font-bold uppercase tracking-widest inline-flex items-center gap-2 hover:bg-yellow-400/10 transition-all w-full sm:w-auto justify-center">
          <span>Read Guidelines</span>
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
            <li><a href="index.php" class="hover:text-white transition-colors">Home</a></li>
            <li><a href="about.php" class="hover:text-white transition-colors">About</a></li>
            <li><a href="judges.php" class="hover:text-white transition-colors">The Council</a></li>
            <li><a href="#episodes" class="hover:text-white transition-colors">Episodes & Gallery</a></li>
            <li><a href="#news" class="hover:text-white transition-colors">News & Bulletins</a></li>
            <li><a href="eligibility.php" class="hover:text-white transition-colors">Eligibility</a></li>
            <li><a href="faq.php" class="hover:text-white transition-colors">FAQ</a></li>
            <li><a href="contact.php" class="hover:text-white transition-colors">Contact</a></li>
          </ul>
        </div>

        <!-- Newsletter Subscription (TechieXtract Scope) -->
        <div>
          <h4 class="font-semibold mb-4 text-[#d4af37] text-sm tracking-wider uppercase">
            Newsletter Bulletin
          </h4>
          <p class="text-xs text-gray-400 mb-4 font-light leading-relaxed">
            Subscribe for immediate alerts on audition venues, contestant updates, and episode transmissions.
          </p>
          <form id="newsletterForm" class="space-y-3">
            <div id="newsletterAlert" class="hidden p-3 rounded-lg text-xs font-semibold"></div>
            <div class="flex flex-col sm:flex-row gap-2">
              <input type="email" name="email" required placeholder="Enter your email" class="px-4 py-2.5 rounded-xl bg-[#0a1628] border border-white/10 text-white text-xs flex-1 focus:outline-none focus:border-[#d4af37]" />
              <button type="submit" class="btn-gold px-4 py-2.5 rounded-xl text-xs uppercase font-bold tracking-wider whitespace-nowrap">
                Subscribe
              </button>
            </div>
          </form>
          <div class="mt-6">
            <h5 class="text-[11px] uppercase tracking-wider text-gray-500 font-bold mb-2">Official Desk</h5>
            <p class="text-xs text-gray-400 font-light">Lagos State Ministry of Wealth Creation & Employment</p>
          </div>
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

  <!-- Floating WhatsApp Widget (TechieXtract Scope) -->
  <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry" target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-40 flex items-center gap-3 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-transform" title="Chat on WhatsApp">
    <i data-lucide="message-circle" class="w-6 h-6"></i>
    <span class="text-xs font-bold hidden sm:inline">WhatsApp Help Desk</span>
  </a>

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