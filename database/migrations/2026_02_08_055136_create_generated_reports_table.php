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
        Schema::create('generated_reports', function (Blueprint $table) {
            $table->id();

            $table->string('report_type');
            $table->date('starting_range');
            $table->date('end_range');
            $table->foreignId('user_id')->nullable()->constrained('users', 'id', 'fk_generated_reports_user')->nullOnDelete();
            $table->string('file_location');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_reports');
    }
};
