// Initialize Lenis Smooth Scroll
const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  smoothWheel: true,
  direction: 'vertical',
});

// Register GSAP Plugins
gsap.registerPlugin(ScrollTrigger, SplitText, ScrollToPlugin, ScrambleTextPlugin, CustomEase);

// Page Loader Reveal
function revealPage() {
    const tl = gsap.timeline();
    
    tl.to('#loader-logo', { 
        scrambleText: { 
            text: "LAGOS NEW COLOSSUS", 
            chars: "upperCase", 
            revealDelay: 0.5, 
            speed: 0.3 
        }, 
        opacity: 1, 
        duration: 2 
    });
    tl.to('#loader-progress', { width: '100%', duration: 1.5, ease: "power2.inOut" }, "-=0.5");
    tl.to('#loader', { clipPath: 'polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)', duration: 1.2, ease: "expo.inOut" });
    tl.from('nav', { y: -100, opacity: 0, duration: 1, ease: "power3.out" }, "-=0.5");
    
    tl.add(() => {
        initSlider();
        init3D();
        init3DStarfield();
        init3DIcons();
        initParallax();
        initMarquee();
        initDistrictCards();
        initFAQ();
    }, "-=1");
}

window.addEventListener('load', revealPage);

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);


// Custom Cursor
const cursor = document.querySelector('#cursor');
document.addEventListener('mousemove', (e) => {
    gsap.to(cursor, {
        x: e.clientX,
        y: e.clientY,
        duration: 0.1,
        ease: "power2.out"
    });
});

// Custom Cursor Interactions
const hoverTargets = 'a, button, .house-card, .district-card, .stage-card, .faq-header';
document.querySelectorAll(hoverTargets).forEach(el => {
    el.addEventListener('mouseenter', () => {
        gsap.to(cursor, { scale: 3, backgroundColor: 'rgba(43, 111, 255, 0.4)' });
        if (el.classList.contains('house-card') || el.classList.contains('district-card') || el.classList.contains('stage-card')) {
            gsap.to(el, { y: -10, duration: 0.4, ease: "power2.out" });
        }
    });
    el.addEventListener('mouseleave', () => {
        gsap.to(cursor, { scale: 1, backgroundColor: '#2B6FFF' });
        if (el.classList.contains('house-card') || el.classList.contains('district-card') || el.classList.contains('stage-card')) {
            gsap.to(el, { y: 0, duration: 0.4, ease: "power2.out" });
        }
    });
});

// Hero Slider Logic
let currentSlide = 0;
const slides = document.querySelectorAll('.h-slide');
const dots = document.querySelectorAll('.dot');
const slideInterval = 7000; // 7 seconds

function initSlider() {
    gsap.set(slides[0], { opacity: 1, visibility: 'visible' });
    animateSlideIn(slides[0]);
    startProgress(0);
}

function animateSlideIn(slide) {
    const title = slide.querySelector('h1');
    const p = slide.querySelector('p');
    const meta = slide.querySelector('.slide-meta');
    const btn = slide.querySelector('a');
    
    // Ensure visibility is reset for the upcoming slide
    gsap.set(slide, { visibility: 'visible' });
    
    const tl = gsap.timeline();
    // THE FIX: Animate BOTH local scale and global opacity for the slide
    tl.fromTo(slide, { opacity: 0, scale: 1.15 }, { opacity: 1, scale: 1, duration: 2, ease: "power2.out" });
    
    // Background continue to slowly zoom for Ken Burns feel
    gsap.to(slide, { scale: 0.98, duration: 10, ease: "power1.inOut", delay: 1 });
    
    if (meta) tl.fromTo(meta, { y: 20, opacity: 0 }, { y: 0, opacity: 1, duration: 1 }, "<0.5");
    
    if (title) {
        const splitTitle = new SplitText(title, { type: 'chars' });
        tl.fromTo(splitTitle.chars, 
            { y: 50, opacity: 0 }, 
            { y: 0, opacity: 1, duration: 1, stagger: 0.03, ease: "power4.out" }, 
            "-=0.8"
        );
    }
    
    if (p || btn) {
        tl.fromTo([p, btn], 
            { y: 30, opacity: 0 }, 
            { y: 0, opacity: 1, duration: 1, stagger: 0.1, ease: "power3.out" }, 
            "-=0.5"
        );
    }
}



