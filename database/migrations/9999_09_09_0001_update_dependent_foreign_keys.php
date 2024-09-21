<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramzi\LaraChat\Facades\LaraChat;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('feeds', function (Blueprint $table) {
            $table->foreignId('feed_owner_id')
                ->after('id')
                ->references('id')
                ->on(LaraChat::getFeedOwnerModelTable());
        });

        Schema::table('participants', function (Blueprint $table) {
            $table->foreignId('sender_id')
                ->after('id')
                ->references('id')
                ->on(LaraChat::getSenderModelTable());
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('sender_id')
                ->after('id')
                ->references('id')
                ->on(LaraChat::getSenderModelTable());
        });

        Schema::table('threads_seen', function (Blueprint $table) {
            $table->foreignId('sender_id')
                ->after('id')
                ->references('id')
                ->on(LaraChat::getSenderModelTable());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('feeds', function (Blueprint $table) {
            $table->dropForeign(['feed_owner_id']);
            $table->dropColumn('feed_owner_id');
        });

        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropColumn('sender_id');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropColumn('sender_id');
        });

        Schema::table('threads_seen', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropColumn('sender_id');
        });



    }
};
