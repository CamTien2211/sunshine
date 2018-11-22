@extends('backend.layouts.index')

@section('title')
    Them moi san pham
@endsection


@section('custom')
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all"
rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all"
rel="stylesheet" type="text/css"/>
@endsection

@section('main-content')

<form method="post" action="{{route('danhsachsanpham.store')}}" enctype="multipart/form-data" >
    {{ csrf_field()}}
    <div class="form-group">
        <label for="l_ma">Loại sản phẩm</label>
        <select name="l_ma">
            @foreach($danhsachloai as loai)
            <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="sp_ten">Ten san pham</label>
        <input type="text" class="form-control" id="sp_ten" placeholder="Ma">
    </div>

    <div class="form-group">
        <label for="sp_giaGoc">Gia goc</label>
        <input type="text" class="form-controll" id="sp_giaGoc" name="sp_giaGoc" placeholder="Ten">
    </div>

    <div class="form-group">
        <div class="file-loading">
            <label>Hinh dai dien</label>
            <input id="sp_hinh" type="file" name="sp_hinh"/>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Them</button>
</form>
@endsection



@section('custom-scripts')

<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}"
type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}"
type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/vi.js') }}"
type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/them.js') }}"
type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}"
type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
    });
</script>
@endsection