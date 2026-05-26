<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | Lagos New Colossus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap"
      rel="stylesheet"
    />
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

      @keyframes shake {
        0%,
        100% {
          transform: translateX(0);
        }
        25% {
          transform: translateX(-5px);
        }
        75% {
          transform: translateX(5px);
        }
      }

      .animate-float {
        animation: float 6s ease-in-out infinite;
      }

      .text-gold-gradient {
        background: linear-gradient(
          135deg,
          var(--gold) 0%,
          var(--gold-light) 50%,
          var(--gold) 100%
        );
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
        background: linear-gradient(
          90deg,
          transparent,
          rgba(255, 255, 255, 0.3),
          transparent
        );
        transition: left 0.5s ease;
      }
      .btn-gold:hover::before {
        left: 100%;
      }
      .btn-gold:hover {
        transform: scale(1.05);
        box-shadow: 0 0 40px rgba(212, 175, 55, 0.4);
      }
      .btn-gold:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
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

      .form-input {
        background: rgba(10, 22, 40, 0.8);
        border: 1.5px solid rgba(212, 175, 55, 0.15);
        color: white;
        transition: all 0.3s ease;
      }
      .form-input:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        outline: none;
      }
      .form-input::placeholder {
        color: rgba(255, 255, 255, 0.3);
      }
      .form-input.error {
        border-color: #ef4444;
        animation: shake 0.4s ease;
      }
      .form-input.success {
        border-color: #22c55e;
      }

      .form-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 0.5rem;
        display: block;
      }

      .form-label .required {
        color: var(--gold);
        margin-left: 2px;
      }

      .step-indicator {
        position: relative;
      }
      .step-indicator::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 100%;
        width: 100%;
        height: 2px;
        background: rgba(212, 175, 55, 0.2);
        transform: translateY(-50%);
      }
      .step-indicator:last-child::after {
        display: none;
      }
      .step-indicator.completed::after {
        background: var(--gold);
      }

      .step-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid rgba(212, 175, 55, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.875rem;
        transition: all 0.4s ease;
        background: rgba(10, 22, 40, 0.8);
        position: relative;
        z-index: 2;
      }
      .step-circle.active {
        border-color: var(--gold);
        background: var(--gold);
        color: var(--navy);
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
      }
      .step-circle.completed {
        border-color: var(--gold);
        background: var(--gold);
        color: var(--navy);
      }

      .form-step {
        display: none;
      }
      .form-step.active {
        display: block;
        animation: fadeIn 0.5s ease;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateX(20px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }

      .checkbox-custom {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(212, 175, 55, 0.3);
        border-radius: 4px;
        background: transparent;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
        flex-shrink: 0;
      }
      .checkbox-custom:checked {
        background: var(--gold);
        border-color: var(--gold);
      }
      .checkbox-custom:checked::after {
        content: "";
        position: absolute;
        left: 5px;
        top: 1px;
        width: 6px;
        height: 11px;
        border: solid var(--navy);
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
      }

      .radio-custom {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(212, 175, 55, 0.3);
        border-radius: 50%;
        background: transparent;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
        flex-shrink: 0;
      }
      .radio-custom:checked {
        border-color: var(--gold);
      }
      .radio-custom:checked::after {
        content: "";
        position: absolute;
        inset: 3px;
        border-radius: 50%;
        background: var(--gold);
      }

      .file-upload {
        border: 2px dashed rgba(212, 175, 55, 0.2);
        transition: all 0.3s ease;
        cursor: pointer;
      }
      .file-upload:hover,
      .file-upload.dragover {
        border-color: var(--gold);
        background: rgba(212, 175, 55, 0.05);
      }

      .progress-fill {
        transition: width 0.6s cubic-bezier(0.16, 1, 0.3, 1);
      }

      .success-checkmark {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        animation: scaleIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
      }

      @keyframes scaleIn {
        from {
          transform: scale(0);
        }
        to {
          transform: scale(1);
        }
      }

      .location-option {
        transition: all 0.3s ease;
        cursor: pointer;
      }
      .location-option:hover {
        border-color: rgba(212, 175, 55, 0.4);
      }
      .location-option.selected {
        border-color: var(--gold);
        background: rgba(212, 175, 55, 0.05);
      }

      .error-message {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: none;
      }
      .error-message.show {
        display: block;
      }
    </style>
  </head>
  <body class="antialiased text-white bg-[#0a1628] overflow-x-hidden">
    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-6 bg-[#0a1628] border-b border-white/5">
      <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        <a href="index.php" class="flex items-center">
          <img src="assets/logos/LNC_Logo_Light.png" alt="Lagos New Colossus Logo" class="h-10 md:h-16 w-auto object-contain" />
        </a>

        <div class="hidden md:flex items-center gap-12">
          <a
            href="index.php"
            class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors"
            >Home</a
          >
          <a
            href="about.php"
            class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors"
            >About</a
          >
          <a
            href="eligibility.php"
            class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors"
            >Eligibility</a
          >
          <a
            href="faq.php"
            class="text-sm font-medium text-gray-400 hover:text-[#d4af37] transition-colors"
            >FAQ</a
          >
        </div>

        <div class="flex items-center gap-4">
          <span
            class="hidden md:inline-flex text-[#d4af37] text-sm font-semibold tracking-wider uppercase"
            >Registration Open</span
          >
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
    <section
      class="relative min-h-[50vh] flex items-center justify-center overflow-hidden pt-[112px] md:pt-[130px]"
    >
      <div
        class="absolute inset-0 bg-gradient-to-b from-[#0a1628] via-[#0f1d32] to-[#0a1628]"
      ></div>
      <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
        <div
          class="absolute top-20 left-10 w-96 h-96 bg-[#083B74]/20 rounded-full blur-[100px] animate-float"
        ></div>
        <div
          class="absolute bottom-20 right-10 w-[500px] h-[500px] bg-[#083B74]/15 rounded-full blur-[120px] animate-float"
          style="animation-delay: 3s"
        ></div>
      </div>
      <div
        class="absolute inset-0 bg-[linear-gradient(rgba(212,175,55,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(212,175,55,0.03)_1px,transparent_1px)] bg-[size:60px_60px]"
      ></div>

      <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
        <div
          class="mb-6 inline-flex items-center gap-3 px-5 py-2.5 rounded-full glass-panel"
        >
          <span class="w-2 h-2 rounded-full bg-[#d4af37] animate-pulse"></span>
          <span
            class="text-xs font-semibold tracking-[0.2em] uppercase text-[#d4af37]"
            >Limited Spots Available</span
          >
        </div>

        <h1
          class="font-display text-5xl md:text-7xl font-black leading-tight mb-6"
        >
          <span
            class="block text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-400"
            >Register for</span
          >
          <span class="block text-gold-gradient mt-2 italic">The Colossus</span>
        </h1>

        <p class="max-w-2xl mx-auto text-lg text-gray-400">
          Complete the form below to secure your spot in Africa's most
          electrifying entrepreneurial competition.
        </p>
      </div>

      <div
        class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-[#0a1628] to-transparent"
      ></div>
    </section>

    <!-- Registration Form Section -->
    <section class="relative py-16 md:py-24">
      <div class="max-w-4xl mx-auto px-6">
        <!-- Progress Steps -->
        <div class="mb-12 section-reveal">
          <div
            class="flex items-center justify-between max-w-2xl mx-auto relative"
          >
            <div
              class="absolute top-1/2 left-0 w-full h-0.5 bg-[#d4af37]/10 -translate-y-1/2"
            ></div>
            <div
              class="absolute top-1/2 left-0 h-0.5 bg-gradient-to-r from-[#d4af37] to-[#d4af37]/30 -translate-y-1/2 transition-all duration-500"
              id="progressBar"
              style="width: 0%"
            ></div>

            <div
              class="step-indicator flex-1 flex flex-col items-center relative"
            >
              <div class="step-circle active" id="step1Circle">1</div>
              <span class="text-xs mt-2 text-[#d4af37] font-medium"
                >Personal</span
              >
            </div>
            <div
              class="step-indicator flex-1 flex flex-col items-center relative"
            >
              <div class="step-circle" id="step2Circle">2</div>
              <span
                class="text-xs mt-2 text-gray-500 font-medium"
                id="step2Label"
                >Business</span
              >
            </div>
            <div
              class="step-indicator flex-1 flex flex-col items-center relative"
            >
              <div class="step-circle" id="step3Circle">3</div>
              <span
                class="text-xs mt-2 text-gray-500 font-medium"
                id="step3Label"
                >Documents</span
              >
            </div>
            <div
              class="step-indicator flex-1 flex flex-col items-center relative"
            >
              <div class="step-circle" id="step4Circle">4</div>
              <span
                class="text-xs mt-2 text-gray-500 font-medium"
                id="step4Label"
                >Review</span
              >
            </div>
          </div>
        </div>

        <!-- Form Container -->
        <div class="glass-panel-strong rounded-3xl p-8 md:p-12 section-reveal">
          <form id="registrationForm" onsubmit="event.preventDefault()">
            <!-- Step 1: Personal Information -->
            <div class="form-step active" id="step1">
              <h2 class="font-display text-2xl md:text-3xl font-bold mb-2">
                Personal Information
              </h2>
              <p class="text-gray-400 mb-8">
                Tell us about yourself. All fields are required.
              </p>

              <div class="grid md:grid-cols-2 gap-6">
                <div>
                  <label class="form-label"
                    >First Name <span class="required">*</span></label
                  >
                  <input
                    type="text"
                    id="firstName"
                    class="form-input w-full px-4 py-3 rounded-xl"
                    placeholder="Enter your first name"
                  />
                  <div class="error-message" id="firstNameError">
                    First name is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Last Name <span class="required">*</span></label
                  >
                  <input
                    type="text"
                    id="lastName"
                    class="form-input w-full px-4 py-3 rounded-xl"
                    placeholder="Enter your last name"
                  />
                  <div class="error-message" id="lastNameError">
                    Last name is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Email Address <span class="required">*</span></label
                  >
                  <input
                    type="email"
                    id="email"
                    class="form-input w-full px-4 py-3 rounded-xl"
                    placeholder="your@email.com"
                  />
                  <div class="error-message" id="emailError">
                    Valid email is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Phone Number <span class="required">*</span></label
                  >
                  <input
                    type="tel"
                    id="phone"
                    class="form-input w-full px-4 py-3 rounded-xl"
                    placeholder="+234 800 000 0000"
                  />
                  <div class="error-message" id="phoneError">
                    Valid phone number is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Date of Birth <span class="required">*</span></label
                  >
                  <input
                    type="date"
                    id="dob"
                    class="form-input w-full px-4 py-3 rounded-xl"
                  />
                  <div class="error-message" id="dobError">
                    You must be between 20-40 years old
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Age <span class="required">*</span></label
                  >
                  <input
                    type="number"
                    id="age"
                    class="form-input w-full px-4 py-3 rounded-xl"
                    placeholder="20-40"
                    min="20"
                    max="40"
                    readonly
                  />
                  <div class="error-message" id="ageError">
                    Must be between 20-40 years
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Gender <span class="required">*</span></label
                  >
                  <div class="flex gap-4 mt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                      <input
                        type="radio"
                        name="gender"
                        value="male"
                        class="radio-custom"
                      />
                      <span class="text-sm text-gray-300">Male</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                      <input
                        type="radio"
                        name="gender"
                        value="female"
                        class="radio-custom"
                      />
                      <span class="text-sm text-gray-300">Female</span>
                    </label>
                  </div>
                  <div class="error-message" id="genderError">
                    Please select gender
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Education Level <span class="required">*</span></label
                  >
                  <select
                    id="education"
                    class="form-input w-full px-4 py-3 rounded-xl"
                  >
                    <option value="">Select education level</option>
                    <option value="ssce">SSCE / O-Level</option>
                    <option value="ond-hnd">OND / HND</option>
                    <option value="bsc">B.Sc / HND</option>
                    <option value="master">M.Sc </option>
                    <option value="phd">Ph.D</option>
                  </select>
                  <div class="error-message" id="educationError">
                    Education level is required
                  </div>
                </div>
              </div>

              <div class="mt-8 flex justify-end">
                <button
                  type="button"
                  class="btn-gold px-8 py-3 rounded-full flex items-center gap-2"
                  onclick="nextStep(1)"
                >
                  <span>Continue</span>
                  <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
              </div>
            </div>

            <!-- Step 2: Business Information -->
            <div class="form-step" id="step2">
              <h2 class="font-display text-2xl md:text-3xl font-bold mb-2">
                Business Information
              </h2>
              <p class="text-gray-400 mb-8">
                Tell us about your business or business idea.
              </p>

              <div class="space-y-6">
                <div>
                  <label class="form-label">Business Name (if exists)</label>
                  <input
                    type="text"
                    id="businessName"
                    class="form-input w-full px-4 py-3 rounded-xl"
                    placeholder="Enter business name or proposed name"
                  />
                </div>

                <div>
                  <label class="form-label"
                    >Business Sector <span class="required">*</span></label
                  >
                  <select
                    id="sector"
                    class="form-input w-full px-4 py-3 rounded-xl"
                  >
                    <option value="">Select sector</option>
                    <option value="technology">Technology & Software</option>
                    <option value="agriculture">Agriculture & Food</option>
                    <option value="fashion">Fashion & Beauty</option>
                    <option value="health">Health & Wellness</option>
                    <option value="education">Education & Training</option>
                    <option value="finance">Finance & Fintech</option>
                    <option value="media">Media & Entertainment</option>
                    <option value="manufacturing">Manufacturing</option>
                    <option value="retail">Retail & E-commerce</option>
                    <option value="real-estate">
                      Real Estate & Construction
                    </option>
                    <option value="transport">Transport & Logistics</option>
                    <option value="other">Other</option>
                  </select>
                  <div class="error-message" id="sectorError">
                    Business sector is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Business Description <span class="required">*</span></label
                  >
                  <textarea
                    id="businessDescription"
                    rows="4"
                    class="form-input w-full px-4 py-3 rounded-xl resize-none"
                    placeholder="Describe your business idea, target market, revenue model, and what makes it unique..."
                  ></textarea>
                  <div class="flex justify-between mt-1">
                    <div class="error-message" id="descriptionError">
                      Description is required (min 50 characters)
                    </div>
                    <span class="text-xs text-gray-500" id="charCount"
                      >0 / 500</span
                    >
                  </div>
                </div>

                <div>
                  <label class="form-label">Years in Operation</label>
                  <select
                    id="yearsOperation"
                    class="form-input w-full px-4 py-3 rounded-xl"
                  >
                    <option value="0">Not yet started (Idea stage)</option>
                    <option value="0-1">0 - 1 year</option>
                    <option value="1-3">1 - 3 years</option>
                    <option value="3-5">3 - 5 years</option>
                    <option value="5+">5+ years</option>
                  </select>
                </div>

                <div>
                  <label class="form-label"
                    >Current Stage <span class="required">*</span></label
                  >
                  <div class="grid sm:grid-cols-3 gap-3 mt-2">
                    <label
                      class="location-option border border-[#d4af37]/10 rounded-xl p-4 text-center cursor-pointer"
                    >
                      <input
                        type="radio"
                        name="stage"
                        value="idea"
                        class="radio-custom mx-auto mb-2"
                      />
                      <div class="text-sm font-medium">Idea Stage</div>
                      <div class="text-xs text-gray-500 mt-1">Concept only</div>
                    </label>
                    <label
                      class="location-option border border-[#d4af37]/10 rounded-xl p-4 text-center cursor-pointer"
                    >
                      <input
                        type="radio"
                        name="stage"
                        value="mvp"
                        class="radio-custom mx-auto mb-2"
                      />
                      <div class="text-sm font-medium">MVP/Early</div>
                      <div class="text-xs text-gray-500 mt-1">
                        Prototype launched
                      </div>
                    </label>
                    <label
                      class="location-option border border-[#d4af37]/10 rounded-xl p-4 text-center cursor-pointer"
                    >
                      <input
                        type="radio"
                        name="stage"
                        value="growth"
                        class="radio-custom mx-auto mb-2"
                      />
                      <div class="text-sm font-medium">Growth</div>
                      <div class="text-xs text-gray-500 mt-1">
                        Revenue generating
                      </div>
                    </label>
                  </div>
                  <div class="error-message" id="stageError">
                    Please select current stage
                  </div>
                </div>
              </div>

              <div class="mt-8 flex justify-between">
                <button
                  type="button"
                  class="btn-outline-gold px-8 py-3 rounded-full flex items-center gap-2"
                  onclick="prevStep(2)"
                >
                  <i data-lucide="arrow-left" class="w-4 h-4"></i>
                  <span>Back</span>
                </button>
                <button
                  type="button"
                  class="btn-gold px-8 py-3 rounded-full flex items-center gap-2"
                  onclick="nextStep(2)"
                >
                  <span>Continue</span>
                  <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
              </div>
            </div>

            <!-- Step 3: Documents & Location -->
            <div class="form-step" id="step3">
              <h2 class="font-display text-2xl md:text-3xl font-bold mb-2">
                Documents & Location
              </h2>
              <p class="text-gray-400 mb-8">
                Upload required documents and select your audition centre.
              </p>

              <div class="space-y-6">
                <div>
                  <label class="form-label"
                    >Proof of Residence <span class="required">*</span></label
                  >
                  <div
                    class="file-upload rounded-xl p-6 text-center mt-2"
                    id="residenceUpload"
                    onclick="document.getElementById('residenceFile').click()"
                  >
                    <input
                      type="file"
                      id="residenceFile"
                      class="hidden"
                      accept=".pdf,.jpg,.jpeg,.png"
                      onchange="handleFileSelect(this, 'residenceUpload')"
                    />
                    <i
                      data-lucide="upload-cloud"
                      class="w-10 h-10 text-[#d4af37] mx-auto mb-3"
                    ></i>
                    <p class="text-sm text-gray-300 font-medium">
                      Click to upload LASRRA or Utility Bill
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                      PDF, JPG, or PNG (Max 5MB)
                    </p>
                  </div>
                  <div class="error-message" id="residenceError">
                    Proof of residence is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Passport Photograph <span class="required">*</span></label
                  >
                  <div
                    class="file-upload rounded-xl p-6 text-center mt-2"
                    id="photoUpload"
                    onclick="document.getElementById('photoFile').click()"
                  >
                    <input
                      type="file"
                      id="photoFile"
                      class="hidden"
                      accept=".jpg,.jpeg,.png"
                      onchange="handleFileSelect(this, 'photoUpload')"
                    />
                    <i
                      data-lucide="camera"
                      class="w-10 h-10 text-[#d4af37] mx-auto mb-3"
                    ></i>
                    <p class="text-sm text-gray-300 font-medium">
                      Click to upload full picture
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                      JPG or PNG (Max 2MB)
                    </p>
                  </div>
                  <div class="error-message" id="photoError">
                    Passport photograph is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Government ID <span class="required">*</span></label
                  >
                  <div
                    class="file-upload rounded-xl p-6 text-center mt-2"
                    id="idUpload"
                    onclick="document.getElementById('idFile').click()"
                  >
                    <input
                      type="file"
                      id="idFile"
                      class="hidden"
                      accept=".pdf,.jpg,.jpeg,.png"
                      onchange="handleFileSelect(this, 'idUpload')"
                    />
                    <i
                      data-lucide="file-text"
                      class="w-10 h-10 text-[#d4af37] mx-auto mb-3"
                    ></i>
                    <p class="text-sm text-gray-300 font-medium">
                      Click to upload valid ID
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                      National ID, Driver's License, or Passport
                    </p>
                  </div>
                  <div class="error-message" id="idError">
                    Government ID is required
                  </div>
                </div>

                <div>
                  <label class="form-label"
                    >Preferred Audition Centre
                    <span class="required">*</span></label
                  >
                  <div class="grid sm:grid-cols-3 lg:grid-cols-5 gap-4 mt-2">
                    <label
                      class="location-option glass-panel rounded-2xl overflow-hidden group border border-[#d4af37]/10 p-0 text-center cursor-pointer transition-all duration-300"
                      onclick="selectLocation(this)"
                    >
                      <div class="relative h-24 overflow-hidden">
                        <img src="assets/locations/lagos-island.webp" alt="Lagos Island" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
                        <input
                          type="radio"
                          name="auditionCentre"
                          value="lagos-island"
                          class="radio-custom absolute top-2 right-2 m-0"
                        />
                      </div>
                      <div class="p-3">
                        <div class="text-sm font-bold">Lagos Island</div>
                        <p class="text-[10px] text-[#d4af37]">Central Business District</p>
                      </div>
                    </label>

                    <label
                      class="location-option glass-panel rounded-2xl overflow-hidden group border border-[#d4af37]/10 p-0 text-center cursor-pointer transition-all duration-300"
                      onclick="selectLocation(this)"
                    >
                      <div class="relative h-24 overflow-hidden">
                        <img src="assets/locations/ikeja.jpg" alt="Ikeja" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
                        <input
                          type="radio"
                          name="auditionCentre"
                          value="ikeja"
                          class="radio-custom absolute top-2 right-2 m-0"
                        />
                      </div>
                      <div class="p-3">
                        <div class="text-sm font-bold">Ikeja</div>
                        <p class="text-[10px] text-[#d4af37]">State Capital</p>
                      </div>
                    </label>

                    <label
                      class="location-option glass-panel rounded-2xl overflow-hidden group border border-[#d4af37]/10 p-0 text-center cursor-pointer transition-all duration-300"
                      onclick="selectLocation(this)"
                    >
                      <div class="relative h-24 overflow-hidden">
                        <img src="assets/locations/ikorodu.jpg" alt="Ikorodu" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
                        <input
                          type="radio"
                          name="auditionCentre"
                          value="ikorodu"
                          class="radio-custom absolute top-2 right-2 m-0"
                        />
                      </div>
                      <div class="p-3">
                        <div class="text-sm font-bold">Ikorodu</div>
                        <p class="text-[10px] text-[#d4af37]">Mainland East</p>
                      </div>
                    </label>

                    <label
                      class="location-option glass-panel rounded-2xl overflow-hidden group border border-[#d4af37]/10 p-0 text-center cursor-pointer transition-all duration-300"
                      onclick="selectLocation(this)"
                    >
                      <div class="relative h-24 overflow-hidden">
                        <img src="assets/locations/badagry.jpg" alt="Badagry" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
                        <input
                          type="radio"
                          name="auditionCentre"
                          value="badagry"
                          class="radio-custom absolute top-2 right-2 m-0"
                        />
                      </div>
                      <div class="p-3">
                        <div class="text-sm font-bold">Badagry</div>
                        <p class="text-[10px] text-[#d4af37]">Western Border</p>
                      </div>
                    </label>

                    <label
                      class="location-option glass-panel rounded-2xl overflow-hidden group border border-[#d4af37]/10 p-0 text-center cursor-pointer transition-all duration-300"
                      onclick="selectLocation(this)"
                    >
                      <div class="relative h-24 overflow-hidden">
                        <img src="assets/locations/epe.jpg" alt="Epe" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a1628] to-transparent opacity-60"></div>
                        <input
                          type="radio"
                          name="auditionCentre"
                          value="epe"
                          class="radio-custom absolute top-2 right-2 m-0"
                        />
                      </div>
                      <div class="p-3">
                        <div class="text-sm font-bold">Epe</div>
                        <p class="text-[10px] text-[#d4af37]">Mainland East</p>
                      </div>
                    </label>
                  </div>
                  <div class="error-message" id="centreError">
                    Please select an audition centre
                  </div>
                </div>
              </div>

              <div class="mt-8 flex justify-between">
                <button
                  type="button"
                  class="btn-outline-gold px-8 py-3 rounded-full flex items-center gap-2"
                  onclick="prevStep(3)"
                >
                  <i data-lucide="arrow-left" class="w-4 h-4"></i>
                  <span>Back</span>
                </button>
                <button
                  type="button"
                  class="btn-gold px-8 py-3 rounded-full flex items-center gap-2"
                  onclick="nextStep(3)"
                >
                  <span>Continue</span>
                  <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
              </div>
            </div>

            <!-- Step 4: Review & Submit -->
            <div class="form-step" id="step4">
              <h2 class="font-display text-2xl md:text-3xl font-bold mb-2">
                Review & Submit
              </h2>
              <p class="text-gray-400 mb-8">
                Please review your information before submitting.
              </p>

              <div class="space-y-6" id="reviewContent">
                <!-- Populated by JavaScript -->
              </div>

              <div
                class="mt-8 p-6 rounded-xl border border-[#083B74]/50" style="background: linear-gradient(135deg, #083B74 0%, #0a1628 100%);"
              >
                <label class="flex items-start gap-3 cursor-pointer">
                  <input
                    type="checkbox"
                    id="termsCheck"
                    class="checkbox-custom mt-1"
                  />
                  <div>
                    <p class="text-sm text-gray-300">
                      I confirm that all information provided is accurate and
                      true. I have read and accept the
                      <a href="#" class="text-[#d4af37] hover:underline"
                        >Terms and Conditions</a
                      >
                      and
                      <a href="#" class="text-[#d4af37] hover:underline"
                        >Privacy Policy</a
                      >
                      of Lagos New Colossus.
                    </p>
                    <div class="error-message" id="termsError">
                      You must accept the terms to proceed
                    </div>
                  </div>
                </label>
              </div>

              <div class="mt-8 flex justify-between">
                <button
                  type="button"
                  class="btn-outline-gold px-8 py-3 rounded-full flex items-center gap-2"
                  onclick="prevStep(4)"
                >
                  <i data-lucide="arrow-left" class="w-4 h-4"></i>
                  <span>Back</span>
                </button>
                <button
                  type="submit"
                  class="btn-gold px-10 py-3 rounded-full flex items-center gap-2"
                  onclick="submitForm()"
                >
                  <span>Submit Application</span>
                  <i data-lucide="send" class="w-4 h-4"></i>
                </button>
              </div>
            </div>

            <!-- Success State -->
            <div class="form-step text-center py-12" id="successStep">
              <div class="success-checkmark mb-6">
                <i data-lucide="check" class="w-10 h-10 text-[#0a1628]"></i>
              </div>
              <h2 class="font-display text-3xl md:text-4xl font-bold mb-4">
                Application Submitted!
              </h2>
              <p class="text-gray-400 mb-2 max-w-md mx-auto">
                Thank you for registering for Lagos New Colossus. Your
                application has been received and is under review.
              </p>
              <p class="text-[#d4af37] font-medium mb-8">
                Application ID: <span id="appId">LNC-2026-0000</span>
              </p>

              <div
                class="glass-panel rounded-2xl p-6 max-w-md mx-auto mb-8 text-left"
              >
                <h3 class="font-semibold mb-4 text-white">
                  What happens next?
                </h3>
                <div class="space-y-3">
                  <div class="flex items-start gap-3">
                    <div
                      class="w-6 h-6 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0 mt-0.5"
                    >
                      <span class="text-xs text-[#d4af37] font-bold">1</span>
                    </div>
                    <p class="text-sm text-gray-400">
                      Check your email for confirmation within 24 hours
                    </p>
                  </div>
                  <div class="flex items-start gap-3">
                    <div
                      class="w-6 h-6 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0 mt-0.5"
                    >
                      <span class="text-xs text-[#d4af37] font-bold">2</span>
                    </div>
                    <p class="text-sm text-gray-400">
                      Wait for audition invitation (if shortlisted)
                    </p>
                  </div>
                  <div class="flex items-start gap-3">
                    <div
                      class="w-6 h-6 rounded-full bg-[#d4af37]/10 flex items-center justify-center flex-shrink-0 mt-0.5"
                    >
                      <span class="text-xs text-[#d4af37] font-bold">3</span>
                    </div>
                    <p class="text-sm text-gray-400">
                      Attend audition at your selected centre
                    </p>
                  </div>
                </div>
              </div>

              <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a
                  href="#"
                  class="btn-outline-gold px-8 py-3 rounded-full flex items-center justify-center gap-2"
                >
                  <i data-lucide="home" class="w-4 h-4"></i>
                  <span>Back to Home</span>
                </a>
                <button
                  type="button"
                  class="btn-gold px-8 py-3 rounded-full flex items-center justify-center gap-2"
                  onclick="location.reload()"
                >
                  <i data-lucide="user-plus" class="w-4 h-4"></i>
                  <span>Register Another</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-[#d4af37]/10 py-16 bg-[#070f1f]">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
          <div class="md:col-span-2">
            <div class="flex items-center gap-3 mb-6">
              <img src="assets/logos/LNC_Logo_Light.png" alt="Lagos New Colossus" class="h-12 w-auto">
            </div>
            <p class="text-gray-500 text-sm max-w-sm leading-relaxed mb-6">
              An entrepreneurial reality and competition show developed in
              partnership with Lagos State Government to identify, support, and
              scale high-potential entrepreneurs driving jobs, innovation, and
              economic growth.
            </p>
            <div class="flex items-center gap-4">
              <a
                href="#"
                class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all"
              >
                <i data-lucide="instagram" class="w-4 h-4"></i>
              </a>
              <a
                href="#"
                class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all"
              >
                <i data-lucide="twitter" class="w-4 h-4"></i>
              </a>
              <a
                href="#"
                class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all"
              >
                <i data-lucide="facebook" class="w-4 h-4"></i>
              </a>
              <a
                href="#"
                class="w-10 h-10 rounded-full bg-[#0a1628] border border-[#d4af37]/20 flex items-center justify-center text-gray-500 hover:text-[#d4af37] hover:border-[#d4af37]/50 transition-all"
              >
                <i data-lucide="youtube" class="w-4 h-4"></i>
              </a>
            </div>
          </div>

          <div>
            <h4
              class="font-semibold mb-6 text-[#d4af37] text-sm tracking-wider uppercase"
            >
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
          class="border-t border-[#d4af37]/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left"
        >
          <p class="text-sm text-gray-600">
            © 2026 Lagos New Colossus. All rights reserved.
          </p>
          <p class="text-sm text-gray-600">
            Produced by Bravopoints International Limited <span class="hidden md:inline mx-2">|</span> Design by <a href="https://linktr.ee/techiextract" target="_blank" class="hover:text-white transition-colors">techieXtract</a>
          </p>
        </div>
      </div>
    </footer>

    <script>
      lucide.createIcons();

      let currentStep = 1;
      const totalSteps = 4;

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

      // Auto-calculate age from DOB
      document.getElementById("dob").addEventListener("change", function () {
        const dob = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        if (
          monthDiff < 0 ||
          (monthDiff === 0 && today.getDate() < dob.getDate())
        ) {
          age--;
        }
        document.getElementById("age").value = age;
      });

      // Character counter for business description
      document
        .getElementById("businessDescription")
        .addEventListener("input", function () {
          const count = this.value.length;
          document.getElementById("charCount").textContent = count + " / 500";
          if (count > 500) {
            this.value = this.value.substring(0, 500);
            document.getElementById("charCount").textContent = "500 / 500";
          }
        });

      function selectLocation(element) {
        const parent = element.parentElement;
        parent
          .querySelectorAll(".location-option")
          .forEach((el) => el.classList.remove("selected"));
        element.classList.add("selected");
      }

      function handleFileSelect(input, uploadId) {
        const uploadDiv = document.getElementById(uploadId);
        const file = input.files[0];

        if (file) {
          // Hide original elements except the input
          Array.from(uploadDiv.children).forEach(child => {
            if (child.tagName !== 'INPUT' && !child.classList.contains('file-info')) {
              child.style.display = 'none';
            }
          });

          let fileInfo = uploadDiv.querySelector('.file-info');
          if (!fileInfo) {
            fileInfo = document.createElement('div');
            fileInfo.className = 'file-info';
            uploadDiv.appendChild(fileInfo);
          }

          fileInfo.innerHTML = `
                    <div class="flex items-center justify-center gap-3">
                        <i data-lucide="file-check" class="w-8 h-8 text-[#d4af37]"></i>
                        <div class="text-left">
                            <p class="text-sm text-white font-medium">${file.name}</p>
                            <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                        </div>
                    </div>
                    <button type="button" class="text-xs text-[#d4af37] mt-2 hover:underline" onclick="event.stopPropagation(); resetUpload('${uploadId}', '${input.id}')">Change file</button>
                `;
          fileInfo.style.display = 'block';
          lucide.createIcons();
          uploadDiv.classList.add("border-[#d4af37]", "bg-[#d4af37]/5");
        }
      }

      function resetUpload(uploadId, inputId) {
        const uploadDiv = document.getElementById(uploadId);
        const input = document.getElementById(inputId);
        input.value = "";

        // Restore original visibility
        Array.from(uploadDiv.children).forEach(child => {
          if (child.tagName !== 'INPUT' && !child.classList.contains('file-info')) {
            child.style.display = '';
          }
        });

        const fileInfo = uploadDiv.querySelector('.file-info');
        if (fileInfo) fileInfo.style.display = 'none';

        uploadDiv.classList.remove("border-[#d4af37]", "bg-[#d4af37]/5");
      }

      function validateStep(step) {
        let isValid = true;

        if (step === 1) {
          // Validate first name
          const firstName = document.getElementById("firstName").value.trim();
          if (!firstName) {
            showError("firstName", "firstNameError");
            isValid = false;
          } else {
            hideError("firstName", "firstNameError");
          }

          // Validate last name
          const lastName = document.getElementById("lastName").value.trim();
          if (!lastName) {
            showError("lastName", "lastNameError");
            isValid = false;
          } else {
            hideError("lastName", "lastNameError");
          }

          // Validate email
          const email = document.getElementById("email").value.trim();
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!email || !emailRegex.test(email)) {
            showError("email", "emailError");
            isValid = false;
          } else {
            hideError("email", "emailError");
          }

          // Validate phone
          const phone = document.getElementById("phone").value.trim();
          if (!phone || phone.length < 10) {
            showError("phone", "phoneError");
            isValid = false;
          } else {
            hideError("phone", "phoneError");
          }

          // Validate DOB and age
          const dob = document.getElementById("dob").value;
          const age = parseInt(document.getElementById("age").value);
          if (!dob) {
            showError("dob", "dobError");
            isValid = false;
          } else if (age < 20 || age > 40 || isNaN(age)) {
            showError("age", "ageError");
            isValid = false;
          } else {
            hideError("dob", "dobError");
            hideError("age", "ageError");
          }

          // Validate gender
          const gender = document.querySelector('input[name="gender"]:checked');
          if (!gender) {
            document.getElementById("genderError").classList.add("show");
            isValid = false;
          } else {
            document.getElementById("genderError").classList.remove("show");
          }

          // Validate education
          const education = document.getElementById("education").value;
          if (!education) {
            showError("education", "educationError");
            isValid = false;
          } else {
            hideError("education", "educationError");
          }
        }

        if (step === 2) {
          // Validate sector
          const sector = document.getElementById("sector").value;
          if (!sector) {
            showError("sector", "sectorError");
            isValid = false;
          } else {
            hideError("sector", "sectorError");
          }

          // Validate description
          const description = document
            .getElementById("businessDescription")
            .value.trim();
          if (!description || description.length < 50) {
            showError("businessDescription", "descriptionError");
            isValid = false;
          } else {
            hideError("businessDescription", "descriptionError");
          }

          // Validate stage
          const stage = document.querySelector('input[name="stage"]:checked');
          if (!stage) {
            document.getElementById("stageError").classList.add("show");
            isValid = false;
          } else {
            document.getElementById("stageError").classList.remove("show");
          }
        }

        if (step === 3) {
          // Validate files
          const residenceInput = document.getElementById("residenceFile");
          if (!residenceInput || !residenceInput.files || residenceInput.files.length === 0) {
            document.getElementById("residenceError").classList.add("show");
            isValid = false;
          } else {
            document.getElementById("residenceError").classList.remove("show");
          }

          const photoInput = document.getElementById("photoFile");
          if (!photoInput || !photoInput.files || photoInput.files.length === 0) {
            document.getElementById("photoError").classList.add("show");
            isValid = false;
          } else {
            document.getElementById("photoError").classList.remove("show");
          }

          const idInput = document.getElementById("idFile");
          if (!idInput || !idInput.files || idInput.files.length === 0) {
            document.getElementById("idError").classList.add("show");
            isValid = false;
          } else {
            document.getElementById("idError").classList.remove("show");
          }

          // Validate audition centre
          const centre = document.querySelector(
            'input[name="auditionCentre"]:checked',
          );
          if (!centre) {
            document.getElementById("centreError").classList.add("show");
            isValid = false;
          } else {
            document.getElementById("centreError").classList.remove("show");
          }
        }

        return isValid;
      }

      function showError(inputId, errorId) {
        document.getElementById(inputId).classList.add("error");
        document.getElementById(errorId).classList.add("show");
      }

      function hideError(inputId, errorId) {
        document.getElementById(inputId).classList.remove("error");
        document.getElementById(inputId).classList.add("success");
        document.getElementById(errorId).classList.remove("show");
      }

      function nextStep(step) {
        if (!validateStep(step)) return;

        // Hide current step
        document.getElementById("step" + step).classList.remove("active");

        // Show next step
        currentStep = step + 1;
        document.getElementById("step" + currentStep).classList.add("active");

        // Update progress
        updateProgress();

        // If moving to review step, populate review content
        if (currentStep === 4) {
          populateReview();
        }

        // Scroll to top of form
        document
          .getElementById("registrationForm")
          .scrollIntoView({ behavior: "smooth", block: "start" });
      }

      function prevStep(step) {
        // Hide current step
        document.getElementById("step" + step).classList.remove("active");

        // Show previous step
        currentStep = step - 1;
        document.getElementById("step" + currentStep).classList.add("active");

        // Update progress
        updateProgress();

        // Scroll to top of form
        document
          .getElementById("registrationForm")
          .scrollIntoView({ behavior: "smooth", block: "start" });
      }

      function updateProgress() {
        const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
        document.getElementById("progressBar").style.width =
          progressPercent + "%";

        // Update step circles
        for (let i = 1; i <= totalSteps; i++) {
          const circle = document.getElementById("step" + i + "Circle");
          const label = document.getElementById("step" + i + "Label");

          if (i < currentStep) {
            circle.classList.remove("active");
            circle.classList.add("completed");
            circle.innerHTML = '<i data-lucide="check" class="w-5 h-5"></i>';
            if (label) label.classList.add("text-[#d4af37]");
            if (label) label.classList.remove("text-gray-500");
          } else if (i === currentStep) {
            circle.classList.add("active");
            circle.classList.remove("completed");
            circle.textContent = i;
            if (label) label.classList.add("text-[#d4af37]");
            if (label) label.classList.remove("text-gray-500");
          } else {
            circle.classList.remove("active", "completed");
            circle.textContent = i;
            if (label) label.classList.remove("text-[#d4af37]");
            if (label) label.classList.add("text-gray-500");
          }
        }
        lucide.createIcons();
      }

      function populateReview() {
        const reviewContent = document.getElementById("reviewContent");

        const firstName = document.getElementById("firstName").value;
        const lastName = document.getElementById("lastName").value;
        const email = document.getElementById("email").value;
        const phone = document.getElementById("phone").value;
        const age = document.getElementById("age").value;
        const gender = document.querySelector(
          'input[name="gender"]:checked',
        )?.value;
        const education = document.getElementById("education").value;
        const businessName =
          document.getElementById("businessName").value || "Not provided";
        const sector = document.getElementById("sector").value;
        const description = document.getElementById(
          "businessDescription",
        ).value;
        const yearsOp = document.getElementById("yearsOperation").value;
        const stage = document.querySelector(
          'input[name="stage"]:checked',
        )?.value;
        const centre = document.querySelector(
          'input[name="auditionCentre"]:checked',
        )?.value;

        const educationLabels = {
          undergraduate: "Undergraduate",
          graduate: "Graduate",
          postgraduate: "Post Graduate",
        };

        const sectorLabels = {
          technology: "Technology & Software",
          agriculture: "Agriculture & Food",
          fashion: "Fashion & Beauty",
          health: "Health & Wellness",
          education: "Education & Training",
          finance: "Finance & Fintech",
          media: "Media & Entertainment",
          manufacturing: "Manufacturing",
          retail: "Retail & E-commerce",
          "real-estate": "Real Estate & Construction",
          transport: "Transport & Logistics",
          other: "Other",
        };

        const stageLabels = {
          idea: "Idea Stage",
          mvp: "MVP/Early",
          growth: "Growth",
        };

        const centreLabels = {
          "lagos-island": "Lagos Island",
          ikeja: "Ikeja",
          ikorodu: "Ikorodu",
          badagry: "Badagry",
          epe: "Epe",
        };

        reviewContent.innerHTML = `
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="p-5 rounded-xl bg-[#070f1f] border border-[#d4af37]/10">
                        <h4 class="text-[#d4af37] text-sm font-semibold uppercase tracking-wider mb-4">Personal Details</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Full Name</span>
                                <span class="text-white text-sm font-medium">${firstName} ${lastName}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Email</span>
                                <span class="text-white text-sm font-medium">${email}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Phone</span>
                                <span class="text-white text-sm font-medium">${phone}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Age</span>
                                <span class="text-white text-sm font-medium">${age} years</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Gender</span>
                                <span class="text-white text-sm font-medium capitalize">${gender}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Education</span>
                                <span class="text-white text-sm font-medium">${educationLabels[education]}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-5 rounded-xl bg-[#070f1f] border border-[#d4af37]/10">
                        <h4 class="text-[#d4af37] text-sm font-semibold uppercase tracking-wider mb-4">Business Details</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Business Name</span>
                                <span class="text-white text-sm font-medium">${businessName}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Sector</span>
                                <span class="text-white text-sm font-medium">${sectorLabels[sector]}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Stage</span>
                                <span class="text-white text-sm font-medium">${stageLabels[stage]}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Years Operating</span>
                                <span class="text-white text-sm font-medium">${yearsOp === "0" ? "Not started" : yearsOp}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">Audition Centre</span>
                                <span class="text-white text-sm font-medium">${centreLabels[centre]}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-5 rounded-xl bg-[#070f1f] border border-[#d4af37]/10">
                    <h4 class="text-[#d4af37] text-sm font-semibold uppercase tracking-wider mb-3">Business Description</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">${description}</p>
                </div>
                
                <div class="p-5 rounded-xl bg-[#070f1f] border border-[#d4af37]/10">
                    <h4 class="text-[#d4af37] text-sm font-semibold uppercase tracking-wider mb-3">Uploaded Documents</h4>
                    <div class="flex flex-wrap gap-3">
                        <div class="flex items-center gap-2 px-3 py-2 rounded-lg bg-[#0a1628] border border-[#d4af37]/20">
                            <i data-lucide="file-check" class="w-4 h-4 text-[#d4af37]"></i>
                            <span class="text-sm text-gray-300">Proof of Residence</span>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-2 rounded-lg bg-[#0a1628] border border-[#d4af37]/20">
                            <i data-lucide="file-check" class="w-4 h-4 text-[#d4af37]"></i>
                            <span class="text-sm text-gray-300">Passport Photo</span>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-2 rounded-lg bg-[#0a1628] border border-[#d4af37]/20">
                            <i data-lucide="file-check" class="w-4 h-4 text-[#d4af37]"></i>
                            <span class="text-sm text-gray-300">Government ID</span>
                        </div>
                    </div>
                </div>
            `;
        lucide.createIcons();
      }

      function submitForm() {
        // Validate terms checkbox
        const termsChecked = document.getElementById("termsCheck").checked;
        if (!termsChecked) {
          document.getElementById("termsError").classList.add("show");
          return;
        } else {
          document.getElementById("termsError").classList.remove("show");
        }

        const submitBtn = document.querySelector('button[onclick="submitForm()"]');
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span>Submitting...</span>';
        submitBtn.disabled = true;

        const formData = new FormData();
        formData.append('full_name', document.getElementById("firstName").value + ' ' + document.getElementById("lastName").value);
        formData.append('email', document.getElementById("email").value);
        formData.append('phone', document.getElementById("phone").value);
        formData.append('dob', document.getElementById("dob").value);
        
        const genderEl = document.querySelector('input[name="gender"]:checked');
        if (genderEl) formData.append('gender', genderEl.value);
        
        formData.append('qualification', document.getElementById("education").value);
        formData.append('business_name', document.getElementById("businessName").value || '');
        formData.append('sector', document.getElementById("sector").value);
        formData.append('business_idea', document.getElementById("businessDescription").value);
        formData.append('years_operation', document.getElementById("yearsOperation").value);
        
        const stageEl = document.querySelector('input[name="stage"]:checked');
        if (stageEl) formData.append('stage', stageEl.value);
        
        const centreEl = document.querySelector('input[name="auditionCentre"]:checked');
        if (centreEl) formData.append('audition_location', centreEl.value);

        const residenceFile = document.getElementById('residenceFile').files[0];
        if (residenceFile) formData.append('utility_bill', residenceFile);
        
        const photoFile = document.getElementById('photoFile').files[0];
        if (photoFile) formData.append('profile_picture', photoFile);
        
        const idFile = document.getElementById('idFile').files[0];
        if (idFile) formData.append('government_id', idFile);

        fetch('process-registration.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Generate application ID
                const appId = "LNC-2026-" + Math.floor(1000 + Math.random() * 9000);
                document.getElementById("appId").textContent = appId;

                // Hide step 4, show success
                document.getElementById("step4").classList.remove("active");
                document.getElementById("successStep").classList.add("active");

                // Scroll to top
                document.getElementById("registrationForm").scrollIntoView({ behavior: "smooth", block: "start" });
            } else {
                alert('Error submitting form: ' + data.message);
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred during submission.');
            submitBtn.innerHTML = originalBtnText;
            submitBtn.disabled = false;
        });
      }

      // Clear error on input
      document.querySelectorAll(".form-input").forEach((input) => {
        input.addEventListener("input", function () {
          this.classList.remove("error");
          const errorEl = document.getElementById(this.id + "Error");
          if (errorEl) errorEl.classList.remove("show");
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
