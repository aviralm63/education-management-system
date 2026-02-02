<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->foreign('categories_id', 'categories_fk_6708544')->references('id')->on('product_categories');
            $table->unsignedBigInteger('sub_categories_id')->nullable();
            $table->foreign('sub_categories_id', 'sub_categories_fk_6708545')->references('id')->on('product_tags');
        });
    }
}
