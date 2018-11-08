<h1>Hello first action from LoaiController</h1>
<table border="1">
    <thead>
        <tr>
            <th>Ma</th>
            <th>Ten</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachloai as $loai)
            <tr>
                <td>{{ $loai->l_ma }}</td>
                <td>{{ $loai->l_ten}}</td>
            </tr>
            @endforeach
    </tbody>
</table>