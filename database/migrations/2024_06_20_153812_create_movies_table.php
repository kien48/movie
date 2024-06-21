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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Lists::class)->constrained();
            $table->text('ten');
            $table->text('anh')->nullable();
            $table->text('slug');
            $table->text('mo_ta');
            $table->text('ngon_ngu');
            $table->text('so_tap');
            $table->text('chat_luong');
            $table->text('dao_dien');
            $table->text('dien_vien');
            $table->text('nam_phat_hanh');
            $table->text('quoc_gia');
            $table->text('trang_thai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
