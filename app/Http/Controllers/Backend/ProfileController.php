<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Hash;
use Session;

class ProfileController extends Controller
{
    public function index(){
        $users = DB::table('users')
                            ->select('users.*','coach.*','game.nama_game',DB::raw('count(team.id_team) as total_team'),)
                            ->leftjoin('coach','coach.id','=','users.id')
                            ->join('game','game.id_game','=','coach.id_game')
                            ->leftjoin('team','coach.id_coach','=','team.id_coach')
                            ->groupBy('coach.id_coach')
                            ->where('coach.id',Auth::user()->id)
                            ->first();
                            // dd($users);
        return view('backend.coach.profile',compact('users'));
    }

    public function edit($id){
        $users = DB::table('users')
                            ->select('users.*','coach.*','game.nama_game',DB::raw('count(team.id_team) as total_team'),)
                            ->leftjoin('coach','coach.id','=','users.id')
                            ->join('game','game.id_game','=','coach.id_game')
                            ->leftjoin('team','coach.id_coach','=','team.id_coach')
                            ->groupBy('coach.id_coach')
                            ->where('coach.id',Auth::user()->id)
                            ->first();
        return view('backend.coach.profile-edit', compact('users'));
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
            'role' => 2,
            'updated_at' => $tanggal,
        ];
        $data = [
            'id' => $request->id,
            'id_game' => $request->id_game,
            'foto' => $namafoto,
            'winrate' => $namawin,
            'updated_at' => $tanggal,
        ];
        DB::table('coach')->where('id_coach',$request->id_coach)->update($data);
        DB::table('users')->where('id',$request->id)->update($user);
        // dd($request);
        return redirect()->route('profile.index')->with('success','Data Coach Berhasil Diperbarui');
    }

    public function show($id){
        // dd($id);
        $users = DB::table('users')
                            ->select('users.*','coach.*')
                            ->leftjoin('coach','coach.id','=','users.id')
                            ->groupBy('coach.id_coach')
                            ->where('coach.id',Auth::user()->id)
                            ->first();
        return view('backend.coach.profile-change-password',compact('users'));
    }

    public function ubah(Request $request){
        $this->validate($request, [
            'password' => 'required', 'string', 'min:8', 'confirmed',
         ]);
        DB::table('users')->where('id',$request->id)->update([
            'password' => Hash::make($request->password),
        ]);
        Session::flush();
        return redirect()->route('login')->with('success','Password Berhasil diubah, silahkan login kembali.');
    }
}
