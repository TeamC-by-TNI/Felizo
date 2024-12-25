<!-- resources/views/threads/index.blade.php -->
@extends('layouts.app')

@section('content')

<main class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($threads as $thread)
            <div class="bg-white border border-gray-200 mb-4">
                <div class="p-4">
                    <div class="flex items-center space-x-2 mb-3">
                        <!-- ※下記のアイコンの記述はとりあえずランダムに3色を表示させるものなので、アイコンテーブルが出来たら要編集※ -->
                        <div class="w-3 h-3 rounded-full bg-{{ $loop->iteration % 3 === 1 ? 'gray' : ($loop->iteration % 3 === 2 ? 'green' : 'red') }}-200"></div>
                        <span class="font-medium text-gray-700  line-clamp-1">{{ $thread->title }}</span>
                    </div>
                    <div class="space-y-2">
                        <div class="text-sm text-gray-800 leading-relaxed">
                            <!-- 説明文を2行で切り取る -->
                            <p class="line-clamp-2">{{ $thread->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-2 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <a href="{{ route('threads.show', $thread) }}" class="inline-block bg-black text-white px-3 py-1 text-xs rounded hover:bg-gray-800 transition-colors">
                                詳細
                            </a>
                            <span class="text-xs text-gray-500 mt-1">
                                残り時間: {{ $thread->expires_at ? $thread->expires_at->diffForHumans() : '無期限' }}
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