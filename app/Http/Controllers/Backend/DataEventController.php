<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DataEventController extends Controller
{
    public function index(){
        $dataevent = DB::table('event')
                                ->select('event.*','game.nama_game')
                                ->leftjoin('game','game.id_game','=','event.id_game')
                                ->get();
        return view('backend.admin.data-event',compact('dataevent'));
    }

    public function create(){
        $dataevent = null;
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-event-create',compact('dataevent','datagame'));
    }

    public function store(Request $request){
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        if($request->hasfile('gambar')){
            $gambar = $request->file('gambar');
            $namafoto = $request->id_event.'_'.$gambar->getClientOriginalName();
            $pathfoto = $gambar->move('images',$namafoto);
            DB::table('event')->insert([
                'id_game' => $request->id_game,
                'nama_event' => $request->nama_event,
                'tgl_mulai_pendaftaran' => $request->tgl_mulai_pendaftaran,
                'tgl_akhir_pendaftaran' => $request->tgl_akhir_pendaftaran,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'slot' => $request->slot,
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

    public function edit($id_event){
        $dataevent = DB::table('event')
                                ->select('event.*','game.nama_game')
                                ->leftjoin('game','game.id_game','=','event.id_game')
                                ->where('id_event',$id_event)->first();
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-event-edit',compact('dataevent','datagame'));
    }

    public function update(Request $request){
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $namafoto =  $request->img;
        if($request->hasfile('gambar')){
            $gambar = $request->file('gambar');
            $namafoto = $request->id_event.'_'.$gambar->getClientOriginalName();
            $pathfoto = $gambar->move('images',$namafoto);
        }
        $data = [
                'id_game' => $request->id_game,
                'nama_event' => $request->nama_event,
                'tgl_mulai_pendaftaran' => $request->tgl_mulai_pendaftaran,
                'tgl_akhir_pendaftaran' => $request->tgl_akhir_pendaftaran,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'slot' => $request->slot,
                'price' => $request->price,
                'keterangan' => $request->keterangan,
                'gambar' => $namafoto,
                'updated_at' => $tanggal,
        ];
        DB::table('event')->where('id_event',$request->id_event)->update($data);
        return redirect()->route('dataevent.index')->with('success','Data Event Berhasil Diperbarui');
    }

    public function destroy($id_event){
        DB::table('event')->where('id_event',$id_event)->delete();
        return redirect()->route('dataevent.index')->with('success','Data Tournament Berhasil Dihapus');
    }
}
