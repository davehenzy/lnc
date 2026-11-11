<?php
// Colossus of Lagos - FAQ Page
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Frequently Asked Questions | Colossus of Lagos</title>
  <meta name="description" content="Find comprehensive answers about Colossus of Lagos — Africa's premier entrepreneurship competition and festival in partnership with Lagos State Government. ₦30M Grand Prize, 40 × ₦1M grants, 1-month duration, auditions across 5 zones." />
  <meta name="keywords" content="Colossus of Lagos FAQ, entrepreneurship TV show, Lagos State Government, business pitch questions, audition centres, ₦30M prize, Bravopoints" />

  <!-- OpenGraph & Twitter Cards -->
  <meta property="og:title" content="Colossus of Lagos FAQ | Everything You Need To Know" />
  <meta property="og:description" content="Get answers on eligibility, 2-week registration, 1-month festival schedule, 5 audition zones, and ₦70M+ prize pool." />
  <meta property="og:image" content="assets/slider/Artboard 1.png" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Colossus of Lagos FAQ | Everything You Need To Know" />
  <meta name="twitter:description" content="Answers on eligibility, auditions, 1-month timeline, and prizes." />
  <meta name="twitter:image" content="assets/slider/Artboard 1.png" />

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
      background-color: var(--navy-deep);
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
      background: var(--navy-deep);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--gold);
      border-radius: 4px;
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

    .glass-panel {
      background: rgba(15, 29, 50, 0.7);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(212, 175, 55, 0.18);
    }

    .glass-panel-strong {
      background: rgba(10, 22, 40, 0.9);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(212, 175, 55, 0.25);
    }

    .section-reveal {
      opacity: 0;
      transform: translateY(30px);
      transition:
        opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
        transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .section-reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .nav-blur {
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
      background-color: rgba(7, 15, 31, 0.95) !important;
    }

    .btn-gold {
      background: linear-gradient(135deg, var(--gold), var(--gold-dark));
      color: var(--navy-deep);
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
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(212, 175, 55, 0.35);
    }

    .btn-outline-gold {
      border: 1.5px solid rgba(212, 175, 55, 0.5);
      color: var(--gold-light);
      transition: all 0.3s ease;
    }

    .btn-outline-gold:hover {
      background: rgba(212, 175, 55, 0.12);
      border-color: var(--gold);
      color: white;
    }

    .faq-item {
      background: linear-gradient(145deg,
          rgba(8, 59, 116, 0.35),
          rgba(10, 22, 40, 0.95));
      border: 1px solid rgba(212, 175, 55, 0.15);
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
      overflow: hidden;
    }

    .faq-item:hover {
      border-color: rgba(212, 175, 55, 0.35);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .faq-item.active {
      border-color: rgba(212, 175, 55, 0.6);
      background: linear-gradient(145deg,
          rgba(8, 59, 116, 0.5),
          rgba(7, 15, 31, 0.98));
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    }

    .faq-question {
      transition: color 0.3s ease;
    }

    .faq-item.active .faq-question {
      color: var(--gold-light);
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition:
        max-height 0.45s cubic-bezier(0.16, 1, 0.3, 1),
        opacity 0.3s ease;
      opacity: 0;
    }

    .faq-item.active .faq-answer {
      opacity: 1;
    }

    .faq-icon {
      transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .faq-item.active .faq-icon {
      transform: rotate(45deg);
      color: var(--gold-light);
    }

    .category-pill {
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .category-pill:hover,
    .category-pill.active {
      background: rgba(212, 175, 55, 0.18);
      border-color: var(--gold);
      color: var(--gold-light);
      box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
    }

    .search-glow:focus {
      box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.25);
      border-color: var(--gold);
    }

    .hover-lift {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
      transform: translateY(-4px);
    }
  </style>
</head>

<body class="antialiased text-white bg-[#070f1f] overflow-x-hidden">
  
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
        <a href="eligibility.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">Eligibility</a>
        <a href="faq.php" class="text-sm font-semibold text-[#d4af37] transition-colors border-b-2 border-[#d4af37] pb-1">FAQ</a>
      </div>

      <div class="flex items-center gap-4">
        <a href="register.php" class="hidden sm:inline-flex btn-gold px-6 py-2.5 rounded-full text-xs md:text-sm uppercase tracking-wider items-center gap-2">
          <span>Register Now</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <button id="menu-btn" class="md:hidden text-white hover:text-[#d4af37] transition-colors">
          <i data-lucide="menu" class="w-7 h-7"></i>
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
        <a href="eligibility.php" class="text-gray-300 hover:text-[#d4af37]">Eligibility</a>
        <a href="faq.php" class="text-[#d4af37]">FAQ</a>
      </nav>

      <div class="mt-auto pt-8 border-t border-white/10">
        <a href="register.php" class="btn-gold w-full py-4 rounded-full text-center uppercase tracking-widest block font-bold">
          Register Now
        </a>
      </div>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="relative min-h-[55vh] flex items-center justify-center overflow-hidden pt-[115px] md:pt-[135px] pb-16 bg-gradient-to-b from-[#0a1628] via-[#070f1f] to-[#070f1f]">
    <!-- Background atmospheric glows -->
    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute top-10 left-1/4 w-96 h-96 bg-[#083B74]/25 rounded-full blur-[120px]"></div>
      <div class="absolute bottom-10 right-1/4 w-96 h-96 bg-yellow-400/10 rounded-full blur-[140px]"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
      
      <!-- Official Partner Badge -->
      <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full glass-panel mb-8 shadow-xl">
        <img src="assets/proposal/lagos_seal.png" alt="Lagos State Seal" class="w-6 h-6 object-contain" />
        <span class="text-xs md:text-sm font-semibold tracking-wide text-gray-200">
          Official Partner: <strong class="text-yellow-400">Lagos State Government</strong>
        </span>
      </div>

      <h1 class="font-display text-4xl sm:text-6xl md:text-7xl font-black leading-tight mb-4 tracking-tight">
        Frequently <span class="text-gold-gradient italic">Asked Questions</span>
      </h1>

      <p class="max-w-2xl mx-auto text-base sm:text-lg text-gray-300 font-light leading-relaxed mb-8">
        Everything you need to know about the Colossus of Lagos — 1-month festival duration, 2-week registration, audition mechanics across 5 zones, and ₦70M+ in non-dilutive prizes.
      </p>

      <!-- Instant Live Search -->
      <div class="max-w-xl mx-auto relative section-reveal">
        <input type="text" id="faqSearch" placeholder="Search keywords (e.g., duration, audition, prize, equity, age)..."
          class="w-full px-6 py-4 pl-14 rounded-full bg-[#0a1628] border border-yellow-400/30 text-white placeholder-gray-400 focus:outline-none search-glow transition-all shadow-2xl text-sm" />
        <i data-lucide="search" class="w-5 h-5 text-yellow-400 absolute left-5 top-1/2 -translate-y-1/2"></i>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-[#070f1f] to-transparent pointer-events-none"></div>
  </section>

  <!-- 4 Quick Golden Metrics Banner (Overflow-Proof) -->
  <section class="relative z-20 max-w-7xl mx-auto px-6 -mt-6 mb-12">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-5 text-left">
      <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
        <div class="min-w-0 mb-2">
          <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Grand Finale Champion</div>
          <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-yellow-400 tracking-tight leading-tight whitespace-nowrap tabular-nums">₦30,000,000</div>
        </div>
        <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">100% equity-free cash prize for winner</p>
      </div>

      <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
        <div class="min-w-0 mb-2">
          <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Bootcamp Seed Grants</div>
          <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-white tracking-tight leading-tight whitespace-nowrap tabular-nums"><span class="text-yellow-400">40 ×</span> ₦1M</div>
        </div>
        <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">40 standout founders win ₦1M each</p>
      </div>

      <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
        <div class="min-w-0 mb-2">
          <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Summit Delegates</div>
          <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-yellow-400 tracking-tight leading-tight whitespace-nowrap tabular-nums">1,000+</div>
        </div>
        <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Entrepreneurs & ecosystem partners</p>
      </div>

      <div class="rounded-2xl border border-yellow-400/50 bg-[#070f1f]/90 backdrop-blur-md p-4 sm:p-5 lg:px-4 lg:py-5 xl:px-5 hover:border-yellow-400 hover-lift flex flex-col justify-between min-w-0 shadow-lg shadow-black/40 transition-all">
        <div class="min-w-0 mb-2">
          <div class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1 truncate">Total TV Viewership</div>
          <div class="text-sm sm:text-base md:text-lg lg:text-base xl:text-lg 2xl:text-xl font-bold text-white tracking-tight leading-tight whitespace-nowrap tabular-nums">53M+</div>
        </div>
        <p class="text-[11px] sm:text-xs text-gray-400 font-light leading-snug">Channels TV, Africa Magic, Hip TV & TVC</p>
      </div>
    </div>
  </section>

  <!-- FAQ Content Section -->
  <section class="relative py-12 md:py-20">
    <div class="max-w-4xl mx-auto px-6">
      
      <!-- Category Filter Pills -->
      <div class="flex flex-wrap justify-center gap-2.5 mb-10 section-reveal">
        <button class="category-pill active px-4 py-2 rounded-full border border-yellow-400/30 text-xs sm:text-sm font-medium text-gray-300"
          onclick="filterCategory('all', this)">
          All Questions <span class="ml-1 px-1.5 py-0.5 rounded-full text-[10px] bg-yellow-400/20 text-yellow-400 font-bold">19</span>
        </button>
        <button class="category-pill px-4 py-2 rounded-full border border-yellow-400/30 text-xs sm:text-sm font-medium text-gray-300"
          onclick="filterCategory('general', this)">
          Overview & Identity
        </button>
        <button class="category-pill px-4 py-2 rounded-full border border-yellow-400/30 text-xs sm:text-sm font-medium text-gray-300"
          onclick="filterCategory('eligibility', this)">
          Eligibility & Registration
        </button>
        <button class="category-pill px-4 py-2 rounded-full border border-yellow-400/30 text-xs sm:text-sm font-medium text-gray-300"
          onclick="filterCategory('auditions', this)">
          Auditions & Pitches
        </button>
        <button class="category-pill px-4 py-2 rounded-full border border-yellow-400/30 text-xs sm:text-sm font-medium text-gray-300"
          onclick="filterCategory('duration', this)">
          Duration & Timeline
        </button>
        <button class="category-pill px-4 py-2 rounded-full border border-yellow-400/30 text-xs sm:text-sm font-medium text-gray-300"
          onclick="filterCategory('prizes', this)">
          Prizes & Equity
        </button>
      </div>

      <!-- FAQ Container -->
      <div class="space-y-4" id="faqContainer">

        <!-- CATEGORY: GENERAL & OVERVIEW -->
        <div class="faq-item rounded-2xl section-reveal" data-category="general">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What is Colossus of Lagos?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              <strong class="text-white font-semibold">Colossus of Lagos</strong> is Lagos State's premier annual entrepreneurship competition and festival, created in strategic partnership with the <strong class="text-yellow-400">Lagos State Government</strong> through the <strong class="text-white">Ministry of Wealth Creation and Employment</strong>. It serves as an economic launchpad designed to discover, celebrate, mentor, and fund ambitious young founders whose enterprises drive technological innovation, social impact, and sustainable job creation across Lagos.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="general">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">How does Colossus of Lagos differ from traditional reality TV shows?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              Unlike typical reality entertainment formats that sequester contestants in an isolated house for 8 to 12 weeks, <strong class="text-white">Colossus of Lagos is a dynamic 1-month entrepreneurial festival</strong>. It is structured to be completely <strong class="text-yellow-400">non-disruptive to active businesses</strong>. Founders participate in milestone-based sessions (auditions, convention, bootcamp accelerator, investors evening, and finale) while continuing to run and direct their day-to-day operations.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="general">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What role does the Lagos State Government play?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              The <strong class="text-white">Lagos State Government</strong>, represented by the <strong class="text-yellow-400">Ministry of Wealth Creation and Employment</strong>, is the official institutional partner. The government endorses the initiative, oversees strategic alignment with state economic empowerment agendas, facilitates institutional access for winners, and assists standout participants in integrating into state procurement and funding opportunities.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="general">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">Who are the Executive Producers?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              The show is executively produced by <strong class="text-white">Bravopoints International Limited</strong>, the visionary production company behind Africa's most consistent entrepreneurial reality show, <strong class="text-yellow-400">The Next Titan Nigeria</strong> (11+ consecutive seasons). Bravopoints was recognized by the Chartered Institute of Quality UK with the "Global Most Innovative Entrepreneurship Company" award and has managed business competitions trusted by top financial institutions across Nigeria.
            </div>
          </div>
        </div>

        <!-- CATEGORY: ELIGIBILITY & REGISTRATION -->
        <div class="faq-item rounded-2xl section-reveal" data-category="eligibility">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">Who is eligible to participate?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              Participation is open to Nigerian citizens aged <strong class="text-white font-semibold">20 to 40 years</strong> who reside in Lagos or operate a business base within Lagos State. It is open to graduates, undergraduates of higher institutions of learning, and self-taught innovators. You must have an active operating business or a viable, scalable business idea, and possess no direct affiliation with Bravopoints International or primary sponsors.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="eligibility">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">Do I need an already registered or existing company?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              <strong class="text-yellow-400 font-semibold">No.</strong> An incorporated company is not mandatory at the point of registration. We accept both <strong class="text-white">early-stage operating businesses</strong> and <strong class="text-white">validated business concepts/ideas</strong>. Our evaluation prioritizes innovation, product-market fit, commercial viability, scalability, and founder execution grit.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="eligibility">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">Can I apply if I am not a Lagos indigene?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              <strong class="text-white font-semibold">Yes, absolutely.</strong> Colossus of Lagos is inclusive. You do not need to be an indigene. As long as you currently reside in Lagos or your business operates within Lagos State, you are fully eligible. Proof of residence can be verified with a LASRRA ID, utility bill, or Lagos business address.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="eligibility">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">How long will registrations remain open?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              The Call for Registrations runs strictly for <strong class="text-yellow-400 font-semibold">two (2) weeks</strong>. Due to rapid broadcast production screening and nationwide audition scheduling, late submissions cannot be accepted. Candidates are encouraged to submit early to ensure their materials are thoroughly reviewed.
            </div>
          </div>
        </div>

        <!-- CATEGORY: AUDITIONS & PITCHES -->
        <div class="faq-item rounded-2xl section-reveal" data-category="auditions">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">Where will the regional auditions take place?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              Auditions will be conducted in-person across <strong class="text-white">5 major zones in Lagos</strong> covering <strong class="text-yellow-400">Lagos Mainland and Lagos Island</strong>, corresponding to the historic 5 IBILE administrative divisions:
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/10">
                  <i data-lucide="map-pin" class="w-4 h-4 text-yellow-400 flex-shrink-0"></i>
                  <div>
                    <span class="font-bold text-white text-xs block">Lagos Island Hub</span>
                    <span class="text-[11px] text-gray-400">Financial District</span>
                  </div>
                </div>
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/10">
                  <i data-lucide="map-pin" class="w-4 h-4 text-yellow-400 flex-shrink-0"></i>
                  <div>
                    <span class="font-bold text-white text-xs block">Lagos mainland</span>
                    <span class="text-[11px] text-gray-400">State Capital</span>
                  </div>
                </div>
          
              </div>
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="auditions">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What is the live pitch format during auditions?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              Shortlisted candidates deliver a <strong class="text-white">3 to 5-minute uninterrupted live pitch</strong> before a distinguished jury of investors and Lagos State business leaders. This is followed by <strong class="text-white">3 minutes of jury Q&A</strong> addressing unit economics, customer traction, and scalability. All auditions are filmed in high definition for national TV broadcast.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="auditions">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What criteria will the audition judges look for?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              The jury assesses pitches across <strong class="text-yellow-400 font-semibold">4 Essential Pillars</strong>:
              <ul class="list-disc pl-5 mt-2 space-y-1.5 text-xs text-gray-300">
                <li><strong class="text-white">Innovation:</strong> Uniqueness, problem-solving depth, and defensible market advantage.</li>
                <li><strong class="text-white">Commercial Viability:</strong> Realistic revenue model, viable customer acquisition cost, and sound unit economics.</li>
                <li><strong class="text-white">Scalability & Job Creation:</strong> Ability to grow across Lagos LGAs and hire local youth talent.</li>
                <li><strong class="text-white">Founder Grit:</strong> Passion, coachability, poise under pressure, and strategic clarity.</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="auditions">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What should I bring along on audition day?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              Please arrive with:
              <ol class="list-decimal pl-5 mt-2 space-y-1.5 text-xs text-gray-300">
                <li><strong class="text-white">Valid Government-Issued Photo ID:</strong> NIN Slip, Voter's Card, Driver's License, or International Passport.</li>
                <li><strong class="text-white">Proof of Lagos Base:</strong> LASRRA card, Lagos utility bill, or Lagos business address evidence.</li>
                <li><strong class="text-white">Product Prototype or Pitch Deck:</strong> Physical product sample (if applicable) or PowerPoint presentation on a USB flash drive.</li>
                <li><strong class="text-white">Registration Confirmation Slip:</strong> Showing your unique applicant reference number.</li>
              </ol>
            </div>
          </div>
        </div>

        <!-- CATEGORY: DURATION & TIMELINE -->
        <div class="faq-item rounded-2xl section-reveal" data-category="duration">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What is the overall duration and roadmap of the competition?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              The competition operates as an agile <strong class="text-yellow-400 font-semibold">1-Month Festival</strong> structured across 6 major milestones:
              <ul class="mt-3 space-y-2 text-xs">
                <li><strong class="text-white">Stage 1 (Weeks 1–2):</strong> Call for Registrations (2-Week window) & screening.</li>
                <li><strong class="text-white">Stage 2 (Week 3):</strong> In-person Regional Auditions across 5 Lagos Zones.</li>
                <li><strong class="text-white">Stage 3 (Week 4):</strong> 1,000+ Entrepreneurship Convention & Exhibition.</li>
                <li><strong class="text-white">Stage 4 (Week 5):</strong> Top 100 Intensive Accelerator Bootcamp (<strong class="text-yellow-400">40 × ₦1M grants awarded</strong>).</li>
                <li><strong class="text-white">Stage 5 (Week 6):</strong> Top 20 Investors Evening (Boardroom pitch gala to VCs).</li>
                <li><strong class="text-white">Stage 6 (Grand Finale):</strong> Live Televised Championship crowning the ₦30M Winner.</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="duration">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">Will participating disrupt my everyday business operations?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              <strong class="text-white font-semibold">No.</strong> The 1-month festival design specifically guarantees that founders do not abandon their existing businesses. Milestones (audition days, convention, bootcamp masterclasses, investor dinners, and the grand finale) are scheduled with strategic notice so you can maintain day-to-day managerial control of your venture throughout.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="duration">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What happens at the 1,000+ Entrepreneurship Convention?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              The Convention brings together over <strong class="text-white">1,000 founders, young innovators, policymakers, and corporate leaders</strong> in Lagos. It features keynote addresses from high-ranking government officials and enterprise titans, practical masterclasses on scaling, intellectual property, fundraising, and a high-visibility exhibition pavilion where emerging businesses showcase products.
            </div>
          </div>
        </div>

        <!-- CATEGORY: PRIZES & EQUITY -->
        <div class="faq-item rounded-2xl section-reveal" data-category="prizes">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What prizes and financial support are awarded?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              Over <strong class="text-yellow-400 font-semibold">₦70,000,000+</strong> in catalytic funding is disbursed:
              <ul class="space-y-2.5 mt-3">
                <li class="flex items-start gap-2.5 text-xs">
                  <i data-lucide="award" class="w-4 h-4 text-yellow-400 flex-shrink-0 mt-0.5"></i>
                  <span><strong class="text-white">₦30,000,000 Grand Prize:</strong> Non-dilutive, equity-free cash prize awarded to the champion at the televised Grand Finale.</span>
                </li>
                <li class="flex items-start gap-2.5 text-xs">
                  <i data-lucide="award" class="w-4 h-4 text-yellow-400 flex-shrink-0 mt-0.5"></i>
                  <span><strong class="text-white">40 × ₦1,000,000 Bootcamp Grants:</strong> 40 standout entrepreneurs selected from the Top 100 Bootcamp stage each win ₦1,000,000 in immediate cash seed funding (₦40M total).</span>
                </li>
                <li class="flex items-start gap-2.5 text-xs">
                  <i data-lucide="briefcase" class="w-4 h-4 text-yellow-400 flex-shrink-0 mt-0.5"></i>
                  <span><strong class="text-white">Top 20 Investors Evening:</strong> Exclusive boardroom access to private venture capitalists, angel syndicates, and financial institutions for equity matchmaking.</span>
                </li>
                <li class="flex items-start gap-2.5 text-xs">
                  <i data-lucide="shield-check" class="w-4 h-4 text-yellow-400 flex-shrink-0 mt-0.5"></i>
                  <span><strong class="text-white">Post-Show Ecosystem Backing:</strong> Continued institutional support and business clinic advisory backed by the Lagos State Ministry of Wealth Creation and Employment.</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="prizes">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">Will the organizers or Lagos State Government take equity in my company?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              <strong class="text-yellow-400 font-bold uppercase tracking-wider text-xs block mb-1">Zero Equity / 100% Founder Ownership</strong>
              Neither Bravopoints International, the show producers, title sponsors, nor the Lagos State Government will take any equity, shares, or management control of your business. All prize money is awarded as <strong class="text-white">non-dilutive catalytic grants</strong>. You retain 100% ownership and control of your venture.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="prizes">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">On which television networks will the show be broadcast?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              The competition reaches over <strong class="text-white font-semibold">53 Million viewers nationwide</strong> across Nigeria's four premier broadcast networks:
              <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-3 text-center">
                <div class="p-3 rounded-xl bg-white/5 border border-white/10">
                  <span class="text-yellow-400 font-black text-sm block">20M</span>
                  <span class="text-white text-xs font-semibold block">Channels TV</span>
                  <span class="text-[10px] text-gray-400">Prime Saturdays</span>
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10">
                  <span class="text-yellow-400 font-black text-sm block">15M</span>
                  <span class="text-white text-xs font-semibold block">Africa Magic</span>
                  <span class="text-[10px] text-gray-400">DStv Ch. 154</span>
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10">
                  <span class="text-yellow-400 font-black text-sm block">10M</span>
                  <span class="text-white text-xs font-semibold block">Hip TV</span>
                  <span class="text-[10px] text-gray-400">Youth Reach</span>
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10">
                  <span class="text-yellow-400 font-black text-sm block">8M</span>
                  <span class="text-white text-xs font-semibold block">TVC</span>
                  <span class="text-[10px] text-gray-400">News & Ent.</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="prizes">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-base sm:text-lg pr-4">What mentorship and growth support occur post-show?</span>
            <div class="w-8 h-8 rounded-full bg-yellow-400/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-yellow-400 faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-300 text-sm leading-relaxed border-t border-yellow-400/10 pt-4 font-light">
              Standout founders enter a structured <strong class="text-white">3-month post-show business incubation and advisory track</strong> connecting them with seasoned corporate mentors, angel syndicates, and institutional supply chain partners. In addition, the Lagos State Ministry of Wealth Creation and Employment facilitates public sector access, supplier integration, and continued capacity-building workshops.
            </div>
          </div>
        </div>

      </div>

      <!-- No Results State -->
      <div id="noResults" class="hidden text-center py-12">
        <div class="w-16 h-16 rounded-full bg-yellow-400/10 text-yellow-400 flex items-center justify-center mx-auto mb-4">
          <i data-lucide="help-circle" class="w-8 h-8"></i>
        </div>
        <h4 class="text-lg font-bold text-white mb-2">No matching questions found</h4>
        <p class="text-xs text-gray-400 max-w-sm mx-auto mb-6">We couldn't find any question matching your search. Please reach out to our WhatsApp Help Desk for immediate answers.</p>
        <button onclick="resetSearch()" class="btn-outline-gold px-6 py-2 rounded-full text-xs font-semibold uppercase tracking-wider">
          Reset Filter & Search
        </button>
      </div>

      <!-- Still Have Questions Callout Card -->
      <div class="mt-16 rounded-3xl border border-yellow-400/30 bg-gradient-to-r from-[#0a1628] via-[#0d1e38] to-[#0a1628] p-8 sm:p-10 text-center section-reveal shadow-2xl">
        <div class="w-14 h-14 rounded-2xl bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center mx-auto mb-5">
          <i data-lucide="message-square" class="w-7 h-7"></i>
        </div>
        <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-3">Still Have an Unanswered Question?</h3>
        <p class="text-gray-300 text-sm max-w-xl mx-auto font-light leading-relaxed mb-6">
          Our dedicated team at the Colossus of Lagos Secretariat is available to assist you with registration inquiries, venue directions, and eligibility verification.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry%20regarding%20registration" target="_blank" rel="noopener"
            class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-[#25D366] hover:bg-[#20bd5a] text-white px-7 py-3.5 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider shadow-xl transition-all">
            <i data-lucide="message-circle" class="w-5 h-5"></i>
            <span>Chat on WhatsApp</span>
          </a>
          <a href="register.php" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 btn-gold px-7 py-3.5 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider shadow-xl">
            <span>Apply For Season I</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>
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
          <p class="text-gray-400 text-sm max-w-sm leading-relaxed mb-6 font-light">
            Africa's premier entrepreneurship competition and festival in strategic partnership with the Lagos State Government (Ministry of Wealth Creation and Employment) to empower high-growth youth enterprises.
          </p>
          <div class="flex items-center gap-4">
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-400 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all" aria-label="Instagram">
              <i data-lucide="instagram" class="w-4 h-4"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-400 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all" aria-label="Twitter">
              <i data-lucide="twitter" class="w-4 h-4"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-400 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all" aria-label="Facebook">
              <i data-lucide="facebook" class="w-4 h-4"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-400 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all" aria-label="YouTube">
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
              <a href="eligibility.php" class="hover:text-white transition-colors">Eligibility</a>
            </li>
            <li>
              <a href="faq.php" class="text-white font-medium">FAQ</a>
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
          
          <h4 class="font-semibold mb-2 text-[#d4af37] text-xs tracking-wider uppercase">Newsletter</h4>
          <form id="newsletterForm" class="space-y-2">
            <div id="newsletterAlert" class="hidden p-2 rounded-lg text-xs font-semibold"></div>
            <div class="flex gap-2">
              <input type="email" name="email" required placeholder="Enter email" class="px-3 py-2 rounded-lg bg-[#0a1628] border border-white/10 text-white text-xs flex-1 focus:outline-none focus:border-yellow-400" />
              <button type="submit" class="btn-gold px-3 py-2 rounded-lg text-xs uppercase font-bold tracking-wider">
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
  <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry%20regarding%20registration" target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-40 flex items-center gap-2.5 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-transform" title="Chat on WhatsApp">
    <i data-lucide="message-circle" class="w-5 h-5"></i>
    <span class="text-xs font-bold hidden sm:inline">WhatsApp Help Desk</span>
  </a>

  <!-- JavaScript Interactions -->
  <script>
    lucide.createIcons();

    // Navbar scroll effect
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", () => {
      if (window.scrollY > 40) {
        navbar.classList.add("nav-blur");
      } else {
        navbar.classList.remove("nav-blur");
      }
    });

    // Intersection Observer
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
          }
        });
      },
      { threshold: 0.08, rootMargin: "0px 0px -40px 0px" },
    );

    document.querySelectorAll(".section-reveal").forEach((el) => observer.observe(el));

    // FAQ Toggle Logic
    function toggleFaq(button) {
      const item = button.closest(".faq-item");
      const answer = item.querySelector(".faq-answer");
      const isActive = item.classList.contains("active");

      // Close other active items
      document.querySelectorAll(".faq-item.active").forEach((el) => {
        if (el !== item) {
          el.classList.remove("active");
          const ans = el.querySelector(".faq-answer");
          if (ans) ans.style.maxHeight = null;
        }
      });

      if (isActive) {
        item.classList.remove("active");
        answer.style.maxHeight = null;
      } else {
        item.classList.add("active");
        answer.style.maxHeight = answer.scrollHeight + 30 + "px";
      }
    }

    // Filter by Category
    let currentCategory = 'all';

    function filterCategory(category, btn) {
      currentCategory = category;
      
      // Update pill classes
      document.querySelectorAll(".category-pill").forEach((p) => p.classList.remove("active"));
      if (btn) btn.classList.add("active");

      applyFilters();
    }

    // Real-Time Search & Category Combined Filtering
    const searchInput = document.getElementById("faqSearch");
    const noResults = document.getElementById("noResults");

    function applyFilters() {
      const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
      const items = document.querySelectorAll(".faq-item");
      let visibleCount = 0;

      items.forEach((item) => {
        const itemCat = item.getAttribute("data-category");
        const questionText = item.querySelector(".faq-question").textContent.toLowerCase();
        const answerText = item.querySelector(".faq-answer").textContent.toLowerCase();

        const matchesCat = (currentCategory === 'all' || itemCat === currentCategory);
        const matchesQuery = !query || questionText.includes(query) || answerText.includes(query);

        if (matchesCat && matchesQuery) {
          item.style.display = "block";
          visibleCount++;
        } else {
          item.style.display = "none";
          // Close if hidden
          item.classList.remove("active");
          const ans = item.querySelector(".faq-answer");
          if (ans) ans.style.maxHeight = null;
        }
      });

      if (noResults) {
        if (visibleCount === 0) {
          noResults.classList.remove("hidden");
        } else {
          noResults.classList.add("hidden");
        }
      }
    }

    if (searchInput) {
      searchInput.addEventListener("input", applyFilters);
    }

    function resetSearch() {
      if (searchInput) searchInput.value = '';
      const allPill = document.querySelector(".category-pill");
      filterCategory('all', allPill);
    }

    // Mobile Menu
    const menuBtn = document.getElementById('menu-btn');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = mobileMenu ? mobileMenu.querySelectorAll('a') : [];

    function toggleMenu(show) {
      if (!mobileMenu) return;
      if (show) {
        mobileMenu.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
      } else {
        mobileMenu.classList.add('translate-x-full');
        document.body.style.overflow = '';
      }
    }

    if (menuBtn) menuBtn.addEventListener('click', () => toggleMenu(true));
    if (closeMenu) closeMenu.addEventListener('click', () => toggleMenu(false));
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => toggleMenu(false));
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') toggleMenu(false);
    });

    // Newsletter Submission AJAX
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
  </script>
</body>

</html>
