<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loai;
use DB;
use Mail;
use App\Mail\ContactMailer;
class FrontendController extends Controller
{
    public function index(Request $request) 
    {
    // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
    $ds_top3_newest_loaisanpham = DB::table('loai')
                                ->join('sanpham', 'loai.l_ma', '=', 'sanpham.l_ma')
                                ->orderBy('l_capNhat')->take(3)->get();
    
    // Query tìm danh sách sản phẩm
    $danhsachsanpham = $this->searchSanPham($request);
    // Hiển thị view `frontend.index` với dữ liệu truyền vào
    return view('frontend.index')
        ->with('ds_top3_newest_loaisanpham', $ds_top3_newest_loaisanpham)
        ->with('danhsachsanpham', $danhsachsanpham);
    }   
/**
 * Hàm query danh sách sản phẩm theo nhiều điều kiện
 */
    private function searchSanPham(Request $request)
    {
    $query = DB::table('sanpham')->select('*');
    // Kiểm tra điều kiện `searchByLoaiMa`
    $searchByLoaiMa = $request->query('searchByLoaiMa');
        if($searchByLoaiMa != null)
        {
            $query->where('l_ma', $searchByLoaiMa);
        }
    
    $data = $query->get();
    return $data;
}
    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
{
    return view('frontend.pages.contact');
}

//send mail
public function sendMailContactForm(Request $request)
{
    $input = $request->all();
    Mail::to('michkey221196@gmail.com')
        ->send(new ContactMailer($input));
    return $input;
}

}
