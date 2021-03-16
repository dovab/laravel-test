<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tags", function (Blueprint $table) {
            $table->id();
            $table->string("tag", 64);
            $table->timestamps();
        });

        Schema::create("products_tags", function (Blueprint $table) {
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("tag_id");
            $table->primary(["product_id", "tag_id"]);
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("tag_id")->references("id")->on("tags");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("tags");
        Schema::dropIfExists("products_tags");
    }
}
