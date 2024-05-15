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
        Schema::create('products_with_logo', function (Blueprint $table) {
            $table->id();
            $table->string('paper_cups')->nullable();
            $table->string('paper_bags_no_handle')->nullable();
            $table->string('paper_bags')->nullable();
            $table->string('plastic_cups')->nullable();
            $table->string('transparent_cups')->nullable();
            $table->string('reusable_cups')->nullable();
            $table->string('pizza_box')->nullable();
            $table->string('other')->nullable();

            $table->string('comment')->nullable();
            $table->string('contact')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('terms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_with_logo');
    }
};
