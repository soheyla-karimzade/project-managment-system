<?php

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
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
            $table->char('title','200')->nullable(false);
            $table->unsignedBigInteger('project_id')->nullable(false);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');
            $table->enum('status', TaskStatus::getValues())->default(TaskStatus::PENDING);
            $table->date('due_date')->nullable();
            $table->enum('priority', TaskPriority::getValues())->nullable();
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
