<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("type_id");
            $table->foreign("type_id")->references("id")->on("variant_types")->onDelete("cascade")->onUpdate("cascade");
            $table->string("variant_name");
            $table->string("SKU");
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
        Schema::dropIfExists('variants');
    }
}
