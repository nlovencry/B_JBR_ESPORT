<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DataEventController extends Controller
{
    public function index(){
        $dataevent = DB::table('event')->get();
        return view('backend.admin.data-event',compact('dataevent'));
    }

    public function create(){
        $dataevent = null;
        return view('backend.admin.data-event-create',compact('dataevent'));
    }

    public function store(Request $request){
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        if($request->hasfile('gambar')){
            $gambar = $request->file('gambar');
            $namafoto = $request->nama_event.'_'.$gambar->getClientOriginalName();
            $pathfoto = $gambar->move('images',$namafoto);
            DB::table('event')->insert([
                'nama_event' => $request->nama_event,
                'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'price' => $request->price,
                'keterangan' => $request->keterangan,
                'gambar' => $namafoto,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]);
        }
        // dd($request);
        return redirect()->route('dataevent.index')->with('success','Data Player Berhasil Disimpan');
    }
}
