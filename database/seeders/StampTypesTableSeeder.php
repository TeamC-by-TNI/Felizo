<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StampType;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class StampTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        // stamps ディレクトリ内のすべての画像ファイルを取得
        $stampPath = public_path('images/stamps');
        
        if (!File::exists($stampPath)) {
            Log::error('Stamps directory not found: ' . $stampPath);
            return;
        }

        $stampFiles = File::files($stampPath);
        
        Log::info('Found ' . count($stampFiles) . ' stamp files');

        foreach ($stampFiles as $file) {
            $filename = $file->getFilename();
            $name = pathinfo($filename, PATHINFO_FILENAME); // 拡張子なしのファイル名を取得
            
            Log::info('Creating stamp: ' . $name . ' with path: images/stamps/' . $filename);

            // スタンプタイプを作成
            StampType::create([
                'name' => $name,
                'icon_path' => 'images/stamps/' . $filename
            ]);
        }
        
        Log::info('Stamp seeding completed. Total stamps: ' . StampType::count());
    }
}
