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


// 追加💡
Route::prefix('threads')->group(function () {
    // スレッド一覧表示（index.phpに来た人が興味のあるスレッドを探す）
    Route::get('/', [ThreadController::class, 'index'])
        ->name('threads.index');

    // スレッド詳細表示 (index.phpの中で興味のあるスレッドを表示する)
    Route::get('/{thread}', [ThreadController::class, 'show'])
        ->name('threads.show');
    
    // スレッド作成フォーム表示（興味のあるスレッドの中で新規のコメントを作成する）
    Route::get('/create', [ThreadController::class, 'create'])
        ->name('threads.create');
    
    // スレッド保存処理（新規のコメントを投稿する）
    Route::post('/', [ThreadController::class, 'store'])
        ->name('threads.store');
    
    // コメント投稿
    Route::post('/{thread}/posts', [PostController::class, 'store'])
        ->name('posts.store');
    
    // コメント削除
    Route::delete('/{thread}/posts/{post}', [PostController::class, 'destroy'])
        ->name('posts.destroy');
    
    // スタンプ追加
    Route::post('/posts/{post}/stamps', [StampController::class, 'store'])
        ->name('stamps.store');
    
    // スタンプ削除
    Route::delete('/posts/{post}/stamps/{stamp}', [StampController::class, 'destroy'])
        ->name('stamps.destroy');
    
});

// 💡各viewfileでいでっちが下記のコードを入力必要？とりあえずプルするのでいでっち確認後、こちら削除してOK

// index.blade.php での詳細ページへのリンク
<a href="{{ route('threads.show', $thread) }}">詳細を見る</a>

// index.blade.php での新規作成ページへのリンク
<a href="{{ route('threads.create') }}">新規スレッド作成</a>

// create.blade.php でのフォームのaction
<form action="{{ route('threads.store') }}" method="POST">
    @csrf
    // フォームの内容
</form>

// コメント投稿フォーム
<form action="{{ route('posts.store', $thread) }}" method="POST">
    @csrf
    <textarea name="content"></textarea>
    <button type="submit">投稿</button>
</form>

// スタンプボタン
<form action="{{ route('stamps.store', $post) }}" method="POST">
    @csrf
    <button type="submit">👍</button>
</form>