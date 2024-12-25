<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->timestamp('expires_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropColumn('expires_at');
        });
    }
}; 