<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Felizo') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white">
    <!-- ヘッダー -->
    <header class="bg-purple-500 py-2 px-4 flex items-center justify-between">
        <div class="text-2xl font-bold text-white">Felizo</div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input
                    type="text"
                    placeholder="検索"
                    class="w-64 px-4 py-1 rounded-lg focus:outline-none"
                >
            </div>
            <button class="flex items-center space-x-1 bg-white px-3 py-1 rounded-lg hover:bg-gray-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Create</span>
            </button>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-purple-500 text-white text-center py-4">
        Felizo 2024 All Rights reserved.
    </footer>
</body>
</body>