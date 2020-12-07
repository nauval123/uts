<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = file_get_contents(base_path("public/storage/data.json"));
        $data = json_decode($anggota, true);
        $angka= 0;
        return view('home',['data'=>$data,'i'=>$angka]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $anggota = file_get_contents(base_path("public/storage/data.json"));
        $data = json_decode($anggota, true);
        $title  = $request->input('title');
        $time   = date("Y-m-d H:i:s");
        $author = $request->input('author');
        $konten = $request->input('konten');
        $author2=$request->input('author2');
        $title2=$request->input('title2');
        if( $title2 !=null && $author2 !=null){
            foreach ($data as $key => $d) {
                if ($d['title']=== $title2 && $d['author'] === $author2  ) {
                    $data[$key]['author']= $author;
                    $data[$key]['time']  = $time;
                    $data[$key]['title'] = $title;
                    $data[$key]['konten'] = $konten;
                    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
                    Storage::put('public/data.json',$jsonfile);
                    return $this->index();
                    break;
                }
            }
        }else{
            $data [] = array(
                "title"=>$title,
                 "time"=>$time,
                "author"=>$author,
                "konten"=>$konten
            );
            $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
            Storage::put('public/data.json',$jsonfile);
            return  $this->index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = file_get_contents(base_path("public/storage/data.json"));
        $data = json_decode($anggota, true);
        $detail=$data;
        $angka=1;
       foreach ($detail as $d){
           if ($angka==$id){
               return view('detail',['data'=>$d,'i'=>$id]);
           }
           $angka++;
       }
    }

    /**
     * Show the form for editing the specified resource.
     *@param  int  $indeks
     * @return \Illuminate\Http\Response
     */
    public function edit($indeks)
    {
        $anggota = file_get_contents(base_path("public/storage/data.json"));
        $data = json_decode($anggota, true);
        $detail=$data;
        $angka=1;
        foreach ($detail as $d){
            if ($angka==$indeks){
                return view('edit',['data'=>$d,'angka'=>$indeks]);
                break;
            }
            $angka++;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $anggota = file_get_contents(base_path('public/storage/data.json'));
        $data = json_decode($anggota, true);
        $indeks=1;
        $angka=$request->input('angka');
        foreach ($data as $key => $d) {
            if ($indeks == $angka ) {
                $data[$key]['author']= $request->input('author');
                $data[$key]['time']=date("Y-m-d H:i:s");
                $data[$key]['title'] = $request->input('title');
                $data[$key]['konten'] = $request->input('konten');
                $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
                Storage::put('public/storage/data.json', $jsonfile);
                return redirect()->route('home');
            }
            $indeks++;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $ind
     * @return \Illuminate\Http\Response
     */
    public function destroy($ind)
    {
        $anggota = file_get_contents(base_path('public/storage/data.json'));
        $data = json_decode($anggota, true);
        foreach ($data as $key => $d) {
            // Hapus data kedua
            if ($d['title'] == $ind) {
                array_splice($data, $key, 1);
            }
        }
        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        Storage::put('public/data.json',$jsonfile);
        return redirect()->route('home');
    }
}
