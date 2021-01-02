<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function login(Request $request){
        $loginDetails = $request->only('email','password');
        $user=DB::table('users')->where('email', $request->email)->get('status');
       
        
        if(Auth::attempt($loginDetails))
        {
            if(($user[0]->status == 'Validated'))
            {
            return response()->json(['message' => 'Login successful', 'code'=>'200']);
        }
        else
        {
            return response()->json(['message' => 'Login failed not validated yet', 'code'=>'403']);
        }
    }

        else{
            return response()->json(['message' => 'Wrong login details', 'code'=>'404' ]);
        }
    
    }
    public function addPatient(Request $request )
    {
        $patient = new Patient();
        $patient->lastname = $request->lastname;
        $patient->forename = $request->forename;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->social_number = $request->social_number;
        $patient->save();
        return response()->json(['message' => 'Patient created successfully', 'code'=>'200']);


    }

    public function getCenters()
    {
        return DB::table('centers')->get();
        
    }
}
