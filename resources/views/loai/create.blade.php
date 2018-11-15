@extends('backend.layouts.index')

@section('title')
    Danh sach loai san pham
@endsection

@section('main-content')
<h1>Them moi san pham</h1>

<form id="frmThemMoiLoaiSanPham" method="post" action="{{route('danhsachloai.store')}}">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="l_ten">Nhap ten loai</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" placeholder="Nhap ten">
    </div>

    <div class="form-group">
        <label for="l_taoMoi">Nhap ngay tao moi</label>
        <input type="text" class="form-control" id="l_taoMoi" name="l_taoMoi" placeholder="Nhap ngay tao moi">
    </div>

    <div class="form-group">
        <label for="l_capNhat">Nhap ngay cap nhat</label>
        <input type="text" class="form-controll" id="l_capNhat" name="l_capNhat" placeholder="Nhap ngay cap nhat">
    </div>

    <div class="form-group">
        <label for="l_capNhat">Trang Thai</label>
        <select naem="l_trangThai">
            <option value="1">Khoa</option>
            <option value="2">Kha dung</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Luu Tru</button>
</form>
@endsection