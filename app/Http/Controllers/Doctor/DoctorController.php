<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //
    public function showAllDoctors()
    {
        return view('admin.management.user');
    }

    public function getAllDoctors($pagination)
    {
        return User::where('user_type', 'doctor')->paginate($pagination);
    }
    public function getNumberDoctor( )
    {
  
        return DB::table('users')->where('user_type', 'doctor')->count();
       
    }
}
