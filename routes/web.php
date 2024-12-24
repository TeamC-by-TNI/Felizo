<?php

/*
************************************************************************************
Route::httpメソッド('ドメイン以下URL',[コントローラ::class, 'メソッド'])->name('ルート名');
門脇追加したコードの上には💡の絵文字を入れてます。$threads={threads}ルートパラメーターを渡す
**************************************************************************************/


use Illuminate\Support\Facades\Route;
// 追加💡
use App\Http\Controllers\PostController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\ThreadController;

Route::get('/',[ThreadController::class, 'index']);


// 追加💡スレッド関連のリソースルート
Route::resource('threads', ThreadController::class);
Route::resource('posts', PostController::class);
Route::resource('stamps', StampController::class);
// Route::resource('stamp_types', stamp_typesController::class);

// 個別のThreadsでコメントをpostして保存
Route::post('/threads/{thread}/posts', [PostController::class, 'store'])->name('posts.store');

//🐶検索機能のため追加
Route::get('/search', [ThreadController::class, 'search'])->name('threads.search');