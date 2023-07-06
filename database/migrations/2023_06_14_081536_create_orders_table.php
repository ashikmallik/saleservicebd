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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('coustomer_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('zip_code');
            $table->string('user_id')->nullable();

            $table->string('product_name');
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();

            $table->string('image')->nullable();
            $table->string('product_id')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};