<!-- resources/views/threads/index.blade.php -->
@extends('layouts.app')

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
                <a href="{{ route('threads.show', $thread) }}" class="text-blue-500 hover:text-blue-700">詳細を見る →</a>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- <main class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-3 gap-6">
        @forelse($threads as $thread)
            <div class="bg-white border border-gray-200 mb-4">
                <div class="p-4">
                    <div class="flex items-center space-x-2 mb-3">
                        ※下記のアイコンの記述はとりあえずランダムに3色を表示させるものなので、アイコンテーブルが出来たら要編集※
                        <div class="w-3 h-3 rounded-full bg-{{ $loop->iteration % 3 === 1 ? 'gray' : ($loop->iteration % 3 === 2 ? 'green' : 'red') }}-200"></div>
                        <span class="font-medium text-gray-700">{{ $thread->title }}</span>
                    </div>
                    <div class="space-y-2">
                        <div class="text-sm text-gray-800 leading-relaxed">
                            {{-- 説明文を2行で切り取る --}}
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
            <div class="col-span-3 text-center py-8 text-gray-500">
                スレッドがまだありません。新しいスレッドを作成してみましょう！
            </div>
        @endforelse

    </div>
</main> -->