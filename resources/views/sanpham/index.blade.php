@extends('backend.layouts.index')

@section('title')
    Danh sach san pham
@endsection

@section('main-content')

<table class="table table-bored">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten</th>
            <th>Hinhanh</th>
            <th>Thuoc loai</th>
            <th>Sua-Xoa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sp)
            <tr>
                <td>{{ $sp->sp_ma }}</td>
                <td>{{ $sp->sp_ten}}</td>
                <td><img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" class="img-list" ></td>
                <td>{{ $sp->loaisanpham->l_ten }}</td>
                <td>
                    <a href="{{ route('danhsachsanpham.edit',['id' => $sp->sp_ma]) }}"
                    class="btn btn-primary pull-left">Sửa</a>
                    <form method="post" action="{{ route('danhsachsanpham.destroy', ['id' => 
                    $sp->sp_ma]) }}" class="pull-left">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
<a href="{{ route('danhsachsanpham.print') }}" class="btn btn-primary">In ấn</a>
<a href="{{ route('danhsachsanpham.excel') }}" class="btn btn-primary">Xuất Excel</a>
<a href="{{ route('danhsachsanpham.pdf') }}" class="btn btn-primary">Xuất PDF</a>