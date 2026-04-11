<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seo['title'] ?? config('app.name') }} | The Scholarly Atelier</title>
    <meta name="description" content="{{ $seo['description'] ?? '' }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #0D223F;
            --gold: #FDC003;
            --crimson: #BA1A1A;
            --background: #faf8ff;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(250, 248, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .signature-gradient {
            background: linear-gradient(135deg, #0D223F 0%, #000B20 100%);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-background font-body text-on-surface antialiased">
    <x-header />

    <main class="pt-20">
        @yield('content')
    </main>

    <x-footer />

    <!-- Support FAB -->
    <div class="fixed bottom-8 right-8 z-50">
        <button class="bg-[#000B20] text-[#FDC003] w-16 h-16 rounded-full flex items-center justify-center shadow-2xl hover:brightness-110 transition-all group border-2 border-[#FDC003]/20">
            <span class="material-symbols-outlined text-3xl group-hover:scale-110 transition-transform">support_agent</span>
        </button>
    </div>

    @stack('scripts')
</body>
</html>

