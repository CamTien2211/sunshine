<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSANPHAMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SANPHAM', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma')->autoIncrement()
                ->comment('ma san pham');
            $table->string('sp_ten',190);
            $table->unsignedInteger('sp_giaGoc')->default('0');
            $table->unsignedInteger('sp_giaBan')->default('0');
            $table->string('sp_hinh',200);
            $table->text('sp_thongTin');
            $table->string('sp_danhGia',50);
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('sp_trangThai')->default('2');
            $table->unsignedTinyInteger('l_ma');
            $table->foreign('l_ma')
                    ->references('l_ma')
                    ->on('LOAI')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->unique(['sp_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SANPHAM');
    }
}
