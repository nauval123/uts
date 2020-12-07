@extends('welcome')
@section('content')
    <div class="container" id="content">
        <form method="POST" action="/">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" name="title" id="title" value="" required="required" />
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author" value="" required="required" />
            </div>
            <div class="form-group">
                <label for="issue">Konten</label>
                <input type="hidden" name="issue" />
                <textarea id="konten" class="form-control" name="konten" rows="10" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/" class="btn btn-secondary">Kembali</a>
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
