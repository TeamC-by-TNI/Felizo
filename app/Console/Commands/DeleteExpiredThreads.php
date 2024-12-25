<?php

namespace App\Console\Commands;

use App\Models\Thread;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteExpiredThreads extends Command
{
    protected $signature = 'threads:delete-expired';
    protected $description = '期限切れのスレッドを削除します';

    public function handle()
    {
        $expiredThreads = Thread::where('expires_at', '<=', now())->get();
        $count = $expiredThreads->count();

        foreach ($expiredThreads as $thread) {
            Log::info("スレッドID: {$thread->id} を削除します。期限切れ時間: {$thread->expires_at}");
            $thread->delete();
        }

        $this->info("{$count} 件の期限切れスレッドを削除しました。");
        Log::info("{$count} 件の期限切れスレッドを削除しました。");

        return Command::SUCCESS;
    }
} 