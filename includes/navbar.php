<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isHome = ($currentPage === 'index.php' || $currentPage === '');
$homePrefix = $isHome ? '' : 'index.php';
?>
<!-- Shared Header Styles -->
<style>
  .nav-blur {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
  }

  /* Multi-Color Brand Spectrum Text Gradient (Hex: #ff174f #f4cc12 #00c99a #ff8a00 #ad55d6 #008df0) */
  .text-brand-gradient {
    background: linear-gradient(135deg, #ff174f 0%, #f4cc12 20%, #00c99a 40%, #ff8a00 60%, #ad55d6 80%, #008df0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
  }

  .text-brand-gradient-h {
    background: linear-gradient(to right, #ff174f 0%, #f4cc12 20%, #00c99a 40%, #ff8a00 60%, #ad55d6 80%, #008df0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
  }

  .text-spectrum-gradient {
    background: linear-gradient(135deg, #ff174f 0%, #ff8a00 20%, #f4cc12 40%, #00c99a 60%, #008df0 80%, #ad55d6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
  }

  .text-spectrum-gradient-h {
    background: linear-gradient(to right, #ff174f 0%, #ff8a00 20%, #f4cc12 40%, #00c99a 60%, #008df0 80%, #ad55d6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
  }

  .bg-brand-gradient {
    background: linear-gradient(135deg, #ff174f 0%, #f4cc12 20%, #00c99a 40%, #ff8a00 60%, #ad55d6 80%, #008df0 100%);
  }

  .bg-spectrum-gradient {
    background: linear-gradient(135deg, #ff174f 0%, #ff8a00 20%, #f4cc12 40%, #00c99a 60%, #008df0 80%, #ad55d6 100%);
  }

  /* Brand Spectrum Register Button (Hex: #ff174f #f4cc12 #00c99a #ff8a00 #ad55d6 #008df0 with Navy Blue text) */
  .btn-brand,
  .btn-register,
  a.btn-gold[href*="register.php"],
  a.btn-brand[href*="register.php"] {
    background: linear-gradient(135deg, #ff174f 0%, #f4cc12 20%, #00c99a 40%, #ff8a00 60%, #ad55d6 80%, #008df0 100%) !important;
    color: #070f1f !important;
    font-weight: 800 !important;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    box-shadow: 0 4px 20px rgba(255, 23, 79, 0.3), 0 2px 10px rgba(0, 201, 154, 0.25) !important;
    text-shadow: none !important;
  }

  .btn-brand *,
  .btn-register *,
  a.btn-gold[href*="register.php"] *,
  a.btn-brand[href*="register.php"] * {
    color: #070f1f !important;
    font-weight: 800 !important;
  }

  .btn-brand:hover,
  .btn-register:hover,
  a.btn-gold[href*="register.php"]:hover,
  a.btn-brand[href*="register.php"]:hover {
    transform: translateY(-2px) scale(1.02) !important;
    box-shadow: 0 8px 30px rgba(255, 23, 79, 0.5), 0 0 25px rgba(244, 204, 18, 0.45) !important;
    color: #070f1f !important;
  }
</style>

<!-- Navigation -->
<nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-2 sm:py-2.5 md:py-3 bg-[#0a1628] border-b border-white/5">
  <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
    <a href="index.php" class="flex items-center py-1">
      <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo"
        class="h-12 sm:h-16 md:h-20 lg:h-24 w-auto object-contain transition-all duration-300 drop-shadow-md" />
    </a>

    <!-- Desktop Navigation Menu -->
    <div class="hidden lg:flex items-center gap-7">
      <a href="<?= $homePrefix ?>#about" class="text-xs font-semibold text-gray-300 hover:text-yellow-400 transition-colors">About</a>

      <!-- Competition Dropdown -->
      <div class="relative group">
        <a href="competition.php" class="flex items-center gap-1.5 text-xs font-semibold text-gray-300 hover:text-yellow-400 py-2 transition-colors">
          <span>Competition</span>
          <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform group-hover:rotate-180 text-yellow-400"></i>
        </a>
        <div class="absolute top-full left-0 mt-1 w-56 rounded-2xl bg-[#070f1f]/95 border border-yellow-400/20 backdrop-blur-xl p-2 shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
          <a href="competition.php#pitches" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="mic" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Business Pitches</span>
          </a>
          <a href="competition.php#bootcamp" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="flame" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Top 100 Bootcamp</span>
          </a>
          <a href="competition.php#finale" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="crown" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Grand Finale</span>
          </a>
          <a href="competition.php#prizes" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="award" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Prizes (₦60M)</span>
          </a>
        </div>
      </div>

      <!-- Festival Dropdown -->
      <div class="relative group">
        <a href="festival.php" class="flex items-center gap-1.5 text-xs font-semibold text-gray-300 hover:text-yellow-400 py-2 transition-colors">
          <span>Festival</span>
          <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform group-hover:rotate-180 text-yellow-400"></i>
        </a>
        <div class="absolute top-full left-0 mt-1 w-64 rounded-2xl bg-[#070f1f]/95 border border-yellow-400/20 backdrop-blur-xl p-2 shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
          <a href="festival.php#summit" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="users" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Entrepreneurship Summit</span>
          </a>
          <a href="festival.php#fireside" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="message-square" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Fireside Chats</span>
          </a>
          <a href="festival.php#investors" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="briefcase" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Investors Evening</span>
          </a>
          <a href="festival.php#celebration" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-xs font-medium text-gray-300 hover:text-yellow-400 hover:bg-white/5 transition-colors">
            <i data-lucide="music" class="w-3.5 h-3.5 text-yellow-400"></i>
            <span>Entertainment & Celebration</span>
          </a>
        </div>
      </div>

      <a href="<?= $homePrefix ?>#faq" class="text-xs font-medium text-gray-300 hover:text-yellow-400 transition-colors">FAQs</a>
      <a href="<?= $homePrefix ?>#lasg" class="text-xs font-medium text-gray-300 hover:text-yellow-400 transition-colors flex items-center gap-1.5">
        <span>LASG</span>
        <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
      </a>
    </div>

    <div class="flex items-center gap-4">
      <a href="register.php"
        class="hidden sm:inline-flex btn-brand text-[#070f1f] px-6 py-2.5 rounded-full text-xs uppercase tracking-wider items-center gap-1.5 font-extrabold shadow-lg">
        <span>Register Now</span>
        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
      </a>
      <button id="menu-btn"
        class="lg:hidden w-10 h-10 flex items-center justify-center text-gray-300 hover:text-yellow-400 transition-colors" aria-label="Toggle Navigation Menu">
        <i data-lucide="menu" class="w-6 h-6"></i>
      </button>
    </div>
  </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu"
  class="fixed inset-0 z-[60] bg-[#0a1628]/98 backdrop-blur-xl translate-x-full transition-transform duration-500 lg:hidden">
  <div class="flex flex-col h-full p-6 sm:p-8 overflow-y-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/10">
      <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" class="h-11 sm:h-14 w-auto object-contain" />
      <button id="close-menu" class="text-gray-400 hover:text-white" aria-label="Close Navigation Menu">
        <i data-lucide="x" class="w-7 h-7"></i>
      </button>
    </div>

    <nav class="flex flex-col gap-4 text-base font-semibold">
      <a href="<?= $homePrefix ?>#about" class="text-gray-200 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">About</a>

      <!-- Competition Links Group -->
      <div class="py-2 border-t border-b border-white/5 space-y-2">
        <a href="competition.php" class="text-[11px] font-bold text-yellow-400 uppercase tracking-widest flex items-center justify-between" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">
          <span>The Competition</span>
          <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
        </a>
        <div class="grid grid-cols-2 gap-2 pl-2">
          <a href="competition.php#pitches" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Business Pitches</a>
          <a href="competition.php#bootcamp" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Top 100 Bootcamp</a>
          <a href="competition.php#finale" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Grand Finale</a>
          <a href="competition.php#prizes" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Prizes (₦60M)</a>
        </div>
      </div>

      <!-- Festival Links Group -->
      <div class="py-2 border-b border-white/5 space-y-2">
        <a href="festival.php" class="text-[11px] font-bold text-yellow-400 uppercase tracking-widest flex items-center justify-between" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">
          <span>The Festival</span>
          <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
        </a>
        <div class="grid grid-cols-1 gap-2 pl-2">
          <a href="festival.php#summit" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Entrepreneurship Summit (1,000 Delegates)</a>
          <a href="festival.php#fireside" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Fireside Chats</a>
          <a href="festival.php#investors" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Investors Evening (20 Founders)</a>
          <a href="festival.php#celebration" class="text-xs text-gray-300 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">• Entertainment & Cultural Celebration</a>
        </div>
      </div>

      <a href="<?= $homePrefix ?>#faq" class="text-gray-200 hover:text-yellow-400 py-1" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">FAQs</a>
      <a href="<?= $homePrefix ?>#lasg" class="text-gray-200 hover:text-yellow-400 py-1 flex items-center gap-2" onclick="document.getElementById('mobile-menu').classList.add('translate-x-full')">
        <span>Lagos State Government (LASG)</span>
        <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
      </a>
    </nav>

    <div class="mt-auto pt-6 border-t border-white/10">
      <a href="register.php" class="btn-brand text-[#070f1f] w-full py-3.5 rounded-full text-center uppercase tracking-wider font-extrabold block text-sm shadow-xl">
        Register Now
      </a>
    </div>
  </div>
</div>
