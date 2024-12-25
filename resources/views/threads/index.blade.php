<!-- resources/views/threads/index.blade.php -->
@extends('layouts.app')

@section('content')
<main class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($threads as $thread)
            <div class="bg-white border border-gray-200 mb-4" 
                 data-expires-at="{{ $thread->expires_at ? $thread->expires_at->toISOString() : '' }}">
                <div class="p-4">
                    <div class="flex items-center space-x-2 mb-3">
                        <img src="{{ asset('images/avatars/' . $thread->avatar) }}" 
                             alt="作成者のアバター" 
                             class="w-10 h-10 rounded-full"
                             onerror="this.src='{{ asset('images/avatars/avatar1.PNG') }}'">
                        <div class="flex flex-col">
                            <span class="font-medium text-gray-700 line-clamp-1">{{ $thread->title }}</span>
                            <span class="text-xs text-gray-500">{{ $thread->username }}</span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-800 leading-relaxed">
                        <p class="line-clamp-2">{{ $thread->description }}</p>
                    </div>
                </div>
                <div class="px-4 py-2 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col items-start">
                            <a href="{{ route('threads.show', $thread) }}" class="inline-block bg-black text-white px-3 py-1 text-xs rounded hover:bg-gray-800 transition-colors w-12 text-center">
                                詳細
                            </a>
                            <span class="text-xs text-gray-500 mt-1 expiration-time">
                                スレッド削除まで残り: {{ $thread->expires_at ? now()->diffForHumans($thread->expires_at, ['syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW]) : '無期限' }}
                            </span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="ml-1 text-sm">{{ $thread->posts->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-8 text-gray-500">
                スレッドがまだありません。新しいスレッドを作成してみましょう！
            </div>
        @endforelse
    </div>
</main>
@endsection