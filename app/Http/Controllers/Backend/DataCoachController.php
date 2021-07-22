<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Hash;
use App\Models\User;
use App\Models\Game;

class DataCoachController extends Controller
{
    public function index(){
        $datacoach = DB::table('coach')
                            ->select('coach.*','users.*','game.nama_game')
                            ->leftjoin('users','coach.id','=','users.id')
                            ->leftjoin('game','game.id_game','coach.id_game')
                            ->get();
        return view('backend.admin.data-coach', compact('datacoach'));
    }

    public function create(){
        $datacoach = null;
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-coach-create',compact('datacoach','datagame'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_game' => 'required',
            'email' => 'required|email',
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
            'name' => ucwords(strtolower($request->name)),
            'email' => strtolower($request->email),
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'password' => bcrypt('12345678'),
            'role' => '2',
            'is_active' => '1',
        ]);
        $coach_id = $user->id;
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $namafoto = $coach_id.'_'.$foto->getClientOriginalName();
            $pathfoto = $foto->move('images',$namafoto);
        }
        if($request->hasfile('winrate')){
            $winrate = $request->file('winrate');
            $namawin = $coach_id.'_'.$winrate->getClientOriginalName();
            $pathwin = $winrate->move('images',$namawin);
        }
        $data =[
                'id' => $coach_id,
                'id_game' => $request->id_game,
                'foto' => $namafoto,
                'winrate' => $namawin,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
        ];
        DB::table('coach')->insert([$data]);
        return redirect()->route('datacoach.index');
    }

    public function edit($id_coach){
        $datacoach = DB::table('coach')
                            ->select('coach.*','users.*')
                            ->join('users','coach.id','=','users.id')
                            ->where('id_coach',$id_coach)
                            ->first();
        //dd($datacoach);
        $datagame = Game::all();
        return view('backend.admin.data-coach-edit',compact('datacoach','datagame'));
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
            'is_active' => '1',
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
        return redirect()->route('datacoach.index')->with('success','Data Coach Berhasil Diperbarui');
    }

    public function nonactive($id){
        DB::table('users')
                    ->select('users.*','coach.*')
                    ->leftjoin('coach','coach.id','=','users.id')
                    ->where('coach.id',$id)->update([
            'is_active' => 2,
        ]);
        return redirect()->route('datacoach.index');
    }

    public function active($id){
        DB::table('users')
                    ->select('users.*','coach.*')
                    ->leftjoin('coach','coach.id','=','users.id')
                    ->where('coach.id',$id)->update([
            'is_active' => 1,
        ]);
        return redirect()->route('datacoach.index');
    }
}
