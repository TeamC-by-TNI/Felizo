<!-- resources/views/threads/create.blade.php -->
@extends('layouts.app')
        <!-- Bladeテンプレートエンジン メモ
        @extends('layouts.app') - 共通レイアウトを継承
        @section('content') - コンテンツ部分の定義
        @yield('content') - コンテンツを表示する場所の指定 -->


@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">新規スレッド作成</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form action="#" method="POST">
                <!-- タイトル入力 -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        タイトル
                    </label>
                    <input type="text" id="title" name="title" 
                           class="w-full border-gray-300 rounded-md shadow-sm" 
                           placeholder="スレッドのタイトルを入力してください">
                </div>

                <!-- 内容入力 -->
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        内容
                    </label>
                    <textarea id="content" name="content" rows="5" 
                              class="w-full border-gray-300 rounded-md shadow-sm"
                              placeholder="スレッドの内容を入力してください"></textarea>
                </div>

                <!-- 投稿ボタン -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                        投稿する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection