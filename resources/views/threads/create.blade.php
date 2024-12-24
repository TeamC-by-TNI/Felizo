<!-- resources/views/threads/create.blade.php -->
@extends('layouts.app')


@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">新規スレッド作成</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('threads.store') }}" method="POST">
            @csrf
                <!-- タイトル入力 -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        タイトル
                    </label>
                    <input type="text" id="title" name="title" 
                           class="w-full border-gray-300 rounded-md shadow-sm" 
                           placeholder="スレッドのタイトル">
                </div>

                <!-- 内容入力 -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        内容
                    </label>
                    <textarea id="description" name="description" rows="5" 
                              class="w-full border-gray-300 rounded-md shadow-sm"
                              placeholder="スレッドの内容"></textarea>
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