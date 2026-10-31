<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lang', 5)->change();
        });
    }

    public function down(): void
    {
        DB::table('users')->whereRaw('LENGTH(lang) > 2')->update(['lang' => 'en']);

        Schema::table('users', function (Blueprint $table) {
            $table->string('lang', 2)->change();
        });
    }
};
