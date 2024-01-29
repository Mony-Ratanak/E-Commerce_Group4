<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    public function up()
    {
        // Remove existing foreign key constraint
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        // Add new foreign key constraint
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        // This is optional and depends on your needs
        // If you want to rollback, you can recreate the previous state
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            // Add back the previous foreign key constraint, if needed
            // $table->foreign('category_id')->references('id')->on('categories');
        });
    }
}

