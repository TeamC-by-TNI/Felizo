<?php

namespace App\Http\Controllers;

use App\Models\Thread;
// 🐶1行追加！
use App\Helpers\RandomGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $threads = Thread::orderBy('created_at', 'desc')->get();
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

        // expires_atを1分後に設定
        $validated['expires_at'] = now()->addMinutes(1);

        // 🐶ランダムなユーザー名とアバター + デバッグ出力追加
        // エラーが発生する場合は、storage/logs/laravel.logでエラーメッセージを確認
        try {
            $username = RandomGenerator::generateUsername();
            $avatar = RandomGenerator::getRandomAvatar();
            \Log::info('Generated username: ' . $username);
            \Log::info('Generated avatar: ' . $avatar);

            $validated['username'] = $username;
            $validated['avatar'] = $avatar;
        } catch (\Exception $e) {
            \Log::error('Error in RandomGenerator: ' . $e->getMessage());
        }

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

    // 🐶検索機能のため追加
    public function search(Request $request)
{
    $query = $request->input('query');
    
    $threads = Thread::where('title', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->orWhereHas('posts', function($q) use ($query) {
            $q->where('content', 'like', "%{$query}%");
        })
        ->with('posts')
        ->latest()
        ->paginate(10);
        
    return view('threads.index', compact('threads'));
}
}
