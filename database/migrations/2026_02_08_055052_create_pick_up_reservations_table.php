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
        Schema::create('pick_up_reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->nullable()->constrained('products', 'id', 'fk_pick_up_reservations_product')->cascadeOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders', 'id', 'fk_pick_up_reservations_order')->nullOnDelete();
            $table->integer('amount')->default(1);
            $table->enum('state', [
                'pending',
                'completed',
                'canceled'
            ])->default('pending');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pick_up_reservations');
    }
};
