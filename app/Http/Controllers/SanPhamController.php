<?php

namespace App\Http\Controllers;
use App\sanpham;
use DB;

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

  public function store(Request $request){
    $sp = new SanPham();
    $sp->sp_ten = $request->sp_ten;

    if($request->hasFile('sp_hinh')){
      $file = $request->sp_hinh;
      //luu ten hinh vao column sp_hinh
      $sp->sp_hinh = $file->getClientOriginalName();
      //Chep file vao thu muc "photos"
      $file->storeAs('photos', $file->getClientOriginalName());
    }

    $sp->save();

    Session::flash('alert-info', 'Them moi thanh cong ^.^!!!');
    return redirect()->route('danhsachsanpham.index');
    
  }
}
