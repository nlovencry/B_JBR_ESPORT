<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Hash;
use App\Models\User;

class DataCoachController extends Controller
{
    public function index(){
        $datacoach = DB::table('coach')
                            ->select('coach.*','users.*')
                            ->join('users','coach.id','=','users.id')
                            ->get();
                            // dd($datacoach);
        return view('backend.admin.data-coach', compact('datacoach'));
    }

    public function create(){
        $datacoach = null;
        $datagame = DB::table('game')->get();
        return view('backend.admin.data-coach-create',compact('datacoach','datagame'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'nohp' => 'required|max:13',
            'alamat'=>'required',
            'foto' => 'required|mimes:png,jpg,jpeg',
        ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => '3',
        ]);
        $coach_id = $user->id;
        if($request->hasfile('foto')){
            $foto = $request->file('foto');

            $namafoto = $request->name.'_'.$foto->getClientOriginalName();

            $pathfoto = $foto->move('images',$namafoto);
            $pathwin = $winrate->move('images',$namawin);
            DB::table('coach')->insert([
                'id' => $coach_id,
                'foto' => $namafoto,
                'winrate' => 'default.jpg',
                'is_active' => '1',
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]);
        }
        return redirect()->route('datacoach.index');
    }

    public function edit($id_coach){
        $datacoach = DB::table('coach')
                            ->select('coach.*','users.*','game.nama_game')
                            ->join('users','coach.id','=','users.id')
                            ->leftjoin('game','coach.id_game','=','game.id_game')
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
            $namafoto = $request->name.'_'.$foto->getClientOriginalName();
            $pathfoto = $foto->move('images',$namafoto);
        }
        if($request->hasfile('winrate')){
            $winrate = $request->file('winrate');
            $namawin = $request->name.'_'.$winrate->getClientOriginalName();
            $pathwin = $winrate->move('images',$namawin);
        }
        $user = [
            'email' => $request->email,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
        ];
        $data = [
            'id' => $request->id,
            'foto' => $namafoto,
            'winrate' => 'default.jpg',
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
        ];
        DB::table('coach')->where('id_coach',$request->id_coach)->update($data);
        DB::table('users')->where('id',$request->id)->update($user);
        // dd($request);
        return redirect()->route('datacoach.index')->with('success','Data Coach Berhasil Diperbarui');
    }

    public function nonactive($id_coach){
        DB::table('coach')->where('id_coach',$id_coach)->update([
            'is_active' => 2,
        ]);
        return redirect()->route('datacoach.index');
    }

    public function active($id_coach){
        DB::table('coach')->where('id_coach',$id_coach)->update([
            'is_active' => 1,
        ]);
        return redirect()->route('datacoach.index');
    }
}
