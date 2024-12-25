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
            'avatar1.png',
            'avatar2.png',
            'avatar3.png',
            'avatar4.png',
            'avatar5.png',
            'avatar6.png',
            'avatar7.png',
            'avatar8.png',
            'avatar9.png',
            'avatar10.png'
        ];
        
        return $avatars[array_rand($avatars)];
    }
}