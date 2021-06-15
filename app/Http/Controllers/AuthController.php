<?php
  
  namespace App\Http\Controllers\Backend;

  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
  
  
class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->to('admin');
        }
        return view('login');
    }
  
    public function login(Request $request)
    {
        $rules = [
            'username'              => 'required|string',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'username.required'     => 'username wajib diisi',
            'username.string'       => 'username tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->to('admin');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'username atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister()
    {
        return view('register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'username'              => 'required|string|unique:users,username',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'username.required'     => 'username wajib diisi',
            'username.string'       => 'username tidak valid',
            'username.unique'       => 'username sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->username = strtolower($request->username);
        $user->password = Hash::make($request->password);
        $simpan = $user->save();
  
        if($simpan){
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