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
            $table->foreignId('user_id')->constrained('users', 'id')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            $table->json('assigned_to')->nullable();
            $table->string('title');
            $table->text('description');
            $table->date('due_date');
            $table->enum('priority', ['high', 'medium', 'low']);
            $table->enum('status', ['not_started', 'in_progress', 'completed']);
            $table->enum('category', ['work', 'personal']);
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
