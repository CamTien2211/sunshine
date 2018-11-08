<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXUATXUTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('XUATXU', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedSmallInteger('xx_ma')->autoIncrement()
                ->comment('ma xuat xu');
            $table->string('xx_ten',100);
            $table->timestamp('xx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('xx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('xx_trangThai');
            $table->unique(['xx_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XUATXU');
    }
}
