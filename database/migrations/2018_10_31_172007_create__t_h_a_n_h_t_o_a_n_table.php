<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTHANHTOANTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('THANHTOAN', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('tt_ma')->autoIncrement()
                ->comment('ma thanh toan');
            $table->string('tt_ten',190)->comment('ten thanh toan');
            $table->text('tt_dienGiai')->comment('dien giai thanh toan');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('tt_trangThai')->default('2');
            $table->unique(['tt_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('THANHTOAN');
    }
}
