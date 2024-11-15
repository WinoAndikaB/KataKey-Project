<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_komentar_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_pelapor');
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('comment_id');
            $table->text('laporan');
            $table->text('alasan');
            $table->timestamps();
    
            $table->foreign('user_id_pelapor')->references('id')->on('users');
            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('comment_id')->references('id')->on('komentar_videos');
        });
    }
    


    public function down(): void
    {
        Schema::dropIfExists('laporan_komentar_videos');
    }
};
