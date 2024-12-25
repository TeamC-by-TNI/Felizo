<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->string('username')->nullable(); // nullable()は必要に応じて調整
            $table->string('avatar')->nullable();   // nullable()は必要に応じて調整
        });
    }

    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropColumn(['username', 'avatar']);
        });
    }
};