<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us | Colossus of Lagos - Official TV Show Platform</title>
  <meta name="description" content="Get in touch with the Colossus of Lagos team. Sponsorship, partnership, and participant enquiries." />
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/lucide@0.262.0"></script>
  <style>
    :root {
      --navy: #070f1f;
      --navy-card: #0a1628;
      --royal-blue: #083B74;
      --gold: #d4af37;
      --gold-light: #f6e07a;
      --gold-dark: #b8941f;
    }

    body {
      font-family: "Inter", sans-serif;
      background-color: var(--navy);
      color: #f1f5f9;
      overflow-x: hidden;
    }

    .font-display {
      font-family: "Playfair Display", serif;
    }

    .text-gold-gradient {
      background: linear-gradient(135deg, #fff 0%, var(--gold-light) 40%, var(--gold) 75%, var(--gold-dark) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .glass-card {
      background: linear-gradient(145deg, rgba(15, 29, 50, 0.75), rgba(10, 22, 40, 0.85));
      backdrop-filter: blur(20px);
      border: 1px solid rgba(212, 175, 55, 0.16);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);
    }

    .btn-gold {
      background: linear-gradient(135deg, var(--gold-light), var(--gold), var(--gold-dark));
      color: #070f1f;
      font-weight: 800;
      transition: all 0.3s ease;
    }

    .btn-gold:hover {
      transform: scale(1.03);
      box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
    }

    .form-input {
      background: rgba(10, 22, 40, 0.7);
      border: 1px solid rgba(212, 175, 55, 0.2);
      color: #fff;
      transition: all 0.3s ease;
    }

    .form-input:focus {
      outline: none;
      border-color: var(--gold);
      box-shadow: 0 0 15px rgba(212, 175, 55, 0.25);
    }
  </style>
</head>

