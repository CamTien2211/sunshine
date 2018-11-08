<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNHACUNGCAPTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NHACUNGCAP', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallInteger('ncc_ma')->autoIncrement()->comment('ma nha cc');
            $table->string('ncc_ten',190);
            $table->string('ncc_daiDien',100);
            $table->string('ncc_diaChi',250);
            $table->string('ncc_dienThoai',11);
            $table->string('ncc_email',100);
            $table->timestamp('ncc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ncc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('ncc_trangThai')->default('2');
            $table->unsignedSmallInteger('xx_ma');
            $table->foreign('xx_ma')
                    ->references('xx_ma')
                    ->on('XUATXU')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->unique(['ncc_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NHACUNGCAP');
    }
}
