<!-- resources/views/threads/index.blade.php -->
@extends('layouts.app')

@section('content')

<main class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($threads as $thread)
            <div class="bg-white border border-gray-200">
                <div class="p-4">
                    <div class="flex items-center space-x-2 mb-3">
                        <!-- ※下記のアイコンの記述はとりあえずランダムに3色を表示させるものなので、アイコンテーブルが出来たら要編集※ -->
                        <div class="w-3 h-3 rounded-full bg-{{ $loop->iteration % 3 === 1 ? 'gray' : ($loop->iteration % 3 === 2 ? 'green' : 'red') }}-200"></div>
                        <span class="font-medium text-gray-700 line-clamp-1">{{ $thread->title }}</span>
                    </div>
                    <div class="space-y-2">
                        <div class="text-sm text-gray-800 leading-relaxed">
                            <!-- 説明文を2行で切り取る -->
                            <p class="line-clamp-2">{{ $thread->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-2 border-t border-gray-100">
                    <a href="{{ route('threads.show', $thread) }}" class="block w-full bg-black text-white px-4 py-1 text-sm rounded hover:bg-gray-800 transition-colors text-center">
                        詳細
                    </a>
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
