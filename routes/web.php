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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('threads/index');
});

// 追加💡スレッド関連のリソースルート
Route::resource('threads', ThreadController::class);

// 投稿関連のルート
Route::prefix('threads/{thread}')->group(function () {
    // コメント投稿
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    
    // コメント削除
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // スタンプ関連
    Route::post('posts/{post}/stamps', [StampController::class, 'store'])->name('stamps.store');
    Route::delete('posts/{post}/stamps/{stamp}', [StampController::class, 'destroy'])->name('stamps.destroy');
});