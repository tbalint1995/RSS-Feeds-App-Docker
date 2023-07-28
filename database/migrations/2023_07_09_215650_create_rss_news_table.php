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
        Schema::create('rss_news', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('rss_channel_id');
            $table->string('title', 300);
            $table->text('description');
            $table->string('link', 500);
            $table->string('author');
            $table->unsignedBigInteger('pub_date');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rss_news');
    }
};
