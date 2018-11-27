<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    public $timestamps=false;
    protected $table='hinhanh';
    protected $fillable=['ha_ten'];
    protected $guarded=['sp_ma','ha_stt'];
    protected $primaryKey=['sp_ma','ha_stt'];
    public $incrementing =false;//khong co cot nao tu tang

    public function sanPham(){
        return $this->belongsTo('App\SanPham','sp_ma','sp_ma');
    }
}
