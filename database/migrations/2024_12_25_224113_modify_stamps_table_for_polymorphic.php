<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('stamps', function (Blueprint $table) {
            // 既存のpost_id列を削除
            $table->dropForeign(['post_id']);
            $table->dropColumn('post_id');
            
            // 多態的関連のためのカラムを追加
            $table->morphs('stampable');
            // ユーザーIDを追加
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('stamps', function (Blueprint $table) {
            $table->dropMorphs('stampable');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete();
        });
    }
};
