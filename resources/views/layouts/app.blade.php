<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IkiCode — {{ $profile['role'] ?? 'Portfolio' }}</title>
    <meta name="description" content="{{ $profile['tagline'] ?? '' }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:   '#0F172A',
                        navy2:  '#1E293B',
                        brand:  '#6366F1',
                        'brand-light': '#818CF8',
                        accent: '#F59E0B',
                        paper:  '#F8FAFC',
                        'paper-2': '#F1F5F9',
                    },
                    fontFamily: {
                        display: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                        body:    ['Inter', 'system-ui', 'sans-serif'],
                        mono:    ['"JetBrains Mono"', 'monospace'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out forwards',
                        'slide-up': 'slideUp 0.6s ease-out forwards',
                        'slide-left': 'slideLeft 0.6s ease-out forwards',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 3s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { opacity: '0', transform: 'translateY(30px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        slideLeft: { '0%': { opacity: '0', transform: 'translateX(30px)' }, '100%': { opacity: '1', transform: 'translateX(0)' } },
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-10px)' } },
                        glow: { '0%': { boxShadow: '0 0 20px rgba(99,102,241,0.3)' }, '100%': { boxShadow: '0 0 40px rgba(99,102,241,0.5)' } },
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { scroll-behavior: smooth; }
        body { font-family: 'Inter', system-ui, sans-serif; }

        .gradient-text {
            background: linear-gradient(135deg, #6366F1 0%, #A855F7 50%, #EC4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gradient-border {
            position: relative;
            background: white;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, #6366F1, #A855F7, #EC4899);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .skill-pill {
            transition: all 0.2s ease;
        }
        .skill-pill:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #6366F1, #818CF8);
            color: white;
        }

        .section-number {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            color: #6366F1;
            font-weight: 600;
        }

        ::selection { background: #C7D2FE; color: #312E81; }

        @media (prefers-reduced-motion: reduce) {
            * { animation: none !important; transition: none !important; }
        }

        .nav-link {
            position: relative;
            transition: color 0.2s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366F1, #A855F7);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-paper text-slate-800 antialiased">
    @yield('content')

    <script>
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(link => {
                        link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id);
                    });
                }
            });
        }, { rootMargin: '-50% 0px -50% 0px' });
        sections.forEach(s => observer.observe(s));

        // Animate on scroll
        const animateOnScroll = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                    entry.target.style.opacity = '1';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            el.style.opacity = '0';
            animateOnScroll.observe(el);
        });

        // Mobile menu
        const menuBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
