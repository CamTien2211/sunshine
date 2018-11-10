@extends('backend.layouts.index')

@section('title')
    Danh sach san pham
@endsection

@section('main-content')


<h1>Hello first action from SanPhamController</h1>
<table border="1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten</th>
            <th>Thuoc loai</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sanpham)
            <tr>
                <td>{{ $sanpham->sp_ma }}</td>
                <td>{{ $sanpham->sp_ten}}</td>
                <td>{{ $sanpham->l_ma}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection