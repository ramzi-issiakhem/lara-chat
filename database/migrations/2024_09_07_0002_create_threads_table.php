<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramzi\LaraChat\Enums\MessageTypesEnum;
use Ramzi\LaraChat\Enums\ThreadTypesEnum;
use Ramzi\LaraChat\Facades\LaraChat;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',ThreadTypesEnum::typesValue());
            $table->string("color")->default("#ff0814");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('feed_thread', function (Blueprint $table) {
            $table->foreignId('feed_id')->references('id')->on("feeds");
            $table->foreignId('thread_id')->references('id')->on("threads");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign(['feed_id']);
            $table->dropColumn('feed_id');
        });

        Schema::dropIfExists('feed_thread');

        Schema::dropIfExists('threads');
    }
};
