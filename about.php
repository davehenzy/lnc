<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About | Colossus of Lagos - The Hustle. The Heat. The Rise.</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700;1,900&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/lucide@0.262.0"></script>
  <style>
    :root {
      --navy: #070f1f;
      --navy-card: #0a1628;
      --navy-light: #0f1d32;
      --royal-blue: #083B74;
      --royal-blue-glow: rgba(8, 59, 116, 0.4);
      --gold: #d4af37;
      --gold-light: #f6e07a;
      --gold-dark: #b8941f;
      --gold-glow: rgba(212, 175, 55, 0.35);
    }

    body {
      font-family: "Inter", sans-serif;
      background-color: var(--navy);
      color: #f1f5f9;
      overflow-x: hidden;
      selection-background-color: var(--gold);
      selection-color: var(--navy);
    }

    .font-display {
      font-family: "Playfair Display", Georgia, serif;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-track {
      background: var(--navy);
    }
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(to bottom, var(--gold), var(--gold-dark));
      border-radius: 4px;
    }

    /* Ambient animations */
    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-14px) rotate(1deg); }
    }

    @keyframes floatSlow {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-22px) scale(1.03); }
    }

    @keyframes shimmer {
      0% { background-position: -200% center; }
      100% { background-position: 200% center; }
    }

    @keyframes pulseGlow {
      0%, 100% { box-shadow: 0 0 25px rgba(212, 175, 55, 0.2); }
      50% { box-shadow: 0 0 50px rgba(212, 175, 55, 0.45); }
    }

    .animate-float {
      animation: float 7s ease-in-out infinite;
    }

    .animate-float-slow {
      animation: floatSlow 10s ease-in-out infinite;
    }

    .text-gold-gradient {
      background: linear-gradient(135deg, #fff 0%, var(--gold-light) 40%, var(--gold) 75%, var(--gold-dark) 100%);
      background-size: 200% auto;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .text-gold-static {
      background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .bg-gold-gradient {
      background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 50%, var(--gold-dark) 100%);
    }

    /* Premium Glass Panels */
    .glass-card {
      background: linear-gradient(145deg, rgba(15, 29, 50, 0.75), rgba(10, 22, 40, 0.85));
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(212, 175, 55, 0.16);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);
      transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .glass-card:hover {
      border-color: rgba(212, 175, 55, 0.45);
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.6), 0 0 30px rgba(212, 175, 55, 0.15);
      transform: translateY(-6px);
    }

    .glass-card-featured {
      background: linear-gradient(145deg, rgba(8, 59, 116, 0.35), rgba(10, 22, 40, 0.9));
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
      border: 1.5px solid rgba(212, 175, 55, 0.35);
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.6), 0 0 35px rgba(212, 175, 55, 0.2);
    }

    /* Interactive Buttons */
    .btn-gold {
      background: linear-gradient(135deg, var(--gold-light), var(--gold), var(--gold-dark));
      color: #070f1f;
      font-weight: 800;
      position: relative;
      overflow: hidden;
      transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .btn-gold::after {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
      transition: left 0.6s ease;
    }

    .btn-gold:hover::after {
      left: 100%;
    }

    .btn-gold:hover {
      transform: scale(1.04);
      box-shadow: 0 0 35px rgba(212, 175, 55, 0.5);
    }

    .btn-outline-gold {
      border: 1.5px solid rgba(212, 175, 55, 0.45);
      color: var(--gold-light);
      background: rgba(15, 29, 50, 0.4);
      backdrop-filter: blur(10px);
      transition: all 0.35s ease;
    }

    .btn-outline-gold:hover {
      background: rgba(212, 175, 55, 0.15);
      border-color: var(--gold);
      color: #fff;
      box-shadow: 0 0 25px rgba(212, 175, 55, 0.25);
    }

    /* Scroll Reveals */
    .section-reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .section-reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Canvas Particles */
    #hero-canvas {
      position: absolute;
      inset: 0;
      pointer-events: none;
      z-index: 1;
    }

    /* Gold border left */
    .gold-quote-border {
      border-left: 3px solid var(--gold);
      padding-left: 1.25rem;
    }

    .radial-overlay {
      background: radial-gradient(circle at 50% 30%, rgba(8, 59, 116, 0.3) 0%, rgba(7, 15, 31, 0.85) 65%, #070f1f 100%);
    }
  </style>
</head>

<body class="antialiased text-slate-100 bg-[#070f1f] overflow-x-hidden">

  <!-- Navbar -->
  <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-4 bg-[#070f1f]/90 backdrop-blur-md border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
      <a href="index.php" class="flex items-center gap-3">
        <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" class="h-10 md:h-14 w-auto object-contain" />
      </a>

      <div class="hidden md:flex items-center gap-8">
        <a href="index.php" class="text-sm font-medium text-slate-300 hover:text-[#d4af37] transition-colors">Home</a>
        <a href="about.php" class="text-sm font-semibold text-[#d4af37] transition-colors border-b-2 border-[#d4af37] pb-1">About</a>
        <a href="eligibility.php" class="text-sm font-medium text-slate-300 hover:text-[#d4af37] transition-colors">Eligibility</a>
        <a href="faq.php" class="text-sm font-medium text-slate-300 hover:text-[#d4af37] transition-colors">FAQ</a>
      </div>

      <div class="flex items-center gap-4">
        <a href="register.php" class="hidden sm:inline-flex btn-gold px-6 py-2.5 rounded-full text-xs md:text-sm uppercase tracking-wider items-center gap-2">
          <span>Register Now</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <button id="menu-btn" class="md:hidden w-10 h-10 flex items-center justify-center text-slate-200 hover:text-[#d4af37] transition-colors">
          <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="fixed inset-0 z-[60] bg-[#070f1f]/98 backdrop-blur-2xl translate-x-full transition-transform duration-500 md:hidden">
    <div class="flex flex-col h-full p-8">
      <div class="flex items-center justify-between mb-12">
        <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" class="h-9 w-auto" />
        <button id="close-menu" class="text-slate-400 hover:text-white">
          <i data-lucide="x" class="w-8 h-8"></i>
        </button>
      </div>
      <nav class="flex flex-col gap-6 text-xl font-bold">
        <a href="index.php" class="text-slate-300 hover:text-[#d4af37]">Home</a>
        <a href="about.php" class="text-[#d4af37]">About</a>
        <a href="eligibility.php" class="text-slate-300 hover:text-[#d4af37]">Eligibility</a>
        <a href="faq.php" class="text-slate-300 hover:text-[#d4af37]">FAQ</a>
      </nav>
      <div class="mt-auto pt-8 border-t border-white/10">
        <a href="register.php" class="btn-gold w-full py-4 rounded-full text-center uppercase tracking-widest block font-bold">
          Register Now
        </a>
      </div>
    </div>
  </div>

  <!-- Hero Section with Canvas Particle Effect & Cinematic Lighting -->
  <header class="relative min-h-[92vh] flex items-center justify-center overflow-hidden pt-28 md:pt-36 pb-20">
    <canvas id="hero-canvas"></canvas>

    <!-- Ambient Glowing Orbs -->
    <div class="absolute inset-0 radial-overlay pointer-events-none"></div>
    <div class="absolute -top-32 left-1/4 w-[500px] h-[500px] bg-[#d4af37]/10 rounded-full blur-[140px] animate-float pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-[600px] h-[600px] bg-[#083B74]/30 rounded-full blur-[160px] animate-float-slow pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

        <!-- Left Column: Copy & Value Proposition -->
        <div class="lg:col-span-7 text-center lg:text-left section-reveal">
          
          <!-- Official Partner Badge -->
          <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full glass-card border border-[#d4af37]/30 mb-6">
            <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] animate-ping"></span>
            <span class="text-xs font-semibold tracking-wider uppercase text-[#f6e07a]">
              Official Partner — Lagos State Government
            </span>
          </div>

          <h1 class="font-display text-4xl sm:text-6xl md:text-7xl font-black leading-[1.08] mb-6">
            <span class="block text-white tracking-tight">COLOSSUS OF</span>
            <span class="block text-gold-gradient mt-1">LAGOS</span>
          </h1>

          <p class="font-display italic text-xl sm:text-2xl text-slate-300 font-normal mb-6 leading-relaxed">
            "The Hustle. The Heat. The Rise."
          </p>

          <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl mb-8 font-light">
            With <strong class="text-white font-semibold">Lagos State Government</strong> as a major Official Partner through the <span class="text-[#f6e07a] font-medium">Ministry of Wealth Creation and Employment</span>, Colossus of Lagos is Nigeria's most impactful platform designed to strengthen the entrepreneurial ecosystem, promote innovation, empower enterprise development, and drive the economic growth of Lagos and the nation.
          </p>

          <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
            <a href="register.php" class="btn-gold px-8 py-3.5 rounded-full text-xs md:text-sm uppercase tracking-widest flex items-center gap-2">
              <span>Apply Now</span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <a href="#stages" class="btn-outline-gold px-8 py-3.5 rounded-full text-xs md:text-sm uppercase tracking-widest flex items-center gap-2">
              <span>View Programme Format</span>
              <i data-lucide="calendar" class="w-4 h-4"></i>
            </a>
          </div>
        </div>

        <!-- Right Column: Visual Composite Card -->
        <div class="lg:col-span-5 section-reveal">
          <div class="relative max-w-md mx-auto">
            <!-- Glow background -->
            <div class="absolute -inset-2 bg-gradient-to-tr from-[#d4af37]/30 via-[#083B74]/40 to-[#d4af37]/10 rounded-3xl blur-2xl"></div>

            <div class="relative glass-card-featured rounded-3xl p-8 border border-[#d4af37]/40 text-center overflow-hidden">
              <!-- Watermark pattern -->
              <div class="absolute -top-12 -right-12 w-48 h-48 bg-[#d4af37]/5 rounded-full blur-2xl"></div>

              <div class="w-32 h-32 mx-auto mb-6 relative flex items-center justify-center">
                <div class="absolute inset-0 rounded-full bg-gradient-to-br from-[#d4af37]/40 to-[#083B74]/40 animate-pulse"></div>
                <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Seal" class="relative z-10 max-h-28 max-w-28 object-contain filter drop-shadow-[0_10px_20px_rgba(212,175,55,0.4)]" />
              </div>

              <h2 class="font-display font-bold text-2xl text-white mb-1">Statewide Festival & Competition</h2>
              <p class="text-xs text-[#f6e07a] uppercase tracking-widest mb-6">Discovering Africa's Next Titans</p>

              <!-- Mini Stats Grid Inside Card -->
              <div class="grid grid-cols-2 gap-3 text-left">
                <div class="p-3.5 rounded-xl bg-[#070f1f]/70 border border-white/10">
                  <div class="text-xs text-slate-400">Grand Prize</div>
                  <div class="text-xl font-extrabold text-[#f6e07a] tracking-tight whitespace-nowrap">₦30,000,000</div>
                  <div class="text-[10px] text-slate-400">Grand Finale Champion</div>
                </div>
                <div class="p-3.5 rounded-xl bg-[#070f1f]/70 border border-white/10">
                  <div class="text-xs text-slate-400">Bootcamp Fund</div>
                  <div class="text-xl font-extrabold text-white tracking-tight whitespace-nowrap">40 × ₦1M</div>
                  <div class="text-[10px] text-slate-400">Direct Cash Support</div>
                </div>
                <div class="p-3.5 rounded-xl bg-[#070f1f]/70 border border-white/10">
                  <div class="text-xs text-slate-400">Investors Eve</div>
                  <div class="text-xl font-extrabold text-white tracking-tight">Top 20</div>
                  <div class="text-[10px] text-slate-400">Exclusive Boardroom</div>
                </div>
                <div class="p-3.5 rounded-xl bg-[#070f1f]/70 border border-white/10">
                  <div class="text-xs text-slate-400">Broadcast Reach</div>
                  <div class="text-xl font-extrabold text-[#f6e07a] tracking-tight">53M+</div>
                  <div class="text-[10px] text-slate-400">Channels, TVC & DStv</div>
                </div>
              </div>

              <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-300">
                <span class="flex items-center gap-1.5">
                  <i data-lucide="shield-check" class="w-4 h-4 text-[#d4af37]"></i>
                  Lagos State Endorsed
                </span>
                <span class="text-[#f6e07a] font-semibold">1-Month Festival</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>

  <!-- Quick Highlight Metrics Strip -->
  <section class="relative -mt-10 z-20 max-w-7xl mx-auto px-6">
    <div class="glass-card rounded-2xl p-5 sm:p-6 border border-[#d4af37]/30 grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 text-center divide-y lg:divide-y-0 lg:divide-x divide-white/10">
      <div class="pt-2 lg:pt-0 px-2">
        <div class="text-xl sm:text-2xl lg:text-2xl xl:text-3xl font-extrabold text-[#f6e07a] mb-1 font-display tracking-tight whitespace-nowrap">₦30,000,000</div>
        <div class="text-xs uppercase tracking-wider text-slate-300 font-medium">Grand Finale Winner Prize</div>
      </div>
      <div class="pt-4 lg:pt-0 px-2">
        <div class="text-xl sm:text-2xl lg:text-2xl xl:text-3xl font-extrabold text-white mb-1 font-display tracking-tight whitespace-nowrap">40 × ₦1M</div>
        <div class="text-xs uppercase tracking-wider text-slate-300 font-medium">40 Winners at ₦1M Each</div>
      </div>
      <div class="pt-4 lg:pt-0 px-2">
        <div class="text-xl sm:text-2xl lg:text-2xl xl:text-3xl font-extrabold text-[#f6e07a] mb-1 font-display tracking-tight whitespace-nowrap">1,000+</div>
        <div class="text-xs uppercase tracking-wider text-slate-300 font-medium">Summit Participants</div>
      </div>
      <div class="pt-4 lg:pt-0 px-2">
        <div class="text-xl sm:text-2xl lg:text-2xl xl:text-3xl font-extrabold text-white mb-1 font-display tracking-tight whitespace-nowrap">53M+</div>
        <div class="text-xs uppercase tracking-wider text-slate-300 font-medium">Total TV Viewership</div>
      </div>
    </div>
  </section>

  <!-- About The Platform: Discover, Develop, Celebrate, Empower -->
  <section id="vision" class="relative py-24 md:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">

        <!-- Left Image Visual Montage -->
        <div class="lg:col-span-5 order-2 lg:order-1 section-reveal">
          <div class="relative">
            <div class="rounded-3xl overflow-hidden border border-[#d4af37]/30 shadow-2xl relative group">
              <img src="assets/images/hero_lagos_horizon.png" alt="Lagos Skyline" class="w-full h-80 object-cover transform transition-transform duration-700 group-hover:scale-105" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f] via-transparent to-transparent"></div>
              <div class="absolute bottom-6 left-6 right-6">
                <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold bg-[#d4af37] text-[#070f1f] uppercase tracking-wider mb-2">
                  The Epicentre of Enterprise
                </span>
                <h3 class="font-display text-2xl font-bold text-white">A Furnace of Ambition & Potential</h3>
              </div>
            </div>

            <!-- Floating Card Overlay -->
            <div class="absolute -bottom-6 -right-4 sm:-right-6 glass-card rounded-2xl p-4 border border-[#d4af37]/40 max-w-[240px] shadow-2xl">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-[#d4af37]/20 flex items-center justify-center flex-shrink-0 text-[#d4af37]">
                  <i data-lucide="zap" class="w-5 h-5"></i>
                </div>
                <div>
                  <div class="text-xs font-bold text-white">Limitless Potential</div>
                  <div class="text-[11px] text-slate-400">Fueling youth-led innovation in Lagos</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Content -->
        <div class="lg:col-span-7 order-1 lg:order-2 section-reveal">
          <div class="inline-flex items-center gap-2 mb-4">
            <div class="h-px w-10 bg-[#d4af37]"></div>
            <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">The Essence</span>
          </div>

          <h2 class="font-display text-3xl sm:text-5xl font-bold mb-6 leading-tight">
            Building The Platform Where <br />
            <span class="text-gold-gradient">Ambition Forges Reality</span>
          </h2>

          <div class="space-y-4 text-slate-300 text-base md:text-lg leading-relaxed font-light">
            <p>
              <strong class="text-white font-medium">Colossus of Lagos</strong> is designed to be the most exciting entrepreneurship platform in Lagos and Nigeria — a major annual competition and one-month festival connecting ambitious entrepreneurs with capital, mentorship, business opportunities, markets, and strategic investors.
            </p>
            <p>
              It is a multi-dimensional platform uniting emerging business owners, established leaders, corporate brands, government institutions, and the public. Emerging founders present their business ideas, receive rigorous mentorship, build operational capability, and compete for life-changing financial rewards.
            </p>
          </div>

          <div class="gold-quote-border my-6">
            <p class="font-display italic text-lg text-white">
              "The one-month festival searches for young talented entrepreneurs across Lagos to compete, learn, connect, network, explore, and rise."
            </p>
          </div>

          <div class="grid sm:grid-cols-2 gap-4 pt-2">
            <div class="p-4 rounded-xl glass-card flex items-start gap-3">
              <div class="w-9 h-9 rounded-lg bg-[#d4af37]/15 flex items-center justify-center text-[#d4af37] flex-shrink-0 mt-0.5">
                <i data-lucide="target" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm">Discover & Celebrate</h4>
                <p class="text-xs text-slate-400 mt-1">Unearthing the boldest founders from all local government areas of Lagos.</p>
              </div>
            </div>

            <div class="p-4 rounded-xl glass-card flex items-start gap-3">
              <div class="w-9 h-9 rounded-lg bg-[#d4af37]/15 flex items-center justify-center text-[#d4af37] flex-shrink-0 mt-0.5">
                <i data-lucide="trending-up" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm">Capital & Mentorship</h4>
                <p class="text-xs text-slate-400 mt-1">Providing direct funding, corporate networks, and seasoned advisory.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Official Government Partnership Section -->
  <section class="relative py-24 bg-[#0a1628]/80 border-y border-white/5 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">Official Endorsement</span>
          <div class="h-px w-10 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">Lagos State Government Backing</h2>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed font-light">
          A strategic state-supported initiative spearheaded through the <strong class="text-white">Ministry of Wealth Creation and Employment</strong> to catalyze youth prosperity and private sector expansion.
        </p>
      </div>

      <div class="grid lg:grid-cols-12 gap-10 items-center">
        
        <!-- Left: Seal & Mandate Card -->
        <div class="lg:col-span-5 section-reveal">
          <div class="glass-card-featured rounded-3xl p-8 text-center relative border border-[#d4af37]/35 shadow-2xl">
            <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-tr from-[#d4af37]/40 via-[#f6e07a]/30 to-[#083B74]/40 p-2 shadow-2xl flex items-center justify-center">
              <div class="w-full h-full rounded-full bg-[#070f1f] flex items-center justify-center p-3 border border-[#d4af37]/30">
                <img src="assets/proposal/lagos_seal.png" alt="Official Seal of Lagos State Government" class="max-w-full max-h-full object-contain filter drop-shadow-[0_10px_20px_rgba(212,175,55,0.4)]" />
              </div>
            </div>

            <h3 class="font-display text-2xl font-bold text-white mb-1">Lagos State Government</h3>
            <p class="text-xs font-bold text-[#d4af37] uppercase tracking-wider mb-4">
              Ministry of Wealth Creation and Employment
            </p>

            <div class="p-4 rounded-xl bg-[#070f1f]/80 border border-white/10 text-xs text-slate-300 leading-relaxed text-left space-y-2">
              <div class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Direct state alignment with enterprise priorities</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Job creation and wealth generation catalyst</span>
              </div>
              <div class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>De-risked platform for private sector co-investors</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: 4 Core Policy Pillars -->
        <div class="lg:col-span-7 section-reveal space-y-4">
          <div class="glass-card rounded-2xl p-5 flex items-start gap-4">
            <div class="w-12 h-12 rounded-xl bg-[#083B74]/50 border border-[#d4af37]/20 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
              <i data-lucide="users" class="w-6 h-6"></i>
            </div>
            <div>
              <h4 class="font-bold text-white text-base mb-1">Accelerating Youth Entrepreneurship</h4>
              <p class="text-xs md:text-sm text-slate-300 leading-relaxed font-light">
                Positioning Lagos as Africa's premier hub for enterprise by identifying, empowering, and scaling high-potential founders.
              </p>
            </div>
          </div>

          <div class="glass-card rounded-2xl p-5 flex items-start gap-4">
            <div class="w-12 h-12 rounded-xl bg-[#083B74]/50 border border-[#d4af37]/20 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
              <i data-lucide="briefcase" class="w-6 h-6"></i>
            </div>
            <div>
              <h4 class="font-bold text-white text-base mb-1">Sustainable Job Creation & MSME Growth</h4>
              <p class="text-xs md:text-sm text-slate-300 leading-relaxed font-light">
                Transforming grassroots innovation into employer-enterprises that solve local challenges and provide employment across Lagos.
              </p>
            </div>
          </div>

          <div class="glass-card rounded-2xl p-5 flex items-start gap-4">
            <div class="w-12 h-12 rounded-xl bg-[#083B74]/50 border border-[#d4af37]/20 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
              <i data-lucide="shield-check" class="w-6 h-6"></i>
            </div>
            <div>
              <h4 class="font-bold text-white text-base mb-1">Credibility & High Investor Confidence</h4>
              <p class="text-xs md:text-sm text-slate-300 leading-relaxed font-light">
                Government partnership signals regulatory stability, strategic priority, and verified access to emerging market champions.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Financial Rewards: ₦30M, ₦1M x 40, Top 20 Investors Evening -->
  <section class="relative py-24 md:py-32" style="background: linear-gradient(160deg, #083B74 0%, #070f1f 45%, #070f1f 100%);">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">Direct Capital</span>
          <div class="h-px w-10 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">Financial Rewards & Growth Stakes</h2>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed font-light">
          Direct non-dilutive capital and commercial access injected into the enterprises driving Lagos forward.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        
        <!-- ₦30M Grand Prize Card -->
        <div class="glass-card-featured rounded-3xl p-8 relative flex flex-col justify-between section-reveal border-2 border-[#d4af37]/50 shadow-2xl">
          <div class="absolute -top-3.5 right-6 bg-gradient-to-r from-[#d4af37] to-[#f6e07a] text-[#070f1f] text-[10px] font-black uppercase px-3 py-1 rounded-full tracking-wider shadow-md">
            Grand Finale Trophy
          </div>
          <div>
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/30 to-[#d4af37]/5 flex items-center justify-center text-[#f6e07a] mb-6">
              <i data-lucide="trophy" class="w-8 h-8"></i>
            </div>
            <span class="text-xs uppercase tracking-widest text-[#f6e07a] font-semibold">Ultimate Champion</span>
            <div class="text-2xl sm:text-3xl lg:text-3xl font-black text-white mt-1 mb-4 font-display tracking-tight whitespace-nowrap">
              ₦30,000,000
            </div>
            <p class="text-slate-300 text-sm leading-relaxed font-light mb-6">
              One exceptional founder emerging from the Grand Finale is awarded ₦30 million in direct equity-free funding to scale their company into a national colossus.
            </p>
          </div>
          <div class="pt-4 border-t border-white/10 flex items-center gap-2 text-xs text-[#f6e07a]">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
            <span>Awarded live at the Grand Finale</span>
          </div>
        </div>

        <!-- 40 Bootcamp Winners Card -->
        <div class="glass-card rounded-3xl p-8 relative flex flex-col justify-between section-reveal" style="transition-delay: 0.15s">
          <div>
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center text-[#f6e07a] mb-6">
              <i data-lucide="coins" class="w-8 h-8"></i>
            </div>
            <span class="text-xs uppercase tracking-widest text-[#d4af37] font-semibold">Bootcamp Stage Grants</span>
            <div class="text-2xl sm:text-3xl lg:text-3xl font-black text-white mt-1 mb-4 font-display tracking-tight whitespace-nowrap">
              40 × ₦1,000,000
            </div>
            <p class="text-slate-300 text-sm leading-relaxed font-light mb-6">
              40 entrepreneurs selected from the Top 100 Bootcamp will receive ₦1 million each (over ₦40 million total) to fund immediate operational and prototyping milestones.
            </p>
          </div>
          <div class="pt-4 border-t border-white/10 flex items-center gap-2 text-xs text-[#f6e07a]">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
            <span>Awarded upon conclusion of Bootcamp</span>
          </div>
        </div>

        <!-- Top 20 Investors Evening Card -->
        <div class="glass-card rounded-3xl p-8 relative flex flex-col justify-between section-reveal" style="transition-delay: 0.3s">
          <div>
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center text-[#f6e07a] mb-6">
              <i data-lucide="building" class="w-8 h-8"></i>
            </div>
            <span class="text-xs uppercase tracking-widest text-[#d4af37] font-semibold">Strategic Capital</span>
            <div class="text-2xl sm:text-3xl lg:text-3xl font-black text-white mt-1 mb-4 font-display tracking-tight">
              Top 20 Investors Eve
            </div>
            <p class="text-slate-300 text-sm leading-relaxed font-light mb-6">
              The 20 best entrepreneurs are hosted at an exclusive Investors Evening with angel syndicates, venture capitalists, corporate partners, and high-net-worth dealmakers.
            </p>
          </div>
          <div class="pt-4 border-t border-white/10 flex items-center gap-2 text-xs text-[#f6e07a]">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
            <span>Direct access to institutional dealmakers</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 7-Stage Road to Colossus -->
  <section id="stages" class="relative py-24 md:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">The Roadmap</span>
          <div class="h-px w-10 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">Events, Stages & Programme Format</h2>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed font-light">
          A rigorous 7-stage pathway taking participants from open auditions to state-level celebration.
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Stage 01 -->
        <div class="glass-card rounded-2xl p-6 section-reveal border border-white/5 hover:border-[#d4af37]/40">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-[#f6e07a] bg-[#d4af37]/15 px-3 py-1 rounded-full uppercase tracking-wider">Stage 01</span>
            <i data-lucide="mic" class="w-5 h-5 text-slate-400"></i>
          </div>
          <h3 class="font-display font-bold text-xl text-white mb-2">Official Press Conference</h3>
          <p class="text-slate-400 text-xs md:text-sm leading-relaxed font-light">
            Season unveiling with over 40 journalists from print, electronic, and digital media, attended by government dignitaries and corporate partners.
          </p>
        </div>

        <!-- Stage 02 -->
        <div class="glass-card rounded-2xl p-6 section-reveal border border-white/5 hover:border-[#d4af37]/40" style="transition-delay: 0.1s">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-[#f6e07a] bg-[#d4af37]/15 px-3 py-1 rounded-full uppercase tracking-wider">Stage 02</span>
            <i data-lucide="edit" class="w-5 h-5 text-slate-400"></i>
          </div>
          <h3 class="font-display font-bold text-xl text-white mb-2">Call for Registrations</h3>
          <p class="text-slate-400 text-xs md:text-sm leading-relaxed font-light">
            A statewide 2-week application window open to all Lagos-based aspiring founders, innovators, and early-stage entrepreneurs.
          </p>
        </div>

        <!-- Stage 03 -->
        <div class="glass-card rounded-2xl p-6 section-reveal border border-white/5 hover:border-[#d4af37]/40" style="transition-delay: 0.2s">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-[#f6e07a] bg-[#d4af37]/15 px-3 py-1 rounded-full uppercase tracking-wider">Stage 03</span>
            <i data-lucide="map-pin" class="w-5 h-5 text-slate-400"></i>
          </div>
          <h3 class="font-display font-bold text-xl text-white mb-2">Auditions & Pitches</h3>
          <p class="text-slate-400 text-xs md:text-sm leading-relaxed font-light">
            Live pitch sessions in 5 major zones across Lagos Mainland and Lagos Island to evaluate business models and select top candidates.
          </p>
        </div>

        <!-- Stage 04 -->
        <div class="glass-card rounded-2xl p-6 section-reveal border border-white/5 hover:border-[#d4af37]/40" style="transition-delay: 0.1s">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-[#f6e07a] bg-[#d4af37]/15 px-3 py-1 rounded-full uppercase tracking-wider">Stage 04</span>
            <i data-lucide="users" class="w-5 h-5 text-slate-400"></i>
          </div>
          <h3 class="font-display font-bold text-xl text-white mb-2">Entrepreneurship Convention</h3>
          <p class="text-slate-400 text-xs md:text-sm leading-relaxed font-light">
            A major summit gathering over 1,000 participants, keynote business leaders, mentors, policy drivers, and youth ecosystem stakeholders.
          </p>
        </div>

        <!-- Stage 05 -->
        <div class="glass-card rounded-2xl p-6 section-reveal border border-white/5 hover:border-[#d4af37]/40" style="transition-delay: 0.2s">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-[#f6e07a] bg-[#d4af37]/15 px-3 py-1 rounded-full uppercase tracking-wider">Stage 05</span>
            <i data-lucide="award" class="w-5 h-5 text-slate-400"></i>
          </div>
          <h3 class="font-display font-bold text-xl text-white mb-2">Top 100 Bootcamp</h3>
          <p class="text-slate-400 text-xs md:text-sm leading-relaxed font-light">
            Rigorous training, business strategy immersion, tasks, and pitch evaluations where 40 entrepreneurs win ₦1 million cash each.
          </p>
        </div>

        <!-- Stage 06 -->
        <div class="glass-card rounded-2xl p-6 section-reveal border border-white/5 hover:border-[#d4af37]/40" style="transition-delay: 0.3s">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-[#f6e07a] bg-[#d4af37]/15 px-3 py-1 rounded-full uppercase tracking-wider">Stage 06</span>
            <i data-lucide="handshake" class="w-5 h-5 text-slate-400"></i>
          </div>
          <h3 class="font-display font-bold text-xl text-white mb-2">Top 20 Investors Evening</h3>
          <p class="text-slate-400 text-xs md:text-sm leading-relaxed font-light">
            An elite networking dinner pairing the Top 20 finalists directly with prospective private equity, venture, and corporate investors.
          </p>
        </div>

        <!-- Stage 07 (Grand Finale - Full Width Highlight) -->
        <div class="md:col-span-2 lg:col-span-3 glass-card-featured rounded-3xl p-8 section-reveal border border-[#d4af37]/40">
          <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
              <div class="inline-flex items-center gap-2 mb-2">
                <span class="text-xs font-bold text-[#070f1f] bg-gradient-to-r from-[#d4af37] to-[#f6e07a] px-3 py-1 rounded-full uppercase tracking-wider">
                  Stage 07 — The Climax
                </span>
                <span class="text-xs text-slate-300">Live TV Broadcast & Entertainment</span>
              </div>
              <h3 class="font-display text-2xl md:text-3xl font-bold text-white mb-2">
                Grand Finale: Crowning The ₦30 Million Colossus
              </h3>
              <p class="text-slate-300 text-xs md:text-sm max-w-3xl leading-relaxed font-light">
                Over 500 distinguished guests in attendance — including the Governor of Lagos State, ministers, commissioners, corporate CEOs, and media icons — featuring red-carpet activation, live performances, and the crowning of the champion.
              </p>
            </div>
            <a href="register.php" class="btn-gold px-8 py-3.5 rounded-full text-xs uppercase tracking-widest font-bold whitespace-nowrap self-start lg:self-center">
              Register To Compete
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Television Broadcast & Digital Media Powerhouse -->
  <section class="relative py-24 md:py-32 bg-[#0a1628]/90 border-y border-white/5 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">Broadcast Leverage</span>
          <div class="h-px w-10 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">Multi-Channel Television Reach</h2>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed font-light">
          National TV visibility with 53 Million+ combined audience viewership, supported by intense digital amplification across all social channels.
        </p>
      </div>

      <!-- TV Networks Grid -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
        
        <div class="glass-card rounded-2xl p-6 text-center section-reveal hover:border-[#d4af37]/40">
          <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-[#083B74]/50 flex items-center justify-center text-[#f6e07a]">
            <i data-lucide="tv" class="w-6 h-6"></i>
          </div>
          <div class="text-3xl font-black text-[#f6e07a] mb-1 font-display">20M</div>
          <div class="font-bold text-white text-base">Channels TV</div>
          <div class="text-xs text-slate-400 mt-1">Saturdays Prime Slot</div>
        </div>

        <div class="glass-card rounded-2xl p-6 text-center section-reveal hover:border-[#d4af37]/40" style="transition-delay: 0.1s">
          <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-[#083B74]/50 flex items-center justify-center text-[#f6e07a]">
            <i data-lucide="film" class="w-6 h-6"></i>
          </div>
          <div class="text-3xl font-black text-[#f6e07a] mb-1 font-display">15M</div>
          <div class="font-bold text-white text-base">Africa Magic</div>
          <div class="text-xs text-slate-400 mt-1">DStv Ch. 154 (Sundays)</div>
        </div>

        <div class="glass-card rounded-2xl p-6 text-center section-reveal hover:border-[#d4af37]/40" style="transition-delay: 0.2s">
          <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-[#083B74]/50 flex items-center justify-center text-[#f6e07a]">
            <i data-lucide="radio" class="w-6 h-6"></i>
          </div>
          <div class="text-3xl font-black text-[#f6e07a] mb-1 font-display">10M</div>
          <div class="font-bold text-white text-base">Hip TV</div>
          <div class="text-xs text-slate-400 mt-1">Youth & Creative Audience</div>
        </div>

        <div class="glass-card rounded-2xl p-6 text-center section-reveal hover:border-[#d4af37]/40" style="transition-delay: 0.3s">
          <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-[#083B74]/50 flex items-center justify-center text-[#f6e07a]">
            <i data-lucide="play-circle" class="w-6 h-6"></i>
          </div>
          <div class="text-3xl font-black text-[#f6e07a] mb-1 font-display">8M</div>
          <div class="font-bold text-white text-base">TVC News / Ent.</div>
          <div class="text-xs text-slate-400 mt-1">Saturdays Prime Show</div>
        </div>

      </div>

      <!-- Digital Projection Matrix -->
      <div class="glass-card-featured rounded-3xl p-8 md:p-10 section-reveal border border-[#d4af37]/30">
        <div class="grid md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-white/10">
          <div class="pt-4 md:pt-0">
            <div class="text-4xl md:text-5xl font-black text-[#f6e07a] font-display mb-1">5M+</div>
            <div class="text-xs uppercase font-bold tracking-widest text-white mb-2">Weekly Impressions</div>
            <p class="text-xs text-slate-300 font-light">Digital snippets, weekly boardroom debates, and task recaps.</p>
          </div>
          <div class="pt-4 md:pt-0">
            <div class="text-4xl md:text-5xl font-black text-white font-display mb-1">50M+</div>
            <div class="text-xs uppercase font-bold tracking-widest text-white mb-2">Season Impressions</div>
            <p class="text-xs text-slate-300 font-light">Cross-platform push on YouTube, TikTok, Instagram, X & Facebook.</p>
          </div>
          <div class="pt-4 md:pt-0">
            <div class="text-4xl md:text-5xl font-black text-[#f6e07a] font-display mb-1">1M+</div>
            <div class="text-xs uppercase font-bold tracking-widest text-white mb-2">Audience Interactions</div>
            <p class="text-xs text-slate-300 font-light">Live polls, trivia, audience predictions, and interactive voting.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Target Demographics -->
  <section class="relative py-24 md:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">Ecosystem Demography</span>
          <div class="h-px w-10 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">Who The Platform Engages</h2>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed font-light">
          Mobilizing the full breadth of the Nigerian and diaspora business community.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        
        <!-- Primary Demography -->
        <div class="glass-card-featured rounded-3xl p-8 section-reveal border border-[#d4af37]/40 flex flex-col justify-between">
          <div>
            <span class="text-[10px] font-black text-[#070f1f] bg-gradient-to-r from-[#d4af37] to-[#f6e07a] px-3 py-1 rounded-full uppercase tracking-wider">
              Primary Audience
            </span>
            <h3 class="font-display text-2xl font-bold text-white mt-4 mb-1">20 – 39 Years</h3>
            <p class="text-xs text-[#f6e07a] font-semibold tracking-wider uppercase mb-6">Urban Lagosians & Nigerians</p>

            <ul class="space-y-3 text-xs md:text-sm text-slate-300 font-light">
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Youth founders & aspiring entrepreneurs</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Tech-savvy innovators and builders</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Active consumers with disposable income</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Early adopters driving new market trends</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Secondary Demography -->
        <div class="glass-card rounded-3xl p-8 section-reveal border border-white/10 flex flex-col justify-between" style="transition-delay: 0.15s">
          <div>
            <span class="text-[10px] font-bold text-slate-300 bg-white/10 px-3 py-1 rounded-full uppercase tracking-wider">
              Secondary Audience
            </span>
            <h3 class="font-display text-2xl font-bold text-white mt-4 mb-1">40+ Years</h3>
            <p class="text-xs text-slate-400 font-semibold tracking-wider uppercase mb-6">Investors & Corporate Leaders</p>

            <ul class="space-y-3 text-xs md:text-sm text-slate-300 font-light">
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Angel investors & venture capitalists</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Corporate executives and board directors</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Diaspora Africans investing back home</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Policy makers and development agencies</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Tertiary Demography -->
        <div class="glass-card rounded-3xl p-8 section-reveal border border-white/10 flex flex-col justify-between" style="transition-delay: 0.3s">
          <div>
            <span class="text-[10px] font-bold text-slate-300 bg-white/10 px-3 py-1 rounded-full uppercase tracking-wider">
              Tertiary Audience
            </span>
            <h3 class="font-display text-2xl font-bold text-white mt-4 mb-1">General Public</h3>
            <p class="text-xs text-slate-400 font-semibold tracking-wider uppercase mb-6">The Creator & Startup Community</p>

            <ul class="space-y-3 text-xs md:text-sm text-slate-300 font-light">
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Digital content creators & influencers</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Side-hustlers and micro-enterprise owners</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Startup teams and university students</span>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37]"></i>
                <span>Mass public television audience across Nigeria</span>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- The Producers: Bravopoints International -->
  <section class="relative py-24 md:py-32" style="background: linear-gradient(160deg, #083B74 0%, #070f1f 50%, #070f1f 100%);">
    <div class="max-w-7xl mx-auto px-6">
      
      <div class="text-center max-w-3xl mx-auto mb-16 section-reveal">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-xs font-semibold tracking-widest uppercase">The Producers</span>
          <div class="h-px w-10 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-4">Produced By Bravopoints International</h2>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed font-light">
          Leading media firm delivering inspiring business content through television, live events, streaming, and publishing.
        </p>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-center">
        
        <!-- Left: Statement & Logo -->
        <div class="lg:col-span-6 section-reveal">
          <div class="glass-card-featured rounded-3xl p-8 md:p-10 border border-[#d4af37]/30 relative">
            <p class="font-display italic text-lg md:text-xl text-slate-200 leading-relaxed mb-8">
              "We are the producers of Africa's most consistent and longest-running entrepreneurial reality show, <span class="text-[#f6e07a] font-semibold">The Next Titan Nigeria</span>. We stimulate and ignite the spirit of enterprise in young Africans through creative business media platforms."
            </p>

            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
              <img src="assets/bravo.png" alt="Bravopoints Logo" class="h-12 w-auto object-contain filter drop-shadow" />
              <div>
                <div class="font-bold text-white text-base">Bravopoints International Limited</div>
                <div class="text-xs text-[#d4af37] uppercase tracking-wider">Award-Winning Media Producers</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: Accolades -->
        <div class="lg:col-span-6 space-y-4 section-reveal">
          <div class="glass-card rounded-2xl p-5 border border-white/10 hover:border-[#d4af37]/40">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl bg-[#d4af37]/20 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
                <i data-lucide="award" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm mb-1">Global Quality Award Winner</h4>
                <p class="text-xs text-slate-300 font-light leading-relaxed">
                  Winner of "Global Most Innovative Entrepreneurship Company" courtesy of World Quality Day & Chartered Institute of Quality UK.
                </p>
              </div>
            </div>
          </div>

          <div class="glass-card rounded-2xl p-5 border border-white/10 hover:border-[#d4af37]/40">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl bg-[#d4af37]/20 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
                <i data-lucide="tv" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm mb-1">Producers of The Next Titan Nigeria</h4>
                <p class="text-xs text-slate-300 font-light leading-relaxed">
                  Over a decade of producing Nigeria's premier business reality show across 11+ consecutive seasons.
                </p>
              </div>
            </div>
          </div>

          <div class="glass-card rounded-2xl p-5 border border-white/10 hover:border-[#d4af37]/40">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl bg-[#d4af37]/20 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
                <i data-lucide="handshake" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm mb-1">Top-Tier Institutional Partnerships</h4>
                <p class="text-xs text-slate-300 font-light leading-relaxed">
                  Trusted by Central Bank of Nigeria, MTN, First Bank, Zenith Bank, Shell, Coscharis Motors, Toyota, BetKing, and Bigi Cola.
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Final Call To Action -->
  <section class="relative py-24 md:py-32 overflow-hidden text-center">
    <div class="max-w-4xl mx-auto px-6 section-reveal">
      
      <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-[#d4af37]/20 border border-[#d4af37]/40 flex items-center justify-center text-[#f6e07a] shadow-xl">
        <i data-lucide="rocket" class="w-10 h-10"></i>
      </div>

      <h2 class="font-display text-4xl sm:text-6xl font-bold mb-6 leading-tight">
        Witness The Rise of <br />
        <span class="text-gold-gradient italic font-normal">The Next Colossus</span>
      </h2>

      <p class="text-base sm:text-xl text-slate-300 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
        The audacious come to build. The brave come to compete. Are you ready to rise and claim your share of over ₦70,000,000 in capital and growth support?
      </p>

      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="register.php" class="btn-gold px-10 py-4 rounded-full text-sm uppercase tracking-widest font-extrabold flex items-center gap-2">
          <span>Apply For Current Season</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <a href="eligibility.php" class="btn-outline-gold px-8 py-4 rounded-full text-sm uppercase tracking-widest font-bold">
          Check Eligibility Criteria
        </a>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-white/10 py-14 bg-[#050b17]">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-4 gap-10 mb-10">
        <div class="md:col-span-2">
          <div class="flex items-center gap-3 mb-4">
            <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos" class="h-12 w-auto">
          </div>
          <p class="text-slate-400 text-sm max-w-sm leading-relaxed mb-6 font-light">
            Colossus of Lagos is an annual entrepreneurship competition and festival produced by Bravopoints International in official partnership with Lagos State Government (Ministry of Wealth Creation and Employment).
          </p>
          <div class="flex items-center gap-3">
            <a href="https://instagram.com" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-[#070f1f] border border-white/10 flex items-center justify-center text-slate-400 hover:text-[#d4af37] transition-all">
              <i data-lucide="instagram" class="w-4 h-4"></i>
            </a>
            <a href="https://twitter.com" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-[#070f1f] border border-white/10 flex items-center justify-center text-slate-400 hover:text-[#d4af37] transition-all">
              <i data-lucide="twitter" class="w-4 h-4"></i>
            </a>
            <a href="https://facebook.com" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-[#070f1f] border border-white/10 flex items-center justify-center text-slate-400 hover:text-[#d4af37] transition-all">
              <i data-lucide="facebook" class="w-4 h-4"></i>
            </a>
            <a href="https://youtube.com" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-[#070f1f] border border-white/10 flex items-center justify-center text-slate-400 hover:text-[#d4af37] transition-all">
              <i data-lucide="youtube" class="w-4 h-4"></i>
            </a>
          </div>
        </div>

        <div>
          <h4 class="font-bold mb-4 text-[#d4af37] text-xs tracking-wider uppercase">Navigation</h4>
          <ul class="space-y-2 text-sm text-slate-400 font-light">
            <li><a href="index.php" class="hover:text-white transition-colors">Home</a></li>
            <li><a href="about.php" class="text-white font-medium">About</a></li>
            <li><a href="judges.php" class="hover:text-white transition-colors">The Council</a></li>
            <li><a href="eligibility.php" class="hover:text-white transition-colors">Eligibility</a></li>
            <li><a href="faq.php" class="hover:text-white transition-colors">FAQ</a></li>
            <li><a href="contact.php" class="hover:text-white transition-colors">Contact</a></li>
            <li><a href="register.php" class="hover:text-white transition-colors">Register</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-bold mb-3 text-[#d4af37] text-xs tracking-wider uppercase">Official Partner</h4>
          <p class="text-xs text-slate-400 leading-relaxed font-light mb-4">
            Lagos State Government<br>
            Ministry of Wealth Creation and Employment
          </p>
          <h4 class="font-bold mb-2 text-[#d4af37] text-xs tracking-wider uppercase">Produced By</h4>
          <p class="text-xs text-slate-400 leading-relaxed font-light">
            Bravopoints International Limited
          </p>
        </div>
      </div>

      <div class="border-t border-white/5 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left text-xs text-slate-500 font-light">
        <p>© 2026 Colossus of Lagos. All rights reserved.</p>
        <p>Official Partner: Lagos State Government</p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Navbar scroll effect
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", () => {
      if (window.scrollY > 40) {
        navbar.classList.add("shadow-2xl", "border-white/15");
      } else {
        navbar.classList.remove("shadow-2xl", "border-white/15");
      }
    });

    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, { threshold: 0.08 });

    document.querySelectorAll(".section-reveal").forEach((el) => {
      observer.observe(el);
    });

    // Mobile Menu
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

    // Canvas Particle Animation
    const canvas = document.getElementById('hero-canvas');
    if (canvas) {
      const ctx = canvas.getContext('2d');
      let width, height;
      let particles = [];

      function resize() {
        width = canvas.width = window.innerWidth;
        height = canvas.height = canvas.parentElement.offsetHeight;
      }
      resize();
      window.addEventListener('resize', resize);

      class Particle {
        constructor() {
          this.reset();
        }
        reset() {
          this.x = Math.random() * width;
          this.y = Math.random() * height;
          this.size = Math.random() * 2 + 0.6;
          this.speedY = Math.random() * 0.4 + 0.15;
          this.speedX = (Math.random() - 0.5) * 0.25;
          this.opacity = Math.random() * 0.45 + 0.15;
        }
        update() {
          this.y -= this.speedY;
          this.x += this.speedX;
          if (this.y < 0) this.y = height;
          if (this.x < 0) this.x = width;
          if (this.x > width) this.x = 0;
        }
        draw() {
          ctx.fillStyle = `rgba(212, 175, 55, ${this.opacity})`;
          ctx.beginPath();
          ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
          ctx.fill();
        }
      }

      const particleCount = Math.min(50, Math.floor(window.innerWidth / 25));
      for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
      }

      function animate() {
        ctx.clearRect(0, 0, width, height);
        particles.forEach(p => {
          p.update();
          p.draw();
        });
        requestAnimationFrame(animate);
      }
      animate();
    }
  </script>
  <!-- Floating WhatsApp Widget (TechieXtract Scope) -->
  <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry" target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-40 flex items-center gap-3 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-transform" title="Chat on WhatsApp">
    <i data-lucide="message-circle" class="w-6 h-6"></i>
    <span class="text-xs font-bold hidden sm:inline">WhatsApp Help Desk</span>
  </a>
</body>

</html>
