<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    //
    public function showAllPatients()
    {
        return view('admin.management.patients');
    }

    public function getAllPatients($pagination)
    {
        return DB::table('patients')->paginate($pagination);
    }
    public function getNumberPatient( )
    {
        return DB::table('patients')->count();
       
    }
    
}
