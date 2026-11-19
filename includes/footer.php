<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isHome = ($currentPage === 'index.php' || $currentPage === '');
$homePrefix = $isHome ? '' : 'index.php';
?>
<!-- Footer -->
<footer class="border-t border-[#d4af37]/10 py-16 bg-[#070f1f]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-4 gap-12 mb-12">
      <div class="md:col-span-2">
        <div class="flex items-center gap-3 mb-6">
          <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos" class="h-12 w-auto">
        </div>
        <p class="text-gray-500 text-sm max-w-sm leading-relaxed mb-6">
          An entrepreneurial Festival program in
          partnership with Lagos State Government to identify, support, and
          scale high-potential entrepreneurs driving jobs, innovation, and
          economic growth.
        </p>
        <div class="flex items-center gap-3">
          <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram"
            class="w-10 h-10 rounded-full bg-[#0a1628] border border-yellow-400/30 flex items-center justify-center text-gray-300 hover:text-yellow-400 hover:border-yellow-400 hover:bg-yellow-400/10 hover:scale-110 transition-all shadow-md">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
              <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
            </svg>
          </a>
          <a href="https://x.com" target="_blank" rel="noopener" aria-label="X (formerly Twitter)"
            class="w-10 h-10 rounded-full bg-[#0a1628] border border-yellow-400/30 flex items-center justify-center text-gray-300 hover:text-yellow-400 hover:border-yellow-400 hover:bg-yellow-400/10 hover:scale-110 transition-all shadow-md">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
              <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
            </svg>
          </a>
          <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook"
            class="w-10 h-10 rounded-full bg-[#0a1628] border border-yellow-400/30 flex items-center justify-center text-gray-300 hover:text-yellow-400 hover:border-yellow-400 hover:bg-yellow-400/10 hover:scale-110 transition-all shadow-md">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
            </svg>
          </a>
          <a href="https://youtube.com" target="_blank" rel="noopener" aria-label="YouTube"
            class="w-10 h-10 rounded-full bg-[#0a1628] border border-yellow-400/30 flex items-center justify-center text-gray-300 hover:text-yellow-400 hover:border-yellow-400 hover:bg-yellow-400/10 hover:scale-110 transition-all shadow-md">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/>
              <polygon points="10 15 15 12 10 9 10 15" fill="currentColor"/>
            </svg>
          </a>
        </div>
      </div>

      <div>
        <h4 class="font-semibold mb-6 text-[#d4af37] text-sm tracking-wider uppercase">
          Navigation
        </h4>
        <ul class="space-y-3 text-sm text-gray-400 font-light">
          <li><a href="index.php" class="hover:text-white transition-colors">Home</a></li>
          <li><a href="<?= $homePrefix ?>#about" class="hover:text-white transition-colors">About</a></li>
          <li><a href="competition.php" class="hover:text-white transition-colors">The Competition</a></li>
          <li><a href="festival.php" class="hover:text-white transition-colors">The Festival</a></li>
          <li><a href="<?= $homePrefix ?>#faq" class="hover:text-white transition-colors">FAQ</a></li>
          <li><a href="contact.php" class="hover:text-white transition-colors">Contact</a></li>
          <li><a href="terms.php" class="hover:text-white transition-colors">Terms & Conditions</a></li>
          <li><a href="privacy.php" class="hover:text-white transition-colors">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Newsletter Bulletin -->
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
      </div>

    </div>

    <div
      class="border-t border-[#d4af37]/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left text-xs text-gray-500 font-light">
      <p>© 2026 Colossus of Lagos. All rights reserved. <span class="hidden md:inline mx-1.5">•</span> <a href="terms.php" class="hover:text-yellow-400">Terms & Conditions</a> <span class="mx-1">•</span> <a href="privacy.php" class="hover:text-yellow-400">Privacy Policy</a></p>
      <p>
        Produced by Bravopoints International Limited <span class="hidden md:inline mx-2">|</span> Built by <a
          href="https://techiextract.com" target="_blank" rel="noopener"
          class="text-[#d4af37] hover:underline font-semibold">TechieXtract Limited</a>
      </p>
    </div>
  </div>
</footer>

<script>
  (function() {
    // Mobile Menu Logic
    const menuBtn = document.getElementById('menu-btn');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && closeMenu && mobileMenu) {
      // Remove any existing click handlers by replacing with fresh clone or clean listener
      menuBtn.onclick = function() {
        mobileMenu.classList.remove('translate-x-full');
      };

      closeMenu.onclick = function() {
        mobileMenu.classList.add('translate-x-full');
      };

      const mobileLinks = mobileMenu.querySelectorAll('a');
      mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
          mobileMenu.classList.add('translate-x-full');
        });
      });
    }

    // Navbar scroll effect
    const navbar = document.getElementById("navbar");
    if (navbar) {
      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          navbar.classList.add("nav-blur");
        } else {
          navbar.classList.remove("nav-blur");
        }
      });
    }

    // Newsletter Subscription AJAX
    const newsletterForm = document.getElementById('newsletterForm');
    const newsletterAlert = document.getElementById('newsletterAlert');
    if (newsletterForm && newsletterAlert && !newsletterForm.dataset.bound) {
      newsletterForm.dataset.bound = "true";
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

    // Initialize Lucide icons
    if (window.lucide && typeof lucide.createIcons === 'function') {
      lucide.createIcons();
    }
  })();
</script>
