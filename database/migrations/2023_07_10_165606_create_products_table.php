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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('sub_category_id');
            $table->unsignedInteger('brand_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('price');
            $table->unsignedInteger('qty');
            $table->string('discount_price')->nullable();
            $table->text('short_description');
            $table->longtext('long_description');
            $table->boolean('is_active')->default(true);
            $table->string('image');
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
