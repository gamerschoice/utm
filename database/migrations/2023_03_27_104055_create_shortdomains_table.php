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
        Schema::create('short_domains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_id');
            $table->string('host')->index();
            $table->string('status');
            $table->string('cf_host_identifier');
            $table->string('cf_route_identifier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_domains');
    }
};
