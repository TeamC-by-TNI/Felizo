<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class DeleteExpiredPosts extends Command
{
    protected $signature = 'posts:delete-expired';
    protected $description = '期限切れの投稿を削除します';

    public function handle()
    {
        $count = Post::where('expires_at', '<=', now())->delete();
        $this->info("{$count} 件の期限切れ投稿を削除しました。");
        return Command::SUCCESS;
    }
} 