<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('hot')->default(0);
            $table->string('description', 300)->nullable();
            $table->bigInteger('city_id')->default(0);
            $table->bigInteger('district_id')->default(0);
            $table->bigInteger('wards_id')->default(0);
            $table->bigInteger('price')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('range_price')->default(1);
            $table->tinyInteger('range_area')->default(1);
            $table->tinyInteger('service_hot')->default(0)->comment(' lưu lại v1, vip2 hay vip gì');
            $table->integer('area')->default(0);
            $table->string('apartment_number')->nullable();
            $table->string('full_address')->nullable();
            $table->date('time_start')->nullable();
            $table->date('time_stop')->nullable()->comment('ngày hết hạn');
            $table->string('reason')->nullable();
            $table->text('contents')->nullable();
            $table->bigInteger('category_id')->default(0);
            $table->bigInteger('auth_id')->default(0);
            $table->text('map')->nullable();
            $table->bigInteger('subject_id')->default(0);
            $table->text('video_link')->nullable()->comment('link yt');
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
        Schema::dropIfExists('rooms');
    }
}
