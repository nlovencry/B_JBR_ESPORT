<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Hash;
use App\Models\User;
use App\Models\Game;

class DataPlayerController extends Controller
{
    public function index(){
        $dataplayer = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.id_team','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->get();
                            // dd($dataplayer);
        return view('backend.admin.data-player',compact('dataplayer'));
    }

    public function create(){
        $dataplayer = null;
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-player-create',compact('dataplayer','datagame'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users|string',
            'name' => 'required|string',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'nohp' => 'required|max:13',
            'alamat'=>'required',
            'foto' => 'required|mimes:png,jpg,jpeg',
            'winrate' => 'required|mimes:png,jpg,jpeg',
         ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $user = User::create([
            'email' => strtolower($request->email),
            'name' => ucwords(strtolower($request->name)),
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'password' => bcrypt('12345678'),
            'role' => '3',
            'is_active' => '1',
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
        ]);
        $player_id = $user->id;
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $namafoto = $player_id.'_'.$foto->getClientOriginalName();
            $nama_foto = str_replace(' ','-',$namafoto);
            $pathfoto = $foto->move('images',$nama_foto);
        }
        if($request->hasfile('winrate')){
            $winrate = $request->file('winrate');
            $namawin = $player_id.'_'.$winrate->getClientOriginalName();
            $nama_win = str_replace(' ','-',$namawin);
            $pathwin = $winrate->move('images',$nama_win);
        }
        $data = [
                'id' => $player_id,
                'id_game' => $request->id_game,
                'id_team' => 0,
                'foto' => $nama_foto,
                'winrate' => $nama_win,
                'izin_ortu' => $request->izin_ortu,
                'bersedia_offline' => $request->bersedia_offline,
                'nohp_ortu' => $request->nohp_ortu,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ];
        DB::table('player')->insert([$data]);
        return redirect()->route('dataplayer.index')->with('success','Data Player Berhasil Disimpan');
    }

    public function edit($id_player){
        $dataplayer = DB::table('player')
                            ->select('player.*','users.*','game.nama_game','team.id_team','team.nama_team')
                            ->leftjoin('users','users.id','=','player.id')
                            ->leftjoin('game','game.id_game','=','player.id_game')
                            ->leftjoin('team','team.id_team','=','player.id_team')
                            ->where('id_player',$id_player)
                            ->first();
        $datagame = Game::all();
        return view('backend.admin.data-player-edit',compact('dataplayer','datagame'));
    }

    public function update(Request $request){
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $nama_foto =   str_replace(' ','-',$request->foto);
        $nama_winrate =  str_replace(' ','-',$request->winrate);
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $namafoto = $request->id.'_'.$foto->getClientOriginalName();
            $nama_foto = str_replace(' ','-',$namafoto);
            $pathfoto = $foto->move('images',$nama_foto);
        }
        if($request->hasfile('winrate')){
            $winrate = $request->file('winrate');
            $namawin = $request->id.'_'.$winrate->getClientOriginalName();
            $nama_winrate = str_replace(' ','-',$namawin);
            $pathwin = $winrate->move('images',$nama_win);
        }
         $user = [
            'email' => strtolower($request->email),
            'name' => ucwords(strtolower($request->name)),
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'role' => 3,
            'is_active' => '1',
            'updated_at' => $tanggal,
        ];
         $data = [
            'id_game' => $request->id_game,
            'id_team' => $request->id_team,
            'foto' => $nama_foto,
            'winrate' => $nama_winrate,
            'izin_ortu' => $request->izin_ortu,
            'bersedia_offline' => $request->bersedia_offline,
            'nohp_ortu' => $request->nohp_ortu,
            'updated_at' => $tanggal,
         ];
        DB::table('player')->where('id_player',$request->id_player)->update($data);
        DB::table('users')->where('id',$request->id)->update($user);
        // dd($request);
        return redirect()->route('dataplayer.index')->with('success','Data Player Berhasil Diperbarui');
    }

    public function nonactive($id){
        DB::table('users')
                    ->select('users.*','player.*')
                    ->leftjoin('player','player.id','=','users.id')
                    ->where('player.id',$id)->update([
            'is_active' => 2,
        ]);
        return redirect()->route('dataplayer.index');
    }

    public function active($id){
        DB::table('users')
                    ->select('users.*','player.*')
                    ->leftjoin('player','player.id','=','users.id')
                    ->where('player.id',$id)->update([
            'is_active' => 1,
        ]);
        return redirect()->route('dataplayer.index');
    }
}
