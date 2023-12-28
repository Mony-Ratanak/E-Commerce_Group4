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
        Schema::create('testing', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // VARCHAR column for title
            $table->date('due_date'); // DATE column for due date
            $table->unsignedBigInteger('category_id'); // Foreign key column
            $table->foreign('category_id')->references('id')->on('categories'); // Define foreign key constraint
            $table->timestamps(); // Created_at and updated_at columns
            $table->date('completed_at')->nullable(); // Nullable DATE column for completed_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testing');
    }
};
