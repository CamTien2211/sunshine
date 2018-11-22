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
        @foreach($danhsachsanpham as $sp)
            <tr>
                <td>{{ $sp->sp_ma }}</td>
                <td>{{ $sp->sp_ten}}</td>
                <td><img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" class="img-list" ></td>
                <td>{{ $sp->loaisanpham->l_ten }}</td>
                <td><a href="{{ route('danhsachsanpham.edit',['id' => $sp->sp_ma]) }}">Sua</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection