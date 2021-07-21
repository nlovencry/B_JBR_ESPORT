<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DetailTeamController extends Controller
{
    public function show($id){
        $detailteam = DB::table('player')
                        ->select('player.*','users.*')
                        ->leftjoin('users','users.id','=','player.id')
                        ->where('player.id_team','=',$id)
                        ->get();
                        // dd($detailteam);
                        // dd(DB::getQueryLog());
        $data['detailteam'] = $detailteam;
        $data['id'] = $id;
        return view('backend.coach.data-team-detail',$data);
    }

    public function create(){
        $detailteam = null;
        $id = Auth::user()->id;
        $coach = DB::table('coach')->where('id',$id)->first();
        
        $game_id = $coach->id_game;
        $dataplayer = DB::table('player')
                            ->select('player.*','users.*')
                            ->leftjoin('users','users.id','=','player.id')
                            ->where('id_team',0)
                            ->where('id_game',$game_id)->get();
                            // dd($dataplayer);
        $id_team = $_GET['id-team'];
        return view('backend.coach.data-team-add-member', compact('detailteam','coach','dataplayer','game_id','id','id_team'));
    }

    public function update(Request $request){
        $data = [
            'id_team' => $request->id_team,
        ];
        DB::table('player')->where('id_player',$request->id_player)->update($data);
        return redirect()->route('detailteam.show',$request->id_team)->with('success','Data Team Berhasil Diperbarui');
    }

    public function remove($id){
        DB::table('users')
                    ->select('users.id','player.id_player','player.id_team')
                    ->leftjoin('player','player.id','=','users.id')
                    ->where('player.id',$id)->update([
            'id_team' => 0,
        ]);
        return redirect()->route('datateam.index');
    }
}
