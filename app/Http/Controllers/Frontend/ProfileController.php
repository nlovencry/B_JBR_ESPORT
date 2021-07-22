<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Game;
use DB;
use Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index(){
        $eventfoot = Event::latest()->paginate(3);
        $playerfoot = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('users.is_active','1')
                            ->latest('player.created_at')
                            ->paginate(3);
        $player = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('users.id',Auth::user()->id)
                            ->first();
        return view('frontend.profile',compact('eventfoot','playerfoot','player'));
    }

    public function edit($id){
        $eventfoot = Event::latest()->paginate(3);
        $playerfoot = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('users.is_active','1')
                            ->latest('player.created_at')
                            ->paginate(3);
        $player = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('users.id',$id)
                            ->first();
        return view('frontend.profile-edit',compact('eventfoot','playerfoot','player'));
    }

    public function update(Request $request){
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $namafoto =  $request->foto;
        $namawin =  $request->winrate;
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $namafoto = $request->id.'_'.$foto->getClientOriginalName();
            $pathfoto = $foto->move('images',$namafoto);
        }
        if($request->hasfile('winrate')){
            $winrate = $request->file('winrate');
            $namawin = $request->id.'_'.$winrate->getClientOriginalName();
            $pathwin = $winrate->move('images',$namawin);
        }
         $user = [
            'email' => strtolower($request->email),
            'name' => ucwords(strtolower($request->name)),
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'role' => 3,
            'is_active' => 1,
            'updated_at' => $tanggal,
        ];
         $data = [
            'id_game' => $request->id_game,
            'id_team' => $request->id_team,
            'foto' => $namafoto,
            'winrate' => $namawin,
            'nohp_ortu' => $request->nohp_ortu,
            'updated_at' => $tanggal,
         ];
        DB::table('player')->where('id_player',$request->id_player)->update($data);
        DB::table('users')->where('id',$request->id)->update($user);
        // dd($request);
        return redirect()->route('profil.index')->with('success','Profile Berhasil Diperbarui');
    }
}
