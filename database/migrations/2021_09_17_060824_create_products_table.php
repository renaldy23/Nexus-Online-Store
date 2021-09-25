<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("store_id");
            $table->foreign("store_id")->references("id")->on("stores")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->string("product_name");
            $table->text("deskripsi");
            $table->integer("quantity");
            $table->string("SKU");
            $table->integer("weight");
            $table->integer("length");
            $table->integer("width");
            $table->integer("height");
            $table->double("price")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
