<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->tinyInteger('num_of_rooms');
            $table->double('area_m2');

            $table->integer('price_total')->nullable();
            $table->integer('price_per_m2')->nullable();

            $table->integer('flat_type_id')->unsigned()->nullable();
            $table->foreign('flat_type_id')
                ->references('id')
                ->on('flat_type')
                ->onDelete('set null');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flat');
    }
}
