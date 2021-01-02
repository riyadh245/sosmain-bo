<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ExpertRegister extends Controller
{
    public function register_expert(Request $request){
        $current_timestamp = Carbon::now()->timestamp;
        $pictureName = $current_timestamp.$request->picture->getClientOriginalName();
        $request->file('picture')->storeAs('pictures', $pictureName);
        $user = new User();
        $user->username = $request->username;
        $user->forename = $request->forename;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rpps_number = $request->rpps_number;
        $user->phone_number=$request->phone_number;
        $user->user_type='expert';
        $user->hpc_picture="2s";
        $user->picture=$pictureName;
        $user->status='in registration';
        $user->save();
        return view('/login/login_expert'); 
    }
    public function register_medecin(Request $request){
        $current_timestamp = Carbon::now()->timestamp;
        $pictureName = $current_timestamp.$request->picture->getClientOriginalName();
        $request->file('picture')->storeAs('pictures', $pictureName);
        $user = new User();
        $user->username = $request->username;
        $user->forename = $request->forename;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rpps_number = $request->rpps_number;
        $user->phone_number=$request->phone_number;
        $user->user_type='medecin';
        $user->hpc_picture="2s";
        $user->picture=$pictureName;
        $user->status='in registration';
        $user->save();
        return view('/login/login_medecin'); 
    }
}
