<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('parent_id')->default(0);
            $table->bigInteger('hot')->default(0);
            $table->tinyInteger('type')->default(1)->comment('1 tỉnh thành, 2 là quân huyện, 3 là phường xã');
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
        Schema::dropIfExists('locations');
    }
}
