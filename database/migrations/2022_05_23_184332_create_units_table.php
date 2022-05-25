<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->float('rate');
            $table->integer('parentId')->unsigned();
            // $table->integer('unitId')->unsigned();
            // $table->timestamps();

        });
        DB::statement(DB::raw('ALTER TABLE `unit`.`unit` CHANGE COLUMN `rate` `rate` float;'));   

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit');
    }
};
