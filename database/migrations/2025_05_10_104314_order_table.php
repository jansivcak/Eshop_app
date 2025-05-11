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
            $table->foreignId('card_id')->nullable()->constrained('shopping_carts');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->decimal('price', 10, 2);
            $table->foreignId('shipping_id')->nullable()->constrained('shippings');
            $table->string('payment_method')->nullable();
            $table->string('shipping_method')->nullable();
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
