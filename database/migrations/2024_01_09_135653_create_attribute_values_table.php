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
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->foreignId('attribute_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('attribute_values');
    }
};
