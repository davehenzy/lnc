<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eligibility | Lagos New Colossus</title>
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
  <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-6 bg-[#0a1628] border-b border-white/5">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
      <a href="index.php" class="flex items-center">
        <img src="assets/slider/LASG-LNC.svg" alt="Lagos New Colossus Logo"
          class="h-10 md:h-16 w-auto object-contain" />
      </a>

      <div class="hidden md:flex items-center gap-12">
        <a href="index.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">Home</a>
        <a href="about.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">About</a>

        <a href="eligibility.php" class="text-sm font-medium text-[#d4af37] transition-colors">Eligibility</a>
        <a href="faq.php" class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors">FAQ</a>
      </div>

      <div class="flex items-center gap-4">
        <a href="register.php"
          class="hidden sm:block btn-gold px-6 py-2.5 rounded-full text-xs md:text-sm uppercase tracking-wider">
          Register Now
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
        <a href="eligibility.php" class="text-2xl font-bold text-[#d4af37]">Eligibility</a>
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
  <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden pt-[112px] md:pt-[130px]">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a1628] via-[#0f1d32] to-[#0a1628]"></div>
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
      <div class="absolute top-20 left-10 w-96 h-96 bg-[#d4af37]/5 rounded-full blur-[100px] animate-float"></div>
      <div
        class="absolute bottom-20 right-10 w-[500px] h-[500px] bg-[#d4af37]/5 rounded-full blur-[120px] animate-float"
        style="animation-delay: 3s"></div>
    </div>
    <div
      class="absolute inset-0 bg-[linear-gradient(rgba(212,175,55,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(212,175,55,0.03)_1px,transparent_1px)] bg-[size:60px_60px]">
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">


      <h1 class="font-display text-5xl md:text-7xl lg:text-8xl font-black leading-tight mb-8">
        <span class="block text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-400">Are You</span>
        <span class="block text-gold-gradient mt-2 italic">Eligible?</span>
      </h1>

      <p class="max-w-2xl mx-auto text-lg md:text-xl text-gray-400 mb-12 leading-relaxed font-light">
        We're searching for Lagos-based entrepreneurs aged 20-40 who have what
        it takes to build the next great African company out of Lagos.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="#requirements"
          class="btn-gold px-8 py-4 rounded-full text-base uppercase tracking-widest flex items-center gap-3">
          <span>Check Requirements</span>
          <i data-lucide="arrow-down" class="w-5 h-5"></i>
        </a>
        <a href="#register"
          class="btn-outline-gold px-8 py-4 rounded-full text-base uppercase tracking-widest flex items-center gap-3">
          <span>Register Now</span>
          <i data-lucide="edit-3" class="w-5 h-5"></i>
        </a>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-[#0a1628] to-transparent"></div>
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
          To participate in the Lagos New Colossus, applicants must meet the
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
                Must be in excellent physical and mental health to withstand
                the demands of the 8-week competition and residency.
              </p>
            </div>
          </div>
        </div>

        <!-- Requirement 4 -->
        <div class="requirement-card rounded-2xl p-8 section-reveal" style="transition-delay: 0.3s">
          <div class="flex items-start gap-5">
            <div class="w-14 h-14 rounded-2xl bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="home" class="w-7 h-7 text-[#d4af37]"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold mb-2 text-white">
                Residency in Colossus House
              </h3>
              <p class="text-gray-400 leading-relaxed mb-3">
                Must be willing and able to move into and reside in the
                "Colossus House" for the full duration of the 8-week show.
              </p>
              <div
                class="flex items-center gap-2 text-xs text-[#d4af37] bg-[#d4af37]/10 px-3 py-1.5 rounded-full w-fit">
                <i data-lucide="clock" class="w-3 h-3"></i>
                <span>8 weeks full-time commitment</span>
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
                Travel Expenses Coverage
              </h3>
              <p class="text-gray-400 leading-relaxed">
                Must be willing and able to cover all your travel expenses to
                and from the location of the "Colossus House" throughout the
                duration of the show.
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
                Full Participation Commitment
              </h3>
              <p class="text-gray-400 leading-relaxed mb-3">
                Must be willing and able to fully participate for the duration
                of the 8 weeks based on dates set by the Producers.
              </p>
              <div
                class="flex items-center gap-2 text-xs text-[#d4af37] bg-[#d4af37]/10 px-3 py-1.5 rounded-full w-fit">
                <i data-lucide="alert-circle" class="w-3 h-3"></i>
                <span>No external commitments allowed</span>
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
                Peaceful Co-existence
              </h3>
              <p class="text-gray-400 leading-relaxed">
                Must be willing and able to peacefully co-exist with the other
                contestants who will be your housemates during the duration of
                the show.
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
                <span>Available for 8 weeks</span>
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
            Lagos New Colossus is looking for innovative, commercially viable, and scalable
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
                Selection Process
              </h3>

              <div class="space-y-6">
                <div class="relative pl-8 pb-6 border-l-2 border-[#d4af37]/30 last:border-0 last:pb-0">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-sm font-semibold text-[#d4af37] mb-1">
                    Stage 1
                  </div>
                  <h4 class="font-bold text-white mb-1">Registration</h4>
                  <p class="text-sm text-gray-400">
                    Complete the online form with your business idea and
                    upload a full picture.
                  </p>
                </div>

                <div class="relative pl-8 pb-6 border-l-2 border-[#d4af37]/30 last:border-0 last:pb-0">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-sm font-semibold text-[#d4af37] mb-1">
                    Stage 2
                  </div>
                  <h4 class="font-bold text-white mb-1">Auditions</h4>
                  <p class="text-sm text-gray-400">
                    Pitch your business before a panel of judges at your
                    chosen centre.
                  </p>
                </div>

                <div class="relative pl-8 pb-6 border-l-2 border-[#d4af37]/30 last:border-0 last:pb-0">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px]"></div>
                  <div class="text-sm font-semibold text-[#d4af37] mb-1">
                    Stage 3
                  </div>
                  <h4 class="font-bold text-white mb-1">
                    Bootcamp (Top 150)
                  </h4>
                  <p class="text-sm text-gray-400">
                    3-day intensive training and evaluation. 100 win cash
                    grants.
                  </p>
                </div>

                <div class="relative pl-8">
                  <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-[#d4af37] -translate-x-[9px] check-pulse">
                  </div>
                  <div class="text-sm font-semibold text-[#d4af37] mb-1">
                    Stage 4
                  </div>
                  <h4 class="font-bold text-white mb-1">
                    The Colossus House (Top 20)
                  </h4>
                  <p class="text-sm text-gray-400">
                    8-week main show. Grand Prize and national TV exposure.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Audition Centers -->
  <section class="relative py-24 md:py-32">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16 section-reveal">
        <div class="inline-flex items-center gap-3 mb-6">
          <div class="h-px w-16 bg-[#d4af37]"></div>
          <span class="text-[#d4af37] text-sm font-semibold tracking-[0.2em] uppercase">Five Locations</span>
          <div class="h-px w-16 bg-[#d4af37]"></div>
        </div>
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">
          Audition Centres Across Lagos
        </h2>
        <p class="max-w-2xl mx-auto text-gray-400">
          Choose your preferred location for the in-person audition. All
          centres are equipped for your pitch presentation.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <div class="location-card glass-panel rounded-2xl overflow-hidden group section-reveal"
          onclick="selectLocation(this)">
          <div class="relative h-40 overflow-hidden">
            <img src="assets/locations/lagos-island.webp" alt="Lagos Island"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
          </div>
          <div class="p-5 text-center">
            <h3 class="font-bold text-lg mb-1">Lagos Island</h3>
            <p class="text-xs text-[#d4af37]">Central Business District</p>
          </div>
        </div>

        <div class="location-card glass-panel rounded-2xl overflow-hidden group section-reveal"
          style="transition-delay: 0.1s" onclick="selectLocation(this)">
          <div class="relative h-40 overflow-hidden">
            <img src="assets/locations/ikeja.jpg" alt="Ikeja"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
          </div>
          <div class="p-5 text-center">
            <h3 class="font-bold text-lg mb-1">Ikeja</h3>
            <p class="text-xs text-[#d4af37]">State Capital</p>
          </div>
        </div>

        <div class="location-card glass-panel rounded-2xl overflow-hidden group section-reveal"
          style="transition-delay: 0.2s" onclick="selectLocation(this)">
          <div class="relative h-40 overflow-hidden">
            <img src="assets/locations/ikorodu.jpg" alt="Ikorodu"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
          </div>
          <div class="p-5 text-center">
            <h3 class="font-bold text-lg mb-1">Ikorodu</h3>
            <p class="text-xs text-[#d4af37]">Mainland East</p>
          </div>
        </div>

        <div class="location-card glass-panel rounded-2xl overflow-hidden group section-reveal"
          style="transition-delay: 0.3s" onclick="selectLocation(this)">
          <div class="relative h-40 overflow-hidden">
            <img src="assets/locations/badagry.jpg" alt="Badagry"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
          </div>
          <div class="p-5 text-center">
            <h3 class="font-bold text-lg mb-1">Badagry</h3>
            <p class="text-xs text-[#d4af37]">Western Border</p>
          </div>
        </div>

        <div class="location-card glass-panel rounded-2xl overflow-hidden group section-reveal"
          style="transition-delay: 0.4s" onclick="selectLocation(this)">
          <div class="relative h-40 overflow-hidden">
            <img src="assets/locations/epe.jpg" alt="Epe"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
          </div>
          <div class="p-5 text-center">
            <h3 class="font-bold text-lg mb-1">Epe</h3>
            <p class="text-xs text-[#d4af37]">Eastern Lagos</p>
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
</body>

</html>