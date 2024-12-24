<!-- resources/views/threads/index.blade.php -->
@extends('layouts.app')
        <!-- Bladeテンプレートエンジン メモ
        @extends('layouts.app') - 共通レイアウトを継承
        @section('content') - コンテンツ部分の定義
        @yield('content') - コンテンツを表示する場所の指定 -->

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">スレッド一覧</h1>
        <a href="{{ route('threads.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            新規スレッド作成
        </a>
    </div>

    <div class="space-y-4">
        <!-- ここにスレッド一覧が表示されます -->
        <!-- 後ほどコントローラーから渡されたデータを使って表示します -->
        <div class="bg-white shadow rounded p-4">
            <h2 class="text-xl font-semibold">サンプルスレッド</h2>
            <p class="text-gray-600 mt-2">スレッドの説明文がここに表示されます</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-sm text-gray-500">投稿日時: 2024/12/21</span>
                <a href="#" class="text-blue-500 hover:text-blue-700">詳細を見る →</a>
            </div>
        </div>
    </div>
</div>
@endsection