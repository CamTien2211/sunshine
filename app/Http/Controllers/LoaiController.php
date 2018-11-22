<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loai;
use DB;
use Session;
use App\Http\Requests\LoaiRequest;
class LoaiController extends Controller
{
    public function index()
    {
        $ds_loai = DB::table('loai')->get();
       // $ds_loai = Loai::all();
        return view('loai.index')
            ->with('danhsachloai',$ds_loai);
    }
    public function create(){
        return view('loai.create');
    }
    public function store(Request $request){
        $loai = new Loai();
        $loai->l_ten = $request->l_ten;
        $loai->l_taoMoi = $request->l_taoMoi;
        $loai->l_capNhat = $request->l_capNhat;
        $loai->l_trangThai = $request->l_trangThai;
        $loai->save();
    }
    public function edit($id){
        $loai = Loai::where("l_ma", $id)->first();
        return view('loai.edit')->with('loai', $loai);
    }

    public function update(LoaiRequest $request, $id)
    {
       /* $validator = Validator::make($request->all(), [
            'l_ten' => 'required|unique:posts|max:60',
            'l_taoMoi' => 'required',
            'l_capNhat' => 'required',
            'l_trangThai' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('danhsachloai.edit', ['id' => $id])
                        ->withErrors($validator)
                        ->withInput();
        }*/
        $loai = Loai::where("l_ma", $id)->first();
        $loai->l_ten = $request->l_ten;
        $loai->l_taoMoi = $request->l_taoMoi;
        $loai->l_capNhat = $request->l_capNhat;
        $loai->l_trangThai = $request->l_trangThai;
        $loai->save();

        Session::flash('alert-success','Successfully!! ^.^');
        return redirect()->route('danhsachloai.index');
    }

    public function destroy($id){
        $loai = Loai::where("l_ma", $id)->first();
        $loai->delete();
        Session::flash('alert-danger','Deleted :(((');
        return redirect()->route('danhsachloai.index');

    }
}
