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
            $table->bigIncrements('id');
            $table->Integer('cat_id')->nullable();
            $table->Integer('subcat_id')->nullable();
            $table->Integer('brand_id')->nullable();
            $table->Integer('unit_id')->nullable();
            $table->Integer('size_id')->nullable();
            $table->Integer('color_id')->nullable();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->float('price');
            $table->string('image');
            $table->boolean('status')->default(1);
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
