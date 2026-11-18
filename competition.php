<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Competition | Colossus of Lagos - The Hustle. The Heat. The Rise.</title>
  <meta name="description" content="Discover the 4 stages of the Colossus of Lagos Competition: Business Pitches, Top 100 Bootcamp, Grand Finale, and ₦60,000,000 in prizes." />
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="shortcut icon" href="favicon.ico" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700;1,900&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
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

    .text-gold-gradient {
      background: linear-gradient(135deg, #fff 0%, var(--gold-light) 40%, var(--gold) 75%, var(--gold-dark) 100%);
      background-size: 200% auto;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .glass-panel {
      background: rgba(10, 22, 40, 0.75);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
    }

    .hover-lift {
      transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
    }
    .hover-lift:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.7);
    }

    .btn-gold {
      background: linear-gradient(135deg, #d4af37 0%, #f6e07a 50%, #b8941f 100%);
      color: #070f1f;
      font-weight: 700;
      transition: all 0.3s ease;
      box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3);
    }
    .btn-gold:hover {
      box-shadow: 0 6px 30px rgba(212, 175, 55, 0.5);
      transform: translateY(-2px);
    }
  </style>
</head>

<body class="antialiased">

  <!-- Include Shared Navigation Bar -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Page Hero Header -->
  <header class="relative pt-32 sm:pt-36 md:pt-44 pb-16 sm:pb-20 md:pb-24 overflow-hidden bg-gradient-to-b from-[#0a1628] via-[#070f1f] to-[#070f1f] border-b border-yellow-400/10">
    <div class="absolute inset-0 bg-radial from-yellow-400/5 via-transparent to-transparent pointer-events-none"></div>

    <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 text-xs font-bold uppercase tracking-widest mb-6">
        <span>The Arena of Enterprise</span>
      </div>

      <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black tracking-tight leading-[1.08] mb-6">
        The <span class="text-gold-gradient">Competition</span>
      </h1>

      <p class="text-base sm:text-lg md:text-xl text-gray-200 font-display italic mb-6 max-w-2xl mx-auto">
        "Where promising ideas take the spotlight and champions rise."
      </p>

      <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-8 max-w-3xl mx-auto">
        A structured, high-stakes competition platform designed to discover, challenge, and empower Lagos' most promising entrepreneurs. Selected participants progress through live auditions, an intensive Top 100 Bootcamp, and an exhilarating Grand Finale showdown for equity-free capital and state-backed recognition.
      </p>

      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="register.php" class="btn-gold px-8 py-3.5 rounded-full text-xs uppercase tracking-wider font-bold inline-flex items-center gap-2 shadow-xl">
          <span>Enter Competition</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <a href="festival.php" class="px-8 py-3.5 rounded-full text-xs uppercase tracking-wider font-bold border border-yellow-400/30 text-yellow-400 hover:bg-yellow-400/10 transition-colors inline-flex items-center gap-2">
          <span>Explore Festival</span>
          <i data-lucide="calendar" class="w-4 h-4"></i>
        </a>
      </div>
    </div>
  </header>

  <!-- Competition Stages Section -->
  <main class="py-20 md:py-28 bg-[#070f1f] relative">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Contests Showcase Banner -->
      <div class="mb-20 rounded-3xl overflow-hidden border border-yellow-400/30 shadow-2xl relative group max-w-5xl mx-auto">
        <div class="aspect-[16/8] sm:aspect-[21/9] w-full overflow-hidden bg-[#070f1f] relative">
          <img src="assets/sections/Contests.jpg" alt="Colossus of Lagos Contests & Competition" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" />
          <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f] via-[#070f1f]/40 to-transparent"></div>
          <div class="absolute bottom-6 left-6 right-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
              <span class="inline-block px-3 py-1 rounded-full bg-yellow-400/20 text-yellow-400 text-xs font-bold uppercase tracking-wider mb-2 border border-yellow-400/30">
                Official Arena
              </span>
              <h2 class="font-display text-xl sm:text-3xl font-bold text-white">The Competitive Arena of Enterprise</h2>
            </div>
            <a href="register.php" class="btn-gold px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-2 self-start sm:self-auto shadow-lg">
              <span>Register Now</span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- 4 Core Competition Stages Grid -->
      <div class="space-y-12">
        <!-- 1. Business Pitches -->
        <div id="pitches" class="scroll-mt-32 glass-panel p-6 sm:p-10 rounded-3xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift">
          <div class="grid lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7">
              <div class="flex items-center gap-3 mb-3">
                <span class="w-8 h-8 rounded-full bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-bold text-xs">01</span>
                <span class="text-xs uppercase tracking-widest text-yellow-400 font-bold">Stage One Contests</span>
              </div>
              <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">Business Pitches</h3>
              <p class="text-base sm:text-lg text-yellow-400 font-display italic mb-4">"Where promising ideas take the spotlight."</p>
              <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-6">
                Entrepreneurs present their business ideas and ventures before experienced judges and industry experts. Participants are assessed on innovation, market potential, business viability, scalability and impact, with outstanding candidates advancing to the Top 100 Bootcamp.
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex items-center gap-3">
                  <i data-lucide="mic" class="w-5 h-5 text-yellow-400 flex-shrink-0"></i>
                  <span class="text-xs text-gray-200 font-medium">Judges & Industry Panel Screening</span>
                </div>
                <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex items-center gap-3">
                  <i data-lucide="check-circle" class="w-5 h-5 text-yellow-400 flex-shrink-0"></i>
                  <span class="text-xs text-gray-200 font-medium">Assessed on Scalability & Viability</span>
                </div>
              </div>
            </div>
            <div class="lg:col-span-5">
              <div class="relative rounded-2xl overflow-hidden border border-yellow-400/20 shadow-xl group/img">
                <img src="assets/sections/Business Pitches.png" alt="Colossus of Lagos Business Pitches" class="w-full aspect-video sm:aspect-[16/10] lg:aspect-auto lg:h-[320px] object-cover group-hover/img:scale-105 transition-transform duration-700" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-gray-300 font-medium bg-black/60 backdrop-blur-md px-3 py-1.5 rounded-lg border border-white/10">
                  <span class="text-yellow-400 font-bold">Live Pitch Auditions</span>
                  <span>Lagos Hubs</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Top 100 Bootcamp -->
        <div id="bootcamp" class="scroll-mt-32 glass-panel p-6 sm:p-10 rounded-3xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift">
          <div class="grid lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-5 order-2 lg:order-1">
              <div class="relative rounded-2xl overflow-hidden border border-yellow-400/20 shadow-xl group/img">
                <img src="assets/sections/Top 100 Bootcamp.png" alt="Top 100 Bootcamp Masterclass" class="w-full aspect-video sm:aspect-[16/10] lg:aspect-auto lg:h-[320px] object-cover group-hover/img:scale-105 transition-transform duration-700" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-gray-300 font-medium bg-black/60 backdrop-blur-md px-3 py-1.5 rounded-lg border border-white/10">
                  <span class="text-yellow-400 font-bold">Intensive Masterclass</span>
                  <span>100 Founders</span>
                </div>
              </div>
            </div>
            <div class="lg:col-span-7 order-1 lg:order-2">
              <div class="flex items-center gap-3 mb-3">
                <span class="w-8 h-8 rounded-full bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-bold text-xs">02</span>
                <span class="text-xs uppercase tracking-widest text-yellow-400 font-bold">Development Programme</span>
              </div>
              <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">Top 100 Bootcamp</h3>
              <p class="text-base sm:text-lg text-yellow-400 font-display italic mb-4">"100 entrepreneurs. One transformative journey."</p>
              <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-6">
                An intensive development programme featuring business training, expert mentorship, masterclasses and practical business challenges. Participants strengthen their entrepreneurial capabilities, while 30 outstanding entrepreneurs gain opportunity to receive cash prizes.
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="p-4 rounded-xl bg-yellow-400/10 border border-yellow-400/30 flex items-center gap-3">
                  <i data-lucide="award" class="w-5 h-5 text-yellow-400 flex-shrink-0"></i>
                  <span class="text-xs text-yellow-300 font-bold">30 Winners × ₦1,000,000 Grants</span>
                </div>
                <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex items-center gap-3">
                  <i data-lucide="book-open" class="w-5 h-5 text-yellow-400 flex-shrink-0"></i>
                  <span class="text-xs text-gray-200 font-medium">Expert Mentorship & Training</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. Grand Finale -->
        <div id="finale" class="scroll-mt-32 glass-panel p-6 sm:p-10 rounded-3xl border border-white/5 hover:border-yellow-400/40 transition-all hover-lift">
          <div class="grid lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7">
              <div class="flex items-center gap-3 mb-3">
                <span class="w-8 h-8 rounded-full bg-yellow-400/10 border border-yellow-400/30 text-yellow-400 flex items-center justify-center font-bold text-xs">03</span>
                <span class="text-xs uppercase tracking-widest text-yellow-400 font-bold">The Ultimate Stage</span>
              </div>
              <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">Grand Finale</h3>
              <p class="text-base sm:text-lg text-yellow-400 font-display italic mb-4">"The ultimate stage for entrepreneurial excellence."</p>
              <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-6">
                The competition culminates in a spectacular event where five (5) finalists showcase their businesses before distinguished judges, and industry leaders. The overall winner is announced and awarded the grand prize.
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex items-center gap-3">
                  <i data-lucide="crown" class="w-5 h-5 text-yellow-400 flex-shrink-0"></i>
                  <span class="text-xs text-gray-200 font-medium">Five (5) Finalists Showdown</span>
                </div>
                <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex items-center gap-3">
                  <i data-lucide="tv" class="w-5 h-5 text-yellow-400 flex-shrink-0"></i>
                  <span class="text-xs text-gray-200 font-medium">Televised Grand Finale Event</span>
                </div>
              </div>
            </div>
            <div class="lg:col-span-5">
              <div class="relative rounded-2xl overflow-hidden border border-yellow-400/20 shadow-xl group/img">
                <img src="assets/sections/Grand Finale.jpg" alt="Colossus of Lagos Grand Finale Finalists" class="w-full aspect-video sm:aspect-[16/10] lg:aspect-auto lg:h-[320px] object-cover group-hover/img:scale-105 transition-transform duration-700" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-gray-300 font-medium bg-black/60 backdrop-blur-md px-3 py-1.5 rounded-lg border border-white/10">
                  <span class="text-yellow-400 font-bold">5 Finalists on Stage</span>
                  <span>Championship Night</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. Prizes -->
        <div id="prizes" class="scroll-mt-32 p-6 sm:p-10 rounded-3xl border-2 border-yellow-400 bg-gradient-to-br from-[#0a1b33] via-[#070f1f] to-[#0a1628] shadow-2xl shadow-yellow-400/10">
          <div class="grid lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-5 order-2 lg:order-1">
              <div class="relative rounded-2xl overflow-hidden border border-yellow-400/40 shadow-2xl group/img">
                <img src="assets/sections/Prizes.png" alt="₦30,000,000 Grand Prize Cheque Award" class="w-full aspect-video sm:aspect-[16/10] lg:aspect-auto lg:h-[320px] object-cover group-hover/img:scale-105 transition-transform duration-700" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-white font-medium bg-yellow-400/20 backdrop-blur-md px-3 py-1.5 rounded-lg border border-yellow-400/40">
                  <span class="text-yellow-300 font-bold">Grand Prize Award</span>
                  <span class="text-white font-bold">₦25,000,000</span>
                </div>
              </div>
            </div>
            <div class="lg:col-span-7 order-1 lg:order-2">
              <div class="flex items-center gap-3 mb-3">
                <span class="w-8 h-8 rounded-full bg-yellow-400 text-[#0a1628] flex items-center justify-center font-bold text-xs">04</span>
                <span class="text-xs uppercase tracking-widest text-yellow-400 font-bold">Reward & Capital</span>
              </div>
              <h3 class="font-display text-2xl sm:text-4xl font-bold text-white mb-2">Prizes</h3>
              <p class="text-base sm:text-lg text-yellow-400 font-display italic mb-4">"Rewarding ambition. Supporting business growth."</p>
              <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-6">
                With a ₦25 million grand prize for the overall champion and ₦1 million grant prizes each for 30 Bootcamp standout entrepreneurs, Colossus of Lagos recognizes entrepreneurial excellence and creates transformative opportunities for promising businesses.
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="p-5 rounded-2xl bg-yellow-400/10 border border-yellow-400/40 text-center flex flex-col justify-between">
                  <div>
                    <span class="text-[10px] font-bold text-yellow-400 uppercase tracking-widest block mb-1">Grand Champion</span>
                    <div class="font-display text-2xl sm:text-3xl font-extrabold text-yellow-400">₦25,000,000</div>
                  </div>
                  <span class="text-[11px] text-gray-300 font-light mt-2">Equity-free cash award for overall winner</span>
                </div>
                <div class="p-5 rounded-2xl bg-white/5 border border-white/10 text-center flex flex-col justify-between">
                  <div>
                    <span class="text-[10px] font-bold text-yellow-400 uppercase tracking-widest block mb-1">Bootcamp Grants</span>
                    <div class="font-display text-2xl sm:text-3xl font-extrabold text-white">30 × ₦1M</div>
                  </div>
                  <span class="text-[11px] text-gray-300 font-light mt-2">30 winners receive ₦1,000,000 each</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Cross-Link to Festival Banner -->
      <div class="mt-20 p-8 sm:p-12 rounded-3xl bg-gradient-to-br from-[#0a1628] to-[#070f1f] border border-yellow-400/30 flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
        <div class="max-w-xl text-center md:text-left">
          <span class="text-xs uppercase tracking-widest text-yellow-400 font-bold block mb-2">Complementary Experience</span>
          <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">Explore The Festival</h3>
          <p class="text-xs sm:text-sm text-gray-300 font-light leading-relaxed">
            Beyond the competition arena, experience the 1,000+ delegate Entrepreneurship Summit, exclusive Investors Evening, and cultural celebrations.
          </p>
        </div>
        <a href="festival.php" class="btn-gold px-8 py-3.5 rounded-full text-xs uppercase tracking-wider font-bold inline-flex items-center gap-2 whitespace-nowrap shadow-xl shrink-0">
          <span>Discover The Festival</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>

    </div>
  </main>

  <!-- Include Shared Footer -->
  <?php include 'includes/footer.php'; ?>

  <script>
    lucide.createIcons();
  </script>
</body>

</html>
