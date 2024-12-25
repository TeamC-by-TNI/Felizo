<?php

namespace App\Helpers;

class RandomGenerator
{
    public static function generateUsername(): string
    {
        // 5-8文字のランダムな英数字を生成
        $length = rand(5, 8);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTURWXYZ';
        $username = '';
        for ($i = 0; $i < $length; $i++) {
            $username .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $username;
    }

    public static function getRandomAvatar(): string
    {
        // 用意したアイコンの中からランダムに1つ選択
        $avatars = [
            'avatar1.PNG',
            'avatar2.PNG',
            'avatar3.PNG',
            'avatar4.PNG',
            'avatar5.png'
        ];
        
        return $avatars[array_rand($avatars)];
    }
}