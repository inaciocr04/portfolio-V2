<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('url_site')->nullable();
            $table->string('url_git')->nullable();
            $table->string('video')->nullable();
            $table->string('image_visuel');
            $table->string('image_deco1')->nullable();
            $table->string('image_deco2')->nullable();
            $table->string('image_deco3')->nullable();
            $table->string('image_deco4')->nullable();
            $table->string('image_deco5')->nullable();
            $table->date('date_publication')->nullable();
            $table->string('status')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