<body class="antialiased text-slate-100 bg-[#070f1f] overflow-x-hidden">

  <!-- Navbar -->
  <nav id="navbar" class="fixed w-full z-50 py-4 bg-[#070f1f]/90 backdrop-blur-md border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
      <a href="index.php" class="flex items-center gap-3">
        <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos Logo" class="h-10 md:h-14 w-auto object-contain" />
      </a>

      <div class="hidden md:flex items-center gap-8">
        <a href="index.php" class="text-sm font-medium text-slate-300 hover:text-[#d4af37] transition-colors">Home</a>
        <a href="about.php" class="text-sm font-medium text-slate-300 hover:text-[#d4af37] transition-colors">About</a>
        <a href="eligibility.php" class="text-sm font-medium text-slate-300 hover:text-[#d4af37] transition-colors">Eligibility</a>
        <a href="faq.php" class="text-sm font-medium text-slate-300 hover:text-[#d4af37] transition-colors">FAQ</a>
      </div>

      <div class="flex items-center gap-4">
        <a href="register.php" class="hidden sm:inline-flex btn-gold px-6 py-2 rounded-full text-xs uppercase tracking-wider items-center gap-2">
          <span>Register</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
        <button id="menu-btn" class="md:hidden text-slate-200">
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
        <a href="index.php" class="text-slate-300">Home</a>
        <a href="about.php" class="text-slate-300">About</a>
        <a href="eligibility.php" class="text-slate-300">Eligibility</a>
        <a href="faq.php" class="text-slate-300">FAQ</a>
      </nav>
      <div class="mt-auto pt-8 border-t border-white/10">
        <a href="register.php" class="btn-gold w-full py-4 rounded-full text-center uppercase tracking-widest block font-bold">
          Register Now
        </a>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="relative pt-36 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-[#083B74]/20 via-transparent to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass-card border border-[#d4af37]/30 text-xs text-[#f6e07a] uppercase tracking-wider mb-4">
        <span>Get In Touch</span>
      </div>
      <h1 class="font-display text-4xl sm:text-6xl font-black mb-4">
        Contact & <span class="text-gold-gradient">Enquiries Desk</span>
      </h1>
      <p class="max-w-2xl mx-auto text-slate-300 text-sm sm:text-base font-light leading-relaxed">
        Have questions regarding the application process, auditions, sponsorship, or media partnerships? Our coordination desk is at your service.
      </p>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-6 pb-28">
    <div class="grid lg:grid-cols-12 gap-12">
      
      <!-- Contact Information Cards -->
      <div class="lg:col-span-5 space-y-6">
        
        <div class="glass-card rounded-3xl p-8 border border-[#d4af37]/30">
          <h3 class="font-display font-bold text-2xl text-white mb-6">Lagos Secretariat & Production HQ</h3>
          
          <div class="space-y-6">
            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-2xl bg-[#083B74]/50 border border-[#d4af37]/30 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
                <i data-lucide="map-pin" class="w-6 h-6"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm">Official Secretariats</h4>
                <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                  Ministry of Wealth Creation and Employment,<br>
                  Block 6, The Secretariat, Alausa, Ikeja, Lagos State.
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-2xl bg-[#083B74]/50 border border-[#d4af37]/30 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
                <i data-lucide="clapperboard" class="w-6 h-6"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm">Production & Studios</h4>
                <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                  Bravopoints International Limited,<br>
                  Lagos, Nigeria.
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-2xl bg-[#083B74]/50 border border-[#d4af37]/30 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
                <i data-lucide="mail" class="w-6 h-6"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm">Email Support</h4>
                <p class="text-xs text-slate-300 mt-1">
                  <a href="mailto:info@thenexttitan.com" class="hover:text-[#d4af37] transition-colors">info@thenexttitan.com</a>
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-2xl bg-[#083B74]/50 border border-[#d4af37]/30 flex items-center justify-center text-[#f6e07a] flex-shrink-0">
                <i data-lucide="message-circle" class="w-6 h-6"></i>
              </div>
              <div>
                <h4 class="font-bold text-white text-sm">WhatsApp Fast Desk</h4>
                <p class="text-xs text-slate-300 mt-1 mb-2">Instant messaging support for applicants:</p>
                <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-xs font-bold text-[#22c55e] hover:underline">
                  <i data-lucide="message-square" class="w-4 h-4"></i>
                  <span>Chat with Official Desk on WhatsApp</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="glass-card rounded-3xl p-6 border border-white/10">
          <h4 class="font-bold text-white text-sm mb-2">Audition Venues Note</h4>
          <p class="text-xs text-slate-300 leading-relaxed font-light">
            Physical auditions take place in 5 designated zones: <strong>Ikeja, Badagry, Ikorodu, Lagos Island, and Epe</strong>. Verified applicants will receive precise time slots and venue passes via their registered email.
          </p>
        </div>

      </div>

      <!-- Contact Enquiry Form -->
      <div class="lg:col-span-7">
        <div class="glass-card rounded-3xl p-8 md:p-10 border border-[#d4af37]/30 relative">
          <h3 class="font-display font-bold text-2xl text-white mb-2">Send an Official Message</h3>
          <p class="text-xs text-slate-400 mb-8 font-light">Fill out the form below. Enquiries are routed directly to the project directorate.</p>

          <form id="enquiryForm" class="space-y-6">
            <div id="formAlert" class="hidden p-4 rounded-xl text-xs font-semibold"></div>

            <div class="grid sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-xs uppercase tracking-wider text-slate-300 font-semibold mb-2">Full Name *</label>
                <input type="text" name="full_name" required placeholder="e.g. Babatunde Adeleke" class="form-input w-full px-4 py-3 rounded-xl text-sm" />
              </div>
              <div>
                <label class="block text-xs uppercase tracking-wider text-slate-300 font-semibold mb-2">Email Address *</label>
                <input type="email" name="email" required placeholder="e.g. you@example.com" class="form-input w-full px-4 py-3 rounded-xl text-sm" />
              </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-xs uppercase tracking-wider text-slate-300 font-semibold mb-2">Phone Number</label>
                <input type="tel" name="phone" placeholder="e.g. 08012345678" class="form-input w-full px-4 py-3 rounded-xl text-sm" />
              </div>
              <div>
                <label class="block text-xs uppercase tracking-wider text-slate-300 font-semibold mb-2">Enquiry Category *</label>
                <select name="subject" class="form-input w-full px-4 py-3 rounded-xl text-sm bg-[#0a1628]">
                  <option value="Audition & Registration Question">Audition & Registration Question</option>
                  <option value="Sponsorship & Partnership Opportunity">Sponsorship & Partnership Opportunity</option>
                  <option value="Media & Press Relations">Media & Press Relations</option>
                  <option value="Investor Engagement Desk">Investor Engagement Desk</option>
                  <option value="General Enquiry">General Enquiry</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-xs uppercase tracking-wider text-slate-300 font-semibold mb-2">Your Message *</label>
              <textarea name="message" rows="5" required placeholder="Type your inquiry or proposal details here..." class="form-input w-full px-4 py-3 rounded-xl text-sm leading-relaxed"></textarea>
            </div>

            <button type="submit" id="submitBtn" class="btn-gold w-full py-4 rounded-xl text-xs uppercase tracking-widest font-black flex items-center justify-center gap-2">
              <span>Transmit Message</span>
              <i data-lucide="send" class="w-4 h-4"></i>
            </button>
          </form>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="border-t border-white/10 py-14 bg-[#050b17]">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-4 gap-10 mb-10">
        <div class="md:col-span-2">
          <img src="assets/logos/new/col-logo.png" alt="Colossus of Lagos" class="h-12 w-auto mb-4" />
          <p class="text-slate-400 text-sm max-w-sm leading-relaxed mb-6 font-light">
            Colossus of Lagos is an annual entrepreneurship competition and festival produced by Bravopoints International in official partnership with Lagos State Government.
          </p>
        </div>
        <div>
          <h4 class="font-bold mb-4 text-[#d4af37] text-xs tracking-wider uppercase">Navigation</h4>
          <ul class="space-y-2 text-sm text-slate-400 font-light">
            <li><a href="index.php" class="hover:text-white">Home</a></li>
            <li><a href="about.php" class="hover:text-white">About</a></li>
            <li><a href="judges.php" class="hover:text-white">The Council</a></li>
            <li><a href="eligibility.php" class="hover:text-white">Eligibility</a></li>
            <li><a href="faq.php" class="hover:text-white">FAQ</a></li>
            <li><a href="contact.php" class="hover:text-white">Contact</a></li>
          </ul>
        </div>
        <div>
          <h4 class="font-bold mb-3 text-[#d4af37] text-xs tracking-wider uppercase">Official Partner</h4>
          <p class="text-xs text-slate-400 leading-relaxed font-light mb-4">
            Lagos State Government<br>Ministry of Wealth Creation & Employment
          </p>
          <h4 class="font-bold mb-2 text-[#d4af37] text-xs tracking-wider uppercase">Web Platform</h4>
          <p class="text-xs text-slate-400 leading-relaxed font-light">
            Engineered by <a href="https://techiextract.com" target="_blank" rel="noopener" class="text-[#d4af37] hover:underline font-medium">TechieXtract Limited</a>
          </p>
        </div>
      </div>
      <div class="border-t border-white/5 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500 font-light">
        <p>© 2026 Colossus of Lagos. All rights reserved.</p>
        <p>Technology & Development Partner: TechieXtract</p>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Widget -->
  <a href="https://wa.me/2348123456789?text=Hello%20Colossus%20of%20Lagos%20team,%20I%20have%20an%20enquiry" target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-transform" title="Chat on WhatsApp">
    <i data-lucide="message-circle" class="w-6 h-6"></i>
    <span class="text-xs font-bold hidden sm:inline">WhatsApp Help Desk</span>
  </a>

  <script>
    lucide.createIcons();

    // Mobile Menu
    const menuBtn = document.getElementById('menu-btn');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn?.addEventListener('click', () => mobileMenu.classList.remove('translate-x-full'));
    closeMenu?.addEventListener('click', () => mobileMenu.classList.add('translate-x-full'));

    // Form Submission
    const form = document.getElementById('enquiryForm');
    const alertBox = document.getElementById('formAlert');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span>Transmitting...</span>';

      const formData = new FormData(form);
      fetch('process-enquiry.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        alertBox.classList.remove('hidden', 'bg-red-500/20', 'text-red-300', 'bg-green-500/20', 'text-green-300');
        if (data.status === 'success') {
          alertBox.classList.add('bg-green-500/20', 'text-green-300');
          alertBox.textContent = data.message;
          form.reset();
        } else {
          alertBox.classList.add('bg-red-500/20', 'text-red-300');
          alertBox.textContent = data.message || 'An error occurred.';
        }
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<span>Transmit Message</span><i data-lucide="send" class="w-4 h-4"></i>';
        lucide.createIcons();
      })
      .catch(err => {
        alertBox.classList.remove('hidden');
        alertBox.classList.add('bg-red-500/20', 'text-red-300');
        alertBox.textContent = 'Network or server error. Please try again.';
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<span>Transmit Message</span>';
      });
    });
  </script>
</body>

</html>

