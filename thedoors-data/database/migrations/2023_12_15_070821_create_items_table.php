<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->foreignId('category_id')->nullable();
            $table->string('material',64);
            $table->string('price',16,2);
            $table->string('dimension',64);
            $table->longText('description');
            $table->JSON('images');
            $table->boolean('armored');
            $table->boolean('hidden');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
