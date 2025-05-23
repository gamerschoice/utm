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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->string('utm_source')->index()->nullable();
            $table->string('utm_medium')->index()->nullable();
            $table->string('utm_campaign')->index()->nullable();
            $table->string('utm_term')->index()->nullable();
            $table->string('utm_content')->index()->nullable();
            $table->string('utm_source_platform')->index()->nullable();
            $table->string('utm_creative_format')->index()->nullable();
            $table->string('utm_marketing_tactic')->index()->nullable();
            $table->longText('notes')->nullable();
            $table->string('shortlink')->index();
            $table->foreignId('domain_id')->index();
            $table->integer('health_status_code')->nullable();
            $table->timestamp('health_checked_at')->nullable();
            $table->timestamps();

            $table->unique(['domain_id', 'shortlink']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
