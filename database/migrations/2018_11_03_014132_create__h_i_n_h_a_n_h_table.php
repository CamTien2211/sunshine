<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHINHANHTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HINHANH', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('ha_stt')->default('1');
            $table->string('ha_ten',150);
            $table->primary(['sp_ma','ha_stt']);
            $table->foreign('sp_ma')
                ->references('sp_ma')
                ->on('SANPHAM')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HINHANH');
    }
}