function animateSlideOut(slide, callback) {
    const meta = slide.querySelector('.slide-meta');
    const title = slide.querySelector('h1');
    const p = slide.querySelector('p');
    const btn = slide.querySelector('a');
    
    const tl = gsap.timeline({
        onComplete: () => {
            gsap.set(slide, { visibility: 'hidden' });
            if (callback) callback();
        }
    });

    // Fade out elements first for a cleaner exit
    tl.to([meta, title, p, btn], { opacity: 0, y: -20, duration: 0.5, stagger: 0.05, ease: "power2.in" });
    tl.to(slide, { opacity: 0, duration: 0.8, ease: "power2.inOut" }, "-=0.3");
}

function goToSlide(index) {
    if (index === currentSlide) return;
    const prevSlide = slides[currentSlide];
    const nextSlide = slides[index];
    dots.forEach(dot => gsap.set(dot.querySelector('.progress'), { width: '0%' }));
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
    animateSlideOut(prevSlide);
    animateSlideIn(nextSlide);
    currentSlide = index;
    startProgress(index);
}

function startProgress(index) {
    const progress = dots[index].querySelector('.progress');
    gsap.fromTo(progress, { width: '0%' }, { 
        width: '100%', 
        duration: slideInterval / 1000, 
        ease: "none",
        onComplete: () => {
            let next = (index + 1) % slides.length;
            goToSlide(next);
        }
    });
}

dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        gsap.killTweensOf('.progress');
        goToSlide(i);
    });
});

// Magnetic Buttons (Tesoro Style)
document.querySelectorAll('.btn-apply, .btn-cta').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        gsap.to(btn, {
            x: x * 0.3,
            y: y * 0.3,
            duration: 0.3,
            ease: "power2.out"
        });
    });
    btn.addEventListener('mouseleave', () => {
        gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: "elastic.out(1, 0.3)" });
    });
});

// Infinite Marquee logic (LNC Slogan)
function initMarquee() {
    const marquee = document.querySelector('.marquee-inner');
    if (!marquee) return;
    const w = marquee.clientWidth;
    gsap.set(marquee, { x: 0 });
    gsap.to(marquee, {
        x: -w / 2,
        duration: 30,
        repeat: -1,
        ease: "none"
    });
}

// Mobile Menu Toggle
const navToggle = document.querySelector('#nav-toggle');
const navLinks = document.querySelector('.nav-links');

if (navToggle) {
    navToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        navToggle.classList.toggle('active');
    });
}

// Click Transition Interception
document.querySelectorAll('nav a').forEach(link => {
    link.addEventListener('click', (e) => {
        // Close mobile menu if open
        navLinks.classList.remove('active');
        if(navToggle) navToggle.classList.remove('active');
        
        const href = link.getAttribute('href');
        if (href.startsWith('#')) {
            e.preventDefault();
            const target = document.querySelector(href);
            const tl = gsap.timeline();
            tl.to('#loader', { clipPath: 'polygon(0% 100%, 100% 100%, 100% 0%, 0% 0%)', duration: 0.8, ease: "expo.inOut" });
            tl.add(() => { lenis.scrollTo(target, { offset: -90 }); });
            tl.to('#loader', { clipPath: 'polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)', duration: 0.8, ease: "expo.inOut", delay: 0.2 });
        }
    });
});

// Dynamic Theme & Side Nav Observer
const themeSections = ['hero', 'vision', 'structure', 'impacts', 'government', 'faq', 'house', 'about', 'cta-final'];
const sideDots = document.querySelectorAll('.side-dot');

const themeObserverOptions = {
    threshold: 0.5
};

const themeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const theme = entry.target.id === 'cta-final' ? 'cta' : entry.target.id;
            document.body.dataset.theme = theme;
            
            // Update Side Dots
            sideDots.forEach(dot => {
                dot.classList.toggle('active', dot.dataset.target === entry.target.id);
            });
        }
    });
}, themeObserverOptions);

themeSections.forEach(id => {
    const el = document.getElementById(id);
    if (el) themeObserver.observe(el);
});

// Side Nav Click Logic
sideDots.forEach(dot => {
    dot.addEventListener('click', () => {
        const targetId = dot.dataset.target;
        const target = document.getElementById(targetId);
        if (target) {
            lenis.scrollTo(target, { offset: -20 }); // Small offset for breathing room
        }
    });
});

// Section Title Reveals
gsap.utils.toArray('section h2:not(#loader-logo)').forEach(heading => {
    const split = new SplitText(heading, { type: 'lines,words' });
    gsap.from(split.lines, {
        scrollTrigger: {
            trigger: heading,
            start: "top 85%",
            toggleActions: "play none none reverse"
        },
        y: 100,
        opacity: 0,
        duration: 1.2,
        stagger: 0.1,
        ease: "power4.out"
    });
});

// Stage Cards Convergence
const cards = gsap.utils.toArray('.stage-card');
const startOffsets = [-150, 150, -250, 250];
cards.forEach((card, i) => {
    gsap.fromTo(card, {
        y: startOffsets[i] || 0,
        opacity: 0,
    }, {
        scrollTrigger: {
            trigger: '#mechanics',
            start: "top 80%",
            end: "top 20%",
            scrub: 1.5,
        },
        y: 0,
        opacity: 1,
        ease: "power2.out"
    });
});

// Image Reveal Masks
gsap.utils.toArray('.house-card').forEach(card => {
    const img = card.querySelector('img');
    const tl = gsap.timeline({ scrollTrigger: { trigger: card, start: "top 80%" } });
    tl.fromTo(card, { clipPath: 'inset(0 100% 0 0)' }, { clipPath: 'inset(0 0% 0 0)', duration: 1.5, ease: "expo.inOut" });
    tl.from(img, { scale: 1.5, duration: 1.5, ease: "expo.inOut" }, "<");
});

// Three.js Logic (Core Object)
function init3D() {
    const container = document.querySelector('#three-canvas-container');
    if (!container) return;
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);
    const shard = new THREE.Mesh(new THREE.OctahedronGeometry(2, 0), new THREE.MeshStandardMaterial({ color: 0x2F6FED, metalness: 0.9, roughness: 0.2 }));
    scene.add(shard);
    scene.add(new THREE.AmbientLight(0xffffff, 0.5));
    const pointLight = new THREE.PointLight(0xffffff, 1); pointLight.position.set(5, 5, 5); scene.add(pointLight);
    camera.position.z = 5;
    let mouseX = 0, mouseY = 0;
    document.addEventListener('mousemove', (e) => { mouseX = (e.clientX/window.innerWidth)-0.5; mouseY = (e.clientY/window.innerHeight)-0.5; });
    function animate() {
        requestAnimationFrame(animate);
        shard.rotation.y += 0.01; shard.rotation.x += 0.005;
        shard.position.y = Math.sin(Date.now() * 0.001) * 0.2;
        shard.position.x += (mouseX * 2 - shard.position.x) * 0.05;
        shard.rotation.z += (mouseY * 0.5 - shard.rotation.z) * 0.05;
        renderer.render(scene, camera);
    }
    animate();
}

