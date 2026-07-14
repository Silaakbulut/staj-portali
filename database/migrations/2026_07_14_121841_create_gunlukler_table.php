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
        Schema::create('gunlukler', function (Blueprint $table) {
        $table->id();//otomatik artan id 

        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('baslik');

        $table->text('aciklama');

        $table->text('sorun')->nullable();

        $table->text('cozum')->nullable();

        $table->date('tarih');
            $table->timestamps();//iki alan oluşturur created_at ve updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gunlukler');
    }
};
