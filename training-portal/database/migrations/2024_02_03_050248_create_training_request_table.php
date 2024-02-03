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
        Schema::create('training_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('training_title');
            $table->dateTime('datetime');
            $table->string('venue');
            $table->string('facilitator');
            $table->string('division');
            $table->tinyInteger('is_approve')->default(0); // If the status is 0, it's pending. If the status is 1, it's Approved. If the status is 2, it's Rejected
            $table->tinyInteger('is_done')->default(0); // If the status is 0, it's pending. If the status is 1, it is Done.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_request');
    }
};
