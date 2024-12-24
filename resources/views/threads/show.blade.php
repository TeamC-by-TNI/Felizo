<!-- resources/views/threads/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- スレッドのヘッダー部分 -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h1 class="text-3xl font-bold mb-2">{{$thread->title}}</h1>
        <div class="flex items-center text-gray-500 text-sm mb-4">
            <span>投稿日時: 2024/12/21</span>
            <span class="mx-2">•</span>
            <span>投稿者: ユーザー名</span>
        </div>
        <p class="text-gray-700">{{$thread->discription}}</p>
    </div>

    <!-- コメント投稿フォーム -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-bold mb-4">コメントを投稿</h2>
        <form action="{{ route('posts.store', $thread) }}" method="POST">
        @csrf
            <div class="mb-4">
                <textarea class="w-full border-gray-300 rounded-md shadow-sm" rows="3" placeholder="コメントを入力してください"></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    投稿する
                </button>
            </div>
        </form>
    </div>

    <!-- コメント一覧 -->
    <div class="space-y-4">
        <h2 class="text-xl font-bold mb-4">コメント</h2>
        <!-- サンプルコメント -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <span class="font-semibold">ユーザー名</span>
                    <span class="text-gray-500 text-sm ml-2">2024/12/21 17:00</span>
                </div>
                <!-- スタンプボタン -->
                <button class="text-gray-500 hover:text-gray-700">
                    👍
                </button>
            </div>
            <p class="text-gray-700">コメントの内容がここに表示されます</p>
        </div>
    </div>
</div>
@endsection