<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLOAITable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LOAI', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('l_ma')->autoIncrement()
                ->comment('Ma loai san pham');
            $table->string('l_ten',50)->comment('ten loai');
            $table->timestamp('l_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('tao moi loai');
            $table->timestamp('l_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('loai cap nhat');
            $table->unsignedTinyInteger('l_trangThai')->default('2')
                ->comment('loai trang thai');
            $table->unique(['l_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LOAI');
    }
}
