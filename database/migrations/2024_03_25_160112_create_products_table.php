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
        if (Schema::hasTable('products')) return;
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('old_price');
            $table->float('new_price');
            $table->text('description');
            $table->text('detail_description');
            $table->string('origin');
            $table->string('standard');
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
