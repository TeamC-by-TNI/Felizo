<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $threads = Thread::all();
        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // 新しいスレッドを保存
        $thread = Thread::create($validated);

        // 作成したスレッドの詳細ページにリダイレクト
        return redirect()->route('threads.show', $thread->id)
            ->with('success', 'スレッドが作成されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        //
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        //
        return view('threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        //更新処理って必要だっけ？？とりあえず記述なし。
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        //
        $thread->delete();
        return redirect()->route('threads.index')->with('success', 'スレッドが削除されました。');
    }
}
