<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile['name'] ?? 'Portfolio' }} — {{ $profile['role'] ?? '' }}</title>
    <meta name="description" content="{{ $profile['tagline'] ?? '' }}">

    <!-- Tailwind (CDN untuk kemudahan setup awal — untuk produksi sebaiknya ganti ke Tailwind via Vite, lihat README) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy:      #10213F;
            --navy-2:    #1B3159;
            --paper:     #F5F6F8;
            --paper-2:   #ECEEF2;
            --brass:     #A9812F;
            --brass-lt:  #C7A24F;
            --ink:       #1A1D24;
            --slate:     #5B6472;
            --line:      #D8DBE2;
        }
        body {
            background: var(--paper);
            color: var(--ink);
            font-family: 'Inter', system-ui, sans-serif;
        }
        .font-display { font-family: 'Fraunces', serif; }
        .font-mono { font-family: 'IBM Plex Mono', monospace; }

        /* Dot-leader index list, like a table of contents in a formal report */
        .toc-item {
            display: flex;
            align-items: baseline;
            gap: 0.5rem;
            text-decoration: none;
            color: var(--slate);
            padding: 0.35rem 0;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.8rem;
            letter-spacing: 0.02em;
            transition: color 0.2s ease;
        }
        .toc-item .num { color: var(--brass); flex-shrink: 0; }
        .toc-item .leader {
            flex: 1;
            border-bottom: 1px dotted var(--line);
            height: 1px;
            transform: translateY(-4px);
        }
        .toc-item:hover, .toc-item.active { color: var(--navy); }
        .toc-item.active .num { color: var(--navy); }

        /* Corner-bracket frame, evokes a formal document / drafting stamp */
        .bracket-frame { position: relative; }
        .bracket-frame::before, .bracket-frame::after,
        .bracket-frame > .bl, .bracket-frame > .br {
            content: '';
            position: absolute;
            width: 18px; height: 18px;
            border-color: var(--brass);
        }
        .bracket-frame::before { top: -8px; left: -8px; border-top: 2px solid; border-left: 2px solid; }
        .bracket-frame::after { top: -8px; right: -8px; border-top: 2px solid; border-right: 2px solid; }
        .bracket-frame > .bl { bottom: -8px; left: -8px; border-bottom: 2px solid; border-left: 2px solid; position: absolute; }
        .bracket-frame > .br { bottom: -8px; right: -8px; border-bottom: 2px solid; border-right: 2px solid; position: absolute; }

        .section-eyebrow {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.72rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--brass);
        }

        ::selection { background: var(--brass-lt); color: var(--navy); }

        @media (prefers-reduced-motion: reduce) {
            * { animation: none !important; transition: none !important; }
        }
    </style>
</head>
<body class="antialiased">
    @yield('content')

    <script>
        // Highlight active section in the index (TOC) as user scrolls
        const sections = document.querySelectorAll('main [data-section]');
        const tocLinks = document.querySelectorAll('.toc-item');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    tocLinks.forEach(link => {
                        link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                    });
                }
            });
        }, { rootMargin: '-40% 0px -50% 0px' });
        sections.forEach(section => observer.observe(section));

        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }
    </script>
</body>
</html>
