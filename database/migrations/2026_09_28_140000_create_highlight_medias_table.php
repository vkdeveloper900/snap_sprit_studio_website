<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('highlight_medias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('highlight_id');
            $table->string('type');
            $table->string('media_url');
            $table->string('thumbnail_url')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('highlight_medias');
    }
};
