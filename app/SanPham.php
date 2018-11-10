<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    const CREATED_AT ='sp_taoMoi';
    const UPDATED_AT ='sp_capNhat';
    protected $table ='sanpham';
    protected $fillable =['sp_ten','sp_giaGoc','sp_giaBan','sp_hinh','sp_thongTin','sp_danhGia','l_ten','l_taoMoi','l_capNhat','l_trangThai'];
    protected $guarded =['sp_ma'];
    protected $primaryKey =['sp_ma'];
    protected $dates = ['l_taoMoi','l_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
    public function hinhAnh(){
        return $this->hasMany('App\HinhAnh','sp_ma','sp_ma');
    }
}
