<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Festival | Colossus of Lagos - The Hustle. The Heat. The Rise.</title>
  <meta name="description" content="Experience the Colossus of Lagos Festival: 1,000+ delegate Entrepreneurship Summit, executive Fireside Chats, exclusive Investors Evening, and cultural celebrations." />
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
        <span>The Annual Enterprise Gathering</span>
      </div>

      <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black tracking-tight leading-[1.08] mb-6">
        The <span class="text-gold-gradient">Festival</span>
      </h1>

      <p class="text-base sm:text-lg md:text-xl text-gray-200 font-display italic mb-6 max-w-2xl mx-auto">
        "A convergence of innovation, investment, executive insight, and vibrant culture."
      </p>

      <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-8 max-w-3xl mx-auto">
        Colossus of Lagos Festival brings together 1,000 entrepreneurs, ambitious entrepreneurs, venture capitalists, industry titans, and policymakers for meaningful conversations, valuable connections, high-stakes deal rooms, and unforgettable cultural celebrations.
      </p>

      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="register.php" class="btn-brand text-[#070f1f] px-8 py-3.5 rounded-full text-xs uppercase tracking-wider font-extrabold inline-flex items-center gap-2 shadow-xl">
          <span>Register as Delegate</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <a href="competition.php" class="px-8 py-3.5 rounded-full text-xs uppercase tracking-wider font-bold border border-yellow-400/30 text-yellow-400 hover:bg-yellow-400/10 transition-colors inline-flex items-center gap-2">
          <span>View Competition</span>
          <i data-lucide="trophy" class="w-4 h-4"></i>
        </a>
      </div>
    </div>
  </header>

  <!-- Festival Pillars Section -->
  <main class="py-20 md:py-28 bg-[#0a1628] relative">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Section Intro Header -->
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 mb-3">
          <div class="h-px w-10 bg-yellow-400"></div>
          <span class="text-yellow-400 text-xs font-semibold tracking-widest uppercase">The 4 Pillars</span>
          <div class="h-px w-10 bg-yellow-400"></div>
        </div>
        <h2 class="font-display text-3xl sm:text-5xl font-bold mb-6">
          Four Pillars of Impact &<span class="text-brand-gradient"> Inspiration</span>
        </h2>
        <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light">
          Each pillar of Colossus of Lagos Festival is crafted to equip, network, and elevate the entrepreneurial community across Africa's commercial capital.
        </p>
      </div>

      <!-- 4 Pillars Grid -->
      <div class="grid md:grid-cols-2 gap-8">
        <!-- 1. Entrepreneurship Summit -->
        <div id="summit" class="scroll-mt-32 p-6 sm:p-8 rounded-3xl bg-[#070f1f]/80 border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col justify-between group">
          <div>
            <div class="relative rounded-2xl overflow-hidden mb-6 aspect-video border border-yellow-400/20 shadow-lg">
              <img src="assets/sections/Entrepreneurship Summit.png" alt="Entrepreneurship Summit Panel" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
              <div class="absolute top-3 right-3">
                <span class="text-[10px] font-bold text-yellow-400 uppercase tracking-widest bg-[#070f1f]/80 backdrop-blur-md px-3 py-1 rounded-full border border-yellow-400/30">1,000 entrepreneurs</span>
              </div>
            </div>
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center text-yellow-400">
                <i data-lucide="users" class="w-5 h-5"></i>
              </div>
              <h3 class="font-display text-2xl font-bold text-white">Entrepreneurship Summit</h3>
            </div>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-4">
              A gathering of 1,000 entrepreneurs, industry leaders, investors and policymakers for thought-provoking discussions, keynote presentations and panel sessions on entrepreneurship, innovation, investment and enterprise development.
            </p>
          </div>
          <div class="pt-5 mt-4 border-t border-white/5 flex items-center gap-2 text-xs text-yellow-400 font-semibold">
            <i data-lucide="sparkles" class="w-4 h-4"></i>
            <span>Keynotes • Panels • Enterprise Policy</span>
          </div>
        </div>

        <!-- 2. Fireside Chats -->
        <div id="fireside" class="scroll-mt-32 p-6 sm:p-8 rounded-3xl bg-[#070f1f]/80 border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col justify-between group">
          <div>
            <div class="relative rounded-2xl overflow-hidden mb-6 aspect-video border border-yellow-400/20 shadow-lg">
              <img src="assets/sections/Fireside Chats.png" alt="Fireside Chats and Networking" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
              <div class="absolute top-3 right-3">
                <span class="text-[10px] font-bold text-yellow-400 uppercase tracking-widest bg-[#070f1f]/80 backdrop-blur-md px-3 py-1 rounded-full border border-yellow-400/30">Real Experiences</span>
              </div>
            </div>
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center text-yellow-400">
                <i data-lucide="message-square" class="w-5 h-5"></i>
              </div>
              <h3 class="font-display text-2xl font-bold text-white">Fireside Chats</h3>
            </div>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-4">
              Candid and engaging conversations with accomplished entrepreneurs, business leaders and industry experts, sharing real-life experiences, business lessons and insights on building and scaling successful enterprises.
            </p>
          </div>
          <div class="pt-5 mt-4 border-t border-white/5 flex items-center gap-2 text-xs text-yellow-400 font-semibold">
            <i data-lucide="sparkles" class="w-4 h-4"></i>
            <span>Executive Insights • Founder Lessons</span>
          </div>
        </div>

        <!-- 3. Investors Evening -->
        <div id="investors" class="scroll-mt-32 p-6 sm:p-8 rounded-3xl bg-[#070f1f]/80 border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col justify-between group">
          <div>
            <div class="relative rounded-2xl overflow-hidden mb-6 aspect-video border border-yellow-400/20 shadow-lg">
              <img src="assets/sections/Investors Evening.png" alt="Investors Evening Engagement" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
              <div class="absolute top-3 right-3">
                <span class="text-[10px] font-bold text-yellow-400 uppercase tracking-widest bg-[#070f1f]/80 backdrop-blur-md px-3 py-1 rounded-full border border-yellow-400/30">20 Selected Participants</span>
              </div>
            </div>
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center text-yellow-400">
                <i data-lucide="briefcase" class="w-5 h-5"></i>
              </div>
              <h3 class="font-display text-2xl font-bold text-white">Investors Evening</h3>
            </div>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-4">
              An exclusive networking and investment engagement connecting 20 participants with investors, financial institutions and strategic stakeholders to explore funding, partnerships and business growth opportunities.
            </p>
          </div>
          <div class="pt-5 mt-4 border-t border-white/5 flex items-center gap-2 text-xs text-yellow-400 font-semibold">
            <i data-lucide="sparkles" class="w-4 h-4"></i>
            <span>Closed-Door Deal Room • Direct Funding</span>
          </div>
        </div>

        <!-- 4. Entertainment and Cultural Celebration -->
        <div id="celebration" class="scroll-mt-32 p-6 sm:p-8 rounded-3xl bg-[#070f1f]/80 border border-white/5 hover:border-yellow-400/40 transition-all hover-lift flex flex-col justify-between group">
          <div>
            <div class="grid grid-cols-2 gap-3 mb-6">
              <div class="relative rounded-2xl overflow-hidden aspect-video border border-yellow-400/20 shadow-lg">
                <img src="assets/sections/Entertainment and cultural celebration1.png" alt="Live Music and Entertainment" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
                <span class="absolute bottom-2 left-2 text-[10px] font-bold text-yellow-300 bg-black/60 backdrop-blur-sm px-2 py-0.5 rounded-md border border-white/10">Live Music</span>
              </div>
              <div class="relative rounded-2xl overflow-hidden aspect-video border border-yellow-400/20 shadow-lg">
                <img src="assets/sections/Entertainment and cultural celebration2.png" alt="Cultural Dance Celebration" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#070f1f]/80 via-transparent to-transparent pointer-events-none"></div>
                <span class="absolute bottom-2 left-2 text-[10px] font-bold text-yellow-300 bg-black/60 backdrop-blur-sm px-2 py-0.5 rounded-md border border-white/10">Cultural Heritage</span>
              </div>
            </div>
            <div class="flex items-center gap-3 mb-3">
              <div class="w-10 h-10 rounded-xl bg-yellow-400/10 border border-yellow-400/30 flex items-center justify-center text-yellow-400">
                <i data-lucide="music" class="w-5 h-5"></i>
              </div>
              <h3 class="font-display text-2xl font-bold text-white">Entertainment & Cultural Celebration</h3>
            </div>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-light mb-4">
              A vibrant showcase of music, entertainment, creative talent and cultural expression, celebrating the diversity, creativity and unmistakable spirit of entrepreneurial Lagos.
            </p>
          </div>
          <div class="pt-5 mt-4 border-t border-white/5 flex items-center gap-2 text-xs text-yellow-400 font-semibold">
            <i data-lucide="sparkles" class="w-4 h-4"></i>
            <span>Live Music • Creative Arts • Lagos Energy</span>
          </div>
        </div>
      </div>

      <!-- Cross-Link to Competition Banner -->
      <div class="mt-20 p-8 sm:p-12 rounded-3xl bg-gradient-to-br from-[#070f1f] to-[#0a1628] border border-yellow-400/30 flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
        <div class="max-w-xl text-center md:text-left">
          <span class="text-xs uppercase tracking-widest text-yellow-400 font-bold block mb-2">The Competitive Arena</span>
          <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">Explore The Competition</h3>
          <p class="text-xs sm:text-sm text-gray-300 font-light leading-relaxed">
            Interested in the competitive side? Learn about the Business Pitches, Top 100 Bootcamp, Grand Finale, and ₦60,000,000 in prizes and seed grants.
          </p>
        </div>
        <a href="competition.php" class="btn-gold px-8 py-3.5 rounded-full text-xs uppercase tracking-wider font-bold inline-flex items-center gap-2 whitespace-nowrap shadow-xl shrink-0">
          <span>Discover The Competition</span>
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
