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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users', 'id', 'fk_audit_user')->nullOnDelete();
            $table->string('affected_module');
            $table->string('action_performed');
            $table->dateTime('date_time')->useCurrent();
            $table->string('detail');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
