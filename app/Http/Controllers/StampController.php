<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use App\Models\StampType;
use Illuminate\Http\Request;

class StampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
{
    // 投稿に対するスタンプ一覧を取得
    $stamps = $post->stamps()->with('user', 'stampType')->get();

    return view('posts.stamps.index', compact('stamps', 'post'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
{
    // バリデーション（スタンプIDとユーザーIDが正しいか）
    $request->validate([
        'stamp_type_id' => 'required|exists:stamp_types,id', // スタンプの種類ID
    ]);

    // 現在のユーザー
    $user = auth()->user();

    // ユーザーがすでにこの投稿にスタンプを押しているか確認
    $existingStamp = $post->stamps()->where('user_id', $user->id)->first();

    if ($existingStamp) {
        // すでにスタンプを押している場合は何もしないか、再選択を促すなど
        return back()->with('message', 'You already stamped this post!');
    }

    // 新しいスタンプを保存
    $post->stamps()->create([
        'user_id' => $user->id,
        'stamp_type_id' => $request->stamp_type_id,
    ]);

    return back()->with('message', 'Stamp added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Stamp $stamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stamp $stamp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stamp $stamp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, $stampId)
{
    // 現在のユーザー
    $user = auth()->user();

    // ユーザーが押したスタンプを削除
    $stamp = $post->stamps()->where('user_id', $user->id)->where('id', $stampId)->first();

    if ($stamp) {
        $stamp->delete();
        return back()->with('message', 'Stamp removed successfully!');
    }

    return back()->with('error', 'You haven\'t stamped this post!');
}
}
