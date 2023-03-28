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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('stripe_key');
            $table->float('price')->default(0);
            $table->float('price_annual')->default(0);
            $table->string('name');
            $table->text('description');
            $table->integer('domains')->default(1);
            $table->integer('seats')->default(1);
            $table->integer('links')->default(500);
            $table->boolean('short_domains')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
