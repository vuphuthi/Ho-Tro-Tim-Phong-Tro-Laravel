<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->string('code',6)->nullable();
            $table->bigInteger('user_id')->default(0);
            $table->dateTime('time_start')->nullable();
            $table->tinyInteger('type')->default(0)->comment(' 1 xác thực Update phone, 2 rút tiền, 3 chuyển tiền');
            $table->tinyInteger('status')->default(0)->comment('1 mới khởi tạo, 2 xử lý, 3 hoàn thành, 3 huỷ');
            $table->char('service', 20)->default('email')->comment(' email | phone');
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
        Schema::dropIfExists('codes');
    }
}
