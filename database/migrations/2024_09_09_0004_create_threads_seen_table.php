<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramzi\LaraChat\Enums\MessageTypesEnum;
use Ramzi\LaraChat\Facades\LaraChat;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('threads_seen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('last_message_seen_id')->references('id')->on('messages');
            $table->foreignId('thread_id')->references('id')->on('threads');
            $table->timestamp('seen_at')->default(now());
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('threads_seen', function (Blueprint $table) {
            $table->dropForeign(['last_message_seen_id']);
            $table->dropColumn('last_message_seen_id');
            $table->dropForeign(['thread_id']);
            $table->dropColumn('thread_id');
        });

        Schema::dropIfExists('threads_seen');
    }
};
