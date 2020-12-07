@extends('welcome')
@section('content')
    <div class="container" id="content">
        <form method="POST" action="{{route('store')}}">
            @csrf

{{--            <p>{{var_dump($data)}}</p>--}}
            <div class="form-group">
                <label for="title">Judul</label>
                <p></p>
                <input type="hidden" value="{{$angka}}">
                <input type="text" class="form-control" name="title" id="title" value="{{$data['title']}}" required="required" />
                <input type="hidden" name="title2" value="{{$data['title']}}"  >
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author" value="{{$data['author']}}" required="required"/>
                <input type="hidden" name="author2" value="{{$data['author']}}">
            </div>
            <div class="form-group">
                <label for="issue">Konten</label>
                <textarea id="konten" class="form-control" name="konten"  rows="10" cols="50">{{$data['konten']}}</textarea>
                <input type="hidden" name="konten2" value="{{$data['konten']}}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            <a href="{{route('home')}}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection

