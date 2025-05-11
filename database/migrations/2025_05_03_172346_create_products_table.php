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
            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('title');
            $table->text('short_descr')->nullable();
            $table->text('long_descr')->nullable();
            $table->foreignId('brand_id')->nullable()->constrained('brands');
            $table->string('pohlavie');
            $table->decimal('price', 9, 2);
            $table->integer('has_s')->default(0);
            $table->integer('has_m')->default(0);
            $table->integer('has_l')->default(0);
            $table->integer('has_xl')->default(0);
            $table->foreignId('type_id')->nullable()->constrained('types');
            $table->timestamps();                  // ← ← ← Tu sú tie timestamps!
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
