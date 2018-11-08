<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCHUDETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHUDE', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('cd_ma')->autoIncrement();
            $table->string('cd_ten',50);
            $table->timestamp('cd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('cd_trangThai')->default('2');
            $table->unique(['cd_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CHUDE');
    }
}
