<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVANCHUYENTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VANCHUYEN', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('vc_ma')->autoIncrement()
                ->comment('ma van chuyen');
            $table->string('vc_ten',200)->comment('ten van chuyen');
            $table->integer('vc_chiPhi')->comment('chi phi van chuyen');
            $table->text('vc_dienGiai')->comment('dien giai');
            $table->timestamp('vc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('tao moi');
            $table->timestamp('vc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('cap nhat');
            $table->unsignedTinyInteger('vc_trangThai')->default('2')
                ->comment('trang thai');
           // $table->unique(['vc_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VANCHUYEN');
    }
}
