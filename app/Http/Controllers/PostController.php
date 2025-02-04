<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
// 🐶以下1行追加
use App\Helpers\RandomGenerator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Thread $thread)
    {
        // スレッドに紐づく投稿を取得
        $posts = $thread->posts;
        return view('threads.show', compact('posts', 'thread'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create', compact('thread'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Thread $thread)
    {
        // バリデーション
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        // スレッドの有効期限を60秒延長
        $thread->expires_at = now()->addSeconds(60);
        $thread->save();

        // 新しい投稿を保存
        $post = new Post();
        $post->content = $validated['content'];
        $post->thread_id = $thread->id;
        //$post->username = '匿名ユーザー';
        // 🐶以下2行追加
        $post->username = RandomGenerator::generateUsername(); // ランダムなユーザー名を生成
        $post->avatar = RandomGenerator::getRandomAvatar();   // ランダムなアバターを生成
        $post->expires_at = now()->addSeconds(60); // 60秒後に期限切れ
        $post->save();

        return redirect()->route('threads.show', $thread->id)
            ->with('success', 'コメントが投稿されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('threads.show', $post->thread->id)->with('success', '投稿が削除されました。');
    }
}
