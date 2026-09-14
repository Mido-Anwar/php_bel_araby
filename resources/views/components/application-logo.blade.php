<a href="{{ route('home') }}">
    <svg viewBox="0 0 520 120" xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => 'brand-logo w-auto']) }}>
        <defs>
            <!-- Gold Metallic Gradient -->
            <linearGradient id="gold-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#FDE047" />
                <stop offset="50%" stop-color="#EAB308" />
                <stop offset="100%" stop-color="#CA8A04" />
            </linearGradient>

            <!-- Dark Kohl Navy Gradient -->
            <linearGradient id="slate-nav-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#1e293b" />
                <stop offset="100%" stop-color="#0f172a" />
            </linearGradient>
        </defs>

        <!-- CSS Media Queries inside SVG for responsive scaling -->
        <style>
            .brand-logo {
                height: 2.75rem;
                transition: all 0.3s ease;
            }
            @media (min-width: 640px) {
                .brand-logo {
                    height: 3.25rem;
                }
            }
            @media (min-width: 1024px) {
                .brand-logo {
                    height: 3.75rem;
                }
            }
        </style>

        <!-- Emblem Background Box -->
        <g transform="translate(15, 15)">
            <rect x="0" y="0" width="90" height="90" rx="22" fill="url(#slate-nav-grad)" stroke="url(#gold-grad)" stroke-width="2.5" />
            
            <!-- Geometric W with Gold Accents -->
            <path d="M 22 28 L 35 70 L 45 48 L 55 70 L 68 28" 
                  fill="none" 
                  stroke="url(#gold-grad)" 
                  stroke-width="8" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" />
            
            <!-- Accent Dot -->
            <circle cx="68" cy="70" r="4.5" fill="url(#gold-grad)" />
        </g>

        <!-- Typography -->
        <!-- Part 1: Whiscra -->
        <text x="125" y="73" 
              font-family="system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif" 
              font-weight="900" 
              font-size="46" 
              fill="#f3ebeb" 
              letter-spacing="-0.5">
            Whiscra
        </text>

        <!-- Part 2: show -->
        <text x="295" y="73" 
              font-family="system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif" 
              font-weight="900" 
              font-size="46" 
              fill="url(#gold-grad)" 
              letter-spacing="-0.5">
            show
        </text>
    </svg>
</a>