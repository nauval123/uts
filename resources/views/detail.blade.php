@extends('welcome')
@section('content')
  <div class="container">
         <div class="row">
            <div class="col-xl-10 m-md-auto ">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a href="{{route('edit',[$i])}}">edit</a> | <a href="{{route('hapus',[$data['title']])}}">hapus</a>
                        </div>
                        <h5>{{$data['title']}}</h5>
                        <small>{{$data['time']}} oleh {{$data['author']}}</small>
                    </div>
                    <div class="card-body">
                        {!! htmlspecialchars_decode($data['konten'],ENT_HTML5) !!}
                    </div>
                    <div class="card-footer text-right"><a href="{{route('home')}}">kembali</a></div>
                </div>
            </div>
        </div>
  </div>
        <br>
@endsection
