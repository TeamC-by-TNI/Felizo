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
<body>
    <header>
        <!-- ヘッダーコンテンツをここに -->
    </header>

    <main>
        @yield('content')
        <!-- Bladeテンプレートエンジン メモ
        @extends('layouts.app') - 共通レイアウトを継承
        @section('content') - コンテンツ部分の定義
        @yield('content') - コンテンツを表示する場所の指定 -->
    </main>

    <footer>
        <!-- フッターコンテンツをここに -->
    </footer>
</body>