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

            $table->string('codigo')->unique()->nullable()->index();
            $table->string('name');
            $table->string('presentation')->nullable();
            $table->decimal('purchase_price', 10, 2)->default(0.00);
            $table->decimal('sale_price', 10, 2)->default(0.00);
            $table->integer('stock')->default(0); 
            $table->string('location')->nullable();
            $table->integer('min_stock')->default(0);
            $table->integer('max_stock')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id', 'fk_products_category')->nullOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id', 'fk_products_supplier')->nullOnDelete();

            $table->softDeletes();
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
