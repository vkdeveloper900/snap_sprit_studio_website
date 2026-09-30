<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('highlights', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('type')->nullable();
            $table->string('media_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('location')->nullable();
            $table->integer('sequence')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('highlights');
    }
};
