<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value');
            $table->timestamps();
        });
        DB::table('settings')->insert([
            ['key' => 'years_of_training', 'value' => '3'],
            ['key' => 'years_of_experience', 'value' => '2'],
        ]);

        DB::table('settings')->insert([
            ['key' => 'github_link', 'value' => 'https://github.com/tonprofil'],
            ['key' => 'linkedin_link', 'value' => 'https://linkedin.com/in/tonprofil'],
            ['key' => 'instagram_link', 'value' => 'https://instagram.com/toncompte'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
