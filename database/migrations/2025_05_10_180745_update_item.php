<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {

            $table->dropUnique('cart_item_unique');

            $table->unique(['cart_id', 'product_id', 'size'], 'items_cart_prod_size_unique');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {

            $table->dropUnique('items_cart_prod_size_unique');

            $table->unique(['cart_id', 'product_id'], 'cart_item_unique');
        });
    }
};
