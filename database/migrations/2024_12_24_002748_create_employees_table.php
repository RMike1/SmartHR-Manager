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
        Schema::create('employees', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('employee_first_name')->nullable();
            $table->string('employee_second_name')->nullable();
            $table->string('employee_identity')->nullable();
            $table->string('employee_phone')->nullable();
            $table->string('employee_email')->nullable();
            $table->string('employee_passcode')->nullable();
            $table->string('employee_image')->nullable();
            $table->boolean('is_leader')->default(false);
            $table->mediumText('employee_description')->nullable();
            $table->foreignUlid('department_id')->nullable()->on('departments')->onDelete('restrict');
            $table->foreignUlid('job_title_id')->nullable()->on('job_title')->onDelete('restrict');
            $table->timestamp('joining_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
