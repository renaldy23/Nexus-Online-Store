<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->text("store_name");
            $table->longText("description");
            $table->string("store_phone_number");
            $table->string("regency");
            $table->string("districts");
            $table->foreignId("users_id");
            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
            $table->longText("address");
            $table->text("store_image");
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
        Schema::dropIfExists('stores');
    }
}
