<?php

namespace App\Http\Controllers;
use App\SanPham;
use DB;
use App\Loai;
use App\HinhAnh;
use Storage;
use Session;

use Illuminate\Http\Request;

class SanPhamController extends Controller
{
  /*  $ds_sanpham = SanPham::all();
        return view('loai.index')
            ->with('danhsachloai',$ds_loai);*/




  public function index(){
    $ds_sanpham = SanPham::all(); // select * from SanPham
    return view('sanpham.index')
      ->with('danhsachsanpham', $ds_sanpham);
  }
  public function create(){
    $ds_loai = Loai::all();

    return view('sanpham.create')
      ->with('danhsachloai', $ds_loai);
  }

  public function edit($id)
  {
    $sp = SanPham::where("sp_ma",  $id)->first();
    $ds_loai = Loai::all();

    return view('sanpham.edit')
        ->with('sp', $sp)
        ->with('danhsachloai', $ds_loai);
  }

  public function store(Request $request){
    //dd($request);
    $validation = $request->validate([
      'sp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
      // Cú pháp dùng upload nhiều file
      'sp_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
  ]);

    $sp = new SanPham();//::where("sp_ma", $id) ->first();
    $sp->sp_ten = $request->sp_ten;
    $sp->sp_giaGoc = $request->sp_giaGoc;
    $sp->sp_giaBan = $request->sp_giaBan;
    $sp->sp_thongTin = $request->sp_thongTin;
    $sp->sp_danhGia = $request->sp_danhGia;
    $sp->sp_taoMoi = $request->sp_taoMoi;
    $sp->sp_capNhat = $request->sp_capNhat;
    $sp->sp_trangThai = $request->sp_trangThai;
    $sp->l_ma = $request->l_ma;

    if($request->hasFile('sp_hinh')){

       //xoa hinh cu
    Storage::delete('public/photos/'. $sp->sp_hinh);
       //upload hinh moi
       $file = $request->sp_hinh;
       //luu ten hinh vao column sp_hinh
      $sp->sp_hinh = $file->getClientOriginalName();
       //Chep file vao thu muc "photos"
       $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
     }

     //$sp->save();

     if($request->hasFile('sp_hinhanhlienquan')) {
       // DELETE các dòng liên quan trong table `HinhAnh`
       foreach($sp->hinhanhlienquan()->get() as $hinhAnh)
       {
           // Xóa hình cũ để tránh rác
           Storage::delete('public/photos/' . $hinhAnh->ha_ten);
           // Xóa record
           $hinhAnh->delete();
       }
       $files = $request->sp_hinhanhlienquan;
       // duyệt từng ảnh và thực hiện lưu
       foreach ($request->sp_hinhanhlienquan as $index => $file) {
           
           $file->storeAs('public/photos', $file->getClientOriginalName());
           // Tạo đối tưọng HinhAnh
           $hinhAnh = new HinhAnh();
           $hinhAnh->sp_ma = $sp->sp_ma;
           $hinhAnh->ha_stt = ($index + 1);
           $hinhAnh->ha_ten = $file->getClientOriginalName();
           $hinhAnh->save();
       }
   }

   $sp->save();

    Session::flash('alert-info', 'Them moi thanh cong ^.^!!!');
    return redirect()->route('danhsachsanpham.index');
  }

    public function print()
    {
    $ds_sanpham = Sanpham::all();
    $ds_loai    = Loai::all();
    $data = [
        'danhsachsanpham' => $ds_sanpham,
        'danhsachloai'    => $ds_loai,
    ];
    return view('sanpham.print')
        ->with('danhsachsanpham', $ds_sanpham)
        ->with('danhsachloai', $ds_loai);
      }
    
  

}