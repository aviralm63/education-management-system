<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductTagsTable extends Migration
{
    public function up()
    {
        Schema::table('product_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->foreign('categories_id', 'categories_fk_6708878')->references('id')->on('product_categories');
        });
    }
}
