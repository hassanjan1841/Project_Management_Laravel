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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->string('status');
            $table->string('image_path')->nullable();
            $table->string('priority');

            $table->foreignId('assigned_user_id')->constrained('users');
            $table->foreignId('created_by')->constrained('users')->default('1');
            $table->foreignId('updated_by')->constrained('users')->default('1');
            $table->foreignId('project_id')->constrained('projects')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
