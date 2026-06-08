<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->id();
                $table->string('title', 500);
                $table->string('category', 100)->nullable();
                $table->string('date', 50)->nullable();
                $table->text('description')->nullable();
                $table->longText('full_content')->nullable();
                $table->text('main_image')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('article_images')) {
            Schema::create('article_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('article_id')->constrained()->cascadeOnDelete();
                $table->text('image_url');
                $table->unsignedTinyInteger('position')->default(0);
            });
        }

        if (!Schema::hasTable('gallery')) {
            Schema::create('gallery', function (Blueprint $table) {
                $table->id();
                $table->string('title', 500)->nullable();
                $table->text('description')->nullable();
                $table->string('category', 100)->nullable();
                $table->longText('image')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('videos')) {
            Schema::create('videos', function (Blueprint $table) {
                $table->id();
                $table->string('title', 500);
                $table->text('description')->nullable();
                $table->string('youtube_id', 50)->nullable();
                $table->string('date', 50)->nullable();
                $table->string('category', 100)->nullable();
                $table->text('thumbnail')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('page_key', 100)->unique();
                $table->string('title', 500)->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('sections')) {
            Schema::create('sections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
                $table->string('section_key', 100);
                $table->string('name', 200)->nullable();
                $table->json('content')->nullable();
                $table->timestamps();
                $table->unique(['page_id', 'section_key']);
            });
        }

        if (!Schema::hasTable('admissions_images')) {
            Schema::create('admissions_images', function (Blueprint $table) {
                $table->id();
                $table->string('title', 500)->nullable();
                $table->string('category', 100)->nullable();
                $table->text('description')->nullable();
                $table->longText('image')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('admissions_documents')) {
            Schema::create('admissions_documents', function (Blueprint $table) {
                $table->id();
                $table->string('title', 500);
                $table->text('description')->nullable();
                $table->string('type', 200)->nullable();
                $table->string('file_name', 255)->nullable();
                $table->longText('document')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions_documents');
        Schema::dropIfExists('admissions_images');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('gallery');
        Schema::dropIfExists('article_images');
        Schema::dropIfExists('articles');
    }
};
