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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->longText('description')->nullable();
            $table->enum('type', ['simple', 'variable'])->default('simple');
            $table->decimal('regular_price', 10, 2)->default(0);
            $table->decimal('sale_price', 10, 2)->default(0)->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('image_path')->nullable();
            $table->json('gallery_image_paths')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->enum('status', ['active', 'inactive', 'draft', 'out of stock', 'backorder', 'discontinued', 'coming soon', 'sold out', 'reserved'])->default('active');
            $table->boolean('is_featured')->default(false);
            $table->foreignId('created_by')->nullable()->constrained(table: 'admins');
            $table->foreignId('updated_by')->nullable()->constrained(table: 'admins');
            $table->foreignId('deleted_by')->nullable()->constrained(table: 'admins');
            $table->timestamps();
            $table->softDeletes();
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
