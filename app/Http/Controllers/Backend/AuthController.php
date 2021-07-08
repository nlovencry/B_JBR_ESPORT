<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use DB;
use Carbon\Carbon;
  
  
class AuthController extends Controller
{
    public function showFormLogin(){
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->to('admin');
        }
        return view('login');
    }
  
    public function login(Request $request){
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->to('admin');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister(){
        $register = null;
        $datagame = DB::table('game')->get();
        return view('register',compact('register','datagame'));
    }
  
    public function register(Request $request){
        $rules = [
            'id_game'               => 'required',
            'email'                 => 'required|email|unique:player,email',
            'nama_player'           => 'required|min:5|max:100',
            'jenis_kelamin'         => 'required',
            'usia'                  => 'required',
            'nohp_player'           => 'required|max:13',
            'alamat'                => 'required',
            'foto'                  => 'required',
            'izin_ortu'             => 'required',
            'bersedia_offline'      => 'required',
            'nohp_ortu'             => 'required|max:13',
            'password'              => 'required|confirmed|min:8'
        ];
  
        $messages = [
            'id_game.required'              => 'Game wajib diisi',
            'email.required'                => 'Email wajib diisi',
            'email.email'                   => 'Email tidak valid',
            'email.unique'                  => 'Email sudah terdaftar',
            'nama_player.required'          => 'Nama Lengkap wajib diisi',
            'nama_player.min'               => 'Nama lengkap minimal 3 karakter',
            'nama_player.max'               => 'Nama lengkap maksimal 35 karakter',
            'jenis_kelamin.required'        => 'Jenis Kelamin wajib diisi',
            'usia.required'                 => 'Usia wajib diisi',
            'nohp_player.required'          => 'No HP wajib diisi',
            'nohp_player.max'               => 'No HP maksimal 13 angka',
            'alamat.required'               => 'Alamat wajib diisi',
            'foto.required'                 => 'Foto wajib diisi',
            'izin_ortu.required'            => 'Izin Ortu wajib diisi',
            'bersedia_offline.required'     =>'Bersedia offline wajib diisi',
            'nohp_ortu.required'            => 'No HP orang tua wajib diisi',
            'password.required'             => 'Password wajib diisi',
            'password.confirmed'            => 'Password tidak sama dengan konfirmasi password',
            'password.min'                  => 'Password minimal 8 angka'
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        $namafoto =  $request->foto;
        if($request->hasfile('foto')){
             $foto = $request->file('foto');
             $namafoto = $request->nama_player.'_'.$foto->getClientOriginalName();
             $pathfoto = $foto->move('images',$namafoto);
        }
        $data = [
            'id_game' => $request->id_game,
            'id_team' => 0,
            'email' => strtolower($request->email),
            'nama_player' => ucwords(strtolower($request->nama_player)),
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'nohp_player' => $request->nohp_player,
            'alamat' => $request->alamat,
            'foto' => $namafoto,
            'winrate' => 'default.jpg',
            'izin_ortu' => $request->izin_ortu,
            'bersedia_offline' => $request->bersedia_offline,
            'nohp_ortu' => $request->nohp_ortu,
            'password' => Hash::make($request->password),
            'is_active' => 1,
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
            
        ];
        $user = DB::table('player')->insert($data);
  
        if($user){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
  
  
}