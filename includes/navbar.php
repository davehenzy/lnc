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
</style>

<!-- Navigation -->
<nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-3.5 sm:py-5 md:py-6 bg-[#0a1628] border-b border-white/5">
  <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
    <a href="index.php" class="flex items-center">
      <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo"
        class="h-9 sm:h-12 md:h-16 w-auto object-contain" />
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
        class="hidden sm:inline-flex btn-gold px-6 py-2.5 rounded-full text-xs uppercase tracking-wider items-center gap-1.5 font-bold">
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
      <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" class="h-8 w-auto" />
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
      <a href="register.php" class="btn-gold w-full py-3.5 rounded-full text-center uppercase tracking-wider font-bold block text-sm">
        Register Now
      </a>
    </div>
  </div>
</div>
