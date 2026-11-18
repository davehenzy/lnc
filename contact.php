<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us | Colossus of Lagos - Official Platform</title>
  <meta name="description" content="Get in touch with the Colossus of Lagos team. Sponsorship, partnership, and participant enquiries." />
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="shortcut icon" href="favicon.ico" />
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

  <!-- Navbar & Mobile Menu -->
  <?php include 'includes/navbar.php'; ?>

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

  <!-- Footer & Floating WhatsApp Widget -->
  <?php include 'includes/footer.php'; ?>

  <script>
    // Form Submission
    const form = document.getElementById('enquiryForm');
    const alertBox = document.getElementById('formAlert');
    const submitBtn = document.getElementById('submitBtn');

    if (form) {
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
    }
  </script>
</body>

</html>

