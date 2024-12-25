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
    public function store(Request $request, $type, $id)
    {
        $request->validate([
            'stamp_type_id' => 'required|exists:stamp_types,id',
        ]);
    
        $stampable = $type === 'thread' 
            ? Thread::findOrFail($id) 
            : Post::findOrFail($id);
    
        // 既存のスタンプをチェック
        $existingStamp = $stampable->stamps()
            ->where('user_id', auth()->id())
            ->where('stamp_type_id', $request->stamp_type_id)
            ->first();
    
        if ($existingStamp) {
            return response()->json([
                'success' => false,
                'message' => 'Already stamped'
            ]);
        }
    
        // 新しいスタンプを作成
        $stamp = $stampable->stamps()->create([
            'user_id' => auth()->id(),
            'stamp_type_id' => $request->stamp_type_id,
        ]);
    
        // スタンプの集計を取得
        $stamps = $stampable->stamps()
            ->with('stampType')
            ->get()
            ->groupBy('stamp_type_id')
            ->map(function($stamps) {
                $stampType = $stamps->first()->stampType;
                return [
                    'name' => $stampType->name,
                    'icon_path' => $stampType->icon_path,
                    'count' => $stamps->count()
                ];
            });
    
        return response()->json([
            'success' => true,
            'stamps' => $stamps,
            'totalCount' => $stampable->stamps->count()
        ]);
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
