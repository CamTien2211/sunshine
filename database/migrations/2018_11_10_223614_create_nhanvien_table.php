<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->smallIncrements('nv_ma')->comment('Ma nhan vien,1-chua phan cong');
            $table->string('nv_taiKhoan',50);
            $table->string('nv_matKhau',32);
            $table->string('nv_hoTen',100);
            $table->unsignedTinyInteger('nv_gioiTinh')->default('1');
            $table->string('nv_email',100);
            $table->dateTime('nv_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_diaChi',250);
            $table->
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
