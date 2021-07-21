<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use Carbon\Carbon;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'email|required|string',
            'password' => 'required|string|min:8'
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $check = DB::table('users')
                    ->where('email',$login['email'])->first();

                    // dd($check);
        if ($check) {
            if ($check->is_active == 2) {
                
                return redirect()->route('login')->with(['error'=>'akun anda sedang dinonaktifkan']);
            }
        }

        if (auth()->attempt($login)) {
        // dd($user);
            if (Auth::user()->is_active == '1') {
                if (Auth::user()->role == '1') {
                    return redirect()->route('admin');
                } elseif (Auth::user()->role == '2') {
                    return redirect()->route('coach');
                } else if(Auth::user()->role == '3'){
                    $id = Auth::user()->id;
                    $id_absen = DB::table('player')->where('id',$id)->first()->id_player;
                    $presensi = DB::select("select `jadwal`.*, (select count(id) from `master_absensi` WHERE `master_absensi`.`id_jadwal` = `jadwal`.`id_jadwal` AND `master_absensi`.`id_player` = $id_absen) as is_absen, `master_absensi`.`id_player` as `id_absen` from `player` inner join `team` on `player`.`id_team` = `team`.`id_team` inner join `jadwal` on `player`.`id_team` = `jadwal`.`id_team` LEFT join `master_absensi` on `jadwal`.`id_jadwal` = `master_absensi`.`id_jadwal` WHERE `player`.`id` = $id AND `player`.`id_player` = $id_absen and `jadwal`.`waktu_mulai` <= now() and `jadwal`.`waktu_akhir` >= now() GROUP BY id_jadwal LIMIT 1");
                    $tanggal = now();
                    foreach($presensi as $key){
                        if ($key->is_absen == 0) {
                            DB::table('master_absensi')->insert([
                                'id_jadwal' => $key->id_jadwal,
                                'id_player' => $id_absen,
                                'created_at' => $tanggal,
                                'updated_at' => $tanggal,
                            ]);
                        }
                    }
                    // $queries = \DB::getQueryLog();
                    // dd($presensi);
                    return redirect()->route('index');
                }
                return redirect()->route('login')->with(['error' => 'kamu tidak memiliki hak akses']);
            }
        }
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->to('admin');
        } else { // false
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }
}
