<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Felizo</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white">
    <header class="bg-purple-500 py-4 px-4">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-4 md:gap-0">
            <!-- ロゴ -->
            <div class="w-full md:w-auto text-center md:text-left">
                <a href="{{ route('threads.index') }}" class="text-2xl font-bold text-white hover:text-gray-100">Felizo</a>
            </div>
        
            <!-- 検索バー -->
            <div class="relative w-full md:w-96">
                <form action="{{ route('threads.search') }}" method="GET" class="flex items-center justify-center gap-2">
                    <div class="relative w-full max-w-md">
                        <input
                            type="text" 
                            name="query"
                            placeholder="検索" 
                            class="w-full px-3 py-1.5 rounded-full bg-white focus:outline-none"
                            value="{{ request('query') }}"
                        >
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        
            <!-- Createボタン -->
            <div class="w-full md:w-auto text-center md:text-right">
                <a href="{{ route('threads.create') }}" class="inline-flex items-center gap-1 bg-white px-4 py-1.5 rounded-full hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Create</span>
                </a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-purple-500 text-white text-center py-4">
        Felizo 2024 All Rights reserved.
    </footer>
    @stack('scripts')
</body>