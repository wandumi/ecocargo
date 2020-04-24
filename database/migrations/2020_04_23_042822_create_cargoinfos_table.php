<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargoinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("shippment_id");
            $table->string("order_status")->nullable();
            $table->string("shipping_mode");
            $table->integer("estimated_weight");
            $table->string("weight_unit");
            $table->string("packaging");
            $table->integer("quantity");
            $table->string("insurance");
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
        Schema::dropIfExists('cargoinfos');
    }
}
