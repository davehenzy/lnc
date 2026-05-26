<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FAQ | Lagos New Colossus</title>
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
    }

    .faq-item {
      background: linear-gradient(145deg,
          rgba(8, 59, 116, 0.35),
          rgba(10, 22, 40, 0.95));
      border: 1px solid rgba(8, 59, 116, 0.3);
      transition: all 0.4s ease;
      overflow: hidden;
    }

    .faq-item:hover {
      border-color: rgba(212, 175, 55, 0.25);
      background: linear-gradient(145deg,
          rgba(8, 59, 116, 0.5),
          rgba(10, 22, 40, 0.95));
    }

    .faq-item.active {
      border-color: rgba(212, 175, 55, 0.3);
      background: linear-gradient(145deg,
          rgba(8, 59, 116, 0.6),
          rgba(10, 22, 40, 0.95));
    }

    .faq-question {
      transition: color 0.3s ease;
    }

    .faq-item.active .faq-question {
      color: var(--gold);
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition:
        max-height 0.5s cubic-bezier(0.16, 1, 0.3, 1),
        opacity 0.4s ease,
        padding 0.4s ease;
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
    }

    .category-pill {
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .category-pill:hover,
    .category-pill.active {
      background: rgba(212, 175, 55, 0.15);
      border-color: var(--gold);
      color: var(--gold);
    }

    .search-glow:focus {
      box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
      border-color: var(--gold);
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
        <a href="faq.php" class="text-sm font-medium text-[#d4af37] transition-colors">FAQ</a>
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
        <a href="faq.php" class="text-2xl font-bold text-[#d4af37]">FAQ</a>
      </nav>

      <div class="mt-auto pt-8 border-t border-white/10">
        <a href="register.php" class="btn-gold w-full py-4 rounded-full text-center uppercase tracking-widest block">
          Register Now
        </a>
      </div>
    </div>
  </div>


  <!-- Hero Section -->
  <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-[112px] md:pt-[130px]">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a1628] via-[#0f1d32] to-[#0a1628]"></div>
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
      <div class="absolute top-20 left-10 w-96 h-96 bg-[#083B74]/20 rounded-full blur-[100px] animate-float"></div>
      <div
        class="absolute bottom-20 right-10 w-[500px] h-[500px] bg-[#083B74]/15 rounded-full blur-[120px] animate-float"
        style="animation-delay: 3s"></div>
    </div>
    <div
      class="absolute inset-0 bg-[linear-gradient(rgba(212,175,55,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(212,175,55,0.03)_1px,transparent_1px)] bg-[size:60px_60px]">
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
      <div class="mb-8 inline-flex items-center gap-3 px-5 py-2.5 rounded-full glass-panel">
        <span class="w-2 h-2 rounded-full bg-[#d4af37] animate-pulse"></span>
        <span class="text-xs font-semibold tracking-[0.2em] uppercase text-[#d4af37]">Get Answers</span>
      </div>

      <h1 class="font-display text-5xl md:text-7xl font-black leading-tight mb-8">
        <span class="block text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-400">Frequently
          Asked</span>
        <span class="block text-gold-gradient mt-2 italic">Questions</span>
      </h1>

      <p class="max-w-2xl mx-auto text-lg text-gray-400 mb-10">
        Everything you need to know about Lagos New Colossus. Can't find what
        you're looking for? Contact us directly.
      </p>

      <!-- Search -->
      <div class="max-w-xl mx-auto relative section-reveal">
        <input type="text" id="faqSearch" placeholder="Search questions..."
          class="w-full px-6 py-4 pl-14 rounded-full bg-[#0f1d32] border border-[#d4af37]/20 text-white placeholder-gray-500 focus:outline-none search-glow transition-all" />
        <i data-lucide="search" class="w-5 h-5 text-[#d4af37] absolute left-5 top-1/2 -translate-y-1/2"></i>
      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-[#0a1628] to-transparent"></div>
  </section>

  <!-- FAQ Content -->
  <section class="relative py-24 md:py-32">
    <div class="max-w-4xl mx-auto px-6">
      <!-- Categories -->
      <div class="flex flex-wrap justify-center gap-3 mb-12 section-reveal">
        <button class="category-pill active px-5 py-2 rounded-full border border-[#d4af37]/20 text-sm text-gray-400"
          onclick="filterCategory('all', this)">
          All Questions
        </button>
        <button class="category-pill px-5 py-2 rounded-full border border-[#d4af37]/20 text-sm text-gray-400"
          onclick="filterCategory('eligibility', this)">
          Eligibility
        </button>
        <button class="category-pill px-5 py-2 rounded-full border border-[#d4af37]/20 text-sm text-gray-400"
          onclick="filterCategory('process', this)">
          Process
        </button>
        <button class="category-pill px-5 py-2 rounded-full border border-[#d4af37]/20 text-sm text-gray-400"
          onclick="filterCategory('show', this)">
          The Show
        </button>
        <button class="category-pill px-5 py-2 rounded-full border border-[#d4af37]/20 text-sm text-gray-400"
          onclick="filterCategory('prizes', this)">
          Prizes & Support
        </button>
      </div>

      <div class="space-y-4" id="faqContainer">
        <!-- Eligibility Questions -->
        <div class="faq-item rounded-2xl section-reveal" data-category="eligibility">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">Who is eligible to participate?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              Participation is open to graduates and undergraduates who are
              residents of Lagos, between the ages of 20 and 40. You must have
              a commercially viable business idea and be willing to reside in
              the Colossus House for 8 weeks. Neither you nor immediate family
              members should be employees of Bravopoints International Ltd or
              show sponsors.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="eligibility">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">Do I need to have an existing business?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              No, you do not need to have an existing business. We accept both
              entrepreneurs with running businesses and those with viable
              business ideas. What matters is the innovation, commercial
              viability, scalability, and potential impact of your concept.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="eligibility">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">Can I apply if I am not a Lagos indigene but live in
              Lagos?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              Yes. The requirement is that you must be a Lagos-based
              entrepreneur with proof of residence in Lagos (via LASRRA or
              utility bill) and your business must be situated in Lagos. It is
              not restricted to Lagos indigenes alone.
            </div>
          </div>
        </div>

        <!-- Process Questions -->
        <div class="faq-item rounded-2xl section-reveal" data-category="process">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">What is the process to follow in order to
              participate?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              <strong class="text-white">Stage 1:</strong> Carefully read and
              confirm eligibility rules and requirements.<br /><br />
              <strong class="text-white">Stage 2:</strong> Review and accept
              the Acknowledgement of Terms and Conditions.<br /><br />
              <strong class="text-white">Stage 3:</strong> Complete the Lagos
              New Colossus Registration Form with accurate information,
              stating your business ideas and uploading a full picture.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="process">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">How do I audition for Lagos New Colossus?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              You can audition by choosing any of five audition centres across
              Lagos:
              <ul class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <li class="flex items-center gap-4 p-3 rounded-xl bg-white/5 border border-white/10">
                  <img src="assets/locations/lagos-island.webp" alt="Lagos Island"
                    class="w-12 h-12 rounded-lg object-cover" />
                  <div>
                    <span class="block font-semibold text-white">Lagos Island</span>
                    <span class="text-xs text-gray-500">Central Business District</span>
                  </div>
                </li>
                <li class="flex items-center gap-4 p-3 rounded-xl bg-white/5 border border-white/10">
                  <img src="assets/locations/ikeja.jpg" alt="Ikeja" class="w-12 h-12 rounded-lg object-cover" />
                  <div>
                    <span class="block font-semibold text-white">Ikeja</span>
                    <span class="text-xs text-gray-500">State Capital</span>
                  </div>
                </li>
                <li class="flex items-center gap-4 p-3 rounded-xl bg-white/5 border border-white/10">
                  <img src="assets/locations/ikorodu.jpg" alt="Ikorodu" class="w-12 h-12 rounded-lg object-cover" />
                  <div>
                    <span class="block font-semibold text-white">Ikorodu</span>
                    <span class="text-xs text-gray-500">Mainland East</span>
                  </div>
                </li>
                <li class="flex items-center gap-4 p-3 rounded-xl bg-white/5 border border-white/10">
                  <img src="assets/locations/badagry.jpg" alt="Badagry" class="w-12 h-12 rounded-lg object-cover" />
                  <div>
                    <span class="block font-semibold text-white">Badagry</span>
                    <span class="text-xs text-gray-500">Western Border</span>
                  </div>
                </li>
                <li class="flex items-center gap-4 p-3 rounded-xl bg-white/5 border border-white/10">
                  <img src="assets/locations/epe.jpg" alt="Epe" class="w-12 h-12 rounded-lg object-cover" />
                  <div>
                    <span class="block font-semibold text-white">Epe</span>
                    <span class="text-xs text-gray-500">Eastern Lagos</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="process">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">What is the selection process?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              <strong class="text-white">Registration Stage:</strong>
              Applicants fill out the registration form with business ideas
              and upload a full picture.<br /><br />
              <strong class="text-white">Audition Stage:</strong> Selected
              applicants pitch before judges at their chosen centre.<br /><br />
              <strong class="text-white">Bootcamp Stage:</strong> Successful
              candidates undergo 3-day training, evaluation, and testing.<br /><br />
              <strong class="text-white">Top 20:</strong> At the end of
              bootcamp, the top 20 are unveiled at a Premiere Evening and
              advance to the Colossus House.
            </div>
          </div>
        </div>

        <!-- Show Questions -->
        <div class="faq-item rounded-2xl section-reveal" data-category="show">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">What happens during the 8-week show?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              Contestants face real business challenges focused on branding,
              sales, marketing, pitching, teamwork, and business growth. Each
              week includes tasks, expert mentorship, weekly treats, and
              eliminations aired on national TV. Performance is tested based
              on execution, strategy, and resilience.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="show">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">Where will the show be aired?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              The 8-week main show will be aired across major TV networks in
              Nigeria, reaching millions of viewers. The Grand Finale is a
              live show event with VIPs, celebrities, and industry figures in
              attendance.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="show">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">Can I leave the Colossus House during the 8
              weeks?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              Contestants must reside in the Colossus House for the full
              8-week duration. Travel outside is only permitted for
              show-related tasks and with producer approval. You must cover
              your own travel expenses to and from the house.
            </div>
          </div>
        </div>

        <!-- Prizes Questions -->
        <div class="faq-item rounded-2xl section-reveal" data-category="prizes">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">Will the organizers take ownership of my
              business?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              <strong class="text-[#d4af37]">No.</strong> The producers of
              Lagos New Colossus will not take ownership, shares, or
              management control of any winning business. The entrepreneur
              retains full ownership and responsibility of his/her business
              after the show. Our goal is to empower, not to extract.
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="prizes">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">What prizes are available?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              <ul class="space-y-2">
                <li class="flex items-start gap-2">
                  <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                  <strong class="text-white">Grand Prize:</strong>
                  Life-changing cash award for the ultimate winner
                </li>
                <li class="flex items-start gap-2">
                  <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                  <strong class="text-white">20 Finalists:</strong> All
                  receive cash prizes and consolation awards
                </li>
                <li class="flex items-start gap-2">
                  <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                  <strong class="text-white">Top 100 Bootcamp:</strong> Cash
                  grants and recognition at the finale
                </li>
                <li class="flex items-start gap-2">
                  <i data-lucide="check-circle-2" class="w-5 h-5 text-[#d4af37] mt-0.5 flex-shrink-0"></i>
                  <strong class="text-white">All 120 Winners:</strong> 3-month
                  post-show mentorship (1:5 ratio)
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="faq-item rounded-2xl section-reveal" data-category="prizes">
          <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleFaq(this)">
            <span class="faq-question font-semibold text-lg pr-4">What happens after the show ends?</span>
            <div class="w-8 h-8 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0">
              <i data-lucide="plus" class="w-4 h-4 text-[#d4af37] faq-icon"></i>
            </div>
          </button>
          <div class="faq-answer px-6">
            <div class="pb-5 text-gray-400 leading-relaxed border-t border-[#d4af37]/10 pt-4">
              All 120 winners receive 3 months of post-show mentorship with
              industry titans at a ratio of 1 mentor to 5 entrepreneurs.
              Winners also gain access to the Bravopoints network, potential
              investor introductions, and continued business support to ensure
              sustainable growth.
            </div>
          </div>
        </div>
      </div>

      <!-- Still Have Questions -->

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
      .querySelectorAll(".section-reveal")
      .forEach((el) => observer.observe(el));

    function toggleFaq(button) {
      const item = button.parentElement;
      const answer = button.nextElementSibling;
      const isActive = item.classList.contains("active");

      // Close all others
      document.querySelectorAll(".faq-item.active").forEach((el) => {
        if (el !== item) {
          el.classList.remove("active");
          el.querySelector(".faq-answer").style.maxHeight = null;
          el.querySelector(".faq-answer").style.paddingTop = null;
        }
      });

      if (isActive) {
        item.classList.remove("active");
        answer.style.maxHeight = null;
        answer.style.paddingTop = null;
      } else {
        item.classList.add("active");
        answer.style.maxHeight = answer.scrollHeight + 40 + "px";
        answer.style.paddingTop = "1rem";
      }
    }

    function filterCategory(category, btn) {
      // Update active pill
      document
        .querySelectorAll(".category-pill")
        .forEach((p) => p.classList.remove("active"));
      btn.classList.add("active");

      // Filter items
      const items = document.querySelectorAll(".faq-item");
      items.forEach((item) => {
        if (category === "all" || item.dataset.category === category) {
          item.style.display = "block";
          setTimeout(() => (item.style.opacity = "1"), 10);
        } else {
          item.style.opacity = "0";
          setTimeout(() => (item.style.display = "none"), 300);
        }
      });
    }

    // Search functionality
    document
      .getElementById("faqSearch")
      .addEventListener("input", function (e) {
        const searchTerm = e.target.value.toLowerCase();
        const items = document.querySelectorAll(".faq-item");

        items.forEach((item) => {
          const question = item
            .querySelector(".faq-question")
            .textContent.toLowerCase();
          const answer = item
            .querySelector(".faq-answer")
            .textContent.toLowerCase();

          if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = "block";
            setTimeout(() => (item.style.opacity = "1"), 10);
          } else {
            item.style.opacity = "0";
            setTimeout(() => (item.style.display = "none"), 300);
          }
        });
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