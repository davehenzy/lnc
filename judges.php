<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Council | Lagos New Colossus - Judges & Mentors</title>
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

    @keyframes revealUp {
      from {
        opacity: 0;
        transform: translateY(60px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
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

    @keyframes borderGlow {

      0%,
      100% {
        border-color: rgba(212, 175, 55, 0.2);
      }

      50% {
        border-color: rgba(212, 175, 55, 0.5);
      }
    }

    .animate-float {
      animation: float 6s ease-in-out infinite;
    }

    .animate-float-delayed {
      animation: float 6s ease-in-out infinite;
      animation-delay: 3s;
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

    .judge-card {
      position: relative;
      overflow: hidden;
      transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .judge-card::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top,
          rgba(10, 22, 40, 0.95) 0%,
          rgba(10, 22, 40, 0.4) 50%,
          transparent 100%);
      z-index: 1;
      opacity: 0.8;
      transition: opacity 0.4s ease;
    }

    .judge-card:hover::before {
      opacity: 1;
    }

    .judge-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
    }

    .judge-card:hover .judge-image {
      transform: scale(1.05);
    }

    .judge-card:hover .judge-info {
      transform: translateY(0);
      opacity: 1;
    }

    .judge-image {
      transition: transform 0.6s ease;
    }

    .judge-info {
      transform: translateY(20px);
      opacity: 0.9;
      transition: all 0.4s ease;
    }

    .criteria-card {
      background: linear-gradient(145deg,
          rgba(15, 29, 50, 0.9),
          rgba(10, 22, 40, 0.95));
      border: 1px solid rgba(212, 175, 55, 0.1);
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .criteria-card::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, var(--gold), var(--gold-light));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s ease;
    }

    .criteria-card:hover::after {
      transform: scaleX(1);
    }

    .criteria-card:hover {
      border-color: rgba(212, 175, 55, 0.3);
      transform: translateY(-5px);
    }

    .quote-block {
      position: relative;
      padding-left: 2rem;
      border-left: 3px solid var(--gold);
    }

    .boardroom-accent {
      background: linear-gradient(135deg,
          rgba(212, 175, 55, 0.05),
          transparent);
    }

    .gavel-icon {
      animation: gavelStrike 3s ease-in-out infinite;
    }

    @keyframes gavelStrike {

      0%,
      90%,
      100% {
        transform: rotate(0deg);
      }

      92% {
        transform: rotate(-15deg);
      }

      94% {
        transform: rotate(5deg);
      }

      96% {
        transform: rotate(0deg);
      }
    }

    .mentor-grid-item {
      transition: all 0.4s ease;
    }

    .mentor-grid-item:hover {
      transform: translateY(-5px);
    }

    .mentor-grid-item:hover .mentor-avatar {
      box-shadow: 0 0 30px rgba(212, 175, 55, 0.3);
    }

    .mentor-avatar {
      transition: all 0.4s ease;
    }

    .tab-btn {
      transition: all 0.3s ease;
      position: relative;
    }

    .tab-btn.active {
      color: var(--gold);
    }

    .tab-btn.active::after {
      content: "";
      position: absolute;
      bottom: -1px;
      left: 0;
      width: 100%;
      height: 2px;
      background: var(--gold);
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
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
        <a href="about.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">About</a>
        <a href="eligibility.php"
          class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">Eligibility</a>
        <a href="faq.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">FAQ</a>
      </div>

      <div class="flex items-center gap-4">
        <a href="register.php" class="hidden md:inline-flex btn-gold px-6 py-2.5 rounded-full text-sm uppercase tracking-wider">
          Register Now
        </a>
        <button id="menu-btn" class="md:hidden text-white hover:text-[#d4af37] transition-colors">
          <i data-lucide="menu" class="w-8 h-8"></i>
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
        <a href="index.php" class="text-2xl font-bold text-gray-300 hover:text-[#d4af37]">Home</a>
        <a href="about.php" class="text-2xl font-bold text-gray-300 hover:text-[#d4af37]">About</a>
        <a href="eligibility.php" class="text-2xl font-bold text-gray-300 hover:text-[#d4af37]">Eligibility</a>
        <a href="faq.php" class="text-2xl font-bold text-gray-300 hover:text-[#d4af37]">FAQ</a>
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
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a1628] via-[#0f1d32] to-[#0a1628]"></div>
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
      <div class="absolute top-20 left-10 w-96 h-96 bg-[#d4af37]/5 rounded-full blur-[100px] animate-float"></div>
      <div
        class="absolute bottom-20 right-10 w-[500px] h-[500px] bg-[#d4af37]/5 rounded-full blur-[120px] animate-float-delayed">
      </div>
    </div>
    <div
      class="absolute inset-0 bg-[linear-gradient(rgba(212,175,55,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(212,175,55,0.03)_1px,transparent_1px)] bg-[size:60px_60px]">
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
      <div class="mb-8 inline-flex items-center gap-3 px-5 py-2.5 rounded-full glass-panel">
        <span class="w-2 h-2 rounded-full bg-[#d4af37] animate-pulse"></span>
        <span class="text-xs font-semibold tracking-[0.2em] uppercase text-[#d4af37]">The Ultimate Judgement Zone</span>
      </div>

      <h1 class="font-display text-5xl md:text-7xl lg:text-8xl font-black leading-tight mb-8">
        <span class="block text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-400">Meet</span>
        <span class="block text-gold-gradient mt-2 italic">The Council</span>
      </h1>

      <p class="max-w-3xl mx-auto text-lg md:text-xl text-gray-400 mb-12 leading-relaxed font-light">
        Business moguls who have built empires. Industry titans who shape
        markets.
        <span class="text-white font-medium">The Council</span> evaluates,
        mentors, and decides who has the grit to become the next Colossus of
        Lagos.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="#judges"
          class="btn-gold px-8 py-4 rounded-full text-base uppercase tracking-widest flex items-center gap-3">
          <span>Meet The Judges</span>
          <i data-lucide="arrow-down" class="w-5 h-5"></i>
        </a>
        <a href="#criteria"
          class="btn-outline-gold px-8 py-4 rounded-full text-base uppercase tracking-widest flex items-center gap-3">
          <span>Evaluation Criteria</span>
          <i data-lucide="scale" class="w-5 h-5"></i>
        </a>
      </div>

      <!-- Stats -->
      <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-3xl mx-auto">
        <div class="text-center">
          <div class="text-3xl md:text-4xl font-bold text-gold-gradient-static">
            30+
          </div>
          <div class="text-xs md:text-sm text-gray-500 mt-2 uppercase tracking-wider">
            Mentors
          </div>
        </div>
        <div class="text-center">
          <div class="text-3xl md:text-4xl font-bold text-gold-gradient-static">
            1:5
          </div>
          <div class="text-xs md:text-sm text-gray-500 mt-2 uppercase tracking-wider">
            Mentor Ratio
          </div>
        </div>
        <div class="text-center">
          <div class="text-3xl md:text-4xl font-bold text-gold-gradient-static">
            8
          </div>
          <div class="text-xs md:text-sm text-gray-500 mt-2 uppercase tracking-wider">
            Weeks Judging
          </div>
        </div>
        <div class="text-center">
          <div class="text-3xl md:text-4xl font-bold text-gold-gradient-static">
            120
          </div>
          <div class="text-xs md:text-sm text-gray-500 mt-2 uppercase tracking-wider">
            Winners Mentored
          </div>
        </div>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-[#0a1628] to-transparent"></div>
  </section>

  <!-- The Boardroom Atmosphere -->
  <section class="relative py-24 md:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div class="section-reveal">
          <div class="inline-flex items-center gap-3 mb-8">
            <div class="h-px w-16 bg-[#d4af37]"></div>
            <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">The Arena</span>
          </div>

          <h2 class="font-display text-4xl md:text-5xl font-bold mb-8 leading-tight">
            Where Decisions Are <br />
            <span class="text-gold-gradient italic">Final & Binding</span>
          </h2>

          <div class="space-y-6 text-gray-400 text-lg leading-relaxed">
            <p>
              Each week concludes in
              <span class="text-white font-medium">The Boardroom</span>. Here,
              contestants defend their strategic decisions before The Council.
              It is the ultimate judgement zone where performance is
              critically evaluated.
            </p>

            <p>
              Those who fall short face immediate eviction from the Colossus
              House. Those who impress earn the right to continue their
              journey toward the Grand Prize.
            </p>
          </div>

          <div class="mt-10 quote-block">
            <p class="text-xl font-display italic text-white leading-relaxed">
              "The Boardroom does not forgive. The Boardroom does not forget.
              In here, only results matter."
            </p>
          </div>
        </div>

        <div class="reveal-scale">
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-[#d4af37]/20 to-transparent rounded-3xl blur-2xl"></div>
            <div class="relative glass-panel-strong rounded-3xl p-8 md:p-10">
              <div class="flex items-center justify-center mb-8">
                <div
                  class="w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37] to-[#b8941f] flex items-center justify-center gavel-icon">
                  <i data-lucide="gavel" class="w-10 h-10 text-[#0a1628]"></i>
                </div>
              </div>

              <h3 class="font-display text-2xl font-bold text-center mb-8">
                Boardroom Protocol
              </h3>

              <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-[#0a1628] border border-[#d4af37]/10">
                  <div class="w-8 h-8 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0 mt-1">
                    <span class="text-[#d4af37] font-bold text-sm">01</span>
                  </div>
                  <div>
                    <h4 class="font-semibold text-white mb-1">Task Review</h4>
                    <p class="text-sm text-gray-500">
                      Contestants present their week's business results and
                      strategy execution.
                    </p>
                  </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-[#0a1628] border border-[#d4af37]/10">
                  <div class="w-8 h-8 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0 mt-1">
                    <span class="text-[#d4af37] font-bold text-sm">02</span>
                  </div>
                  <div>
                    <h4 class="font-semibold text-white mb-1">
                      The Interrogation
                    </h4>
                    <p class="text-sm text-gray-500">
                      The Council questions decisions, challenges assumptions,
                      and tests business acumen.
                    </p>
                  </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-[#0a1628] border border-[#d4af37]/10">
                  <div class="w-8 h-8 rounded-lg bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0 mt-1">
                    <span class="text-[#d4af37] font-bold text-sm">03</span>
                  </div>
                  <div>
                    <h4 class="font-semibold text-white mb-1">The Verdict</h4>
                    <p class="text-sm text-gray-500">
                      One contestant is eliminated. The rest advance to the
                      next week's challenge.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Judges -->
  <section id="judges" class="relative py-24 md:py-32"
    style="background: linear-gradient(160deg, #083B74 0%, #070f1f 50%, #0a1628 100%);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">The Power Brokers</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
          The Council Members
        </h2>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg">
          Seasoned business leaders who have built, scaled, and exited
          enterprises across Africa's most competitive markets.
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Judge 1 -->
        <div class="judge-card rounded-2xl overflow-hidden section-reveal group cursor-pointer"
          onclick="openJudgeModal(1)">
          <div class="relative aspect-[3/4] bg-gradient-to-b from-[#083B74] to-[#0a1628]">
            <div class="absolute inset-0 flex items-center justify-center">
              <div
                class="w-32 h-32 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-16 h-16 text-[#d4af37]/40"></i>
              </div>
            </div>
            <div
              class="judge-image absolute inset-0 bg-cover bg-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-6 z-10 judge-info">
            <div class="inline-block px-3 py-1 rounded-full bg-[#d4af37]/20 text-[#d4af37] text-xs font-semibold mb-3">
              Lead Judge
            </div>
            <h3 class="text-2xl font-bold text-white mb-1">Tunde Bakare</h3>
            <p class="text-[#d4af37] text-sm mb-3">
              CEO, Veritas Investments
            </p>
            <p class="text-gray-400 text-sm line-clamp-2">
              25 years building FMCG empires across West Africa. Former board
              member at Unilever Nigeria.
            </p>
            <div class="flex items-center gap-2 mt-4 text-xs text-gray-500">
              <span class="flex items-center gap-1"><i data-lucide="briefcase" class="w-3 h-3"></i> FMCG</span>
              <span class="w-1 h-1 rounded-full bg-gray-600"></span>
              <span class="flex items-center gap-1"><i data-lucide="map-pin" class="w-3 h-3"></i> Lagos</span>
            </div>
          </div>
        </div>

        <!-- Judge 2 -->
        <div class="judge-card rounded-2xl overflow-hidden section-reveal group cursor-pointer"
          style="transition-delay: 0.1s" onclick="openJudgeModal(2)">
          <div class="relative aspect-[3/4] bg-gradient-to-b from-[#083B74] to-[#0a1628]">
            <div class="absolute inset-0 flex items-center justify-center">
              <div
                class="w-32 h-32 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-16 h-16 text-[#d4af37]/40"></i>
              </div>
            </div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-6 z-10 judge-info">
            <div class="inline-block px-3 py-1 rounded-full bg-[#d4af37]/20 text-[#d4af37] text-xs font-semibold mb-3">
              Strategy
            </div>
            <h3 class="text-2xl font-bold text-white mb-1">Ngozi Okonkwo</h3>
            <p class="text-[#d4af37] text-sm mb-3">
              Founder, TechNova Holdings
            </p>
            <p class="text-gray-400 text-sm line-clamp-2">
              Serial tech entrepreneur with 3 exits. Early investor in
              Paystack and Flutterwave.
            </p>
            <div class="flex items-center gap-2 mt-4 text-xs text-gray-500">
              <span class="flex items-center gap-1"><i data-lucide="briefcase" class="w-3 h-3"></i> Fintech</span>
              <span class="w-1 h-1 rounded-full bg-gray-600"></span>
              <span class="flex items-center gap-1"><i data-lucide="map-pin" class="w-3 h-3"></i> Lagos</span>
            </div>
          </div>
        </div>

        <!-- Judge 3 -->
        <div class="judge-card rounded-2xl overflow-hidden section-reveal group cursor-pointer"
          style="transition-delay: 0.2s" onclick="openJudgeModal(3)">
          <div class="relative aspect-[3/4] bg-gradient-to-b from-[#083B74] to-[#0a1628]">
            <div class="absolute inset-0 flex items-center justify-center">
              <div
                class="w-32 h-32 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-16 h-16 text-[#d4af37]/40"></i>
              </div>
            </div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-6 z-10 judge-info">
            <div class="inline-block px-3 py-1 rounded-full bg-[#d4af37]/20 text-[#d4af37] text-xs font-semibold mb-3">
              Operations
            </div>
            <h3 class="text-2xl font-bold text-white mb-1">Emeka Obi</h3>
            <p class="text-[#d4af37] text-sm mb-3">
              Group MD, Continental Logistics
            </p>
            <p class="text-gray-400 text-sm line-clamp-2">
              Built Africa's largest private logistics network. Expert in
              supply chain and operations at scale.
            </p>
            <div class="flex items-center gap-2 mt-4 text-xs text-gray-500">
              <span class="flex items-center gap-1"><i data-lucide="briefcase" class="w-3 h-3"></i>
                Logistics</span>
              <span class="w-1 h-1 rounded-full bg-gray-600"></span>
              <span class="flex items-center gap-1"><i data-lucide="map-pin" class="w-3 h-3"></i> Lagos</span>
            </div>
          </div>
        </div>

        <!-- Judge 4 -->
        <div class="judge-card rounded-2xl overflow-hidden section-reveal group cursor-pointer"
          onclick="openJudgeModal(4)">
          <div class="relative aspect-[3/4] bg-gradient-to-b from-[#083B74] to-[#0a1628]">
            <div class="absolute inset-0 flex items-center justify-center">
              <div
                class="w-32 h-32 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-16 h-16 text-[#d4af37]/40"></i>
              </div>
            </div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-6 z-10 judge-info">
            <div class="inline-block px-3 py-1 rounded-full bg-[#d4af37]/20 text-[#d4af37] text-xs font-semibold mb-3">
              Marketing
            </div>
            <h3 class="text-2xl font-bold text-white mb-1">Amina Hassan</h3>
            <p class="text-[#d4af37] text-sm mb-3">CMO, BrandCraft Africa</p>
            <p class="text-gray-400 text-sm line-clamp-2">
              Award-winning brand strategist. Built campaigns for MTN,
              Guinness, and Access Bank.
            </p>
            <div class="flex items-center gap-2 mt-4 text-xs text-gray-500">
              <span class="flex items-center gap-1"><i data-lucide="briefcase" class="w-3 h-3"></i>
                Marketing</span>
              <span class="w-1 h-1 rounded-full bg-gray-600"></span>
              <span class="flex items-center gap-1"><i data-lucide="map-pin" class="w-3 h-3"></i> Lagos</span>
            </div>
          </div>
        </div>

        <!-- Judge 5 -->
        <div class="judge-card rounded-2xl overflow-hidden section-reveal group cursor-pointer"
          style="transition-delay: 0.1s" onclick="openJudgeModal(5)">
          <div class="relative aspect-[3/4] bg-gradient-to-b from-[#083B74] to-[#0a1628]">
            <div class="absolute inset-0 flex items-center justify-center">
              <div
                class="w-32 h-32 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-16 h-16 text-[#d4af37]/40"></i>
              </div>
            </div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-6 z-10 judge-info">
            <div class="inline-block px-3 py-1 rounded-full bg-[#d4af37]/20 text-[#d4af37] text-xs font-semibold mb-3">
              Finance
            </div>
            <h3 class="text-2xl font-bold text-white mb-1">Chidi Nwosu</h3>
            <p class="text-[#d4af37] text-sm mb-3">Partner, Apex Capital</p>
            <p class="text-gray-400 text-sm line-clamp-2">
              Private equity veteran. Led $500M+ in African investments.
              Former Goldman Sachs VP.
            </p>
            <div class="flex items-center gap-2 mt-4 text-xs text-gray-500">
              <span class="flex items-center gap-1"><i data-lucide="briefcase" class="w-3 h-3"></i> Private
                Equity</span>
              <span class="w-1 h-1 rounded-full bg-gray-600"></span>
              <span class="flex items-center gap-1"><i data-lucide="map-pin" class="w-3 h-3"></i> Lagos</span>
            </div>
          </div>
        </div>

        <!-- Judge 6 -->
        <div class="judge-card rounded-2xl overflow-hidden section-reveal group cursor-pointer"
          style="transition-delay: 0.2s" onclick="openJudgeModal(6)">
          <div class="relative aspect-[3/4] bg-gradient-to-b from-[#083B74] to-[#0a1628]">
            <div class="absolute inset-0 flex items-center justify-center">
              <div
                class="w-32 h-32 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-16 h-16 text-[#d4af37]/40"></i>
              </div>
            </div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-6 z-10 judge-info">
            <div class="inline-block px-3 py-1 rounded-full bg-[#d4af37]/20 text-[#d4af37] text-xs font-semibold mb-3">
              Innovation
            </div>
            <h3 class="text-2xl font-bold text-white mb-1">Funke Adeyemi</h3>
            <p class="text-[#d4af37] text-sm mb-3">
              Director, Lagos Innovation Hub
            </p>
            <p class="text-gray-400 text-sm line-clamp-2">
              Government advisor on tech policy. Scaled 200+ startups through
              incubation programs.
            </p>
            <div class="flex items-center gap-2 mt-4 text-xs text-gray-500">
              <span class="flex items-center gap-1"><i data-lucide="briefcase" class="w-3 h-3"></i>
                Innovation</span>
              <span class="w-1 h-1 rounded-full bg-gray-600"></span>
              <span class="flex items-center gap-1"><i data-lucide="map-pin" class="w-3 h-3"></i> Lagos</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Evaluation Criteria -->
  <section id="criteria" class="relative py-24 md:py-32">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">How You Are Measured</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
          Evaluation Criteria
        </h2>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg">
          The Council scores every contestant across six core pillars of
          entrepreneurial excellence.
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="criteria-card rounded-2xl p-8 section-reveal">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="lightbulb" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-bold text-white">Innovation</h3>
            <span class="text-[#d4af37] font-bold">20%</span>
          </div>
          <p class="text-gray-400 text-sm leading-relaxed">
            Originality of concept, creative problem-solving, and disruptive
            thinking that challenges market norms.
          </p>
        </div>

        <div class="criteria-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.1s">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="trending-up" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-bold text-white">Execution</h3>
            <span class="text-[#d4af37] font-bold">25%</span>
          </div>
          <p class="text-gray-400 text-sm leading-relaxed">
            Ability to deliver results under pressure, meet deadlines, and
            turn strategy into measurable outcomes.
          </p>
        </div>

        <div class="criteria-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.2s">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="users" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-bold text-white">Leadership</h3>
            <span class="text-[#d4af37] font-bold">15%</span>
          </div>
          <p class="text-gray-400 text-sm leading-relaxed">
            Team management, conflict resolution, delegation, and ability to
            inspire others toward a common goal.
          </p>
        </div>

        <div class="criteria-card rounded-2xl p-8 section-reveal">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="pie-chart" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-bold text-white">Financial Acumen</h3>
            <span class="text-[#d4af37] font-bold">15%</span>
          </div>
          <p class="text-gray-400 text-sm leading-relaxed">
            Budget management, pricing strategy, profitability analysis, and
            sustainable revenue model design.
          </p>
        </div>

        <div class="criteria-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.1s">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="target" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-bold text-white">Strategy</h3>
            <span class="text-[#d4af37] font-bold">15%</span>
          </div>
          <p class="text-gray-400 text-sm leading-relaxed">
            Long-term vision, market positioning, competitive analysis, and
            adaptive planning under uncertainty.
          </p>
        </div>

        <div class="criteria-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.2s">
          <div
            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mb-6">
            <i data-lucide="shield" class="w-7 h-7 text-[#d4af37]"></i>
          </div>
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-bold text-white">Resilience</h3>
            <span class="text-[#d4af37] font-bold">10%</span>
          </div>
          <p class="text-gray-400 text-sm leading-relaxed">
            Handling setbacks, maintaining composure under criticism, and
            demonstrating grit when facing elimination.
          </p>
        </div>
      </div>

      <!-- Scoring Visual -->
      <div class="mt-16 glass-panel-strong rounded-3xl p-8 md:p-12 section-reveal">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div>
            <h3 class="font-display text-3xl font-bold mb-4">
              The Scoring System
            </h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
              Each week, contestants are scored out of 100 points. The
              contestant with the lowest cumulative score faces eviction. In
              case of a tie, The Council deliberates and votes.
            </p>
            <div class="space-y-4">
              <div>
                <div class="flex justify-between text-sm mb-1">
                  <span class="text-gray-300">Execution</span>
                  <span class="text-[#d4af37] font-semibold">25 points</span>
                </div>
                <div class="h-2 bg-[#0a1628] rounded-full overflow-hidden">
                  <div class="h-full bg-gradient-to-r from-[#d4af37] to-[#f4d03f] rounded-full" style="width: 25%">
                  </div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-sm mb-1">
                  <span class="text-gray-300">Innovation</span>
                  <span class="text-[#d4af37] font-semibold">20 points</span>
                </div>
                <div class="h-2 bg-[#0a1628] rounded-full overflow-hidden">
                  <div class="h-full bg-gradient-to-r from-[#d4af37] to-[#f4d03f] rounded-full" style="width: 20%">
                  </div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-sm mb-1">
                  <span class="text-gray-300">Leadership</span>
                  <span class="text-[#d4af37] font-semibold">15 points</span>
                </div>
                <div class="h-2 bg-[#0a1628] rounded-full overflow-hidden">
                  <div class="h-full bg-gradient-to-r from-[#d4af37] to-[#f4d03f] rounded-full" style="width: 15%">
                  </div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-sm mb-1">
                  <span class="text-gray-300">Financial Acumen</span>
                  <span class="text-[#d4af37] font-semibold">15 points</span>
                </div>
                <div class="h-2 bg-[#0a1628] rounded-full overflow-hidden">
                  <div class="h-full bg-gradient-to-r from-[#d4af37] to-[#f4d03f] rounded-full" style="width: 15%">
                  </div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-sm mb-1">
                  <span class="text-gray-300">Strategy</span>
                  <span class="text-[#d4af37] font-semibold">15 points</span>
                </div>
                <div class="h-2 bg-[#0a1628] rounded-full overflow-hidden">
                  <div class="h-full bg-gradient-to-r from-[#d4af37] to-[#f4d03f] rounded-full" style="width: 15%">
                  </div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-sm mb-1">
                  <span class="text-gray-300">Resilience</span>
                  <span class="text-[#d4af37] font-semibold">10 points</span>
                </div>
                <div class="h-2 bg-[#0a1628] rounded-full overflow-hidden">
                  <div class="h-full bg-gradient-to-r from-[#d4af37] to-[#f4d03f] rounded-full" style="width: 10%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-[#d4af37]/10 to-transparent rounded-2xl blur-xl"></div>
            <div class="relative bg-[#0a1628] rounded-2xl p-8 border border-[#d4af37]/10">
              <div class="text-center mb-6">
                <div
                  class="w-16 h-16 rounded-full bg-gradient-to-br from-[#d4af37] to-[#b8941f] flex items-center justify-center mx-auto mb-4">
                  <i data-lucide="calculator" class="w-8 h-8 text-[#0a1628]"></i>
                </div>
                <h4 class="font-display text-xl font-bold">
                  Weekly Scorecard
                </h4>
              </div>
              <div class="space-y-3">
                <div class="flex items-center justify-between p-3 rounded-lg bg-[#070f1f]">
                  <span class="text-sm text-gray-400">Week 1 Score</span>
                  <span class="text-[#d4af37] font-bold">85/100</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-[#070f1f]">
                  <span class="text-sm text-gray-400">Week 2 Score</span>
                  <span class="text-[#d4af37] font-bold">72/100</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-[#070f1f]">
                  <span class="text-sm text-gray-400">Week 3 Score</span>
                  <span class="text-[#d4af37] font-bold">91/100</span>
                </div>
                <div class="h-px bg-[#d4af37]/20 my-2"></div>
                <div
                  class="flex items-center justify-between p-3 rounded-lg bg-[#d4af37]/10 border border-[#d4af37]/20">
                  <span class="text-sm text-white font-semibold">Cumulative</span>
                  <span class="text-[#d4af37] font-bold text-lg">248/300</span>
                </div>
              </div>
              <p class="text-xs text-gray-500 mt-4 text-center">
                Example scoring for illustration purposes
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Mentorship Program -->
  <section class="relative py-24 md:py-32"
    style="background: linear-gradient(160deg, #0a1628 0%, #070f1f 40%, #083B74 100%);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-20 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">Beyond The Show</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
          3-Month Mentorship Program
        </h2>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg">
          Winning is just the beginning. All 120 winners receive structured
          mentorship from The Council and extended mentor network.
        </p>
      </div>

      <!-- Tabs -->
      <div class="flex justify-center gap-8 mb-12 section-reveal border-b border-[#d4af37]/10 pb-4">
        <button class="tab-btn active text-sm font-semibold pb-2" onclick="switchTab('mentors', this)">
          The Mentors
        </button>
        <button class="tab-btn text-sm font-semibold text-gray-500 pb-2" onclick="switchTab('program', this)">
          Program Structure
        </button>
        <button class="tab-btn text-sm font-semibold text-gray-500 pb-2" onclick="switchTab('success', this)">
          Success Stories
        </button>
      </div>

      <!-- Tab Content: Mentors -->
      <div id="mentors" class="tab-content active">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Dr. Olayinka</h4>
            <p class="text-[#d4af37] text-xs mb-2">Pharma & Healthcare</p>
            <p class="text-gray-500 text-xs">Founder, HealthFirst Nigeria</p>
          </div>

          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Ibrahim Sule</h4>
            <p class="text-[#d4af37] text-xs mb-2">Real Estate</p>
            <p class="text-gray-500 text-xs">CEO, Metro Properties</p>
          </div>

          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Zainab Ali</h4>
            <p class="text-[#d4af37] text-xs mb-2">Fashion & Retail</p>
            <p class="text-gray-500 text-xs">Creative Director, ZA Label</p>
          </div>

          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Femi Otedola</h4>
            <p class="text-[#d4af37] text-xs mb-2">Energy & Oil</p>
            <p class="text-gray-500 text-xs">Chairman, Forte Oil</p>
          </div>

          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Adaobi Nwosu</h4>
            <p class="text-[#d4af37] text-xs mb-2">Agribusiness</p>
            <p class="text-gray-500 text-xs">Founder, FarmFresh NG</p>
          </div>

          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Kola Adesina</h4>
            <p class="text-[#d4af37] text-xs mb-2">Manufacturing</p>
            <p class="text-gray-500 text-xs">MD, Dangote Cement</p>
          </div>

          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Amaka Igwe</h4>
            <p class="text-[#d4af37] text-xs mb-2">Media & Entertainment</p>
            <p class="text-gray-500 text-xs">CEO, Studio 54 Africa</p>
          </div>

          <div class="mentor-grid-item text-center p-6 rounded-2xl glass-panel border border-[#d4af37]/10">
            <div
              class="mentor-avatar w-20 h-20 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center mx-auto mb-4">
              <i data-lucide="user" class="w-10 h-10 text-[#d4af37]/60"></i>
            </div>
            <h4 class="font-bold text-white mb-1">Yemi Osho</h4>
            <p class="text-[#d4af37] text-xs mb-2">Legal & Compliance</p>
            <p class="text-gray-500 text-xs">Partner, Templars Law</p>
          </div>
        </div>

        <div class="mt-8 text-center">
          <p class="text-gray-500 text-sm">
            And 22 more industry leaders across technology, finance,
            hospitality, education, and more.
          </p>
        </div>
      </div>

      <!-- Tab Content: Program Structure -->
      <div id="program" class="tab-content">
        <div class="grid md:grid-cols-3 gap-6">
          <div class="glass-panel rounded-2xl p-8">
            <div class="w-12 h-12 rounded-full bg-[#d4af37]/10 flex items-center justify-center mb-6">
              <span class="text-[#d4af37] font-bold text-lg">1</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Month 1: Foundation</h3>
            <ul class="space-y-2 text-sm text-gray-400">
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Business model refinement
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Market validation sessions
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Financial planning workshop
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Weekly 1-on-1 mentor calls
              </li>
            </ul>
          </div>

          <div class="glass-panel rounded-2xl p-8">
            <div class="w-12 h-12 rounded-full bg-[#d4af37]/10 flex items-center justify-center mb-6">
              <span class="text-[#d4af37] font-bold text-lg">2</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Month 2: Growth</h3>
            <ul class="space-y-2 text-sm text-gray-400">
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Investor pitch preparation
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Operational scaling strategy
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Team building & hiring
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Bi-weekly group sessions
              </li>
            </ul>
          </div>

          <div class="glass-panel rounded-2xl p-8">
            <div class="w-12 h-12 rounded-full bg-[#d4af37]/10 flex items-center justify-center mb-6">
              <span class="text-[#d4af37] font-bold text-lg">3</span>
            </div>
            <h3 class="text-xl font-bold mb-3">Month 3: Launch</h3>
            <ul class="space-y-2 text-sm text-gray-400">
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Demo day preparation
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Investor introductions
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Partnership negotiations
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                Graduation & alumni access
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Tab Content: Success Stories -->
      <div id="success" class="tab-content">
        <div class="grid md:grid-cols-2 gap-8">
          <div class="glass-panel rounded-2xl p-8">
            <div class="quote-block mb-6">
              <p class="text-lg font-display italic text-white leading-relaxed">
                "The mentorship from Lagos New Colossus transformed my
                agro-processing startup from a local operation to a supplier
                for 3 international supermarkets."
              </p>
            </div>
            <div class="flex items-center gap-4">
              <div
                class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-6 h-6 text-[#d4af37]/60"></i>
              </div>
              <div>
                <div class="font-semibold text-white">Oluwaseun Adeleke</div>
                <div class="text-sm text-gray-500">
                  Season 1 Winner | Agro Processing
                </div>
              </div>
            </div>
          </div>

          <div class="glass-panel rounded-2xl p-8">
            <div class="quote-block mb-6">
              <p class="text-lg font-display italic text-white leading-relaxed">
                "The Council's feedback was brutally honest and exactly what I
                needed. Within 6 months of the show, I raised my first seed
                round."
              </p>
            </div>
            <div class="flex items-center gap-4">
              <div
                class="w-12 h-12 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-6 h-6 text-[#d4af37]/60"></i>
              </div>
              <div>
                <div class="font-semibold text-white">Chioma Eze</div>
                <div class="text-sm text-gray-500">
                  Season 2 Finalist | HealthTech
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="relative py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#d4af37]/5 via-transparent to-[#d4af37]/5"></div>
    <div
      class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23d4af37\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]">
    </div>

    <div class="relative max-w-4xl mx-auto px-6 text-center section-reveal">
      <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">
        Ready to Face <span class="text-gold-gradient">The Council?</span>
      </h2>
      <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto leading-relaxed">
        The Boardroom awaits. The gavel is ready. Do you have what it takes to
        impress Lagos's most formidable business minds?
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="register.php"
          class="btn-gold px-10 py-5 rounded-full text-lg uppercase tracking-widest flex items-center gap-3">
          <span>Register Now</span>
          <i data-lucide="arrow-right" class="w-5 h-5"></i>
        </a>
        <a href="#"
          class="btn-outline-gold px-10 py-5 rounded-full text-lg uppercase tracking-widest flex items-center gap-3">
          <i data-lucide="play" class="w-5 h-5"></i>
          <span>Watch Trailer</span>
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

  <!-- Judge Modal -->
  <div id="judgeModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>
    <div class="relative flex items-center justify-center min-h-screen p-4">
      <div class="glass-panel-strong rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-8 md:p-10">
          <div class="flex justify-between items-start mb-8">
            <div class="flex items-center gap-4">
              <div
                class="w-16 h-16 rounded-full bg-gradient-to-br from-[#d4af37]/20 to-[#d4af37]/5 flex items-center justify-center">
                <i data-lucide="user" class="w-8 h-8 text-[#d4af37]/60"></i>
              </div>
              <div>
                <h3 id="modalJudgeName" class="text-2xl font-bold text-white"></h3>
                <p id="modalJudgeTitle" class="text-[#d4af37] text-sm"></p>
              </div>
            </div>
            <button onclick="closeJudgeModal()" class="text-gray-400 hover:text-white transition-colors">
              <i data-lucide="x" class="w-6 h-6"></i>
            </button>
          </div>

          <div class="space-y-6">
            <div>
              <h4 class="font-semibold text-white mb-3">Expertise</h4>
              <p id="modalJudgeBio" class="text-gray-400 leading-relaxed"></p>
            </div>

            <div>
              <h4 class="font-semibold text-white mb-3">Key Achievements</h4>
              <ul id="modalJudgeAchievements" class="space-y-2 text-gray-400">
                <!-- Achievements will be populated by JavaScript -->
              </ul>
            </div>

            <div>
              <h4 class="font-semibold text-white mb-3">Why They Judge</h4>
              <p id="modalJudgeQuote" class="text-gray-400 italic leading-relaxed"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Judge data
    const judges = {
      1: {
        name: "Tunde Bakare",
        title: "CEO, Veritas Investments",
        bio: "25 years building FMCG empires across West Africa. Former board member at Unilever Nigeria. Expert in consumer goods, distribution networks, and market expansion strategies.",
        achievements: [
          "Built 3 FMCG companies from startup to $50M+ revenue",
          "Led Unilever Nigeria's expansion into 5 new African markets",
          "Mentored 50+ entrepreneurs through various incubation programs",
        ],
        quote:
          "Success in business isn't about having the best idea—it's about executing relentlessly and adapting faster than your competition.",
      },
      2: {
        name: "Ngozi Okonkwo",
        title: "Founder, TechNova Holdings",
        bio: "Serial tech entrepreneur with 3 exits. Early investor in Paystack and Flutterwave. Pioneer in African fintech ecosystem development.",
        achievements: [
          "Founded and exited 3 fintech startups",
          "Early investor in Paystack (acquired by Stripe)",
          "Built Flutterwave's initial product roadmap",
          "Raised $25M+ for portfolio companies",
        ],
        quote:
          "Technology doesn't solve problems—people with vision do. I look for founders who understand both code and customers.",
      },
      3: {
        name: "Emeka Obi",
        title: "Group MD, Continental Logistics",
        bio: "Built Africa's largest private logistics network. Expert in supply chain and operations at scale. Former consultant at McKinsey & Company.",
        achievements: [
          "Scaled logistics network to 15 countries",
          "Reduced supply chain costs by 40% for major clients",
          "Implemented AI-driven route optimization systems",
          "Trained 200+ logistics professionals",
        ],
        quote:
          "Operations are the backbone of any business. Without efficient operations, even the best strategy will fail.",
      },
      4: {
        name: "Amina Hassan",
        title: "CMO, BrandCraft Africa",
        bio: "Award-winning brand strategist. Built campaigns for MTN, Guinness, and Access Bank. Expert in consumer behavior and brand positioning.",
        achievements: [
          "Increased MTN brand awareness by 300% in 2 years",
          "Launched Guinness 'Made of More' campaign across 8 countries",
          "Built Access Bank's digital brand identity",
          "Won 15+ marketing excellence awards",
        ],
        quote:
          "Your brand is your promise to customers. Break that promise, and no amount of marketing budget can save you.",
      },
      5: {
        name: "Chidi Nwosu",
        title: "Partner, Apex Capital",
        bio: "Private equity veteran. Led $500M+ in African investments. Former Goldman Sachs VP with deep expertise in financial modeling and valuation.",
        achievements: [
          "Led $500M+ in African PE investments",
          "Turned around 3 distressed companies",
          "Built investment thesis for 20+ portfolio companies",
          "Advised on $2B+ in M&A transactions",
        ],
        quote:
          "Numbers don't lie. If your financials don't make sense, neither does your business model.",
      },
      6: {
        name: "Funke Adeyemi",
        title: "Director, Lagos Innovation Hub",
        bio: "Government advisor on tech policy. Scaled 200+ startups through incubation programs. Expert in innovation ecosystems and startup acceleration.",
        achievements: [
          "Scaled 200+ startups through Lagos Innovation Hub",
          "Developed Lagos tech policy framework",
          "Raised $50M+ in funding for portfolio startups",
          "Created partnerships with 50+ global accelerators",
        ],
        quote:
          "Innovation requires courage. I look for entrepreneurs willing to challenge the status quo and build for the future.",
      },
    };

    // Modal functions
    function openJudgeModal(judgeId) {
      const judge = judges[judgeId];
      if (!judge) return;

      document.getElementById("modalJudgeName").textContent = judge.name;
      document.getElementById("modalJudgeTitle").textContent = judge.title;
      document.getElementById("modalJudgeBio").textContent = judge.bio;
      document.getElementById("modalJudgeQuote").textContent = judge.quote;

      const achievementsList = document.getElementById(
        "modalJudgeAchievements",
      );
      achievementsList.innerHTML = judge.achievements
        .map(
          (achievement) =>
            `<li class="flex items-start gap-2">
            <i data-lucide="check-circle" class="w-4 h-4 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
            <span>${achievement}</span>
          </li>`,
        )
        .join("");

      document.getElementById("judgeModal").classList.remove("hidden");
      document.body.style.overflow = "hidden";

      // Re-initialize Lucide icons for the modal
      lucide.createIcons();
    }

    function closeJudgeModal() {
      document.getElementById("judgeModal").classList.add("hidden");
      document.body.style.overflow = "auto";
    }

    // Tab switching function
    function switchTab(tabName, button) {
      // Hide all tab contents
      document.querySelectorAll(".tab-content").forEach((content) => {
        content.classList.remove("active");
      });

      // Remove active class from all tab buttons
      document.querySelectorAll(".tab-btn").forEach((btn) => {
        btn.classList.remove("active");
      });

      // Show selected tab content
      document.getElementById(tabName).classList.add("active");

      // Add active class to clicked button
      button.classList.add("active");
    }

    // Intersection Observer for animations
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

    // Observe all elements with section-reveal class
    document.querySelectorAll(".section-reveal").forEach((el) => {
      observer.observe(el);
    });

    // Navbar scroll effect
    window.addEventListener("scroll", () => {
      const navbar = document.getElementById("navbar");
      if (window.scrollY > 100) {
        navbar.classList.add("nav-blur");
      } else {
        navbar.classList.remove("nav-blur");
      }
    });

    // Close modal when clicking outside
    document.getElementById("judgeModal").addEventListener("click", (e) => {
      if (e.target.id === "judgeModal") {
        closeJudgeModal();
      }
    });

    // Initialize Lucide icons
    document.addEventListener("DOMContentLoaded", () => {
      lucide.createIcons();
    });

    // Mobile Menu Logic
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

    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') toggleMenu(false);
    });
  </script>
</body>

</html>