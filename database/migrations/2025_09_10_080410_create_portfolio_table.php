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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail_img')->nullable();
            $table->json('images')->nullable();
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->longText('map')->nullable();
            $table->string('map_url')->nullable();
            $table->string('client')->nullable();
            $table->string('value')->nullable();
            $table->string('consortium')->nullable();
            $table->string('tanama_role')->nullable();
            $table->string('builder')->nullable();
            $table->string('architect')->nullable();
            $table->string('financial_close_date')->nullable();
            $table->string('completion_date')->nullable();
            $table->string('contract_terms')->nullable();
            $table->string('awards')->nullable();
            $table->text('other_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
