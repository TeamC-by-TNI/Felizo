<!-- resources/views/threads/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- スレッドのヘッダー部分 -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h1 class="text-3xl font-bold mb-2">{{ $thread->title }}</h1>
        <div class="flex items-center text-gray-500 text-sm mb-4">
            <span>投稿日時: {{ $thread->created_at->format('Y/m/d H:i') }}</span>
        </div>
        <p class="text-gray-700">{{ $thread->description }}</p>
    </div>

    <!-- コメント投稿フォーム -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-bold mb-4">コメントを投稿</h2>
        <form action="{{ route('posts.store', $thread) }}" method="POST">
            @csrf
            <div class="mb-4">
                <textarea 
                    name="description" 
                    class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('description') border-red-500 @enderror" 
                    rows="3" 
                    placeholder="コメントを入力してください"
                >{{ old('description') }}</textarea>
                <!-- ↑old('description')で送信失敗時には内容を保持する -->
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-right">
            <button type="submit" id="submitButton2" class="font-bold py-2 px-6 rounded transition-colors 
                        duration-200 bg-gray-400 text-white cursor-not-allowed" disabled>
                    投稿する
                    </button>
            </div>
        </form>
    </div>

    <!-- コメント一覧 -->
    <div class="space-y-4">
        <h2 class="text-xl font-bold mb-4">コメント</h2>
        @if(isset($thread->posts) && count($thread->posts) > 0)
            @foreach($thread->posts as $post)
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="text-gray-500 text-sm ml-2">{{ $post->created_at->format('Y/m/d H:i') }}</span>
                        </div>
                        <!-- スタンプボタン -->
                        <form action="{{ route('stamps.store', $post) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                👍
                            </button>
                        </form>
                    </div>
                    <p class="text-gray-700">{{ $post->description }}</p>
                </div>
            @endforeach
        @else
            <div class="bg-white shadow rounded-lg p-6 text-center text-gray-500">
                まだコメントがありません。最初のコメントを投稿してみましょう！
            </div>
        @endif
    </div>
</div>
@endsection