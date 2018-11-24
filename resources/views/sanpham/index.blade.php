@extends('backend.layouts.index')

@section('title')
    Danh sach san pham
@endsection

@section('main-content')


<h1>Danh sach san pham</h1>
<table border ="1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten</th>
            <th>Hinhanh</th>
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
                <td>
                    <a href="{{ route('danhsachsanpham.edit',['id' => $sp->sp_ma]) }}"
                    class="btn btn-primary pull-left">Sua</a>
                    <form method="post" action="{{ route('danhsachsanpham.destroy', ['id' => 
                    $sp->sp_ma]) }}" class="pull-left">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Xoa</button>
                        </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection