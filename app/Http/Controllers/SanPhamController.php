<?php

namespace App\Http\Controllers;
use App\sanpham;
use DB;
use App\Loai;
use Storage;

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

  public function edit($id){
    $sp = SanPham::where("sp_ma", $id)->first();
    $ds_loai = Loai::all();

    return view('sanpham.edit')
        ->with('sp', $sp)
        ->with('danhsachloai', $ds_loai);
  }

  public function store(Request $request){
    //dd($request);
    $sp = new SanPham();
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

     $sp->save();

    Session::flash('alert-info', 'Them moi thanh cong ^.^!!!');
    return redirect()->route('danhsachsanpham.index');
    
  }
}
