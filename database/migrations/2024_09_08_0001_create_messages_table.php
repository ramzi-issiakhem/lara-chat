<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained('threads');
            $table->enum('type',MessageTypesEnum::typesValue());
            $table->string('content');
            $table->morphs('messageable');
            $table->timestamp('sent_at')->default(now());
            $table->timestamp('edited_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
