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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id') -> constrained() -> onDelete('cascade');
            $table->foreignId('book_id') -> constrained() -> onDelete('cascade');
            $table->string('issue_date') -> default(now());
            $table->string('return_date');
            $table->string('status') -> default('pading');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
