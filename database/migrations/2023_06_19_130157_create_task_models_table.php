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
            $table->text('description')->default('');
            $table->string('status')->default('To Do');
            $table->datetime('date_created')->default(now());
            $table->datetime('date_updated')->default(now());
            $table->datetime('due_date')->nullable();
            $table->datetime('date_closed')->nullable();
            $table->datetime('date_done')->nullable();
            $table->boolean('archived')->default(false);
            $table->integer('time_spent')->default(0);
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
