<a href="{{ route('home') }}">
    <svg viewBox="0 0 540 120" xmlns="http://www.w3.org/2000/svg" shape-rendering="crispEdges" {{ $attributes->merge(['class' => 'brand-logo w-auto']) }}>
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

        <!-- Emblem Background Box with Pixel Frame -->
        <g transform="translate(15, 15)">
            <!-- Outer Pixel Border / Shadow -->
            <rect x="0" y="4" width="90" height="82" fill="#090d16" />
            <rect x="4" y="0" width="82" height="90" fill="#090d16" />

            <!-- Main Pixel Box Body -->
            <rect x="4" y="4" width="82" height="82" fill="url(#slate-nav-grad)" stroke="url(#gold-grad)" stroke-width="4" />

            <!-- Inner Pixel Grid Frame -->
            <rect x="8" y="8" width="74" height="74" fill="none" stroke="#334155" stroke-width="2" />

            <!-- Pixel Art 'W' Formed with Pixel Blocks -->
            <!-- Left Stem -->
            <rect x="18" y="24" width="6" height="28" fill="url(#gold-grad)" />
            <rect x="24" y="44" width="6" height="12" fill="url(#gold-grad)" />

            <!-- Center Dip & Peak -->
            <rect x="30" y="52" width="6" height="10" fill="url(#gold-grad)" />
            <rect x="36" y="40" width="6" height="22" fill="url(#gold-grad)" />
            <rect x="42" y="32" width="6" height="14" fill="url(#gold-grad)" />
            <rect x="48" y="40" width="6" height="22" fill="url(#gold-grad)" />
            <rect x="54" y="52" width="6" height="10" fill="url(#gold-grad)" />

            <!-- Right Stem -->
            <rect x="60" y="44" width="6" height="12" fill="url(#gold-grad)" />
            <rect x="66" y="24" width="6" height="28" fill="url(#gold-grad)" />

            <!-- Pixel Accent Dot -->
            <rect x="66" y="58" width="6" height="6" fill="#FDE047" />
        </g>

        <!-- Typography -->
        <!-- Part 1: Whiscra -->
        <text x="125" y="73"
              font-family="system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
              font-weight="900"
              font-size="46"
              fill="#ffffff"
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
