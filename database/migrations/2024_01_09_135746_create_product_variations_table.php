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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->json('attribute_combination');
            $table->string('sku')->unique()->nullable();
            $table->text('description')->nullable();
            $table->decimal('regular_price', 10, 2)->default(0);
            $table->decimal('sale_price', 10, 2)->default(0)->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('created_by')->nullable()->constrained(table: 'admins');
            $table->foreignId('updated_by')->nullable()->constrained(table: 'admins');
            $table->foreignId('deleted_by')->nullable()->constrained(table: 'admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};
