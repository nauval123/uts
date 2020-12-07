@extends('welcome')
@section('content')
   @foreach($data as $d)
       <div class="row">
           <div class="col-xl-10 m-md-auto ">
               <div class="card">
                   <div class="card-header">
                       <input type="hidden" value="{{$i++}}">
                       <div class="float-right">
                           <a href="edit/{{$i}}">edit</a> | <a href="delete/{{$d['title']}}">hapus</a>
                       </div>
                       <h5>{{$d['title']}}</h5>
                       <small> {{$d['time']}}oleh {{$d['author']}}</small>
                   </div>
                   <div class="card-body">
                       @php
                           $string =$d['konten'];
                           $PecahStr = explode("</p>", $string);
                           for ( $p = 0; $p < count( $PecahStr ); $p++ ) {
                               if($p<5){
                                   echo htmlspecialchars_decode($PecahStr[$p],ENT_HTML5);
                                 break;
                               }

                           }
                       @endphp

                   </div>
                   <div class="card-footer text-right">
                       <a href="{{$j=$i}}">baca selengkapnya</a>
                   </div>
               </div>
           </div>
       </div>
       <br>
   @endforeach
@endsection
