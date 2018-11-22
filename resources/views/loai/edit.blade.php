@extends('backend.layouts.index')

@section('title')
    Danh sach loai san pham
@endsection

@section('main-content')
<h1>Sua loai san pham</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('danhsachloai.update', ['id' => $loai->l_ma]) }}" >
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field()}}
    <div class="form-group">
        <label for="l_ten">Nhap ten loai</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ $loai->l_ten}}" placeholder="Ten">
    </div>

    <div class="form-group">
        <label for="l_taoMoi">Email adress</label>
        <input type="text" class="form-control" id="l_taoMoi" name="l_taoMoi" value="{{ $loai->l_taoMoi }}" placeholder="tao moi">
    </div>

    <div class="form-group">
        <label for="l_capNhat">Nhap cap nhat</label>
        <input type="text" class="form-controll" id="l_capNhat" name="l_capNhat" value="{{ $loai->l_capNhat }}" placeholder="cap nhat">
    </div>

    <select name="l_trangThai">
        <option value="1" {{ $loai->l_trangThai == 1 ? "selected" : ""}}>Khoa</option>
        <option value="1" {{ $loai->l_trangThai == 2 ? "selected" : ""}}>Kha Dung</option>
       
    </select>
    <button type="submit" class="btn btn-primary">Luu Tru</button>
</form>

@endsection