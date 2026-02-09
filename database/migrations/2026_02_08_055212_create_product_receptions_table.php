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
        Schema::create('product_receptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->nullable()->constrained('products', 'id', 'fk_product_reception_product')->cascadeOnDelete();
            $table->integer('amount')->default(0);
            $table->foreignId('batch_id')->nullable()->constrained('batches', 'id', 'fk_product_reception_batch')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id', 'fk_product_reception_user')->nullOnDelete();
            $table->dateTime('reception_date')->useCurrent();
            $table->decimal('unit_price', 10, 2)->default(0.00);
            $table->date('expiration_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_receptions');
    }
};
