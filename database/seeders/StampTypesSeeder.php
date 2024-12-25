<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StampType;

class StampTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stampTypes = [
            ['name' => '？', 'icon_path' => 'stamps/？.png'],
            ['name' => 'ggrks', 'icon_path' => 'stamps/GGRKS.png'],
            ['name' => 'クソワロタ', 'icon_path' => 'stamps/ROFL.png'],
            ['name' => 'かっけー！', 'icon_path' => 'stamps/SWAG.png'],
            ['name' => 'まじかよ', 'icon_path' => 'stamps/WTH.png'],
            ['name' => '人生一度きり', 'icon_path' => 'stamps/YOLO.png'],
            ['name' => 'おったま', 'icon_path' => 'stamps/おったま.png'],
            ['name' => 'それいいね', 'icon_path' => 'stamps/それいいね.gif'],
            ['name' => 'それな', 'icon_path' => 'stamps/それな.gif'],
            ['name' => 'それ僕', 'icon_path' => 'stamps/それ僕.png'],
            ['name' => 'ハァ？', 'icon_path' => 'stamps/ハァ？.png'],
            ['name' => 'マジ!', 'icon_path' => 'stamps/マジ!.gif'],
            ['name' => 'わかる', 'icon_path' => 'stamps/わかる.png'],
            ['name' => '最高！', 'icon_path' => 'stamps/最高！.png'],
            ['name' => '尊い', 'icon_path' => 'stamps/尊い.png'],
            ['name' => '爆笑', 'icon_path' => 'stamps/爆笑.gif'],
            ['name' => 'かたじけない', 'icon_path' => 'stamps/忝い.png']
            // ... 残りのスタンプがあれば追加
        ];

        foreach ($stampTypes as $stamp) {
            StampType::create($stamp);
        }
    }
}
