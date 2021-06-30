<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hp;
use Carbon\Carbon;
use Cloudinary;

class HpController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        // $hp= Hp::all();
        $hp= Hp::latest()->get();
        
        return view('Hp.index',compact('hp')); 

    }
    public function cetak(){
        $hp= Hp::latest()->get();
        return view('Hp.cetak',compact('hp')); 

    }
    public function create(){
        return view('Hp.create');
    }
    public function store(Request $request){
  
            $fileName = Carbon::now()->format('Y-m-d H:i:s').'-'.$request->merk;
            $uploadedFile = $request->file('gambar')->storeOnCloudinaryAs('frameworkpro',$fileName);

            $gambar = $uploadedFile->getSecurePath();
            $public_id = $uploadedFile->getPublicId();

            // dd($request->all());

            Hp::create([
                'merk' =>  $request->merk,
                'tipe' => $request->tipe,
                'tahun' => $request->tahun,
                'gambar' => $gambar,
                'public_id' => $public_id,
            ]);
    

            

            
        // ]);
        return redirect() ->route('hp.index');
    }
    public function destroy($id){
        $hp = Hp::findOrFail($id);
        // dd($hp);
        Cloudinary::destroy($hp->public_id);
        $hp -> delete();
        return redirect() ->route('hp.index');

        
    }
    public function edit($id){
        $hp = Hp::findOrFail($id);
        return view('Hp.edit',compact('hp')); 

    }
    public function update(Request $request,$id){
        $hp = Hp::findOrFail($id);

        if($request->gambar){
            $fileName = Carbon::now()->format('Y-m-d H:i:s').'-'.$request->merk;
            Cloudinary::destroy($hp->public_id);

            $uploadedFile = $request->file('gambar')->storeOnCloudinaryAs('frameworkpro',$fileName);

            $gambar = $uploadedFile->getSecurePath();
            $public_id = $uploadedFile->getPublicId();
        }

        $hp -> update([
            'no_surat' => $request -> no_surat,
            'tanggal_surat' => $request -> tanggal_surat,
            'judul_surat' =>$request -> judul_surat,
            'gambar' =>$request -> gambar ? $gambar :$hp->gambar,
            'public_id' => $request -> gambar ? $public_id : $hp->public_id


        ]);
        return redirect() ->route('hp.index');

    }
}