// 3D Icons Logic for Format Cards
function init3DIcons() {
    const containers = document.querySelectorAll('.icon-3d-container');
    containers.forEach(container => {
        const shapeType = container.getAttribute('data-shape');
        const parentCard = container.closest('.stage-card');
        
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, 1, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight); 
        container.appendChild(renderer.domElement);

        let geometry;
        switch(shapeType) {
            case 'octahedron': geometry = new THREE.OctahedronGeometry(2, 0); break;
            case 'box': geometry = new THREE.BoxGeometry(2.5, 2.5, 2.5); break;
            case 'tetrahedron': geometry = new THREE.TetrahedronGeometry(2.5, 0); break;
            case 'icosahedron': geometry = new THREE.IcosahedronGeometry(2.5, 0); break;
            case 'torus': geometry = new THREE.TorusGeometry(1.8, 0.6, 16, 100); break;
            case 'dodecahedron': geometry = new THREE.DodecahedronGeometry(2.5, 0); break;
            case 'torusknot': geometry = new THREE.TorusKnotGeometry(1.5, 0.4, 100, 16); break;
            default: geometry = new THREE.SphereGeometry(2, 32, 32);
        }

        const material = new THREE.MeshStandardMaterial({ 
            color: 0x121212, 
            metalness: 0.8, 
            roughness: 0.2 
        });
        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);

        const light = new THREE.DirectionalLight(0xffffff, 1);
        light.position.set(2, 2, 5);
        scene.add(light);
        scene.add(new THREE.AmbientLight(0xffffff, 0.4));

        camera.position.z = 6;

        let rotationSpeed = 0.01;
        parentCard.addEventListener('mouseenter', () => {
            gsap.to(mesh.scale, { x: 1.2, y: 1.2, z: 1.2, duration: 0.5 });
            rotationSpeed = 0.05;
        });
        parentCard.addEventListener('mouseleave', () => {
            gsap.to(mesh.scale, { x: 1, y: 1, z: 1, duration: 0.5 });
            rotationSpeed = 0.01;
        });

        function animate() {
            requestAnimationFrame(animate);
            mesh.rotation.y += rotationSpeed;
            mesh.rotation.x += rotationSpeed / 2;
            renderer.render(scene, camera);
        }
        animate();
    });
}

// Three.js Starfield for Benefits
function init3DStarfield() {
    const container = document.querySelector('#benefits-3d-bg');
    if (!container) return;
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);
    const starsGeometry = new THREE.BufferGeometry();
    const posArray = new Float32Array(1000 * 3);
    for(let i=0; i < 3000; i++) { posArray[i] = (Math.random() - 0.5) * 50; }
    starsGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    const starsMesh = new THREE.Points(starsGeometry, new THREE.PointsMaterial({ size: 0.1, color: 0x5B8FF5 }));
    scene.add(starsMesh);
    camera.position.z = 5;
    function animate() {
        requestAnimationFrame(animate);
        starsMesh.rotation.y += 0.0005; renderer.render(scene, camera);
    }
    animate();
}

// Audition Cards Convergence
function initDistrictCards() {
    gsap.to('.district-card', {
        y: 0,
        scrollTrigger: {
            trigger: '.districts-grid',
            start: 'top 80%',
            end: 'bottom 20%',
            scrub: 1.5
        }
    });
}

// FAQ Accordion Interaction
function initFAQ() {
    document.querySelectorAll('.faq-header').forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            const wasActive = item.classList.contains('active');
            
            // Close all items
            document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
            
            // Toggle clicked item
            if (!wasActive) item.classList.add('active');
        });
    });
}

// District Cards Convergence Effect
function initDistrictCards() {
    gsap.utils.toArray('.district-card').forEach((card, i) => {
        gsap.to(card, {
            y: 0,
            scrollTrigger: {
                trigger: '#auditions',
                start: "top 80%",
                end: "bottom 60%",
                scrub: 1.5,
                toggleActions: "play reverse play reverse"
            }
        });
    });
}

// Parallax Scrolling
function initParallax() {
    gsap.utils.toArray('.parallax-element').forEach(el => {
        const speed = parseFloat(el.getAttribute('data-speed')) || 0.1;
        gsap.to(el, { scrollTrigger: { trigger: el, start: "top bottom", end: "bottom top", scrub: true }, y: (i, t) => -150 * speed, ease: "none" });
    });
}

// Handle ScrollTrigger updates on resize
window.addEventListener('resize', () => {
    ScrollTrigger.refresh();
});

