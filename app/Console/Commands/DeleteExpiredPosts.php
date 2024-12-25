<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteExpiredPosts extends Command
{
    protected $signature = 'posts:delete-expired';
    protected $description = '期限切れの投稿を削除します';

    public function handle()
    {
        // 期限切れの投稿を取得
        $expiredPosts = Post::where('expires_at', '<=', now())->get();

        // 削除する投稿の数を記録
        $count = $expiredPosts->count();

        // 各投稿を削除
        foreach ($expiredPosts as $post) {
            \Log::info("投稿ID: {$post->id} を削除します。期限切れ時間: {$post->expires_at}");
            $post->delete();
        }

        $this->info("{$count} 件の期限切れ投稿を削除しました。");
        \Log::info("{$count} 件の期限切れ投稿を削除しました。");

        return Command::SUCCESS;
    }
}
