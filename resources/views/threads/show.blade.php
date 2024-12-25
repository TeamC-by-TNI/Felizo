<!-- resources/views/threads/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- スレッドのヘッダー部分 -->
    <div class="bg-white shadow rounded-lg p-4 md:p-6 mb-6">
        <div class="flex items-center mb-4">
            <img src="{{ asset('images/avatars/' . $thread->avatar) }}" alt="作成者のアバター" class="w-8 h-8 rounded-full">
            <div class="ml-3">
                <h1 class="text-2xl md:text-3xl font-bold mb-2">{{ $thread->title }}</h1>
                <div class="flex items-center text-gray-500 text-xs md:text-sm mb-4">
                    <span class="mr-2">{{ $thread->username }}</span>
                    <span>投稿日時: {{ $thread->created_at->format('Y/m/d H:i') }}</span>
                </div>
            </div>
        </div>
        <p class="text-gray-700 text-sm md:text-base">{!! nl2br(e($thread->description)) !!}</p>
    </div>

    <!-- コメント投稿フォーム -->
    <div class="bg-white shadow rounded-lg p-4 md:p-6 mb-6">
        <h2 class="text-lg md:text-xl font-bold mb-4">コメントを投稿</h2>
        <form action="{{ route('posts.store', $thread) }}" method="POST">
            @csrf
            <div class="mb-4">
                <textarea 
                    id = "comment"
                    name="content" 
                    class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('content') border-red-500 @enderror" 
                    rows="3" 
                    placeholder="コメントを入力してください"
                >{{ old('content') }}</textarea>
                <!-- ↑old('description')で送信失敗時には内容を保持する -->
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-right">
            <button type="submit" 
                    id="submitButton2" 
                    class="font-bold py-2 px-6 rounded transition-colors 
                        duration-200 bg-gray-400 text-white cursor-not-allowed" 
                    disabled>
                    投稿する
                    </button>
            </div>
        </form>
    </div>

    <!-- コメント一覧 -->
    <div class="space-y-4">
        <h2 class="text-lg md:text-xl font-bold mb-4">コメント</h2>
        @if(isset($thread->posts) && count($thread->posts) > 0)
            @foreach($thread->posts as $post)
                <div class="comment-item bg-white shadow rounded-lg p-4 md:p-6"
                    data-created-at="{{ $post->created_at->toISOString() }}">
                    <div class="flex items-start">
                        <img src="{{ asset('images/avatars/' . $post->avatar) }}" alt="投稿者のアバター" class="w-6 h-6 rounded-full">
                            <div class="ml-3 flex-grow">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <span class="font-medium text-sm">{{ $post->username }}</span>
                                        <span class="text-gray-500 text-xs md:text-sm ml-2">{{ $post->created_at->format('Y/m/d H:i') }}</span>
                                        <span class="text-xs text-red-500 ml-2">(60秒後に削除されます)</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <!-- スタンプボタン -->
                                        <form action="{{ route('stamps.store', $post) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                                👍
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-sm md:text-base">{!! nl2br(e($post->content)) !!}</p>
                            </div>
                        </div>
                    </div>
            @endforeach
        @else
            <div class="bg-white shadow rounded-lg p-4 md:p-6 text-center text-gray-500 text-sm md:text-base">
                まだコメントがありません。最初のコメントを投稿してみましょう！
            </div>
        @endif
    </div>
</div>
@endsection