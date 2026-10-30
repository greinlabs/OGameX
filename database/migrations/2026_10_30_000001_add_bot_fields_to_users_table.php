<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_bot')->default(false)->after('vacation_mode_until');
            $table->timestamp('bot_last_action_at')->nullable()->after('is_bot');
            $table->index(['is_bot', 'bot_last_action_at']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['is_bot', 'bot_last_action_at']);
            $table->dropColumn(['is_bot', 'bot_last_action_at']);
        });
    }
};
