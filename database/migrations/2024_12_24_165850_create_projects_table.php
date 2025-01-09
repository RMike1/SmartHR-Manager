<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('project_name')->nullable();
            $table->string('project_description')->nullable();
            $table->string('project_status')->nullable();
            $table->string('project_image')->nullable();
            $table->string('project_budget')->nullable();
            $table->string('project_priority')->nullable();
            $table->string('notification')->nullable();
            $table->longText('description')->nullable();
            $table->foreignUlid('employee_id')->nullable()->on('employees')->onDelete('cascade');
            $table->foreignUlid('category_id')->nullable()->on('categories')->onDelete('restrict');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
